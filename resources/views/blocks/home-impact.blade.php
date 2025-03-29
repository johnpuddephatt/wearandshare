@if ($impacts)
  <!-- Impact Section -->
  <section class="wp-block alignfull not-prose bg-white py-16">
    <div class="mx-auto max-w-6xl">
      <h2 class="font-heading mb-16 text-center text-6xl uppercase">{{ $heading }}</h2>

      <div class="grid gap-8 md:grid-cols-3">

        @foreach ($impacts as $impact)
          <div class="text-center">

            <div class="relative mx-4">
              <svg xmlns="http://www.w3.org/2000/svg"
                class="{{ match ($loop->index) {
                    0 => '-rotate-45 translate-y-4',
                    1 => 'rotate-[110deg] -translate-x-4 -translate-y-4',
                    2 => 'rotate-[35deg]',
                    3 => 'rotate-135',
                    default => 'rotate-180',
                } }}"
                viewBox="0 0 329.6 258.06">
                <defs>
                  <style>
                    .prefix__cls-3 {
                      fill: #48d2f7;
                      opacity: .3
                    }
                  </style>
                </defs>
                <circle cx="168.96" cy="118.12" r="103.65" fill="#48d2f7" />
                <path fill="none" stroke="#fff" stroke-dasharray="6.36" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="1.06"
                  d="M79.6.53s-33.25 123.34 39.17 140.29c72.43 16.96 88.37-109.61 88.37-109.61s5.28-24.39 39.6-22.4c39.1 2.27 57.12 88.21-12.35 121.19-69.47 32.97-25.72 127.53-25.72 127.53" />
                <circle cx="35.35" cy="81.75" r="35.34" class="prefix__cls-3" />
                <circle cx="306.54" cy="183.35" r="23.06" class="prefix__cls-3" />
                >
              </svg>
              {!! wp_get_attachment_image($impact['image'], 'thumbnail', null, [
                  'class' => 'bottom-0 right-0 absolute top-[16.667%] left-0 h-2/3 w-full object-contain object-center',
              ]) !!}
            </div>

            <!-- Statistic -->
            <div class="mb-4">
              <span class="font-heading text-6xl">{{ $impact['title'] ?? '' }}</span>
            </div>

            <!-- Description -->
            <p class="mx-auto max-w-xs text-lg">
              {{ $impact['description'] ?? '' }}
            </p>
          </div>
        @endforeach

      </div>
    </div>
  </section>
@else
  <div class="rounded-xl bg-blue p-8 text-center text-white">
    <h2 class="mb-4 text-3xl font-bold">Empty</h2>
  </div>

@endif
