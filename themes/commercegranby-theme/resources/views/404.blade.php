@extends('layouts.app')

@section('content')

  @if (!have_posts())
  
  @php
    $page_header = new \stdClass();
    $page_header->content = new \stdClass();
    $page_header->background = new \stdClass();
    $page_header->content->title = __('Page non disponible', 'commercegranby-theme');
    $page_header->content->subtitle = __("La page que vous souhaitez consulter n'est pas disponible.", 'commercegranby-theme');
    $page_header->background->type = "image";
    $page_header->background->responsive_image['format_desktop'] = get_field('header_404_image', 'option');
  @endphp

    @include('partials.page-header')
  
    <div class="o-main-container">
      {{-- Condition for margin if background is not light beige --}}
      <div class="o-container {!! ($page_header->background->color!='none') ? '--pt-xl ' : '' !!}--pb-xl">
        <div class="row">
          <div class="col-12 col-lg-10 col-xl-8">
            <div class="o-content">
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection
