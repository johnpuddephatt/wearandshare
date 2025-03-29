<header class="absolute left-0 right-0 top-4 z-20">

  <div>
    <div class="container flex max-w-none items-center justify-between">

      <a href="{{ home_url() }}">
        <x-logo-simple :invert="true" class="w-28 text-black 2xl:w-40" />
      </a>

      <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }"
        class="rounded-small border-blue-bright hover:bg-green inline-block border-2 px-6 py-2 font-semibold !no-underline transition duration-300 hover:bg-opacity-20 lg:hidden"
        aria-label="Open navigation menu" title="Open navigation menu">Menu
      </button>

      <button @click="menuOpen = false" :class="{ 'hidden': !menuOpen }" class="absolute -top-2 right-4 z-40 lg:hidden"
        aria-label="Close navigation menu" title="Close navigation menu"><svg xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-12 rounded-full bg-white bg-opacity-75 p-2 transition hover:bg-opacity-100 hover:text-black">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

      @if ($primaryNavigation)

        <nav x-cloak :class="{ 'max-lg:translate-x-full': !menuOpen }"
          class="flex flex-col justify-center overflow-y-auto transition max-lg:fixed max-lg:inset-0 max-lg:top-0 max-lg:z-20 max-lg:h-full max-lg:w-full max-lg:bg-blue max-lg:py-36">

          <ul class="flex flex-col gap-4 max-lg:container lg:flex-row lg:gap-12">
            @foreach ($primaryNavigation as $item)
              <li>
                <a class="max-w-lg:text-white md:text-blue-dark white inline-block text-lg font-semibold max-lg:text-2xl lg:py-2"
                  href="{{ $item->url }}">{!! $item->label !!}</a>
              </li>
            @endforeach
          </ul>

          @if ($secondaryNavigation)
            <nav class="container mt-6 border-t border-white border-opacity-30 pt-6 lg:hidden">
              <ul class="flex flex-col gap-2 text-lg font-semibold text-white">
                @foreach ($secondaryNavigation as $item)
                  <li>
                    <a class="inline-block" href="{{ $item->url }}">{!! $item->label !!}</a>
                  </li>
                @endforeach
              </ul>
            </nav>
          @endif
        </nav>
      @endif
    </div>
  </div>
</header>
