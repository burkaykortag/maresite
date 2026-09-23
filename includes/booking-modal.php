<?php
require_once __DIR__ . '/config.php';
?>
<div id="bookingModal" class="modal-overlay">
  <div class="modal-window">
    <button class="modal-close-btn" aria-label="Kapat">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </button>

    <div class="modal-header">
      <div class="eyebrow" data-i18n="top.adult">+16 Yetişkin Konsepti</div>
      <h3 class="modal-title" data-i18n="modal.title">Rezervasyon & Bilgi Talebi</h3>
      <p style="color:var(--text-muted); font-size:0.92rem;" data-i18n="contact.lead">
        Mare & Monte Hotel & Bistro’da yerinizi ayırtmak için formu doldurun, sizi hemen arayalım veya WhatsApp’tan onaylayalım.
      </p>
    </div>

    <form id="bookingModalForm" class="form-grid" method="POST" action="api/rezervasyon.php">
      <!-- Full Name -->
      <div class="form-group full">
        <label for="modal-fullname" data-i18n="modal.name">Adınız Soyadınız *</label>
        <input type="text" id="modal-fullname" name="fullname" class="form-control" placeholder="Örn: Ahmet Yılmaz" required />
      </div>

      <!-- Phone -->
      <div class="form-group">
        <label for="modal-phone" data-i18n="modal.phone">Telefon Numaranız *</label>
        <input type="tel" id="modal-phone" name="phone" class="form-control" placeholder="05XX XXX XX XX" required />
      </div>

      <!-- Email -->
      <div class="form-group">
        <label for="modal-email" data-i18n="modal.email">E-posta Adresiniz (Opsiyonel)</label>
        <input type="email" id="modal-email" name="email" class="form-control" placeholder="ornek@email.com" />
      </div>

      <!-- Checkin -->
      <div class="form-group">
        <label for="modal-checkin" data-i18n="modal.checkin">Giriş Tarihi *</label>
        <input type="date" id="modal-checkin" name="checkin" class="form-control" required />
      </div>

      <!-- Checkout -->
      <div class="form-group">
        <label for="modal-checkout" data-i18n="modal.checkout">Çıkış Tarihi *</label>
        <input type="date" id="modal-checkout" name="checkout" class="form-control" required />
      </div>

      <!-- Guests -->
      <div class="form-group">
        <label for="modal-guests" data-i18n="modal.guests">Kişi Sayısı</label>
        <select id="modal-guests" name="guests" class="form-control">
          <option value="1 Yetişkin">1 Yetişkin (+16)</option>
          <option value="2 Yetişkin" selected>2 Yetişkin (+16)</option>
          <option value="3 Yetişkin">3 Yetişkin (+16 - Ek Yatak)</option>
          <option value="Özel Grup">Özel Grup</option>
        </select>
      </div>

      <!-- Room Selection -->
      <div class="form-group">
        <label for="modal-room" data-i18n="modal.room">Oda Tipi</label>
        <select id="modal-room" name="room" class="form-control">
          <option value="Tüm Odalar / En Uygun" data-i18n="book.all_rooms">Tüm Odalar / En Uygun Müsaitlik</option>
          <?php foreach ($rooms as $r): ?>
            <option value="<?php echo htmlspecialchars($r['title']); ?>">
              <?php echo htmlspecialchars($r['title']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Note -->
      <div class="form-group full">
        <label for="modal-note" data-i18n="modal.note">Özel İstek veya Notunuz</label>
        <textarea id="modal-note" name="note" class="form-control" rows="3" placeholder="Örn: Erken giriş talebi, çift kişilik yatak tercihi vb."></textarea>
      </div>

      <!-- Submit Buttons -->
      <div class="form-group full" style="display:flex; gap:12px; margin-top:10px;">
        <button type="submit" class="btn btn-primary" style="flex:1;">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13"></path><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          <span data-i18n="modal.submit">Rezervasyon Talebini Gönder</span>
        </button>
        <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-dark" style="padding-inline:20px;" title="Doğrudan Ara">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span data-i18n="contact.call_btn">Hemen Ara</span>
        </a>
      </div>
    </form>
  </div>
</div>
