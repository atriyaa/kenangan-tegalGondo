@extends('layouts.admin')

@section('title', 'Edit Anggota - Admin Tegalgondo')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl p-6 shadow-sm border border-sage-light">
    <h1 class="text-xl font-bold text-forest-dark mb-4">Edit Data Anggota</h1>

    <form action="{{ route('admin.members.update', $member->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
            <input type="text" name="nama" value="{{ old('nama', $member->nama) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan / Peran *</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $member->jabatan) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto Profile</label>
            <input 
                type="file" 
                name="foto" 
                id="foto" 
                accept="image/jpeg,image/png,image/jpg,image/webp" 
                class="w-full border border-gray-300 rounded-lg p-2 text-sm"
            >
            <p class="text-xs text-gray-400 mt-1">Format disarankan: JPG, PNG, WEBP (Maksimal 10MB).</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil *</label>
            <input type="number" name="urutan" value="{{ old('urutan', $member->urutan) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">{{ old('deskripsi', $member->deskripsi) }}</textarea>
        </div>

        <div class="flex justify-end gap-2 pt-4 border-t">
            <a href="{{ route('admin.members.index') }}" class="px-4 py-2 border rounded-lg text-sm text-gray-600">Batal</a>
            <button type="submit" class="px-4 py-2 bg-forest-dark text-white rounded-lg text-sm font-medium hover:bg-opacity-90">Perbarui Data</button>
        </div>
    </form>
</div>
@endsection