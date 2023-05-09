import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const GITHUB_API_URL = 'http://localhost:8989'

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  handleAuthentication(credentials: object): Observable<any> {
    return this.http.post(`${GITHUB_API_URL}/auth`, credentials, httpOptions);
  }
  handlerRegistartion(userData: object): Observable<any> {
    return this.http.post(`${GITHUB_API_URL}/users`, userData, httpOptions);
  }
}
