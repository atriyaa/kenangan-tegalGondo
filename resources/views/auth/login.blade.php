<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kenangan Desa Tegalgondo</title>
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
<body class="bg-bg-light flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-sage-light p-8">
        
        <!-- Branding Logo & Title -->
        <div class="text-center mb-6">
            <!-- Logo Desa Tegalgondo di atas teks -->
            <div class="w-16 h-16 mx-auto mb-3 rounded-full overflow-hidden border-2 border-sage-muted/40 shadow-sm">
                <img src="{{ asset('storage/memories/logo.jpg') }}" 
                     alt="Logo Desa Tegalgondo" 
                     class="w-full h-full object-cover">
            </div>

            <h1 class="text-2xl font-bold text-forest-dark">Desa Tegalgondo</h1>
            <p class="text-xs text-gray-500 mt-1">Sistem Masuk Pengelola & Warga</p>
        </div>

        <!-- Session Error Notification -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-lg text-xs">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.perform') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-green-accent focus:border-transparent outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 mb-1">Kata Sandi</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-green-accent focus:border-transparent outline-none">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-forest-dark focus:ring-green-accent mr-2">
                    Ingat Saya
                </label>
            </div>

            <button type="submit" 
                class="w-full py-2.5 bg-forest-dark hover:bg-opacity-90 text-white font-medium rounded-lg text-sm transition duration-200">
                Masuk
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-gray-500 border-t border-sage-light pt-4">
            <a href="{{ route('home') }}" class="text-forest-dark font-medium hover:underline">← Kembali ke Beranda Utama</a>
        </div>
    </div>
</body>
</html>