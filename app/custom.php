<?php 

namespace App;

define('THEME', 'hydra');

class HydraTheme {
    
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'add_custom_font']);
        add_action('admin_menu', [$this, 'add_options_page']);
        add_action('admin_init', [$this, 'register_settings_and_fields']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_media_scripts']);    
        add_action('init', [$this, 'register_custom_blocks']);
    }

    public function enqueue_media_scripts() {
        if (is_admin()) {
            wp_enqueue_media();
        }
    }

    public function add_custom_font() {
        wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap');
    }

    public function add_options_page() {
        add_menu_page(
            'Hydra Options',
            'Hydra Options',
            'manage_options',
            'my_options',
            [$this, 'render_options_page'],
            'dashicons-admin-generic'
        );
    }

    public function render_options_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Options page', THEME) ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('hydra_options');
                do_settings_sections('my_options');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function register_settings_and_fields() {
        register_setting('hydra_options', 'facebook_logo_url');
        register_setting('hydra_options', 'twitter_logo_url');
        register_setting('hydra_options', 'button_url');
        register_setting('hydra_options', 'header_logo_image', array($this, 'sanitize_image_upload'));
        register_setting('hydra_options', 'footer_logo_image', array($this, 'sanitize_image_upload'));

        add_settings_section('my_section', 'Logo and Button Settings', array($this, 'render_section'), 'my_options');
        
        add_settings_field('header_logo_image', 'Upload Header Logo', array($this, 'render_header_logo_image_field'), 'my_options', 'my_section');
        add_settings_field('footer_logo_image', 'Upload Header Logo', array($this, 'render_footer_logo_image_field'), 'my_options', 'my_section');
        add_settings_field('facebook_logo_url', 'Facebook Icon URL', array($this, 'render_facebook_logo_field'), 'my_options', 'my_section');
        add_settings_field('twitter_logo_url', 'Twitter Icon URL', array($this, 'render_twitter_logo_field'), 'my_options', 'my_section');
        add_settings_field('button_url', 'Button URL', array($this, 'render_button_field'), 'my_options', 'my_section');
    }

    public function render_section() {
        _e('Customize the settings for logos and links below:', THEME);
    }

    public function render_header_logo_image_field() {
        $value = get_option('header_logo_image');
        echo '<input type="text" name="header_logo_image" value="' . esc_attr($value) . '" />';
        echo '<input type="button" class="button-primary" value="Upload Image" id="upload_header_logo" />';
        echo '<img id="header_logo_preview" src="' . esc_url($value) . '" style="max-width: 200px; display: block; margin-top: 10px;" />';
        ?>
        <script>
            jQuery(document).ready(function($){
                var mediaUploader;

                $('#upload_header_logo').click(function(e) {
                    e.preventDefault();
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }

                    mediaUploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });

                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        $('#header_logo_preview').attr('src', attachment.url);
                        $('[name="header_logo_image"]').val(attachment.url);
                    });

                    mediaUploader.open();
                });
            });
        </script>
        <?php
    }

    public function render_footer_logo_image_field() {
        $value = get_option('footer_logo_image');
        echo '<input type="text" name="footer_logo_image" value="' . esc_attr($value) . '" />';
        echo '<input type="button" class="button-primary" value="Upload Image" id="upload_footer_logo" />';
        echo '<img id="footer_logo_preview" src="' . esc_url($value) . '" style="max-width: 200px; display: block; margin-top: 10px;" />';
        ?>
        <script>
            jQuery(document).ready(function($){
                var mediaUploader;

                $('#upload_footer_logo').click(function(e) {
                    e.preventDefault();
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }

                    mediaUploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });

                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        $('#footer_logo_preview').attr('src', attachment.url);
                        $('[name="footer_logo_image"]').val(attachment.url);
                    });

                    mediaUploader.open();
                });
            });
        </script>
        <?php
    }

    public function render_facebook_logo_field() {
        $value = get_option('facebook_logo_url');
        echo '<input type="text" name="facebook_logo_url" value="' . esc_attr($value) . '" />';
    }

    public function render_twitter_logo_field() {
        $value = get_option('twitter_logo_url');
        echo '<input type="text" name="twitter_logo_url" value="' . esc_attr($value) . '" />';
    }

    public function render_button_field() {
        $value = get_option('button_url');
        echo '<input type="text" name="button_url" value="' . esc_attr($value) . '" />';
    }

    public function sanitize_image_upload($value) {
        return esc_url_raw($value);
    }

    public function register_custom_blocks() {
        wp_register_script(
            'hero',
            get_template_directory_uri() . '/blocks/hero/hero.js',
            array('wp-blocks', 'wp-components', 'wp-editor'),
            filemtime(get_template_directory() . '/blocks/hero/hero.js')
        );
    
        register_block_type('hydra/hero', array(
            'editor_script' => 'hero',
        ));
    }
}

new HydraTheme();