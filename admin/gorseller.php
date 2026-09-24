<?php
/**
 * Mare & Monte Hotel & Bistro — Admin Media & Image Management
 */
session_start();
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/media-helper.php';

if (!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] !== true) {
    header('Location: login.php');
    exit;
}

$db = getDB();
$message = '';
$msgType = 'success';

$uploadDir = __DIR__ . '/../uploads/';
if (!is_dir($uploadDir)) {
    @mkdir($uploadDir, 0777, true);
}

// Handle Form Submission: Upload Images
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'upload') {
        $category = trim($_POST['category'] ?? 'galeri');
        $title    = trim($_POST['title'] ?? '');
        $isHero   = isset($_POST['is_hero']) ? 1 : 0;

        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
            $uploadCount = 0;

            $fileCount = count($_FILES['images']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $origName = $_FILES['images']['name'][$i];
                $tmpName  = $_FILES['images']['tmp_name'][$i];
                $error    = $_FILES['images']['error'][$i];
                $size     = $_FILES['images']['size'][$i];

                if ($error !== UPLOAD_ERR_OK || empty($tmpName)) {
                    continue;
                }

                $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
                if (!in_array($ext, $allowedExts)) {
                    continue;
                }

                // Check MIME type
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime  = finfo_file($finfo, $tmpName);
                finfo_close($finfo);

                if (!in_array($mime, $allowedMimes)) {
                    continue;
                }

                // Generate clean, unique filename
                $newFilename = 'mm_' . date('Ymd_His') . '_' . substr(md5(uniqid()), 0, 6) . '.' . $ext;
                $targetFile  = $uploadDir . $newFilename;
                $publicPath  = 'uploads/' . $newFilename;

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $itemTitle = !empty($title) ? $title : pathinfo($origName, PATHINFO_FILENAME);
                    
                    // 1. Save to DB if available
                    if ($db) {
                        try {
                            $stmt = $db->prepare("INSERT INTO `medyalar` 
                                (`filename`, `filepath`, `title`, `category`, `is_hero`) 
                                VALUES (:fn, :fp, :title, :cat, :hero)");
                            $stmt->execute([
                                ':fn'    => $newFilename,
                                ':fp'    => $publicPath,
                                ':title' => $itemTitle,
                                ':cat'   => $category,
                                ':hero'  => $isHero
                            ]);
                        } catch (Exception $e) {
                            error_log('Media DB Insert Error: ' . $e->getMessage());
                        }
                    }

                    // 2. Backup to JSON
                    $jsonFile = __DIR__ . '/../data/medyalar.json';
                    $existing = [];
                    if (file_exists($jsonFile)) {
                        $existing = json_decode(file_get_contents($jsonFile), true) ?: [];
                    }
                    $existing[] = [
                        'id'         => time() . '_' . $uploadCount,
                        'filename'   => $newFilename,
                        'filepath'   => $publicPath,
                        'title'      => $itemTitle,
                        'category'   => $category,
                        'is_hero'    => $isHero,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    @file_put_contents($jsonFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

                    $uploadCount++;
                }
            }

            if ($uploadCount > 0) {
                $message = "{$uploadCount} adet görsel başarıyla yüklendi.";
            } else {
                $message = "Görsel yüklenemedi. Lütfen geçerli bir resim formatı (JPG, PNG, WebP) seçtiğinizden emin olun.";
                $msgType = 'error';
            }
        } else {
            $message = "Lütfen yüklenecek bir veya birden fazla görsel seçiniz.";
            $msgType = 'error';
        }
    } elseif ($action === 'toggle_hero') {
        $mediaId = intval($_POST['id'] ?? 0);
        $currentHero = intval($_POST['current_hero'] ?? 0);
        $newHero = $currentHero ? 0 : 1;

        if ($db && $mediaId > 0) {
            try {
                $stmt = $db->prepare("UPDATE `medyalar` SET `is_hero` = :hero WHERE `id` = :id");
                $stmt->execute([':hero' => $newHero, ':id' => $mediaId]);
                $message = $newHero ? "Görsel Hero Slider'a eklendi." : "Görsel Hero Slider'dan çıkarıldı.";
            } catch (Exception $e) {
                $message = "Hata: " . $e->getMessage();
                $msgType = 'error';
            }
        }
    } elseif ($action === 'delete') {
        $mediaId = intval($_POST['id'] ?? 0);
        $filePath = trim($_POST['filepath'] ?? '');

        if ($db && $mediaId > 0) {
            try {
                $stmt = $db->prepare("SELECT * FROM `medyalar` WHERE `id` = :id LIMIT 1");
                $stmt->execute([':id' => $mediaId]);
                $item = $stmt->fetch();
                if ($item) {
                    $fileFullPath = __DIR__ . '/../' . $item['filepath'];
                    if (file_exists($fileFullPath) && strpos($item['filepath'], 'uploads/') === 0) {
                        @unlink($fileFullPath);
                    }
                    $delStmt = $db->prepare("DELETE FROM `medyalar` WHERE `id` = :id");
                    $delStmt->execute([':id' => $mediaId]);
                    $message = "Görsel başarıyla silindi.";
                }
            } catch (Exception $e) {
                $message = "Hata: " . $e->getMessage();
                $msgType = 'error';
            }
        }
    }
}

