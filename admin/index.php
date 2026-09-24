<?php
/**
 * Mare & Monte Hotel & Bistro — Admin Reservations Management Panel
 */
session_start();
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header('Location: login.php');
    exit;
}

$db = getDB();
$message = '';
$msgType = 'success';

// Handle Actions (Status change, delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $resId  = intval($_POST['id'] ?? 0);

    if ($action === 'change_status' && $resId > 0 && $db) {
        $newStatus = $_POST['status'] ?? 'yeni';
        $validStatuses = ['yeni', 'onaylandi', 'iptal', 'tamamlandi'];
        if (in_array($newStatus, $validStatuses)) {
            try {
                $stmt = $db->prepare("UPDATE `rezervasyonlar` SET `status` = :st WHERE `id` = :id");
                $stmt->execute([':st' => $newStatus, ':id' => $resId]);
                $message = "Rezervasyon durumu güncellendi: #" . $resId;
            } catch (Exception $e) {
                $message = "Hata: " . $e->getMessage();
                $msgType = 'error';
            }
        }
    } elseif ($action === 'delete' && $resId > 0 && $db) {
        try {
            $stmt = $db->prepare("DELETE FROM `rezervasyonlar` WHERE `id` = :id");
            $stmt->execute([':id' => $resId]);
            $message = "Rezervasyon silindi: #" . $resId;
        } catch (Exception $e) {
            $message = "Hata: " . $e->getMessage();
            $msgType = 'error';
        }
    }
}

// Fetch Reservations
$reservations = [];
$stats = ['total' => 0, 'yeni' => 0, 'onaylandi' => 0, 'iptal' => 0];

$search = trim($_GET['q'] ?? '');
$filterStatus = trim($_GET['status'] ?? '');

