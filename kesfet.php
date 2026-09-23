<?php
$pageTitle = 'Kaz Dağları & Ege Rotaları | Gezilecek Yerler Rehberi';
$pageDesc = 'Mare & Monte konaklamanız sırasında keşfedebileceğiniz Kaz Dağları, Assos, Adatepe, Zeus Altarı, Antandros Antik Kenti ve tekne turları rehberi.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/09.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="discover.eyebrow">Keşif Rehberi</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);" data-i18n="discover.title">Kaz Dağları & Ege Rotaları</h1>
      <p class="hero-desc" data-i18n="discover.lead">
        Antik çağların İda Dağı’ndan Assos felsefe limanına, şelalelerden asırlık taş köylere unutulmaz gezi rotaları.
      </p>
    </div>
  </section>

  <!-- Quick Booking Search Bar -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- Exploration Routes Grid -->
  <section class="section">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center" data-i18n="discover.eyebrow">Gezilecek Yerler & Turlar</div>
        <h2>Otelimizden Kolayca Ulaşabileceğiniz Noktalar</h2>
        <p class="lead" data-i18n="discover.p">Misafirlerimize anlaşmalı tur acentalarımız ile rehberli Kaz Dağları turları, tekne gezileri ve transfer desteği sağlıyoruz.</p>
      </div>

      <div class="routes-grid" style="grid-template-columns:repeat(3, 1fr); gap:32px;">
        <?php foreach ($routes as $route): ?>
          <div class="route-card" style="padding:34px;">
            <div class="route-header">
              <span class="route-tag"><?php echo htmlspecialchars($route['tag']); ?></span>
              <span class="route-dist" style="display:flex; align-items:center; gap:5px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <?php echo htmlspecialchars($route['dist']); ?>
              </span>
            </div>
            <h3 class="route-title"><?php echo htmlspecialchars($route['title']); ?></h3>
            <p class="route-desc" style="line-height:1.75;"><?php echo htmlspecialchars($route['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Tour Agency Partnership Banner -->
  <section class="section section-dark">
    <div class="container">
      <div class="split-grid">
        <div>
          <div class="eyebrow">Acenta & Tur Desteği</div>
          <h2>Rehberli Turlar ve İndirimli Gezi Olanakları</h2>
          <p class="lead" data-i18n="discover.p">
            Tatilinizi sadece otelde değil, bölgenin eşsiz doğası ve tarihiyle zenginleştirmek isteyen misafirlerimize bölgenin en güvenilir yerel acentalarıyla iş birliği içinde özel indirimler sunuyoruz.
          </p>
          <ul style="display:flex; flex-direction:column; gap:14px; margin-block:22px; color:var(--text-light-muted);">
            <li style="display:flex; align-items:center; gap:10px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <span>Özel 4x4 Jeep Safari ve Kaz Dağları Milli Parkı Turları</span>
            </li>
            <li style="display:flex; align-items:center; gap:10px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <span>Altınoluk İskelesi’nden Günlük Ege Koyları Tekne Turları</span>
            </li>
            <li style="display:flex; align-items:center; gap:10px;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
              <span>Assos, Truva ve Antandros Antik Kentleri Kültür Gezileri</span>
            </li>
          </ul>
          <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-primary" data-i18n="contact.call_btn">Tur Bilgisi ve Rezervasyon</a>
        </div>

        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:460px;">
          <img src="images/13.jpg" alt="Kaz Dağları ve Körfez Manzarası" style="width:100%; height:100%; object-fit:cover;" />
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
