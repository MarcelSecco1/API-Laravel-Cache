<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateModule extends FormRequest
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
        $uuid = $this->course ?? '';

        return [
                                            // unico na tabela cursos, campo name, ignorando o uuid passado
            'name' => ['required', 'max:255', 'min:3', "unique:courses,name,{$uuid},uuid"],
            'description' => ['required', 'max:9999', 'min:3'],
        ];
    }
}
