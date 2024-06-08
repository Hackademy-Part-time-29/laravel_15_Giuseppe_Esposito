<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required | min:5 | max:50',
            'description'=>'required | min:5 | max:50',
            'cover'=> 'sometimes | mimes:jpg,bmp,png',
        ];
    }

    public function messages(){
        return  [
                    'name.required' => 'Inserisci il titolo',
                    'name.min' => 'Il titolo è troppo corto',
                    'name.max' => 'Il titolo è troppo lungo',               //messaggi di errore personalizzati
                    'description.required' => 'Inserisci il contenuto',
                    'description.min' => 'Il contenuto è troppo corto',
                    'description.max' => 'Il contenuto è troppo lungo',
                    'cover.mimes' => 'Formato del file non valido',
        ];
    }
}
