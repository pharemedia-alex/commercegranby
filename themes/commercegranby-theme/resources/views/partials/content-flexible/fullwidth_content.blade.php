@php
  $bg_type = $content_block->background_type;
  if( $bg_type==='color' ){
    
  }elseif( $content_block->background_image ) {

  }

  $bg_color = ($bg_type==='color') ? $content_block->background_color : '';
  
@endphp

<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-fullwidth-content">
  <div class="o-container --pt-xl --pb-xl">
    <div class="row">
      <div class="col-12">
        <div class="o-wrapper -t-animate">
          <div class="cf-highlight__text o-content">{!! $content_block->text !!}</div>
        </div>
      </div>
    </div>
  </div>
</section>
