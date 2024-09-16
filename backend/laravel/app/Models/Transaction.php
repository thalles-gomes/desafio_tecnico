<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Informo ao laravel que o nome da minha chave primaria é idTransaction
    protected $primaryKey = 'idTransaction';

     // Mapear as colunas de timestamps personalizados
     const CREATED_AT = 'createAt';
     const UPDATED_AT = 'updateAt';

       // Defina quais campos são atribuíveis em massa
    protected $fillable = 
    [
      'categoryID',
      'type',
      'amount',
      'description',
      'transactionDate',
    ];

    public static function boot()
    {
        parent::boot();

          // Evento para criação de transação
        static::creating(function ($transaction) 
        {
          $transaction->adjustAmount();
        });
    
      // Evento para edição de transação
        static::updating(function ($transaction) 
        { 
          $transaction->adjustAmount();
        });
    }

    protected function adjustAmount()
    {
      // Ajustar o valor de amount se o tipo for 'expense'
      if ($this->type === 'expense') 
      {
          $this->amount = -abs($this->amount);
      }
    }
    
}
