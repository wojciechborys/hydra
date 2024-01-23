<?php
  $logo_url = get_option('header_logo_image');
?>

<header class="top-header">
  <div class="container">
  <?php if(has_nav_menu('primary_navigation')): ?>
    <nav class="top-header__nav" aria-label="<?php echo e(wp_get_nav_menu_name('primary_navigation')); ?>">
      <a class="top-header__nav--brand" href="<?php echo e(home_url('/')); ?>">
        <img src="<?php echo e($logo_url); ?>">
      </a>
      <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'top-header__nav--menu', 'echo' => false]); ?>

      <div class="top-header__buttons">
        <a class="button outlined" href="<?php echo e(home_url('/contact')); ?>"><?php echo e(_e('Contact us', THEME)); ?></a>
        <a class="button gradient" href="<?php echo e(home_url('/join-us')); ?>"><?php echo e(_e('Join Hydra', THEME)); ?></a>
      </div>
    </nav>
    
  <?php endif; ?>
  </div>

</header>
<?php /**PATH /var/www/html/wp-content/themes/hydra/resources/views/sections/header.blade.php ENDPATH**/ ?>