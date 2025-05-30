<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'status' => 'required',
            'user_id' => 'required'

        ];
    }
}
