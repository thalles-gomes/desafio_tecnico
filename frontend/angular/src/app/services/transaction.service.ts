import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Transaction } from '../../Transaction';
import { map } from 'rxjs/operators'; 

@Injectable({
  providedIn: 'root'
})
export class TransactionService {
  private apiUrl = 'http://127.0.0.1:8000/api/transactions';
  
  
  constructor(private httpClient:HttpClient) 
  {
    
  }

  getTransactions() : Observable<Transaction[]>
  {
      // return this.httpClient.get<Transaction[]>(this.apiUrl);  
      return this.httpClient.get<{ transactions: Transaction[] }>(this.apiUrl).pipe
      (
        map(response => response.transactions)
      );
  }

  deleteTransaction(transaction: Transaction): Observable<Transaction> 
  {
    return this.httpClient.delete<Transaction>(`${this.apiUrl}/${transaction.idTransaction}`);
  } 
  
  createTransaction(transaction: Transaction): Observable<Transaction> 
  {
    return this.httpClient.post<Transaction>(this.apiUrl, transaction);
  }

  updateTransaction(transaction: Transaction): Observable<Transaction>
 {
    return this.httpClient.put<Transaction>(`${this.apiUrl}/${transaction.idTransaction}`, transaction);
  }
}
