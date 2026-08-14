@extends('layouts.app')

@section('title', 'Galeri Memory - Desa Tegalgondo')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-8">
    
    <!-- Header Halaman & Form Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-forest-dark">Galeri Kenangan Desa</h1>
            <p class="text-sm text-gray-500">Seluruh album momen bersejarah dan kegiatan gotong royong</p>
        </div>

        <!-- FORM FILTER TANGGAL -->
        <form action="{{ route('memories.index') }}" method="GET" class="flex items-center gap-2 bg-white p-2 rounded-xl border border-sage-light shadow-sm">
            <label for="tanggal" class="text-xs font-semibold text-gray-600 pl-2">Filter Tanggal:</label>
            <input type="date" 
                   id="tanggal" 
                   name="tanggal" 
                   value="{{ request('tanggal') }}" 
                   class="border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-gray-700 outline-none focus:ring-2 focus:ring-green-accent">
            
            <button type="submit" 
                    class="px-3 py-1.5 bg-forest-dark text-white rounded-lg text-xs font-medium hover:bg-opacity-90 transition">
                Cari
            </button>

            <!-- Tombol Reset (Hanya muncul jika filter sedang aktif) -->
            @if(request('tanggal'))
                <a href="{{ route('memories.index') }}" 
                   class="px-3 py-1.5 bg-gray-100 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-200 transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- NOTIFIKASI FILTER AKTIF -->
    @if(request('tanggal'))
        <div class="mb-6 p-3 bg-soft-cream border border-sage-muted text-forest-dark rounded-xl text-xs flex justify-between items-center">
            <span>Menampilkan kenangan untuk tanggal: <strong>{{ \Carbon\Carbon::parse(request('tanggal'))->format('d F Y') }}</strong></span>
            <a href="{{ route('memories.index') }}" class="underline font-semibold hover:text-forest-dark">Tampilkan Semua Kenangan</a>
        </div>
    @endif

    <!-- GRID MEMORY -->
    @if($memories->isEmpty())
        <div class="bg-white rounded-xl p-12 text-center border border-sage-light">
            <p class="text-gray-400 text-sm">Tidak ada kenangan yang ditemukan untuk tanggal ini.</p>
            @if(request('tanggal'))
                <a href="{{ route('memories.index') }}" class="inline-block mt-3 px-4 py-2 bg-forest-dark text-white rounded-lg text-xs font-medium">Lihat Semua Kenangan</a>
            @endif
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            @foreach($memories as $item)
                <a href="{{ route('memories.show', $item->id) }}" class="bg-white rounded-xl overflow-hidden border border-sage-light hover:shadow-md transition group">
                    <div class="h-48 bg-gray-100 overflow-hidden">
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
                        <p class="text-sm font-semibold text-gray-800 line-clamp-2 group-hover:text-forest-dark">{{ $item->caption }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div>
            {{ $memories->links() }}
        </div>
    @endif
</section>
@endsection