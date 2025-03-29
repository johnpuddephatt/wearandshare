  <!doctype html>
  <html @php(language_attributes()) x-data="{ menuOpen: false }" :class="{ 'overflow-hidden': menuOpen }">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
      rel="stylesheet">

    @php(do_action('get_header'))
    @php(wp_head())

  </head>

  <body @php(body_class('bg-blue-light'))>
    @include('svg')

    @php(wp_body_open())

    <div id="app" data-barba="wrapper" role="document">

      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>

      @include('sections.header')

      <div data-barba-class="{{ join(' ', get_body_class()) }}" data-barba="container"
        data-barba-namespace="{{ basename(get_permalink()) }}">

        <main id="main" class="main">
          @yield('content')
        </main>

        @hasSection('sidebar')
          <aside class="sidebar">
            @yield('sidebar')
          </aside>
        @endif
      </div>

    </div>
    @include('sections.footer')

    @php(do_action('get_footer'))
    @php(wp_footer())

  </body>

  </html>
