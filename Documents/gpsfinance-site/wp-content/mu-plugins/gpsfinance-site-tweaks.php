<?php
/**
 * Plugin Name: GPS Finance Site Tweaks (MU)
 * Description: Always-on tweaks for performance and consistency.
 */

add_action('init', function () {
  // Disable emojis for a tiny performance win
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
});
