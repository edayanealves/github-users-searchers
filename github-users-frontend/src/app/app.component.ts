import { Component, OnInit } from '@angular/core';
import { TokenStorageService } from './services/token-storage.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  
  title = 'github-users-frontend';
  name?: string;
  isLoggedIn = false;


  constructor(private tokenStorageService: TokenStorageService, private router: Router, private route: ActivatedRoute){}

  ngOnInit(): void {
    
    this.isLoggedIn = !!this.tokenStorageService.getToken();

    if(this.isLoggedIn) {
      const user = this.tokenStorageService.getUser();
      this.name = user.name;
      const param = !!this.route.snapshot.paramMap.get('logout')
      if(param)
        this.router.navigate(['/login']);
    }
    
  }
  logout(): void {
    this.tokenStorageService.signOut();
    window.location.reload();
  }
}
