import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const GITHUB_API_URL = 'http://localhost:8989/github-users'

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

@Injectable({
  providedIn: 'root'
})

export class GithubUsersService {

  constructor(private http: HttpClient) { }

  handleGithubUserSearch(username: String): Observable<any> {
    return this.http.get(`${GITHUB_API_URL}/${username}`);
  }

  handleSavedGithubUser(): Observable<any> {
    return this.http.get(`${GITHUB_API_URL}`);
  }
  handleGithubUserCreation(data: object): Observable<any> {
    return this.http.post(`${GITHUB_API_URL}`, data, httpOptions);
  }
  handleGithubUserDelete(id: any): Observable<any> {
    return this.http.delete(`${GITHUB_API_URL}/${id}`, httpOptions);
  }
  handleGithubUserUpdate(id: any, data: any): Observable<any> {
    return this.http.put(`${GITHUB_API_URL}/${id}`, data, httpOptions);
  }
}
