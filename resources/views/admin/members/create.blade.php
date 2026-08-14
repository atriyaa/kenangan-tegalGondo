@extends('layouts.admin')

@section('title', 'Tambah Anggota - Admin Tegalgondo')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl p-6 shadow-sm border border-sage-light">
    <h1 class="text-xl font-bold text-forest-dark mb-4">Tambah Anggota Baru</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.members.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan / Peran *</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}" placeholder="Contoh: Ketua Volunteer Desa" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil *</label>
            <input type="number" name="urutan" value="{{ old('urutan', 1) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
            <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="flex justify-end gap-2 pt-4 border-t">
            <a href="{{ route('admin.members.index') }}" class="px-4 py-2 border rounded-lg text-sm text-gray-600">Batal</a>
            <button type="submit" class="px-4 py-2 bg-forest-dark text-white rounded-lg text-sm font-medium hover:bg-opacity-90">Simpan Anggota</button>
        </div>
    </form>
</div>
@endsection