<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-events-list">
  <div class="o-container --pt-xl -t-animate">
    <div class="row">
      <div class="col-12">
        <div class="o-wrapper --pb-xl">
          <h2 class="cf-events-list__title">{!! $content_block->title !!}</h2>
          <div class="cf-events-list__text o-content">{!! $content_block->text !!}</h2>
        </div>
      </div>
    </div>

    <div class="row">
      @php $events = Page::events_list() @endphp
      
      @if ( !empty($events) )

        @if ( !empty($events[0]) )
          @php
            $event_link = null;
            $event_title = $content_block->elements[0]['element'];
            $event_date = Page::get_featured_content( $f_content_id );
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
                  @php $formated_event_date = App\get_clean_formated_date( $event ); 
                  @endphp

                    <div class="m-thumb__date {{ $formated_event_date[ 'classes' ] }}">
                      <div class="m-thumb__date__number">{{ $formated_event_date[ 'first_line' ] }}</div>
                      <span class="m-thumb__date__divider"></span>
                      <div class="m-thumb__date__month">{{ $formated_event_date[ 'last_line' ] }}</div>
                      @if( get_field( 'hour', $post ) )
                          <div class="m-thumb__date__hour">
                              {{ str_replace( ':', ' H ', get_field( 'hour', $post ) )}}
                              @if( get_field( 'hour_end', $post ) )
                                  {{ t( 'common.at' ) }} {{ str_replace( ':', ' H ', get_field( 'hour_end', $post ) )}}
                              @endif
                          </div>
                      @endif
                    </div>
                  <h3 class="featured-tile__title h4">{!! $f_content->title !!}</h3>
                </div>
              </div>
            </a>
          </div>
        @endif

        @foreach ( $events as $event )
          @php $event_details = (object) get_fields($event->ID) @endphp

          <h3>{!! get_the_title($event->ID) !!}</h3>
          <div class="event-start-date">{!! $event_details->start_date !!}</div>
          <div class="event-end-date">{!! $event_details->end_date !!}</div>
          <div class="event-place">{!! $event_details->place !!}</div>
          <div class="event-city">{!! $event_details->city !!}</div>

          <div class="event-link"><a href="{!! $event_details->link !!}" title="{!! get_the_title() !!}">View</a></div>
        
          @endforeach

      @endif
      
      @foreach ($content_block->logos as $element)
        
        <div class="col-12 col-sm-4 col-lg-3 col-xxl-2 member">
          <div class="o-wrapper --pb-xl">
            
          </div>
        </div>
            
      @endforeach

    </div>

  </div>
</section>

{{--
@if( !empty( $featured_events ) || !empty( $events ) )
            <div class="section padding-bottom container js-light-nav" data-offset-top="-200">
                <h2>{{ get_field( 'event_title' ) }}</h2>
                <p class="intro">{{ get_field( 'event_description' ) }}</p>
                <div class="p-home__events row">
                    <div class="gr-4 gr-6@tablet gr-12@mobile">
                        @if( !empty( $featured_events[ 0 ] ) )
                            
                          
                        <a href="{{ get_page_link(19) }}" class="p-home__events__all-link p-home__events__all-link--mobile link link--full-width link--bigger link--bottom-icon hide">{{ t( 'home.more_events' ) }} {!! icon( 'long-right-arrow' ) !!}</a>
                    </div>
                    <div class="gr-4 gr-6@tablet gr-12@mobile m-mosaic__col--middle">
                        @if( !empty( $featured_events[ 1 ] ) )
                            @include( 'partials/single_thumb', [
                                'post' => $featured_events[ 1 ],
                                'is_event' => true
                            ])
                        @endif
                        @if( !empty( $featured_events[ 2 ] ) )
                            @include( 'partials/single_thumb', [
                                'post' => $featured_events[ 2 ],
                                'is_event' => true
                            ])
                        @endif
                    </div>
                    <div class="gr-4 gr-12@tablet gr-12@mobile m-mosaic__col--bottom">
                        @foreach( $events as $event )
                            @php $formated_event_date = get_formated_date( $event ); @endphp
                            <a href="{{ get_page_link( $event ) }}" class="p-home__event-list">
                                <div class="p-home__event-list__date">
                                    <span>{{ $formated_event_date[ 'first_line' ] }}</span>
                                    <span>{{ $formated_event_date[ 'last_line' ] }}</span>
                                    @if( get_field( 'hour', $event ) )
                                        <div>{{ str_replace( ':', ' H ', get_field( 'hour', $event ) )}}
                                            @if( get_field( 'hour_end', $event ) )
                                                {{ t( 'common.at' ) }}
                                                <div>{{ str_replace( ':', ' H ', get_field( 'hour_end', $event ) )}}</div>
                                            @endif
                                        </div>
                                    @endif
                                    @php $location = get_field( 'event_location_text', $event ); @endphp
                                    @if ( !empty( $location ) )
                                        <div class="p-home__event-list__date__location">{!! icon( 'pin' ) !!} {{ $location }}</div>
                                    @endif
                                </div>
                                <div class="p-home__event-list__title">
                                    {{ $event->post_title }}
                                </div>
                                <div class="p-home__event-list__arrow">
                                    {!! icon( 'small-right-arrow' ) !!}
                                </div>
                            </a>
                        @endforeach
                        <a href="{{ get_page_link(19) }}" class="p-home__events__all-link link link--full-width link--bigger link--bottom-icon">{{ t( 'home.more_events' ) }} {!! icon( 'long-right-arrow' ) !!}</a>
                    </div>
                </div>
            </div>
        @endif
--}}