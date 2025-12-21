<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>{{ config('app.name', 'smk palebon') }} | @yield('title')</title>
 <meta name="description"
  content="SMK Negeri Palebon Semarang - Sekolah kejuruan terbaik dengan jurusan unggulan dan lulusan tersalurkan 98%">


 <!-- AOS Animation -->
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 @vite('resources/css/app.css')
 @vite('resources/js/app.js')
 @yield('styles')
 <style>
  .navbar-scrolled {
   background: rgba(255, 255, 255, 0.95);
   backdrop-filter: blur(10px);
   box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }
 </style>
</head>

<body class="font-sans text-gray-800">
 <!-- NAVBAR DENGAN DROPDOWN (Desktop + Mobile Friendly) -->
 <x-front.__header />



 @yield('content')
 <section class="relative">

  <x-front.__footer />
 </section>

 <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
 {{-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
 </script> --}}


 @stack('scripts')
 <script>
  AOS.init({
            duration: 800,
            once: true,
        });
 </script>


 // Navbar scroll effect
 <script>
  <x-front.__scripts />
 </script>

</body>

</html>