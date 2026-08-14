@extends('layouts.admin')

@section('title', 'Edit Profil Volunteer - Admin Tegalgondo')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-2xl p-6 shadow-sm border border-sage-light">
    <h1 class="text-2xl font-bold text-forest-dark mb-1">Edit Halaman Profil Volunteer</h1>
    <p class="text-sm text-gray-500 mb-6">Ubah konten deskripsi, visi, misi, dan kontak organisasi</p>

    @if (session('success'))
        <div class="mb-4 p-4 bg-soft-cream border border-sage-muted text-forest-dark rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.volunteer-profile.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Utama *</label>
                <input type="text" name="judul" value="{{ old('judul', $profile->judul) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sub Judul / Slogan *</label>
                <input type="text" name="sub_judul" value="{{ old('sub_judul', $profile->sub_judul) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap *</label>
            <textarea name="deskripsi" rows="4" required class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
            <textarea name="visi" rows="2" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">{{ old('visi', $profile->visi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Misi (Pisahkan tiap poin dengan baris baru / Enter)</label>
            <textarea name="misi" rows="4" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">{{ old('misi', $profile->misi) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 border-t pt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Kontak</label>
                <input type="text" name="alamat" value="{{ old('alamat', $profile->alamat) }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $profile->telepon) }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm outline-none focus:ring-2 focus:ring-green-accent">
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t">
            <button type="submit" class="px-6 py-2 bg-forest-dark text-white rounded-lg text-sm font-medium hover:bg-opacity-90">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection