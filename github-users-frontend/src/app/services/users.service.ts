import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const GITHUB_API_URL = 'http://localhost:8989/users'

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  constructor(private http: HttpClient) { }

  handlerRegistration(userData: object): Observable<any> {
    return this.http.post(GITHUB_API_URL, userData, httpOptions);
  }
}
