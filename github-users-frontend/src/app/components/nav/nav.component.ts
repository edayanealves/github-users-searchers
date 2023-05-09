import { Component, OnInit } from '@angular/core';
import { TokenStorageService } from 'src/app/services/token-storage.service';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit{
  name?: string;

  constructor(
    private tokenStorageService: TokenStorageService
  ){}
  ngOnInit(): void {
    this.name = this.tokenStorageService.getUser().name
  }

}
