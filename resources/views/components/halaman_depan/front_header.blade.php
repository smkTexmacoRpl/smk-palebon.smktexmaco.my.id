<nav x-data="{ open: false, dropdown: '' }" class="bg-white shadow-md  fixed top-0 left-0 right-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">
      <div class="shrink-0 flex items-center">
        <img class="h-10 w-auto" src="{{ asset('assets/images/smk_palebon_logo.png')}}" alt="Logo SMK Palebon" />
        <span class="font-bold text-xl ml-3 text-gray-800">SMK PALEBON</span>
      </div>

      <div class="hidden md:flex md:items-center md:space-x-8">
        @foreach ($menus as $menu)
        @if($menu->children->count())
        <!-- Menu dengan dropdown -->
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open" @click.away="open = false" type="button"
            class="flex items-center font-medium text-gray-600 hover:text-blue-600 focus:outline-none">
            {{ $menu->nama }}
            <svg class="ml-1 h-5 w-5 text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}"
              xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>

          <!-- Dropdown anak -->
          <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute z-10 mt-3 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
            <div class="py-1">
              @foreach($menu->children as $child)
              <a href="{{ url($child->url ?? '#') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                {{ $child->nama }}
              </a>
              @endforeach
            </div>
          </div>
        </div>
        @else
        <!-- Menu biasa tanpa dropdown -->
        <a href="{{ url($menu->url ?? '#') }}" class="font-medium text-gray-600 hover:text-blue-600">
          {{ $menu->nama }}
        </a>
        @endif
        @endforeach
      </div>


      <div class="hidden md:block">
        <a href="#"
          class="inline-flex items-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
          PPDB
        </a>
      </div>

      <div class="md:hidden flex items-center">
        <button @click="open = !open" type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg :class="{'block': open, 'hidden': !open }" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div x-show="open" class="md:hidden" id="mobile-menu" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95">

    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      @foreach ($menus as $menu)
      @if ($menu->children->count())
      <!-- Dropdown untuk mobile -->
      <div x-data="{ openDropdown: false }" class="border-b border-gray-100">
        <button @click="openDropdown = !openDropdown" type="button"
          class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
          <span>{{ $menu->nama }}</span>
          <svg class="ml-2 h-5 w-5 text-gray-400 transition-transform duration-200"
            :class="{'rotate-180': openDropdown}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <!-- Isi dropdown -->
        <div x-show="openDropdown" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
          x-transition:leave-end="opacity-0 -translate-y-1" class="mt-1 pl-6 space-y-1">
          @foreach ($menu->children as $child)
          <a href="{{ url($child->url ?? '#') }}"
            class="block px-3 py-2 rounded-md text-sm text-gray-600 hover:bg-gray-100">
            {{ $child->nama }}
          </a>
          @endforeach
        </div>
      </div>
      @else
      <!-- Menu biasa tanpa dropdown -->
      <a href="{{ url($menu->url ? '#'.$menu->url : '#') }}"
        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">
        {{ $menu->nama }}
      </a>
      @endif
      @endforeach
    </div>
    <div class="px-5 py-3">
      <a href="#"
        class="block w-full text-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
        Apply Now
      </a>
    </div>
  </div>

</nav>