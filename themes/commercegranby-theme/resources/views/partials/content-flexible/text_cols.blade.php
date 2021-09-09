<section 
  {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} 
  class="cf-text-cols">
  <div class="o-container --pt-xl">

    @if ( !empty($content_block->main_title) )
      <div class="row -t-animate">
        <div class="col-12">
          <h2 class="cf-text-cols__title u-pb-sm">{!! $content_block->main_title !!}</h2>
        </div>
      </div>
    @endif

    <div class="row cf-text-cols__elements">
      @foreach ($content_block->columns as $column )
        <div class="col-12 {!! (count($content_block->columns) > 1 ) ? 'col-md-6' : 'col-md-10' !!} -t-animate">

          @if ( !empty($column['image']) )
            <div class="o-wrapper --pb-sm cf-text-cols__img">
              {!! wp_get_attachment_image( $column['image']['id'], 'layout_img' ) !!}
            </div>
          @endif

          <h2 class="cf-text-cols__title h3 u-pb">{!! $column['title'] !!}</h2>
          <div class="cf-text-cols__text o-content">{!! $column['content'] !!}</div>

          @if( $column['add_button']===true )
            @php
              $button_params = array(
                'button_classes' => '',
                'button_content' => (object) $column['button']
              );
            @endphp

            <div class="cf-text-cols__button u-pt-sm">
              @include('partials.content-flexible.button', $button_params)
            </div>
          @endif

        </div>
      @endforeach
    </div>

  </div>
</section>