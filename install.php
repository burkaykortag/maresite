<?php
/**
 * Mare & Monte Hotel & Bistro - Web Kurulum Sihirbazı (Web Installer)
 * Tek tıkla veritabanı kurulumu, tablo oluşturma ve yönetici hesabı yapılandırması.
 * Altınoluk / Edremit / Kaz Dağları
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

$lockFile = __DIR__ . '/installed.lock';
$sqlFile  = __DIR__ . '/install.sql';
$dbConfigFile = __DIR__ . '/includes/db.php';

// Kilit Kontrolü
$isLocked = file_exists($lockFile);

// Otomatik site URL tespiti
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$autoUrl = $protocol . '://' . $host . $scriptDir;

$error = null;
$success = false;
$successDetails = [];

// Sistem Gereksinimleri
$reqs = [
    'PHP Sürümü (>= 7.4)' => [version_compare(PHP_VERSION, '7.4.0', '>='), PHP_VERSION],
    'PDO MySQL Eklentisi' => [extension_loaded('pdo_mysql'), extension_loaded('pdo_mysql') ? 'Aktif' : 'Eksik'],
    'Mbstring Eklentisi'   => [extension_loaded('mbstring'), extension_loaded('mbstring') ? 'Aktif' : 'Eksik'],
    'Fileinfo Eklentisi'   => [extension_loaded('fileinfo'), extension_loaded('fileinfo') ? 'Aktif' : 'Eksik'],
    'Dizin Yazma İzni'     => [is_writable(__DIR__), is_writable(__DIR__) ? 'Yazılabilir' : 'Salt Okunur (İzin veriniz)'],
];

$allReqOk = true;
foreach ($reqs as $r) {
    if (!$r[0]) {
        $allReqOk = false;
    }
}

// Form Gönderimi (Kurulum)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_install'])) {
    $dbHost    = trim((string)($_POST['db_host'] ?? 'localhost'));
    $dbPort    = trim((string)($_POST['db_port'] ?? '3306'));
    $dbName    = trim((string)($_POST['db_name'] ?? 'mareotel'));
    $dbUser    = trim((string)($_POST['db_user'] ?? 'mareotel'));
    $dbPass    = (string)($_POST['db_pass'] ?? 'Maremonte1122334455..');
    $adminUser = trim((string)($_POST['admin_user'] ?? 'admin'));
    $adminPass = (string)($_POST['admin_pass'] ?? 'admin');
    $adminMail = trim((string)($_POST['admin_email'] ?? 'info@yenimaremonte.com'));

    if (empty($dbName) || empty($dbUser)) {
        $error = "Lütfen veritabanı adı ve kullanıcı adı alanlarını doldurunuz.";
    } elseif (empty($adminUser) || empty($adminPass)) {
        $error = "Lütfen yönetici kullanıcı adı ve şifresini doldurunuz.";
    } else {
        try {
            // 1. MySQL Bağlantısı Kur
            $pdo = null;
            $connectionSuccess = false;

            // Önce doğrudan belirtilen veritabanına bağlanmayı dene
            try {
                $dsnWithDb = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";
                $pdo = new PDO($dsnWithDb, $dbUser, $dbPass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
                $connectionSuccess = true;
            } catch (PDOException $eDb) {
                // Veritabanı henüz oluşturulmamış olabilir, MySQL sunucusuna bağlanıp oluşturmayı dene
                try {
                    $dsnNoDb = "mysql:host={$dbHost};port={$dbPort};charset=utf8mb4";
                    $pdo = new PDO($dsnNoDb, $dbUser, $dbPass, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
                    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                    $pdo->exec("USE `{$dbName}`");
                    $connectionSuccess = true;
                } catch (PDOException $eRoot) {
                    // Yerel geliştirme ortamı (XAMPP root) kontrolü
                    if ($dbHost === 'localhost' || $dbHost === '127.0.0.1') {
                        try {
                            $rootPdo = new PDO("mysql:host={$dbHost};port={$dbPort};charset=utf8mb4", 'root', '', [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                            ]);
                            $rootPdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                            $rootPdo->exec("CREATE USER IF NOT EXISTS '{$dbUser}'@'localhost' IDENTIFIED BY '{$dbPass}'");
                            $rootPdo->exec("ALTER USER '{$dbUser}'@'localhost' IDENTIFIED BY '{$dbPass}'");
                            $rootPdo->exec("GRANT ALL PRIVILEGES ON `{$dbName}`.* TO '{$dbUser}'@'localhost'");
                            $rootPdo->exec("CREATE USER IF NOT EXISTS '{$dbUser}'@'127.0.0.1' IDENTIFIED BY '{$dbPass}'");
                            $rootPdo->exec("ALTER USER '{$dbUser}'@'127.0.0.1' IDENTIFIED BY '{$dbPass}'");
                            $rootPdo->exec("GRANT ALL PRIVILEGES ON `{$dbName}`.* TO '{$dbUser}'@'127.0.0.1'");
                            $rootPdo->exec("FLUSH PRIVILEGES");

                            // Şimdi oluşturulan kullanıcıyla bağlan
                            $pdo = new PDO("mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass, [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                            ]);
                            $connectionSuccess = true;
                        } catch (PDOException $eLocal) {
                            throw new Exception("MySQL Bağlantı Hatası: '{$dbUser}' kullanıcısı doğrulanamadı. (" . $eDb->getMessage() . ")\nİpucu: Yerel test için Kullanıcı Adı: 'root', Şifre: (boş) girerek de kurabilirsiniz.");
                        }
                    } else {
                        throw new Exception("MySQL Yetki / Bağlantı Hatası: '{$dbUser}' kullanıcısı ile MySQL'e erişilemedi.\n📌 Canlı Sunucu (cPanel / Plesk) Kontrol Listesi:\n1. cPanel > 'MySQL Veritabanları' bölümünden '{$dbName}' adında bir veritabanı oluşturunuz.\n2. Aynı sayfadan '{$dbUser}' kullanıcısını oluşturup şifresini giriniz.\n3. 'Veritabanına Kullanıcı Ekle' bölümünden kullanıcıyı veritabanına bağlayıp 'Tüm Yetkiler' (All Privileges) kutusunu işaretleyiniz.\n(Hata kodu: " . $eDb->getMessage() . ")");
                    }
                }
            }

            if (!$pdo) {
                throw new Exception("Veritabanı bağlantısı kurulamadı.");
            }

            // 2. install.sql Dosyasını Çalıştır
            if (!file_exists($sqlFile)) {
                throw new Exception("Kurulum SQL dosyası ({$sqlFile}) bulunamadı.");
            }

            $sqlContent = file_get_contents($sqlFile);
            // Çoklu sorgu çalıştırma
            $pdo->exec($sqlContent);

            // 3. Yönetici Hesabını Güncelle / Oluştur
            $adminHash = password_hash($adminPass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("
                INSERT INTO `admin_kullanicilar` (`id`, `kullanici_adi`, `sifre_hash`, `eposta`, `ad_soyad`, `rol`)
                VALUES (1, :user, :hash, :email, 'Mare & Monte Yönetim', 'superadmin')
                ON DUPLICATE KEY UPDATE
                    `kullanici_adi` = VALUES(`kullanici_adi`),
                    `sifre_hash` = VALUES(`sifre_hash`),
                    `eposta` = VALUES(`eposta`)
            ");
            $stmt->execute([
                ':user'  => $adminUser,
                ':hash'  => $adminHash,
                ':email' => $adminMail,
            ]);

            // 4. includes/db.php Dosyasını Güncelle
            $newDbPhp = <<<PHP
<?php
/**
 * Mare & Monte Hotel & Bistro — Database Connection Helper
 * Production Database: {$dbName}
 * Altınoluk / Edremit / Kaz Dağları
 */

