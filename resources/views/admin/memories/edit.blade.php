@extends('layouts.admin')

@section('title', 'Tabel Kenangan - Admin Desa Tegalgondo')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl p-6 shadow-sm border border-[#DCEAD6]">
        <h1 class="text-xl font-bold text-[#406B46] mb-4">Edit Kenangan</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.memories.update', $memory->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Media (Biarkan kosong jika tidak diganti)</label>
                @if ($memory->media_type === 'image')
                    <img src="{{ asset('storage/' . $memory->media_path) }}" class="w-24 h-24 object-cover rounded-lg mb-2 border">
                @endif
                <input type="file" name="media" class="w-full text-sm text-gray-500 border border-gray-300 rounded-lg p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Caption / Deskripsi *</label>
                <textarea name="caption" rows="3" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-2 focus:ring-[#6DBF6A] outline-none">{{ old('caption', $memory->caption) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal *</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $memory->tanggal->format('Y-m-d')) }}" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-2 focus:ring-[#6DBF6A] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tempat (Opsional)</label>
                    <input type="text" name="tempat" value="{{ old('tempat', $memory->tempat) }}" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-2 focus:ring-[#6DBF6A] outline-none">
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-4 border-t">
                <a href="{{ route('admin.memories.index') }}" class="px-4 py-2 border rounded-lg text-sm text-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-[#406B46] text-white rounded-lg text-sm font-medium hover:bg-[#325437]">Perbarui Kenangan</button>
            </div>
        </form>
    </div>
@endsection