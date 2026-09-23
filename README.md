# Mare & Monte Hotel & Bistro — Web Uygulaması

> **Lüks Butik Otel & Ege Kaçamağı (+16 Yetişkin Oteli)**  
> Altınoluk / Edremit / Kaz Dağları, Balıkesir

---

## 🏛️ Proje Hakkında
1985 yılında M. Erinç & Aycan Ersöz tarafından kurulan ve 2026 yılında Dr. Levent Özdemir tarafından tamamen yenilenen **Mare & Monte Hotel & Bistro**, Kaz Dağları'nın bol oksijenli eteklerinde, Ege Denizi'nin kıyısında +16 yetişkin konseptiyle 12 ay boyunca hizmet vermektedir.

Bu proje; modern, minimalist, sıcak terakota ve keten tonlarına sahip, dünya standartlarında 5 yıldızlı lüks butik otel web deneyimi sunmak üzere tasarlanmış ve geliştirilmiştir.

---

## 🗄️ Canlı Veritabanı & Kurulum (Production Setup)

Canlı sunucuda veritabanını kurmak ve yapılandırmak için 2 kolay yöntem bulunmaktadır:

### 1. Web Tabanlı 1-Tıkla Kurulum Sihirbazı (Önerilen)
Tarayıcınızdan **`http://siteadresiniz.com/install.php`** adresine gidin.
Sihirbaz aşağıdaki canlı veritabanı bilgileriyle önceden doldurulmuştur:
- **Veritabanı Sunucusu:** `localhost`
- **Veritabanı Adı:** `maresite`
- **Veritabanı Kullanıcısı:** `maresite`
- **Veritabanı Şifresi:** `Maresite1122334455..`
- **Varsayılan Yönetici:** `admin` / `Maremonte2026!`

Kurulum tamamlandığında tablolar oluşturulur, `includes/db.php` canlı bağlantı için yapılandırılır ve kilitlenir.

### 2. phpMyAdmin veya MySQL ile Manuel İçe Aktarma
- `install.sql` dosyasını phpMyAdmin veya MySQL paneliniz üzerinden `maresite` veritabanına içe aktarabilirsiniz.

---

## 🔐 Yönetici Paneli (Reservations Dashboard)
Otel yönetimi gelen tüm rezervasyonları görüntüleyebilir, durumlarını güncelleyebilir ve misafirle tek tıkla WhatsApp veya telefonla iletişime geçebilir.
- **Panel Adresi:** `http://siteadresiniz.com/admin/`
- **Kullanıcı Adı:** `admin`
- **Şifre:** `Maremonte2026!`

---

## ✨ Özellikler & Fonksiyonlar
- **Tasarım Dili:** Sıcak yulaf & keten arka plan, Ege terakota ve altın tonları, zarif *Cormorant Garamond* & *Plus Jakarta Sans* tipografisi.
- **Kusursuz Mobil Deneyim:** Tüm akıllı telefonlarda kırılmayan logo, 2 sütunlu hızlı rezervasyon motoru, dokunmatik menü ve optimize edilmiş butonlar.
- **+16 Yetişkin Oteli & 12 Ay Açık:** Özel plaj, 450 m² Çınar Bistro & Bar, kışın 8 masalı şömineli lobi.
- **22 Yenilenmiş Oda:** Deniz Manzaralı Balkonlu, Dağ Manzaralı Standart, İki Ayrı Yataklı (Twin), Tek Kişilik (Single).
- **Çift Dil Desteği (TR / EN):** İstemci tarafında anında Türkçe / İngilizce dil değişimi (`i18n.js`).
- **Rezervasyon & Concierge Sistemi:** Giriş/Çıkış tarihi seçici, oda ve kişi seçimi, doğrudan MySQL veritabanına kayıt, JSON yedeği ve WhatsApp entegrasyonu.
- **Kaz Dağları & Çevre Rehberi:** Assos, Adatepe, Zeus Altarı, Antandros Antik Kenti ve tekne turları tanıtımları.
- **Fotoğraf Galerisi & Lightbox:** Yüksek çözünürlüklü lüks fotoğraf galerisi.

---

## 📁 Proje Yapısı
```
maremontesite/
├── admin/
│   ├── index.php             # Rezervasyon yönetim paneli
│   ├── login.php             # Yönetici giriş sayfası
│   └── logout.php            # Güvenli çıkış işlemi
├── api/
│   └── rezervasyon.php       # Rezervasyon API (MySQL + JSON + WhatsApp)
├── assets/
│   ├── css/
│   │   └── style.css         # Ana stil dosyası & responsive kurallar
│   └── js/
│       ├── i18n.js           # Türkçe / İngilizce çeviri sözlüğü
│       └── main.js           # UI etkileşimleri, modal & rezervasyon
├── data/
│   └── rezervasyonlar.json   # Rezervasyon yedek kayıtları (JSON)
├── images/                   # Yüksek çözünürlüklü fotoğraflar
├── includes/
│   ├── booking-bar.php       # Hızlı rezervasyon çubuğu bileşeni
│   ├── booking-modal.php     # Rezervasyon modal popup penceresi
│   ├── config.php            # Oda, menü ve site genel veri tabanı
│   ├── db.php                # PDO Veritabanı bağlantı yöneticisi
│   ├── footer.php            # Alt bilgi (Footer) bileşeni
│   └── header.php            # Üst navigasyon (Header) & dil seçici
├── bistro.php                # Çınar Bistro & Bar sayfası
├── galeri.php                # Fotoğraf galerisi sayfası
├── iletisim.php              # İletişim & konum sayfası
├── index.html                # Bağımsız tek sayfa HTML sürümü
├── index.php                 # PHP Ana Sayfası
├── install.php               # Canlı veritabanı kurulum sihirbazı
├── install.sql               # MySQL şema ve başlangıç verisi
├── kesfet.php                # Kaz Dağları rehberi sayfası
├── odalar.php                # Odalar & konaklama sayfası
└── plaj.php                  # Özel plaj & kış bahçesi sayfası
```

---

## 📞 İletişim Bilgileri
- **Adres:** İskele Mahallesi Cevdet Sunay Caddesi No:15 Altınoluk / Edremit / Balıkesir
- **Telefon:** 0542 414 38 94 · 0266 396 17 30
- **Web:** [yenimaremonte.com](https://yenimaremonte.com)
