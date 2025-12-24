<?php
// gpsfinance-blog/single.php
get_header();

function gp_get_meta($key) {
  $v = get_post_meta(get_the_ID(), $key, true);
  return is_string($v) ? trim($v) : $v;
}

function gp_render_tldr($text) {
  if (!$text) return;
  ?>
  <section class="gp-ai-box gp-tldr" aria-label="Summary">
    <h2 class="gp-ai-title">TL;DR</h2>
    <div class="gp-ai-body">
      <?php
      // Allow basic formatting but keep it clean
      echo wp_kses_post(wpautop($text));
      ?>
    </div>
  </section>
  <?php
}

function gp_parse_faq_json($json) {
  if (!$json) return [];
  $data = json_decode($json, true);
  if (!is_array($data)) return [];

  // Expect: [{"q":"...","a":"..."}, ...]
  $out = [];
  foreach ($data as $row) {
    if (!is_array($row)) continue;
    $q = isset($row['q']) ? trim((string)$row['q']) : '';
    $a = isset($row['a']) ? trim((string)$row['a']) : '';
    if ($q && $a) $out[] = ['q' => $q, 'a' => $a];
  }
  return $out;
}

function gp_render_faq($items) {
  if (empty($items)) return;
  ?>
  <section class="gp-ai-box gp-faq" aria-label="Frequently asked questions">
    <h2 class="gp-ai-title">FAQs</h2>
    <div class="gp-faq-list">
      <?php foreach ($items as $i => $it): ?>
        <details class="gp-faq-item">
          <summary class="gp-faq-q"><?php echo esc_html($it['q']); ?></summary>
          <div class="gp-faq-a"><?php echo wp_kses_post(wpautop($it['a'])); ?></div>
        </details>
      <?php endforeach; ?>
    </div>
  </section>
  <?php
}

function gp_render_faq_schema($items) {
  if (empty($items)) return;
  $schema = [
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => array_map(function($it) {
      return [
        "@type" => "Question",
        "name" => $it['q'],
        "acceptedAnswer" => [
          "@type" => "Answer",
          "text" => wp_strip_all_tags($it['a'])
        ]
      ];
    }, $items)
  ];
  echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) . '</script>';
}
?>

<section class="gp-single">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php
        $tldr = gp_get_meta('gp_tldr');
        $faq_items = gp_parse_faq_json(gp_get_meta('gp_faq_json'));
      ?>

      <article class="gp-article">

        <header class="gp-article-header">
          <h1 class="gp-article-title"><?php the_title(); ?></h1>

          <div class="gp-article-meta">
            <span><?php echo esc_html(get_the_date()); ?></span>
            <span class="gp-dot">•</span>
            <span><?php echo esc_html(wp_strip_all_tags(get_the_category_list(', '))); ?></span>
          </div>

          <?php if (has_post_thumbnail()) : ?>
            <div class="gp-article-thumb">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>
        </header>

        <?php gp_render_tldr($tldr); ?>

        <div class="gp-article-content">
          <?php the_content(); ?>
        </div>

        <?php gp_render_faq($faq_items); ?>
        <?php gp_render_faq_schema($faq_items); ?>

      </article>

    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>
