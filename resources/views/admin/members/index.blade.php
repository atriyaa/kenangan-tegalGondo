@extends('layouts.admin')

@section('title', 'Kelola Anggota - Admin Desa Tegalgondo')

@section('content')
<div class="bg-white rounded-2xl p-6 shadow-sm border border-sage-light">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-forest-dark">Daftar Anggota / Volunteer</h1>
            <p class="text-sm text-gray-500">Kelola susunan pengurus dan penggerak desa</p>
        </div>
        <a href="{{ route('admin.members.create') }}" class="px-4 py-2 bg-forest-dark text-white rounded-lg text-sm font-medium hover:bg-opacity-90">+ Tambah Anggota</a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-soft-cream border border-sage-muted text-forest-dark rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-200 text-sm font-semibold text-gray-600">
                    <th class="py-3 px-2">Urutan</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Jabatan</th>
                    <th class="py-3 px-4">Deskripsi</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse ($members as $item)
                    <tr>
                        <td class="py-3 px-2 font-bold text-forest-dark">#{{ $item->urutan }}</td>
                        <td class="py-3 px-4 font-semibold text-gray-800">{{ $item->nama }}</td>
                        <td class="py-3 px-4 text-gray-600"><span class="px-2 py-1 bg-soft-cream text-forest-dark rounded text-xs">{{ $item->jabatan }}</span></td>
                        <td class="py-3 px-4 text-gray-500 max-w-xs truncate">{{ $item->deskripsi ?? '-' }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.members.edit', $item->id) }}" class="px-3 py-1 bg-sage-light text-forest-dark rounded hover:bg-sage-muted">Edit</a>
                                <form action="{{ route('admin.members.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">Belum ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection