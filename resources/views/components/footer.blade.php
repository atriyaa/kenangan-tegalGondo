<footer class="bg-forest-dark text-white pt-10 pb-6 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <h3 class="text-lg font-bold text-accent-gold mb-2">Desa Tegalgondo</h3>
                <p class="text-sm text-sage-light leading-relaxed">
                    Membangun Desa, Menginspirasi Bangsa. Dokumentasi kenangan, aktivitas, dan gotong royong warga Desa Tegalgondo.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-accent-gold mb-3">Navigasi</h4>
                <ul class="space-y-2 text-sm text-sage-light">
                    <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                    <li><a href="{{ route('members.index') }}" class="hover:underline">Anggota</a></li>
                    <li><a href="{{ route('volunteer.index') }}" class="hover:underline">Profil Volunteer</a></li>
                    <li><a href="{{ route('memories.index') }}" class="hover:underline">Galeri Memory</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold text-accent-gold mb-3">Hubungi Kami</h4>
                <p class="text-sm text-sage-light mb-1">Jl. Tegalgondo No. 123, Karangploso, Malang</p>
                <p class="text-sm text-sage-light">Email: info@tegalgondo.desa.id</p>
            </div>
        </div>

        <div class="border-t border-sage-muted/30 pt-4 text-center text-xs text-sage-light">
            &copy; {{ date('Y') }} Desa Tegalgondo. All rights reserved.
        </div>
    </div>
</footer>