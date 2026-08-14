<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'media' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,mp4,mov', 'max:20480'],
            'caption' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'tempat' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'media.mimes' => 'Format berkas harus berupa JPG, PNG, WEBP, MP4, atau MOV.',
            'media.max' => 'Ukuran berkas tidak boleh melebihi 20MB.',
            'caption.required' => 'Caption wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
        ];
    }
}