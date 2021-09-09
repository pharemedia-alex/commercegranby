<section 
  {!! (!empty( $content_block->section_id )) ? 'id="'.$content_block->section_id.'"' : '' !!} 
  class="cf-thumbnail">
  <div class="o-container --pt-lg">

    @if ( !empty( $content_block->title ) )
      <div class="row -t-animate">
          <div class="col-12">
            <h2 class="cf-thumbnail__title">{!! $content_block->title !!}</h2>
          </div>
      </div>
    @endif

    @if ( $content_block->layout==='vertical' )

      <div class="row cf-thumbnail__elements vertical-layout -t-animate">

        @foreach ( $content_block->elements as $el )

          <div class="col-12 col-sm-6 col-lg-4">

            <div class="o-wrapper">
              <div class="cf-thumbnail__img round-image">
                {!! wp_get_attachment_image( $el['image_file']['id'], 'layout_img' ) !!}
              </div>
            </div>

            <div class="cf-thumbnail__text o-content">{!! $el['text'] !!}</div>

          </div>

        @endforeach

      </div>

    @else

      @foreach ( $content_block->elements as $el )

        <div class="row cf-thumbnail__elements horizontal-layout u-pt-sm">

            <div class="col-12 col-sm-4 col-md-4 col-lg-3 ">

              <div class="o-wrapper">

                <div class="cf-thumbnail__img {!! ($el->round_image===true) ? 'round-image' : '' !!}">
                  {!! wp_get_attachment_image( $el['image_file']['id'], 'layout_img' ) !!}
                </div>

              </div>

            </div>

            <div class="col-12 col-sm-8 col-md-8 col-lg-9">

              <div class="o-wrapper">

                <div class="cf-thumbnail__text o-content">{!! $el['text'] !!}</div>

              </div>    

            </div>

        </div>

      @endforeach

    @endif

  </div>
</section>