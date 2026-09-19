(function(){
  'use strict';

  /* Year */
  var yr = document.getElementById('year');
  if (yr) yr.textContent = new Date().getFullYear();

  /* Header scroll state (index page only uses over-hero) */
  var header = document.getElementById('header');
  var hero = document.querySelector('.hero');
  if (header && hero){
    function onScroll(){
      var y = window.scrollY || window.pageYOffset;
      if (y > 40){
        header.classList.add('header--scrolled');
        header.classList.remove('header--over-hero');
      } else {
        header.classList.remove('header--scrolled');
        header.classList.add('header--over-hero');
      }
    }
    window.addEventListener('scroll', onScroll, {passive:true});
    onScroll();
  }

  /* Mobile menu */
  var mmenu = document.getElementById('mmenu');
  var openBtn = document.getElementById('menuOpen');
  var closeBtn = document.getElementById('menuClose');
  function openMenu(){ if(!mmenu) return; mmenu.classList.add('open'); document.body.style.overflow='hidden'; if(openBtn) openBtn.setAttribute('aria-expanded','true'); }
  function closeMenu(){ if(!mmenu) return; mmenu.classList.remove('open'); document.body.style.overflow=''; if(openBtn) openBtn.setAttribute('aria-expanded','false'); }
  if (openBtn) openBtn.addEventListener('click', openMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (mmenu) mmenu.addEventListener('click', function(e){ if (e.target.tagName === 'A') closeMenu(); });
  document.addEventListener('keydown', function(e){ if (e.key === 'Escape') closeMenu(); });

  /* Reveal on scroll */
  var reveals = document.querySelectorAll('[data-reveal]');
  if ('IntersectionObserver' in window){
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(en){
        if (en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, {rootMargin:'0px 0px -8% 0px', threshold:0.06});
    reveals.forEach(function(el){ io.observe(el); });
  } else {
    reveals.forEach(function(el){ el.classList.add('in'); });
  }

  /* Gallery filters */
  var filterBtns = document.querySelectorAll('.filter');
  var gItems = document.querySelectorAll('#gallery-grid .gitem');
  if (filterBtns.length && gItems.length){
    filterBtns.forEach(function(btn){
      btn.addEventListener('click', function(){
        filterBtns.forEach(function(b){ b.classList.remove('active'); b.setAttribute('aria-selected','false'); });
        btn.classList.add('active');
        btn.setAttribute('aria-selected','true');
        var f = btn.getAttribute('data-filter');
        gItems.forEach(function(item){
          var cats = item.getAttribute('data-cat') || '';
          var show = (f === 'all') || cats.split(' ').indexOf(f) !== -1;
          item.classList.toggle('hidden', !show);
        });
      });
    });
  }

  /* FAQ accordion */
  var faqItems = document.querySelectorAll('.faq__item');
  faqItems.forEach(function(item){
    var btn = item.querySelector('.faq__btn');
    var ans = item.querySelector('.faq__answer');
    if (!btn || !ans) return;
    btn.addEventListener('click', function(){
      var isOpen = item.classList.contains('open');
      faqItems.forEach(function(other){
        other.classList.remove('open');
        var ob = other.querySelector('.faq__btn'); if (ob) ob.setAttribute('aria-expanded','false');
        var oa = other.querySelector('.faq__answer'); if (oa) oa.style.maxHeight = null;
      });
      if (!isOpen){
        item.classList.add('open');
        btn.setAttribute('aria-expanded','true');
        ans.style.maxHeight = ans.scrollHeight + 'px';
      }
    });
  });

  /* File input */
  var filesInput = document.getElementById('files');
  var fileNameEl = document.getElementById('fileName');
  if (filesInput && fileNameEl){
    filesInput.addEventListener('change', function(){
      var n = filesInput.files ? filesInput.files.length : 0;
      fileNameEl.textContent = n > 0 ? ('تم اختيار ' + n + ' ملف — سيتم إرسالها عبر واتساب بعد فتح المحادثة.') : '';
    });
  }

  /* Quote form -> WhatsApp */
  var form = document.getElementById('quoteForm');
  var WA_PHONE = '966536089153';
  if (form){
    form.addEventListener('submit', function(e){
      e.preventDefault();
      var required = ['name','phone','city'];
      var missing = null;
      required.forEach(function(id){
        var el = document.getElementById(id);
        if (!el || !el.value.trim()){
          if (el) el.style.borderColor = '#c0392b';
          if (!missing) missing = el;
        } else if (el){ el.style.borderColor = ''; }
      });
      if (missing){ missing.focus(); return; }

      var g = function(id){ var el = document.getElementById(id); return el ? el.value.trim() : ''; };
      var msg = 'السلام عليكم،\nأرغب في طلب عرض سعر لمشروع حجر وواجهات:\n\n' +
                '• الاسم: ' + g('name') + '\n' +
                '• الجوال: ' + g('phone') + '\n' +
                '• المدينة: ' + g('city') + '\n' +
                (g('project') ? '• نوع المشروع: ' + g('project') + '\n' : '') +
                (g('service') ? '• نوع الخدمة: ' + g('service') + '\n' : '') +
                (g('area') ? '• المساحة التقريبية: ' + g('area') + '\n' : '') +
                (g('details') ? '• تفاصيل: ' + g('details') + '\n' : '') +
                '\n(سيتم إرسال الصور/المخططات في المحادثة)';

      var url = 'https://wa.me/' + WA_PHONE + '?text=' + encodeURIComponent(msg);
      window.open(url, '_blank', 'noopener');
    });
  }

})();
