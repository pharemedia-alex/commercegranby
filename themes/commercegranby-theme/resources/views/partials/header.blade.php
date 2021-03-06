<header class="header">
  <div class="header-init">
    <div class="header__content">
      <div class="header__main">
        <a class="brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
          @include('partials.logo')
        </a>
        <nav class="nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! App::get_menu('primary_navigation', 'main-menu') !!}
          @endif
        </nav>
        <div class="social-links d-none d-xl-block">
          <a href="https://www.facebook.com/CommerceTourismeGranbyRegion/" title="{!! __('Suivez Commerce Tourisme Granby Region sur Facebook', 'commercegranby-theme') !!}" target="_blank">@icon('facebook','')</a>
        </div>
        <button
          aria-expanded="false"
          aria-haspopup="true"
          aria-controls="mainMenu"
          class="nav-toggle"
          data-js="menuToggle"
          type="button"
        >
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          {{-- accessibility <span aria-hidden="true" class="visible-sr">{{ __('Ouvrir le menu', 'commercegranby-theme') }}</span> --}}
        </button>
      </div>
    </div>
  </div>

  <div class="header-scrollup">
    <div class="header__content">
      <div class="header__main">
        <a class="brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
          @include('partials.logo', ['header_logo' => ''] )
        </a>
        <nav class="nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! App::get_menu('primary_navigation', 'main-menu-scrollup') !!}
          @endif
        </nav>
        <div class="social-links d-none d-xl-block">
          <a href="https://www.facebook.com/CommerceTourismeGranbyRegion/" title="{!! __('Suivez Commerce Tourisme Granby Region sur Facebook', 'commercegranby-theme') !!}" target="_blank">@icon('facebook','')</a>
        </div>
        <button
          aria-expanded="false"
          aria-haspopup="true"
          aria-controls="mainMenu"
          class="nav-toggle"
          data-js="menuToggle"
          type="button"
        >
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          {{-- accessibility <span aria-hidden="true" class="visible-sr">{{ __('Ouvrir le menu', 'commercegranby-theme') }}</span> --}}
        </button>
      </div>
    </div>
  </div>

</header>

<div id="mobile-menu" class="menu overlay" role="menu" data-active="">
  <div class="o-container --pt">
    <a class="brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
      @include('partials.logo', ['header_logo' => ''] )
    </a>
    @if ( has_nav_menu('mobile_navigation') )
      <nav class="nav-primary">
        @if (has_nav_menu('mobile_navigation'))
          {!! wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav -t-menu']) !!}
        @endif
      </nav>
    @endif
  </div>
  <button
    aria-expanded="false"
    aria-haspopup="true"
    aria-controls="mainMenu"
    class="nav-toggle is-active"
    data-js="menuToggle"
    type="button"
  >
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    {{-- accessibility <span aria-hidden="true" class="visible-sr">{{ __('Ouvrir le menu', 'commercegranby-theme') }}</span> --}}
  </button>
</div>
