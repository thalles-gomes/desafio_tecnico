<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Manipulando falaha da validação

    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response() -> json([
        'status' => false,
        'erros' => $validator->errors(),

      ], 422));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categoryID' => 'required',
            'type' => 'required|in:income,expense', // Validando o enum, apenas os valores income ou expense
            'amount' => 'required|numeric',
            'transactionDate' => 'required|date',
            'description' => 'required|string',
        ];
    }


    /// Mensagens de erro
    public function messages() : array
    {
      return [
        'categoryID.required' => 'Campo categoria é obrigatório!',
        'type.required' => 'Campo tipo é obriogatório!',
        'amount.required' => 'Campo quantia é obrigatório!',
        'amount.numeric'=> 'Campo quantia só aceita valor númerico!',
        'transactionDate.required' => 'Campo data é obrigatório!',
        'description.required' => 'Faça uma breve descrição sobre a sua transação.',
      ];
    }
}
