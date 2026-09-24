-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: maremonte
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amenities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL DEFAULT 'check',
  `category` varchar(50) NOT NULL DEFAULT 'Oda',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities`
--

LOCK TABLES `amenities` WRITE;
/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;
INSERT INTO `amenities` VALUES (1,'Klima','wind','Konfor',1,'2026-09-24 11:27:50'),(2,'LCD / Uydu TV','tv','Medya',2,'2026-09-24 11:27:50'),(3,'Minibar','coffee','Konfor',3,'2026-09-24 11:27:50'),(4,'Özel Banyo & WC','shower','Banyo',4,'2026-09-24 11:27:50'),(5,'Saç Kurutma Makinesi','wind','Banyo',5,'2026-09-24 11:27:50'),(6,'Lüks Havlu Seti','package','Banyo',6,'2026-09-24 11:27:50'),(7,'Ücretsiz Yüksek Hızlı Wi-Fi','wifi','Medya',7,'2026-09-24 11:27:50'),(8,'Ek Yatak Seçeneği','bed','Konfor',8,'2026-09-24 11:27:50'),(9,'Elektronik Çelik Kasa','lock','Güvenlik',9,'2026-09-24 11:27:50'),(10,'Özel Balkon','sun','Manzara',10,'2026-09-24 11:27:50'),(11,'Ege & Midilli Manzarası','eye','Manzara',11,'2026-09-24 11:27:50'),(12,'Kaz Dağları Esintisi','compass','Manzara',12,'2026-09-24 11:27:50'),(13,'Çay / Kahve İkram Seti','cup','İkram',13,'2026-09-24 11:27:50'),(14,'Doğal Buklet Ürünleri','droplet','Banyo',14,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `entity_type` varchar(100) DEFAULT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `old_values` longtext DEFAULT NULL,
  `new_values` longtext DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_audit_user` (`user_id`),
  KEY `idx_audit_action` (`action`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logs`
--

LOCK TABLES `audit_logs` WRITE;
/*!40000 ALTER TABLE `audit_logs` DISABLE KEYS */;
INSERT INTO `audit_logs` VALUES (1,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:49:24'),(2,1,'redirect_create','redirects',1,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-9132\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:49:24'),(3,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:49:24'),(4,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:49:55'),(5,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:51:04'),(6,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:51:38'),(7,1,'redirect_create','redirects',2,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-8173\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:51:39'),(8,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:51:39'),(9,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 11:51:41'),(10,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:04:18'),(11,1,'redirect_create','redirects',3,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-4877\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:04:18'),(12,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:04:18'),(13,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:04:21'),(14,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:07:00'),(15,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:07:23'),(16,1,'redirect_create','redirects',4,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-7795\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:07:23'),(17,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:07:23'),(18,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:07:25'),(19,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin\"}','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36','2026-09-24 13:10:01'),(20,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:23:37'),(21,1,'redirect_create','redirects',5,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-4936\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:23:37'),(22,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:23:37'),(23,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:23:40'),(24,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:25:03'),(25,1,'redirect_create','redirects',6,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-9370\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:25:03'),(26,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:25:03'),(27,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:25:05'),(28,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:33:36'),(29,1,'redirect_create','redirects',7,NULL,'{\"old_url\":\"\\/eski-test-sayfasi-4323\",\"new_url\":\"\\/odalar\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:33:36'),(30,1,'admin_logout','users',1,NULL,NULL,'::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:33:36'),(31,1,'admin_login','users',1,NULL,'{\"email\":\"admin@maremonte.com.tr\",\"input\":\"admin@maremonte.com.tr\"}','::1','MareMonteAutomatedTestSuite/1.0','2026-09-24 13:33:38');
/*!40000 ALTER TABLE `audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bistro_categories`
--

DROP TABLE IF EXISTS `bistro_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bistro_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bistro_categories`
--

LOCK TABLES `bistro_categories` WRITE;
/*!40000 ALTER TABLE `bistro_categories` DISABLE KEYS */;
INSERT INTO `bistro_categories` VALUES (1,'Başlangıçlar & Ege Mezeleri','baslangiclar-ve-ege-mezeleri','Kuzey Ege zeytinyağı, yabani Kaz Dağları otları ve taze çiftlik peynirleriyle hazırlanan soğuk seçkiler.',1,1,'2026-09-24 11:27:50'),(2,'Körfezden Günlük Balık','korfezden-gunluk-balik','Edremit Körfezi balıkçılarından günlük temin edilen, odun ateşinde ve ızgarada sade lezzetler.',2,1,'2026-09-24 11:27:50'),(3,'Deniz Ürünleri & Sıcak Başlangıçlar','deniz-urunleri-sicak-baslangiclar','Kalamar, ahtapot, karides ve Ege baharatlarıyla hazırlanan imza sıcak tabaklar.',3,1,'2026-09-24 11:27:50'),(4,'Şefin Tabakları & Et Seçenekleri','sefin-tabaklari-ve-et','Özenle dinlendirilmiş etler, ev yapımı taze makarnalar ve mevsimlik Ege garnitürleri.',4,1,'2026-09-24 11:27:50'),(5,'Bistro Tatlıları','bistro-tatlilari','Ege dağ inciri, Kaz Dağları kekiği ve çikolatanın buluştuğu özel son dokunuşlar.',5,1,'2026-09-24 11:27:50'),(6,'Şarap Kavı & Tadım','sarap-kavi-ve-tadim','Yerli butik bağlardan ve uluslararası bölgelerden özenle seçilmiş şarap koleksiyonu.',6,1,'2026-09-24 11:27:50'),(7,'İmza Kokteyller & İçecekler','imza-kokteyller','Mevsim meyveleri, taze Ege nanesi ve botanik özlerle hazırlanan el yapımı kokteyller.',7,1,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `bistro_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bistro_items`
--

DROP TABLE IF EXISTS `bistro_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bistro_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image_path` varchar(255) DEFAULT NULL,
  `allergens` varchar(255) DEFAULT NULL,
  `is_vegetarian` tinyint(1) NOT NULL DEFAULT 0,
  `is_vegan` tinyint(1) NOT NULL DEFAULT 0,
  `is_gluten_free` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_bistro_cat_sort` (`category_id`,`sort_order`,`is_active`),
  CONSTRAINT `fk_bistro_items_cat` FOREIGN KEY (`category_id`) REFERENCES `bistro_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bistro_items`
--

LOCK TABLES `bistro_items` WRITE;
/*!40000 ALTER TABLE `bistro_items` DISABLE KEYS */;
INSERT INTO `bistro_items` VALUES (1,1,'Cunda Usulü Girit Ezmesi','Ezine keçi peyniri, dövülmüş ceviz içi, Kaz Dağları kekiği ve soğuk sıkım erken hasat zeytinyağı.',280.00,'/uploads/bistro/gastronomy-aegean.jpg','Süt ürünü, Ceviz',1,0,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,1,'Ilık Kaz Dağları Yabani Ot Tabağı','Mevsimine göre radika, şevketibostan, cibes; sarımsaklı zeytinyağı sosu ve çıtır badem ile.',310.00,'/uploads/bistro/gastronomy-aegean.jpg','Kuruyemiş (Badem)',1,1,1,1,1,2,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,1,'Zeytinyağlı Enginar Kalbi','Taze bakla püresi, dereotu ve turunç sosu eşliğinde dinlendirilmiş sakız enginarı.',290.00,'/uploads/bistro/gastronomy-aegean.jpg','',1,1,1,0,1,3,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,2,'Izgara Körfez Levreği','Taze Ege levreği, kaya koruğu salatası, fırınlanmış bebek patates ve limon-zeytinyağı emülsiyonu.',650.00,'/uploads/bistro/gastronomy-fish.jpg','Balık',0,0,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(5,2,'Tavada Taş Barbun','Günlük Körfez barbun balığı, hafif unlama ile tavalanmış, Ege yeşillikleri ve kırmızı soğan piyazı ile.',720.00,'/uploads/bistro/gastronomy-fish.jpg','Balık, Gluten',0,0,0,1,1,2,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(6,3,'Tahinli & Fıstıklı Ahtapot Izgara','Kömür ateşinde dinlendirilmiş ahtapot kolu, tütsülü fava yatağında, fıstıklı tereyağı gezdirilmiş.',680.00,'/uploads/bistro/gastronomy-fish.jpg','Deniz ürünü, Süt, Fıstık',0,0,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(7,3,'Güveçte Tereyağlı Çimçim Karides','Sarımsak, pul biber, taze domates konkase ve Edremit dağ kekiği ile cızırdayan güveç lezzeti.',540.00,'/uploads/bistro/gastronomy-fish.jpg','Kabuklu deniz ürünü, Süt',0,0,1,0,1,2,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(8,4,'Bistro Izgara Dana Bonfile','Kaz Dağları kekiği ile marine edilmiş 200gr bonfile, trüflü kök kereviz püresi ve biberiye sosu ile.',840.00,'/assets/images/gastronomy-wine.jpg','Süt ürünü',0,0,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(9,5,'Fırınlanmış İncirli & Cevizli Mascarpone','Kuzey Ege kuru incirleri, bal karameli ve ceviz krokant ile servis edilen hafif tatlı.',260.00,'/assets/images/story.jpg','Süt, Ceviz',1,0,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(10,6,'Körfez Seçkisi Rezerve Kırmızı (Kadeh)','Kaz Dağları eteklerindeki yerel bağlardan Cabernet Sauvignon & Merlot kupajı.',320.00,'/uploads/bistro/gastronomy-wine.jpg','Sülfit',1,1,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(11,7,'Mare & Monte Sunset (İmza Kokteyl)','Mürver çiçeği likörü, Ege turunç suyu, cin, prosecco ve taze fesleğen yaprakları.',380.00,'/assets/images/beach.jpg','',1,1,1,1,1,1,'2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `bistro_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'Altınoluk Rehberi','altinoluk-rehberi','Altınoluk gezilecek yerler, plajlar, koylar ve yerel yaşam ipuçları.','2026-09-24 11:27:50'),(2,'Kaz Dağları & Doğa','kaz-daglari-ve-doga','Kaz Dağları trekking rotaları, şelaleler, kanyonlar ve temiz hava keşifleri.','2026-09-24 11:27:50'),(3,'Tarih & Mitoloji','tarih-ve-mitoloji','Antandros, Troya, Aeneas efsaneleri ve Kuzey Ege’nin bin yıllık taş mirası.','2026-09-24 11:27:50'),(4,'Ege Gastronomisi','ege-gastronomisi','Kuzey Ege zeytinyağı kültürü, yabani otlar, günlük balıklar ve şarap tadımı.','2026-09-24 11:27:50'),(5,'Butik Tatil Deneyimi','butik-tatil-deneyimi','+16 yetişkin tatili, romantik kaçamaklar, kış tatili ve Ege dinginliği.','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post_tags`
--

DROP TABLE IF EXISTS `blog_post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post_tags` (
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `fk_bpt_tag` (`tag_id`),
  CONSTRAINT `fk_bpt_post` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_bpt_tag` FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post_tags`
--

LOCK TABLES `blog_post_tags` WRITE;
/*!40000 ALTER TABLE `blog_post_tags` DISABLE KEYS */;
INSERT INTO `blog_post_tags` VALUES (1,1),(1,3),(1,4),(2,1),(2,2),(2,5),(3,1),(3,4),(3,11),(4,1),(4,3),(4,12),(5,1),(5,3),(5,4),(5,11),(6,1),(6,2),(6,9),(7,2),(7,7),(7,9),(8,1),(8,5),(9,2),(9,5),(10,1),(10,2),(10,9),(11,8),(11,10),(12,2),(12,8),(13,2),(14,1),(14,2),(14,9),(15,1),(15,2),(16,1),(16,2),(17,1),(17,4),(17,10),(18,1),(19,1),(20,1),(21,1),(22,1),(22,2),(22,3),(23,1),(23,2),(23,8),(24,1),(24,6),(24,10),(25,1),(25,4),(25,11),(26,1),(26,3),(26,12),(27,1),(27,3),(27,11),(28,1),(28,3),(28,4),(29,1),(29,3),(29,11),(30,1),(30,2),(30,9);
/*!40000 ALTER TABLE `blog_post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `author_name` varchar(100) NOT NULL DEFAULT 'Mare & Monte Editör',
  `read_time_minutes` tinyint(3) unsigned NOT NULL DEFAULT 6,
  `focus_topic` varchar(100) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `views_count` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_blog_slug` (`slug`),
  KEY `idx_blog_published` (`is_published`,`published_at`),
  KEY `fk_blog_posts_cat` (`category_id`),
  CONSTRAINT `fk_blog_posts_cat` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,1,'Altınoluk Gezi Rehberi: Kuzey Ege\'de Tatil İçin Bilmeniz Gerekenler','altinoluk-gezi-rehberi','Altınoluk, Balıkesir’in Edremit ilçesine bağlı, sırtını efsanevi Kaz Dağları’na yaslayan ve yüzünü Edremit Körfezi’nin masmavi sularına dönen benzersiz bir Kuzey Ege beldesidir. An...','<h2>Kuzey Ege’nin İncisi: Altınoluk’a Genel Bakış</h2>\n<p>Altınoluk, Balıkesir’in Edremit ilçesine bağlı, sırtını efsanevi Kaz Dağları’na yaslayan ve yüzünü Edremit Körfezi’nin masmavi sularına dönen benzersiz bir Kuzey Ege beldesidir. Antik çağlardan bu yana yerleşimin sürdüğü bu özel coğrafya, hem zengin bitki örtüsü hem de deniz meltemiyle harmanlanan hava koridoru sayesinde dört mevsim ziyaretçilerine tazelik sunar. Şehrin karmaşasından, kalabalık tatil beldelerinin gürültüsünden uzaklaşmak isteyenler için Altınoluk; taş sokakları, asırlık çınarları, taze deniz ürünleri ve dingin sahiliyle zamansız bir tatil vadeder.</p>\n<h2>Altınoluk’a Ne Zaman Gidilmeli? İklim ve Sezon Özellikleri</h2>\n<p>Altınoluk, klasik bir yaz tatil beldesinin çok ötesinde, 12 ay yaşayan bir karaktere sahiptir. Haziran, Temmuz ve Ağustos ayları; denize sıfır plajların, serin Ege sularının ve akşamları esen hafif dağ rüzgârının tadını çıkarmak isteyenler için zirve dönemidir. Körfez suyunun serinletici ve berrak yapısı, bunaltıcı yaz sıcaklarında bile ferah bir yüzme deneyimi sunar. Ancak Eylül ve Ekim ayları, \"sarı yaz\" olarak tabir edilen ve dinginliğin en üst seviyeye ulaştığı dönemdir. Deniz suyu sıcaklığını korurken sahil tenhalaşır, zeytin hasadı hazırlıkları başlar. İlkbaharda doğanın uyanışına tanıklık etmek, kış aylarında ise şömine başında Kaz Dağları manzarasını izlemek Altınoluk’u yıl boyu cazip kılar.</p>\n<h2>Altınoluk’ta Mutlaka Görülmesi Gereken Yerler</h2>\n<p>Altınoluk merkezinde ve çevresinde keşfedilmeyi bekleyen çok sayıda doğal ve tarihi miras bulunur:</p>\n<ul>\n  <li><strong>Tarihi Altınoluk Köyü (Eski Köy):</strong> Yamaçta yer alan eski Rum taş evleri, restore edilmiş konaklar ve Körfez’e tepeden bakan panoramik kahveleriyle mutlaka görülmelidir.</li>\n  <li><strong>Antandros Antik Kenti:</strong> Troya Savaşı’nın mitolojik kahramanı Aeneas’ın gemilerini inşa ettiği liman kenti. Roma villaları ve görkemli mozaikleriyle büyüleyicidir.</li>\n  <li><strong>Şahindere Kanyonu:</strong> Kaz Dağları Milli Parkı sınırlarında yer alan, dağdan gelen serin hava akımının kaynağı olan muazzam bir kanyon rotasıdır.</li>\n  <li><strong>Altınoluk Sahil Kordonu & İskele:</strong> Akşam yürüyüşleri, taze deniz ürünleri ve gün batımı manzarası için mükemmel bir atmosfer sunar.</li>\n  <li><strong>Asırlık Çınar Altı Kahveleri:</strong> Yüzyıllık ulu ağaçların serin gölgesinde yerel adaçayı veya Türk kahvesi molası vermek Altınoluk geleneğidir.</li>\n</ul>\n<h2>Altınoluk’ta Konaklama Tercihi: Butik ve Denize Sıfır Deneyim</h2>\n<p>Bölgede tatil yaparken konaklama yerinin konumu, seyahatinizin tüm ruhunu belirler. Büyük ve kalabalık resort oteller yerine, kişiye özel hizmet sunan, denizle doğrudan temas kurabilen butik oteller tercih edilmelidir. Özellikle yetişkin konsepti (+16 Adult) benimseyen tesisler, çocuksuz ve dingin bir tatil hayali kuran çiftler ile huzur arayan gezginler için sessiz bir vaha sunar. Mare & Monte Hotel & Bistro, 1985 yılından bu yana süregelen köklü geçmişi ve 2026 yılındaki kapsamlı yenilenmesiyle, denize sıfır konumu ve 450 m²’lik çınar bahçesiyle bu arayışın en seçkin adresidir.</p>\n<h2>Gastronomi: Altınoluk’ta Ne Yenir?</h2>\n<p>Kuzey Ege mutfağı, dünyanın en sağlıklı ve lezzetli gastronomi geleneklerinden biridir. Altınoluk’ta sofra kültürü üç temel direk üzerine oturur: Coğrafi işaretli Edremit zeytinyağı, Kaz Dağları’ndan toplanan yabani otlar (radika, hindiba, şevketibostan, cibes) ve Edremit Körfezi’nden günlük çıkan taze balıklar. Akşam yemeğinde fırında levrek, kömür ızgarasında ahtapot ve taze deniz börülcesi eşliğinde Kuzey Ege şaraplarını tatmak, Altınoluk akşamlarının vazgeçilmez ritüelidir. Mare & Monte Bistro, yerel malzemeleri çağdaş şef dokunuşlarıyla birleştirerek bu lezzetleri doğrudan deniz kıyısında sunar.</p>\n<h2>Altınoluk Seyahatinizi Kusursuz Kılacak Pratik İpuçları</h2>\n<p>Seyahatinizi planlarken şu ayrıntıları göz önünde bulundurmanız tatilinizin konforunu artıracaktır:</p>\n<ul>\n  <li><strong>Ulaşım:</strong> Balıkesir Koca Seyit Havalimanı (EDO) tesise yalnızca 35 km uzaklıktadır. İstanbul ve Ankara’dan direkt uçuşlarla yaklaşık 1 saatte bölgeye ulaşabilirsiniz.</li>\n  <li><strong>Ayakkabı Seçimi:</strong> Altınoluk sahili yer yer çakıllı ve berrak kumlu yapıdadır; deniz ayakkabısı konforunuzu artırabilir. Ayrıca kanyon yürüyüşleri için kaymayan trekking ayakkabısı şarttır.</li>\n  <li><strong>Rezervasyon:</strong> Özellikle yaz aylarında ve butik tesislerde sınırlı oda sayısı nedeniyle erken rezervasyon yaptırmak kritik önem taşır.</li>\n</ul>\n<h2>Sonuç: Dinginliğe ve Doğaya Davet</h2>\n<p>Altınoluk; mavi bayraklı denizi, oksijen dolu dağ havası, binlerce yıllık efsaneleri ve samimi Ege atmosferiyle hayatınızın en dinlendirici tatillerinden birini vadeder. Siz de Ege’nin kıyısında, Kaz Dağları’nın eteğinde kendinize özel bir mola vermek isterseniz, Mare & Monte Hotel & Bistro’nun özenle tasarlanmış odalarında yerinizi ayırtabilirsiniz.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',9,'Altınoluk Gezi Rehberi','Altınoluk Gezi Rehberi 2026: Kuzey Ege Tatili İçin Kapsamlı Rehber','Altınoluk nerede, nasıl gidilir, nerede kalınır ve neler yapılır? Kaz Dağları ile Ege Denizi’nin buluştuğu Altınoluk için eksiksiz tatil rehberi.','/blog/altinoluk-gezi-rehberi','/assets/images/hero.jpg',1,'2026-08-25 11:27:50',1,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(2,1,'Altınoluk\'ta Gezilecek Yerler: Doğa, Tarih ve Deniz Rehberi','altinolukta-gezilecek-yerler','Edremit Körfezi’nin kuzey kıyısında yer alan Altınoluk, doğaseverler ve kültür meraklıları için adeta bir açık hava müzesidir. Bir yanda binlerce yıllık mitolojik anlatıların beşiğ...','<h2>Altınoluk ve Çevresinin Benzersiz Coğrafyası</h2>\n<p>Edremit Körfezi’nin kuzey kıyısında yer alan Altınoluk, doğaseverler ve kültür meraklıları için adeta bir açık hava müzesidir. Bir yanda binlerce yıllık mitolojik anlatıların beşiği Kaz Dağları (İda Dağı), diğer yanda Ege’nin berrak suları uzanır. Bu zengin coğrafya, tatil boyunca sadece kumsalda güneşlenmekle kalmayıp her güne farklı bir macera ve keşif sığdırmanıza olanak tanır.</p>\n<h2>1. Tarihi Altınoluk Köyü ve Abdullah Efendi Konağı</h2>\n<p>Sahilden sadece birkaç kilometre yukarı tırmandığınızda, modern sahil kasabası yerini taş mimarisiyle büyüleyen Tarihi Altınoluk Köyü’ne bırakır. Restore edilmiş sivil mimari örneklerinden biri olan Abdullah Efendi Konağı, dönemin ahşap işçiliğini ve yaşam tarzını sergiler. Köy meydanındaki asırlık çınarların altında oturup Edremit Körfezi’ni kuşbakışı izlerken taze sıkılmış karadut suyu veya dağ kekiği çayı içmek seyahatin en keyifli molalarından biridir.</p>\n<h2>2. Antandros Antik Kenti ve Mozaikli Roma Villası</h2>\n<p>Tarih meraklıları için Altınoluk’un en heyecan verici noktası şüphesiz Antandros’tur. Kaz Dağları yamaçlarında yapılan arkeolojik kazılarda ortaya çıkarılan yamaç evleri, taban mozaikleri ve duvar freskleri, antik dönemde buradaki refah seviyesini gözler önüne serer. İlyada Destanı’nda ve Vergilius’un Aeneis destanında geçen efsaneye göre, Troya düşerken sağ kurtulan Aeneas, yeni bir yurt kurmak üzere yola çıkacağı gemileri Antandros tersanelerinde inşa etmiştir.</p>\n<h2>3. Şahindere Kanyonu: Doğanın Serin Sığınağı</h2>\n<p>Altınoluk’un meşhur temiz dağ havasının ana kaynağı olan Şahindere Kanyonu, yaklaşık 27 kilometre uzunluğundadır. Kanyon boyunca uzanan patikalarda yürürken endemik Kazdağı göknarlarını görebilir, kayalar arasından fışkıran buz gibi kaynak sularında dinlenebilirsiniz. Kanyonun oluşturduğu doğal baca etkisi, dağdaki çam kokularını doğrudan sahile indirir.</p>\n<h2>4. Çam Mahallesi ve Seyir Terasları</h2>\n<p>Altınoluk’un sırtlarındaki Çam Mahallesi, çam ormanlarının kokusuyla sarhoş eden seyir noktalarına ev sahipliği yapar. Buradan Midilli Adası’nın silueti, Körfez boyunca uzanan zeytinlikler ve batan güneşin turuncu yansımaları eşsiz bir manzara kompozisyonu sunar.</p>\n<h2>5. Mıhlı Çayı ve Başdeğirmen Köprüsü</h2>\n<p>Altınoluk ile Çanakkale sınırı arasında bulunan Mıhlı Çayı, yemyeşil doğası ve tarihi Roma köprüsüyle fotoğrafçıların uğrak noktasıdır. Başdeğirmen mevkiindeki kemerli taş köprü, Roma mühendisliğinin asırlara meydan okuyan güzelliğini yansıtır. Gölet çevresindeki yürüyüş yolları yaz sıcağında serinlemek için harika bir tercihtir.</p>\n<h2>Gezinizi Planlarken Dikkat Edilecekler</h2>\n<p>Altınoluk’ta tarihi ve doğal alanları gezerken sabahın erken saatlerini tercih etmek, sıcaktan korunmanıza ve kalabalıktan uzak fotoğraflar çekmenize yardımcı olur. Ayrıca antik alanlar ve kanyonlar engebeli arazilere sahip olduğundan uygun yürüyüş ayakkabıları tercih edilmelidir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',10,'Altınoluk\'ta Gezilecek Yerler','Altınoluk Gezilecek Yerler: 10 Eşsiz Doğa ve Tarih Rotası','Altınoluk’ta nereler gezilir? Tarihi köy evleri, Antandros, kanyonlar, şelaleler ve plajlar. Detaylı keşif rehberi.','/blog/altinolukta-gezilecek-yerler','/assets/images/story.jpg',1,'2026-08-26 11:27:50',1,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(3,1,'Altınoluk Plajları ve Denize Girilecek Yerler','altinoluk-plajlari-ve-denize-girilecek-yerler','Kuzey Ege denizi, güney kıyılarının ılık ve bazen durgun suyuna kıyasla berrak, canlandırıcı ve serinletici yapısıyla bilinir. Altınoluk kıyılarının en belirgin özelliği, dipten ka...','<h2>Altınoluk Denizi Nasıl? Su Sıcaklığı ve Sahil Yapısı</h2>\n<p>Kuzey Ege denizi, güney kıyılarının ılık ve bazen durgun suyuna kıyasla berrak, canlandırıcı ve serinletici yapısıyla bilinir. Altınoluk kıyılarının en belirgin özelliği, dipten kaynayan soğuk tatlı su kaynakları ve Kaz Dağları’ndan inen yeraltı suları sayesinde suyun sürekli kendini yenilemesidir. Bu durum, denize eşsiz bir berraklık ve şeffaflık kazandırır. Sahil genel olarak ince çakıl ve kum karışımı bir dokuya sahiptir; bu sayede rüzgarlı havalarda bile deniz bulanmaz.</p>\n<h2>Özel Plaj Konforu: Mare &amp; Monte Beach Deneyimi</h2>\n<p>Halka açık plajların yoğunluğundan uzak, sakin ve seçkin bir deniz günü geçirmek isteyen misafirlerimiz için Mare & Monte Hotel & Bistro, 60 şezlongluk butik özel plaj alanıyla hizmet vermektedir. Denize sıfır konumda yer alan tesisimizde misafirler şezlonglarına uzanıp Midilli Adası manzarasını izlerken, gün boyu devam eden bistro servisinden yararlanabilirler. Sabahın durgun saatlerinde yüzülen ilk kulaçlardan, gün batımı kokteyllerine kadar her an konforla kurgulanmıştır.</p>\n<h2>Altınoluk Sahil Kordonu ve Mavi Bayraklı Alanlar</h2>\n<p>Altınoluk sahili boyunca uzanan yaklaşık 4 kilometrelik yürüyüş yolu boyunca çok sayıda Mavi Bayraklı halk plajı ve ahşap iskele bulunur. Sahil bandı boyunca sıralanan kafeler, duş alanları ve soyunma kabinleri ziyaretçilerin temel ihtiyaçlarını karşılar. Özellikle sabah 07:00 - 10:00 saatleri arası denizin çarşaf gibi düz ve tertemiz olduğu en verimli yüzme saatleridir.</p>\n<h2>Çevre Koylar: Küçükkuyu, Kadırga ve Güre Kıyıları</h2>\n<p>Altınoluk merkezinin yanı sıra aracınızla 15-25 dakikalık mesafede yer alan çevre koylar da keşfedilmeye değerdir. Küçükkuyu sahili, Assos yolu üzerindeki Kadırga Koyu’nun taşlık geniş plajı ve Güre sahil bandı günübirlik deniz kaçamakları için ideal alternatiflerdir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/beach.jpg','Mare & Monte Editör Ekibi',8,'Altınoluk Plajları','Altınoluk Plajları: Denize Girilecek En Güzel Koylar ve Sahiller','Altınoluk’ta nerede denize girilir? Mavi bayraklı plajlar, özel otel plajları, su sıcaklığı ve deniz özellikleri rehberi.','/blog/altinoluk-plajlari-ve-denize-girilecek-yerler','/assets/images/beach.jpg',1,'2026-08-27 11:27:50',1,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(4,1,'Altınoluk\'a Ne Zaman Gidilir? Mevsim Mevsim Tatil Rehberi','altinoluka-ne-zaman-gidilir','Pek çok kişi Altınoluk’u yalnızca bir yaz destinasyonu olarak görse de, Kaz Dağları ile Ege Denizi’nin oluşturduğu mikroklimal yapı burayı yılın 365 günü ziyaret edilmeye değer bir...','<h2>Kuzey Ege’de Mevsimlerin Büyüsü</h2>\n<p>Pek çok kişi Altınoluk’u yalnızca bir yaz destinasyonu olarak görse de, Kaz Dağları ile Ege Denizi’nin oluşturduğu mikroklimal yapı burayı yılın 365 günü ziyaret edilmeye değer bir yaşam alanına dönüştürür. Her mevsimin kendine has renkleri, lezzetleri ve dinginlik seviyeleri vardır.</p>\n<h2>İlkbahar (Mart - Mayıs): Doğanın ve Zeytinliklerin Uyanışı</h2>\n<p>Kaz Dağları’nda karların eridiği ve şelalelerin en coşkulu aktığı dönem ilkbahardır. Kır çiçekleri, kekik kokuları ve badem ağaçlarının çiçek açmasıyla bölge adeta yeniden doğar. Doğa yürüyüşü (trekking), fotoğrafçılık ve sakin kültür gezileri için ilkbahar ayları mükemmel hava sıcaklıkları sunar.</p>\n<h2>Yaz (Haziran - Ağustos): Deniz, Güneş ve Canlı Akşamlar</h2>\n<p>Yaz mevsimi denizin, plajın ve açık hava bistro akşamlarının zirve yaptığı zamandır. Gündüz berrak Ege sularında serinleyip güneşlenen misafirler, akşamları asırlık çınarın altında canlı müzik veya sakin caz melodileri eşliğinde akşam yemeğinin tadını çıkarırlar.</p>\n<h2>Sonbahar (Eylül - Kasım): Dingin Sarı Yaz ve Zeytin Hasadı</h2>\n<p>Yerel halkın ve deneyimli gezginlerin favori dönemi şüphesiz sonbahardır. Okulların açılmasıyla kalabalıklar çekilir, deniz suyu en berrak ve ılık kıvamına ulaşır. Ekim ve Kasım aylarında başlayan zeytin hasadı ise bölgeye eşsiz bir hareketlilik ve taze sıkım erken hasat zeytinyağı kokusu kazandırır.</p>\n<h2>Kış (Aralık - Şubat): Şömineli Kış Salonu ve Kaz Dağları Huzuru</h2>\n<p>Mare & Monte Hotel & Bistro, 12 ay açık butik anlayışıyla kış aylarında da misafirlerini ağırlar. Şömineli kış salonumuzda çıtırdayan odun ateşi, yerli şarap seçkileri ve dingin Ege manzarası kış yorgunluğunu üzerinizden atmanız için ideal bir atmosfer yaratır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/winter-lounge.jpg','Mare & Monte Editör Ekibi',9,'Altınoluk\'a Ne Zaman Gidilir','Altınoluk’a Ne Zaman Gidilir? Dört Mevsim Kuzey Ege Rehberi','Altınoluk’ta tatil için en iyi ay hangisi? İlkbahar çiçekleri, yaz deniz sezonu, sarı yaz eylülü ve şömineli kış tatili.','/blog/altinoluka-ne-zaman-gidilir','/assets/images/winter-lounge.jpg',1,'2026-08-28 11:27:50',1,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(5,5,'Altınoluk Butik Otel Rehberi: Konaklama Seçerken Nelere Dikkat Edilmeli?','altinoluk-butik-otel-rehberi','Tatilin kalitesini belirleyen en önemli faktör konaklama tercihidir. Çok odalı büyük tesislerde yaşanan açık büfe kuyrukları, gürültülü havuz başları ve standartlaştırılmış hizmet ...','<h2>Kuzey Ege’de Doğru Otel Seçiminin Önemi</h2>\n<p>Tatilin kalitesini belirleyen en önemli faktör konaklama tercihidir. Çok odalı büyük tesislerde yaşanan açık büfe kuyrukları, gürültülü havuz başları ve standartlaştırılmış hizmet anlayışı yerine, butik oteller kişisel alan ve huzur sunar.</p>\n<h2>1. Denize Sıfır Konum Avantajı</h2>\n<p>Oteliniz ile deniz arasında araç yolu veya mesafe olmaması tatil konforunu katlar. Sabah uyanıp balkona çıktığınızda dalga seslerini duymak, odanızdan mayonuzla doğrudan plaja inebilmek paha biçilmez bir ayrıcalıktır.</p>\n<h2>2. Konsept: +16 Yetişkin Oteli Tercihi</h2>\n<p>Çiftler, balayı çiftleri ve sessizlik arayan profesyoneller için çocuksuz tesis konsepti (+16 Adult) dinlenme kalitesini zirveye taşır. Havuz ve plaj alanında gürültüsüz, kitap okuyabileceğiniz sakin bir ortam sağlanır.</p>\n<h2>3. Mutfak Kalitesi ve Sosyal Alanlar</h2>\n<p>İyi bir butik otel yalnızca uyuyacak bir oda değil, güçlü bir gastronomi deneyimi sunmalıdır. Mare & Monte Bistro gibi kendi mutfağında günlük yerel ürünleri işleyen ve bahçesinde asırlık ağaçlar barındıran tesisler tatilinizi zenginleştirir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/room-sea-balcony.jpg','Mare & Monte Editör Ekibi',8,'Altınoluk Butik Otel Rehberi','Altınoluk Butik Otel Seçimi: Konfor, Konum ve Konsept Rehberi','Altınoluk’ta butik otel seçerken nelere dikkat etmeli? Denize sıfır konum, yetişkin konsepti, hijyen ve gastronomi standartları.','/blog/altinoluk-butik-otel-rehberi','/assets/images/room-sea-balcony.jpg',1,'2026-08-29 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(6,2,'Kaz Dağları Gezi Rehberi: Altınoluk\'tan Keşfedilecek Rotalar','kaz-daglari-gezi-rehberi','Homeros’un İlyada destanında \"bin pınarlı İda\" olarak geçen Kaz Dağları, dünyanın en zengin flora ve faunasına sahip coğrafyalarından biridir. Antik efsanelere göre dünyanın ilk gü...','<h2>Mitolojinin İda Dağı: Kaz Dağları Efsaneleri</h2>\n<p>Homeros’un İlyada destanında \"bin pınarlı İda\" olarak geçen Kaz Dağları, dünyanın en zengin flora ve faunasına sahip coğrafyalarından biridir. Antik efsanelere göre dünyanın ilk güzellik yarışması burada yapılmış, tanrılar Troya Savaşı’nı bu dağın zirvelerinden izlemiştir.</p>\n<h2>Kaz Dağları Milli Parkı ve Giriş Kuralları</h2>\n<p>Milli park statüsündeki hassas bölgeler koruma altındadır. Sarıkız Tepesi, Kartal Çimi gibi yüksek rakımlı alanlara giriş için alan kılavuzu (rehber) eşliği gerekmektedir. Altınoluk’tan başlayan günübirlik turlarla bu zirvelere ulaşmak mümkündür.</p>\n<h2>Altınoluk Çıkışlı Doğa Rotaları</h2>\n<p>Otelimizden hareketle kolayca ulaşabileceğiniz Şahindere Kanyonu, Doyran Köyü yamaçları ve Çamlıbel Köyü günübirlik doğa gezileri için ideal başlangıç noktalarıdır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',11,'Kaz Dağları Gezi Rehberi','Kaz Dağları Gezi Rehberi: Şelaleler, Köyler ve Doğa Rotaları','Altınoluk’tan Kaz Dağları nasıl gezilir? Milli park rotaları, kanyonlar, rehberli turlar ve eşsiz doğa harikaları.','/blog/kaz-daglari-gezi-rehberi','/assets/images/hero.jpg',1,'2026-08-30 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(7,2,'Şahindere Kanyonu Gezi Rehberi','sahindere-kanyonu-gezi-rehberi','Şahindere Kanyonu, Kaz Dağları’nın güney yamaçlarında yer alan ve yaklaşık 600 metre derinliğe ulaşan dik bir boğazdır. Dağın yüksek kesimlerindeki serin havayı vakumlayarak Körfez...','<h2>Kanyonun Coğrafi ve İklimsel Önemi</h2>\n<p>Şahindere Kanyonu, Kaz Dağları’nın güney yamaçlarında yer alan ve yaklaşık 600 metre derinliğe ulaşan dik bir boğazdır. Dağın yüksek kesimlerindeki serin havayı vakumlayarak Körfez’in deniz meltemiyle buluşturan doğal bir iklim pompası işlevi görür.</p>\n<h2>Nasıl Gidilir ve Yürüyüş Şartları</h2>\n<p>Altınoluk merkezine yaklaşık 6 km mesafededir. Kanyonun başlangıç noktasına araçla ulaştıktan sonra dere yatağı boyunca kayalık patikalarda yürüyüş yapılır. Bileği saran trekking ayakkabısı ve sırt çantası önerilir.</p>\n<h2>Doğal Göletler ve Buz Gibi Dağ Suyu</h2>\n<p>Kanyon içerisinde eriyen kar sularıyla beslenen berrak göletler yer alır. Yaz sıcağında kanyonun serin sularında serinlemek doğaseverler için eşsiz bir tecrübedir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',9,'Şahindere Kanyonu','Şahindere Kanyonu Gezi Rehberi: Altınoluk’un Oksijen Koridoru','Şahindere Kanyonu nerede, nasıl gidilir? Kaz Dağları’nın en dik kanyonunda doğa yürüyüşü, göletler ve ziyaret ipuçları.','/blog/sahindere-kanyonu-gezi-rehberi','/assets/images/story.jpg',1,'2026-08-31 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(8,3,'Antandros Antik Kenti: Altınoluk\'un Binlerce Yıllık Tarihi','antandros-antik-kenti-tarihi','Kaz Dağları’nın Edremit Körfezi’ne bakan güney yamaçlarında kurulan Antandros, M.Ö. 8. yüzyıla kadar uzanan köklü bir geçmişe sahiptir. Kereste ticareti ve gemi yapımıyla zenginleş...','<h2>Antandros’un Kuruluşu ve Stratejik Konumu</h2>\n<p>Kaz Dağları’nın Edremit Körfezi’ne bakan güney yamaçlarında kurulan Antandros, M.Ö. 8. yüzyıla kadar uzanan köklü bir geçmişe sahiptir. Kereste ticareti ve gemi yapımıyla zenginleşen kent, antik dünyanın önemli liman merkezlerindendi.</p>\n<h2>Roma Dönemi Yamaç Evi ve Büyüleyici Mozaikler</h2>\n<p>Kazılarda ortaya çıkarılan M.S. 4. yüzyıla ait Roma villası, zengin taban mozaikleri ve duvar freskleriyle dönemin lüks yaşam standartlarını sergilemektedir.</p>\n<h2>Ziyaret Bilgileri ve Ulaşım</h2>\n<p>Mare & Monte Hotel & Bistro’ya yalnızca 2,5 km mesafede bulunan ören yeri, arkeoloji tutkunları için yürüyüş mesafesinde tarihi bir keşif sunar.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',10,'Antandros Antik Kenti','Antandros Antik Kenti Rehberi: Altınoluk’un 3000 Yıllık Hazinesi','Antandros Antik Kenti nerede, nasıl gidilir? Yamaç evler, Roma villası mozaikleri, nekropol ve kazı tarihi.','/blog/antandros-antik-kenti-tarihi','/assets/images/story.jpg',1,'2026-09-01 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(9,3,'Aeneas Kültür Rotası ve Antandros\'un Mitolojik Hikâyesi','aeneas-kultur-rotasi-ve-antandros','Troya Savaşı sonrası kenti terk etmek zorunda kalan prens Aeneas, babası Ankhises ve oğlunu yanına alarak İda Dağı’nı aşıp Antandros’a sığınmıştır....','<h2>Troya’dan Kaçış ve Antandros’a Sığınış</h2>\n<p>Troya Savaşı sonrası kenti terk etmek zorunda kalan prens Aeneas, babası Ankhises ve oğlunu yanına alarak İda Dağı’nı aşıp Antandros’a sığınmıştır.</p>\n<h2>Antandros Tersanelerinde İnşa Edilen Gemiler</h2>\n<p>Kaz Dağları’nın dayanıklı göknar ve çam ağaçlarından 20 adet gemi inşa eden Aeneas, yeni bir vatan kurmak üzere buradan Akdeniz’e açılmış ve nihayetinde İtalya kıyılarına ulaşarak Roma medeniyetinin tohumlarını atmıştır.</p>\n<h2>Avrupa Konseyi Tescilli Kültür Rotası</h2>\n<p>Bugün Türkiye’den başlayarak İtalya’da son bulan Aeneas Kültür Rotası, Altınoluk’u uluslararası bir kültür köprüsünün başlangıç noktası haline getirmiştir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',9,'Aeneas Kültür Rotası','Aeneas Kültür Rotası: Antandros’tan Roma’ya Uzanan Efsane','Avrupa Konseyi tescilli Aeneas Kültür Rotası nedir? Antandros’ta inşa edilen 20 gemi ve Roma’nın kuruluş efsanesi.','/blog/aeneas-kultur-rotasi-ve-antandros','/assets/images/hero.jpg',1,'2026-09-02 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(10,2,'Hasanboğuldu ve Sütüven Şelalesi Gezi Rehberi','hasanboguldu-ve-sutuven-selalesi-gezi-rehberi','17 metre yükseklikten dökülen Sütüven Şelalesi, Kaz Dağları’ndan doğan Zeytinli Çayı üzerinde yer alır. Su sesinin çam ormanlarıyla buluştuğu alan görsel bir şölen sunar....','<h2>Sütüven Şelalesi’nin Doğal Cazibesi</h2>\n<p>17 metre yükseklikten dökülen Sütüven Şelalesi, Kaz Dağları’ndan doğan Zeytinli Çayı üzerinde yer alır. Su sesinin çam ormanlarıyla buluştuğu alan görsel bir şölen sunar.</p>\n<h2>Hasan ile Emine’nin Hüzünlü Aşk Efsanesi</h2>\n<p>Yörük kızı Emine ile ovalı Hasan’ın aşkını anlatan efsane, Sabahattin Ali’nin öykülerine de ilham vermiştir. Dağ ile ova arasındaki kültürel sınırları aşmaya çalışan Hasan’ın gölette boğulması hafızalara kazınmıştır.</p>\n<h2>Ziyaretçi Tavsiyeleri</h2>\n<p>Özellikle hafta içi sabah saatlerinde ziyaret etmek huzur içinde yürüyüş yapmanızı sağlar. Bölgede yerel gözleme ve adaçayı tadabileceğiniz otantik dinlenme noktaları bulunur.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/winter-lounge.jpg','Mare & Monte Editör Ekibi',9,'Hasanboğuldu ve Sütüven Şelalesi','Hasanboğuldu & Sütüven Şelalesi: Doğa Yürüyüşü ve Aşk Efsanesi','Hasanboğuldu göleti ve Sütüven Şelalesi nerede, nasıl gidilir? Kaz Dağları’nın en ünlü doğa durağı hakkında her şey.','/blog/hasanboguldu-ve-sutuven-selalesi-gezi-rehberi','/assets/images/winter-lounge.jpg',1,'2026-09-03 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(11,1,'Adatepe Köyü Gezi Rehberi: Taş Evler ve Kuzey Ege Atmosferi','adatepe-koyu-gezi-rehberi','Adatepe, Türk ve Rum kültürlerinin yüzyıllar boyu bir arada yaşadığı, taş ustalarının elinden çıkmış görkemli konaklara ev sahipliği yapan koruma altındaki bir köydür....','<h2>Tarihi Doku ve Mimari Miras</h2>\n<p>Adatepe, Türk ve Rum kültürlerinin yüzyıllar boyu bir arada yaşadığı, taş ustalarının elinden çıkmış görkemli konaklara ev sahipliği yapan koruma altındaki bir köydür.</p>\n<h2>Taş Mektep ve Köy Meydanı</h2>\n<p>Eski köy okulunun kültür ve düşünce merkezine dönüştürülmesiyle kurulan Taş Mektep ile asırlık çınarların altındaki taş kahveler köyün kalbidir.</p>\n<h2>Zeytinyağı Kültürü ve Yerel Lezzetler</h2>\n<p>Köyde zeytinyağı sabunları, kekik suları ve yerel otlarla harmanlanan börekler tadılabilir. Altınoluk’tan 25 dakikalık mesafededir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',9,'Adatepe Köyü Gezi Rehberi','Adatepe Köyü Gezi Rehberi: Taş Sokaklar ve Zeytinyağı Kültürü','Kaz Dağları eteğinde masalsı Adatepe Köyü. Korunmuş taş mimari, Taş Mektep, tarihi kahveler ve gezi rotası.','/blog/adatepe-koyu-gezi-rehberi','/assets/images/story.jpg',1,'2026-09-04 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(12,3,'Zeus Altarı Gezi Rehberi','zeus-altari-gezi-rehberi','Adatepe Köyü’nün hemen üzerinde yer alan kaya kütlesi, antik çağda kurban adanan ve tanrılara sunu yapılan kutsal bir alan olarak kullanılmıştır....','<h2>Mitolojide Tanrılar Tanrısı Zeus’un Seyir Tepesi</h2>\n<p>Adatepe Köyü’nün hemen üzerinde yer alan kaya kütlesi, antik çağda kurban adanan ve tanrılara sunu yapılan kutsal bir alan olarak kullanılmıştır.</p>\n<h2>Körfez ve Midilli Manzarası</h2>\n<p>Kayalara oyulmuş basamaklardan zirveye çıktığınızda Edremit Körfezi, Ayvalık adaları ve Midilli Adası ayaklarınızın altına serilir.</p>\n<h2>Ziyaret İpuçları</h2>\n<p>Akşamüstü saatlerinde gün batımı kızıllığını izlemek için fotoğraf makinenizi yanınıza almayı unutmayın.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',8,'Zeus Altarı','Zeus Altarı Gezi Rehberi: Edremit Körfezi’nin Zirve Manzarası','Zeus Altarı nerede, nasıl çıkılır? Homeros İlyada efsanesi, panoramik Körfez manzarası ve gün batımı seyir noktası.','/blog/zeus-altari-gezi-rehberi','/assets/images/hero.jpg',1,'2026-09-05 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(13,3,'Tahtakuşlar Etnografya Galerisi ve Kazdağları Kültürü','tahtakuslar-etnografya-galerisi','Alibey Kudar tarafından kurulan galeri, UNESCO ödüllü yapısıyla Kaz Dağları Türkmen kültürünün giyim, yaşam ve inanç geleneklerini sergiler....','<h2>Türkiye’nin İlk Özel Köy Etnografya Müzesi</h2>\n<p>Alibey Kudar tarafından kurulan galeri, UNESCO ödüllü yapısıyla Kaz Dağları Türkmen kültürünün giyim, yaşam ve inanç geleneklerini sergiler.</p>\n<h2>Dev Deri Sırtlı Deniz Kaplumbağası</h2>\n<p>Müzenin en dikkat çeken parçalarından biri, Edremit Körfezi’nde bulunmuş olan dünyanın en büyük deri sırtlı deniz kaplumbağası örneğidir.</p>\n<h2>Kültürel Derinlik</h2>\n<p>Orta Asya’dan Kaz Dağları’na taşınan Şamanizm motifleri ve ahşap oymacılığı geleneği ziyaretçilere benzersiz bir ufuk açar.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/gastronomy-wine.jpg','Mare & Monte Editör Ekibi',8,'Tahtakuşlar Etnografya Galerisi','Tahtakuşlar Etnografya Galerisi: Kazdağları Türkmen Kültürü','Türkiye’nin ilk özel köy müzesi Tahtakuşlar Etnografya Galerisi. Şamanizm izleri, el dokumaları ve deniz kaplumbağası.','/blog/tahtakuslar-etnografya-galerisi','/assets/images/gastronomy-wine.jpg',1,'2026-09-06 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(14,2,'Mıhlı Çayı ve Taş Köprü Gezi Rehberi','mihli-cayi-ve-tas-kopru-gezi-rehberi','Balıkesir ile Çanakkale sınırını oluşturan Mıhlı Çayı, gürül gürül akan turkuaz suları ve asırlık incir ağaçlarıyla çevrili gizli bir vadidir....','<h2>Kuzey Ege’nin Saklı Cenneti Mıhlı Vadisi</h2>\n<p>Balıkesir ile Çanakkale sınırını oluşturan Mıhlı Çayı, gürül gürül akan turkuaz suları ve asırlık incir ağaçlarıyla çevrili gizli bir vadidir.</p>\n<h2>Roma Dönemi Başdeğirmen Köprüsü</h2>\n<p>Tek gözlü kemer yapısıyla inşa edilen tarihi köprü, Roma ordularının ve kervanların geçiş yolu olarak asırlardır ayaktadır.</p>\n<h2>Yaz Sıcağında Doğal Havuzlar</h2>\n<p>Köprünün hemen altındaki doğal gölette serinlemek yaz aylarında Altınoluk misafirlerinin en sevdiği doğa aktivitelerindendir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/bistro-banner.jpg','Mare & Monte Editör Ekibi',8,'Mıhlı Çayı ve Taş Köprü','Mıhlı Çayı ve Roma Taş Köprüsü Gezi Rehberi','Mıhlı Çayı kanyonu nerede, nasıl gidilir? Tarihi kemerli köprü, serin sular ve doğa yürüyüşü rotası.','/blog/mihli-cayi-ve-tas-kopru-gezi-rehberi','/assets/images/bistro-banner.jpg',1,'2026-09-07 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(15,1,'Akçay\'da Gezilecek Yerler ve Altınoluk\'tan Günübirlik Gezi','akcayda-gezilecek-yerler','Altınoluk’a 15 km mesafede bulunan Akçay, hareketli kordon boyu, kafeleri ve yaz akşamları canlı çarşısıyla Körfez’in en dinamik merkezlerindendir....','<h2>Akçay’ın Dinamik Sahil Atmosferi</h2>\n<p>Altınoluk’a 15 km mesafede bulunan Akçay, hareketli kordon boyu, kafeleri ve yaz akşamları canlı çarşısıyla Körfez’in en dinamik merkezlerindendir.</p>\n<h2>Sarıkız Efsanesi ve Anıt Heykel</h2>\n<p>Kordonun merkezinde yer alan Sarıkız Heykeli, Kaz Dağları’nın en hüzünlü mitolojik kahramanının hatırasını yaşatır.</p>\n<h2>Denizden Fışkıran Tatlı Sular</h2>\n<p>Akçay sahillerinde denizin hemen kıyısından çıkan soğuk tatlı su kaynakları bölgenin en ilgi çekici doğal fenomenidir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/beach.jpg','Mare & Monte Editör Ekibi',8,'Akçay\'da Gezilecek Yerler','Akçay Gezilecek Yerler: Altınoluk’tan Günübirlik Kaçamak','Akçay kordonu, Sarıkız heykeli, soğuk su pınarları ve çarşısı. Altınoluk’tan Akçay’a günübirlik gezi rehberi.','/blog/akcayda-gezilecek-yerler','/assets/images/beach.jpg',1,'2026-09-08 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(16,1,'Güre Gezi Rehberi: Kazdağları, Termal ve Ege','gure-gezi-rehberi','Roma döneminden bu yana şifa kaynağı olarak kullanılan Güre termal suları, deniz tatilini sağlıkla taçlandırmak isteyenler için eşsizdir....','<h2>Antik Kaplıcalardan Günümüze Güre Termali</h2>\n<p>Roma döneminden bu yana şifa kaynağı olarak kullanılan Güre termal suları, deniz tatilini sağlıkla taçlandırmak isteyenler için eşsizdir.</p>\n<h2>Çamlıbel Köyü ve Kültür Durakları</h2>\n<p>Güre yamaçlarındaki Çamlıbel Köyü, usta sanatçı Tuncel Kurtiz’in ebedi istirahatgâhı ve bohem köy kahveleriyle bilinir.</p>\n<h2>Güre Sahil Bandı</h2>\n<p>Altınoluk ile komşu olan Güre kordonu, balık lokantaları ve yürüyüş parkurlarıyla gün batımı için sakin bir seçenektir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',8,'Güre Gezi Rehberi','Güre Gezi Rehberi: Termal Kaynaklar, Dağ Köyleri ve Sahil','Güre kaplıcaları, Çamlıbel köyü, Tuncel Kurtiz’in mezarı ve Güre iskelesi. Altınoluk komşusu Güre keşif rehberi.','/blog/gure-gezi-rehberi','/assets/images/story.jpg',1,'2026-09-09 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(17,1,'Edremit Körfezi Gezi Rehberi','edremit-korfezi-gezi-rehberi','Edremit Körfezi, kuzeyde Kaz Dağları, güneyde Madra Dağları ile çevrili korunaklı bir deniz havzasıdır. Milyonlarca zeytin ağacının çevrelediği bu havza Türkiye’nin zeytinyağı başk...','<h2>Körfez Coğrafyası: Kaz Dağları ile Madra Dağları Arasında</h2>\n<p>Edremit Körfezi, kuzeyde Kaz Dağları, güneyde Madra Dağları ile çevrili korunaklı bir deniz havzasıdır. Milyonlarca zeytin ağacının çevrelediği bu havza Türkiye’nin zeytinyağı başkentidir.</p>\n<h2>Körfez Rotaları ve Gezilecek Noktalar</h2>\n<p>Altınoluk’tan yola çıkarak doğuda Edremit merkez ve müzeleri, güneyde Ören’in tarihi palamut meşeleri ve Ayvalık kıyıları günübirlik keşfedilebilir.</p>\n<h2>Denizden Karaya Ege Yaşam Tarzı</h2>\n<p>Körfez insanının dingin ritmi, taze pazar tezgahları ve akşamları sahilde buluşan sakin sohbetler burada tatili terapiye dönüştürür.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',10,'Edremit Körfezi Gezi Rehberi','Edremit Körfezi Gezi Rehberi: Kuzey Ege’nin Cennet Havzası','Edremit Körfezi’nin incileri: Altınoluk, Akçay, Güre, Ören ve Ayvalık. Bütüncül Kuzey Ege tatil rotası.','/blog/edremit-korfezi-gezi-rehberi','/assets/images/hero.jpg',1,'2026-09-10 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(18,1,'Koca Seyit Havalimanı\'ndan Altınoluk\'a Ulaşım Rehberi','koca-seyit-havalimanindan-altinoluka-ulasim','Balıkesir Koca Seyit Havalimanı (EDO), Edremit sınırlarında yer almakta olup Altınoluk’a yaklaşık 35 km (araçla 35-40 dakika) mesafededir....','<h2>Havalimanı Konumu ve Mesafesi</h2>\n<p>Balıkesir Koca Seyit Havalimanı (EDO), Edremit sınırlarında yer almakta olup Altınoluk’a yaklaşık 35 km (araçla 35-40 dakika) mesafededir.</p>\n<h2>Ulaşım Seçenekleri: HAVAŞ, Taksi ve Özel Transfer</h2>\n<p>Uçak iniş saatlerine göre düzenlenen toplu taşıma servisleri, havalimanı taksileri veya otelimizin anlaşmalı özel transfer seçenekleriyle konforlu bir varış sağlanır.</p>\n<h2>Araç Kiralama Kolaylığı</h2>\n<p>Körfez ve Kaz Dağları köylerini özgürce gezmek isteyen misafirler için havalimanında araç kiralamak büyük pratiklik sağlar.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',7,'Koca Seyit Havalimanı Altınoluk Ulaşım','Balıkesir Koca Seyit Havalimanı’ndan Altınoluk’a Ulaşım','Koca Seyit (EDO) Havalimanı’ndan Altınoluk’a nasıl gidilir? Taksi, HAVAŞ/belediye otobüsü, transfer ve araç kiralama.','/blog/koca-seyit-havalimanindan-altinoluka-ulasim','/assets/images/story.jpg',1,'2026-09-11 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(19,1,'İstanbul\'dan Altınoluk\'a Nasıl Gidilir?','istanbuldan-altinoluka-nasil-gidilir','İstanbul’dan Altınoluk’a özel araçla ulaşımda iki konforlu otoyol alternatifi vardır: İstanbul-İzmir Otoyolu üzerinden Balıkesir-Edremit çıkışı veya Çanakkale Köprüsü üzerinden Ezi...','<h2>Karayolu Seçenekleri: Osmangazi ve 1915 Çanakkale Köprüsü</h2>\n<p>İstanbul’dan Altınoluk’a özel araçla ulaşımda iki konforlu otoyol alternatifi vardır: İstanbul-İzmir Otoyolu üzerinden Balıkesir-Edremit çıkışı veya Çanakkale Köprüsü üzerinden Ezine-Ayvacık rotası.</p>\n<h2>Uçakla Hızlı Ulaşım</h2>\n<p>İstanbul Havalimanı veya Sabiha Gökçen’den Koca Seyit Havalimanı’na yapılan 50 dakikalık direkt uçuşlar hafta sonu kaçamaklarını son derece kolaylaştırır.</p>\n<h2>Otobüs Seferleri</h2>\n<p>Büyükşehirlerden Altınoluk otogarına gün boyu direkt lüks otobüs seferleri düzenlenmektedir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',8,'İstanbuldan Altınoluka Nasıl Gidilir','İstanbul’dan Altınoluk’a Nasıl Gidilir? Yol Tarifi ve Süreler','İstanbul - Altınoluk arası arabayla, otobüsle veya uçakla kaç saat sürer? Osmangazi ve 1915 Çanakkale Köprüsü güzergahları.','/blog/istanbuldan-altinoluka-nasil-gidilir','/assets/images/hero.jpg',1,'2026-09-12 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(20,1,'İzmir\'den Altınoluk\'a Nasıl Gidilir?','izmirden-altinoluka-nasil-gidilir','İzmir ile Altınoluk arası yaklaşık 200 km olup, bölünmüş sahil yolu üzerinden keyifli bir sürüşle yaklaşık 2,5 - 3 saat sürmektedir....','<h2>Mesafe ve Ortalama Sürüş Süresi</h2>\n<p>İzmir ile Altınoluk arası yaklaşık 200 km olup, bölünmüş sahil yolu üzerinden keyifli bir sürüşle yaklaşık 2,5 - 3 saat sürmektedir.</p>\n<h2>Güzergah Üzerindeki Mola Durakları</h2>\n<p>Yol boyunca Çandarlı Körfezi, Dikili zeytinlikleri ve Ayvalık sahil manzaraları eşliğinde Ege kokulu bir yolculuk deneyimi yaşanır.</p>\n<h2>Hafta Sonu Dinlenmesi İçin İdeal Rota</h2>\n<p>İzmir’in yoğunluğundan kaçıp cuma akşamı yola çıkan gezginler akşam yemeğini Mare & Monte Bistro’da denize karşı yiyebilirler.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/beach.jpg','Mare & Monte Editör Ekibi',7,'İzmirden Altınoluka Nasıl Gidilir','İzmir’den Altınoluk’a Ulaşım Rehberi: Mesafe ve Güzergah','İzmir - Altınoluk arası kaç km, kaç saat sürer? Menemen, Aliağa, Dikili, Ayvalık sahil rotası yol kılavuzu.','/blog/izmirden-altinoluka-nasil-gidilir','/assets/images/beach.jpg',1,'2026-09-13 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(21,1,'Ankara\'dan Altınoluk\'a Nasıl Gidilir?','ankaradan-altinoluka-nasil-gidilir','Ankara’dan Altınoluk’a kara yoluyla mesafe yaklaşık 620 km’dir. Sivrihisar, Eskişehir, Bursa ve Balıkesir üzerinden bölünmüş yollarla yaklaşık 6,5 - 7 saatte varılır....','<h2>Karayolu: Eskişehir - Bursa - Balıkesir Güzergahı</h2>\n<p>Ankara’dan Altınoluk’a kara yoluyla mesafe yaklaşık 620 km’dir. Sivrihisar, Eskişehir, Bursa ve Balıkesir üzerinden bölünmüş yollarla yaklaşık 6,5 - 7 saatte varılır.</p>\n<h2>Direkt Uçuş Avantajı</h2>\n<p>Ankara Esenboğa’dan Koca Seyit Havalimanı’na düzenlenen dönemsel direkt seferlerle başkentten Kuzey Ege sahiline 1 saatte ulaşmak mümkündür.</p>\n<h2>İç Anadolu Bozkırından Ege Mavisine</h2>\n<p>Bozkırın kuru sıcağından Kaz Dağları’nın çam ve iyot kokulu sahillerine geçiş unutulmaz bir ferahlama sağlar.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',7,'Ankaradan Altınoluka Nasıl Gidilir','Ankara’dan Altınoluk’a Nasıl Gidilir? En Hızlı Ulaşım Seçenekleri','Ankara - Altınoluk arası kaç saat? Eskişehir-Bursa-Balıkesir güzergahı ve direkt uçak seferleri rehberi.','/blog/ankaradan-altinoluka-nasil-gidilir','/assets/images/story.jpg',1,'2026-09-14 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(22,1,'Altınoluk\'ta 3 Günlük Tatil Planı','altinolukta-3-gunluk-tatil-plani','Mare & Monte’a yerleşip deniz manzaralı balkonunuzda kahvenizi yudumladıktan sonra özel plajda günün yorgunluğunu atın. Akşam asırlık çınarın altında taze Körfez levreği ile tatili...','<h2>1. Gün: Otele Giriş, Plaj ve Deniz Mahsulleri</h2>\n<p>Mare & Monte’a yerleşip deniz manzaralı balkonunuzda kahvenizi yudumladıktan sonra özel plajda günün yorgunluğunu atın. Akşam asırlık çınarın altında taze Körfez levreği ile tatili başlatın.</p>\n<h2>2. Gün: Antandros Mozaikleri ve Şahindere Kanyonu</h2>\n<p>Sabah erken saatte Antandros Antik Kenti’ni ziyaret edin. Öğleden sonra Şahindere Kanyonu’nun serin patikalarında yürüyüş yapıp doğanın tadını çıkarın.</p>\n<h2>3. Gün: Tarihi Altınoluk Köyü ve Gün Batımı Kokteyli</h2>\n<p>Eski köy kahvesinde adaçayı molası verin, yerel zeytinyağı alışverişinizi tamamlayın ve plajda gün batımını izleyerek tatili sonlandırın.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',9,'Altınoluk 3 Günlük Tatil Planı','Altınoluk’ta 3 Günlük Kusursuz Tatil Rotası: Deniz ve Doğa','Altınoluk’ta hafta sonu veya 3 günlük tatil için gün gün gezi, lezzet ve dinlenme programı.','/blog/altinolukta-3-gunluk-tatil-plani','/assets/images/hero.jpg',1,'2026-09-15 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(23,1,'Altınoluk ve Kazdağları İçin 5 Günlük Tatil Rotası','altinoluk-kazdaglari-5-gunluk-rota','5 günlük süre, hem deniz tatilini doya doya yaşamak hem de Kaz Dağları’nın köylerini, antik mirasını ve gastronomisini derinlemesine keşfetmek için idealdir....','<h2>Dolu Dolu Bir Kuzey Ege Kaçamağı</h2>\n<p>5 günlük süre, hem deniz tatilini doya doya yaşamak hem de Kaz Dağları’nın köylerini, antik mirasını ve gastronomisini derinlemesine keşfetmek için idealdir.</p>\n<h2>Gün Gün Rota Detayı</h2>\n<p>İlk gün deniz ve dinlenme; 2. gün Antandros ve kanyonlar; 3. gün Adatepe Köyü ve Zeus Altarı; 4. gün Hasanboğuldu ve Sütüven Şelalesi; 5. gün butik şarap tadımı ve vedalaşma.</p>\n<h2>Konaklama Üssü Olarak Altınoluk</h2>\n<p>Altınoluk, sahil boyunca tüm bu rotaların tam merkezinde yer aldığı için her akşam aynı huzurlu butik odanıza dönme konforu sunar.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/beach.jpg','Mare & Monte Editör Ekibi',10,'Altınoluk Kazdağları 5 Günlük Rota','Altınoluk ve Kaz Dağları İçin 5 Günlük Kapsamlı Keşif Rotası','5 günde Kuzey Ege’nin tüm güzellikleri: Adatepe, Zeus Altarı, Hasanboğuldu, kanyonlar ve masmavi plajlar.','/blog/altinoluk-kazdaglari-5-gunluk-rota','/assets/images/beach.jpg',1,'2026-09-16 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(24,4,'Kuzey Ege Mutfağı: Zeytinyağı, Ege Otları ve Deniz Ürünleri','kuzey-ege-mutfagi-zeytinyagi-ve-otlar','Kaz Dağları’nın zengin toprak yapısı ve deniz meltemi, Edremit tipi zeytine yüksek polifenol ve meyvemsi taze bir aroma kazandırır. Soğuk sıkım sızma yağ sofraların baş tacıdır....','<h2>Edremit Zeytinyağının Benzersiz Aroması</h2>\n<p>Kaz Dağları’nın zengin toprak yapısı ve deniz meltemi, Edremit tipi zeytine yüksek polifenol ve meyvemsi taze bir aroma kazandırır. Soğuk sıkım sızma yağ sofraların baş tacıdır.</p>\n<h2>Doğadan Sofraya Yabani Ege Otları</h2>\n<p>Cibes, radika, hindiba, şevketibostan ve deniz börülcesi... Sade zeytinyağı ve limon sosuyla harmanlanan bu yabani otlar şifa doludur.</p>\n<h2>Körfezden Çıkan Günlük Lezzetler</h2>\n<p>Taş barbun, çipura, levrek ve kalamar... Az işlem görmüş, doğal lezzeti korunmuş taze deniz ürünleri Mare & Monte Bistro’nun mutfak felsefesini yansıtır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/gastronomy-aegean.jpg','Mare & Monte Editör Ekibi',10,'Kuzey Ege Mutfağı','Kuzey Ege Mutfağı: Zeytinyağı Kültürü, Otlar ve Körfez Balıkları','Altınoluk ve Edremit Körfezi mutfak kültürü. Şevketibostan, radika, taze kalamar ve erken hasat zeytinyağı.','/blog/kuzey-ege-mutfagi-zeytinyagi-ve-otlar','/assets/images/gastronomy-aegean.jpg',1,'2026-09-17 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(25,1,'Altınoluk\'ta Gün Batımı: Kuzey Ege Akşamlarının Keyfi','altinolukta-gun-batimi-keyfi','Altınoluk’un batı cephesi, güneşin denize ve karşıdaki Midilli dağlarının arkasına batışını kesintisiz bir açıyla izleme imkânı sunar....','<h2>Güneşin Denize Karıştığı Büyülü Saatler</h2>\n<p>Altınoluk’un batı cephesi, güneşin denize ve karşıdaki Midilli dağlarının arkasına batışını kesintisiz bir açıyla izleme imkânı sunar.</p>\n<h2>Mare &amp; Monte Beach &amp; Çınar Bar’da Gün Batımı</h2>\n<p>Sahilde dalga sesleri eşliğinde soğuk bir şarap veya imza kokteyl yudumlarken batan güneşe kadeh kaldırmak otelimizin en sevilen ritüelidir.</p>\n<h2>Dingin Akşam Sohbetleri</h2>\n<p>Kızıllığın yerini yıldızlı Ege gecesine bıraktığı anlarda serinleyen dağ esintisi sohbetlerinizi ferahlatır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/beach.jpg','Mare & Monte Editör Ekibi',8,'Altınolukta Gün Batımı','Altınoluk’ta Gün Batımı: Kuzey Ege Akşamlarının Büyüsü','Edremit Körfezi’nde güneş batarken gökyüzünün kızıl tonları ve Midilli Adası silueti. En güzel gün batımı izleme noktaları.','/blog/altinolukta-gun-batimi-keyfi','/assets/images/beach.jpg',1,'2026-09-18 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(26,5,'Altınoluk\'ta Kış Tatili: Kazdağları\'nın Dört Mevsim Hali','altinolukta-kis-tatili','Kışın Altınoluk; dalgaların hırçın sesi, Kaz Dağları zirvelerindeki beyaz kar örtüsü ve sokakların ıssız zarafetiyle bambaşka bir ruha bürünür....','<h2>Yaz Kalabalığından Uzak Sessiz Bir Vaha</h2>\n<p>Kışın Altınoluk; dalgaların hırçın sesi, Kaz Dağları zirvelerindeki beyaz kar örtüsü ve sokakların ıssız zarafetiyle bambaşka bir ruha bürünür.</p>\n<h2>Şömineli Kış Salonumuzda Butik Keyif</h2>\n<p>Mare & Monte’un 8 masalık butik kış salonunda, çıtırdayan şömine ateşi eşliğinde sıcak şarap, Ege kış mezeleri ve uzun dost meclisleri sizi bekler.</p>\n<h2>Kışın Yapılabilecek Aktiviteler</h2>\n<p>Kış güneşi altında kordon yürüyüşleri, termal kaplıca ziyaretleri ve dağ eteklerinde doğa fotoğrafları çekmek ruhu dinlendirir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/winter-lounge.jpg','Mare & Monte Editör Ekibi',9,'Altınolukta Kış Tatili','Altınoluk’ta Kış Tatili: Şömineli Salon, Şarap ve Huzur','Altınoluk kışın nasıl olur? 12 ay açık butik otel konsepti, şömineli salon, karlı dağ manzaraları ve kış dinginliği.','/blog/altinolukta-kis-tatili','/assets/images/winter-lounge.jpg',1,'2026-09-19 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(27,5,'+16 Yetişkin Oteli Nedir? Sakin Tatil Arayanlar İçin Rehber','16-yetiskin-oteli-nedir-sakin-tatil','Yetişkin otelleri; yoğun iş temposundan, şehir karmaşasından ve çocuk seslerinden uzakta, tamamen dinlenmeye ve romantizme odaklanmış bir tatil vadeden konseptlerdir....','<h2>Adult Only (+16) Konseptinin Temel Amacı</h2>\n<p>Yetişkin otelleri; yoğun iş temposundan, şehir karmaşasından ve çocuk seslerinden uzakta, tamamen dinlenmeye ve romantizme odaklanmış bir tatil vadeden konseptlerdir.</p>\n<h2>Mare &amp; Monte’da +16 Huzuru</h2>\n<p>Tesisimizde plajda, restoranda ve odalarda kesintisiz bir sessizlik hakimdir. Misafirlerimiz diledikleri gibi kitap okuyabilir, sakin müzikler eşliğinde tatilin tadını çıkarabilir.</p>\n<h2>Kimler İçin Uygundur?</h2>\n<p>Balayı çiftleri, romantik bir mola arayanlar, uzaktan çalışan dijital göçebeler ve kaliteli bir dinlenme arzulayan tüm yetişkinler için idealdir.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/room-sea-balcony.jpg','Mare & Monte Editör Ekibi',8,'+16 Yetişkin Oteli Nedir','+16 Yetişkin Oteli Nedir? Sessiz ve Dingin Tatil Rehberi','Adult Only konsepti nedir? +16 yaş kuralı uygulayan butik otellerin avantajları, kimler için uygundur ve tatil deneyimi.','/blog/16-yetiskin-oteli-nedir-sakin-tatil','/assets/images/room-sea-balcony.jpg',1,'2026-09-20 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(28,5,'Altınoluk\'ta Denize Sıfır Butik Otel Deneyimi','altinolukta-denize-sifir-butik-otel-deneyimi','Otel odanızın kapısını açtığınızda deniz meltemini içinize çekmek, birkaç adımda kumların üzerine basabilmek tatilinizi eşsiz kılar....','<h2>Denizle Bütünleşen Bir Tatil Hayali</h2>\n<p>Otel odanızın kapısını açtığınızda deniz meltemini içinize çekmek, birkaç adımda kumların üzerine basabilmek tatilinizi eşsiz kılar.</p>\n<h2>Mare &amp; Monte’un 1985’ten Gelen Eşsiz Konumu</h2>\n<p>Altınoluk sahilinde denize sıfır konumlanan otelimiz, 22 seçkin odasıyla misafirlerine Ege’nin maviliğini her an yaşatır.</p>\n<h2>Bistro Bahçesi ve Dalga Sesleri</h2>\n<p>Akşam yemeğinizi yerken kıyıya vuran dalgaların sesi, müziğinize ve sohbetinize en doğal eşlikçi olur.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/hero.jpg','Mare & Monte Editör Ekibi',8,'Altınolukta Denize Sıfır Butik Otel','Altınoluk’ta Denize Sıfır Butik Otel Konforu | Mare & Monte','Ege ile aranızda hiçbir engelin olmadığı denize sıfır butik konaklama. Özel plaj, Midilli manzaralı balkonlar ve bistro ayrıcalığı.','/blog/altinolukta-denize-sifir-butik-otel-deneyimi','/assets/images/hero.jpg',1,'2026-09-21 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(29,5,'Altınoluk\'ta Romantik Bir Hafta Sonu Nasıl Planlanır?','altinolukta-romantik-bir-hafta-sonu','Şehir stresinden kaçıp sevdiğinizle birlikte baş başa, dingin ve şık bir hafta sonu geçirmek istiyorsanız Altınoluk ideal bir rotadır....','<h2>Kuzey Ege’nin Dinginliğinde Baş Başa İki Gün</h2>\n<p>Şehir stresinden kaçıp sevdiğinizle birlikte baş başa, dingin ve şık bir hafta sonu geçirmek istiyorsanız Altınoluk ideal bir rotadır.</p>\n<h2>Deniz Manzaralı Balkonda Gün Doğumu</h2>\n<p>Odanızın balkonunda Ege Denizi’ne karşı taze demlenmiş kahveyle güne başlamak romantizmin ilk adımıdır.</p>\n<h2>Mum Işığında Bistro Akşamı</h2>\n<p>Asırlık çınarın altında mum ışığında servis edilen taze deniz ürünleri ve yöresel şaraplar hafta sonunu taçlandırır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/gastronomy-wine.jpg','Mare & Monte Editör Ekibi',8,'Altınolukta Romantik Hafta Sonu','Altınoluk’ta Romantik Bir Hafta Sonu: Çiftler İçin Kaçış Planı','Çiftler için Kuzey Ege’de unutulmaz romantik hafta sonu programı. Gün batımı şarabı, deniz manzaralı oda ve baş başa anlar.','/blog/altinolukta-romantik-bir-hafta-sonu','/assets/images/gastronomy-wine.jpg',1,'2026-09-22 11:27:50',0,14,'2026-09-24 11:27:50','2026-09-24 13:33:28'),(30,2,'Kazdağları\'nda Doğa Yürüyüşü ve Trekking İçin Başlangıç Rehberi','kazdaglarinda-doga-yuruyusu-ve-trekking','Dünyada sadece bu dağda yetişen Kazdağı Göknarı (Abies nordmanniana equi-trojani) gibi zengin endemik türlerle çevrili patikalar yürüyüşçülere büyüleyici manzaralar sunar....','<h2>Kaz Dağları’nın Eşsiz Bitki Örtüsü ve Patikaları</h2>\n<p>Dünyada sadece bu dağda yetişen Kazdağı Göknarı (Abies nordmanniana equi-trojani) gibi zengin endemik türlerle çevrili patikalar yürüyüşçülere büyüleyici manzaralar sunar.</p>\n<h2>Başlangıç Düzeyi Rotalar</h2>\n<p>Şahindere kanyonu alt giriş parkuru, Mıhlı Çayı vadisi ve Doyran Köyü yamaçları başlangıç seviyesindeki yürüyüşçüler için son derece uygundur.</p>\n<h2>Ekipman ve Güvenlik Kuralları</h2>\n<p>Bileği kavrayan tabanlı yürüyüş ayakkabısı, nefes alan giysiler, yeterli su ve mevsimine göre rüzgarlık mutlaka yanınızda bulundurulmalıdır.</p>\n<h2>Doğa Yürüyüşü Sonrası Mare &amp; Monte’da Dinlenme</h2>\n<p>Günün yorgunluğunu otelimizin deniz manzaralı balkonunda veya plajında ayaklarınızı Ege sularına sokarak atmak mükemmel bir kapanıştır.</p>\n<div class=\"blog-cta-box\">\n  <h3>Mare & Monte Hotel & Bistro’da Unutulmaz Bir Ege Deneyimi</h3>\n  <p>Altınoluk’ta denize sıfır konumu, 450 m² asırlık çınar bistro bahçesi, +16 adult konsepti ve yenilenen modern odalarıyla Mare & Monte, Kuzey Ege tatilinizi unutulmaz kılıyor.</p>\n  <div class=\"blog-cta-links\">\n    <a href=\"/rezervasyon\" class=\"btn btn-primary\">Rezervasyon Talebi Oluştur</a>\n    <a href=\"/odalar\" class=\"btn btn-outline\">Odalarımızı Keşfedin</a>\n    <a href=\"/bistro\" class=\"btn btn-outline\">Bistro & Menü</a>\n  </div>\n</div>','/assets/images/story.jpg','Mare & Monte Editör Ekibi',9,'Kazdağlarında Doğa Yürüyüşü ve Trekking','Kaz Dağları Trekking Rehberi: Patikalar, Ekipman ve Güvenlik','Kaz Dağları’nda doğa yürüyüşü yapacaklar için başlangıç kılavuzu. Kolay ve orta parkurlar, rehberlik ve ekipman tavsiyeleri.','/blog/kazdaglarinda-doga-yuruyusu-ve-trekking','/assets/images/story.jpg',1,'2026-09-23 11:27:50',0,15,'2026-09-24 11:27:50','2026-09-24 13:33:28');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_tags`
--

DROP TABLE IF EXISTS `blog_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_tags`
--

LOCK TABLES `blog_tags` WRITE;
/*!40000 ALTER TABLE `blog_tags` DISABLE KEYS */;
INSERT INTO `blog_tags` VALUES (1,'Altınoluk','altinoluk','2026-09-24 11:27:50'),(2,'Kaz Dağları','kaz-daglari','2026-09-24 11:27:50'),(3,'Butik Otel','butik-otel','2026-09-24 11:27:50'),(4,'Denize Sıfır','denize-sifir','2026-09-24 11:27:50'),(5,'Antandros','antandros','2026-09-24 11:27:50'),(6,'Ege Mutfağı','ege-mutfagi','2026-09-24 11:27:50'),(7,'Şahindere','sahindere','2026-09-24 11:27:50'),(8,'Adatepe','adatepe','2026-09-24 11:27:50'),(9,'Trekking','trekking','2026-09-24 11:27:50'),(10,'Zeytinyağı','zeytinyagi','2026-09-24 11:27:50'),(11,'+16 Adult','16-adult','2026-09-24 11:27:50'),(12,'Kış Tatili','kis-tatili','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `blog_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `kvkk_accepted` tinyint(1) NOT NULL DEFAULT 1,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_contact_read` (`is_read`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Test Misafir 329','testguest251@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 11:48:39'),(2,'Test Misafir 290','testguest542@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 11:49:06'),(3,'<script>alert(\'xss_test\')</script>','xss937@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 11:49:53'),(4,'<script>alert(\'xss_test\')</script>','xss169@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 11:51:02'),(5,'Test Misafir 996','testguest907@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 11:51:32'),(6,'<script>alert(\'xss_test\')</script>','xss409@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 11:51:39'),(7,'Test Misafir 692','testguest702@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 13:04:11'),(8,'<script>alert(\'xss_test\')</script>','xss702@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 13:04:18'),(9,'Test Misafir 901','testguest507@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 13:07:16'),(10,'<script>alert(\'xss_test\')</script>','xss150@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 13:07:23'),(11,'Test Misafir 194','testguest685@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 13:23:31'),(12,'<script>alert(\'xss_test\')</script>','xss539@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 13:23:37'),(13,'Test Misafir 376','testguest622@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 13:24:56'),(14,'<script>alert(\'xss_test\')</script>','xss126@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 13:25:03'),(15,'Test Misafir 756','testguest424@example.com','05551234567','Otel Rezervasyon Bilgisi','Merhaba, Haziran ayı için butik otelinizde oda müsaitliği sormak istiyorum. Teşekkürler.',1,0,'::1','2026-09-24 13:33:29'),(16,'<script>alert(\'xss_test\')</script>','xss176@testdomain.com','','XSS Test','Mesaj içeriği test',1,0,'::1','2026-09-24 13:33:36');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'Doğa',
  `short_description` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `estimated_distance_km` decimal(5,1) DEFAULT NULL,
  `estimated_drive_time` varchar(50) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_dest_slug` (`slug`),
  KEY `idx_dest_sort` (`sort_order`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,'Antandros Antik Kenti','antandros-antik-kenti','Tarih & Kültür','Altınoluk’un yamacında, Troya Savaşı ve Aeneas efsanesine ev sahipliği yapan 3000 yıllık antik miras.','Antandros Antik Kenti, Altınoluk’a yalnızca 2,5 km mesafede, Kaz Dağları’nın eteklerinde yer alır. Roma dönemine ait görkemli taban mozaikleri, teras evleri ve nekropol alanı ile Kuzey Ege’nin en kıymetli arkeolojik hazinelerindendir. Mare & Monte’dan kısa bir sürüş veya yürüyüşle kolayca ulaşılabilir.','/assets/images/story.jpg',2.5,'5 dakika','https://maps.google.com/?q=Antandros+Antik+Kenti+Alt%C4%B1noluk',1,1,'Antandros Antik Kenti Gezisi | Mare & Monte Keşfet','Altınoluk sınırlarında 3000 yıllık mozaikli Roma villaları ve Aeneas rotası.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,'Şahindere Kanyonu','sahindere-kanyonu','Doğa & Macera','Kaz Dağları Milli Parkı’nın en dik ve serin kanyonu; buz gibi dağ kaynakları ve yürüyüş rotaları.','Şahindere Kanyonu, Kaz Dağları’nın Altınoluk kıyısındaki can damarıdır. Kanyonun oluşturduğu hava akımı, dağların saf oksijenini deniz meltemiyle harmanlayarak doğrudan Altınoluk kıyılarına taşır. Doğa yürüyüşü, buz gibi tatlı su göletlerinde ferahlama ve fotoğrafçılık için benzersiz bir doğa harikasıdır.','/assets/images/hero.jpg',6.0,'12 dakika','https://maps.google.com/?q=%C5%9Eahindere+Kanyonu+Alt%C4%B1noluk',2,1,'Şahindere Kanyonu Keşif Rehberi | Mare & Monte','Kaz Dağları’nın Altınoluk sırtlarındaki kanyon yürüyüşü ve doğal pınarları.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,'Adatepe Köyü & Taş Evler','adatepe-koyu','Köy & Yaşam','Zeytin ağaçlarıyla çevrili taş sokakları, korunmuş mimarisi ve dingin kahveleriyle masalsı bir Ege köyü.','Kaz Dağları’nın batı yamacında yer alan Adatepe Köyü, asırlık taş evleri, gölgeli çınar meydanı ve zeytinyağı kültürüyle Kuzey Ege’nin en iyi korunmuş köylerinden biridir. Taş kahvelerde adaçayı içebilir, köy sokaklarında fotoğraf molaları verebilirsiniz.','/assets/images/story.jpg',18.0,'25 dakika','https://maps.google.com/?q=Adatepe+K%C3%B6y%C3%BC+K%C3%BC%C3%A7%C3%BCkkuyu',3,1,'Adatepe Köyü Gezi Rehberi | Mare & Monte','Kaz Dağları taş evleri ve Ege köy atmosferi.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,'Zeus Altarı','zeus-altari','Mitoloji & Manzara','Edremit Körfezi ve Midilli Adası’nı ayaklar altına seren, mitolojide tanrıların savaşı izlediği tepe.','Adatepe Köyü girişinden kısa bir patika yürüyüşüyle ulaşılan Zeus Altarı, Homeros’un İlyada destanında tanrı Zeus’un Troya Savaşı’nı yönettiği yer olarak anılır. Buradan gün batımında Edremit Körfezi ve Midilli Adası silueti izlemek unutulmaz bir deneyimdir.','/assets/images/hero.jpg',19.0,'28 dakika','https://maps.google.com/?q=Zeus+Altar%C4%B1+Adatepe',4,1,'Zeus Altarı Manzarası | Mare & Monte','Troya Savaşı efsanesi ve Körfez gün batımı seyir tepesi.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(5,'Hasanboğuldu & Sütüven Şelalesi','hasanboguldu-ve-sutuven-selalesi','Doğa & Efsane','Zeytinli Çayı boyunca uzanan asırlık çınarlar, doğal göletler ve Emine ile Hasan’ın aşk efsanesi.','Beyoba Köyü üzerinden ulaşılan Sütüven Şelalesi ve Hasanboğuldu Göleti, Kaz Dağları Milli Parkı’nın en popüler doğa dinlenme alanlarındandır. Sabahın erken saatlerinde su sesi eşliğinde yürüyüş yapmak ve piknik rotalarını keşfetmek için harika bir durağımızdır.','/assets/images/winter-lounge.jpg',24.0,'30 dakika','https://maps.google.com/?q=Hasanbo%C4%9Fuldu+G%C3%B6leti',5,1,'Hasanboğuldu ve Sütüven Şelalesi Gezi Rehberi','Kaz Dağları şelaleleri ve gölet rotası.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(6,'Mıhlı Çayı & Tarihi Taş Köprü','mihli-cayi-ve-tarihi-tas-kopru','Doğa & Fotoğraf','Roma döneminden kalma kemerli taş köprü ve gürül gürül akan turkuaz dağ suları.','Altınoluk ile Küçükkuyu arasında yer alan Mıhlı Çayı, yemyeşil doğası ve Roma döneminden günümüze sağlam kalan taş köprüsüyle büyüleyicidir. Serin su göletleri ve asırlık incir ağaçları fotoğraf tutkunlarının gözdesidir.','/assets/images/bistro-banner.jpg',12.0,'15 dakika','https://maps.google.com/?q=M%C4%B1hl%C4%B1+%C3%87ay%C4%B1+Ta%C5%9F+K%C3%B6pr%C3%BC',6,1,'Mıhlı Çayı ve Tarihi Taş Köprü | Mare & Monte','Roma dönemi kemer köprü ve kanyon suları.','2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL DEFAULT 'Genel',
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_faqs_cat_sort` (`category`,`sort_order`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Konsept & Kurallar','Mare & Monte Hotel & Bistro +16 konsepti nedir?','Tesisimiz yetişkin misafirlerimize dingin, sessiz ve huzurlu bir tatil ortamı sunmak amacıyla +16 yaş kuralı uygulamaktadır. 16 yaşından küçük misafirler kabul edilmemektedir.',1,1,'2026-09-24 11:27:50'),(2,'Giriş & Çıkış','Otele giriş (check-in) ve çıkış (check-out) saatleri nelerdir?','Giriş saatimiz 14:00, çıkış saatimiz ise 11:00’dir. Müsaitlik durumuna göre erken giriş veya geç çıkış talepleri için resepsiyonumuz yardımcı olmaktan mutluluk duyar.',2,1,'2026-09-24 11:27:50'),(3,'Plaj & Deniz','Özel plaj kullanımı otel misafirlerine ücretsiz midir?','Evet, otelimizde konaklayan misafirlerimiz için 60 şezlong kapasiteli özel plajımızda şezlong, şemsiye ve plaj havlusu kullanımı tamamen ücretsizdir.',3,1,'2026-09-24 11:27:50'),(4,'Bistro & Gastronomi','Bistro dışarıdan gelen misafirlere açık mıdır?','Evet, Mare & Monte Bistro & Çınar Bar otel misafirlerimizin yanı sıra dışarıdan gelen konuklarımızı da ağırlamaktadır. Akşam yemekleri ve hafta sonu için önceden masa rezervasyonu önerilir.',4,1,'2026-09-24 11:27:50'),(5,'Kış Sezonu','Otel kış aylarında da açık mı?','Evet, tesisimiz 12 ay kesintisiz hizmet vermektedir. Kış aylarında 8 masalık şömineli salonumuzda şarap tadımları, Ege kış lezzetleri ve Kaz Dağları doğası eşliğinde konaklayabilirsiniz.',5,1,'2026-09-24 11:27:50'),(6,'Ulaşım & Otopark','Otele nasıl ulaşabilirim ve otopark mevcut mu?','Balıkesir Koca Seyit Havalimanı’na yaklaşık 35 km mesafedeyiz. Altınoluk sahil bandında yer alan tesisimizin yakınında misafirlerimiz için araç park imkânı bulunmaktadır.',6,1,'2026-09-24 11:27:50'),(7,'Evcil Hayvan','Evcil hayvan kabul ediyor musunuz?','Hijyen ve diğer misafirlerimizin konfor standartları gereği tesisimizde evcil hayvan kabul edilememektedir.',7,1,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Genel Tesis & Atmosfer','genel-tesis-ve-atmosfer','Mare & Monte Hotel & Bistro genel fotoğraf seçkisi',1,1,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'hotel',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_gallery_cat_sort` (`category`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
INSERT INTO `gallery_images` VALUES (1,1,'/assets/images/hero.jpg','Denize Sıfır Konum','Mare Monte denize sıfır plaj ve otel manzarası','Körfezin masmavi sularına açılan cephemiz','hotel',1,1,'2026-09-24 11:27:50'),(2,1,'/assets/images/story.jpg','Otel Bahçesi ve Tarihî Doku','Mare Monte otel bahçe alanı ve mimari','1985’ten günümüze uzanan Ege zarafeti','hotel',2,1,'2026-09-24 11:27:50'),(3,1,'/assets/images/beach.jpg','Özel Plaj ve İskele','Mare Monte 60 şezlonglu özel plaj alanı','Kristal berraklığında Kuzey Ege denizi','beach',3,1,'2026-09-24 11:27:50'),(4,1,'/assets/images/bistro-banner.jpg','Çınar Bar & Bistro Bahçesi','Asırlık çınar altında bistro masaları','450 m² gölgeli bahçede keyifli saatler','bistro',4,1,'2026-09-24 11:27:50'),(5,1,'/assets/images/gastronomy-fish.jpg','Taze Deniz Ürünleri','Körfezden taze balık ve ızgara lezzetleri','Mevsimin en taze deniz mahsulleri','gastronomy',5,1,'2026-09-24 11:27:50'),(6,1,'/assets/images/gastronomy-aegean.jpg','Geleneksel Ege Mezeleri','Zeytinyağlı Ege otları ve gurme mezeler','Kaz Dağları otları ve soğuk sıkım zeytinyağı','gastronomy',6,1,'2026-09-24 11:27:50'),(7,1,'/assets/images/gastronomy-wine.jpg','Şarap Kavı Seçkisi','Şarap kadehleri ve şömine atmosferi','Seçkin yerli ve uluslararası şarap koleksiyonu','gastronomy',7,1,'2026-09-24 11:27:50'),(8,1,'/assets/images/winter-lounge.jpg','Şömineli Kış Salonu','Kışın yanan şömine başında butik oturma alanı','12 ay açık konseptte sıcacık kış akşamları','hotel',8,1,'2026-09-24 11:27:50'),(9,1,'/assets/images/room-sea-balcony.jpg','Deniz Manzaralı Oda İçi','Ferah deniz manzaralı balkonlu oda','Güne Ege mavisiyle uyanma ayrıcalığı','rooms',9,1,'2026-09-24 11:27:50'),(10,1,'/assets/images/room-mountain-standard.jpg','Standart Dağ Manzaralı Oda','Kaz Dağları manzaralı konforlu oda','Doğanın kalbinde huzurlu bir uyku','rooms',10,1,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `email` varchar(191) NOT NULL,
  `attempted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_successful` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_attempts_ip` (`ip_address`,`attempted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` int(10) unsigned NOT NULL,
  `mime_type` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_media_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) NOT NULL DEFAULT '_self',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_menu_items_menu` (`menu_id`),
  CONSTRAINT `fk_menu_items_menu` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,NULL,'Ana Sayfa','/','_self',1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,1,NULL,'Otel','/otel','_self',2,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,1,NULL,'Odalar','/odalar','_self',3,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,1,NULL,'Bistro','/bistro','_self',4,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(5,1,NULL,'Plaj','/plaj','_self',5,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(6,1,NULL,'Keşfet','/kesfet','_self',6,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(7,1,NULL,'Galeri','/galeri','_self',7,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(8,1,NULL,'Blog','/blog','_self',8,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(9,1,NULL,'İletişim','/iletisim','_self',9,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(10,2,NULL,'Otel & Hikâye','/otel','_self',1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(11,2,NULL,'Odalarımız','/odalar','_self',2,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(12,2,NULL,'Bistro & Çınar Bar','/bistro','_self',3,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(13,2,NULL,'Özel Plaj','/plaj','_self',4,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(14,2,NULL,'Kaz Dağları & Keşfet','/kesfet','_self',5,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(15,2,NULL,'Fotoğraf Galerisi','/galeri','_self',6,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(16,2,NULL,'Rehber & Blog','/blog','_self',7,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(17,2,NULL,'İletişim & Konum','/iletisim','_self',8,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(18,2,NULL,'Sıkça Sorulan Sorular','/sss','_self',9,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(19,2,NULL,'KVKK Aydınlatma Metni','/kvkk','_self',10,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(20,2,NULL,'Gizlilik Politikası','/gizlilik-politikasi','_self',11,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(21,2,NULL,'Çerez Politikası','/cerez-politikasi','_self',12,'2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Ana Menü','header','2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,'Alt Menü','footer','2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_sections`
--

DROP TABLE IF EXISTS `page_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(100) NOT NULL,
  `section_key` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `extra_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra_json`)),
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_sections_page_sort` (`page_slug`,`sort_order`,`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_sections`
--

LOCK TABLES `page_sections` WRITE;
/*!40000 ALTER TABLE `page_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_pages_published` (`is_published`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'KVKK Aydınlatma Metni','kvkk','6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca aydınlatma metnidir.','<h2>1. Veri Sorumlusu</h2><p>Mare & Monte Hotel & Bistro olarak 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca kişisel verilerinizin güvenliğine azami hassasiyet göstermekteyiz. Veri sorumlusu sıfatıyla işletmemiz; ad, soyad, telefon numarası, e-posta adresi, konaklama tarihleri ve fatura bilgileri gibi kişisel verilerinizi kanuni sınırlar çerçevesinde işlemektedir.</p><h2>2. Kişisel Verilerin İşlenme Amacı</h2><p>Toplanan kişisel verileriniz; rezervasyon taleplerinizin karşılanması, konaklama sözleşmesinin ifası, müşteri ilişkileri süreçlerinin yönetilmesi, yasal yükümlülüklerimizin (Kimlik Bildirme Kanunu vb.) yerine getirilmesi ve talep ettiğiniz iletişim faaliyetlerinin yürütülmesi amaçlarıyla işlenmektedir.</p><h2>3. Verilerin Aktarılması</h2><p>Kişisel verileriniz, yasal zorunluluklar gereği yetkili kamu kurum ve kuruluşları (Emniyet / Jandarma Kimlik Bildirim Sistemi) haricinde hiçbir üçüncü şahıs veya kuruma ticari amaçla aktarılmaz ve satılmaz.</p><h2>4. Haklarınız</h2><p>KVKK 11. maddesi uyarınca veri sahipleri; kişisel verilerinin işlenip işlenmediğini öğrenme, işlenmişse buna ilişkin bilgi talep etme, işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme ve silinmesini isteme hakkına sahiptir. Başvurularınızı <strong>info@maremonte.com.tr</strong> adresine iletebilirsiniz.</p><div class=\"legal-alert\"><em>Not: Bu metin genel bilgilendirme amacıyla hazırlanmış olup, işletmenin güncel hukuki danışmanı tarafından doğrulanması tavsiye edilir.</em></div>','KVKK Aydınlatma Metni | Mare & Monte Hotel & Bistro','Kişisel Verilerin Korunması Kanunu uyarınca aydınlatma ve bilgilendirme metni.',NULL,NULL,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,'Gizlilik Politikası','gizlilik-politikasi','Mare & Monte web sitesi gizlilik prensipleri ve veri güvenliği standartları.','<h2>Gizlilik Prensiplerimiz</h2><p>Mare & Monte Hotel & Bistro olarak, web sitemizi ziyaret eden tüm misafirlerimizin mahremiyetine ve kişisel gizliliğine saygı duyuyoruz. Bu Gizlilik Politikası, sitemizi ziyaret ettiğinizde ve hizmetlerimizden yararlandığınızda verilerinizin nasıl korunduğunu açıklamaktadır.</p><h2>Veri Güvenliği ve Şifreleme</h2><p>Web sitemiz üzerinden paylaştığınız iletişim formu ve rezervasyon talebi bilgileri SSL şifreleme protokolleri ile güvence altındadır. Sitemiz kredi kartı bilgilerini kendi sunucularında kesinlikle saklamaz.</p><h2>İletişim İzinleri</h2><p>Tarafımıza ilettiğiniz iletişim bilgileri sadece talep ettiğiniz konaklama, bistro rezervasyonu veya bilgi edinme süreçlerinde sizinle irtibat kurmak üzere kullanılır. İzniniz olmaksızın pazarlama mesajları gönderilmez.</p><div class=\"legal-alert\"><em>Not: Bu metin genel bilgilendirme amacıyla hazırlanmış olup, işletmenin güncel hukuki danışmanı tarafından doğrulanması tavsiye edilir.</em></div>','Gizlilik Politikası | Mare & Monte Hotel & Bistro','Web sitemiz veri gizliliği politikası ve kullanıcı güvenliği taahhütleri.',NULL,NULL,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,'Çerez Politikası','cerez-politikasi','Web sitesi çerez (cookie) kullanımı ve tercih yönetimi.','<h2>Çerez (Cookie) Kullanımı</h2><p>Web sitemizde kullanıcı deneyiminizi geliştirmek, gezinme performansını artırmak ve site güvenliğini sağlamak amacıyla teknik ve zorunlu çerezler kullanılmaktadır.</p><h2>Kullanılan Çerez Türleri</h2><ul><li><strong>Zorunlu Çerezler:</strong> Web sitesinin temel fonksiyonlarının çalışması, oturum yönetimi ve CSRF güvenlik denetimleri için gereklidir.</li><li><strong>Performans Çerezleri:</strong> Sayfa yükleme hızlarını optimize etmek ve ziyaretçi akışını anonim olarak analiz etmek amacıyla kullanılır.</li></ul><h2>Çerez Tercihlerinizi Nasıl Yönetebilirsiniz?</h2><p>Tarayıcınızın ayarlarından çerez kullanımını dilediğiniz zaman sınırlandırabilir veya tamamen engelleyebilirsiniz. Zorunlu çerezlerin kapatılması durumunda sitenin bazı fonksiyonları beklendiği gibi çalışmayabilir.</p><div class=\"legal-alert\"><em>Not: Bu metin genel bilgilendirme amacıyla hazırlanmış olup, işletmenin güncel hukuki danışmanı tarafından doğrulanması tavsiye edilir.</em></div>','Çerez Politikası | Mare & Monte Hotel & Bistro','Sitemizde kullanılan çerezler ve gizlilik tercihleri hakkında detaylı bilgi.',NULL,NULL,1,'2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,'İptal ve İade Koşulları','iptal-ve-iade-kosullari',NULL,'<h2>İptal ve İade Politikamız</h2><p>Mare & Monte Hotel & Bistro olarak misafir memnuniyetini ön planda tutmaktayız. Giriş tarihinden 7 gün öncesine kadar yapılan iptallerde ön ödeme kesintisiz iade edilir. 7 günden daha az süre kala yapılan iptallerde 1 gecelik konaklama bedeli tahsil edilmektedir.</p>','İptal ve İade Koşulları | Mare & Monte','Mare & Monte rezervasyon iptal ve iade politikası.',NULL,NULL,1,'2026-09-24 11:47:51','2026-09-24 11:47:51');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redirects`
--

DROP TABLE IF EXISTS `redirects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redirects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) NOT NULL,
  `status_code` smallint(5) unsigned NOT NULL DEFAULT 301,
  `hit_count` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `old_url` (`old_url`),
  KEY `idx_redirects_old` (`old_url`,`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redirects`
--

LOCK TABLES `redirects` WRITE;
/*!40000 ALTER TABLE `redirects` DISABLE KEYS */;
/*!40000 ALTER TABLE `redirects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_notes`
--

DROP TABLE IF EXISTS `reservation_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_notes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reservation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_res_notes_res` (`reservation_id`),
  CONSTRAINT `fk_res_notes_res` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_notes`
--

LOCK TABLES `reservation_notes` WRITE;
/*!40000 ALTER TABLE `reservation_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reservation_code` varchar(50) NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `adults` tinyint(3) unsigned NOT NULL DEFAULT 2,
  `nights` smallint(5) unsigned NOT NULL DEFAULT 1,
  `total_estimated_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL,
  `promo_code` varchar(50) DEFAULT NULL,
  `status` enum('new','reviewing','confirmed','cancelled','completed','no_show') NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `kvkk_accepted` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservation_code` (`reservation_code`),
  KEY `idx_res_dates` (`check_in_date`,`check_out_date`),
  KEY `idx_res_status` (`status`),
  KEY `idx_res_code` (`reservation_code`),
  KEY `fk_reservations_room` (`room_id`),
  CONSTRAINT `fk_reservations_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,'MM-2026-7313D7',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon1924@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 11:48:41','2026-09-24 11:48:41'),(2,'MM-2026-8C4118',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon2475@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 11:49:08','2026-09-24 11:49:08'),(3,'MM-2026-78CBB6',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon4135@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 11:51:34','2026-09-24 11:51:34'),(4,'MM-2026-52117D',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon2192@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 13:04:14','2026-09-24 13:04:14'),(5,'MM-2026-1CD04F',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon9333@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 13:07:18','2026-09-24 13:07:18'),(6,'MM-2026-BD1967',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon5735@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 13:23:33','2026-09-24 13:23:33'),(7,'MM-2026-98D5E8',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon9509@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 13:24:58','2026-09-24 13:24:58'),(8,'MM-2026-1E20C0',1,'2026-09-27','2026-09-30',2,3,11400.00,'Deniz','Yılmaz','rezervasyon2396@testdomain.com','05321112233','','','new',NULL,1,'::1','2026-09-24 13:33:32','2026-09-24 13:33:32');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `label` varchar(100) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','Süper Yönetici','[\"*\"]','2026-09-24 11:27:50'),(2,'editor','Editör','[\"content.view\", \"content.edit\", \"blog.*\", \"gallery.*\", \"bistro.*\", \"reservations.view\", \"contact.view\"]','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_amenities`
--

DROP TABLE IF EXISTS `room_amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_amenities` (
  `room_id` int(10) unsigned NOT NULL,
  `amenity_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`room_id`,`amenity_id`),
  KEY `fk_ra_amenity` (`amenity_id`),
  CONSTRAINT `fk_ra_amenity` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ra_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_amenities`
--

LOCK TABLES `room_amenities` WRITE;
/*!40000 ALTER TABLE `room_amenities` DISABLE KEYS */;
INSERT INTO `room_amenities` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,13),(1,14),(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,9),(2,12),(2,13),(2,14),(3,1),(3,2),(3,3),(3,4),(3,5),(3,6),(3,7),(3,9),(3,13),(3,14),(4,1),(4,2),(4,3),(4,4),(4,5),(4,6),(4,7),(4,9),(4,10),(4,13),(4,14);
/*!40000 ALTER TABLE `room_amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_blackout_dates`
--

DROP TABLE IF EXISTS `room_blackout_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_blackout_dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_blackouts_dates` (`room_id`,`start_date`,`end_date`),
  CONSTRAINT `fk_room_blackouts_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_blackout_dates`
--

LOCK TABLES `room_blackout_dates` WRITE;
/*!40000 ALTER TABLE `room_blackout_dates` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_blackout_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_images`
--

DROP TABLE IF EXISTS `room_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_room_images_room` (`room_id`),
  CONSTRAINT `fk_room_images_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_images`
--

LOCK TABLES `room_images` WRITE;
/*!40000 ALTER TABLE `room_images` DISABLE KEYS */;
INSERT INTO `room_images` VALUES (1,1,'/uploads/rooms/room-sea-balcony.jpg','Deniz Manzaralı Balkonlu Oda ana görünüm','Balkondan Midilli ve Ege manzarası',1,1,'2026-09-24 11:27:50'),(2,1,'/assets/images/hero.jpg','Otel denize sıfır sahil konumu','Tesisimizin denizle buluştuğu nokta',2,0,'2026-09-24 11:27:50'),(3,2,'/uploads/rooms/room-mountain-standard.jpg','Dağ Manzaralı Standart Oda yatak detayı','Sakin ve ferah dekorasyon',1,1,'2026-09-24 11:27:50'),(4,3,'/uploads/rooms/room-single.jpg','Tek Kişilik Oda genel görünüm','Kişisel konfor alanı',1,1,'2026-09-24 11:27:50'),(5,4,'/uploads/rooms/room-twin.jpg','İki Ayrı Yataklı Oda düzeni','İki bağımsız tek kişilik yatak',1,1,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `room_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_rates`
--

DROP TABLE IF EXISTS `room_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `weekend_price` decimal(10,2) DEFAULT NULL,
  `min_stay` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `note` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_rates_dates` (`room_id`,`start_date`,`end_date`),
  CONSTRAINT `fk_room_rates_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_rates`
--

LOCK TABLES `room_rates` WRITE;
/*!40000 ALTER TABLE `room_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `room_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `short_description` text DEFAULT NULL,
  `full_description` longtext DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `price_starting` decimal(10,2) NOT NULL DEFAULT 0.00,
  `weekend_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `size_sqm` int(10) unsigned NOT NULL DEFAULT 25,
  `capacity_adults` tinyint(3) unsigned NOT NULL DEFAULT 2,
  `capacity_extra_bed` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `bed_type` varchar(100) NOT NULL DEFAULT 'Çift Kişilik Büyük Yatak',
  `view_type` varchar(100) NOT NULL DEFAULT 'Deniz Manzaralı',
  `has_balcony` tinyint(1) NOT NULL DEFAULT 1,
  `total_rooms` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `min_stay_nights` tinyint(3) unsigned NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_rooms_slug` (`slug`),
  KEY `idx_rooms_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'Deniz Manzaralı Balkonlu Oda','deniz-manzarali-balkonlu-oda','Ege’nin mavisine ve Midilli Adası siluetine açılan, özel balkonlu ve ferah konaklama deneyimi.','Mare & Monte’un en ayrıcalıklı kategorisi olan Deniz Manzaralı Balkonlu Odalar, uyanır uyanmaz Ege Denizi’nin berrak maviliğiyle buluşmanızı sağlar. Balkonunuzda Midilli’ye karşı kahvenizi yudumlayabilir, akşam saatlerinde gün batımının kızıla çalan tonlarına tanıklık edebilirsiniz. Doğal keten kumaşlar, sıcak kireç taşı dokuları ve modern mimari detaylarla yenilenen odamızda huzurlu bir dinlenme sizi bekliyor.','/uploads/rooms/room-sea-balcony.jpg',3800.00,4400.00,28,2,1,'King Size Çift Kişilik Yatak','Kesintisiz Ege & Midilli Manzarası',1,8,1,1,1,1,'Deniz Manzaralı Balkonlu Oda | Mare & Monte Altınoluk','Altınoluk’ta denize sıfır, özel balkonlu ve Midilli manzaralı lüks butik oda. 28 m² ferah yaşam alanı.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,'Dağ Manzaralı Standart Oda','dag-manzarali-standart-oda','Kaz Dağları’nın çam kokulu serinliğini ve asırlık zeytinliklerin dinginliğini odanıza taşıyan huzurlu alan.','Kaz Dağları’nın görkemli siluetine bakan bu odalarımız, doğanın sakinleştirici gücünü arayan misafirlerimiz için tasarlandı. Ses yalıtımlı mimari, konforlu yatak tasarımı ve geniş banyo alanıyla günün yorgunluğunu atmak için mükemmel bir sığınaktır. Hem yazın deniz dönüşü serinliği hem kış aylarında Kaz Dağları’nın dinginliğini hissettirir.','/uploads/rooms/room-mountain-standard.jpg',3100.00,3600.00,24,2,0,'Geniş Çift Kişilik Yatak','Kaz Dağları & Doğa Manzarası',0,7,1,2,1,1,'Dağ Manzaralı Standart Oda | Mare & Monte Altınoluk','Kaz Dağları manzaralı, modern yenilenmiş standart butik oda. Konforlu ve huzurlu konaklama.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,'Tek Kişilik Oda','tek-kisilik-oda','Yalnız seyahat edenler ve iş-tatil gezginleri için fonksiyonel, şık ve dingin bireysel alan.','Bireysel seyahat eden misafirlerimizin tüm ihtiyaçları gözetilerek minimal ve sıcak bir estetikle kurgulanan Tek Kişilik Odalarımız, konfordan ödün vermeden dingin bir konaklama sunar. Yüksek hızlı Wi-Fi, çalışma köşesi ve rahat ortopedik yatağıyla hem dinlenme hem de uzaktan çalışma için idealdir.','/uploads/rooms/room-single.jpg',2200.00,2600.00,18,1,0,'Konforlu Tek Kişilik Yatak','Şehir & Bahçe Manzarası',0,3,1,3,1,1,'Tek Kişilik Butik Oda | Mare & Monte Altınoluk','Altınoluk’ta tek kişilik konaklama için tasarlanmış şık, modern ve fonksiyonel butik otel odası.','2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,'İki Ayrı Yataklı Oda','iki-ayri-yatakli-oda','Dostlar ve aile bireyleri için bağımsız uyku konforu sunan, aydınlık ve yenilenmiş oda seçeneği.','Birbirinden bağımsız iki adet tek kişilik yatak düzeniyle konforlu bir paylaşım sunan odalarımız; arkadaş grupları veya birlikte seyahat eden yakınlar için ideal bir yerleşim sağlar. Ege esintili açık renk paleti, ferah tavan yüksekliği ve modern banyosu ile tatilinizi keyfe dönüştürür.','/uploads/rooms/room-twin.jpg',3200.00,3700.00,26,2,0,'2 Adet Bağımsız Tek Kişilik Yatak','Kısmi Deniz & Bahçe Manzarası',1,4,1,4,1,1,'İki Ayrı Yataklı Oda | Mare & Monte Altınoluk','Altınoluk’ta iki ayrı yataklı modern ve ferah butik konaklama seçeneği.','2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` longtext DEFAULT NULL,
  `setting_group` varchar(50) NOT NULL DEFAULT 'general',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`),
  KEY `idx_settings_group` (`setting_group`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'hotel_name','Mare & Monte Hotel & Bistro','general','2026-09-24 11:27:50','2026-09-24 11:27:50'),(2,'hotel_short_name','Mare & Monte','general','2026-09-24 11:27:50','2026-09-24 11:27:50'),(3,'tagline','Ege’nin Kıyısında, Kaz Dağları’nın Eteğinde Butik Yaşam','general','2026-09-24 11:27:50','2026-09-24 11:27:50'),(4,'phone_primary','0542 414 38 94','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(5,'phone_secondary','0266 396 17 30','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(6,'whatsapp_number','905424143894','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(7,'whatsapp_message','Merhaba, Mare & Monte hakkında bilgi ve rezervasyon almak istiyorum.','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(8,'email_general','info@maremonte.com.tr','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(9,'email_reservation','rezervasyon@maremonte.com.tr','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(10,'address_street','İskele Mahallesi Cevdet Sunay Caddesi No:15','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(11,'address_city','Altınoluk, Edremit, Balıkesir','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(12,'address_postal','10870','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(13,'address_country','Türkiye','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(14,'google_maps_url','https://www.google.com/maps?q=İskele+Mahallesi+Cevdet+Sunay+Caddesi+No:15+Altınoluk+Edremit+Balıkesir+Mare+Monte+Otel&output=embed','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(15,'geo_latitude','39.5694','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(16,'geo_longitude','26.7289','contact','2026-09-24 11:27:50','2026-09-24 11:27:50'),(17,'concept_adult_only','1','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(18,'concept_min_age','16','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(19,'checkin_time','14:00','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(20,'checkout_time','11:00','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(21,'pet_policy','Tesisimizde evcil hayvan kabul edilmemektedir.','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(22,'total_room_count','22','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(23,'beach_capacity_loungers','60','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(24,'bistro_garden_area_sqm','450','bistro','2026-09-24 11:27:50','2026-09-24 11:27:50'),(25,'open_all_year','1','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(26,'currency','TRY','hotel','2026-09-24 11:27:50','2026-09-24 11:27:50'),(27,'instagram_handle','@maremontehotelbistro','social','2026-09-24 11:27:50','2026-09-24 11:27:50'),(28,'instagram_url','https://instagram.com/maremontehotelbistro','social','2026-09-24 11:27:50','2026-09-24 11:27:50'),(29,'facebook_url','https://facebook.com/maremontehotelbistro','social','2026-09-24 11:27:50','2026-09-24 11:27:50'),(30,'default_meta_title','Mare & Monte Hotel & Bistro | Altınoluk Denize Sıfır Butik Otel','seo','2026-09-24 11:27:50','2026-09-24 11:27:50'),(31,'default_meta_description','Altınoluk’ta denize sıfır, Midilli manzaralı, +16 adult konseptli butik otel ve bistro. Kaz Dağları eteğinde asırlık çınar bahçesi ve Ege mutfağı.','seo','2026-09-24 11:27:50','2026-09-24 11:27:50'),(32,'default_og_image','/assets/images/hero.jpg','seo','2026-09-24 11:27:50','2026-09-24 11:27:50'),(33,'footer_copyright_notice','İletişim, oda fiyatı ve kurumsal NAP bilgilerinin işletme tarafından doğrulanması tavsiye edilir.','general','2026-09-24 11:27:50','2026-09-24 11:27:50'),(34,'hero_mode','image','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(35,'hero_eyebrow','Altınoluk · Denize Sıfır · +16 Adult Only','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(36,'hero_title','Ege’nin kıyısında, Kaz Dağları’nın eteğinde zamansız bir dinginlik.','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(37,'hero_subtitle','Midilli manzarası, denize sıfır özel plaj, asırlık çınar gölgeli bistro bahçesi ve 12 ay açık butik konforla Mare & Monte.','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(38,'hero_primary_cta_text','Rezervasyon Talebi','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(39,'hero_primary_cta_link','/rezervasyon','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(40,'hero_secondary_cta_text','Odalarımızı İnceleyin','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(41,'hero_secondary_cta_link','/odalar','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(42,'hero_image_desktop','/assets/images/hero.jpg','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(43,'hero_image_mobile','/assets/images/hero.jpg','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(44,'hero_video_url','','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50'),(45,'hero_video_poster','/assets/images/hero.jpg','homepage','2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  `author_location` varchar(100) DEFAULT NULL,
  `room_stayed` varchar(100) DEFAULT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `comment` text NOT NULL,
  `stay_date` varchar(50) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idx_testim_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Zeynep & Murat K.','İstanbul','Deniz Manzaralı Balkonlu Oda',5,'Kuzey Ege’de aradığımız dinginliği sonunda bulduk. Sabah balkondan Midilli’ye bakarak uyanmak, asırlık çınarın gölgesinde taze levrek yemek inanılmaz bir deneyimdi. Yenilenen odalar tertemiz.','Ağustos 2026',1,1,1,'2026-09-24 11:27:50'),(2,'Caner T.','İzmir','Dağ Manzaralı Standart Oda',5,'Kaz Dağları’na yakınlığı ve denize sıfır olması müthiş bir denge sağlıyor. +16 konsepti sayesinde plajda gürültüden uzak, gerçek bir dinlenme yaşadık. Bistro personeli ve şarap seçkisi harikaydı.','Temmuz 2026',1,1,2,'2026-09-24 11:27:50'),(3,'Selin D.','Ankara','Deniz Manzaralı Balkonlu Oda',5,'1985’ten gelen köklü ruhun modern bir zarafetle buluşması çok başarılı. Kışın şömineli salonda şarap içmek için şimdiden yerimizi ayırttık.','Eylül 2026',1,1,3,'2026-09-24 11:27:50');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL DEFAULT 'editor',
  `name` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_users_role` (`role`),
  KEY `idx_users_status` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super_admin','Mare Monte Yönetici','admin@maremonte.com.tr','$2y$10$2FYBxb8HoQ853nN1ZFkU..1.ZS6PNOhpWCzQqFEf7fJvonXerlGxC',1,'2026-09-24 13:33:38','2026-09-24 11:27:50','2026-09-24 13:33:38'),(2,'editor','İçerik Editörü','editor@maremonte.com.tr','$2y$10$0AoyfR2dnqyfk8ELzwSKBu3ExXEFe4VAKA0icbFi2Uy8TvX/N.0AS',1,NULL,'2026-09-24 11:27:50','2026-09-24 11:27:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-24 13:35:45
