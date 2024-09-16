import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { TransactionService } from '../../services/transaction.service';
import { CategoryService } from '../../services/category.service';
import { Transaction } from '../../../Transaction';
import { Category } from '../../../Category';
import { FormsModule } from '@angular/forms';
import { Modal } from 'bootstrap'; 

@Component({
  selector: 'app-transactions',
  standalone: true,
  imports: 
  [
    CommonModule,
    FormsModule,

  ],
  templateUrl: './transactions.component.html',
  styleUrl: './transactions.component.css'
})

export class TransactionsComponent implements OnInit{

  categories : Category[] = [];
  transactions : Transaction[] = [];
  filteredTransactions: Transaction[] = [];
  filterType: string = '';

  newTransaction: Transaction = 
  {
    idTransaction: undefined,
    categoryID: undefined,
    type: '',
    amount: undefined,
    description: '',
    transactionDate: '',
    createAt: '',
    updateAt: ''
  };

  selectedTransaction: Transaction | null = null;

  constructor
  (
  
    private transactionsService:TransactionService,
    private categoriesService:CategoryService
    
  ){}

  ngOnInit(): void
  {
    
    this.categoriesService.getCategories().subscribe((data) => {

      this.categories = data;
      console.log(data);

    });

    this.transactionsService.getTransactions().subscribe((data) => {

      this.transactions = data;
      console.log(data);

    });
    this.loadTransactions();
  }

  getCategoryName(categoryID: number): string 
  {
    const category = this.categories.find(cat => cat.idCategory === categoryID);
    return category?.name ?? 'Desconhecido';
  }

  deleteTransaction(transaction: Transaction): void 
  {
    this.transactionsService.deleteTransaction(transaction).subscribe
    (() => 
    {
      this.transactions = this.transactions.filter((t) => t.idTransaction !== transaction.idTransaction);
      this.applyFilter(); // Atualiza a lista filtrada
    });
  }

  loadTransactions(): void 
  {
    this.transactionsService.getTransactions().subscribe((data) => {
      this.transactions = data; 
      this.applyFilter();
    });
  }

  storeTransaction(): void 
  {
    this.newTransaction.createAt = new Date().toISOString();
    this.newTransaction.updateAt = new Date().toISOString();

    this.transactionsService.createTransaction(this.newTransaction).subscribe(() => 
      {
      this.loadTransactions(); 

      this.newTransaction = 
      {
        idTransaction: undefined,
        categoryID: undefined,
        type: '',
        amount: undefined,
        description: '',
        transactionDate: '',
        createAt: '',
        updateAt: ''
      };
    });
  }

  
  openEditModal(transaction: Transaction): void 
  {
    this.selectedTransaction = { ...transaction };
    const modalElement = document.getElementById('editTransactionModal');
    if (modalElement) 
    {
      const modal = new Modal(modalElement);
      modal.show();
    } else {
      console.error('Modal element not found');
    }
  }
 
  updateTransaction(): void 
  {
    if (this.selectedTransaction)
     {
      this.selectedTransaction.updateAt = new Date().toISOString();

      this.transactionsService.updateTransaction(this.selectedTransaction).subscribe((updatedTransaction) => 
        {
        this.transactions = this.transactions.map(transaction =>
          transaction.idTransaction === updatedTransaction.idTransaction
            ? updatedTransaction
            : transaction
        );

        // Fechar o modal após atualização
        const modalElement = document.getElementById('editTransactionModal');
        if (modalElement) 
        {
          const modal = Modal.getInstance(modalElement);
          if (modal) 
          {
            modal.hide();
            // Atualiza lista
            this.loadTransactions();
          }
        } else {
          console.error('Modal element not found');
        }
      });
      
    }
  }

  applyFilter(): void 
  {
    if (this.filterType) 
    {
      this.filteredTransactions = this.transactions.filter(transaction => transaction.type === this.filterType);
    } else {
      this.filteredTransactions = [...this.transactions];
    }
  }

}


