@extends('layouts.app')

@section('title', 'Beranda - Kenangan Desa Tegalgondo')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-b from-sage-light/40 to-bg-light py-12 border-b border-sage-light/50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-forest-dark mb-3">Selamat datang di Desa Tegalgondo</h1>
        <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
            Arsip digital dokumentasi kegiatan, kenangan, dan kebersamaan warga serta volunteer Desa Tegalgondo.
        </p>
    </div>
</section>

<!-- Latest Memories (3 kolom x 2 baris) -->
<section class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-forest-dark">Kenangan Terbaru</h2>
            <p class="text-xs text-gray-500">Aktivitas dan kegiatan terkini di desa</p>
        </div>
        <a href="{{ route('memories.index') }}" class="text-sm font-semibold text-forest-dark hover:underline">Lihat Semua →</a>
    </div>

    @if($latestMemories->isEmpty())
        <div class="bg-white rounded-xl p-8 text-center border border-sage-light">
            <p class="text-gray-400 text-sm">Belum ada kenangan yang diunggah.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestMemories as $item)
                <a href="{{ route('memories.show', $item->id) }}" class="bg-white rounded-xl overflow-hidden border border-sage-light hover:shadow-md transition group">
                    <div class="h-48 bg-gray-100 overflow-hidden relative">
                        @if($item->media_type === 'image')
                            <img src="{{ asset('storage/' . $item->media_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-800 text-white font-semibold">
                                🎬 Video Kenangan
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-center text-xs text-gray-400 mb-2">
                            <span>📅 {{ $item->tanggal->format('d M Y') }}</span>
                            <span>📍 {{ $item->tempat ?? 'Desa Tegalgondo' }}</span>
                        </div>
                        <p class="text-sm font-semibold text-gray-800 line-clamp-2 group-hover:text-forest-dark">
                            {{ $item->caption }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</section>
@endsection