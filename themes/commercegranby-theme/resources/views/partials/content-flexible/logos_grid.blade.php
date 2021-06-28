<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-images-grid">
  <div class="o-container --pt-xl -t-animate">
    <div class="row">
      <div class="col-12">
        <div class="o-wrapper --pb-sm">
          <h2 class="cf-images-grid">{!! $content_block->title !!}</h2>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach ($content_block->logos as $element)
        
        <div class="col-12 col-sm-4 col-lg-3 member">
          <div class="o-wrapper --pb-md">
              {!! wp_get_attachment_image( $element['logo']['id'], 'layout_img' ) !!}
          </div>
        </div>
            
      @endforeach

    </div>

  </div>
</section>