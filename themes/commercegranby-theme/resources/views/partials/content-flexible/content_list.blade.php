<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-content-list">
  <div class="o-container --pt-xl">
    <div class="row -t-animate">
      <div class="col-12">
        <div class="o-wrapper">
          <h2 class="cf-content-list">{!! $content_block->title !!}</h2>
          @if ( !empty($content_block->text) )
            <div class="o-content">
              {!! $content_block->text !!}
            </div>
          @endif
        </div>
      </div>
    </div>

    <div class="row -t-animate">
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
          $type = $content_block->content_type . '_elements';
          $elements = (object) $content_block->$type;
          
        @endphp

      @endif


      @if ( !empty($elements) )

        @foreach ( $elements as $el )
        
          @switch ( $content_block->content_type )
            
            @case( 'collaboration' )

              @php
                $collaboration_id = ( $content_block->display_type == 'auto' ) ? $el->ID : $el['id'];
                $collaboration_title = get_field('title', $collaboration_id);
                $collaboration_link = get_field('link', $collaboration_id);
                $collaboration_description = get_field('description', $collaboration_id);
              @endphp

              <div class="col-12 col-sm-6">
                <div class="o-wrapper --pt-md">
                  <div class="collaboration-tile">
                    <a href="{!! $collaboration_link !!}" title="{!! $collaboration_title !!}" target="_blank" class="">
                      @if( has_post_thumbnail($collaboration_id) )
                        <div class="collaboration-tile__background">
                          {!! get_the_post_thumbnail( $collaboration_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
                        </div>
                      @endif

                      <div class="collaboration-tile__content-wrapper">
                        <div class="collaboration-tile__content">
                          <h3 class="collaboration-tile__title h4">{!! $collaboration_title !!}</h3>
                          @if( !empty($collaboration_description) )
                            <div class="collaboration-tile__text o-content">{!! $collaboration_description !!}</div>
                          @endif
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              
              @break

            @case( 'document' )

              @php
                $document_id = ( $content_block->display_type == 'auto' ) ? $el->ID : $el['id'];
                $document_name = get_field('name', $document_id);
                $document_file = get_field('file', $document_id);
              @endphp

              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="o-wrapper --pt-md">
                  <div class="document-tile">
                    @if( has_post_thumbnail($document_id) )
                      <div class="document-tile__img-wrapper">
                        <div class="document-tile__img">
                          {!! get_the_post_thumbnail( $document_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
                        </div>
                      </div>
                    @endif

                    <div class="document-tile__content-wrapper">
                      <div class="document-tile__content">
                        <h3 class="document-tile__title h5">{!! $document_name !!}</h3>
                        <a href="{!! $document_file !!}" title="{!! $document_name !!}" target="_blank" class="document-tile__link">
                          {!! __('Télécharger', 'commercegranby-theme') !!}
                          @icon('long-right-arrow','--arrow-icon')
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              @break

            @case( 'press' )

              @php
                $article_id = ( $content_block->display_type == 'auto' ) ? $el->ID : $el['id'];
                $article_title = get_field('title', $article_id);
                $article_link = get_field('link', $article_id);
                $article_description = get_field('description', $article_id);
              @endphp

              <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="o-wrapper --pt-md">
                  <div class="article-tile">
                    @if(has_post_thumbnail( $article_id ))
                      <div class="article-tile__img-wrapper">
                        <div class="article-tile__img">
                          {!! get_the_post_thumbnail( $article_id, 'tile', array( 'class' => 'alignleft' ) ) !!}
                        </div>
                      </div>
                    @endif

                    <div class="article-tile__content-wrapper">
                      <div class="article-tile__content">
                        <h3 class="article-tile__title h5">{!! $article_title !!}</h3>
                        <a href="{!! $article_link !!}" title="{!! $article_title !!}" target="_blank" class="article-tile__link">
                          {!! __('Consulter', 'commercegranby-theme') !!}
                          @icon('long-right-arrow','--arrow-icon')
                        </a>
                      </div>
                    </div>
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