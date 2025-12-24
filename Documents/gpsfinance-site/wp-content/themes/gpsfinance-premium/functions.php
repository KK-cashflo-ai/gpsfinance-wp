<?php
/**
 * Theme: GPS Finance Premium
 */

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  register_nav_menus([
    'primary' => __('Primary Menu', 'gpsfinance'),
    'footer'  => __('Footer Menu', 'gpsfinance'),
  ]);
});

add_action('wp_enqueue_scripts', function () {
  if (is_admin()) return;

  // Keep WP's block CSS off if you're not using heavy blocks.
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('global-styles');

  // Fonts (as per legacy design)
  wp_enqueue_style(
    'gpsfinance-inter',
    'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
    [],
    null
  );

  $legacy = get_stylesheet_directory_uri() . '/assets/legacy';

  // Legacy site styling + JS (applied site-wide)
  wp_enqueue_style('gpsfinance-legacy', $legacy . '/theme.css', ['gpsfinance-inter'], '1.0');
  wp_enqueue_script('gpsfinance-legacy-js', $legacy . '/theme.js', [], '1.0', true);

  // Theme overrides last
  wp_enqueue_style('gpsfinance-theme', get_stylesheet_uri(), ['gpsfinance-legacy'], '1.0');
}, 100);
