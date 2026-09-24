<?php
$pageTitle = 'Altınoluk Denize Sıfır +16 Butik Otel & Bistro';
$pageDesc = 'Kaz Dağları’nın eteklerinde, Altınoluk’ta denize sıfır yenilenen Mare & Monte Hotel & Bistro. +16 yetişkin konsepti, 22 oda, 450 m² çınar bahçesi, özel plaj ve şömineli salon.';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <?php $heroSlides = get_hero_slides(); ?>
  <!-- =========================================================================
       CINEMATIC HERO SECTION — EMOTION-DRIVEN LUXURY RETREAT
       ========================================================================= -->
  <section class="hero-section cinematic-hero" id="anasayfa">
    <!-- Cinematic Multi-Slide Background -->
    <div class="hero-slider">
      <?php foreach ($heroSlides as $idx => $slide): ?>
        <div class="hero-slide <?php echo $idx === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo htmlspecialchars($slide['filepath']); ?>');"></div>
      <?php endforeach; ?>
    </div>

    <!-- Luxury Ambient Overlays -->
    <div class="hero-overlay-gradient"></div>
    <div class="hero-overlay-vignette"></div>

    <div class="container hero-content">
      <!-- Location & Concept Eyebrow Badge -->
      <div class="hero-badge">
        <span class="hero-badge-dot"></span>
        <span data-i18n="hero.badge">+16 Yetişkin Oteli · Altınoluk Denize Sıfır · Kaz Dağları Etekleri · 12 Ay Açık</span>
      </div>

      <!-- Powerful Emotion-Driven Slogan -->
      <h1 class="hero-title" data-i18n="hero.title">
        Ege’nin kıyısında, Kaz Dağları’nın kalbinde <em>yeniden doğan</em> bir sessiz lüks hikâyesi.
      </h1>

      <p class="hero-desc" data-i18n="hero.desc">
        Midilli Adası manzarası, 450 m² asırlık çınarların gölgesi, 60 şezlonglu özel plaj ve kışın şömine sıcaklığıyla 1985'ten bugüne uzanan butik bir sığınak.
      </p>

      <!-- Prominent Action CTAs -->
      <div class="hero-actions">
        <a href="#" data-modal-target="bookingModal" class="btn btn-primary btn-lg btn-hero-cta">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
          <span data-i18n="hero.cta_book">Hemen Rezervasyon Yap</span>
        </a>
        <a href="odalar.php" class="btn btn-secondary btn-lg">
          <span data-i18n="hero.cta_explore">Odalarımızı & Mekânı Keşfet</span>
        </a>
      </div>

      <!-- Ambiance Highlight Micro-Pills -->
      <div class="hero-ambiance-bar">
        <div class="ambiance-pill">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12h20"></path><path d="M20 12v8H4v-8"></path><path d="M4 12l8-8 8 8"></path></svg>
          <span>Denize 0 Metre Özel Plaj</span>
        </div>
        <div class="ambiance-pill">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          <span>+16 Adult Sükuneti</span>
        </div>
        <div class="ambiance-pill">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
          <span>12 Ay Açık / Şömine Keyfi</span>
        </div>
        <div class="ambiance-pill">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
          <span>Kaz Dağları Oksijeni</span>
        </div>
      </div>
    </div>

    <!-- Cinematic Slider Indicators -->
    <?php if (count($heroSlides) > 1): ?>
      <div class="hero-slider-nav">
        <?php foreach ($heroSlides as $idx => $slide): ?>
          <button class="hero-nav-dot <?php echo $idx === 0 ? 'active' : ''; ?>" data-slide-index="<?php echo $idx; ?>" aria-label="Görsel <?php echo $idx + 1; ?>">
            <span></span>
          </button>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Quick Booking Search Bar (Wix wh-1061 Style) -->
  <?php require_once __DIR__ . '/includes/booking-bar.php'; ?>

  <!-- =========================================================================
       AMENITIES & HOSPITALITY PILLARS
       ========================================================================= -->
  <section class="section" style="padding-top: 75px; padding-bottom: 45px;">
    <div class="container">
      <div class="features-grid">
        <!-- Pillar 1 -->
        <div class="feature-card">
          <div class="feature-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 12h20"></path><path d="M20 12v8H4v-8"></path><path d="M4 12l8-8 8 8"></path></svg>
          </div>
          <h3 class="feature-title" data-i18n="feat.beach.title">Denize Sıfır & Plaj</h3>
          <p class="feature-desc" data-i18n="feat.beach.desc">Midilli manzaralı 60 şezlongluk özel plaj alanı ve gün boyu bistro servisi.</p>
        </div>

        <!-- Pillar 2 -->
        <div class="feature-card">
          <div class="feature-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path></svg>
          </div>
          <h3 class="feature-title" data-i18n="feat.rooms.title">Yenilenen 22 Butik Oda</h3>
          <p class="feature-desc" data-i18n="feat.rooms.desc">Dört farklı konaklama kategorisiyle sade, ferah ve huzur dolu odalar.</p>
        </div>

        <!-- Pillar 3 -->
        <div class="feature-card">
          <div class="feature-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path><path d="M12 6v6l4 2"></path></svg>
          </div>
          <h3 class="feature-title" data-i18n="feat.bistro.title">450 m² Çınar Bistro</h3>
          <p class="feature-desc" data-i18n="feat.bistro.desc">Asırlık çınarın altında Ege mezeleri, taze deniz ürünleri ve zengin şarap kavı.</p>
        </div>

        <!-- Pillar 4 -->
        <div class="feature-card">
          <div class="feature-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg>
          </div>
          <h3 class="feature-title" data-i18n="feat.winter.title">12 Ay Açık & Şömine</h3>
          <p class="feature-desc" data-i18n="feat.winter.desc">Yazın plaj keyfi, kışın ise 8 masalık butik salonda sıcacık şömine sohbetleri.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       WELCOME & STORY (1985'TEN BUGÜNE)
       ========================================================================= -->
  <section class="section" id="hikaye">
    <div class="container">
      <div class="split-grid">
        <!-- Story Text -->
        <div class="story-content">
          <div class="eyebrow" data-i18n="story.eyebrow">1985’ten Bugüne Bir Miras</div>
          <h2 data-i18n="story.title">Körfez’in hafızasında yer eden bir otel, yepyeni bir ruhla geri döndü.</h2>
          <p class="lead" data-i18n="story.lead">
            Mare & Monte, 1985 yılında M. Erinç ve Aycan Ersöz tarafından işletmeye açıldı. Denize sıfır konumu, özel plajı ve Altınoluk’un en seçkin noktasında yer almasıyla yıllar boyunca Ege sevdalılarının buluşma noktası oldu.
          </p>
          <p data-i18n="story.p1">
            2026 yılında Dr. Levent Özdemir tarafından devralınan tesis; odalarından bahçesine, restoranından plajına kadar kapsamlı bir mimari dönüşümden geçti.
          </p>
          <p data-i18n="story.p2">
            Bugün Mare & Monte yalnızca bir otel değil; deniz, doğa, gastronomi, seçkin şaraplar ve huzurlu +16 yetişkin atmosferini buluşturan ayrıcalıklı bir yaşam alanı.
          </p>

          <div class="story-features">
            <div class="story-feature-item">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <div>
                <strong data-i18n="story.f1.title">+16 Adult Only Konsept</strong>
                <span data-i18n="story.f1.desc">Sakin, dinlendirici ve gürültüden uzak atmosfer.</span>
              </div>
            </div>
            <div class="story-feature-item">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <div>
                <strong data-i18n="story.f2.title">Kaz Dağları Eteklerinde</strong>
                <span data-i18n="story.f2.desc">Dünyanın en yüksek oksijen oranına sahip coğrafyası.</span>
              </div>
            </div>
          </div>

          <div style="margin-top: 34px;">
            <a href="odalar.php" class="btn btn-dark" data-i18n="hero.cta_explore">Odalarımızı İnceleyin</a>
          </div>
        </div>

        <!-- Story Visual -->
        <div class="story-image-wrap">
          <img src="images/02.jpg" alt="Mare Monte Hotel Dış Görünüm" class="story-main-img" />
          <div class="story-badge-floating">
            <div class="story-badge-number">2026</div>
            <div class="story-badge-text" data-i18n="story.badge">Tamamen Yenilenen Butik Mimari & 22 Konforlu Oda</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       SUITES & RENTALS SHOWCASE (WIX WH-1061 CARD GRID)
       ========================================================================= -->
  <section class="section section-warm" id="odalar">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center" data-i18n="rooms.eyebrow">Konaklama Seçenekleri</div>
        <h2 data-i18n="rooms.title">Yenilenmiş, Sade ve Konforlu 22 Oda.</h2>
        <p class="lead" data-i18n="rooms.lead">
          Her detay; sakinlik, temizlik ve rahat bir Ege konaklaması için özenle yeniden düzenlendi.
        </p>
      </div>

      <div class="rooms-grid">
        <?php foreach ($rooms as $room): ?>
          <article class="room-card" id="<?php echo $room['id']; ?>">
            <div class="room-thumb-wrap">
              <img src="<?php echo $room['image']; ?>" alt="<?php echo htmlspecialchars($room['title']); ?>" class="room-thumb" />
              <span class="room-tag <?php echo ($room['id'] === 'deniz-manzarali-balkonlu') ? 'highlight' : ''; ?>">
                <?php echo $room['highlight']; ?>
              </span>
            </div>
            <div class="room-body">
              <div class="room-meta">
                <span class="room-meta-item">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                  <?php echo $room['capacity']; ?>
                </span>
                <span class="room-meta-item">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
                  <?php echo $room['size']; ?>
                </span>
                <span class="room-meta-item">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                  <?php echo $room['view']; ?>
                </span>
              </div>
              <h3 class="room-title"><?php echo htmlspecialchars($room['title']); ?></h3>
              <p class="room-desc"><?php echo htmlspecialchars($room['description']); ?></p>
              
              <div class="room-specs">
                <?php foreach (array_slice($room['features'], 0, 4) as $feat): ?>
                  <span class="spec-pill"><?php echo htmlspecialchars($feat); ?></span>
                <?php endforeach; ?>
                <span class="spec-pill">+<?php echo count($room['features']) - 4; ?> özellik</span>
              </div>

              <div class="room-footer">
                <a href="odalar.php#<?php echo $room['id']; ?>" class="btn btn-outline-dark btn-sm" data-i18n="rooms.action.details">Oda Detayları</a>
                <a href="#" data-modal-target="bookingModal" data-room-name="<?php echo htmlspecialchars($room['title']); ?>" class="btn btn-primary btn-sm" data-i18n="rooms.action.book">Bu Odayı Rezerve Et</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div style="text-align: center; margin-top: 48px;">
        <a href="odalar.php" class="btn btn-dark btn-lg" data-i18n="hero.cta_explore">Tüm Oda Detayları ve Özellikleri</a>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       GASTRONOMY, 450 M² ÇINAR BISTRO & ÇINAR BAR
       ========================================================================= -->
  <section class="section section-dark" id="bistro">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center" data-i18n="bistro.eyebrow">Gastronomi · Çınar Bar · Bahçe</div>
        <h2 data-i18n="bistro.title">Asırlık çınarın altında uzun Ege akşamları.</h2>
        <p class="lead" data-i18n="bistro.lead">
          Denize sıfır 450 m² bistro bahçemiz; enfes kokteyller, seçkin şaraplar, yöresel Ege lezzetleri ve sakin melodilerle gün batımından geceye uzanan eşsiz bir atmosfer sunar.
        </p>
      </div>

      <!-- Wide Banner -->
      <div class="bistro-banner">
        <div class="bistro-banner-content">
          <div class="eyebrow" data-i18n="bistro.c3.title">Çınar Bar & Şarap Kavı</div>
          <h3 data-i18n="bistro.banner.title">Fıçı biralar, imza kokteyller, zengin kav ve şarap tadım akşamları.</h3>
          <p style="color:rgba(255,255,255,0.85); font-size:1.05rem;" data-i18n="bistro.c3.desc">
            Kaz Dağları ve Ege bağlarından özenle seçilmiş şarap koleksiyonu ile dönemsel tadım etkinlikleri.
          </p>
        </div>
      </div>

      <!-- Gastronomy Cards -->
      <div class="cards" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:26px; margin-bottom:50px;">
        <article class="card" style="background:var(--color-dark-surface); border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--border-dark);">
          <img src="images/04.jpg" alt="Günlük balık ve deniz ürünleri" style="height:250px; width:100%; object-fit:cover;" />
          <div style="padding:28px;">
            <h3 style="color:var(--color-gold-light); font-size:1.4rem; margin-bottom:10px;" data-i18n="bistro.c1.title">Günlük Balık & Deniz Ürünleri</h3>
            <p style="color:var(--text-light-muted); font-size:0.92rem;" data-i18n="bistro.c1.desc">Körfez’in taze ürünleriyle hazırlanan sade, lezzetli ve mevsime uygun tabaklar.</p>
          </div>
        </article>

        <article class="card" style="background:var(--color-dark-surface); border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--border-dark);">
          <img src="images/05.jpg" alt="Ege ve dünya mutfağı" style="height:250px; width:100%; object-fit:cover;" />
          <div style="padding:28px;">
            <h3 style="color:var(--color-gold-light); font-size:1.4rem; margin-bottom:10px;" data-i18n="bistro.c2.title">Ege & Dünya Mutfağı</h3>
            <p style="color:var(--text-light-muted); font-size:0.92rem;" data-i18n="bistro.c2.desc">Zeytinyağlılar, Ege otları, özel şef tabakları ve geniş yelpazeli bistro menüsü.</p>
          </div>
        </article>

        <article class="card" style="background:var(--color-dark-surface); border-radius:var(--radius-md); overflow:hidden; border:1px solid var(--border-dark);">
          <img src="images/06.jpg" alt="Şarap kavı ve tadımlar" style="height:250px; width:100%; object-fit:cover;" />
          <div style="padding:28px;">
            <h3 style="color:var(--color-gold-light); font-size:1.4rem; margin-bottom:10px;" data-i18n="bistro.c3.title">Şarap Kavı & Tadımlar</h3>
            <p style="color:var(--text-light-muted); font-size:0.92rem;" data-i18n="bistro.c3.desc">Ulusal ve uluslararası seçkilerle dönemsel şarap tadım etkinlikleri.</p>
          </div>
        </article>
      </div>

      <!-- Interactive Menu Showcase -->
      <div class="menu-tabs-nav">
        <button class="menu-tab-btn active" data-tab="tab-kahvalti">Ege Serpme Kahvaltı</button>
        <button class="menu-tab-btn" data-tab="tab-mezeler">Ege Mezeleri</button>
        <button class="menu-tab-btn" data-tab="tab-deniz">Deniz Ürünleri</button>
        <button class="menu-tab-btn" data-tab="tab-bar">Çınar Bar & Kokteyller</button>
      </div>

      <!-- Tab Panels -->
      <?php foreach ($menu_categories as $key => $cat): ?>
        <div id="tab-<?php echo $key; ?>" class="menu-tab-panel <?php echo ($key === 'kahvalti') ? 'active' : ''; ?>">
          <div class="menu-grid">
            <?php foreach ($cat['items'] as $item): ?>
              <div class="menu-card">
                <div class="menu-card-header">
                  <div class="menu-item-title"><?php echo htmlspecialchars($item['title']); ?></div>
                </div>
                <div class="menu-item-desc"><?php echo htmlspecialchars($item['desc']); ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <div style="text-align:center; margin-top:45px;">
        <a href="bistro.php" class="btn btn-primary btn-lg">Tam Bistro Menüsünü İnceleyin</a>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       PRIVATE BEACH (60 LOUNGERS)
       ========================================================================= -->
  <section class="section" id="plaj">
    <div class="container">
      <div class="beach-grid">
        <div>
          <div class="eyebrow" data-i18n="beach.eyebrow">Özel Plaj Alanı</div>
          <h2 data-i18n="beach.title">Sabah kahvesinden gün batımı kokteyline kadar denizin hemen kıyısında.</h2>
          <p class="lead" data-i18n="beach.p1">
            Tamamen yenilenen plajımız 60 şezlong kapasitesiyle sakin, temiz ve konforlu bir deniz deneyimi sunar.
          </p>
          <p data-i18n="beach.p2">
            Denizin berraklığı, Midilli silueti ve bistro servisinin rahatlığıyla Mare & Monte sahili gün boyunca yaşamaya devam eder.
          </p>
          <div class="beach-features-list">
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>60 Şezlong & Şemsiye</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>Şezlonga Bistro Servisi</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>Temiz & Berrak Körfez Denizi</span>
            </div>
            <div class="beach-feature-box">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
              <span>+16 Dinginlik Konsepti</span>
            </div>
          </div>
          <div style="margin-top: 32px;">
            <a href="plaj.php" class="btn btn-dark">Plaj Detayları & Bilgi</a>
          </div>
        </div>

        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:490px;">
          <img src="images/07.jpg" alt="Mare Monte Özel Plaj ve Deniz" style="width:100%; height:100%; object-fit:cover;" />
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       WINTER SANCTUARY (FIREPLACE & 12 MONTHS OPEN)
       ========================================================================= -->
  <section class="section section-dark">
    <div class="container">
      <div class="split-grid">
        <div style="border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-elevated); height:460px;">
          <img src="images/12.jpg" alt="Mare Monte Şömineli Kış Salonu" style="width:100%; height:100%; object-fit:cover;" />
        </div>
        <div>
          <div class="eyebrow" data-i18n="winter.eyebrow">12 Ay Açık · Butik Kış Salonu</div>
          <h2 data-i18n="winter.title">Şömine başında sakinliğin lüksü.</h2>
          <p class="lead" data-i18n="winter.desc">
            Mare & Monte, yalnızca yaz aylarında değil; Ege’nin kışında da yaşar. Sekiz masalık butik şömineli salonumuz; şarap, özel menüler ve uzun sohbetler için sıcak bir atmosfer sunar.
          </p>
          <div style="margin-top: 28px;">
            <a href="#" data-modal-target="bookingModal" class="btn btn-primary" data-i18n="hero.cta_book">Kış Konaklaması İçin Yer Ayırtın</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       MOUNT IDA & AEGEAN EXPLORATION (WIX WH-1061 LOCAL GUIDE)
       ========================================================================= -->
  <section class="section" id="kesfet">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center" data-i18n="discover.eyebrow">Kaz Dağları & Ege Rotaları</div>
        <h2 data-i18n="discover.title">Mitolojinin, zeytinliklerin ve denizin kesiştiği yerde.</h2>
        <p class="lead" data-i18n="discover.lead">
          Antik çağlarda İda Dağı olarak anılan Kaz Dağları; Zeus efsaneleri, Troya anlatıları, şelaleleri, taş köyleri ve oksijen dolu havasıyla Mare & Monte deneyiminin doğal uzantısıdır.
        </p>
      </div>

      <div class="routes-grid">
        <?php foreach (array_slice($routes, 0, 6) as $route): ?>
          <div class="route-card">
            <div class="route-header">
              <span class="route-tag"><?php echo htmlspecialchars($route['tag']); ?></span>
              <span class="route-dist"><?php echo htmlspecialchars($route['dist']); ?></span>
            </div>
            <h3 class="route-title"><?php echo htmlspecialchars($route['title']); ?></h3>
            <p class="route-desc"><?php echo htmlspecialchars($route['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div style="text-align: center; margin-top: 48px;">
        <a href="kesfet.php" class="btn btn-dark btn-lg">Tüm Gezi Rotalarını ve Turları İnceleyin</a>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       PHOTO GALLERY
       ========================================================================= -->
  <section class="section section-warm" id="galeri">
    <div class="container">
      <div class="section-header center">
        <div class="eyebrow center" data-i18n="nav.gallery">Görsel Tur</div>
        <h2>Mare & Monte Fotoğraf Galerisi</h2>
        <p class="lead">Otelimizden, odalarımızdan, bistro bahçemizden ve eşsiz Ege gün batımlarından kareler.</p>
      </div>

      <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">Tüm Fotoğraflar</button>
        <button class="filter-btn" data-filter="odalar">Odalar</button>
        <button class="filter-btn" data-filter="bistro">Bistro & Çınar Bar</button>
        <button class="filter-btn" data-filter="plaj">Özel Plaj</button>
        <button class="filter-btn" data-filter="kis">Kış Salonu</button>
      </div>

      <div class="gallery-grid">
        <div class="gallery-item" data-category="plaj">
          <img src="images/01.jpg" alt="Mare & Monte Genel Görünüm" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Plaj & Deniz</div>
            <div class="gallery-caption">Mare & Monte Denize Sıfır Konum</div>
          </div>
        </div>

        <div class="gallery-item" data-category="bistro">
          <img src="images/02.jpg" alt="Mare Monte Bahçe ve Dış Cephe" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Bistro & Bahçe</div>
            <div class="gallery-caption">Otel Dış Cephe ve Asırlık Çınar</div>
          </div>
        </div>

        <div class="gallery-item" data-category="bistro">
          <img src="images/03.jpg" alt="Çınar Bar Bahçesi" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Bistro & Bar</div>
            <div class="gallery-caption">Çınar Bar ve 450 m² Bahçe Alanı</div>
          </div>
        </div>

        <div class="gallery-item" data-category="bistro">
          <img src="images/04.jpg" alt="Günlük Deniz Ürünleri" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Gastronomi</div>
            <div class="gallery-caption">Taze Günlük Körfez Balıkları</div>
          </div>
        </div>

        <div class="gallery-item" data-category="bistro">
          <img src="images/05.jpg" alt="Ege Mutfağı ve Mezeler" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Gastronomi</div>
            <div class="gallery-caption">Zeytinyağlı Ege Mezeleri</div>
          </div>
        </div>

        <div class="gallery-item" data-category="bistro">
          <img src="images/06.jpg" alt="Şarap Kavı Seçkisi" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Şarap Kavı</div>
            <div class="gallery-caption">Özel Butik Şarap Seçkileri</div>
          </div>
        </div>

        <div class="gallery-item" data-category="plaj">
          <img src="images/07.jpg" alt="Mare Monte Özel Plajı" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Özel Plaj</div>
            <div class="gallery-caption">60 Şezlongluk Özel Plaj</div>
          </div>
        </div>

        <div class="gallery-item" data-category="odalar">
          <img src="images/08.jpg" alt="Deniz Manzaralı Balkonlu Oda" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Odalar</div>
            <div class="gallery-caption">Deniz Manzaralı Balkonlu Oda</div>
          </div>
        </div>

        <div class="gallery-item" data-category="odalar">
          <img src="images/09.jpg" alt="Dağ Manzaralı Standart Oda" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Odalar</div>
            <div class="gallery-caption">Dağ Manzaralı Standart Oda</div>
          </div>
        </div>

        <div class="gallery-item" data-category="odalar">
          <img src="images/10.jpg" alt="Tek Kişilik Oda" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Odalar</div>
            <div class="gallery-caption">Tek Kişilik Konfor Oda</div>
          </div>
        </div>

        <div class="gallery-item" data-category="odalar">
          <img src="images/11.jpg" alt="İki Ayrı Yataklı Oda" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Odalar</div>
            <div class="gallery-caption">İki Ayrı Yataklı Oda</div>
          </div>
        </div>

        <div class="gallery-item" data-category="kis">
          <img src="images/12.jpg" alt="Şömineli Kış Salonu" loading="lazy" />
          <div class="gallery-overlay">
            <div class="gallery-category">Kış Salonu</div>
            <div class="gallery-caption">Butik Şömineli Kış Salonu</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       CONTACT & LOCATION
       ========================================================================= -->
  <section class="section" id="iletisim">
    <div class="container">
      <div class="section-header">
        <div class="eyebrow" data-i18n="contact.eyebrow">İletişim & Rezervasyon</div>
        <h2 data-i18n="contact.title">Mare & Monte’da Yerinizi Ayırın</h2>
        <p class="lead" data-i18n="contact.lead">Denize sıfır konaklama, bistro deneyimi ve Ege’nin sakin ritmi için bize ulaşın.</p>
      </div>

      <div class="contact-grid">
        <!-- Contact Details Card -->
        <div class="contact-card">
          <div class="contact-row">
            <div class="contact-icon-box">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            </div>
            <div class="contact-info-text">
              <strong data-i18n="contact.address_label">Otel & Bistro Adresi</strong>
              <p><?php echo ADDRESS; ?></p>
            </div>
          </div>

          <div class="contact-row">
            <div class="contact-icon-box">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            </div>
            <div class="contact-info-text">
              <strong data-i18n="contact.phone_label">Telefon & WhatsApp</strong>
              <p>
                Mobil / Rezervasyon: <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>"><strong><?php echo PHONE_PRIMARY; ?></strong></a><br>
                Sabit Hat: <a href="tel:<?php echo PHONE_SECONDARY_CLEAN; ?>"><?php echo PHONE_SECONDARY; ?></a>
              </p>
            </div>
          </div>

          <div class="contact-row">
            <div class="contact-icon-box">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div class="contact-info-text">
              <strong data-i18n="contact.info_label">Konsept & Bilgiler</strong>
              <p data-i18n="contact.info_val">+16 Adult Konsepti · 12 Ay Kesintisiz Açık · Evcil Hayvan Kabul Edilmez · Ücretsiz Wi-Fi</p>
            </div>
          </div>

          <div style="display:flex; gap:14px; flex-wrap:wrap; margin-top:12px;">
            <a href="tel:<?php echo PHONE_PRIMARY_CLEAN; ?>" class="btn btn-primary" data-i18n="contact.call_btn">Hemen Bizi Arayın</a>
            <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" rel="noopener" class="btn btn-whatsapp">WhatsApp’tan Yazın</a>
          </div>
        </div>

        <!-- Google Map -->
        <div class="map-container">
          <iframe title="Mare & Monte Hotel & Bistro Google Maps" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="<?php echo GOOGLE_MAPS_EMBED; ?>"></iframe>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
