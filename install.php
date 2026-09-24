<?php
/**
 * Mare & Monte Hotel & Bistro
 * Güvenlik Nedeniyle Kurulum Sayfası Devre Dışı Bırakılmıştır
 * Altınoluk / Edremit / Kaz Dağları
 */

header('HTTP/1.1 403 Forbidden');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Erişim Kapatıldı | Mare & Monte Hotel & Bistro</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    body {
      background: radial-gradient(circle at top center, #2C2621 0%, #151311 100%);
      color: var(--text-light);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px 16px;
      font-family: var(--font-sans);
    }
    .lock-card {
      background: #24201D;
      border: 1px solid rgba(200, 155, 88, 0.35);
      border-radius: var(--radius-lg);
      padding: 44px 32px;
      text-align: center;
      max-width: 520px;
      width: 100%;
      box-shadow: 0 25px 65px rgba(0, 0, 0, 0.65);
    }
    .lock-icon {
      width: 64px;
      height: 64px;
      background: rgba(184, 115, 72, 0.16);
      color: var(--color-terracotta);
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0 16px;
      font-size: 1.8rem;
    }
  </style>
</head>
<body>

  <div class="lock-card">
    <div class="brand-logo-text" style="font-size:1.8rem; color:#FFFFFF;">
      MARE <span style="color:var(--color-gold); font-style:italic;">&</span> MONTE
    </div>
    <div style="font-size:0.65rem; letter-spacing:0.25em; text-transform:uppercase; color:var(--color-gold); margin-top:4px;">
      HOTEL & BISTRO · ALTINOLUK
    </div>

    <div class="lock-icon">🔒</div>

    <h2 style="font-family:var(--font-serif); font-size:1.9rem; color:#FFFFFF; margin-bottom:12px;">
      Kurulum Sayfası Kapatılmıştır
    </h2>

    <p style="color:var(--text-light-muted); font-size:0.95rem; line-height:1.75; margin-bottom:30px;">
      Mare & Monte web uygulaması ve veritabanı kurulumu tamamlanmıştır. Güvenlik önlemleri gereği kurulum sayfası canlı ortamda erişime kapatılmıştır.
    </p>

    <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
      <a href="index.php" class="btn btn-primary">Ana Sayfaya Git</a>
      <a href="admin/index.php" class="btn btn-secondary">Yönetici Paneli</a>
    </div>
  </div>

</body>
</html>
