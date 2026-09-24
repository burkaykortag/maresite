<?php
/**
 * Mare & Monte Hotel & Bistro — Media & Gallery Helper Functions
 */

require_once __DIR__ . '/db.php';

/**
 * Get all media items or filtered by category
 * @param string|null $category
 * @param bool $heroOnly
 * @return array
 */
function get_site_media($category = null, $heroOnly = false) {
    $db = getDB();
    $mediaList = [];

    if ($db) {
        try {
            // Auto create medyalar table if not exists
            $db->exec("CREATE TABLE IF NOT EXISTS `medyalar` (
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
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            $sql = "SELECT * FROM `medyalar` WHERE 1=1";
            $params = [];

            if ($heroOnly) {
                $sql .= " AND `is_hero` = 1";
            }
            if ($category && $category !== 'all') {
                $sql .= " AND `category` = :cat";
                $params[':cat'] = $category;
            }

            $sql .= " ORDER BY `sort_order` ASC, `id` DESC";
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            $mediaList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('get_site_media DB Error: ' . $e->getMessage());
        }
    }

    // JSON fallback if DB returned empty or offline
    if (empty($mediaList)) {
        $jsonFile = __DIR__ . '/../data/medyalar.json';
        if (file_exists($jsonFile)) {
            $raw = json_decode(file_get_contents($jsonFile), true) ?: [];
            foreach ($raw as $item) {
                if ($heroOnly && empty($item['is_hero'])) continue;
                if ($category && $category !== 'all' && ($item['category'] ?? '') !== $category) continue;
                $mediaList[] = $item;
            }
        }
    }

    return $mediaList;
}

/**
 * Get Hero Slider Slides
 * Returns database/JSON hero slides or default curated slides
 * @return array
 */
function get_hero_slides() {
    $customSlides = get_site_media(null, true);
    
    if (!empty($customSlides)) {
        return $customSlides;
    }

    // Default curated cinematic slides
    return [
        [
            'filepath' => 'images/01.jpg',
            'title'    => 'Ege’nin Kıyısında Yeniden Doğan Bir Hikâye',
            'subtitle' => 'Altınoluk · Kaz Dağları · Denize Sıfır · +16 Adult Only',
            'category' => 'hero'
        ],
        [
            'filepath' => 'images/08.jpg',
            'title'    => 'Midilli Manzaralı Panoramik Balkonlar',
            'subtitle' => '22 Yenilenmiş Butik Oda · Sonsuz Ege Mavisi',
            'category' => 'hero'
        ],
        [
            'filepath' => 'images/03.jpg',
            'title'    => '450 m² Asırlık Çınar Altı Bistro & Bar',
            'subtitle' => 'Gurme Ege Lezzetleri & İmza Kokteyller',
            'category' => 'hero'
        ],
        [
            'filepath' => 'images/07.jpg',
            'title'    => '12 Ay Açık · Yazın Plaj, Kışın Şömine Keyfi',
            'subtitle' => 'Kaz Dağları’nın Bol Oksijeni ile Sessiz Lüks',
            'category' => 'hero'
        ]
    ];
}
