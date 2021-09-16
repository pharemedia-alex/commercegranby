@php
  $facebook_link = get_field('facebook_link', 'option');
  $linkedin_link = get_field('linkedin_link', 'option');
  $twitter_link = get_field('twitter_link', 'option');
  $contact_page = get_field('contact_page', 'option');
  $document_page = get_field('document_page', 'option');
@endphp

<footer class="footer">
  <div class="o-container --pb-lg">
    <div class="footer__element-wrapper align-items-center">

      <a class="footer__logo" href="{{ home_url('/') }}" title="{!! get_bloginfo('name', 'display') !!}">
        <img src="@asset('images/logo_cdct_granby_region_white.png')" alt="{!! get_bloginfo('name', 'display') !!}"/>
      </a>

      <div class="footer__social-links">
        <ul>
          @if( !empty($facebook_link) )
          <li><a class="gtm-social" href="{!! $facebook_link !!}" target="_blank" title="{!! __('Suivez Commerce Tourisme Granby Région sur Facebook', 'commercegranby-theme') !!}">@icon('facebook','')</a></li>
          @endif

          @if( !empty($linkedin_link) )
          <li><a class="gtm-social" href="{!! $linkedin_link !!}" target="_blank" title="{!! __('Suivez Commerce Tourisme Granby Région sur Linkedin', 'commercegranby-theme') !!}">@icon('linkedin','')</a></li>
          @endif

          @if( !empty($twitter_link) )
          <li><a class="gtm-social" href="{!! $twitter_link !!}" target="_blank"title="{!! __('Suivez Commerce Tourisme Granby Région sur Twitter', 'commercegranby-theme') !!}">@icon('twitter','')</a></li>
          @endif
        </ul>
      </div>

      <a href="{!! get_permalink($document_page->ID) !!}" class="footer__download-button gtm-tools" data-type="tools" title="{!! get_the_title($document_page->ID) !!}">
          @icon('pdf','icon--lg') Téléchargez nos documents</a>
      </a>

      <a href="{!! get_permalink($contact_page->ID) !!}"  title="{!! get_the_title($contact_page->ID) !!}">
        {!! get_the_title($contact_page->ID) !!}
      </a>

    </div>
  </div>

  <div class="sub-footer">
    <div class="sub-footer">
      <div class="copyright">
        &copy; {!! __('Commerce Tourisme Granby région', 'commercegranby-theme') . ' ' . date("Y") !!}&nbsp; - &nbsp;
        <span><?php _e('<a href="https://pharemedia.com" title="Produit par Phare Media" target="_blank">produit par PHARE</a>', 'commercegranby-theme'); ?></span>
      </div>
    </div>
  </div>
</footer>
