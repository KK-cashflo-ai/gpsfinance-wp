<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/legacy/favicon.png'); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container">
    <div class="header-content">
      <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="GPS Finance Home">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/legacy/logo.png'); ?>" width="360" height="80" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
      </a>

      <button class="mobile-menu-toggle" aria-label="Toggle navigation" aria-expanded="false">
        <span class="hamburger"></span>
      </button>

      <nav class="main-nav" aria-label="Main navigation">
        <?php
          $items = wp_get_nav_menu_items('Primary Menu');
          if (!$items) {
            // Fallback if menu isn't created yet
            $fallback = [
              ['Services', '/services/'],
              ['Locations', '/locations/'],
              ['Guides', '/guides/'],
              ['About', '/about/'],
              ['Get Started', '/contact/', 'nav-cta'],
            ];
            foreach ($fallback as $f) {
              $cls = isset($f[2]) ? ' class="' . esc_attr($f[2]) . '"' : '';
              echo '<a href="' . esc_url(home_url($f[1])) . '"' . $cls . '>' . esc_html($f[0]) . '</a>';
            }
          } else {
            foreach ($items as $item) {
              $classes = is_array($item->classes) ? $item->classes : [];
              $extra = '';
              if (in_array('nav-cta', $classes, true)) $extra = ' nav-cta';
              echo '<a href="' . esc_url($item->url) . '" class="' . esc_attr(trim($extra)) . '">' . esc_html($item->title) . '</a>';
            }
          }
        ?>
      </nav>
    </div>
  </div>
</header>
