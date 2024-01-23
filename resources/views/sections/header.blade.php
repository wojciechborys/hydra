@php
  $logo_url = get_option('header_logo_image');
@endphp

<header class="top-header">
  <div class="container">
  @if (has_nav_menu('primary_navigation'))
    <nav class="top-header__nav" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      <a class="top-header__nav--brand" href="{{ home_url('/') }}">
        <img src="{{ $logo_url }}">
      </a>
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'top-header__nav--menu', 'echo' => false]) !!}
      <div class="top-header__buttons">
        <a class="button outlined" href="{{ home_url('/contact') }}">{{ _e('Contact us', THEME) }}</a>
        <a class="button gradient" href="{{ home_url('/join-us') }}">{{ _e('Join Hydra', THEME) }}</a>
      </div>
    </nav>
    
  @endif
  </div>

</header>
