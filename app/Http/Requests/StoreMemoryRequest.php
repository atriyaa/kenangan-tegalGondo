<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'media' => ['required', 'file', 'mimes:jpg,jpeg,heic,png,webp,mp4,mov', 'max:20480'], // Maksimal 20MB
            'caption' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'tempat' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'media.required' => 'Berkas media (gambar/video) wajib diunggah.',
            'media.mimes' => 'Format berkas harus berupa JPG, PNG, WEBP, MP4, atau MOV.',
            'media.max' => 'Ukuran berkas tidak boleh melebihi 20MB.',
            'caption.required' => 'Caption wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diisi.',
        ];
    }
}