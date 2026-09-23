<?php
require_once __DIR__ . '/config.php';
?>
<div class="container booking-bar-wrapper">
  <form class="booking-bar booking-form-bar" action="#" method="GET">
    <!-- Check-in -->
    <div class="booking-item">
      <label for="bar-checkin">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span data-i18n="book.checkin">Giriş Tarihi</span>
      </label>
      <input type="date" id="bar-checkin" name="checkin" class="booking-input" required />
    </div>

    <!-- Check-out -->
    <div class="booking-item">
      <label for="bar-checkout">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span data-i18n="book.checkout">Çıkış Tarihi</span>
      </label>
      <input type="date" id="bar-checkout" name="checkout" class="booking-input" required />
    </div>

    <!-- Guests -->
    <div class="booking-item">
      <label for="bar-guests">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        <span data-i18n="book.guests">Misafir (+16)</span>
      </label>
      <select id="bar-guests" name="guests" class="booking-select">
        <option value="1 Yetişkin">1 Yetişkin (+16)</option>
        <option value="2 Yetişkin" selected>2 Yetişkin (+16)</option>
        <option value="3 Yetişkin">3 Yetişkin (Ek Yatak)</option>
        <option value="Grup / Özel Talep">Grup / Özel Talep</option>
      </select>
    </div>

    <!-- Room Selection -->
    <div class="booking-item">
      <label for="bar-room">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg>
        <span data-i18n="book.room_type">Oda Tipi</span>
      </label>
      <select id="bar-room" name="room" class="booking-select">
        <option value="Tüm Odalar / En Uygun" data-i18n="book.all_rooms">Tüm Odalar / En Uygun Müsaitlik</option>
        <?php foreach ($rooms as $r): ?>
          <option value="<?php echo htmlspecialchars($r['title']); ?>">
            <?php echo htmlspecialchars($r['title']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Submit CTA -->
    <button type="submit" class="btn btn-primary btn-lg">
      <span data-i18n="book.btn">Müsaitlik & Rezervasyon</span>
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
    </button>
  </form>
</div>
