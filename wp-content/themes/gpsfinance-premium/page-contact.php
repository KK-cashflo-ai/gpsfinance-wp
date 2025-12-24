<?php
/**
 * Auto-generated from legacy file: contact.php
 */
get_header();
?>

<main>
  <section class="hero hero-simple">
    <div class="aurora-bg"></div>
    <div class="container">
      <div class="hero-content reveal">
        <p class="kicker">Contact</p>
        <h1>Speak to Us</h1>
        <p class="lead" id="ai-snippet">Tell us your Goal (buy/refi/invest/business), timeline, and structure — we’ll reply with a simple checklist and a clear route.</p>
        <div class="hero-cta">
          <a href="tel:+61487964316" class="btn btn-primary">Call</a>
          <a href="mailto:kk@gpsfinance.com.au" class="btn btn-secondary">Email</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section contact-section">
    <div class="container">
      <div class="contact-wrapper">
        <div class="contact-content reveal">
          <h2>Direct</h2>
          <p>Fastest route: call or email.</p>
          <div class="contact-details">
            <a href="tel:+61487964316">+61487964316</a>
            <a href="mailto:kk@gpsfinance.com.au">kk@gpsfinance.com.au</a>
          </div>
          <p class="trust-line">Sydney-focused + Australia-wide remote • MFAA Member</p>
        </div>

        <form class="contact-form card reveal" method="post" action="">
          <h3>Quick message</h3>
          <label>Name<input type="text" name="name" required /></label>
          <label>Email<input type="email" name="email" required /></label>
          <label>Message<textarea name="message" rows="5" required></textarea></label>
          <button type="submit" class="btn btn-primary">Send</button>
          <p class="small-note"><?= h($site["disclaimer"]) ?></p>
        </form>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
