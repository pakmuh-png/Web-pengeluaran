<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Pengeluaran Material</title>
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'BlinkMacSystemFont', '-apple-system', 'Segoe UI', 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-cream-50">
    <!-- Navigation -->
    @include('components.navbar')

    <!-- Hero Section -->
    <section id="hero" class="relative h-screen overflow-hidden">
        @include('pages.hero')
    </section>

    <!-- Footer -->
    <footer class="bg-amber-800 text-cream-100 py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-amber-200">
                PKT FUTURE IS OURS
            </p>
        </div>
    </footer>
</body>
</html>
