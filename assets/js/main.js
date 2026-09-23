/**
 * Mare & Monte Hotel & Bistro — Ultra-Luxury Interactive Scripts
 * Altınoluk / Edremit / Kaz Dağları
 */

document.addEventListener('DOMContentLoaded', () => {
  initHeader();
  initMobileNav();
  initBookingDates();
  initMenuTabs();
  initGalleryFilter();
  initLightbox();
  initModals();
  initBookingForms();
});

/* -------------------------------------------------------------------------- */
/* Header Scroll & Glassmorphism                                              */
/* -------------------------------------------------------------------------- */
function initHeader() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  const handleScroll = () => {
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();
}

/* -------------------------------------------------------------------------- */
/* Mobile Navigation Drawer                                                   */
/* -------------------------------------------------------------------------- */
function initMobileNav() {
  const hamburger = document.querySelector('.hamburger-btn');
  const drawer = document.querySelector('.mobile-nav');
  const backdrop = document.querySelector('.mobile-nav-backdrop');
  const closeBtn = document.querySelector('.mobile-nav-close');
  const links = document.querySelectorAll('.mobile-menu-links a');

  if (!hamburger || !drawer) return;

  const openDrawer = () => {
    hamburger.classList.add('active');
    drawer.classList.add('open');
    if (backdrop) backdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
  };

  const closeDrawer = () => {
    hamburger.classList.remove('active');
    drawer.classList.remove('open');
    if (backdrop) backdrop.classList.remove('open');
    document.body.style.overflow = '';
  };

  hamburger.addEventListener('click', () => {
    if (drawer.classList.contains('open')) {
      closeDrawer();
    } else {
      openDrawer();
    }
  });

  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);
  links.forEach(link => link.addEventListener('click', closeDrawer));
}

/* -------------------------------------------------------------------------- */
/* Booking Dates Initialization                                              */
/* -------------------------------------------------------------------------- */
function initBookingDates() {
  const checkinInputs = document.querySelectorAll('input[name="checkin"]');
  const checkoutInputs = document.querySelectorAll('input[name="checkout"]');

  const today = new Date();
  const tomorrow = new Date();
  tomorrow.setDate(today.getDate() + 1);

  const formatDate = (date) => {
    const y = date.getFullYear();
    const m = String(date.getMonth() + 1).padStart(2, '0');
    const d = String(date.getDate()).padStart(2, '0');
    return `${y}-${m}-${d}`;
  };

  const todayStr = formatDate(today);
  const tomorrowStr = formatDate(tomorrow);

  checkinInputs.forEach(input => {
    input.min = todayStr;
    if (!input.value) input.value = todayStr;
    input.addEventListener('change', (e) => {
      const selected = new Date(e.target.value);
      selected.setDate(selected.getDate() + 1);
      checkoutInputs.forEach(outInput => {
        outInput.min = formatDate(selected);
        if (new Date(outInput.value) <= new Date(e.target.value)) {
          outInput.value = formatDate(selected);
        }
      });
    });
  });

  checkoutInputs.forEach(input => {
    input.min = tomorrowStr;
    if (!input.value) input.value = tomorrowStr;
  });
}

/* -------------------------------------------------------------------------- */
/* Bistro Menu Tabs Switcher                                                  */
/* -------------------------------------------------------------------------- */
function initMenuTabs() {
  const tabBtns = document.querySelectorAll('.menu-tab-btn');
  const tabPanels = document.querySelectorAll('.menu-tab-panel');

  if (!tabBtns.length) return;

  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-tab');

      tabBtns.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const targetPanel = document.getElementById(targetId);
      if (targetPanel) {
        targetPanel.classList.add('active');
      }
    });
  });
}

/* -------------------------------------------------------------------------- */
/* Photo Gallery Category Filtering                                           */
/* -------------------------------------------------------------------------- */
function initGalleryFilter() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');

  if (!filterBtns.length || !galleryItems.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const category = btn.getAttribute('data-filter');

      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      galleryItems.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
          item.style.display = 'block';
          item.style.animation = 'fadeIn 0.35s ease';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
}

