<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-featured-content">
  <div class="o-container --pt-xl -t-animate">
    <div class="row align-items-center">
      @if ( !empty($content_block->elements[0]) )
        @php
          $f_content = null;
          $f_content_id = $content_block->elements[0]['element'];
          $f_content = Page::get_featured_content( $f_content_id );
        @endphp
        <div class="col-12 col-md-6 col-lg-4 featured-tile featured-tile--tall">
          <a href="{!! $f_content->link !!}" title="{!! $f_content->title !!}" target="_blank" class="">
            @if( has_post_thumbnail( $f_content_id ) )
              <div class="featured-tile__background">
                {!! get_the_post_thumbnail( $f_content_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
              </div>
            @endif
            
            <div class="featured-tile__content-wrapper">
              <div class="featured-tile__content">
                <h3 class="featured-tile__title h4">{!! $f_content->title !!}</h3>
              </div>
            </div>
          </a>
        </div>
      @endif

      @if ( !empty($content_block->elements[1]) )
        @php
          $f_content = null;
          $f_content_id = $content_block->elements[1]['element'];
          $f_content = Page::get_featured_content( $f_content_id );
        @endphp
        <div class="col-12 col-md-6 col-lg-4 featured-tile">
          <div class="o-wrapper --pb-md">
            <h2 class="cf-featured-content__title">{!! $content_block->title !!}</h2>
            <div class="cf-featured-content__text">{!! $content_block->text !!}</div>
          </div>
          <a href="{!! $f_content->li !!}" title="{!! $f_content->title !!}" target="_blank" class="">
            @if( has_post_thumbnail( $f_content_id ) )
              <div class="featured-tile__background">
                {!! get_the_post_thumbnail( $f_content_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
              </div>
            @endif
            
            <div class="featured-tile__content-wrapper">
              <div class="featured-tile__content">
                <h3 class="featured-tile__title h4">{!! $f_content->title !!}</h3>
              </div>
            </div>
          </a>
        </div>
      @endif

      @if ( !empty($content_block->elements[2]) )
        @php
          $f_content = null;
          $f_content_id = $content_block->elements[2]['element'];
          $f_content = Page::get_featured_content( $f_content_id );
        @endphp
        <div class="col-12 col-md-6 col-lg-4 featured-tile">
          <a href="{!! $f_content->link !!}" title="{!! $f_content->title !!}" target="_blank" class="">
            @if( has_post_thumbnail( $f_content_id ) )
              <div class="featured-tile__background">
                {!! get_the_post_thumbnail( $f_content_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
              </div>
            @endif
            
            <div class="featured-tile__content-wrapper">
              <div class="featured-tile__content">
                <h3 class="featured-tile__title h4">{!! $f_content->title !!}</h3>
              </div>
            </div>
          </a>
        </div>
      @endif

    </div>
  </div>
</section>