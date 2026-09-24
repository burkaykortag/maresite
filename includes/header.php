<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/media-helper.php';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
if ($currentPage === 'index' || $currentPage === '') $currentPage = 'anasayfa';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME . ' | ' . SITE_TAGLINE; ?></title>
  <meta name="description" content="<?php echo isset($pageDesc) ? $pageDesc : 'Altınoluk’ta denize sıfır konumda, Kaz Dağları eteklerinde +16 adult konsept butik otel, 450 m² çınar bahçesi bistro, özel plaj ve 12 ay açık şömineli salon.'; ?>" />
  <meta name="keywords" content="Mare Monte Hotel, Altınoluk butik otel, denize sıfır otel, Kaz Dağları otelleri, Altınoluk bistro, +16 adult otel, Edremit Körfezi konaklama, Çınar Bar" />
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/01.jpg" />
  
  <!-- OpenGraph / Social -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME; ?>" />
  <meta property="og:description" content="Ege’nin kıyısında, Kaz Dağları’nın eteklerinde denize sıfır huzur ve lezzet dolu butik konaklama deneyimi." />
  <meta property="og:image" content="images/01.jpg" />
  <meta property="og:url" content="<?php echo SITE_URL; ?>" />

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WP3X93KJ');</script>
  <!-- End Google Tag Manager -->

  <!-- Structured Data JSON-LD (Hotel Schema) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Hotel",
    "name": "Mare & Monte Hotel & Bistro",
    "image": "<?php echo SITE_URL; ?>/images/01.jpg",
    "description": "Altınoluk'ta denize sıfır, Kaz Dağları eteklerinde +16 adult butik otel ve bistro bahçesi.",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "İskele Mahallesi Cevdet Sunay Caddesi No:15",
      "addressLocality": "Altınoluk, Edremit",
      "addressRegion": "Balıkesir",
      "addressCountry": "TR"
    },
    "telephone": "<?php echo PHONE_PRIMARY_CLEAN; ?>",
    "url": "<?php echo SITE_URL; ?>",
    "priceRange": "$$$",
    "amenityFeature": [
      {"@type": "LocationFeatureSpecification", "name": "Özel Plaj", "value": true},
      {"@type": "LocationFeatureSpecification", "name": "Bistro Restoran & Çınar Bar", "value": true},
      {"@type": "LocationFeatureSpecification", "name": "Ücretsiz Wi-Fi", "value": true},
      {"@type": "LocationFeatureSpecification", "name": "+16 Yetişkin Konsepti", "value": true},
      {"@type": "LocationFeatureSpecification", "name": "12 Ay Açık / Şömineli Kış Salonu", "value": true}
    ]
  }
  </script>

  <!-- Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP3X93KJ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Top Announcement Bar -->
  <div class="top-bar">
    <div class="container top-bar-inner">
      <div class="top-bar-left">
        <span class="top-bar-badge" data-i18n="top.adult">+16 ADULT ONLY</span>
        <span class="top-bar-item">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
          <span data-i18n="top.location">Altınoluk, Edremit / Denize Sıfır</span>
        </span>
        <span class="top-bar-item">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          <span data-i18n="top.open">12 Ay Kesintisiz Açık</span>
        </span>
      </div>
      <div class="top-bar-right">
        <!-- Language Switcher -->
        <div class="lang-switch">
          <button class="lang-btn active" data-lang="tr">TR</button>
          <span style="color:rgba(255,255,255,0.3); font-size:0.7rem;">|</span>
          <button class="lang-btn" data-lang="en">EN</button>
        </div>

        <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="top-bar-phone" style="display:inline-flex; align-items:center; gap:6px; color:var(--text-light); font-weight:600;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <?php echo PHONE_PRIMARY; ?>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Site Header -->
  <header class="site-header">
    <div class="container nav-container">
      <a href="index.php" class="brand-logo">
        <span class="brand-logo-text">MARE <span>&</span> MONTE</span>
        <span class="brand-logo-sub">HOTEL & BISTRO · ALTINOLUK</span>
      </a>

      <!-- Desktop Nav -->
      <nav class="nav-menu">
        <a href="index.php" class="nav-link <?php echo get_active_nav('anasayfa', $currentPage); ?>" data-i18n="nav.home">Ana Sayfa</a>
        <a href="odalar.php" class="nav-link <?php echo get_active_nav('odalar', $currentPage); ?>" data-i18n="nav.rooms">Odalarımız</a>
        <a href="bistro.php" class="nav-link <?php echo get_active_nav('bistro', $currentPage); ?>" data-i18n="nav.bistro">Bistro & Bar</a>
        <a href="plaj.php" class="nav-link <?php echo get_active_nav('plaj', $currentPage); ?>" data-i18n="nav.beach">Özel Plaj</a>
        <a href="kesfet.php" class="nav-link <?php echo get_active_nav('kesfet', $currentPage); ?>" data-i18n="nav.discover">Kaz Dağları & Rotalar</a>
        <a href="galeri.php" class="nav-link <?php echo get_active_nav('galeri', $currentPage); ?>" data-i18n="nav.gallery">Galeri</a>
        <a href="iletisim.php" class="nav-link <?php echo get_active_nav('iletisim', $currentPage); ?>" data-i18n="nav.contact">İletişim</a>
      </nav>

      <!-- Nav Action CTAs -->
      <div class="nav-actions">
        <a href="#" data-modal-target="bookingModal" class="btn btn-primary btn-sm" data-i18n="nav.book">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          Rezervasyon
        </a>
        <button class="hamburger-btn" aria-label="Menüyü Aç/Kapat">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-nav-backdrop"></div>
  <aside class="mobile-nav">
    <div>
      <div class="mobile-nav-header">
        <a href="index.php" class="brand-logo">
          <span class="brand-logo-text">MARE <span>&</span> MONTE</span>
          <span class="brand-logo-sub">HOTEL & BISTRO</span>
        </a>
        <button class="mobile-nav-close" aria-label="Kapat">&times;</button>
      </div>
      <div class="mobile-menu-links">
        <a href="index.php" class="<?php echo get_active_nav('anasayfa', $currentPage); ?>" data-i18n="nav.home">Ana Sayfa</a>
        <a href="odalar.php" class="<?php echo get_active_nav('odalar', $currentPage); ?>" data-i18n="nav.rooms">Odalarımız (22 Oda)</a>
        <a href="bistro.php" class="<?php echo get_active_nav('bistro', $currentPage); ?>" data-i18n="nav.bistro">Bistro & Çınar Bar</a>
        <a href="plaj.php" class="<?php echo get_active_nav('plaj', $currentPage); ?>" data-i18n="nav.beach">Özel Plaj (60 Şezlong)</a>
        <a href="kesfet.php" class="<?php echo get_active_nav('kesfet', $currentPage); ?>" data-i18n="nav.discover">Kaz Dağları & Ege Rotaları</a>
        <a href="galeri.php" class="<?php echo get_active_nav('galeri', $currentPage); ?>" data-i18n="nav.gallery">Fotoğraf Galerisi</a>
        <a href="iletisim.php" class="<?php echo get_active_nav('iletisim', $currentPage); ?>" data-i18n="nav.contact">İletişim & Konum</a>
      </div>
    </div>
    <div class="mobile-nav-footer">
      <div class="lang-switch" style="margin-bottom:15px; justify-content:center; display:flex;">
        <button class="lang-btn active" data-lang="tr">Türkçe</button>
        <button class="lang-btn" data-lang="en">English</button>
      </div>
      <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-primary" style="width:100%; margin-bottom: 12px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        Hemen Ara: <?php echo PHONE_PRIMARY; ?>
      </a>
      <p style="font-size:0.75rem; text-align:center; color:rgba(255,255,255,0.6); margin-top:8px;">+16 Adult Only · 12 Ay Açık</p>
    </div>
  </aside>
