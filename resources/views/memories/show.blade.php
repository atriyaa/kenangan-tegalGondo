@extends('layouts.app')

@section('title', 'Detail Memory - Desa Tegalgondo')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-8">
    <a href="{{ route('memories.index') }}" class="text-sm text-forest-dark font-medium hover:underline mb-4 inline-block">← Kembali ke Galeri</a>

    <div class="bg-white rounded-2xl overflow-hidden border border-sage-light shadow-sm p-6">
        <div class="mb-6 rounded-xl overflow-hidden bg-black flex justify-center">
            @if($memory->media_type === 'image')
                <img src="{{ asset('storage/' . $memory->media_path) }}" class="max-h-[500px] w-auto object-contain">
            @else
                <video controls class="w-full max-h-[500px]">
                    <source src="{{ asset('storage/' . $memory->media_path) }}">
                    Browser Anda tidak mendukung penayangan video.
                </video>
            @endif
        </div>

        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
            <span>📅 {{ $memory->tanggal->format('d F Y') }}</span>
            <span>📍 {{ $memory->tempat ?? 'Desa Tegalgondo' }}</span>
        </div>

        <h1 class="text-xl font-bold text-gray-800 leading-relaxed">
            {{ $memory->caption }}
        </h1>
    </div>
</section>
@endsection