/* -------------------------------------------------------------------------- */
/* Fullscreen Lightbox Viewer                                                */
/* -------------------------------------------------------------------------- */
function initLightbox() {
  const galleryItems = document.querySelectorAll('.gallery-item');
  const lightbox = document.getElementById('lightboxModal');
  if (!lightbox) return;

  const lightboxImg = lightbox.querySelector('.lightbox-img');
  const lightboxCaption = lightbox.querySelector('.lightbox-caption');
  const closeBtn = lightbox.querySelector('.lightbox-close');

  const openLightbox = (src, title) => {
    lightboxImg.src = src;
    lightboxCaption.textContent = title || '';
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeLightbox = () => {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  };

  galleryItems.forEach(item => {
    item.addEventListener('click', () => {
      const img = item.querySelector('img');
      const caption = item.querySelector('.gallery-caption');
      if (img) {
        openLightbox(img.src, caption ? caption.textContent : '');
      }
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && lightbox.classList.contains('active')) {
      closeLightbox();
    }
  });
}

/* -------------------------------------------------------------------------- */
/* Modal Management (Room Details & Reservation Modal)                       */
/* -------------------------------------------------------------------------- */
function initModals() {
  const modalTriggers = document.querySelectorAll('[data-modal-target]');
  const closeBtns = document.querySelectorAll('.modal-close-btn');
  const overlays = document.querySelectorAll('.modal-overlay');

  modalTriggers.forEach(trigger => {
    trigger.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = trigger.getAttribute('data-modal-target');
      const targetModal = document.getElementById(targetId);
      
      const preselectRoom = trigger.getAttribute('data-room-name');
      if (preselectRoom && targetModal) {
        const roomSelect = targetModal.querySelector('select[name="room"]');
        if (roomSelect) {
          for (let opt of roomSelect.options) {
            if (opt.value.toLowerCase().includes(preselectRoom.toLowerCase()) || 
                opt.text.toLowerCase().includes(preselectRoom.toLowerCase())) {
              opt.selected = true;
              break;
            }
          }
        }
      }

      if (targetModal) {
        targetModal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  closeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const modal = btn.closest('.modal-overlay');
      if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  overlays.forEach(overlay => {
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      overlays.forEach(modal => {
        modal.classList.remove('active');
      });
      document.body.style.overflow = '';
    }
  });
}

/* -------------------------------------------------------------------------- */
/* Booking & Contact Forms Integration (WhatsApp & Mail)                     */
/* -------------------------------------------------------------------------- */
function initBookingForms() {
  const bookingBars = document.querySelectorAll('.booking-form-bar');

  bookingBars.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const checkin = form.querySelector('[name="checkin"]')?.value || '';
      const checkout = form.querySelector('[name="checkout"]')?.value || '';
      const guests = form.querySelector('[name="guests"]')?.value || '2 Yetişkin';
      const room = form.querySelector('[name="room"]')?.value || 'Tüm Odalar / En Uygun';

      const lang = localStorage.getItem('mm_lang') || 'tr';
      let msg = '';
      if (lang === 'en') {
        msg = `Hello Mare & Monte Hotel & Bistro,\n\nI would like to inquire about suite availability and rates:\n- Check-in: ${checkin}\n- Check-out: ${checkout}\n- Guests: ${guests}\n- Suite Preference: ${room}\n\nCould you please provide availability and pricing details? Thank you.`;
      } else {
        msg = `Merhaba Mare & Monte Hotel & Bistro,\n\nWeb siteniz üzerinden rezervasyon / müsaitlik sorgulamak istiyorum:\n- Giriş Tarihi: ${checkin}\n- Çıkış Tarihi: ${checkout}\n- Kişi Sayısı: ${guests}\n- Oda Tercihi: ${room}\n\nMüsaitlik ve fiyat bilgisi alabilir miyim? Teşekkürler.`;
      }

      const waUrl = `https://wa.me/905424143894?text=${encodeURIComponent(msg)}`;
      window.open(waUrl, '_blank');
    });
  });

  // Modal Ajax Form
  const modalForm = document.getElementById('bookingModalForm');
  if (modalForm) {
    modalForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = modalForm.querySelector('button[type="submit"]');
      const originalText = btn.innerHTML;
      btn.innerHTML = '<span>İşleniyor / Processing...</span>';
      btn.disabled = true;

      const formData = new FormData(modalForm);

      try {
        const response = await fetch('api/rezervasyon.php', {
          method: 'POST',
          body: formData
        });
        const data = await response.json();

        if (data.status === 'success') {
          btn.innerHTML = '<span>Talep Alındı ✓</span>';
          btn.style.backgroundColor = '#1EBE5D';
          
          setTimeout(() => {
            if (data.whatsapp_url) {
              window.open(data.whatsapp_url, '_blank');
            }
            alert('Rezervasyon talebiniz başarıyla alındı! Concierge ekibimiz en kısa sürede sizinle iletişime geçecektir.\n\nYour reservation request has been received. Our concierge will contact you shortly.');
            modalForm.reset();
            const modal = modalForm.closest('.modal-overlay');
            if (modal) modal.classList.remove('active');
            document.body.style.overflow = '';
            btn.innerHTML = originalText;
            btn.disabled = false;
            btn.style.backgroundColor = '';
          }, 600);
        } else {
          alert('Hata: ' + (data.message || 'Lütfen bilgilerinizi kontrol ediniz.'));
          btn.innerHTML = originalText;
          btn.disabled = false;
        }
      } catch (err) {
        // Fallback directly to WhatsApp
        const name = formData.get('fullname') || '';
        const phone = formData.get('phone') || '';
        const checkin = formData.get('checkin') || '';
        const checkout = formData.get('checkout') || '';
        const room = formData.get('room') || '';
        const note = formData.get('note') || '';

        const msg = `Merhaba Mare & Monte Hotel & Bistro,\n\nRezervasyon Talebi:\n- İsim: ${name}\n- Telefon: ${phone}\n- Giriş: ${checkin}\n- Çıkış: ${checkout}\n- Oda: ${room}\n- Not: ${note}`;
        window.open(`https://wa.me/905424143894?text=${encodeURIComponent(msg)}`, '_blank');
        btn.innerHTML = originalText;
        btn.disabled = false;
      }
    });
  }
}
