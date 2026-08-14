@extends('layouts.app')

@section('title', 'Struktur Anggota - Desa Tegalgondo')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-forest-dark">Struktur Anggota Volunteer</h1>
        <p class="text-sm text-gray-500 mt-1">Tim pengelola dan penggerak kegiatan di Desa Tegalgondo</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($members as $member)
            <div class="bg-white rounded-xl p-6 border border-sage-light text-center shadow-sm">
                <div class="w-20 h-20 bg-sage-light rounded-full mx-auto mb-4 flex items-center justify-center text-forest-dark font-bold text-2xl">
                    {{ substr($member->nama, 0, 1) }}
                </div>
                <h3 class="font-bold text-gray-800 text-lg">{{ $member->nama }}</h3>
                <span class="inline-block px-3 py-1 bg-soft-cream text-forest-dark text-xs font-semibold rounded-full mt-1 mb-3">
                    {{ $member->jabatan }}
                </span>
                <p class="text-xs text-gray-500 leading-relaxed">{{ $member->deskripsi }}</p>
            </div>
        @empty
            <div class="col-span-3 text-center py-8 text-gray-400 text-sm">
                Belum ada data anggota yang dimasukkan.
            </div>
        @endforelse
    </div>
</section>
@endsection