if ($db) {
    try {
        $sql = "SELECT * FROM `rezervasyonlar` WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (`fullname` LIKE :q OR `phone` LIKE :q OR `ref_no` LIKE :q OR `email` LIKE :q)";
            $params[':q'] = "%{$search}%";
        }

        if (!empty($filterStatus)) {
            $sql .= " AND `status` = :st";
            $params[':st'] = $filterStatus;
        }

        $sql .= " ORDER BY `id` DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $reservations = $stmt->fetchAll();

        // Calculate Stats
        $statStmt = $db->query("SELECT `status`, COUNT(*) as cnt FROM `rezervasyonlar` GROUP BY `status`");
        while ($row = $statStmt->fetch()) {
            if (isset($stats[$row['status']])) {
                $stats[$row['status']] = intval($row['cnt']);
            }
            $stats['total'] += intval($row['cnt']);
        }
    } catch (Exception $e) {
        error_log('DB Fetch Error: ' . $e->getMessage());
    }
} else {
    // Fallback to JSON
    $jsonFile = __DIR__ . '/../data/rezervasyonlar.json';
    if (file_exists($jsonFile)) {
        $raw = json_decode(file_get_contents($jsonFile), true) ?: [];
        $reservations = array_reverse($raw);
        $stats['total'] = count($reservations);
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rezervasyon Yönetimi | Mare & Monte Hotel</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    body {
      background-color: var(--color-warm-bg);
      color: var(--text-dark);
      padding: 0;
      margin: 0;
      min-height: 100vh;
    }
    .admin-navbar {
      background-color: #1E1B18;
      color: var(--text-light);
      padding: 16px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 2px solid var(--color-terracotta);
    }
    .admin-container {
      max-width: 1320px;
      margin: 30px auto;
      padding: 0 20px;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }
    .stat-card {
      background: var(--color-warm-card);
      padding: 24px;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-subtle);
      border: 1px solid var(--border-light);
      border-left: 4px solid var(--color-terracotta);
    }
    .stat-val {
      font-family: var(--font-serif);
      font-size: 2.2rem;
      font-weight: 600;
      color: var(--text-dark);
      line-height: 1;
      margin-top: 6px;
    }
    .stat-lbl {
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--text-muted);
      font-weight: 700;
    }
    .table-card {
      background: var(--color-warm-card);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-subtle);
      border: 1px solid var(--border-light);
      overflow: hidden;
    }
    .table-header-bar {
      padding: 20px 24px;
      border-bottom: 1px solid var(--border-light);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      flex-wrap: wrap;
    }
    .res-table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-size: 0.9rem;
    }
    .res-table th {
      background: var(--color-warm-surface);
      padding: 14px 18px;
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--text-muted);
      font-weight: 700;
      border-bottom: 1px solid var(--border-light);
    }
    .res-table td {
      padding: 16px 18px;
      border-bottom: 1px solid var(--border-light);
      vertical-align: middle;
    }
    .res-table tr:hover td {
      background-color: rgba(184, 115, 72, 0.03);
    }
    .badge-status {
      display: inline-block;
      padding: 4px 10px;
      border-radius: var(--radius-full);
      font-size: 0.72rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }
    .badge-yeni { background: #FEF3C7; color: #92400E; }
    .badge-onaylandi { background: #D1FAE5; color: #065F46; }
    .badge-iptal { background: #FEE2E2; color: #991B1B; }
    .badge-tamamlandi { background: #E0E7FF; color: #3730A3; }
    .btn-action {
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 0.78rem;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .btn-action.call { background: var(--color-terracotta); color: #fff; }
    .btn-action.wa { background: #25D366; color: #fff; }
    @media (max-width: 900px) {
      .stats-grid { grid-template-columns: repeat(2, 1fr); }
      .table-card { overflow-x: auto; }
      .res-table { min-width: 750px; }
    }
    @media (max-width: 550px) {
      .stats-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <header class="admin-navbar">
    <div style="display:flex; align-items:center; gap:20px;">
      <span class="brand-logo-text" style="font-size:1.4rem; color:#FFFFFF;">MARE <span style="color:var(--color-gold); font-style:italic;">&</span> MONTE</span>
      
      <nav style="display:flex; align-items:center; gap:16px;">
        <a href="index.php" style="color:var(--color-gold); font-size:0.85rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em;">📋 Rezervasyonlar</a>
        <a href="gorseller.php" style="color:rgba(255,255,255,0.75); font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:0.06em;">🖼️ Görseller & Hero Slider</a>
      </nav>
    </div>
    <div style="display:flex; align-items:center; gap:14px; font-size:0.85rem;">
      <span style="color:rgba(255,255,255,0.7);"><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin'); ?></span>
      <a href="../index.php" target="_blank" style="color:var(--color-gold); font-weight:600;">Siteyi Aç ↗</a>
      <a href="logout.php" style="color:#FF7B7B; font-weight:600;">Çıkış</a>
    </div>
  </header>

  <main class="admin-container">

    <?php if (!empty($message)): ?>
      <div style="padding:14px 18px; border-radius:8px; margin-bottom:20px; font-size:0.9rem; background:<?php echo $msgType === 'success' ? '#E6F4EA; color:#155724;' : '#FCE8E6; color:#721C24;'; ?>">
        <?php echo htmlspecialchars($message); ?>
      </div>
    <?php endif; ?>

    <!-- Summary Stats -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-lbl">Toplam Rezervasyon</div>
        <div class="stat-val"><?php echo $stats['total']; ?></div>
      </div>
      <div class="stat-card" style="border-left-color: #F59E0B;">
        <div class="stat-lbl">Yeni Talepler</div>
        <div class="stat-val" style="color:#D97706;"><?php echo $stats['yeni']; ?></div>
      </div>
      <div class="stat-card" style="border-left-color: #10B981;">
        <div class="stat-lbl">Onaylanan</div>
        <div class="stat-val" style="color:#059669;"><?php echo $stats['onaylandi']; ?></div>
      </div>
      <div class="stat-card" style="border-left-color: #EF4444;">
        <div class="stat-lbl">İptal Edilen</div>
        <div class="stat-val" style="color:#DC2626;"><?php echo $stats['iptal']; ?></div>
      </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
      <div class="table-header-bar">
        <h3 style="font-family:var(--font-serif); font-size:1.45rem;">Gelen Rezervasyon Talepleri</h3>

        <form method="GET" action="index.php" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
          <input type="text" name="q" value="<?php echo htmlspecialchars($search); ?>" placeholder="İsim, telefon, ref no..." class="form-control" style="width:200px; padding:7px 12px; font-size:0.85rem;" />
          
          <select name="status" class="form-control" style="width:140px; padding:7px 10px; font-size:0.85rem;" onchange="this.form.submit()">
            <option value="">Tüm Durumlar</option>
            <option value="yeni" <?php echo $filterStatus === 'yeni' ? 'selected' : ''; ?>>Yeni</option>
            <option value="onaylandi" <?php echo $filterStatus === 'onaylandi' ? 'selected' : ''; ?>>Onaylandı</option>
            <option value="iptal" <?php echo $filterStatus === 'iptal' ? 'selected' : ''; ?>>İptal</option>
            <option value="tamamlandi" <?php echo $filterStatus === 'tamamlandi' ? 'selected' : ''; ?>>Tamamlandı</option>
          </select>

          <button type="submit" class="btn btn-dark btn-sm">Filtrele</button>
          <?php if (!empty($search) || !empty($filterStatus)): ?>
            <a href="index.php" class="btn btn-outline-dark btn-sm">Temizle</a>
          <?php endif; ?>
        </form>
      </div>

      <?php if (empty($reservations)): ?>
        <div style="padding:45px 20px; text-align:center; color:var(--text-muted);">
          Henüz kayıtlı rezervasyon bulunmuyor.
        </div>
      <?php else: ?>
        <table class="res-table">
          <thead>
            <tr>
              <th>Ref No / Tarih</th>
              <th>Misafir & İletişim</th>
              <th>Konaklama Tarihleri</th>
              <th>Oda & Kişi</th>
              <th>Durum</th>
              <th>Hızlı İletişim / İşlem</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($reservations as $r): 
              $st = $r['status'] ?? 'yeni';
              $phoneClean = preg_replace('/[^0-9]/', '', $r['phone']);
              if (substr($phoneClean, 0, 1) === '0') $phoneClean = '9' . $phoneClean;
            ?>
              <tr>
                <td>
                  <strong style="color:var(--color-terracotta);"><?php echo htmlspecialchars($r['ref_no'] ?? ($r['id'] ?? '-')); ?></strong><br />
                  <span style="font-size:0.75rem; color:var(--text-muted);"><?php echo htmlspecialchars($r['created_at'] ?? ($r['date'] ?? '-')); ?></span>
                </td>
                <td>
                  <strong style="font-size:0.95rem;"><?php echo htmlspecialchars($r['fullname']); ?></strong><br />
                  <span style="font-size:0.82rem; color:var(--text-muted);">📞 <?php echo htmlspecialchars($r['phone']); ?></span><br />
                  <?php if (!empty($r['email'])): ?>
                    <span style="font-size:0.8rem; color:var(--text-muted);">✉️ <?php echo htmlspecialchars($r['email']); ?></span>
                  <?php endif; ?>
                </td>
                <td>
                  <strong>Giriş:</strong> <?php echo htmlspecialchars($r['checkin']); ?><br />
                  <strong>Çıkış:</strong> <?php echo htmlspecialchars($r['checkout']); ?>
                </td>
                <td>
                  <span style="font-weight:600;"><?php echo htmlspecialchars($r['room_type'] ?? ($r['room'] ?? '-')); ?></span><br />
                  <span style="font-size:0.8rem; color:var(--text-muted);"><?php echo htmlspecialchars($r['guests']); ?></span>
                  <?php if (!empty($r['note'])): ?>
                    <p style="font-size:0.78rem; color:var(--color-terracotta); margin-top:4px; font-style:italic;">"<?php echo htmlspecialchars($r['note']); ?>"</p>
                  <?php endif; ?>
                </td>
                <td>
                  <span class="badge-status badge-<?php echo $st; ?>"><?php echo strtoupper($st); ?></span>
                  
                  <?php if (isset($r['id']) && is_numeric($r['id'])): ?>
                    <form method="POST" action="index.php" style="margin-top:6px;">
                      <input type="hidden" name="action" value="change_status" />
                      <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                      <select name="status" onchange="this.form.submit()" style="font-size:0.75rem; padding:3px 6px; border:1px solid var(--border-light); border-radius:4px; background:#fff;">
                        <option value="yeni" <?php echo $st === 'yeni' ? 'selected' : ''; ?>>Yeni</option>
                        <option value="onaylandi" <?php echo $st === 'onaylandi' ? 'selected' : ''; ?>>Onayla</option>
                        <option value="iptal" <?php echo $st === 'iptal' ? 'selected' : ''; ?>>İptal Et</option>
                        <option value="tamamlandi" <?php echo $st === 'tamamlandi' ? 'selected' : ''; ?>>Tamamla</option>
                      </select>
                    </form>
                  <?php endif; ?>
                </td>
                <td>
                  <div style="display:flex; gap:6px; flex-wrap:wrap;">
                    <a href="tel:<?php echo htmlspecialchars($r['phone']); ?>" class="btn-action call">📞 Ara</a>
                    <a href="https://wa.me/<?php echo $phoneClean; ?>?text=<?php echo urlencode('Merhaba ' . $r['fullname'] . ', Mare & Monte Hotel & Bistro rezervasyon talebiniz hakkında iletişime geçiyoruz.'); ?>" target="_blank" class="btn-action wa">💬 WhatsApp</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>

  </main>

</body>
</html>
