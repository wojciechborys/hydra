<?php
  $logo_url = get_option('footer_logo_image');
  $fb_url = get_option('facebook_logo_url');
  $twt_url = get_option('twitter_logo_url');
?>

<footer class="footer">
  <div class="container">
    <div class="footer__wrapper">
      <?php if($logo_url): ?>
      <div class="footer__column">
        <a class="footer__brand" href="<?php echo e(home_url('/')); ?>">
          <img src="<?php echo e($logo_url); ?>">
        </a>
      </div>
      <?php endif; ?>
      <div class="footer__column">
        <?php echo wp_nav_menu(['theme_location' => 'footer_navigation_1', 'menu_class' => 'footer__column--menu', 'echo' => false]); ?>

      </div>
      <div class="footer__column">
        <?php echo wp_nav_menu(['theme_location' => 'footer_navigation_2', 'menu_class' => 'footer__column--menu', 'echo' => false]); ?>

      </div>
      <div class="footer__column">
        <b class="uppercase"><?php echo e(__('SOCIALIZE WITH HYDRA', THEME)); ?></b>
        <div class="footer__column--wrapper">
          <?php if($fb_url): ?>
            <a class="socials facebook" target="_blank" href="<?php echo e($fb_url); ?>">
              <img src="<?= \Roots\asset('images/facebook.svg'); ?>">
            </a>
          <?php endif; ?>

          <?php if($twt_url): ?>
            <a class="socials twitter" target="_blank" href="<?php echo e($twt_url); ?>">
              <img src="<?= \Roots\asset('images/twitter.svg'); ?>">
            </a>
          <?php endif; ?>
        </div>

        <div>
          <a href="#" class="button gradient">Build your world</a>
        </div>
      </div>
    </div>

    <aside class="footer__copyright">
      <?php echo e(__('2023 © HYDRA LANDING PAGE - BY ZINE. E. FALOUTI - ALL RIGHTS RESERVED', THEME)); ?>

    </aside>
  </div>
</footer>
<?php /**PATH /var/www/html/wp-content/themes/hydra/resources/views/sections/footer.blade.php ENDPATH**/ ?>