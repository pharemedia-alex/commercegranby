
<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-text-images">
  <div class="o-container --pt-xl ">
    <div class="row -t-animate">

      @if ( $content_block->image['image_file']!==false )
        <div class="col-12 col-lg-5 col-xl-6 order-first {!! ($content_block->image['image_alignment']=='right') ? 'order-lg-last' : 'order-lg-first' !!}">
          <h2 class="cf-text-images__title h3 d-block d-lg-none">{!! $content_block->title !!}</h2>
          <div class="cf-text-images__img">
            {!! wp_get_attachment_image( $content_block->image['image_file'], 'layout_img' ) !!}
          </div>
        </div>
      @endif
          
      <div class="col-12 col-lg-7 col-xl-6 {!! ($content_block->image['image_alignment']=='right') ? 'right-alignment' : 'left-alignment' !!}">
        <h2 class="cf-text-images__title h3 d-none d-lg-block">{!! $content_block->title !!}</h2>
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
