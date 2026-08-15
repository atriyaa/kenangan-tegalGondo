<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Desa Tegalgondo')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'soft-cream': '#EAF2E6',
                        'sage-light': '#DCEAD6',
                        'sage-muted': '#A8C5A1',
                        'green-accent': '#6DBF6A',
                        'forest-dark': '#406B46',
                        'accent-gold': '#C8A24A',
                        'bg-light': '#F6F7F2',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bg-light font-sans text-gray-800 antialiased flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-forest-dark text-white flex-shrink-0 hidden md:flex flex-col justify-between shadow-lg">
        <div>
            <!-- Branding Logo & Nama Desa -->
            <div class="p-5 border-b border-sage-muted/20 flex items-center gap-3">
                <!-- Container Bulat Sempurna (Pangkas/Crop Pinggiran Gambar) -->
                <div class="w-11 h-11 flex-shrink-0 rounded-full overflow-hidden border-2 border-sage-muted/40 shadow-sm">
                    <img src="{{ asset('images/logo.jpg') }}" 
                        alt="Logo Desa Tegalgondo" 
                        class="w-full h-full object-cover">
                </div>
                
                <div>
                    <h1 class="text-lg font-bold text-accent-gold leading-tight">Desa Tegalgondo</h1>
                    <p class="text-xs text-sage-light mt-0.5">Panel Pengelola</p>
                </div>
            </div>

            <!-- Menu Navigation -->
            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.memories.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.memories.*') ? 'bg-accent-gold text-forest-dark font-bold' : 'text-sage-light hover:bg-forest-dark/50 hover:text-white' }}">
                    📸 <span>Kelola Memory</span>
                </a>

                <a href="{{ route('admin.members.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.members.*') ? 'bg-accent-gold text-forest-dark font-bold' : 'text-sage-light hover:bg-forest-dark/50 hover:text-white' }}">
                    👥 <span>Kelola Anggota</span>
                </a>

                <a href="{{ route('admin.volunteer-profile.edit') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.volunteer-profile.*') ? 'bg-accent-gold text-forest-dark font-bold' : 'text-sage-light hover:bg-forest-dark/50 hover:text-white' }}">
                    ℹ️ <span>Profil Volunteer</span>
                </a>
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="p-4 border-t border-sage-muted/20 space-y-2">
            <a href="{{ route('home') }}" target="_blank" class="block text-center py-2 px-3 bg-forest-dark/80 hover:bg-forest-dark border border-sage-muted/30 rounded-lg text-xs text-sage-light">
                🌐 Lihat Website
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2 px-3 bg-red-600/20 hover:bg-red-600 text-red-200 hover:text-white rounded-lg text-xs font-semibold transition">
                    🚪 Keluar (Logout)
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Mobile Header Navbar -->
        <header class="bg-white border-b border-sage-light p-4 flex md:hidden justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-tegalgondo.png') }}" alt="Logo" class="w-7 h-7 object-contain">
                <span class="font-bold text-forest-dark">Admin Tegalgondo</span>
            </div>
            <div class="flex gap-2 text-xs">
                <a href="{{ route('admin.memories.index') }}" class="px-2 py-1 bg-sage-light rounded">Memory</a>
                <a href="{{ route('admin.members.index') }}" class="px-2 py-1 bg-sage-light rounded">Anggota</a>
                <a href="{{ route('admin.volunteer-profile.edit') }}" class="px-2 py-1 bg-sage-light rounded">Profil</a>
            </div>
        </header>

        <!-- Main Workspace -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            <div class="max-w-6xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>