<?php
// Mare & Monte Hotel & Bistro Configuration
define('SITE_NAME', 'Mare & Monte Hotel & Bistro');
define('SITE_TAGLINE', 'Altınoluk · Kaz Dağları · Denize Sıfır · +16 Adult Only');
define('SITE_URL', 'https://www.yenimaremonte.com');
define('PHONE_PRIMARY', '0542 414 38 94');
define('PHONE_PRIMARY_CLEAN', '+905424143894');
define('PHONE_SECONDARY', '0266 396 17 30');
define('PHONE_SECONDARY_CLEAN', '+902663961730');
define('WHATSAPP_NUMBER', '905424143894');
define('ADDRESS', 'İskele Mahallesi Cevdet Sunay Caddesi No:15, Altınoluk / Edremit / Balıkesir');
define('EMAIL_CONTACT', 'info@yenimaremonte.com');
define('GOOGLE_MAPS_EMBED', 'https://www.google.com/maps?q=%C4%B0skele%20Mahallesi%20Cevdet%20Sunay%20Caddesi%20No%3A15%20Alt%C4%B1noluk%20Edremit%20Bal%C4%B1kesir%20Mare%20Monte%20Otel&output=embed');
define('GOOGLE_MAPS_LINK', 'https://maps.google.com/?q=Mare+Monte+Hotel+Altinoluk');
define('INSTAGRAM_URL', 'https://www.instagram.com/yenimaremonte/');

// Rooms Data
$rooms = [
    [
        'id' => 'deniz-manzarali-balkonlu',
        'title' => 'Deniz Manzaralı Balkonlu Oda',
        'subtitle' => 'Ege Denizi & Midilli Adası Manzarası',
        'image' => 'images/08.jpg',
        'gallery' => ['images/08.jpg', 'images/01.jpg', 'images/07.jpg'],
        'capacity' => '2 Kişilik (+16)',
        'bed' => '1 Çift Kişilik King Size Yatak',
        'size' => '24 - 28 m²',
        'view' => 'Panoramik Deniz & Midilli Manzarası',
        'description' => 'Güne Ege Denizi’nin maviliği ve Midilli Adası’nın büyüleyici siluetiyle uyanın. Geniş özel balkonu, deniz esintisini odanıza taşıyan tasarımı ve konforlu yatağıyla unutulmaz bir konaklama deneyimi.',
        'features' => [
            'Özel Balkon & Oturma Alanı',
            'Panoramik Deniz Manzarası',
            'Klima & Isıtma',
            'Düz Ekran Smart TV',
            'Minibar & Çay/Kahve Seti',
            'Lüks Banyo & Duş',
            'Saç Kurutma Makinesi',
            'Ücretsiz Yüksek Hızlı Wi-Fi',
            'Özel Buklet & Havlu Seti',
            'Kasa (Safe Box)'
        ],
        'highlight' => 'En Çok Tercih Edilen'
    ],
    [
        'id' => 'dag-manzarali-standart',
        'title' => 'Dağ Manzaralı Standart Oda',
        'subtitle' => 'Kaz Dağları’nın Huzur Veren Yeşili',
        'image' => 'images/09.jpg',
        'gallery' => ['images/09.jpg', 'images/02.jpg'],
        'capacity' => '2 Kişilik (+16)',
        'bed' => '1 Çift Kişilik Yatak veya 2 Ayrı Yatak',
        'size' => '20 - 24 m²',
        'view' => 'Kaz Dağları & Doğa Manzarası',
        'description' => 'Kaz Dağları’nın bol oksijenli, serin ve dingin atmosferini odanızda hissedin. Sade ve zarif dekorasyonuyla günün yorgunluğunu atmak isteyenler için kusursuz bir dinlenme alanı.',
        'features' => [
            'Kaz Dağları Doğa Manzarası',
            'Klima & Isıtma',
            'Düz Ekran TV',
            'Minibar',
            'Özel Banyo & Duşakabin',
            'Saç Kurutma Makinesi',
            'Ücretsiz Wi-Fi',
            'Havlu & Buklet Ürünleri',
            'Ek Yatak Seçeneği (Talep üzerine)'
        ],
        'highlight' => 'Huzur & Doğa'
    ],
    [
        'id' => 'iki-ayri-yatakli-oda',
        'title' => 'İki Ayrı Yataklı Konforlu Oda',
        'subtitle' => 'Geniş, Ferah ve Fonksiyonel',
        'image' => 'images/11.jpg',
        'gallery' => ['images/11.jpg', 'images/08.jpg'],
        'capacity' => '2 Kişilik (+16)',
        'bed' => '2 Ayrı Tek Kişilik Konfor Yatak',
        'size' => '22 - 26 m²',
        'view' => 'Kısmi Deniz & Bahçe Manzarası',
        'description' => 'Arkadaş grupları, iş veya gezi amaçlı seyahat edenler için bağımsız ve rahat uyku konforu sunan iki ayrı yataklı modern ve aydınlık oda.',
        'features' => [
            '2 Ayrı Konforlu Yatak',
            'Geniş Gardırop ve Çalışma Alanı',
            'Klima & İklimlendirme',
            'Smart TV',
            'Minibar',
            'Modern Banyo',
            'Ücretsiz Wi-Fi',
            'Saç Kurutma Makinesi',
            'Havlu Takımı'
        ],
        'highlight' => 'Esnek Konaklama'
    ],
    [
        'id' => 'tek-kisilik-oda',
        'title' => 'Tek Kişilik Konfor Oda',
        'subtitle' => 'Bireysel Seyahatler İçin Özel ve Pratik',
        'image' => 'images/10.jpg',
        'gallery' => ['images/10.jpg', 'images/09.jpg'],
        'capacity' => '1 Kişilik (+16)',
        'bed' => '1 Geniş Tek Kişilik Yatak',
        'size' => '16 - 18 m²',
        'view' => 'Bahçe & Doğa Manzarası',
        'description' => 'Tek başına seyahat eden misafirlerimiz için fonksiyonel, kompakt, temiz ve tüm temel ihtiyaçları eksiksiz barındıran huzurlu bir konaklama alternatifi.',
        'features' => [
            '1 Kişilik Konfor Yatak',
            'Klima',
            'LCD TV',
            'Minibar',
            'Özel Banyo & Duş',
            'Hızlı Wi-Fi',
            'Saç Kurutma Makinesi',
            'Havlu & Bakım Seti'
        ],
        'highlight' => 'Bireysel & Ekonomik'
    ]
];

