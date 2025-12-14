<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMK Palebon </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="style.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

  <style>
    /* Opsi: Menambahkan text-shadow sederhana untuk keterbacaan di hero */

    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap");

    .text-shadow {
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    body {
      font-family: "Roboto", sans-serif;
    }
  </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">
  <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
    <x-front_header />
    <main class="flex-1">

      @yield('content')

    </main>
    <footer
      class="border-t border-background-dark/10 bg-background-light py-8 dark:border-background-light/10 dark:bg-background-dark/50">
      <div class="mx-auto max-w-7xl px-4 text-center text-sm text-background-dark/60 dark:text-background-light/60">
        <p>© 2025 SMK PALEBON. All Rights Reserved.</p>
      </div>
    </footer>
  </div>

  <x-front_script />
  @stack('scripts')
</body>

</html>