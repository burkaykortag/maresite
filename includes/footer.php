<?php
require_once __DIR__ . '/config.php';
?>
  <!-- Floating Action Buttons -->
  <div class="floating-actions">
    <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>?text=<?php echo urlencode('Merhaba, Mare & Monte Hotel & Bistro hakkında bilgi ve rezervasyon almak istiyorum.'); ?>" target="_blank" rel="noopener" class="floating-btn whatsapp" aria-label="WhatsApp ile İletişime Geç">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
    </a>
    <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="floating-btn call" aria-label="Telefon ile Hemen Ara">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
    </a>
  </div>

  <!-- Reservation Inquiry Modal -->
  <?php require_once __DIR__ . '/booking-modal.php'; ?>

  <!-- Fullscreen Lightbox Modal Container -->
  <div id="lightboxModal" class="lightbox-modal">
    <div class="lightbox-content">
      <button class="lightbox-close" aria-label="Kapat">&times;</button>
      <img src="" alt="Mare Monte Galeri" class="lightbox-img" />
      <p class="lightbox-caption"></p>
    </div>
  </div>

  <!-- Site Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <!-- Col 1: Brand & Bio -->
        <div class="footer-col">
          <div class="brand-logo" style="margin-bottom: 20px;">
            <span class="brand-logo-text">MARE <span>&</span> MONTE</span>
            <span class="brand-logo-sub">HOTEL & BISTRO · ALTINOLUK</span>
          </div>
          <p style="font-size:0.92rem; color:var(--text-light-muted); line-height:1.75; margin-bottom: 22px;">
            Kaz Dağları’nın bol oksijenli eteklerinde, Ege Denizi’ne sıfır konumda, yenilenen 22 odası, 450 m² asırlık çınar bistro bahçesi, özel plajı ve şömineli kış salonuyla 12 ay açık butik yaşam alanı.
          </p>
          <div style="display:flex; gap:10px; align-items:center;">
            <span class="top-bar-badge" data-i18n="top.adult">+16 Yetişkin Oteli</span>
            <span class="top-bar-badge" data-i18n="top.open">12 Ay Açık</span>
          </div>
        </div>

        <!-- Col 2: Quick Links -->
        <div class="footer-col">
          <h4>Hızlı Menü</h4>
          <div class="footer-links">
            <a href="index.php" data-i18n="nav.home">Ana Sayfa</a>
            <a href="odalar.php" data-i18n="nav.rooms">Odalarımız & Süitler</a>
            <a href="bistro.php" data-i18n="nav.bistro">Bistro, Gastronomi & Bar</a>
            <a href="plaj.php" data-i18n="nav.beach">Özel Plaj Deneyimi</a>
            <a href="kesfet.php" data-i18n="nav.discover">Kaz Dağları & Ege Rotaları</a>
            <a href="galeri.php" data-i18n="nav.gallery">Fotoğraf Galerisi</a>
            <a href="iletisim.php" data-i18n="nav.contact">İletişim & Rezervasyon</a>
          </div>
        </div>

        <!-- Col 3: Room Categories -->
        <div class="footer-col">
          <h4>Konaklama</h4>
          <div class="footer-links">
            <a href="odalar.php#deniz-manzarali-balkonlu" data-i18n="rooms.r1.title">Deniz Manzaralı Balkonlu</a>
            <a href="odalar.php#dag-manzarali-standart" data-i18n="rooms.r2.title">Dağ Manzaralı Standart</a>
            <a href="odalar.php#iki-ayri-yatakli-oda" data-i18n="rooms.r4.title">İki Ayrı Yataklı Oda</a>
            <a href="odalar.php#tek-kisilik-oda" data-i18n="rooms.r3.title">Tek Kişilik Konfor Oda</a>
            <a href="#" data-modal-target="bookingModal" data-i18n="book.btn">Müsaitlik Sorgula</a>
            <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" data-i18n="contact.call_btn">Doğrudan Rezervasyon</a>
          </div>
        </div>

        <!-- Col 4: Contact & Directions -->
        <div class="footer-col">
          <h4>İletişim & Konum</h4>
          <div class="footer-links" style="gap:14px;">
            <p style="font-size:0.9rem; color:var(--text-light-muted); margin:0;">
              <strong style="color:var(--color-gold); display:block; margin-bottom:3px;" data-i18n="contact.address_label">Adres:</strong>
              <?php echo ADDRESS; ?>
            </p>
            <p style="font-size:0.9rem; color:var(--text-light-muted); margin:0;">
              <strong style="color:var(--color-gold); display:block; margin-bottom:3px;" data-i18n="contact.phone_label">Telefonlar:</strong>
              <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>"><?php echo PHONE_PRIMARY; ?></a><br>
              <a href="tel:<?php echo PHONE_SECONDARY_CLEAN; ?>"><?php echo PHONE_SECONDARY; ?></a>
            </p>
            <p style="font-size:0.85rem; color:rgba(255,255,255,0.6); margin:0;" data-i18n="contact.info_val">
              +16 Adult konsept · Evcil hayvan kabul edilmez · Free Wi-Fi · 12 ay açık
            </p>
          </div>
        </div>
      </div>

      <!-- SEO Search Terms Cloud -->
      <div class="footer-seo-tags">
        <strong style="color:var(--color-gold); margin-right:8px;">Popüler Aramalar:</strong>
        Altınoluk butik otel, Altınoluk denize sıfır otel, Kaz Dağları konaklama, Edremit Körfezi otelleri, Altınoluk beach & bistro, Altınoluk yetişkin oteli, Balıkesir butik otel, Midilli manzaralı otel, Akçay otelleri, Güre otel, Assos yakın otel, Altınoluk şömineli kış oteli, Ege balık restoranı, Altınoluk özel plaj.
      </div>

      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div>
          &copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. Tüm hakları saklıdır.
        </div>
        <div>
          Design & Architecture: Quiet Luxury Aegean Edition
        </div>
      </div>
    </div>
  </footer>

  <!-- Translation & Interactive Scripts -->
  <script src="assets/js/i18n.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
