<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

   /* 
    Esse método recupera uma lista de transações do banco de dados
    e a retorna como uma resposta JSON.
  */
    public function index() : JsonResponse
    {
      $transactions = Transaction::orderBy('idTransaction', 'DESC')->get();

      return response()->json([
        'status' => true,
        'transactions' => $transactions,
      ], 200);
    }


    
    /* 
      Esse método retorna detalhes de uma transação especifica
      em formato JSON
    */
    public function show(Transaction $transaction) : JsonResponse
    {
      return response()->json([
        'status' => true,
        'transaction' => $transaction,
      ], 200);
    }

    /* 
      Esse método armazena os registros no banco de dado
    */
    public function store(TransactionRequest $request)
    {
      // Iniciar transação com bando de dados
      DB::beginTransaction();

      try{

        $transaction = Transaction::create
        ([
          'categoryID' => $request->categoryID,
          'type' => $request->type,
          'amount' => $request->amount,
          'description' => $request->description,
          'transactionDate' => $request->transactionDate,
        ]);
        
        // Operação concluída com sucesso
        DB::commit();

        return response()->json([
          'status' => true,
          'transaction' => $transaction,
          'message' => "Transação registrada com sucesso!",
        ], 201);

      }catch(Exception $e)
      {
        // Operação não concluída com êxito
        DB::rollBack();
        // Retornar uma menssagem de erro com status 400

        return response()->json([
          'status' => false,
          'message' => "Não foi possível cadastrar a transação!",
        ], 400);
      }
    }

    /* 
      Esse método atualiza um registro na tabela transações
    */
    public function update(TransactionRequest $request, Transaction $transaction) : JsonResponse
    {

      DB::beginTransaction();

      try
      {
        // Editar um registro
        $transaction->update([
          'categoryID' => $request->categoryID,
          'type' => $request->type,
          'amount' => $request->amount,
          'description' => $request->description,
          'transactionDate' => $request->transactionDate,
        ]);

        DB::commit();

        return response()->json([
          'status' => true,
          'transaction' => $transaction,
          'message' => "Transação editada com sucesso!",
        ], 200);

      }catch(Exception $e)
      {
        DB::rollBack();

        return response()->json([
          'status' => false,
          'message' => "Não foi possível editar a transação!",
        ], 400);
      }

    }

    /* 
      Esse método apaga registros
    */
    public function destroy(Transaction $transaction) :JsonResponse
    {
      try
      {
        // Deleta o registro
        $transaction -> delete();

        return response()->json([
          'status' => true,
          'transaction' => $transaction,
          'message' => "Transação excluída com sucesso!",
        ], 200);

      }catch(Exception $e)
      {
        return response()->json([
          'status' => false,
          'message' => "Não foi possível excluir a transação!",
        ], 400);
      }
    }
}
