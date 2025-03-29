  <!-- Projects Section -->
  <section class="wp-block alignfull not-prose bg-white">
    <div class="container mx-auto py-24">
      <h2 class="font-heading mb-16 text-center text-6xl uppercase">{{ $heading }}</h2>

      <div class="flex flex-col items-center justify-center gap-16 md:flex-row">
        @foreach ($projects as $project)
          <a href="{{ get_permalink($project->ID) }}" class="max-w-sm text-center">

            {!! get_the_post_thumbnail($project->ID, 'thumbnail') !!}

            <h3 class="clip-heading -mt-8 mb-6 flex items-center bg-black px-8 py-6 text-xl font-bold text-white">
              {{ $project->post_title }} <span class="ml-auto">

                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-auto w-4" viewBox="0 0 20.58 24.75">
                  <path fill="#fff"
                    d="M.95 0s.05.01.12.04l18.87 5.77c.43.13.64.48.64 1.04v11.5c0 .55-.21.89-.64 1L.89 24.75H.8c-.53 0-.8-.35-.8-1.04l.1-7.34c0-.56.22-.9.67-1l12.02-2.66L.77 9.43c-.43-.12-.64-.44-.64-.96L.1 1.09C.1.37.37.01.95.01Z" />
                </svg>
              </span>
            </h3>

            <p class="text-gray-800 mx-auto max-w-xs">
              {{ $project->post_excerpt }}
            </p>
          </a>
        @endforeach
      </div>
    </div>
  </section>
