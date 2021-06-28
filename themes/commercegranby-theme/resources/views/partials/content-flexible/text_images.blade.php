
<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-text-images">
  <div class="o-container --pt-xl -t-animate">
    <div class="row">

      @if ( $content_block->image['image_file']!==false )
        <div class="col-12 col-lg-6 order-last {!! ($content_block->image['image_alignment']=='right') ? 'order-lg-last' : 'order-lg-first' !!}">
          <div class="cf-text-images__img">
            {!! wp_get_attachment_image( $content_block->image['image_file'], 'layout_img' ) !!}
          </div>
        </div>
      @endif
          
      <div class="col-12 col-lg-6 {!! ($content_block->image['image_alignment']=='right') ? 'right-alignment' : 'left-alignment' !!}">
        <h2 class="cf-text-images__title h3">{!! $content_block->title !!}</h2>
        <div class="cf-text-images__text o-content">{!! $content_block->text !!}</div>
        
        @if( $content_block->add_button===true )
          @php 
            $button_params = array(
              'button_classes' => '', 
              'button_content' => (object) $content_block->button
            );
          @endphp
          @include('partials.content-flexible.button', $button_params)
        @endif
      </div>

    </div>
  </div>
</section>
