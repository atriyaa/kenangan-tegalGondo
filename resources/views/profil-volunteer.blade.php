@extends('layouts.app')

@section('title', 'Profil Volunteer - Desa Tegalgondo')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl p-8 border border-sage-light shadow-sm">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-forest-dark">{{ $profile->judul ?? 'Volunteer Desa Tegalgondo' }}</h1>
            <p class="text-sm text-accent-gold font-semibold mt-1">{{ $profile->sub_judul ?? 'Membangun Desa, Menginspirasi Bangsa' }}</p>
        </div>

        <div class="space-y-6 text-sm text-gray-600 leading-relaxed">
            <div>
                <h2 class="text-base font-bold text-forest-dark mb-2">Tentang Kami</h2>
                <p>{{ $profile->deskripsi ?? 'Belum ada deskripsi profil.' }}</p>
            </div>

            @if(!empty($profile->visi))
                <div>
                    <h2 class="text-base font-bold text-forest-dark mb-2">Visi</h2>
                    <p>{{ $profile->visi }}</p>
                </div>
            @endif

            @if(!empty($profile->misi))
                <div>
                    <h2 class="text-base font-bold text-forest-dark mb-2">Misi</h2>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach(explode("\n", $profile->misi) as $misi)
                            @if(trim($misi))
                                <li>{{ trim($misi) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!empty($profile->alamat) || !empty($profile->email) || !empty($profile->telepon))
                <div class="border-t pt-4 text-xs text-gray-500">
                    <h3 class="font-bold text-forest-dark text-sm mb-2">Informasi Kontak</h3>
                    <p>📍 {{ $profile->alamat }}</p>
                    <p>✉️ {{ $profile->email }}</p>
                    <p>📞 {{ $profile->telepon }}</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection