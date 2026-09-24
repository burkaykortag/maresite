-- =========================================================================
-- Mare & Monte Hotel & Bistro — Database Schema & Initial Data
-- Production Database: mareotel
-- Altınoluk / Edremit / Kaz Dağları
-- =========================================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+03:00';

-- -------------------------------------------------------------------------
-- 1. Rezervasyonlar Tablosu (Reservations)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezervasyonlar` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref_no` VARCHAR(32) NOT NULL COMMENT 'Benzersiz Rezervasyon Kodu',
  `fullname` VARCHAR(150) NOT NULL COMMENT 'Misafir Ad Soyad',
  `phone` VARCHAR(50) NOT NULL COMMENT 'Telefon Numarası',
  `email` VARCHAR(150) DEFAULT NULL COMMENT 'E-posta Adresi',
  `checkin` DATE NOT NULL COMMENT 'Giriş Tarihi',
  `checkout` DATE NOT NULL COMMENT 'Çıkış Tarihi',
  `guests` VARCHAR(50) NOT NULL DEFAULT '2 Yetişkin' COMMENT 'Kişi Sayısı (+16)',
  `room_type` VARCHAR(150) NOT NULL DEFAULT 'Deniz Manzaralı Balkonlu Oda' COMMENT 'Oda Türü',
  `note` TEXT DEFAULT NULL COMMENT 'Özel Not & İstekler',
  `status` ENUM('yeni', 'onaylandi', 'iptal', 'tamamlandi') NOT NULL DEFAULT 'yeni' COMMENT 'Rezervasyon Durumu',
  `ip_address` VARCHAR(45) DEFAULT NULL COMMENT 'Talep IP Adresi',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma Zamanı',
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Güncellenme Zamanı',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ref_no` (`ref_no`),
  KEY `idx_checkin` (`checkin`),
  KEY `idx_status` (`status`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 2. İletişim Mesajları Tablosu (Contact Messages)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `iletisim_mesajlari` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(150) NOT NULL COMMENT 'Ad Soyad',
  `phone` VARCHAR(50) DEFAULT NULL COMMENT 'Telefon',
  `email` VARCHAR(150) NOT NULL COMMENT 'E-posta',
  `subject` VARCHAR(255) DEFAULT NULL COMMENT 'Konu',
  `message` TEXT NOT NULL COMMENT 'Mesaj Metni',
  `is_read` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0: Okunmadı, 1: Okundu',
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_is_read` (`is_read`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 3. Yönetici Kullanıcılar Tablosu (Admin Users)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin_kullanicilar` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `kullanici_adi` VARCHAR(50) NOT NULL,
  `sifre_hash` VARCHAR(255) NOT NULL,
  `eposta` VARCHAR(150) NOT NULL,
  `ad_soyad` VARCHAR(150) NOT NULL,
  `rol` VARCHAR(30) NOT NULL DEFAULT 'admin',
  `son_giris` DATETIME DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_kullanici_adi` (`kullanici_adi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 4. Site Genel Ayarları (Site Settings)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `site_ayarlari` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ayar_anahtar` VARCHAR(100) NOT NULL,
  `ayar_deger` TEXT DEFAULT NULL,
  `ayar_aciklama` VARCHAR(255) DEFAULT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ayar_anahtar` (`ayar_anahtar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 5. Medya ve Görseller Tablosu (Media & Gallery)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `medyalar` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(255) NOT NULL,
  `filepath` VARCHAR(255) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(50) NOT NULL DEFAULT 'galeri',
  `is_hero` TINYINT(1) NOT NULL DEFAULT 0,
  `sort_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_category` (`category`),
  KEY `idx_hero` (`is_hero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- Varsayılan Veriler (Seed Data)
-- -------------------------------------------------------------------------

-- Varsayılan Admin Kullanıcısı: admin / admin
INSERT INTO `admin_kullanicilar` (`id`, `kullanici_adi`, `sifre_hash`, `eposta`, `ad_soyad`, `rol`) VALUES
(1, 'admin', '$2y$10$c6/xWtQIv0WGFYsTPJPyNuF.kWuKT2PjwF9QJ3g8/2RzajPS4ZbCi', 'info@yenimaremonte.com', 'Mare & Monte Yönetim', 'superadmin')
ON DUPLICATE KEY UPDATE `sifre_hash` = VALUES(`sifre_hash`), `ad_soyad` = VALUES(`ad_soyad`);

-- Varsayılan Site Ayarları
INSERT INTO `site_ayarlari` (`ayar_anahtar`, `ayar_deger`, `ayar_aciklama`) VALUES
('site_title', 'Mare & Monte Hotel & Bistro', 'Site Ana Başlığı'),
('site_tagline', 'Altınoluk · Kaz Dağları · Denize Sıfır · +16 Adult Only', 'Site Sloganı'),
('phone_primary', '0542 414 38 94', 'Birincil Telefon / WhatsApp'),
('phone_secondary', '0266 396 17 30', 'İkincil Sabit Telefon'),
('email_contact', 'info@yenimaremonte.com', 'İletişim E-posta Adresi'),
('address', 'İskele Mahallesi Cevdet Sunay Caddesi No:15, Altınoluk / Edremit / Balıkesir', 'Açık Adres'),
('whatsapp_number', '905424143894', 'WhatsApp İletişim Numarası'),
('concept_adult', '+16 Yetişkin Oteli (Adult Only)', 'Konsept Notu'),
('total_rooms', '22', 'Yenilenmiş Toplam Oda Sayısı')
ON DUPLICATE KEY UPDATE `ayar_deger` = VALUES(`ayar_deger`);

SET FOREIGN_KEY_CHECKS = 1;
