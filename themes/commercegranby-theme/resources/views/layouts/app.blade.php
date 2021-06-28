<!doctype html>
<html {!! get_language_attributes() !!} class="no-js p-trans-out">

  @include('partials.head')
  
  <body @php body_class( $header->theme ) @endphp>

    <!-- Add Google Tag Manager here -->

    @include('partials.page-transition')
    
    @include('partials.noscript')
    
    @include('partials.cookie-notice')

    @php do_action('get_header') @endphp
    
    @include('partials.header')
    
      <main class="main">
        @yield('content')
      </main>
      
      @if (App\display_sidebar())
        <aside class="sidebar">
          @include('partials.sidebar')
        </aside>
      @endif
      
    @php do_action('get_footer') @endphp
  
    @if ($images_module_enable===true)
      @include('partials.images_module')    
    @endif

    @include('partials.footer')
    
    <div class="u-hide">
      @include('partials.icons')
    </div>
    
    @php wp_footer() @endphp
  
  </body>
</html>