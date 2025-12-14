<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard SMK Palebon ')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    tailwind.config = {
            darkMode: 'class',
        }
  </script>
  @livewireStyles
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    .sidebar-hidden {
      transform: translateX(-100%);
    }

    @media (min-width: 768px) {
      .sidebar-hidden {
        transform: translateX(0);
        width: 0;
        overflow: hidden;
      }
    }

    /* Smooth transitions */
    #sidebar {
      transition: all 0.3s ease-in-out;
    }
  </style>

</head>

<body class="h-full bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
  <div class="flex h-full">
    <!-- Sidebar -->

    <x-sidebar />

    <!-- Main Content -->
    <div id="main-content" class="flex-1 flex flex-col overflow-hidden transition-all duration-300">
      <!-- Header -->
      <x-header />
      <!-- Content -->
      <main class="flex-1 overflow-y-auto p-4 bg-gray-50 dark:bg-gray-900">
        <div class="my-6">


          <!-- Cards -->


          <!-- Form Input -->


          <!-- Table -->
          @yield('content')

        </div>

      </main>
    </div>
  </div>
  <script src="{{ asset('assets/js/dash.min.js') }}"> </script>
  @livewireScripts
  <script>
    Livewire.on('toast', ({type, message}) => {
        alert(message); // bisa diganti pakai sweetalert/toastify
    });
  </script>


</body>

</html>