<?php
$pageTitle = 'Fotoğraf Galerisi | Mare & Monte Hotel & Bistro';
$pageDesc = 'Mare & Monte Hotel’in odaları, bistro bahçesi, özel plajı, kış salonu ve Ege manzaralarından yüksek çözünürlüklü fotoğraflar.';
require_once __DIR__ . '/includes/header.php';

$default_gallery_items = [
    ['img' => 'images/01.jpg', 'cat' => 'plaj', 'catName' => 'Özel Plaj & Manzara', 'title' => 'Denize Sıfır Konum & Midilli Silueti'],
    ['img' => 'images/02.jpg', 'cat' => 'bistro', 'catName' => 'Otel & Bahçe', 'title' => 'Tarihi Dış Cephe & Çınar Bahçesi'],
    ['img' => 'images/03.jpg', 'cat' => 'bistro', 'catName' => 'Bistro & Çınar Bar', 'title' => '450 m² Asırlık Çınar Altında Bistro'],
    ['img' => 'images/04.jpg', 'cat' => 'gastronomi', 'catName' => 'Gastronomi', 'title' => 'Taze Günlük Körfez Deniz Ürünleri'],
    ['img' => 'images/05.jpg', 'cat' => 'gastronomi', 'catName' => 'Gastronomi', 'title' => 'Ege Zeytinyağlıları ve Şef Tabakları'],
    ['img' => 'images/06.jpg', 'cat' => 'bistro', 'catName' => 'Şarap Kavı', 'title' => 'Butik Şarap Seçkisi ve Tadım Alanı'],
    ['img' => 'images/07.jpg', 'cat' => 'plaj', 'catName' => 'Özel Plaj', 'title' => '60 Şezlongluk Konforlu Plaj Alanı'],
    ['img' => 'images/08.jpg', 'cat' => 'odalar', 'catName' => 'Odalarımız', 'title' => 'Deniz Manzaralı Balkonlu Oda'],
    ['img' => 'images/09.jpg', 'cat' => 'odalar', 'catName' => 'Odalarımız', 'title' => 'Kaz Dağları Manzaralı Standart Oda'],
    ['img' => 'images/10.jpg', 'cat' => 'odalar', 'catName' => 'Odalarımız', 'title' => 'Tek Kişilik Konfor Oda'],
    ['img' => 'images/11.jpg', 'cat' => 'odalar', 'catName' => 'Odalarımız', 'title' => 'İki Ayrı Yataklı Konforlu Oda'],
    ['img' => 'images/12.jpg', 'cat' => 'kis', 'catName' => 'Kış Salonu', 'title' => '8 Masalık Butik Şömineli Salon'],
    ['img' => 'images/13.jpg', 'cat' => 'plaj', 'catName' => 'Ege Manzaraları', 'title' => 'Altınoluk Sahil ve Gün Batımı']
];

$custom_media = get_site_media();
$gallery_items = [];

// Add custom uploaded items first
if (!empty($custom_media)) {
    foreach ($custom_media as $cm) {
        $gallery_items[] = [
            'img'     => htmlspecialchars($cm['filepath']),
            'cat'     => htmlspecialchars($cm['category'] ?? 'galeri'),
            'catName' => strtoupper(htmlspecialchars($cm['category'] ?? 'Özel Çekim')),
            'title'   => htmlspecialchars($cm['title'] ?? 'Mare & Monte')
        ];
    }
}

// Merge defaults
$gallery_items = array_merge($gallery_items, $default_gallery_items);
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/01.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="nav.gallery">Fotoğraf Galerisi</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);">Mare & Monte’da Bir Gün</h1>
      <p class="hero-desc">
        Otelimizin huzurlu odalarını, çınar bahçesini, özel plajımızı ve enfes gastronomi tabaklarımızı keşfedin.
      </p>
    </div>
  </section>

  <!-- Quick Booking Search Bar -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- Gallery Section -->
  <section class="section">
    <div class="container">
      <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">Tüm Fotoğraflar</button>
        <button class="filter-btn" data-filter="odalar" data-i18n="nav.rooms">Odalarımız</button>
        <button class="filter-btn" data-filter="bistro" data-i18n="nav.bistro">Bistro & Çınar Bar</button>
        <button class="filter-btn" data-filter="gastronomi">Gastronomi</button>
        <button class="filter-btn" data-filter="plaj" data-i18n="nav.beach">Özel Plaj & Manzara</button>
        <button class="filter-btn" data-filter="kis">Şömineli Kış Salonu</button>
      </div>

      <div class="gallery-grid">
        <?php foreach ($gallery_items as $item): ?>
          <div class="gallery-item" data-category="<?php echo $item['cat']; ?>">
            <img src="<?php echo $item['img']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" loading="lazy" />
            <div class="gallery-overlay">
              <div class="gallery-category"><?php echo htmlspecialchars($item['catName']); ?></div>
              <div class="gallery-caption"><?php echo htmlspecialchars($item['title']); ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
