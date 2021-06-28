@php
  $button_params = array(
    'button_classes' => 'cf-cta__button',
    'button_content' => (object) $content_block->button
  );
@endphp

<section class="cf-cta o-theme-mid-green">
  <div class="o-container u-pt-md u-pb-md -t-animate">
    <div class="row justify-content-center">
      @if ( !empty($content_block->title) )
        <div class="col-12 col-lg-4">
          <h3 class="cf-cta__title">{!! $content_block->title !!}</h3>
        </div>
      @endif

      @if ( !empty($content_block->text) )
        <div class="col-12 col-lg-4">
          <p class="cf-cta__text">{!! $content_block->text !!}</p>
        </div>
      @endif

      <div class="col-12 {{ ( !empty($content_block->title) ) ?  'col-lg-4 btn-col' : 'u-text-center' }}">
        @include('partials.content-flexible.button', $button_params)
      </div>

    </div>
  </div>
</section>
