<?php
/**
 * Auto-generated from legacy file: index.php
 */
get_header();
?>

<main>
  <section class="hero">
    <div class="aurora-bg"></div>
    <div class="container">
      <div class="hero-content reveal">
        <p class="kicker">Sydney-focused + Australia-wide</p>
        <h1><?= h($site["tagline"]) ?></h1>
        <p class="lead">Sydney-based finance specialists helping self-employed borrowers, investors and complex structures secure the right lender and loan — with clarity, strategy and guidance end-to-end.</p>

        <div class="hero-cta">
          <a href="/contact/" class="btn btn-primary">Start Your Journey</a>
          <a href="/services/" class="btn btn-secondary">Explore Services</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section ai-answer">
    <div class="container">
      <div class="card">
        <strong>What does GPS Finance do?</strong>
        <p id="ai-snippet"><?= h($site["aiSnippet"]) ?></p>
      </div>
    </div>
  </section>

  <section class="section services" id="services">
    <div class="container">
      <div class="section-header reveal">
        <h2>Top routes</h2>
        <p>Refinancing, investor loans, and self-employed + trust/trustee purchases.</p>
      </div>

      <div class="service-grid">
        <?php foreach ($site["topServices"] as $svc): ?>
        <article class="card service-card reveal">
          <div class="card-icon">★</div>
          <h3><?= h($svc[0]) ?></h3>
          <p><?= h($svc[2]) ?></p>
          <a href="<?= h($svc[1]) ?>" class="card-link">Learn more →</a>
        </article>
        <?php endforeach; ?>

        <article class="card service-card reveal">
          <div class="card-icon">▣</div>
          <h3>Asset finance</h3>
          <p>Car finance and business equipment finance structured to match cash flow.</p>
          <a href="/services/asset-finance/car-finance/" class="card-link">Learn more →</a>
        </article>

        <article class="card service-card reveal">
          <div class="card-icon">▣</div>
          <h3>Business loans</h3>
          <p>Working capital, growth funding, and acquisition finance.</p>
          <a href="/services/business/business-loans/" class="card-link">Learn more →</a>
        </article>

        <article class="card service-card reveal">
          <div class="card-icon">▣</div>
          <h3>Commercial mortgages</h3>
          <p>Owner-occupied and investment commercial property finance.</p>
          <a href="/services/mortgages/commercial-mortgages/" class="card-link">Learn more →</a>
        </article>
      </div>
    </div>
  </section>

  <section class="section gps-method">
    <div class="container">
      <div class="section-header reveal">
        <h2>The GPS Finance Method</h2>
        <p>A proven 4-step journey to your financial destination</p>
      </div>

      <div class="method-grid">
        <div class="method-step reveal">
          <div class="step-number">01</div>
          <h3>Map</h3>
          <p>Clarify the destination: goal, timeline, structure, and constraints.</p>
        </div>
        <div class="method-step reveal">
          <div class="step-number">02</div>
          <h3>Choose</h3>
          <p>Shortlist policy-fit lenders and product features that match your plan.</p>
        </div>
        <div class="method-step reveal">
          <div class="step-number">03</div>
          <h3>Execute</h3>
          <p>Package documents cleanly and manage the lender process end-to-end.</p>
        </div>
        <div class="method-step reveal">
          <div class="step-number">04</div>
          <h3>Deliver</h3>
          <p>Settlement and beyond — we remain your ongoing finance partner.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section services" id="locations">
    <div class="container">
      <div class="section-header reveal">
        <h2>Local authority hubs</h2>
        <p>Inner West, North Shore and Eastern Suburbs — plus Australia-wide remote support.</p>
      </div>

      <div class="service-grid">
        <article class="card service-card reveal">
          <div class="card-icon">⌁</div>
          <h3>Inner West</h3>
          <p>Refinance, investor loans, and self-employed structures.</p>
          <a href="/locations/inner-west/" class="card-link">View hub →</a>
        </article>
        <article class="card service-card reveal">
          <div class="card-icon">⌁</div>
          <h3>North Shore</h3>
          <p>Structure-first borrowing for complex scenarios.</p>
          <a href="/locations/north-shore/" class="card-link">View hub →</a>
        </article>
        <article class="card service-card reveal">
          <div class="card-icon">⌁</div>
          <h3>Eastern Suburbs</h3>
          <p>Premium purchases and investment strategy.</p>
          <a href="/locations/eastern-suburbs/" class="card-link">View hub →</a>
        </article>
      </div>
    </div>
  </section>

  <section class="section contact-section" id="contact">
    <div class="container">
      <div class="contact-wrapper">
        <div class="contact-content reveal">
          <h2>Ready to map your route?</h2>
          <p>Share your goal, timeline and structure — we’ll guide the next steps.</p>

          <div class="contact-details">
            <a href="tel:<?= h($site["phone"]) ?>"><?= h($site["phone"]) ?></a>
            <a href="mailto:<?= h($site["email"]) ?>"><?= h($site["email"]) ?></a>
          </div>

          <p class="trust-line">MFAA Member • Sydney-focused + Australia-wide remote</p>
        </div>

        <form class="contact-form card reveal" method="post" action="/contact.php">
          <h3>Quick message</h3>
          <label>
            Name
            <input type="text" name="name" required />
          </label>
          <label>
            Email
            <input type="email" name="email" required />
          </label>
          <label>
            What are you trying to do?
            <textarea name="message" rows="4" required></textarea>
          </label>
          <button type="submit" class="btn btn-primary">Send</button>
          <p class="small-note"><?= h($site["disclaimer"]) ?></p>
        </form>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
