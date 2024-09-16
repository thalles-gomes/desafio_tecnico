<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Informo ao laravel que ele não precisa adicionar dados as colunas timestamps
    public $timestamps = false;

    // Informo ao laravel que o nome da minha chave primaria é idCategory
    protected $primaryKey = 'idCategory';

}
