@extends('layouts.app') @section('content')
  @while (have_posts())
    @php(the_post())

    @includeFirst(['partials.content-page-' . get_post_type(), 'partials.content-page'])
  @endwhile
@endsection
