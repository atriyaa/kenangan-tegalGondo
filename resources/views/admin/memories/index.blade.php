@extends('layouts.admin')

@section('title', 'Tabel Kenangan - Admin Desa Tegalgondo')

@section('content')
<div class="bg-white rounded-2xl p-6 shadow-sm border border-sage-light">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-forest-dark">Tabel Kenangan Desa</h1>
            <p class="text-sm text-gray-500">Kelola dokumentasi foto dan video Desa Tegalgondo</p>
        </div>
        <a href="{{ route('admin.memories.create') }}" class="px-4 py-2 bg-forest-dark text-white rounded-lg text-sm font-medium hover:bg-opacity-90">+ Tambah Kenangan</a>
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
                    <th class="py-3 px-2">No</th>
                    <th class="py-3 px-4">Media</th>
                    <th class="py-3 px-4">Caption</th>
                    <th class="py-3 px-4">Tanggal</th>
                    <th class="py-3 px-4">Tempat</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse ($memories as $index => $item)
                    <tr>
                        <td class="py-3 px-2 text-gray-500">{{ $memories->firstItem() + $index }}</td>
                        <td class="py-3 px-4">
                            @if ($item->media_type === 'image')
                                <img src="{{ asset('storage/' . $item->media_path) }}" class="w-16 h-12 object-cover rounded-lg border">
                            @else
                                <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded">Video</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 max-w-xs truncate font-medium text-gray-800">{{ $item->caption }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $item->tanggal->format('d M Y') }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $item->tempat ?? '-' }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.memories.edit', $item->id) }}" class="px-3 py-1 bg-sage-light text-forest-dark rounded hover:bg-sage-muted">Edit</a>
                                <form action="{{ route('admin.memories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kenangan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-400">Belum ada kenangan yang diunggah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $memories->links() }}
    </div>
</div>
@endsection