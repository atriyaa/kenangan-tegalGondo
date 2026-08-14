<nav class="bg-white border-b border-sage-light sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <!-- Logo Desa Tegalgondo -->
                    <div class="w-9 h-9 flex-shrink-0 rounded-full overflow-hidden border border-sage-muted/40 shadow-sm">
                        <img src="{{ asset('storage/memories/logo.jpg') }}" 
                            alt="Logo Desa Tegalgondo" 
                            class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Teks Nama Desa -->
                    <span class="text-xl font-bold text-forest-dark tracking-wide">DESA TEGALGONDO</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-forest-dark font-bold border-b-2 border-forest-dark' : 'text-gray-600 hover:text-forest-dark' }} py-2">Home</a>
                <a href="{{ route('members.index') }}" class="{{ request()->routeIs('members.index') ? 'text-forest-dark font-bold border-b-2 border-forest-dark' : 'text-gray-600 hover:text-forest-dark' }} py-2">Anggota</a>
                <a href="{{ route('volunteer.index') }}" class="{{ request()->routeIs('volunteer.index') ? 'text-forest-dark font-bold border-b-2 border-forest-dark' : 'text-gray-600 hover:text-forest-dark' }} py-2">Profil Volunteer</a>
                <a href="{{ route('memories.index') }}" class="{{ request()->routeIs('memories.*') ? 'text-forest-dark font-bold border-b-2 border-forest-dark' : 'text-gray-600 hover:text-forest-dark' }} py-2">Memory</a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.memories.index') }}" class="px-3 py-1.5 bg-forest-dark text-white rounded-lg text-xs font-semibold hover:bg-opacity-90">Dashboard Admin</a>
                    @endif
                @endauth
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex md:hidden items-center">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-gray-600 hover:text-forest-dark focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-sage-light px-4 pt-2 pb-4 space-y-2 text-sm">
        <a href="{{ route('home') }}" class="block py-2 text-gray-700 font-medium">Home</a>
        <a href="{{ route('members.index') }}" class="block py-2 text-gray-700 font-medium">Anggota</a>
        <a href="{{ route('volunteer.index') }}" class="block py-2 text-gray-700 font-medium">Profil Volunteer</a>
        <a href="{{ route('memories.index') }}" class="block py-2 text-gray-700 font-medium">Memory</a>
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.memories.index') }}" class="block py-2 text-forest-dark font-bold">Dashboard Admin</a>
            @endif
        @endauth
    </div>
</nav>