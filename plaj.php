<?php
$pageTitle = 'Özel Plaj & Deniz Deneyimi | 60 Şezlong & Midilli Manzarası';
$pageDesc = 'Mare & Monte Hotel’in Altınoluk’ta denize sıfır özel plajı: 60 şezlong kapasitesi, berrak Ege denizi, bistro servisi ve +16 sakinlik konsepti.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/07.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="beach.eyebrow">Özel Plaj & Ege Denizi</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);" data-i18n="beach.title">Denize Sıfır Sakinlik ve Konfor</h1>
      <p class="hero-desc" data-i18n="beach.p1">
        Midilli Adası manzarası eşliğinde, 60 şezlong kapasiteli özel plajımızda Ege güneşinin ve berrak suların tadını çıkarın.
      </p>
    </div>
  </section>

  <!-- Quick Booking Search Bar -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- Beach Details -->
  <section class="section">
    <div class="container">
      <div class="beach-grid">
        <div>
          <div class="eyebrow" data-i18n="beach.eyebrow">Deniz & Güneş</div>
          <h2 data-i18n="beach.title">Sabahın ilk ışıklarından gün batımına kesintisiz deniz keyfi.</h2>
          <p class="lead" data-i18n="beach.p1">
            Mare & Monte sahili, Altınoluk’un en temiz ve durgun koylarından birinde yer alır. Misafirlerimize özel olarak ayrılmış 60 şezlong kapasiteli plajımızda kalabalıktan ve gürültüden uzak, tam bir dinginlik hakimdir.
          </p>
          <p data-i18n="beach.p2">
            Şezlongunuza kadar uzanan bistro ve bar servisimiz sayesinde soğuk içecekleriniz, taze meyve kokteylleriniz ve lezzetli atıştırmalıklarınız gün boyu yanınızda.
          </p>

          <div class="beach-features-list" style="margin-top:32px;">
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>60 Özel Şezlong & Geniş Şemsiyeler</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>Otel Misafirlerine Özel Plaj Erişimi</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>Şezlonga Özel Bistro & Bar Servisi</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>Plaj Havlusu & Duş / Soyunma Alanları</span>
            </div>
          </div>

          <div style="margin-top:36px; display:flex; gap:14px; flex-wrap:wrap;">
            <a href="#" data-modal-target="bookingModal" class="btn btn-primary" data-i18n="hero.cta_book">Konaklama Rezervasyonu Yap</a>
            <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-dark" data-i18n="contact.call_btn">Plaj Bilgisi Alın</a>
          </div>
        </div>

        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:520px;">
          <img src="images/07.jpg" alt="Mare Monte Plajı ve Deniz" style="width:100%; height:100%; object-fit:cover;" />
        </div>
      </div>
    </div>
  </section>

  <!-- Midilli Sunset Section -->
  <section class="section section-dark">
    <div class="container">
      <div class="split-grid">
        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:480px;">
          <img src="images/01.jpg" alt="Mare Monte Gün Batımı" style="width:100%; height:100%; object-fit:cover;" />
        </div>
        <div>
          <div class="eyebrow">Gün Batımı Büyüsü</div>
          <h2>Midilli Adası Karşısında Günün En Güzel Saati</h2>
          <p class="lead">
            Altınoluk’ta gün batımı, Ege Denizi’nin kızıl ve altın tonlarına büründüğü büyüleyici bir görsel şölendir.
          </p>
          <p>
            Plajımızda gün batımı kokteylinizi yudumlarken güneşin Midilli silueti arkasında kayboluşuna tanıklık edebilir, akşam yemeğinizi dalga sesleri eşliğinde planlayabilirsiniz.
          </p>
          <div style="margin-top:28px;">
            <a href="bistro.php" class="btn btn-primary" data-i18n="nav.bistro">Bistro & Kokteyllerimizi İnceleyin</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
