<?php
// gpsfinance-blog/archive.php
get_header();
?>

<section class="gp-blog-hero">
  <div class="container">
    <h1 class="gp-blog-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
    <?php if (get_the_archive_description()) : ?>
      <p class="gp-blog-subtitle"><?php echo wp_kses_post(get_the_archive_description()); ?></p>
    <?php endif; ?>
  </div>
</section>

<section class="gp-blog-list">
  <div class="container">

    <?php if (have_posts()) : ?>
      <div class="gp-post-grid">
        <?php while (have_posts()) : the_post(); ?>
          <article class="gp-post-card">
            <a class="gp-post-link" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <div class="gp-post-thumb">
                  <?php the_post_thumbnail('large'); ?>
                </div>
              <?php endif; ?>

              <div class="gp-post-body">
                <div class="gp-post-meta">
                  <span><?php echo esc_html(get_the_date()); ?></span>
                  <span class="gp-dot">•</span>
                  <span><?php echo esc_html(get_the_category_list(', ')); ?></span>
                </div>

                <h2 class="gp-post-h"><?php the_title(); ?></h2>
                <p class="gp-post-excerpt"><?php echo esc_html(wp_strip_all_tags(get_the_excerpt())); ?></p>
                <span class="gp-post-cta">Read →</span>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      </div>

      <div class="gp-pagination">
        <?php the_posts_pagination(); ?>
      </div>

    <?php else : ?>
      <p>No posts found.</p>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>
