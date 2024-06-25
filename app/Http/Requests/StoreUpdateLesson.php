<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLesson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $uuid = $this->module ?? '';

        return [
            'name' => ['required', 'max:255', 'min:3', 'unique:lessons,name,{$uuid},uuid'],
            'video' => ['required', 'max:255', 'min:3', 'unique:lessons,video,{$uuid},uuid'],
            'description' => ['nullable', 'max:255', 'min:3'],
            'course' => ['required', 'exists:courses,uuid'],
        ];
    }
}
