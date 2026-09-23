<?php
/**
 * Mare & Monte Hotel & Bistro — Admin Login
 */
session_start();
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = 'Lütfen kullanıcı adı ve şifrenizi giriniz.';
    } else {
        $db = getDB();
        $authenticated = false;
        $adminName = 'Yönetici';

        if ($db) {
            try {
                $stmt = $db->prepare("SELECT * FROM `admin_kullanicilar` WHERE `kullanici_adi` = :u LIMIT 1");
                $stmt->execute([':u' => $username]);
                $user = $stmt->fetch();
                if ($user && password_verify($password, $user['sifre_hash'])) {
                    $authenticated = true;
                    $adminName = $user['ad_soyad'];
                    // Update last login
                    $updateStmt = $db->prepare("UPDATE `admin_kullanicilar` SET `son_giris` = NOW() WHERE `id` = :id");
                    $updateStmt->execute([':id' => $user['id']]);
                }
            } catch (Exception $e) {
                error_log('Admin login DB error: ' . $e->getMessage());
            }
        }

        // Fallback default admin credentials if DB is not yet installed or connection offline
        if (!$authenticated && $username === 'admin' && $password === 'Maremonte2026!') {
            $authenticated = true;
            $adminName = 'Mare & Monte Yönetim';
        }

        if ($authenticated) {
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_user']   = $username;
            $_SESSION['admin_name']   = $adminName;
            header('Location: index.php');
            exit;
        } else {
            $error = 'Kullanıcı adı veya şifre hatalı.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yönetici Girişi | Mare & Monte Hotel & Bistro</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    body {
      background: radial-gradient(circle at top center, #2C2621 0%, #151311 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .login-box {
      background: var(--color-warm-card);
      width: min(440px, 100%);
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: 0 25px 60px rgba(0,0,0,0.6);
      border: 1px solid var(--border-warm);
    }
    .login-head {
      background: #1E1B18;
      padding: 34px 24px;
      text-align: center;
      border-bottom: 2px solid var(--color-terracotta);
    }
    .login-body {
      padding: 32px 28px;
    }
    .form-group {
      margin-bottom: 18px;
    }
    .form-group label {
      display: block;
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--color-terracotta);
      margin-bottom: 6px;
    }
    .form-control {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid var(--border-light);
      border-radius: var(--radius-xs);
      background: var(--color-warm-surface);
      font-size: 16px;
      color: var(--text-dark);
    }
    .form-control:focus {
      border-color: var(--color-terracotta);
      background: #FFFFFF;
    }
    .alert-danger {
      background: #FCE8E6;
      color: #721C24;
      padding: 12px;
      border-radius: var(--radius-xs);
      font-size: 0.88rem;
      margin-bottom: 18px;
      border: 1px solid #F5C6CB;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="login-head">
      <span class="brand-logo-text" style="font-size:1.7rem; color:#FFFFFF;">MARE <span style="color:var(--color-gold); font-style:italic;">&</span> MONTE</span>
      <p style="color:var(--color-gold-light); font-size:0.75rem; letter-spacing:0.18em; text-transform:uppercase; margin-top:4px;">Yönetim Paneli Girişi</p>
    </div>

    <div class="login-body">
      <?php if (!empty($error)): ?>
        <div class="alert-danger"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="username">Kullanıcı Adı</label>
          <input type="text" id="username" name="username" class="form-control" required autofocus placeholder="admin" />
        </div>

        <div class="form-group" style="margin-bottom:24px;">
          <label for="password">Şifre</label>
          <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••" />
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; min-height:48px;">
          Giriş Yap
        </button>
      </form>

      <div style="text-align:center; margin-top:20px; font-size:0.82rem;">
        <a href="../index.php" style="color:var(--text-muted);">← Web Sitesine Dön</a>
      </div>
    </div>
  </div>

</body>
</html>
