<?php
$pageTitle = 'Bistro, Gastronomi & Çınar Bar | Ege Lezzetleri & Şarap';
$pageDesc = 'Mare & Monte Bistro: 450 m² asırlık çınar bahçesinde Ege mezeleri, günlük taze balıklar, imza kokteyller ve şarap kavı. Altınoluk denize sıfır lezzet durağı.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/03.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="bistro.eyebrow">Gastronomi & Çınar Bar</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);" data-i18n="bistro.title">Asırlık Çınarın Gölgesinde Ege Sofrası</h1>
      <p class="hero-desc" data-i18n="bistro.lead">
        Kaz Dağları’nın aromatik otları, Edremit Körfezi’nin günlük taze deniz ürünleri ve özenle seçilmiş şarap kavımız.
      </p>
    </div>
  </section>

  <!-- Quick Booking Search Bar -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- Bistro Concept Story -->
  <section class="section">
    <div class="container">
      <div class="split-grid">
        <div>
          <div class="eyebrow">Lezzet Felsefemiz</div>
          <h2>Tazelik, Yöresellik ve Zamansız Bir Ege Ritmi.</h2>
          <p class="lead">
            Mare & Monte Bistro mutfağı; Kaz Dağları’nın köylerinden toplanan yabani otları, Altınoluk’un ödüllü sızma zeytinyağlarını ve Körfez balıkçılarının sabah getirdiği taze deniz mahsullerini sofranıza taşır.
          </p>
          <p>
            450 m² büyüklüğündeki asırlık çınar bahçemizde sabah kuş sesleri eşliğinde başlayan zengin Ege kahvaltısı, gün batımında yerini imza kokteyller, şarap tadımları ve deniz kenarında canlı sohbetlere bırakır.
          </p>
          <div style="display:flex; gap:14px; margin-top:30px;">
            <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-primary" data-i18n="contact.call_btn">Masa Rezervasyonu</a>
            <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" rel="noopener" class="btn btn-whatsapp">WhatsApp’tan Yazın</a>
          </div>
        </div>

        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:480px;">
          <img src="images/05.jpg" alt="Ege mutfağı zeytinyağlı mezeler" style="width:100%; height:100%; object-fit:cover;" />
        </div>
      </div>
    </div>
  </section>

  <!-- Full Categorized Menu Section -->
  <section class="section section-dark" id="menu">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center">Seçkin Menümüz</div>
        <h2>Bistro & Bar Menüsü</h2>
        <p class="lead">Damak zevkinize hitap eden özenle hazırlanmış gurme lezzetler.</p>
      </div>

      <!-- Menu Tabs Navigation -->
      <div class="menu-tabs-nav">
        <button class="menu-tab-btn active" data-tab="tab-kahvalti">Ege Serpme Kahvaltı</button>
        <button class="menu-tab-btn" data-tab="tab-mezeler">Ege Mezeleri & Zeytinyağlılar</button>
        <button class="menu-tab-btn" data-tab="tab-deniz">Deniz Ürünleri & Sıcaklar</button>
        <button class="menu-tab-btn" data-tab="tab-bar">Çınar Bar & Kokteyller</button>
      </div>

      <!-- Menu Tab Contents -->
      <?php foreach ($menu_categories as $key => $cat): ?>
        <div id="tab-<?php echo $key; ?>" class="menu-tab-panel <?php echo ($key === 'kahvalti') ? 'active' : ''; ?>">
          <div style="text-align:center; max-width:680px; margin:0 auto 38px auto;">
            <span class="top-bar-badge" style="margin-bottom:10px; display:inline-block;"><?php echo $cat['badge']; ?></span>
            <h3 style="color:#FFFFFF; font-size:1.75rem; margin-bottom:8px;"><?php echo $cat['name']; ?></h3>
            <p style="color:var(--text-light-muted); font-size:0.95rem;"><?php echo $cat['desc']; ?></p>
          </div>

          <div class="menu-grid">
            <?php foreach ($cat['items'] as $item): ?>
              <div class="menu-card">
                <div class="menu-card-header">
                  <h4 class="menu-item-title"><?php echo htmlspecialchars($item['title']); ?></h4>
                </div>
                <p class="menu-item-desc"><?php echo htmlspecialchars($item['desc']); ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Wine Cellar & Tasting Section -->
  <section class="section">
    <div class="container">
      <div class="split-grid">
        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:480px;">
          <img src="images/06.jpg" alt="Mare Monte Şarap Kavı" style="width:100%; height:100%; object-fit:cover;" />
        </div>
        <div>
          <div class="eyebrow" data-i18n="bistro.c3.title">Şarap & Kültür</div>
          <h2>Butik Şarap Kavı ve Tadım Etkinlikleri</h2>
          <p class="lead">
            Kaz Dağları’nın zengin mikroklimalarında yetişen yerel üzümlerden Ege’nin ödüllü bağlarına kadar geniş bir şarap koleksiyonu sunuyoruz.
          </p>
          <p data-i18n="bistro.c3.desc">
            Dönemsel olarak düzenlediğimiz sommelier eşliğinde şarap tadım akşamlarında, yöresel peynir tabakları ve özel Ege eşleşmeleriyle unutulmaz anlar yaşatıyoruz.
          </p>
          <div style="margin-top:28px;">
            <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-dark" data-i18n="contact.call_btn">Etkinlikler Hakkında Bilgi Alın</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
