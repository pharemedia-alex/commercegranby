<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-content-list">
  <div class="o-container --pt-xl -t-animate">
    <div class="row">
      <div class="col-12">
        <div class="o-wrapper --pb-sm">
          <h2 class="cf-content-list">{!! $content_block->title !!}</h2>
          @if ( !empty($content_block->text) )
            {!! $content_block->text !!}
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      @if ( $content_block->display_type == 'auto')
        
        @php
          $query_elements = new WP_Query(
            array(
              'post_type'       => $content_block->content_type,
              'posts_per_page'  => $content_block->content_num,
              'post_status'     => 'publish',
              'order'           => 'DESC',
              'orderby'         => 'post_date'
            )
          );

          $elements = $query_elements->posts;

        @endphp

      @else

        @php
          $elements = $content_block->elements;
        @endphp

      @endif


      @if ( !empty($elements) )

        @foreach ( $elements as $el )
        
          @switch ( $content_block->content_type )
            
            @case( 'collaboration' )

              @php
                $link = get_field('link', $el->ID);
                $description = get_field('description', $el->ID);
              @endphp

              <div class="col-12 col-sm-6 collaboration-tile">
                <a href="{!! $link !!}" title="{!! $el->post_title !!}" target="_blank" class="">
                  @if(has_post_thumbnail($el->ID))
                    <div class="collaboration-tile__background">
                      {!! get_the_post_thumbnail( $el->ID, 'thumbnail', array( 'class' => 'alignleft' ) ) !!}
                      {{-- wp_get_attachment_image( $element['logo']['id'], 'layout_img' ) --}}
                      {{-- src set --}}
                    </div>
                  @endif

                  <div class="collaboration-tile__content-wrapper">
                    <div class="collaboration-tile__content">
                      <h3 class="collaboration-tile__title h4">{!! $el->post_title !!}</h3>
                      @if( !empty($description) )
                        <div class="collaboration-tile__text o-content">{!! $description !!}</div>
                      @endif
                    </div>
                  </div>
                </a>
              </div>
              
              @break

            @case( 'document' )

              @php
                $document_name = get_field('name', $el->ID);
                $document_file = get_field('file', $el->ID);
              @endphp

              <div class="col-12 col-sm-6 col-md-4 col-lg-3 document-tile">
                @if(has_post_thumbnail($el->ID))
                  <div class="document-tile__img">
                    {!! get_the_post_thumbnail( $el->ID, 'thumbnail', array( 'class' => 'alignleft' ) ) !!}
                    {{-- wp_get_attachment_image( $element['logo']['id'], 'layout_img' ) --}}
                    {{-- src set --}}
                  </div>
                @endif

                <div class="document-tile__content-wrapper">
                  <div class="document-tile__content">
                    <h3 class="document-tile__title h5">{!! $el->post_title !!}</h3>
                    <a href="{!! $document_file !!}" class="document-tile__link">
                      {!! __('Télécharger', 'commercegranby-theme') !!}
                      @icon('long-right-arrow','icon--lg --arrow-icon')
                    </a>
                  </div>
                </div>
              </div>
              
              @break

            @case( 'press' )

              @php
                $article_link = get_field('link', $el->ID);
                $article_description = get_field('description', $el->ID);
                $article_title = get_field('title', $el->ID);
              @endphp

              <div class="col-12 col-sm-6 col-md-4 col-lg-3 article-tile">
                @if(has_post_thumbnail($el->ID))
                  <div class="article-tile__img">
                    {!! get_the_post_thumbnail( $el->ID, 'thumbnail', array( 'class' => 'alignleft' ) ) !!}
                    {{-- wp_get_attachment_image( $element['logo']['id'], 'layout_img' ) --}}
                    {{-- src set --}}
                  </div>
                @endif

                <div class="article-tile__content-wrapper">
                  <div class="article-tile__content">
                    <h3 class="article-tile__title h5">{!! $article_title !!}</h3>
                    <a href="{!! $document_file !!}" class="article-tile__link">
                      {!! __('Consulter', 'commercegranby-theme') !!}
                      @icon('long-right-arrow','icon--lg --arrow-icon')
                    </a>
                  </div>
                </div>
              </div>
              
              @break

            @default

          @endswitch
            
        @endforeach

      @endif

    </div>

  </div>
</section>