// Fetch all media
$categoryFilter = trim($_GET['cat'] ?? 'all');
$mediaList = get_site_media($categoryFilter);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Görsel & Medya Yönetimi | Mare & Monte Hotel</title>
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
    .admin-nav-links {
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .admin-nav-link {
      color: rgba(255, 255, 255, 0.75);
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      padding: 6px 0;
      position: relative;
    }
    .admin-nav-link.active,
    .admin-nav-link:hover {
      color: var(--color-gold);
    }
    .admin-container {
      max-width: 1320px;
      margin: 30px auto;
      padding: 0 20px;
    }
    .media-layout {
      display: grid;
      grid-template-columns: 360px 1fr;
      gap: 28px;
      align-items: flex-start;
    }
    .card-panel {
      background: var(--color-warm-card);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-subtle);
      border: 1px solid var(--border-light);
      padding: 28px;
    }
    .dropzone {
      border: 2px dashed var(--color-terracotta);
      background: rgba(184, 115, 72, 0.04);
      border-radius: var(--radius-md);
      padding: 30px 20px;
      text-align: center;
      cursor: pointer;
      transition: var(--transition);
      margin-bottom: 20px;
    }
    .dropzone:hover {
      background: rgba(184, 115, 72, 0.08);
      border-color: var(--color-gold);
    }
    .dropzone input {
      display: none;
    }
    .media-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
    }
    .media-card {
      background: var(--color-warm-card);
      border-radius: var(--radius-md);
      border: 1px solid var(--border-light);
      overflow: hidden;
      box-shadow: var(--shadow-subtle);
      transition: var(--transition);
      display: flex;
      flex-direction: column;
    }
    .media-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-warm);
      border-color: var(--color-terracotta);
    }
    .media-thumb-wrap {
      height: 170px;
      position: relative;
      overflow: hidden;
      background: #181513;
    }
    .media-thumb {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .media-badge-hero {
      position: absolute;
      top: 10px;
      right: 10px;
      background: var(--color-terracotta);
      color: #fff;
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 3px 8px;
      border-radius: var(--radius-full);
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .media-info {
      padding: 14px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .media-title {
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-dark);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 4px;
    }
    .media-meta {
      font-size: 0.75rem;
      color: var(--text-muted);
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .media-actions {
      margin-top: auto;
      display: flex;
      align-items: center;
      gap: 8px;
      border-top: 1px solid var(--border-light);
      padding-top: 10px;
    }
    .btn-xs {
      padding: 6px 10px;
      font-size: 0.72rem;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .btn-xs.hero-toggle {
      background: var(--color-warm-surface);
      color: var(--text-dark);
      border: 1px solid var(--border-light);
    }
    .btn-xs.hero-toggle.active {
      background: #FEF3C7;
      color: #92400E;
      border-color: #FCD34D;
    }
    .btn-xs.delete {
      background: #FEE2E2;
      color: #991B1B;
      margin-left: auto;
    }
    .filter-pills {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 24px;
    }
    .filter-pill {
      padding: 7px 16px;
      border-radius: var(--radius-full);
      background: var(--color-warm-card);
      color: var(--text-body);
      font-size: 0.8rem;
      font-weight: 600;
      border: 1px solid var(--border-light);
      text-decoration: none;
      transition: var(--transition);
    }
    .filter-pill.active,
    .filter-pill:hover {
      background: var(--color-dark);
      color: #fff;
      border-color: var(--color-dark);
    }
    @media (max-width: 992px) {
      .media-layout { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <header class="admin-navbar">
    <div style="display:flex; align-items:center; gap:20px;">
      <span class="brand-logo-text" style="font-size:1.4rem; color:#FFFFFF;">MARE <span style="color:var(--color-gold); font-style:italic;">&</span> MONTE</span>
      
      <nav class="admin-nav-links">
        <a href="index.php" class="admin-nav-link">📋 Rezervasyonlar</a>
        <a href="gorseller.php" class="admin-nav-link active">🖼️ Görseller & Hero Slider</a>
      </nav>
    </div>

    <div style="display:flex; align-items:center; gap:14px; font-size:0.85rem;">
      <a href="../index.php" target="_blank" style="color:var(--color-gold); font-weight:600;">Siteyi Gör ↗</a>
      <a href="logout.php" style="color:#FF7B7B; font-weight:600;">Çıkış</a>
    </div>
  </header>

  <main class="admin-container">

    <?php if (!empty($message)): ?>
      <div style="padding:14px 18px; border-radius:8px; margin-bottom:20px; font-size:0.9rem; background:<?php echo $msgType === 'success' ? '#E6F4EA; color:#155724;' : '#FCE8E6; color:#721C24;'; ?>">
        <?php echo htmlspecialchars($message); ?>
      </div>
    <?php endif; ?>

    <div class="media-layout">

      <!-- Upload Form Column -->
      <div class="card-panel">
        <h3 style="font-family:var(--font-serif); font-size:1.5rem; margin-bottom:16px;">
          Yeni Görsel Yükle
        </h3>

        <form method="POST" action="gorseller.php" enctype="multipart/form-data">
          <input type="hidden" name="action" value="upload" />

          <div class="dropzone" onclick="document.getElementById('file-input').click()">
            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="color:var(--color-terracotta); margin-bottom:8px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
            <div style="font-weight:700; font-size:0.92rem; color:var(--text-dark);">Fotoğraf Seçin veya Sürükleyin</div>
            <div style="font-size:0.75rem; color:var(--text-muted); margin-top:4px;">JPG, PNG, WebP (Çoklu seçim desteklenir)</div>
            <input type="file" id="file-input" name="images[]" multiple accept="image/*" onchange="updateFilePreview(this)" required />
            <div id="file-count" style="margin-top:8px; font-size:0.8rem; color:var(--color-terracotta); font-weight:600;"></div>
          </div>

          <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.78rem; font-weight:700; text-transform:uppercase; color:var(--color-terracotta); margin-bottom:6px;">Kategori Seçimi</label>
            <select name="category" class="form-control" style="width:100%; padding:10px; font-size:0.9rem;">
              <option value="hero">🌅 Hero Slider (Ana Sayfa Tepe)</option>
              <option value="odalar">🛏️ Odalar & Konaklama</option>
              <option value="bistro">🍷 Çınar Bistro & Bar</option>
              <option value="plaj">🏖️ Özel Plaj & Deniz</option>
              <option value="kesfet">⛰️ Kaz Dağları & Rotalar</option>
              <option value="galeri" selected>📸 Genel Fotoğraf Galerisi</option>
            </select>
          </div>

          <div class="form-group" style="margin-bottom:16px;">
            <label style="display:block; font-size:0.78rem; font-weight:700; text-transform:uppercase; color:var(--color-terracotta); margin-bottom:6px;">Görsel Başlığı / Açıklaması</label>
            <input type="text" name="title" class="form-control" style="width:100%; padding:10px; font-size:0.9rem;" placeholder="Örn: Deniz Manzaralı Teras Keyfi" />
          </div>

          <div style="margin-bottom:24px; display:flex; align-items:center; gap:8px;">
            <input type="checkbox" id="is_hero" name="is_hero" value="1" style="width:18px; height:18px; cursor:pointer;" />
            <label for="is_hero" style="font-size:0.85rem; font-weight:600; cursor:pointer;">
              🌟 Bu görseli Ana Sayfa Hero Slider'da göster
            </label>
          </div>

          <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; min-height:48px;">
            Görselleri Yükle
          </button>
        </form>
      </div>

      <!-- Media Gallery Column -->
      <div>
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; flex-wrap:wrap; gap:12px;">
          <h3 style="font-family:var(--font-serif); font-size:1.6rem;">
            Yüklü Görseller (<?php echo count($mediaList); ?>)
          </h3>

          <!-- Filter Pills -->
          <div class="filter-pills">
            <a href="gorseller.php?cat=all" class="filter-pill <?php echo $categoryFilter === 'all' ? 'active' : ''; ?>">Tümü</a>
            <a href="gorseller.php?cat=hero" class="filter-pill <?php echo $categoryFilter === 'hero' ? 'active' : ''; ?>">🌅 Hero Slider</a>
            <a href="gorseller.php?cat=odalar" class="filter-pill <?php echo $categoryFilter === 'odalar' ? 'active' : ''; ?>">Odalar</a>
            <a href="gorseller.php?cat=bistro" class="filter-pill <?php echo $categoryFilter === 'bistro' ? 'active' : ''; ?>">Bistro</a>
            <a href="gorseller.php?cat=plaj" class="filter-pill <?php echo $categoryFilter === 'plaj' ? 'active' : ''; ?>">Plaj</a>
            <a href="gorseller.php?cat=galeri" class="filter-pill <?php echo $categoryFilter === 'galeri' ? 'active' : ''; ?>">Galeri</a>
          </div>
        </div>

        <?php if (empty($mediaList)): ?>
          <div class="card-panel" style="text-align:center; padding:50px 20px; color:var(--text-muted);">
            Bu kategoride henüz yüklenmiş özel bir görsel bulunmuyor. Soldaki panelden yeni görseller yükleyebilirsiniz.
          </div>
        <?php else: ?>
          <div class="media-grid">
            <?php foreach ($mediaList as $item): 
              $isH = !empty($item['is_hero']);
              $imgPath = '../' . $item['filepath'];
            ?>
              <div class="media-card">
                <div class="media-thumb-wrap">
                  <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? ''); ?>" class="media-thumb" loading="lazy" />
                  <?php if ($isH): ?>
                    <span class="media-badge-hero">HERO SLIDER</span>
                  <?php endif; ?>
                </div>

                <div class="media-info">
                  <div class="media-title" title="<?php echo htmlspecialchars($item['title'] ?? ''); ?>">
                    <?php echo htmlspecialchars($item['title'] ?? 'Görsel'); ?>
                  </div>
                  <div class="media-meta">
                    <span>📁 <?php echo strtoupper(htmlspecialchars($item['category'] ?? 'galeri')); ?></span>
                    <span><?php echo substr($item['created_at'] ?? '', 0, 10); ?></span>
                  </div>

                  <div class="media-actions">
                    <form method="POST" action="gorseller.php">
                      <input type="hidden" name="action" value="toggle_hero" />
                      <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                      <input type="hidden" name="current_hero" value="<?php echo $isH ? 1 : 0; ?>" />
                      <button type="submit" class="btn-xs hero-toggle <?php echo $isH ? 'active' : ''; ?>" title="Hero Slider Durumunu Değiştir">
                        <?php echo $isH ? '★ Hero Aktif' : '☆ Hero Yap'; ?>
                      </button>
                    </form>

                    <form method="POST" action="gorseller.php" onsubmit="return confirm('Bu görseli silmek istediğinizden emin misiniz?');">
                      <input type="hidden" name="action" value="delete" />
                      <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                      <input type="hidden" name="filepath" value="<?php echo htmlspecialchars($item['filepath']); ?>" />
                      <button type="submit" class="btn-xs delete">🗑️ Sil</button>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

    </div>

  </main>

  <script>
    function updateFilePreview(input) {
      const countEl = document.getElementById('file-count');
      if (input.files && input.files.length > 0) {
        countEl.textContent = input.files.length + ' dosya seçildi';
      } else {
        countEl.textContent = '';
      }
    }
  </script>

</body>
</html>
