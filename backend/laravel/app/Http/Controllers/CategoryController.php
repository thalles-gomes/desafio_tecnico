<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

  /* 
    Esse método recupera uma lista de categorias do banco de dados
    e a retorna como uma resposta JSON.
  */
    public function index() : JsonResponse
    {
      $categories = Category::orderBy('idCategory')->get();
      return response()->json([
        'status' => true,
        'categories' => $categories,
      ], 200);
    }

    /* 
      Esse método retorna detalhes de uma categoria especifica
      em formato JSON
    */
    public function show(Category $category) : JsonResponse
    {
      return response()->json([
        'status' => true,
        'category' => $category,
      ], 200);
    }
}
