@extends('layouts.app')

@section('title', 'Struktur Anggota - Desa Tegalgondo')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-12">
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-forest-dark flex items-center justify-center gap-2">
            <svg class="w-7 h-7 text-forest-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            Struktur Anggota Volunteer
        </h1>
        <p class="text-sm text-gray-500 mt-2">Mengenal orang-orang di balik perjalanan berbagi dan belajar di Desa Tegalgondo</p>
    </div>

    @php
        // Mengambil anggota pertama sebagai Ketua, dan sisanya sebagai Anggota
        $ketua = $members->first();
        $anggotaLain = $members->slice(1);
    @endphp

    @if($members->isNotEmpty())
        {{-- ================= BARIS 1: KETUA (1 CARD DI TENGAH) ================= --}}
        @if($ketua)
            <div class="flex justify-center mb-8">
                <div class="bg-forest-dark text-white rounded-2xl p-8 shadow-xl text-center w-full max-w-md border-2 border-emerald-600">
                    <!-- Foto / Inisial Ketua -->
                    <div class="w-24 h-24 bg-white text-forest-dark rounded-full mx-auto mb-4 flex items-center justify-center font-bold text-3xl shadow-inner border-4 border-yellow-400 overflow-hidden">
                        @if(isset($ketua->foto) && $ketua->foto)
                            <img src="{{ asset('storage/' . $ketua->foto) }}" alt="{{ $ketua->nama }}" class="w-full h-full object-cover">
                        @else
                            {{ substr($ketua->nama, 0, 1) }}
                        @endif
                    </div>
                    
                    <h3 class="font-bold text-xl text-white">{{ $ketua->nama }}</h3>
                    <span class="inline-block px-4 py-1 bg-yellow-400 text-forest-dark text-xs font-bold rounded-full mt-2 mb-3 uppercase tracking-wider">
                        {{ $ketua->jabatan }}
                    </span>
                    <p class="text-xs text-emerald-100 leading-relaxed px-2">{{ $ketua->deskripsi }}</p>
                </div>
            </div>
        @endif

        {{-- ================= BARIS 2: ANGGOTA LAIN (GRID 3 KOLOM) ================= --}}
        @if($anggotaLain->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach($anggotaLain as $member)
                    <div class="bg-forest-dark text-white rounded-2xl p-6 shadow-lg text-center flex flex-col items-center justify-between border border-emerald-800">
                        <div class="w-full">
                            <!-- Foto / Inisial Anggota -->
                            <div class="w-20 h-20 bg-white text-forest-dark rounded-full mx-auto mb-4 flex items-center justify-center font-bold text-2xl shadow-inner border-2 border-emerald-400 overflow-hidden">
                                @if(isset($member->foto) && $member->foto)
                                    <img src="{{ asset('storage/' . $member->foto) }}" alt="{{ $member->nama }}" class="w-full h-full object-cover">
                                @else
                                    {{ substr($member->nama, 0, 1) }}
                                @endif
                            </div>

                            <h3 class="font-bold text-lg text-white">{{ $member->nama }}</h3>
                            <span class="inline-block px-3 py-1 bg-emerald-800 text-emerald-200 text-xs font-medium rounded-full mt-1 mb-3">
                                {{ $member->jabatan }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-300 leading-relaxed">{{ $member->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    @else
        <div class="text-center py-12 text-gray-400 text-sm bg-white rounded-xl shadow-sm border border-gray-100">
            Belum ada data anggota yang dimasukkan.
        </div>
    @endif
</section>
@endsection