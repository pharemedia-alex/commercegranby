<section {!! (!empty($content_block->section_id)) ? 'id="'.$content_block->section_id.'"' : '' !!} class="cf-events-list">
  <div class="o-container --pt-xl -t-animate">
    <div class="row">
      <div class="col-12">
        <div class="o-wrapper --pb-xl">
          <h2 class="cf-events-list__title">{!! $content_block->title !!}</h2>
          <h2 class="cf-events-list__text">{!! $content_block->text !!}</h2>
        </div>
      </div>
    </div>

    <div class="row">
      @if ( $events_list->have_posts() )

        @while ($events_list->have_posts()) 
          @php $event_details = (object) get_fields(); @endphp
          <h3>{!! get_the_title() !!}</h3>
          <div class="event-start-date">Start date{!! $event_details->start_date !!}</div>
          <div class="event-end-date">End date{!! $event_details->end_date !!}</div>
          <div class="event-place">End date{!! $event_details->place !!}</div>
          <div class="event-city">End date{!! $event_details->city !!}</div>

          <div class="event-link"><a href="{!! $event_details->link title="{!! get_the_title() !!}" !!}">View</a></div>



        @endwhile

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