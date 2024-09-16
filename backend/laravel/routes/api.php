<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotas da tabela categories
Route::get('/categories', [CategoryController::class, 'index']); // GET - http://127.0.0.1:8000/api/categories
Route::get('/categories/{category}', [CategoryController::class, 'show']); // GET - http://127.0.0.1:8000/api/categories/1

//Rotas da tabela transactions
Route::get('/transactions', [TransactionController::class, 'index']); // GET - http://127.0.0.1:8000/api/transactions
Route::get('/transactions/{transaction}', [TransactionController::class, 'show']); // GET - http://127.0.0.1:8000/api/transactions/1

Route::post('transactions', [TransactionController::class, 'store']); // POST - http://127.0.0.1:8000/api/transactions

Route::put('transactions/{transaction}', [TransactionController::class, 'update']); // PUT - http://127.0.0.1:8000/api/transactions/1

Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy']); // DELETE - http://127.0.0.1:8000/api/transactions/1


