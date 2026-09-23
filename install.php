<?php
/**
 * Mare & Monte Hotel & Bistro — 1-Click Luxury Web Installer
 * Production Database: maresite
 * Altinoluk / Edremit / Kaz Daglari
 */

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$lockFile = __DIR__ . '/installed.lock';
$isInstalled = file_exists($lockFile);

$defaultHost = 'localhost';
$defaultDb   = 'maresite';
$defaultUser = 'maresite';
$defaultPass = 'Maresite1122334455..';

$step = isset($_GET['step']) ? $_GET['step'] : ($isInstalled ? 'locked' : 'form');
$error = '';
$successLogs = [];

// System requirements checks
$reqs = [
    'php' => [
        'name' => 'PHP Sürümü (>= 7.4)',
        'pass' => version_compare(PHP_VERSION, '7.4.0', '>='),
        'val'  => PHP_VERSION
    ],
    'pdo' => [
        'name' => 'PDO & MySQL Sürücüsü',
        'pass' => extension_loaded('pdo') && extension_loaded('pdo_mysql'),
        'val'  => extension_loaded('pdo_mysql') ? 'Aktif' : 'Eksik'
    ],
    'writable' => [
        'name' => 'Yazma İzinleri (includes/ dizini)',
        'pass' => is_writable(__DIR__ . '/includes'),
        'val'  => is_writable(__DIR__ . '/includes') ? 'Yazılabilir' : 'Korumalı'
    ]
];

$allReqsPassed = $reqs['php']['pass'] && $reqs['pdo']['pass'];

