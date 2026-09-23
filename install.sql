-- =========================================================================
-- Mare & Monte Hotel & Bistro — Database Schema & Initial Data
-- Production Database: maresite
-- Altınoluk / Edremit / Kaz Dağları
-- =========================================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+03:00';

-- -------------------------------------------------------------------------
-- 1. Rezervasyonlar Tablosu (Reservations)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS 
ezervasyonlar (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  
ef_no VARCHAR(32) NOT NULL COMMENT 'Benzersiz Rezervasyon Kodu',
  ullname VARCHAR(150) NOT NULL COMMENT 'Misafir Ad Soyad',
  phone VARCHAR(50) NOT NULL COMMENT 'Telefon Numarası',
  email VARCHAR(150) DEFAULT NULL COMMENT 'E-posta Adresi',
  checkin DATE NOT NULL COMMENT 'Giriş Tarihi',
  checkout DATE NOT NULL COMMENT 'Çıkış Tarihi',
  guests VARCHAR(50) NOT NULL DEFAULT '2 Yetişkin' COMMENT 'Kişi Sayısı (+16)',
  
oom_type VARCHAR(150) NOT NULL DEFAULT 'Deniz Manzaralı Balkonlu Oda' COMMENT 'Oda Türü',
  
ote TEXT DEFAULT NULL COMMENT 'Özel Not & İstekler',
  status ENUM('yeni', 'onaylandi', 'iptal', 'tamamlandi') NOT NULL DEFAULT 'yeni' COMMENT 'Rezervasyon Durumu',
  ip_address VARCHAR(45) DEFAULT NULL COMMENT 'Talep IP Adresi',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma Zamanı',
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Güncellenme Zamanı',
  PRIMARY KEY (id),
  UNIQUE KEY idx_ref_no (
ef_no),
  KEY idx_checkin (checkin),
  KEY idx_status (status),
  KEY idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 2. İletişim Mesajları Tablosu (Contact Messages)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS iletisim_mesajlari (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  ullname VARCHAR(150) NOT NULL COMMENT 'Ad Soyad',
  phone VARCHAR(50) DEFAULT NULL COMMENT 'Telefon',
  email VARCHAR(150) NOT NULL COMMENT 'E-posta',
  subject VARCHAR(255) DEFAULT NULL COMMENT 'Konu',
  message TEXT NOT NULL COMMENT 'Mesaj Metni',
  is_read TINYINT(1) NOT NULL DEFAULT 0 COMMENT '0: Okunmadı, 1: Okundu',
  ip_address VARCHAR(45) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_is_read (is_read),
  KEY idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 3. Yönetici Kullanıcılar Tablosu (Admin Users)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS dmin_kullanicilar (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  kullanici_adi VARCHAR(50) NOT NULL,
  sifre_hash VARCHAR(255) NOT NULL,
  eposta VARCHAR(150) NOT NULL,
  d_soyad VARCHAR(150) NOT NULL,
  
ol VARCHAR(30) NOT NULL DEFAULT 'admin',
  son_giris DATETIME DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY idx_kullanici_adi (kullanici_adi)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- 4. Site Genel Ayarları (Site Settings)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS site_ayarlari (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  yar_anahtar VARCHAR(100) NOT NULL,
  yar_deger TEXT DEFAULT NULL,
  yar_aciklama VARCHAR(255) DEFAULT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY idx_ayar_anahtar (yar_anahtar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------------------
-- Varsayılan Veriler (Seed Data)
-- -------------------------------------------------------------------------

-- Varsayılan Admin Kullanıcısı: admin / Maremonte2026!
INSERT INTO dmin_kullanicilar (kullanici_adi, sifre_hash, eposta, d_soyad, 
ol) VALUES
('admin', '.eG7qL7KjUoZ5c5JjN8rF2O4eU9zM1Q2u', 'info@yenimaremonte.com', 'Mare & Monte Yönetim', 'superadmin')
ON DUPLICATE KEY UPDATE d_soyad = VALUES(d_soyad);

-- Varsayılan Site Ayarları
INSERT INTO site_ayarlari (yar_anahtar, yar_deger, yar_aciklama) VALUES
('site_title', 'Mare & Monte Hotel & Bistro', 'Site Ana Başlığı'),
('site_tagline', 'Altınoluk · Kaz Dağları · Denize Sıfır · +16 Adult Only', 'Site Sloganı'),
('phone_primary', '0542 414 38 94', 'Birincil Telefon / WhatsApp'),
('phone_secondary', '0266 396 17 30', 'İkincil Sabit Telefon'),
('email_contact', 'info@yenimaremonte.com', 'İletişim E-posta Adresi'),
('address', 'İskele Mahallesi Cevdet Sunay Caddesi No:15, Altınoluk / Edremit / Balıkesir', 'Açık Adres'),
('whatsapp_number', '905424143894', 'WhatsApp İletişim Numarası'),
('concept_adult', '+16 Yetişkin Oteli (Adult Only)', 'Konsept Notu'),
('total_rooms', '22', 'Yenilenmiş Toplam Oda Sayısı')
ON DUPLICATE KEY UPDATE yar_deger = VALUES(yar_deger);

SET FOREIGN_KEY_CHECKS = 1;