// Bistro Menu Categories
$menu_categories = [
    'kahvalti' => [
        'name' => 'Ege Serpme Kahvaltı',
        'badge' => '08:30 - 12:30',
        'desc' => 'Kaz Dağları eteklerinden taze organik lezzetler, Altınoluk zeytinleri ve yöresel peynirler.',
        'items' => [
            ['title' => 'Mare & Monte Gurme Ege Kahvaltısı', 'desc' => 'Altınoluk kırma yeşil zeytini, sele zeytini, Ezine peyniri, Bergama tulumu, lor & karadut reçeli, ev yapımı pişi, köy yumurtası, domates-salatalık, tereyağı, petek bal & kaymak, sınırsız demleme çay.'],
            ['title' => 'Ege Otlu & Peynirli Omlet', 'desc' => 'Kaz Dağları taze otları, köy peyniri ve zeytinyağında sotelenmiş sebzeler.'],
            ['title' => 'Çırpılmış Köy Yumurtası & Avokado', 'desc' => 'Kızarmış ekşi mayalı ekmek üzerinde avokado püresi, çırpılmış köy yumurtası ve çörek otu.']
        ]
    ],
    'mezeler' => [
        'name' => 'Ege Mezeleri & Zeytinyağlılar',
        'badge' => 'Günlük Taze',
        'desc' => 'Soğuk sıkım yerel zeytinyağımız ve günlük toplanan taze Ege otlarıyla hazırlanan enfes mezeler.',
        'items' => [
            ['title' => 'Deniz Börülcesi & Cibes Otu', 'desc' => 'Sarımsaklı zeytinyağı ve taze limon sosu eşliğinde haşlanmış diri Ege otları.'],
            ['title' => 'Girit Ezmesi & Fıstıklı Lor', 'desc' => 'Ezine peyniri, Antep fıstığı, ceviz, taze fesleğen ve sızma zeytinyağı.'],
            ['title' => 'Fava & Karamelize Soğan', 'desc' => 'Geleneksel kuru bakla ezmesi, dereotu ve zeytinyağında dinlendirilmiş kırmızı soğan.'],
            ['title' => 'Köz Patlıcan & Marine Kırmızı Biber', 'desc' => 'Odun ateşinde közlenmiş patlıcan, sarımsaklı süzme yoğurt ve ceviz yağı.']
        ]
    ],
    'deniz' => [
        'name' => 'Deniz Ürünleri & Sıcaklar',
        'badge' => 'Şefin İmzası',
        'desc' => 'Edremit Körfezi’nin taze deniz ürünleri ve ustalıkla pişirilen sıcak lezzetler.',
        'items' => [
            ['title' => 'Tereyağında Sarımsaklı & Pul Biberli Karides Güveç', 'desc' => 'Taze Körfez karidesi, sarımsak, taze domates, yeşil biber ve halis tereyağı.'],
            ['title' => 'Kalamar Tava & Özel Tarator Sos', 'desc' => 'Çıtır kaplamalı taze kalamar halkaları, cevizli ve sarımsaklı özel tarator.'],
            ['title' => 'Izgara Günlük Levrek / Çipura', 'desc' => 'Taze mevsim balığı, roka, kırmızı soğan, közlenmiş patates ve limon sos.'],
            ['title' => 'Ahtapot Izgara & Fava Yatağında', 'desc' => 'Zeytinyağı ve kekikle marine edilmiş ızgara ahtapot kolu.']
        ]
    ],
    'bar' => [
        'name' => 'Çınar Bar, Kokteyller & Şarap Kavı',
        'badge' => 'Asırlık Çınar Altında',
        'desc' => 'Bölgesel şarap seçkileri, soğuk fıçı biralar ve barmenimizin imza kokteylleri.',
        'items' => [
            ['title' => 'Mare Monte Sunset (İmza Kokteyl)', 'desc' => 'Cin, taze fesleğen, mürver çiçeği likörü, taze sıkılmış limon suyu ve tonik.'],
            ['title' => 'Kaz Dağları Breeze', 'desc' => 'Votka, taze dağ kekiği şurubu, yeşil elma suyu, zencefil ve nane.'],
            ['title' => 'Seçkin Yerli & Yabancı Şarap Kavı', 'desc' => 'Kaz Dağları, Bozcaada ve Urla bağlarından özel kırmızı, beyaz ve roze şarap seçenekleri.'],
            ['title' => 'Soğuk Fıçı Biralar & Alkolsüz Kokteyller', 'desc' => 'Geniş bira menüsü, taze meyve püreli mocktail ve kahve çeşitleri.']
        ]
    ]
];

