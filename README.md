# Mare & Monte Hotel & Bistro — Web Uygulaması

> **Lüks Butik Otel & Ege Kaçamağı (+16 Yetişkin Oteli)**  
> Altınoluk / Edremit / Kaz Dağları, Balıkesir

---

## 🏛️ Proje Hakkında
1985 yılında M. Erinç & Aycan Ersöz tarafından kurulan ve 2026 yılında Dr. Levent Özdemir tarafından tamamen yenilenen **Mare & Monte Hotel & Bistro**, Kaz Dağları'nın bol oksijenli eteklerinde, Ege Denizi'nin kıyısında +16 yetişkin konseptiyle 12 ay boyunca hizmet vermektedir.

Bu proje; modern, minimalist, sıcak terakota ve keten tonlarına sahip, dünya standartlarında 5 yıldızlı lüks butik otel web deneyimi sunmak üzere tasarlanmış ve geliştirilmiştir.

---

## ✨ Özellikler & Fonksiyonlar
- **Tasarım Dili:** Sıcak yulaf & keten arka plan, Ege terakota ve altın tonları, zarif *Cormorant Garamond* & *Plus Jakarta Sans* tipografisi.
- **+16 Yetişkin Oteli & 12 Ay Açık:** Özel plaj, 450 m² Çınar Bistro & Bar, kışın 8 masalı şömineli lobi.
- **22 Yenilenmiş Oda:** Deniz Manzaralı Balkonlu, Dağ Manzaralı Standart, İki Ayrı Yataklı (Twin), Tek Kişilik (Single).
- **Çift Dil Desteği (TR / EN):** İstemci tarafında anında Türkçe / İngilizce dil değişimi (i18n.js).
- **Rezervasyon & Concierge Sistemi:** Giriş/Çıkış tarihi seçici, oda ve kişi seçimi, doğrudan WhatsApp ve JSON tabanlı rezervasyon API'si (pi/rezervasyon.php).
- **Kaz Dağları & Çevre Rehberi:** Assos, Adatepe, Zeus Altarı, Antandros Antik Kenti ve tekne turları tanıtımları.
- **Fotoğraf Galerisi & Lightbox:** Yüksek çözünürlüklü oda, plaj, bistro ve doğa fotoğrafları için filtrelenebilir lüks galeri.
- **Mobil Uyumlu (Responsive):** Tüm akıllı telefon, tablet ve masaüstü cihazlar için optimize edilmiş arayüz.

---

## 📁 Proje Yapısı
`
maremontesite/
├── api/
│   └── rezervasyon.php       # Rezervasyon API & WhatsApp yönlendirme
├── assets/
│   ├── css/
│   │   └── style.css         # Ana stil dosyası & tasarım değişkenleri
│   └── js/
│       ├── i18n.js           # Türkçe / İngilizce çeviri sözlüğü & motoru
│       └── main.js           # UI etkileşimleri, modal, galeri & takvim
├── data/
│   └── rezervasyonlar.json   # Gelen rezervasyon kayıtları (JSON)
├── images/                   # Yüksek çözünürlüklü otel & çevre fotoğrafları
├── includes/
│   ├── booking-bar.php       # Hızlı rezervasyon çubuğu bileşeni
│   ├── booking-modal.php     # Rezervasyon modal popup penceresi
│   ├── config.php            # Oda, menü ve site genel veri tabanı
│   ├── footer.php            # Alt bilgi (Footer) bileşeni
│   └── header.php            # Üst navigasyon (Header) & dil seçici
├── bistro.php                # Çınar Bistro & Bar sayfası
├── galeri.php                # Fotoğraf galerisi sayfası
├── iletisim.php              # İletişim, konum ve ulaşım sayfası
├── index.html                # Bağımsız tek sayfa HTML sürümü
├── index.php                 # PHP Ana Sayfası
├── kesfet.php                # Kaz Dağları & Bölge Rehberi sayfası
├── odalar.php                # Odalar & Konaklama sayfası
└── plaj.php                  # Özel Plaj & Deniz sayfası
`

---

## 🚀 Kurulum & Çalıştırma

### 1. PHP / Apache (XAMPP / WAMP / Canlı Sunucu)
1. Proje dosyalarını web sunucunuzun kök dizinine (örn. c:/xampp/htdocs/maremontesite/) kopyalayın.
2. Apache servisini başlatın.
3. Tarayıcınızda http://localhost/maremontesite/ adresine gidin.

### 2. Bağımsız Statik Kullanım
- Sunucu olmadan çalıştırmak için index.html dosyasını herhangi bir modern tarayıcıda açabilirsiniz.

---

## 📞 İletişim Bilgileri
- **Adres:** İskele Mahallesi Cevdet Sunay Caddesi No:15 Altınoluk / Edremit / Balıkesir
- **Telefon:** 0542 414 38 94 · 0266 396 17 30
- **Web:** [yenimaremonte.com](https://yenimaremonte.com)
