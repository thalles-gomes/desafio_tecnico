import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Category } from '../../Category';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators'; 

@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  private apiUrl = 'http://127.0.0.1:8000/api/categories';

  constructor(private httpClient:HttpClient) { }

  getCategories() : Observable<Category[]>
  {
      // return this.httpClient.get<Category[]>(this.apiUrl);  
      return this.httpClient.get<{ categories: Category[] }>(this.apiUrl).pipe
      (
        map(response => response.categories)
      );
  }
}
