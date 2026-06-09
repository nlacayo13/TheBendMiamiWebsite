/* THE BEND — small, dependency-free interactions */
(function () {
  'use strict';

  /* ============================================================
     Retro CRT-TV intro
     ============================================================ */
  var intro = document.getElementById('intro');
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function startSite() { document.body.classList.add('loaded'); }

  if (intro) {
    if (reduce) {
      // no theatrics — just clear it and reveal the page
      intro.remove();
      startSite();
    } else {
      var cap = document.getElementById('introCap');
      var cur = '<span class="intro__cur">_</span>';
      var lines = [
        'Warming up the disco ball',
        'Polishing the orange booths',
        'Telling Yoda we&rsquo;re open',
        'Chilling the beer to &lsquo;cold&rsquo;',
        'Bribing the DJ with quarters',
        'Untangling the karaoke mic',
        'Adjusting the wood paneling',
        'GROOVY, BABY. &#9728;'
      ];

      var finished = false;
      var timers = [];
      var capTimer = null;

      // start cycling once the caption has faded in (matches the CSS delay)
      var i = 0;
      timers.push(setTimeout(function () {
        capTimer = setInterval(function () {
          i++;
          if (i >= lines.length - 1) {          // final caption sticks
            i = lines.length - 1;
            clearInterval(capTimer);
            cap.classList.add('pop');
            cap.innerHTML = lines[i];
            return;
          }
          cap.innerHTML = lines[i] + cur;
        }, 340);
      }, 1150));

      function finish(fast) {
        if (finished) return;
        finished = true;
        clearInterval(capTimer);
        timers.forEach(clearTimeout);
        intro.classList.add('off');                              // TV collapses to a line
        setTimeout(function () {
          intro.classList.add('gone');                           // fade the black, unlock scroll
          startSite();                                           // hero animates into the reveal
        }, fast ? 220 : 440);
        setTimeout(function () { if (intro.parentNode) intro.remove(); }, (fast ? 220 : 440) + 420);
      }

      // auto-run, or skip on click / key / scroll intent
      timers.push(setTimeout(function () { finish(false); }, 3650));
      intro.addEventListener('click', function () { finish(true); });
      window.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' || e.key === 'Enter' || e.key === ' ') finish(true);
      }, { once: true });
    }
  } else {
    startSite();
  }

  /* ---- sticky nav shadow on scroll ---- */
  var nav = document.getElementById('nav');
  var onScroll = function () {
    nav.classList.toggle('scrolled', window.scrollY > 30);
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  /* ============================================================
     Logo fly-to-nav: the hero logo lifts up into the nav on scroll
     ============================================================ */
  var heroLogo = document.querySelector('.hero__title img');
  var navBrand = document.querySelector('.nav__brand');
  var navLogo  = navBrand ? navBrand.querySelector('img') : null;
  var flyer    = document.getElementById('logoFlyer');
  function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }
  function lerp(a, b, t) { return a + (b - a) * t; }

  var ticking = false;
  function updateLogo() {
    ticking = false;
    if (!heroLogo || !navLogo || !flyer) return;
    var dist = window.innerHeight * 0.55;          // scroll distance for the full flight
    var p = clamp(window.scrollY / dist, 0, 1);

    if (reduce) {                                  // no flight — just reveal the nav logo once scrolled
      nav.classList.toggle('brand-on', p >= 1);
      heroLogo.classList.remove('lifted');
      flyer.classList.remove('on');
      return;
    }

    if (p <= 0.001) {                              // at the very top: only the big hero logo
      heroLogo.classList.remove('lifted');
      flyer.classList.remove('on');
      nav.classList.remove('brand-on');
    } else if (p >= 1) {                           // landed: nav logo stays put
      heroLogo.classList.add('lifted');
      flyer.classList.remove('on');
      nav.classList.add('brand-on');
    } else {                                       // mid-flight: drive the flyer from hero rect → nav rect
      heroLogo.classList.add('lifted');
      nav.classList.remove('brand-on');
      var hr = heroLogo.getBoundingClientRect();
      var nr = navLogo.getBoundingClientRect();
      var left = lerp(hr.left, nr.left, p);
      var top  = lerp(hr.top,  nr.top,  p);
      var w    = lerp(hr.width, nr.width, p);
      flyer.style.width = w + 'px';
      flyer.style.transform = 'translate(' + left + 'px,' + top + 'px)';
      flyer.classList.add('on');
    }
  }
  function onScrollLogo() {
    if (!ticking) { ticking = true; requestAnimationFrame(updateLogo); }
  }
  window.addEventListener('scroll', onScrollLogo, { passive: true });
  window.addEventListener('resize', onScrollLogo);
  updateLogo();

  /* ---- mobile menu ---- */
  var burger = document.getElementById('burger');
  burger.addEventListener('click', function () {
    var open = nav.classList.toggle('open');
    burger.setAttribute('aria-expanded', open ? 'true' : 'false');
  });
  // close the menu after tapping a link
  nav.querySelectorAll('.nav__links a, .nav__cta').forEach(function (a) {
    a.addEventListener('click', function () {
      nav.classList.remove('open');
      burger.setAttribute('aria-expanded', 'false');
    });
  });

  /* ---- scroll reveal ---- */
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('in');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -8% 0px' });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('in'); });
  }

  /* ---- current year ---- */
  var y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();
})();
