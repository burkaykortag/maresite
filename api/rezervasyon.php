<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz istek metodu.']);
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$email    = trim($_POST['email'] ?? '');
$checkin  = trim($_POST['checkin'] ?? '');
$checkout = trim($_POST['checkout'] ?? '');
$guests   = trim($_POST['guests'] ?? '2 Yetişkin');
$room     = trim($_POST['room'] ?? 'Deniz Manzaralı Balkonlu Oda');
$note     = trim($_POST['note'] ?? '');

if (empty($fullname) || empty($phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Lütfen ad soyad ve telefon numaranızı doldurunuz.']);
    exit;
}

// Generate unique booking ref
$ref_no = 'MM-' . date('Y') . '-' . strtoupper(substr(uniqid(), -5));
$ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

// 1. Try saving to MySQL database
$db = getDB();
if ($db) {
    try {
        $stmt = $db->prepare("INSERT INTO `rezervasyonlar` 
            (`ref_no`, `fullname`, `phone`, `email`, `checkin`, `checkout`, `guests`, `room_type`, `note`, `ip_address`, `status`) 
            VALUES (:ref, :fullname, :phone, :email, :checkin, :checkout, :guests, :room, :note, :ip, 'yeni')");
        $stmt->execute([
            ':ref'      => $ref_no,
            ':fullname' => $fullname,
            ':phone'    => $phone,
            ':email'    => $email ?: null,
            ':checkin'  => $checkin ?: date('Y-m-d'),
            ':checkout' => $checkout ?: date('Y-m-d', strtotime('+1 day')),
            ':guests'   => $guests,
            ':room'     => $room,
            ':note'     => $note ?: null,
            ':ip'       => $ip
        ]);
    } catch (Exception $e) {
        error_log('DB Insert Reservation Error: ' . $e->getMessage());
    }
}

// 2. Backup to JSON
$log_dir = __DIR__ . '/../data';
if (!is_dir($log_dir)) {
    @mkdir($log_dir, 0777, true);
}

$inquiry = [
    'id'         => $ref_no,
    'date'       => date('Y-m-d H:i:s'),
    'fullname'   => htmlspecialchars($fullname),
    'phone'      => htmlspecialchars($phone),
    'email'      => htmlspecialchars($email),
    'checkin'    => htmlspecialchars($checkin),
    'checkout'   => htmlspecialchars($checkout),
    'guests'     => htmlspecialchars($guests),
    'room'       => htmlspecialchars($room),
    'note'       => htmlspecialchars($note),
    'ip'         => $ip
];

$file = $log_dir . '/rezervasyonlar.json';
$existing = [];
if (file_exists($file)) {
    $content = file_get_contents($file);
    $existing = json_decode($content, true) ?: [];
}
$existing[] = $inquiry;
@file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// 3. Build WhatsApp Direct Message
$msg = "🌟 *Yeni Rezervasyon Talebi (#{$ref_no})*

"
     . "👤 *Misafir:* {$fullname}
"
     . "📞 *Telefon:* {$phone}
"
     . "📧 *E-posta:* " . ($email ?: '-') . "
"
     . "📅 *Giriş:* {$checkin}
"
     . "📅 *Çıkış:* {$checkout}
"
     . "👥 *Kişi:* {$guests}
"
     . "🛏️ *Oda:* {$room}
"
     . "📝 *Not:* " . ($note ?: '-');

$whatsapp_url = "https://wa.me/" . WHATSAPP_NUMBER . "?text=" . urlencode($msg);

echo json_encode([
    'status' => 'success',
    'message' => 'Rezervasyon talebiniz başarıyla alındı.',
    'ref_no' => $ref_no,
    'whatsapp_url' => $whatsapp_url
]);
exit;
