@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.page-header')
    @include('partials.content-flexible')
    
    @if ( $show_images_module===true )
      @include('partials.images_module')
    @endif

  @endwhile
@endsection