// Process installation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'install') {
    if ($isInstalled && !isset($_POST['force_reinstall'])) {
        $error = 'Sistem zaten kurulmuş. Yeniden kurmak için lütfen installed.lock dosyasını siliniz.';
    } else {
        $dbHost = trim($_POST['db_host'] ?? 'localhost');
        $dbName = trim($_POST['db_name'] ?? 'maresite');
        $dbUser = trim($_POST['db_user'] ?? 'maresite');
        $dbPass = trim($_POST['db_pass'] ?? '');
        $adminUser = trim($_POST['admin_user'] ?? 'admin');
        $adminPass = trim($_POST['admin_pass'] ?? 'Maremonte2026!');
        $adminEmail = trim($_POST['admin_email'] ?? 'info@yenimaremonte.com');

        if (empty($dbHost) || empty($dbName) || empty($dbUser)) {
            $error = 'Lütfen tüm veritabanı bağlantı alanlarını doldurunuz.';
        } elseif (empty($adminUser) || empty($adminPass)) {
            $error = 'Lütfen yönetici kullanıcı adı ve şifresini belirleyiniz.';
        } else {
            try {
                // Step 1: Connect to MySQL Server
                $pdoServer = new PDO(
                    'mysql:host=' . $dbHost . ';charset=utf8mb4',
                    $dbUser,
                    $dbPass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                    ]
                );
                $successLogs[] = 'MySQL sunucusuna başarıyla bağlanıldı (' . $dbHost . ').';

                // Step 2: Create Database if not exists
                $pdoServer->exec('CREATE DATABASE IF NOT EXISTS `' . $dbName . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
                $successLogs[] = '`' . $dbName . '` veritabanı doğrulandı/oluşturuldu.';

                // Step 3: Connect to specific Database
                $pdo = new PDO(
                    'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8mb4',
                    $dbUser,
                    $dbPass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
                    ]
                );

                // Step 4: Create Tables
                // Table 1: rezervasyonlar
                $pdo->exec('CREATE TABLE IF NOT EXISTS `rezervasyonlar` (
                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                  `ref_no` VARCHAR(32) NOT NULL,
                  `fullname` VARCHAR(150) NOT NULL,
                  `phone` VARCHAR(50) NOT NULL,
                  `email` VARCHAR(150) DEFAULT NULL,
                  `checkin` DATE NOT NULL,
                  `checkout` DATE NOT NULL,
                  `guests` VARCHAR(50) NOT NULL DEFAULT "2 Yetişkin",
                  `room_type` VARCHAR(150) NOT NULL DEFAULT "Deniz Manzaralı Balkonlu Oda",
                  `note` TEXT DEFAULT NULL,
                  `status` ENUM("yeni", "onaylandi", "iptal", "tamamlandi") NOT NULL DEFAULT "yeni",
                  `ip_address` VARCHAR(45) DEFAULT NULL,
                  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `idx_ref_no` (`ref_no`),
                  KEY `idx_checkin` (`checkin`),
                  KEY `idx_status` (`status`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
                $successLogs[] = '`rezervasyonlar` tablosu oluşturuldu.';

                // Table 2: iletisim_mesajlari
                $pdo->exec('CREATE TABLE IF NOT EXISTS `iletisim_mesajlari` (
                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                  `fullname` VARCHAR(150) NOT NULL,
                  `phone` VARCHAR(50) DEFAULT NULL,
                  `email` VARCHAR(150) NOT NULL,
                  `subject` VARCHAR(255) DEFAULT NULL,
                  `message` TEXT NOT NULL,
                  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
                  `ip_address` VARCHAR(45) DEFAULT NULL,
                  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
                $successLogs[] = '`iletisim_mesajlari` tablosu oluşturuldu.';

                // Table 3: admin_kullanicilar
                $pdo->exec('CREATE TABLE IF NOT EXISTS `admin_kullanicilar` (
                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                  `kullanici_adi` VARCHAR(50) NOT NULL,
                  `sifre_hash` VARCHAR(255) NOT NULL,
                  `eposta` VARCHAR(150) NOT NULL,
                  `ad_soyad` VARCHAR(150) NOT NULL,
                  `rol` VARCHAR(30) NOT NULL DEFAULT "admin",
                  `son_giris` DATETIME DEFAULT NULL,
                  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `idx_kullanici_adi` (`kullanici_adi`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
                $successLogs[] = '`admin_kullanicilar` tablosu oluşturuldu.';

                // Table 4: site_ayarlari
                $pdo->exec('CREATE TABLE IF NOT EXISTS `site_ayarlari` (
                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                  `ayar_anahtar` VARCHAR(100) NOT NULL,
                  `ayar_deger` TEXT DEFAULT NULL,
                  `ayar_aciklama` VARCHAR(255) DEFAULT NULL,
                  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `idx_ayar_anahtar` (`ayar_anahtar`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
                $successLogs[] = '`site_ayarlari` tablosu oluşturuldu.';

                // Step 5: Insert / Update Admin User
                $hash = password_hash($adminPass, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('INSERT INTO `admin_kullanicilar` (`kullanici_adi`, `sifre_hash`, `eposta`, `ad_soyad`, `rol`) 
                                       VALUES (:user, :hash, :email, "Mare & Monte Yönetim", "superadmin")
                                       ON DUPLICATE KEY UPDATE `sifre_hash` = :hash, `eposta` = :email');
                $stmt->execute([':user' => $adminUser, ':hash' => $hash, ':email' => $adminEmail]);
                $successLogs[] = 'Yönetici hesabı tanımlandı (' . $adminUser . ').';

                // Step 6: Insert Site Settings
                $settings = [
                    ['site_title', 'Mare & Monte Hotel & Bistro', 'Site Başlığı'],
                    ['site_tagline', 'Altınoluk · Kaz Dağları · Denize Sıfır · +16 Adult Only', 'Slogan'],
                    ['phone_primary', '0542 414 38 94', 'Birincil Telefon / WhatsApp'],
                    ['phone_secondary', '0266 396 17 30', 'Sabit Telefon'],
                    ['email_contact', 'info@yenimaremonte.com', 'E-posta Adresi'],
                    ['address', 'İskele Mahallesi Cevdet Sunay Caddesi No:15, Altınoluk / Edremit / Balıkesir', 'Adres'],
                    ['whatsapp_number', '905424143894', 'WhatsApp Numarası'],
                    ['concept_adult', '+16 Yetişkin Oteli (Adult Only)', 'Konsept'],
                    ['total_rooms', '22', 'Yenilenmiş Toplam Oda Sayısı']
                ];
                $setStmt = $pdo->prepare('INSERT INTO `site_ayarlari` (`ayar_anahtar`, `ayar_deger`, `ayar_aciklama`) 
                                         VALUES (?, ?, ?) 
                                         ON DUPLICATE KEY UPDATE `ayar_deger` = VALUES(`ayar_deger`)');
                foreach ($settings as $s) {
                    $setStmt->execute($s);
                }
                $successLogs[] = 'Site temel ayarları kaydedildi.';

                // Step 7: Update includes/db.php
                $dbConfigFile = __DIR__ . '/includes/db.php';
                $dbConfigCode = "<" . "?php
"
                    . "/**
"
                    . " * Mare & Monte Hotel & Bistro — Live Database Configuration
"
                    . " * Generated on: " . date('Y-m-d H:i:s') . "
"
                    . " */

"
                    . "define('DB_HOST', '" . addslashes($dbHost) . "');
"
                    . "define('DB_NAME', '" . addslashes($dbName) . "');
"
                    . "define('DB_USER', '" . addslashes($dbUser) . "');
"
                    . "define('DB_PASS', '" . addslashes($dbPass) . "');
"
                    . "define('DB_CHARSET', 'utf8mb4');

"
                    . "function getDB() {
"
                    . "    static \$pdo = null;
"
                    . "    if (\$pdo !== null) return \$pdo;
"
                    . "    \$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
"
                    . "    \$options = [
"
                    . "        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
"
                    . "        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
"
                    . "        PDO::ATTR_EMULATE_PREPARES   => false,
"
                    . "        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
"
                    . "    ];
"
                    . "    try {
"
                    . "        \$pdo = new PDO(\$dsn, DB_USER, DB_PASS, \$options);
"
                    . "        return \$pdo;
"
                    . "    } catch (PDOException \$e) {
"
                    . "        error_log('DB Connection Error: ' . \$e->getMessage());
"
                    . "        return null;
"
                    . "    }
"
                    . "}
";

                file_put_contents($dbConfigFile, $dbConfigCode);
                $successLogs[] = '`includes/db.php` dosyası yapılandırıldı.';

                // Step 8: Write Lock File
                file_put_contents($lockFile, "INSTALLED=" . date('c') . "
DB_NAME=" . $dbName . "
");
                $successLogs[] = 'Kurulum kilidi (`installed.lock`) oluşturuldu.';

                $step = 'success';
            } catch (PDOException $e) {
                $error = 'Veritabanı Hatası: ' . $e->getMessage();
            } catch (Exception $e) {
                $error = 'Genel Hata: ' . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Veritabanı Kurulum Sihirbazı | Mare & Monte Hotel & Bistro</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    body {
      background: radial-gradient(circle at top center, #2C2621 0%, #151311 100%);
      color: var(--text-light);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px 16px;
    }
    .install-card {
      background-color: var(--color-warm-card);
      color: var(--text-dark);
      border-radius: var(--radius-lg);
      box-shadow: 0 25px 70px rgba(0,0,0,0.6);
      width: min(720px, 100%);
      overflow: hidden;
      border: 1px solid var(--border-warm);
    }
    .install-header {
      background-color: #1E1B18;
      color: var(--text-light);
      padding: 36px 32px;
      text-align: center;
      border-bottom: 2px solid var(--color-terracotta);
    }
    .install-header h1 {
      font-size: 2.1rem;
      color: #FFFFFF;
      margin-bottom: 6px;
    }
    .install-header p {
      color: var(--color-gold-light);
      font-size: 0.88rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
    }
    .install-body {
      padding: 36px 32px;
    }
    .req-list {
      background: var(--color-warm-surface);
      border-radius: var(--radius-sm);
      padding: 16px 20px;
      margin-bottom: 28px;
      border: 1px solid var(--border-light);
    }
    .req-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px dashed var(--border-light);
      font-size: 0.88rem;
    }
    .req-item:last-child { border-bottom: none; }
    .badge-pass {
      background-color: #E6F4EA;
      color: #137333;
      padding: 3px 10px;
      border-radius: var(--radius-full);
      font-weight: 700;
      font-size: 0.74rem;
    }
    .badge-fail {
      background-color: #FCE8E6;
      color: #C5221F;
      padding: 3px 10px;
      border-radius: var(--radius-full);
      font-weight: 700;
      font-size: 0.74rem;
    }
    .form-section-title {
      font-family: var(--font-serif);
      font-size: 1.35rem;
      color: var(--text-dark);
      margin: 24px 0 14px;
      padding-bottom: 8px;
      border-bottom: 1px solid var(--border-light);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 14px;
    }
    .form-group.full {
      grid-column: 1 / -1;
    }
    .form-group label {
      display: block;
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--color-terracotta);
      margin-bottom: 6px;
    }
    .form-input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid var(--border-light);
      border-radius: var(--radius-xs);
      background-color: var(--color-warm-surface);
      font-size: 15px;
      color: var(--text-dark);
      font-weight: 500;
    }
    .form-input:focus {
      border-color: var(--color-terracotta);
      background: #FFFFFF;
    }
    .alert-box {
      padding: 14px 18px;
      border-radius: var(--radius-sm);
      margin-bottom: 20px;
      font-size: 0.9rem;
    }
    .alert-error {
      background-color: #FCE8E6;
      border: 1px solid #F5C6CB;
      color: #721C24;
    }
    .alert-success {
      background-color: #E6F4EA;
      border: 1px solid #C3E6CB;
      color: #155724;
    }
    .log-list {
      background: #181513;
      color: #A3E635;
      font-family: monospace;
      padding: 16px;
      border-radius: var(--radius-sm);
      font-size: 0.82rem;
      margin-bottom: 24px;
      line-height: 1.6;
    }
    @media (max-width: 600px) {
      .form-row { grid-template-columns: 1fr; }
      .install-header { padding: 26px 20px; }
      .install-body { padding: 24px 18px; }
    }
  </style>
</head>
<body>

  <div class="install-card">
    <div class="install-header">
      <span class="brand-logo-text" style="font-size:1.8rem; color:#FFFFFF;">MARE <span style="color:var(--color-gold); font-style:italic;">&</span> MONTE</span>
      <p>Canlı Veritabanı & Sistem Kurulum Sihirbazı</p>
    </div>

    <div class="install-body">
      <?php if (!empty($error)): ?>
        <div class="alert-box alert-error">
          <strong>⚠️ Hata:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
      <?php endif; ?>

      <?php if ($step === 'locked'): ?>
        <div class="alert-box alert-success" style="text-align:center;">
          <h3 style="font-size:1.4rem; margin-bottom:8px;">✨ Sistem Başarıyla Kurulmuş</h3>
          <p style="margin-bottom:18px;">Mare & Monte web uygulaması ve veritabanı aktif durumdadır.</p>
          <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="index.php" class="btn btn-primary">Site Ana Sayfasına Git</a>
            <a href="admin/index.php" class="btn btn-dark">Yönetim Paneli</a>
          </div>
        </div>
      <?php elseif ($step === 'success'): ?>
        <div class="alert-box alert-success">
          <h3 style="font-size:1.4rem; margin-bottom:8px;">🎉 Kurulum Başarıyla Tamamlandı!</h3>
          <p>Tüm tablolar oluşturuldu, canlı veritabanı ayarları kaydedildi ve yönetici hesabı aktif edildi.</p>
        </div>

        <div class="log-list">
          <?php foreach ($successLogs as $log): ?>
            <div>✓ <?php echo htmlspecialchars($log); ?></div>
          <?php endforeach; ?>
        </div>

        <div style="background:var(--color-warm-surface); padding:18px; border-radius:var(--radius-sm); margin-bottom:24px;">
          <strong style="color:var(--color-terracotta); display:block; margin-bottom:8px;">🔐 Yönetim Giriş Bilgileriniz:</strong>
          <div style="font-size:0.9rem;">
            <strong>Kullanıcı Adı:</strong> <?php echo htmlspecialchars($_POST['admin_user'] ?? 'admin'); ?><br />
            <strong>Şifre:</strong> <em>(Belirlediğiniz yönetici şifresi)</em><br />
            <strong>E-posta:</strong> <?php echo htmlspecialchars($_POST['admin_email'] ?? 'info@yenimaremonte.com'); ?>
          </div>
        </div>

        <div style="display:flex; justify-content:space-between; gap:14px; flex-wrap:wrap;">
          <a href="index.php" class="btn btn-primary" style="flex:1;">Ana Sayfayı Gör</a>
          <a href="admin/index.php" class="btn btn-dark" style="flex:1;">Yönetici Paneline Giriş Yap</a>
        </div>
      <?php else: ?>
        <div class="req-list">
          <strong style="display:block; margin-bottom:8px; font-size:0.85rem; color:var(--text-dark);">Sunucu Uyumluluk Kontrolleri:</strong>
          <?php foreach ($reqs as $k => $r): ?>
            <div class="req-item">
              <span><?php echo $r['name']; ?></span>
              <span class="<?php echo $r['pass'] ? 'badge-pass' : 'badge-fail'; ?>">
                <?php echo $r['pass'] ? '✓ ' . $r['val'] : '✗ ' . $r['val']; ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>

        <form method="POST" action="install.php">
          <input type="hidden" name="action" value="install" />

          <div class="form-section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
            Canlı Veritabanı Bilgileri (MySQL / MariaDB)
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="db_host">Veritabanı Sunucusu</label>
              <input type="text" id="db_host" name="db_host" class="form-input" value="<?php echo htmlspecialchars($defaultHost); ?>" required />
            </div>
            <div class="form-group">
              <label for="db_name">Veritabanı Adı</label>
              <input type="text" id="db_name" name="db_name" class="form-input" value="<?php echo htmlspecialchars($defaultDb); ?>" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="db_user">Veritabanı Kullanıcısı</label>
              <input type="text" id="db_user" name="db_user" class="form-input" value="<?php echo htmlspecialchars($defaultUser); ?>" required />
            </div>
            <div class="form-group">
              <label for="db_pass">Veritabanı Şifresi</label>
              <input type="text" id="db_pass" name="db_pass" class="form-input" value="<?php echo htmlspecialchars($defaultPass); ?>" />
            </div>
          </div>

          <div class="form-section-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            Yönetim Paneli Giriş Hesabı
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="admin_user">Yönetici Kullanıcı Adı</label>
              <input type="text" id="admin_user" name="admin_user" class="form-input" value="admin" required />
            </div>
            <div class="form-group">
              <label for="admin_pass">Yönetici Şifresi</label>
              <input type="password" id="admin_pass" name="admin_pass" class="form-input" value="Maremonte2026!" required />
            </div>
          </div>

          <div class="form-group full" style="margin-bottom:24px;">
            <label for="admin_email">Yönetici E-posta</label>
            <input type="email" id="admin_email" name="admin_email" class="form-input" value="info@yenimaremonte.com" required />
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width:100%; justify-content:center;">
            ✨ Kurulumu Başlat & Canlıya Al
          </button>
        </form>
      <?php endif; ?>
    </div>
  </div>

</body>
</html>
