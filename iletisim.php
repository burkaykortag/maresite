<?php
$pageTitle = 'İletişim & Rezervasyon | Konum & Ulaşım';
$pageDesc = 'Mare & Monte Hotel & Bistro ile iletişime geçin. Adres, telefon numaraları, Google Haritalar yol tarifi ve online rezervasyon talep formu.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- Page Banner -->
  <section class="hero-section" style="min-height: 50vh; padding-top: 50px; padding-bottom: 70px; background-image: linear-gradient(180deg, rgba(16, 23, 25, 0.55) 0%, rgba(16, 23, 25, 0.88) 100%), url('images/13.jpg');">
    <div class="container hero-content">
      <div class="eyebrow center" style="color:var(--color-gold-light);" data-i18n="contact.eyebrow">Bize Ulaşın</div>
      <h1 class="hero-title" style="font-size:clamp(2.4rem, 4.8vw, 4rem);" data-i18n="contact.title">İletişim & Rezervasyon</h1>
      <p class="hero-desc" data-i18n="contact.lead">
        Mare & Monte deneyimini yaşamak, özel konaklama talepleriniz veya bistro rezervasyonları için bizimle iletişime geçin.
      </p>
    </div>
  </section>

  <!-- Contact & Reservation Details -->
  <section class="section">
    <div class="container">
      <div class="contact-grid">
        <!-- Form Column -->
        <div style="background:#FFFFFF; border-radius:var(--radius-lg); padding:44px; box-shadow:var(--shadow-luxury); border:1px solid var(--border-light);">
          <div class="eyebrow" data-i18n="contact.eyebrow">Online Talep Formu</div>
          <h2 style="font-size:2rem; margin-bottom:12px;" data-i18n="modal.title">Rezervasyon ve Bilgi Formu</h2>
          <p style="color:var(--text-muted); font-size:0.95rem; margin-bottom:26px;">Formu doldurun; concierge ekibimiz en geç 15 dakika içinde size telefon veya WhatsApp üzerinden dönüş sağlasın.</p>

          <form id="contactPageForm" class="form-grid" method="POST" action="api/rezervasyon.php">
            <div class="form-group full">
              <label for="c-fullname" data-i18n="modal.name">Adınız Soyadınız *</label>
              <input type="text" id="c-fullname" name="fullname" class="form-control" placeholder="Adınız Soyadınız" required />
            </div>

            <div class="form-group">
              <label for="c-phone" data-i18n="modal.phone">Telefon Numaranız *</label>
              <input type="tel" id="c-phone" name="phone" class="form-control" placeholder="05XX XXX XX XX" required />
            </div>

            <div class="form-group">
              <label for="c-email" data-i18n="modal.email">E-posta Adresiniz</label>
              <input type="email" id="c-email" name="email" class="form-control" placeholder="ornek@mail.com" />
            </div>

            <div class="form-group">
              <label for="c-checkin" data-i18n="modal.checkin">Giriş Tarihi</label>
              <input type="date" id="c-checkin" name="checkin" class="form-control" />
            </div>

            <div class="form-group">
              <label for="c-checkout" data-i18n="modal.checkout">Çıkış Tarihi</label>
              <input type="date" id="c-checkout" name="checkout" class="form-control" />
            </div>

            <div class="form-group">
              <label for="c-guests" data-i18n="modal.guests">Misafir (+16)</label>
              <select id="c-guests" name="guests" class="form-control">
                <option value="1 Yetişkin">1 Yetişkin</option>
                <option value="2 Yetişkin" selected>2 Yetişkin</option>
                <option value="3 Yetişkin">3 Yetişkin</option>
              </select>
            </div>

            <div class="form-group">
              <label for="c-room" data-i18n="modal.room">Oda Tercihi</label>
              <select id="c-room" name="room" class="form-control">
                <option value="Tüm Odalar / En Uygun" data-i18n="book.all_rooms">Tüm Odalar / En Uygun Müsaitlik</option>
                <?php foreach ($rooms as $r): ?>
                  <option value="<?php echo htmlspecialchars($r['title']); ?>">
                    <?php echo htmlspecialchars($r['title']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group full">
              <label for="c-note" data-i18n="modal.note">Mesajınız veya Özel İstekleriniz</label>
              <textarea id="c-note" name="note" class="form-control" rows="3" placeholder="Talepleriniz, varış saatiniz veya sorularınız..."></textarea>
            </div>

            <div class="form-group full" style="margin-top:12px;">
              <button type="submit" class="btn btn-primary" style="width:100%;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13"></path><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                <span data-i18n="modal.submit">Talebi Gönder</span>
              </button>
            </div>
          </form>
        </div>

        <!-- Contact Info & Quick Reach -->
        <div style="display:flex; flex-direction:column; gap:28px;">
          <div class="contact-card">
            <div class="contact-row">
              <div class="contact-icon-box">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
              </div>
              <div class="contact-info-text">
                <strong data-i18n="contact.address_label">Açık Adres</strong>
                <p><?php echo ADDRESS; ?></p>
              </div>
            </div>

            <div class="contact-row">
              <div class="contact-icon-box">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
              </div>
              <div class="contact-info-text">
                <strong data-i18n="contact.phone_label">Telefon İletişim</strong>
                <p>
                  Mobil / Rezervasyon: <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>"><strong><?php echo PHONE_PRIMARY; ?></strong></a><br>
                  Sabit Hat: <a href="tel:<?php echo PHONE_SECONDARY_CLEAN; ?>"><?php echo PHONE_SECONDARY; ?></a>
                </p>
              </div>
            </div>

            <div class="contact-row">
              <div class="contact-icon-box">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              </div>
              <div class="contact-info-text">
                <strong>E-posta</strong>
                <p><a href="mailto:<?php echo EMAIL_CONTACT; ?>"><?php echo EMAIL_CONTACT; ?></a></p>
              </div>
            </div>

            <div style="display:flex; gap:14px; flex-wrap:wrap; margin-top:12px;">
              <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-primary" style="flex:1;" data-i18n="contact.call_btn">Hemen Ara</a>
              <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" rel="noopener" class="btn btn-whatsapp" style="flex:1;">WhatsApp</a>
            </div>
          </div>

          <!-- Transportation Details -->
          <div style="background:var(--color-sand-100); border-radius:var(--radius-md); padding:28px; border:1px solid var(--border-light);">
            <h4 style="font-size:1.2rem; margin-bottom:12px; color:var(--text-dark);">Ulaşım & Havalimanı</h4>
            <p style="font-size:0.92rem; color:var(--text-body); margin-bottom:10px;">
              <strong>Balıkesir Koca Seyit (Edremit) Havalimanı:</strong> Yaklaşık 35 km mesafededir (30 dk araç mesafesi). Özel transfer ayarlaması için concierge ekibimizle iletişime geçebilirsiniz.
            </p>
            <p style="font-size:0.92rem; color:var(--text-body); margin:0;">
              <strong>Çanakkale - İzmir Karayolu:</strong> Altınoluk İskele merkezinde, denize sıfır, kolay ve konforlu erişim.
            </p>
          </div>
        </div>
      </div>

      <!-- Google Maps Embed -->
      <div class="map-container" style="margin-top:55px;">
        <iframe title="Mare & Monte Hotel & Bistro Google Maps" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="<?php echo GOOGLE_MAPS_EMBED; ?>"></iframe>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
