<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-text-intro">
  <div class="o-container --pt-xl -t-animate">

    <div class="row">
      <div class="col-12">
        <div class="o-wrapper">
          @if ( $content_block->title )
            <h2 class="cf-text-intro__title">{!! $content_block->title !!}</h2>
          @endif
          
          <div class="cf-text-intro__text o-content">{!! $content_block->text !!}</div>
          
          @if( $content_block->add_button===true )
            @php
              $button_params = array(
                'button_classes' => '',
                'button_content' => (object) $content_block->button
              );
            @endphp

            <div class="cf-text-intro__button u-pt-sm">
              @include('partials.content-flexible.button', $button_params)
            </div>
          @endif
        </div>
      </div>
    </div>

  </div>
</section>