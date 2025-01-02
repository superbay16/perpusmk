<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'isbn' => 'required|integer',
            'judul' => 'required',
            'penulis_id' => 'required|exists:penulis,id',
            'penerbits_id' => 'required|exists:penerbits,id',
            'categories_id' => 'required|exists:categories,id',
            'tahun_terbit' => 'required|integer',
            'bahasa' => 'required|string',
            'halaman' => 'required|integer',
            'deskripsi' => 'required|string',
            'pdf' => 'sometimes|file|mimes:pdf',
        ];
    }
}
