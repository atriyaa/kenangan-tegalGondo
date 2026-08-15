<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kenangan Desa Tegalgondo')</title>
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

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-bg-light font-sans text-gray-800 flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Script SweetAlert2 & Custom Notifications -->
    <script>
        // Mixin Toast Mengambang di Pojok Kanan Atas
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        // 1. Alert Berhasil (Toast Hijau Forest - Emas)
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                background: '#406B46',
                color: '#ffffff',
                iconColor: '#C8A24A'
            });
        @endif

        // 2. Alert Gagal / System Error (Popup Modal Estetik)
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal Memproses!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#406B46',
                customClass: {
                    popup: 'rounded-2xl border-2 border-red-400 shadow-2xl'
                }
            });
        @endif

        // 3. Alert Error Validasi Input Form
        @if($errors->any())
            Swal.fire({
                icon: 'warning',
                title: 'Periksa Kembali Form!',
                html: '<ul class="text-left text-sm space-y-1">@foreach($errors->all() as $error)<li>• {{ $error }}</li>@endforeach</ul>',
                confirmButtonColor: '#406B46',
                customClass: {
                    popup: 'rounded-2xl border-2 border-accent-gold shadow-2xl'
                }
            });
        @endif

        // 4. Fungsi Konfirmasi Hapus Data Estetik
        function confirmDelete(button) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>
</body>
</html>