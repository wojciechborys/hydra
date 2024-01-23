@php
  $logo_url = get_option('footer_logo_image');
  $fb_url = get_option('facebook_logo_url');
  $twt_url = get_option('twitter_logo_url');
@endphp

<footer class="footer">
  <div class="container">
    <div class="footer__wrapper">
      @if ($logo_url)
      <div class="footer__column">
        <a class="footer__brand" href="{{ home_url('/') }}">
          <img src="{{ $logo_url }}">
        </a>
      </div>
      @endif
      <div class="footer__column">
        {!! wp_nav_menu(['theme_location' => 'footer_navigation_1', 'menu_class' => 'footer__column--menu', 'echo' => false]) !!}
      </div>
      <div class="footer__column">
        {!! wp_nav_menu(['theme_location' => 'footer_navigation_2', 'menu_class' => 'footer__column--menu', 'echo' => false]) !!}
      </div>
      <div class="footer__column">
        <b class="uppercase">{{ __('SOCIALIZE WITH HYDRA', THEME) }}</b>
        <div class="footer__column--wrapper">
          @if ($fb_url)
            <a class="socials facebook" target="_blank" href="{{ $fb_url }}">
              <img src="@asset('images/facebook.svg')">
            </a>
          @endif

          @if ($twt_url)
            <a class="socials twitter" target="_blank" href="{{ $twt_url }}">
              <img src="@asset('images/twitter.svg')">
            </a>
          @endif
        </div>

        <div>
          <a href="#" class="button gradient">Build your world</a>
        </div>
      </div>
    </div>

    <aside class="footer__copyright">
      {{ __('2023 © HYDRA LANDING PAGE - BY ZINE. E. FALOUTI - ALL RIGHTS RESERVED', THEME) }}
    </aside>
  </div>
</footer>
