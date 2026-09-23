<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek metodu.']);
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$email    = trim($_POST['email'] ?? '');
$checkin  = trim($_POST['checkin'] ?? '');
$checkout = trim($_POST['checkout'] ?? '');
$guests   = trim($_POST['guests'] ?? '2');
$room     = trim($_POST['room'] ?? 'Oda Belirtilmedi');
$note     = trim($_POST['note'] ?? '');

if (empty($fullname) || empty($phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Lütfen ad soyad ve telefon numaranızı doldurunuz.']);
    exit;
}

// Log inquiry locally
$log_dir = __DIR__ . '/../data';
if (!is_dir($log_dir)) {
    @mkdir($log_dir, 0777, true);
}

$inquiry = [
    'id'         => uniqid('res_'),
    'date'       => date('Y-m-d H:i:s'),
    'fullname'   => htmlspecialchars($fullname),
    'phone'      => htmlspecialchars($phone),
    'email'      => htmlspecialchars($email),
    'checkin'    => htmlspecialchars($checkin),
    'checkout'   => htmlspecialchars($checkout),
    'guests'     => htmlspecialchars($guests),
    'room'       => htmlspecialchars($room),
    'note'       => htmlspecialchars($note),
    'ip'         => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
];

$file = $log_dir . '/rezervasyonlar.json';
$existing = [];
if (file_exists($file)) {
    $content = file_get_contents($file);
    $existing = json_decode($content, true) ?: [];
}
$existing[] = $inquiry;
@file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Build WhatsApp Direct Message
$msg = "🌟 *Yeni Rezervasyon Talebi (Web Sitesi)*\n\n"
     . "👤 *Misafir:* {$fullname}\n"
     . "📞 *Telefon:* {$phone}\n"
     . "📧 *E-posta:* " . ($email ?: '-') . "\n"
     . "📅 *Giriş:* {$checkin}\n"
     . "📅 *Çıkış:* {$checkout}\n"
     . "👥 *Kişi:* {$guests}\n"
     . "🛏️ *Oda:* {$room}\n"
     . "📝 *Not:* " . ($note ?: '-');

$whatsapp_url = "https://wa.me/905424143894?text=" . urlencode($msg);

echo json_encode([
    'status' => 'success',
    'message' => 'Rezervasyon talebiniz başarıyla alındı.',
    'whatsapp_url' => $whatsapp_url
]);
exit;
