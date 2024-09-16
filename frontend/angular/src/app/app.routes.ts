import { Routes } from '@angular/router';
import { TransactionsComponent } from './components/transactions/transactions.component';
import { HttpClient } from '@angular/common/http';

export const routes: Routes = [
  {
    path: '',
    component:TransactionsComponent
  }
];
