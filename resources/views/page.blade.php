@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container">
      @includeFirst(['partials.content-page', 'partials.content'])
    </div>
  @endwhile
@endsection
