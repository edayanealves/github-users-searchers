import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { UsersService } from 'src/app/services/users.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit{
  userData: any = {
    email: null,
    name: null,
    password: null,
  }

  isSuccessful = false;
  isSignUpFailed = false;
  errorMessage = '';
  isLoading = false

  constructor(private service: UsersService, private router: Router) {}

  ngOnInit(): void {

  }

  onSubmit(): void {
    this.isLoading = true
    this.service.handlerRegistration(this.userData).subscribe(
      ({ data }) => {
        console.log(data)

        this.isSuccessful = true;
        this.isSignUpFailed = false;
        this.isLoading = false
        this.router.navigate(['/login']);
      },
      err => {
        this.errorMessage = err.error.message;
        this.isSignUpFailed = true;
        this.isLoading = false
      }
    );
  }

}
