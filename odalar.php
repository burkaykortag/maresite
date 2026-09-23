<?php
$pageTitle = 'Odalarımız & Konaklama | 22 Yenilenmiş Butik Oda';
$pageDesc = 'Mare & Monte Hotel’in Midilli manzaralı balkonlu, dağ manzaralı standart, iki ayrı yataklı ve tek kişilik yenilenmiş odalarını inceleyin. +16 yetişkin konsepti.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/08.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="rooms.eyebrow">Konaklama & Süitler</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);" data-i18n="rooms.title">Yenilenmiş 22 Butik Oda</h1>
      <p class="hero-desc" data-i18n="rooms.lead">
        Midilli Adası’nın büyüleyici maviliğinden Kaz Dağları’nın bol oksijenli yeşiline uzanan 4 farklı konaklama kategorisi.
      </p>
    </div>
  </section>

  <!-- Quick Booking Search Bar -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- Rooms Detailed List -->
  <section class="section">
    <div class="container">
      <div style="display:flex; flex-direction:column; gap:60px;">
        <?php foreach ($rooms as $index => $room): ?>
          <div class="room-detail-card" id="<?php echo $room['id']; ?>" style="background:#FFFFFF; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-luxury); border:1px solid var(--border-light);">
            <div class="split-grid" style="align-items:stretch;">
              <!-- Image Column -->
              <div style="position:relative; min-height:400px;">
                <img src="<?php echo $room['image']; ?>" alt="<?php echo htmlspecialchars($room['title']); ?>" style="width:100%; height:100%; object-fit:cover;" />
                <span class="room-tag <?php echo ($room['id'] === 'deniz-manzarali-balkonlu') ? 'highlight' : ''; ?>" style="top:22px; left:22px;">
                  <?php echo $room['highlight']; ?>
                </span>
              </div>

              <!-- Content Column -->
              <div style="padding:clamp(28px, 4.5vw, 48px); display:flex; flex-direction:column; justify-content:center;">
                <div class="eyebrow"><?php echo $room['subtitle']; ?></div>
                <h2 style="font-size:clamp(1.9rem, 3vw, 2.4rem); margin-bottom:14px;"><?php echo htmlspecialchars($room['title']); ?></h2>
                <p class="lead" style="margin-bottom:20px; font-size:1.05rem;"><?php echo htmlspecialchars($room['description']); ?></p>

                <!-- Key Specs Grid -->
                <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:14px; margin-bottom:26px; padding:18px; background:var(--color-sand-50); border-radius:var(--radius-md); border:1px solid var(--border-light);">
                  <div style="display:flex; align-items:center; gap:10px; font-size:0.92rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    <span><strong>Kapasite:</strong> <?php echo $room['capacity']; ?></span>
                  </div>
                  <div style="display:flex; align-items:center; gap:10px; font-size:0.92rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
                    <span><strong>Boyut:</strong> <?php echo $room['size']; ?></span>
                  </div>
                  <div style="display:flex; align-items:center; gap:10px; font-size:0.92rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg>
                    <span><strong>Yatak:</strong> <?php echo $room['bed']; ?></span>
                  </div>
                  <div style="display:flex; align-items:center; gap:10px; font-size:0.92rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    <span><strong>Manzara:</strong> <?php echo $room['view']; ?></span>
                  </div>
                </div>

                <!-- Amenities Checklist -->
                <div style="margin-bottom:30px;">
                  <strong style="display:block; font-size:0.85rem; text-transform:uppercase; letter-spacing:0.12em; color:var(--text-dark); margin-bottom:12px;">Oda Donanımları & Olanaklar</strong>
                  <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:10px;">
                    <?php foreach ($room['features'] as $feat): ?>
                      <div style="display:flex; align-items:center; gap:8px; font-size:0.88rem; color:var(--text-body);">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span><?php echo htmlspecialchars($feat); ?></span>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <!-- Action Buttons -->
                <div style="display:flex; gap:14px; flex-wrap:wrap;">
                  <a href="#" data-modal-target="bookingModal" data-room-name="<?php echo htmlspecialchars($room['title']); ?>" class="btn btn-primary" data-i18n="rooms.action.book">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Bu Odayı Rezerve Et
                  </a>
                  <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>?text=<?php echo urlencode('Merhaba, ' . $room['title'] . ' için müsaitlik ve fiyat bilgisi alabilir miyim?'); ?>" target="_blank" rel="noopener" class="btn btn-whatsapp">
                    WhatsApp ile Sor
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Hotel Amenities Grid -->
  <section class="section section-dark">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center">Tüm Odalarda Standart</div>
        <h2>Konforunuz İçin Gereken Her Şey</h2>
        <p class="lead">Misafirlerimizin huzuru, hijyeni ve rahatı için tüm odalarımızda eksiksiz sunulan hizmetler.</p>
      </div>

      <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:16px;">
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Sessiz Split Klima</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Düz Ekran HD TV</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Minibar & İkramlar</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Özel Banyo & Sıcak Su</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Saç Kurutma Makinesi</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Havlu & Buklet Seti</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Ücretsiz Yüksek Hızlı Wi-Fi</div>
        <div class="beach-feature-box"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Günlük Oda Temizliği</div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
