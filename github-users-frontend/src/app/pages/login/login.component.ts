import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { TokenStorageService } from 'src/app/services/token-storage.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit{
  userData: any  = {
    email: null,
    password: null,
  }

  isLoggedIn = false;
  isLoginFailed = false;
  errorMessage = '';
  isLoading = false

  constructor(
    private service: AuthService,
    private router: Router,
    private tokenStorage: TokenStorageService
  ) {}

  ngOnInit(): void {
    if (this.tokenStorage.getToken()) {
      this.tokenStorage.signOut();
      window.location.reload();
    }
  }

  onSubmit(): void {
    this.isLoading = true
    this.service.handleAuthentication(this.userData).subscribe(
      ({ data }) => {
        this.tokenStorage.saveToken(data.authorization.token);
        this.tokenStorage.saveUser(data.user);

        this.isLoginFailed = false;
        this.isLoggedIn = true;
        this.isLoading = false;

        this.router.navigate(['/home']);

      },
      err => {
        this.errorMessage = err.error.message;
        this.isLoginFailed = true;
        this.isLoading = false;
      }
    );
  }

}
