  <!-- Projects Section -->
  <section class="wp-block alignfull not-prose {{ $invert ? 'bg-black text-white' : 'bg-blue' }} my-12">
    <div class="max-w-8xl container mx-auto flex flex-col gap-12 py-24 md:flex-row md:items-center">

      <div
        class="{{ $invert ? 'bg-blue' : 'bg-white/60' }} my-auto flex aspect-square w-72 flex-none flex-col rounded-full">
        {!! wp_get_attachment_image($image, 'medium', null, [
            'class' => 'my-auto',
        ]) !!}
      </div>
      <div>
        <div class="invert-bold font-heading text-5xl uppercase lg:text-6xl">{!! $heading !!}</div>
        <div class="mb-8 text-3xl">{{ $subheading }}</div>
        <p class="max-w-xl text-lg">
          {{ $body }}
        </p>

        @if ($link)
          <a href="{{ $link['url'] }}" target="{{ $link['target'] }}"
            class="clip-button not-prose font-heading {{ $invert ? 'bg-white text-black' : 'bg-black text-white ' }} mt-4 inline-block px-6 py-2 text-2xl uppercase antialiased">{{ $link['title'] }}</a>
        @endif
      </div>
  </section>
