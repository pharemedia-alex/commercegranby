@if($page_header->background->type=="image" && !empty($page_header->background->responsive_image['format_desktop']))
  <div class="page-header {!! $page_header->background->color !!} -img-bg">
    <div class="page-header__bg-img">
      @if ( !empty($page_header->background->responsive_image['format_mobile']) )
      {{-- custom src set to display different images on mobile or desktop --}}
        <picture>
          <source media="(max-width: 767px)" srcset="{!! wp_get_attachment_image_url( $page_header->background->responsive_image['format_mobile'], array('768','1013') ) !!}">
          <source media="(min-width: 768px)" srcset="{!! wp_get_attachment_image_url( $page_header->background->responsive_image['format_desktop'], 'full' ) !!} 1920w,
                                                      {!! wp_get_attachment_image_url( $page_header->background->responsive_image['format_desktop'], array('1250','613') ) !!} 1250w">
          <img src="{!! wp_get_attachment_image_url( $page_header->background->responsive_image['format_desktop'], 'full' ) !!}" alt="{!! get_post_meta($page_header->background->responsive_image['format_desktop'], '_wp_attachment_image_alt', TRUE); !!}">
        </picture>
      @elseif ( !empty($page_header->background->responsive_image['format_desktop']) )
        {!! wp_get_attachment_image( $page_header->background->responsive_image['format_desktop'], 'full' ) !!}
      @endif
    </div>
@else
  <div class="page-header {!! $page_header->background->color !!}">
@endif

    <div class="page-header__content --align-{!! $page_header->alignment !!}">
      <div class="o-container">
        <div class="row {!! ($page_header->alignment=='center') ? 'justify-content-center' : '' !!} -t-animate">
          <div class="col-12 col-lg-12 col-xl-10">
            <h1>
              {!! !empty($page_header->content->title) ? $page_header->content->title : get_the_title() !!}
            </h1>
            {{-- Add exception for specific content such as blog posts, job offers, etc or add an option to use default title --}}
            @if( !empty($page_header->content->subtitle) )
              <div class="page-header__subtitle">{!! $page_header->content->subtitle !!}</div>
            @endif

            @if( !empty($page_header->content->text) )
              <div>{!! $page_header->content->text !!}</div>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
