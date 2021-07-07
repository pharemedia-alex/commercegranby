<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-mosaic">

  <div class="o-container --pt-xl -t-animate">

    <div class="row">
      <div class="col-12 col-lg-4 cf-mosaic__top-intro">
        <div class="o-wrapper --pb-md">
          <h2 class="cf-mosaic__title">{!! $content_block->title !!}</h2>
          <div class="cf-mosaic__text">{!! $content_block->text !!}</div>
        </div>
      </div>
    </div>

    <div class="row">

      @foreach( $content_block->elements as $key => $element )

        <div class="col-12 col-md-6 col-lg-4 mosaic-tile">
          @php
            $el_id = $element['id'];
            $el_post_type = get_post_type($el_id);
            $el_title = ($el_post_type==='document') ? get_field('name', $el_id) : get_field('title', $el_id);
            $el_link = ($el_post_type==='document') ? get_field('file', $el_id) : get_field('link', $el_id);
          @endphp

          <a href="{!! $el_link !!}" title="{!! $el_title !!}" target="_blank" class="">
            @if( has_post_thumbnail( $el_id ) )
              <div class="mosaic-tile__background">
                {!! get_the_post_thumbnail( $el_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
              </div>
            @endif
            
            <div class="mosaic-tile__content-wrapper">
              <div class="mosaic-tile__content">
                <h3 class="mosaic-tile__title h4">{!! $el_title !!}</h3>
              </div>
            </div>
          </a>
        </div>

      @endforeach

    </div>

  </div>
</section>