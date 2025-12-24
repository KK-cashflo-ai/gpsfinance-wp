<footer class="site-footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-brand">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/legacy/logo.png'); ?>" width="180" height="40" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
        <p><?php echo esc_html(get_bloginfo('description') ?: 'Mortgage, business & asset finance — Sydney + Australia-wide remote'); ?></p>
        <p class="small-note">Sydney-based. Australia-wide via phone + video.</p>
      </div>

      <div class="footer-links">
        <div class="footer-column">
          <h4>Services</h4>
          <a href="<?php echo esc_url(home_url('/services/mortgages/refinancing/')); ?>">Refinancing</a>
          <a href="<?php echo esc_url(home_url('/services/mortgages/investment-loans/')); ?>">Investor loans</a>
          <a href="<?php echo esc_url(home_url('/services/mortgages/self-employed-home-loans/')); ?>">Self-employed + trusts</a>
          <a href="<?php echo esc_url(home_url('/services/business/business-loans/')); ?>">Business loans</a>
          <a href="<?php echo esc_url(home_url('/services/asset-finance/equipment-finance/')); ?>">Asset finance</a>
        </div>

        <div class="footer-column">
          <h4>Company</h4>
          <a href="<?php echo esc_url(home_url('/about/')); ?>">About</a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>">Get started</a>
          <a href="<?php echo esc_url(home_url('/guides/')); ?>">Guides</a>
        </div>

        <div class="footer-column">
          <h4>Locations</h4>
          <a href="<?php echo esc_url(home_url('/locations/eastern-suburbs/')); ?>">Eastern Suburbs</a>
          <a href="<?php echo esc_url(home_url('/locations/inner-west/')); ?>">Inner West</a>
          <a href="<?php echo esc_url(home_url('/locations/north-shore/')); ?>">North Shore</a>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© <?php echo esc_html(date('Y')); ?> GPS Finance. All rights reserved.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
