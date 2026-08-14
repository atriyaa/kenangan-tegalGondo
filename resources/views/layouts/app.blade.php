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

</body>
</html>