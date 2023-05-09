import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const NOMINATIM_URL = 'https://nominatim.openstreetmap.org/search?format=json'
const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};
@Injectable({
  providedIn: 'root'
})
export class NominatimService {

  constructor(private http: HttpClient) { }

  handleRetrieveGeoInformationFromAnLocation(location: String): Observable<any> {
    const uri = `${NOMINATIM_URL}&q=${location}`

    return this.http.get(uri, httpOptions)
  }
}
