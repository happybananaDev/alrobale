<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9D5FL1Q3CK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9D5FL1Q3CK');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato&family=Shalimar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles
    <title>Agriturismo Al Robale</title>
</head>
<body class="overflow-x-hidden">
    <style> @import url('https://fonts.googleapis.com/css2?family=Lato&family=Shalimar&display=swap'); </style>
    {{-- Zoom in images modal --}}
    @include('partials._image-modal')
    {{-- Logout button --}}
    @auth
        <form action="/logout" method="POST" class="absolute top-2 right-2 z-50">
            @csrf
            <button class="py-2 px-4 bg-red-500 text-white text-xl font-semibold
            border-2 border-white rounded-lg">Logout</button>
        </form>
    @endauth
    {{-- Main content --}}
    <main class="container mx-auto">
        @yield('content')
        @yield('gallery')
        @yield('admin')
        {{-- Back to top btn --}}
        <div class="text-5xl fixed bottom-5 right-5 z-20">
            <i id="to-top-btn" class="fa-solid fa-circle-chevron-up text-yellow-900
            cursor-pointer hidden"></i>
        </div>
    </main>

    @livewireScripts

    <script src="{{asset('js/gallery.js')}}" defer></script>
    <script src="{{asset('js/functions.js')}}" defer></script>
    <script src="{{asset('js/map.js')}}" defer></script>
</body>
</html>
