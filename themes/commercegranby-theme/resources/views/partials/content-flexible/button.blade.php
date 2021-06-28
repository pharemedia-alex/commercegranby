<a 
  id="{!! ( !empty($button_id )) ? 'id="'. $button_id .'"' : '' !!}"
  href="{!! $button_content->link_url !!}"
  class="btn {!! !empty($button_classes) ? $button_classes : '' !!} {!! !empty($button_classes) ? $button_classes : '' !!}"
  title="{!! $button_content->label !!}"
  {!! ( !empty($button_content->target ) && $button_content->target==true ) ? 'target="_blank" rel="noopener"' : '' !!}>
  {!! $button_content->label !!}
  {{--  @if ( $button_content->add_icon == 1 ) --}}
    @icon('long-right-arrow','--arrow-icon')
  {{-- @endif --}}
</a>