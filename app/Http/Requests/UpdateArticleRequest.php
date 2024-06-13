<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'name'=>'required |min:3 | max:50 | unique:articles,name,' . $this->article->id,
            'description'=>'required | min:5 | max:255',
            'cover'=>'sometimes | mimes:jpg,bmp,png',
            'tags'=>'required | array ',
            'tags.*'=>'exists:tags,id',  //per controllare ogni singolo elemento di un array, usiamo ad es. tags.*
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
                    'tags.required' => 'Inserisci un tag',
                    'tags.*'=>'Tag non valido',
        ];
    }
}