// Discovery Spots (Kaz Dağları & Aegean Routes)
$routes = [
    [
        'title' => 'Kaz Dağları & Hasanboğuldu Şelalesi',
        'tag' => 'Doğa & Efsane',
        'dist' => '18 km',
        'desc' => 'Antik İda Dağı’nın zengin bitki örtüsü, buz gibi pınarları, şelaleleri ve büyüleyici Hasanboğuldu efsanesinin yaşandığı doğa harikası.'
    ],
    [
        'title' => 'Assos & Behramkale Antik Kenti',
        'tag' => 'Tarih & Felsefe',
        'dist' => '42 km',
        'desc' => 'Aristoteles’in felsefe okulunu kurduğu Assos Antik Kenti, Athena Tapınağı ve taş evleriyle ünlü tarihi Behramkale limanı.'
    ],
    [
        'title' => 'Zeus Altarı & Adatepe Taş Köyü',
        'tag' => 'Kültür & Manzara',
        'dist' => '22 km',
        'desc' => 'Homeros’un İlyada destanında Zeus’un Truva Savaşı’nı izlediği tepe ve restore edilmiş asırlık taş evleriyle Adatepe Köyü.'
    ],
    [
        'title' => 'Antandros Antik Kenti',
        'tag' => 'Arkeoloji',
        'dist' => '4 km',
        'desc' => 'Altınoluk sırtlarında yer alan, mozaikleri ve Roma dönemi villalarıyla dünya arkeoloji mirasının önemli duraklarından biri.'
    ],
    [
        'title' => 'Şahindere Kanyonu',
        'tag' => 'Trekking & Macera',
        'dist' => '12 km',
        'desc' => 'Kaz Dağları’nın oksijen deposu, dik kanyon yamaçları, berrak dereleri ve doğa yürüyüşü parkurları.'
    ],
    [
        'title' => 'Ege Koyları Tekne Turları',
        'tag' => 'Deniz & Koylar',
        'dist' => 'Otel Önü / İskele',
        'desc' => 'Altınoluk İskelesi’nden hareketle Akvaryum Koyu, Mıhlı Çayı ağzı ve bakir Edremit Körfezi koylarına özel tur imkânı.'
    ]
];

function get_active_nav($page, $current) {
    return ($page === $current) ? 'active' : '';
}
?>