if (!defined('DB_HOST')) define('DB_HOST', '{$dbHost}');
if (!defined('DB_NAME')) define('DB_NAME', '{$dbName}');
if (!defined('DB_USER')) define('DB_USER', '{$dbUser}');
if (!defined('DB_PASS')) define('DB_PASS', '{$dbPass}');
if (!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8mb4');

/**
 * Get PDO Database Connection
 * Returns PDO instance or null if connection fails (graceful degradation)
 * 
 * @return PDO|null
 */
function getDB() {
    static \$pdo = null;
    if (\$pdo !== null) {
        return \$pdo;
    }

    \$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    \$options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
    ];

    try {
        \$pdo = new PDO(\$dsn, DB_USER, DB_PASS, \$options);
        return \$pdo;
    } catch (PDOException \$e) {
        // Fallback for local development if production credentials fail
        if (DB_HOST === 'localhost' && (DB_USER !== 'root' || DB_PASS !== '')) {
            try {
                \$fallbackDsn = 'mysql:host=localhost;dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
                \$pdo = new PDO(\$fallbackDsn, 'root', '', \$options);
                return \$pdo;
            } catch (PDOException \$e2) {
                try {
                    \$fallbackDsn2 = 'mysql:host=localhost;dbname=maremonte;charset=' . DB_CHARSET;
                    \$pdo = new PDO(\$fallbackDsn2, 'root', '', \$options);
                    return \$pdo;
                } catch (PDOException \$e3) {
                    error_log('DB Connection Error: ' . \$e->getMessage());
                    return null;
                }
            }
        }
        error_log('DB Connection Error: ' . \$e->getMessage());
        return null;
    }
}
PHP;
            @file_put_contents($dbConfigFile, $newDbPhp);

            // 5. Kilit Dosyası Oluştur
            $lockData = "INSTALLED=" . date('c') . "\nDB_NAME=" . $dbName . "\nSTATUS=SUCCESS\n";
            @file_put_contents($lockFile, $lockData);

            $success = true;
            $isLocked = true;
            $successDetails = [
                'db_name'    => $dbName,
                'db_user'    => $dbUser,
                'admin_user' => $adminUser,
                'admin_pass' => $adminPass,
            ];

        } catch (Throwable $t) {
            $error = "Kurulum Hatası: " . $t->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kurulum Sihirbazı | Mare & Monte Hotel & Bistro</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    :root {
      --primary: #9A744B;
      --primary-hover: #B88E5E;
      --dark-bg: #151311;
      --card-bg: #24201D;
      --border-color: rgba(200, 155, 88, 0.35);
      --text: #F5F1E8;
      --text-muted: #A39B92;
    }
    * { box-sizing: border-box; }
    body {
      background: radial-gradient(circle at top center, #2C2621 0%, #151311 100%);
      color: var(--text);
      min-height: 100vh;
      margin: 0;
      padding: 40px 16px;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .install-container {
      max-width: 680px;
      width: 100%;
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: 14px;
      box-shadow: 0 25px 65px rgba(0,0,0,0.65);
      overflow: hidden;
    }
    .install-header {
      background: #1C1916;
      padding: 32px 30px;
      text-align: center;
      border-bottom: 2px solid var(--primary);
    }
    .brand-title {
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: 0.1em;
      color: #FFFFFF;
      margin: 0 0 6px 0;
    }
    .brand-title span { color: var(--primary); font-style: italic; }
    .brand-subtitle {
      font-size: 0.72rem;
      letter-spacing: 0.22em;
      text-transform: uppercase;
      color: var(--primary);
      margin: 0;
    }
    .install-body {
      padding: 32px 30px;
    }
    .alert {
      padding: 16px 20px;
      border-radius: 8px;
      margin-bottom: 24px;
      font-size: 0.95rem;
      line-height: 1.5;
    }
    .alert-error {
      background: rgba(220, 38, 38, 0.15);
      border: 1px solid #DC2626;
      color: #FCA5A5;
    }
    .alert-success {
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid #10B981;
      color: #6EE7B7;
    }
    .req-list {
      background: rgba(0,0,0,0.25);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 8px;
      padding: 16px 20px;
      margin-bottom: 28px;
    }
    .req-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      font-size: 0.9rem;
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .req-item:last-child { border-bottom: none; }
    .req-status-ok { color: #10B981; font-weight: 600; }
    .req-status-fail { color: #EF4444; font-weight: 600; }
    
    .section-title {
      font-size: 1.15rem;
      color: #FFFFFF;
      margin: 24px 0 16px 0;
      padding-bottom: 8px;
      border-bottom: 1px solid rgba(200, 155, 88, 0.25);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .section-title i { color: var(--primary); }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    @media (max-width: 600px) {
      .form-grid { grid-template-columns: 1fr; }
    }
    .form-group {
      margin-bottom: 16px;
    }
    .form-group label {
      display: block;
      font-size: 0.82rem;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-bottom: 6px;
      font-weight: 600;
    }
    .form-control {
      width: 100%;
      background: #171513;
      border: 1px solid rgba(200, 155, 88, 0.3);
      color: #FFFFFF;
      padding: 12px 14px;
      border-radius: 6px;
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }
    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(154, 116, 75, 0.25);
    }
    .btn-submit {
      width: 100%;
      background: var(--primary);
      color: #FFFFFF;
      border: none;
      padding: 16px 24px;
      border-radius: 8px;
      font-size: 1.05rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      cursor: pointer;
      margin-top: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      transition: background 0.2s ease, transform 0.1s ease;
    }
    .btn-submit:hover {
      background: var(--primary-hover);
      transform: translateY(-1px);
    }
    .success-card {
      text-align: center;
      padding: 10px 0;
    }
    .success-icon {
      font-size: 3.5rem;
      color: #10B981;
      margin-bottom: 16px;
    }
    .cred-box {
      background: rgba(0,0,0,0.3);
      border: 1px solid rgba(200, 155, 88, 0.3);
      border-radius: 8px;
      padding: 20px;
      text-align: left;
      margin: 24px 0;
    }
    .cred-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid rgba(255,255,255,0.05);
      font-size: 0.95rem;
    }
    .cred-row:last-child { border-bottom: none; }
    .cred-label { color: var(--text-muted); }
    .cred-val { font-weight: 600; color: #FFFFFF; font-family: monospace; font-size: 1rem; }
    .btn-row {
      display: flex;
      gap: 12px;
      margin-top: 24px;
    }
    @media (max-width: 600px) {
      .btn-row { flex-direction: column; }
    }
    .btn-site {
      flex: 1;
      background: var(--primary);
      color: #fff;
      padding: 14px 20px;
      border-radius: 6px;
      text-align: center;
      text-decoration: none;
      font-weight: 600;
    }
    .btn-admin {
      flex: 1;
      background: #2D2722;
      border: 1px solid var(--border-color);
      color: #fff;
      padding: 14px 20px;
      border-radius: 6px;
      text-align: center;
      text-decoration: none;
      font-weight: 600;
    }
    .lock-view {
      text-align: center;
      padding: 20px 0;
    }
    .lock-icon-lg {
      font-size: 3rem;
      color: var(--primary);
      margin-bottom: 16px;
    }
  </style>
</head>
<body>

<div class="install-container">
  <div class="install-header">
    <h1 class="brand-title">MARE <span>&</span> MONTE</h1>
    <p class="brand-subtitle">HOTEL & BISTRO · ALTINOLUK</p>
  </div>

  <div class="install-body">

    <?php if ($success): ?>
      <!-- BAŞARILI KURULUM EKRANI -->
      <div class="success-card">
        <div class="success-icon"><i class="fa-solid fa-circle-check"></i></div>
        <h2 style="color: #FFFFFF; margin-top: 0; font-size: 1.6rem;">Kurulum Başarıyla Tamamlandı!</h2>
        <p style="color: var(--text-muted); font-size: 0.95rem;">
          Veritabanı tabloları, varsayılan ayarlar ve yönetici hesabı başarıyla oluşturuldu.
        </p>

        <div class="cred-box">
          <div class="cred-row">
            <span class="cred-label">Veritabanı Adı:</span>
            <span class="cred-val"><?= htmlspecialchars($successDetails['db_name']) ?></span>
          </div>
          <div class="cred-row">
            <span class="cred-label">Yönetici Kullanıcı:</span>
            <span class="cred-val"><?= htmlspecialchars($successDetails['admin_user']) ?></span>
          </div>
          <div class="cred-row">
            <span class="cred-label">Yönetici Şifresi:</span>
            <span class="cred-val"><?= htmlspecialchars($successDetails['admin_pass']) ?></span>
          </div>
        </div>

        <div class="alert alert-success" style="font-size: 0.88rem; text-align: left;">
          <i class="fa-solid fa-shield-halved" style="margin-right: 6px;"></i>
          Güvenliğiniz için <code>installed.lock</code> oluşturulmuştur. Sitenizi hemen kullanmaya başlayabilirsiniz.
        </div>

        <div class="btn-row">
          <a href="index.php" class="btn-site"><i class="fa-solid fa-house" style="margin-right: 6px;"></i> Web Sitesine Git</a>
          <a href="admin/login.php" class="btn-admin"><i class="fa-solid fa-gauge-high" style="margin-right: 6px;"></i> Yönetici Paneline Giriş</a>
        </div>
      </div>

    <?php elseif ($isLocked && !isset($_GET['reinstall'])): ?>
      <!-- KİLİTLİ DURUM EKRANI -->
      <div class="lock-view">
        <div class="lock-icon-lg"><i class="fa-solid fa-shield-cat"></i></div>
        <h2 style="color: #FFFFFF; font-size: 1.5rem; margin-top: 0;">Kurulum Tamamlanmış Durumda</h2>
        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; max-width: 480px; margin: 0 auto 24px auto;">
          Mare & Monte web uygulaması ve veritabanı kurulumu hazırdır. Güvenlik önlemleri gereği kurulum sayfası kilitlenmiştir.
        </p>

        <div class="btn-row" style="max-width: 480px; margin: 0 auto 24px auto;">
          <a href="index.php" class="btn-site"><i class="fa-solid fa-house" style="margin-right: 6px;"></i> Ana Sayfa</a>
          <a href="admin/login.php" class="btn-admin"><i class="fa-solid fa-gauge-high" style="margin-right: 6px;"></i> Yönetici Paneli</a>
        </div>

        <div style="border-top: 1px solid rgba(255,255,255,0.08); padding-top: 18px; margin-top: 24px;">
          <a href="install.php?reinstall=1" style="color: var(--primary); font-size: 0.85rem; text-decoration: none;">
            <i class="fa-solid fa-arrows-rotate" style="margin-right: 4px;"></i> Yeniden Kurulum Yapmak İstiyorum
          </a>
        </div>
      </div>

    <?php else: ?>
      <!-- AKTİF KURULUM FORMU -->
      <?php if ($error): ?>
        <div class="alert alert-error">
          <i class="fa-solid fa-triangle-exclamation" style="margin-right: 6px;"></i>
          <?= nl2br(htmlspecialchars($error)) ?>
        </div>
      <?php endif; ?>

      <!-- 1. Sistem Kontrolleri -->
      <div class="req-list">
        <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--primary); margin-bottom: 10px; font-weight: 600;">
          <i class="fa-solid fa-circle-check" style="margin-right: 6px;"></i> Sistem & Sunucu Uyumluluk Kontrolü
        </div>
        <?php foreach ($reqs as $name => $status): ?>
          <div class="req-item">
            <span><?= htmlspecialchars($name) ?></span>
            <span class="<?= $status[0] ? 'req-status-ok' : 'req-status-fail' ?>">
              <?= htmlspecialchars((string)$status[1]) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>

      <form method="POST" action="install.php">
        <input type="hidden" name="do_install" value="1" />

        <!-- 2. Veritabanı Bilgileri -->
        <div class="section-title">
          <i class="fa-solid fa-database"></i> Veritabanı Yapılandırması (MySQL)
        </div>

        <div class="form-grid">
          <div class="form-group">
            <label>Veritabanı Sunucusu (Host)</label>
            <input type="text" name="db_host" class="form-control" value="localhost" required />
          </div>
          <div class="form-group">
            <label>MySQL Port</label>
            <input type="text" name="db_port" class="form-control" value="3306" required />
          </div>
        </div>

        <div class="form-grid">
          <div class="form-group">
            <label>Veritabanı Adı</label>
            <input type="text" name="db_name" class="form-control" value="mareotel" required />
          </div>
          <div class="form-group">
            <label>Veritabanı Kullanıcısı</label>
            <input type="text" name="db_user" class="form-control" value="mareotel" required />
          </div>
        </div>

        <div class="form-group">
          <label>Veritabanı Şifresi</label>
          <input type="text" name="db_pass" class="form-control" value="Maremonte1122334455.." required />
        </div>

        <!-- 3. Yönetici Hesabı -->
        <div class="section-title">
          <i class="fa-solid fa-user-shield"></i> Yönetici (Admin) Hesabı
        </div>

        <div class="form-grid">
          <div class="form-group">
            <label>Kullanıcı Adı</label>
            <input type="text" name="admin_user" class="form-control" value="admin" required />
          </div>
          <div class="form-group">
            <label>Yönetici Şifresi</label>
            <input type="text" name="admin_pass" class="form-control" value="admin" required />
          </div>
        </div>

        <div class="form-group">
          <label>Yönetici E-Posta</label>
          <input type="email" name="admin_email" class="form-control" value="info@yenimaremonte.com" required />
        </div>

        <button type="submit" class="btn-submit">
          <i class="fa-solid fa-bolt"></i> Kurulumu Başlat ve Tamamla
        </button>
      </form>
    <?php endif; ?>

  </div>
</div>

</body>
</html>
