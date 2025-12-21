<div>

  <header class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar"
    x-data="{ open: false, mobileMenu: false }">
    <nav class="container mx-auto flex justify-between items-center py-5 px-6">
      <!-- Logo -->
      <a href="{{ route('home') }}">
        <img src="{{asset('assets/images/smk_palebon_logo.png')}}" alt="Logo SMK" class="h-12 md:h-16 transition-all">

      </a>
      <a href="{{ route('home') }}"
        class="flex justify-center items-center ml-2 font-light text-2xl sm:text-3xl sm:font-bold text-blue-500">SMK
        &nbsp;
        <span class="text-secondary">PALEBON</span></span></a>

      <div class="hidden lg:flex items-center space-x-1  text-gray-900 ">
        @foreach ($menus as $menu)

        @if($menu->children->count())
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open" class="flex items-center px-5 py-3 hover:text-secondary transition rounded-lg">
            {{ ucwords($menu->nama) }} <svg class="w-4 h-4 ml-1 transition-transform" :class="open ? 'rotate-180' : ''"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" @click.away="open = false"
            class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-20"
            x-transition>
            @foreach ($menu->children as $child)
            <a href="{{url( $child->url ?? '#') }}"
              class="block px-6 py-4 hover:bg-orange-50 hover:text-secondary transition">
              {{ ucwords($child->nama) }}
            </a>
            @endforeach
          </div>
        </div>
        @else
        <a href="{{url($menu->url ?? '#') }}" class="px-5 py-3 hover:text-secondary transition rounded-lg">
          {{ ucwords($menu->nama) }}
        </a>
        @endif
        @endforeach
      </div>


      <div class="hidden md:block">

        <a href="ppdb.html"
          class="bg-secondary text-white px-5 py-3 rounded-full hover:bg-orange-600 transition shadow-lg ml-4">
          PPDB 2025/2026
        </a>
      </div>


      <!-- Mobile Menu Button -->
      <button @click="mobileMenu = !mobileMenu" class="lg:hidden text-3xl text-gray-700">
        <svg x-show="!mobileMenu" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="mobileMenu" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </nav>

    <!-- Mobile Menu (Accordion Style) -->
    <div x-show="mobileMenu" x-transition class="lg:hidden bg-white shadow-2xl border-t">
      <div class="px-6 py-4 space-y-1">

        @foreach ($menus as $menu)

        @if($menu->children->count())
        <div x-data="{ open: false }">
          <button @click="open = !open" class="w-full text-left flex justify-between items-center py-3 font-medium">
            {{ strtoupper($menu->nama) }} <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div x-show="open" x-transition.duration.300ms class="pl-6 space-y-2 pb-3">
            @foreach ($menu->children as $child)
            <a href="{{ $child->url ?? '#' }}" class="block py-2 text-gray-600 hover:text-secondary">
              {{ $child->nama }} </a>
            @endforeach
          </div>
        </div>
        @else
        <a href="{{ $menu->url ?? '#' }}" class="block py-3 hover:text-secondary font-medium">
          {{ $menu->nama }}
        </a>
        @endif
        @endforeach

        <a href="ppdb.html"
          class="block py-4 mt-4 bg-secondary text-white rounded-xl font-bold  hover:bg-orange-600 transition shadow-lg text-xs">
          PPDB 2025/2026
        </a>
      </div>

    </div>
  </header>
</div>