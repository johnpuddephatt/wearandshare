<article @php(post_class())>

  <div class="wp-block alignfull relative flex min-h-[90vh] flex-col justify-center overflow-hidden bg-blue">

    <div class="w-header container relative z-10 flex flex-col items-center justify-between gap-8 py-24 lg:flex-row">
      <div>
        <h2 class="type-2xl mb-4 max-w-3xl uppercase lg:mb-6">
          {!! $wrapped_title !!}
        </h2>
        <div class="prose max-w-xl xl:prose-lg">
          {!! $post->post_excerpt !!}
        </div>
      </div>

      @if (has_post_thumbnail())
        <div class="relative z-10 max-w-sm 2xl:max-w-md">

          {!! get_the_post_thumbnail(null, 'square', [
              'class' => '   block h-auto w-full',
              'sizes' => '66vw, (min-width: 800px) 33vw',
          ]) !!}

        </div>
      @endif
    </div>

    <svg class="absolute -top-32 right-0 h-[calc(100%+8rem)]" xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 1086.44 1014.17">
      <path fill="none" stroke="#fff" stroke-width="3px" stroke-linecap="round" stroke-linejoin="round"
        d="M1084.95 4.44s-3.11-.43-8.89-.96" />
      <path fill="none" stroke="#fff" stroke-dasharray="17.86 17.86" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2.98"
        d="M1058.24 2.22c-79.29-4.07-316.93 2.05-464.2 202.15-56.66 85.89-43.17 298.32 190.14 244.89 52.24-18.28 194.16 44.54 249.14 90.88 83.53 70.4-54.34 457-307.92 296.45-252.56-159.9-632.13 106.85-709.75 165.19" />
      <path d="M8.54 1007.18c-4.62 3.55-7.05 5.5-7.05 5.5" class="27dn5dhj__cls-2" />
    </svg>

  </div>

  <div class="relative" id="overview">
    <div class="toc top-0 mx-auto my-8 w-full max-w-5xl px-4 xl:absolute xl:max-w-[18rem]">
      {!! $toc !!}
    </div>

    <div class="page-content prose my-16 xl:prose-lg">
      {!! $content !!}
    </div>

  </div>
</article>
