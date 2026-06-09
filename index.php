<?php
require __DIR__ . '/includes/config.php';
$PAGE = [
  'title'  => "The Bend — Miami's Grooviest Dive Bar | Hialeah, FL",
  'desc'   => "Award-winning retro 1970s dive bar in Hialeah, FL (suburban Miami). Orange booths, ice-cold cocktails, live DJs & karaoke. 4.5★ on Google, Best of Miami winner. No food — just damn good drinks.",
  'path'   => '/',
  'jsonld' => 'home',
  'body'   => 'home',
];
include __DIR__ . '/includes/head.php';
$b = biz();
?>

<!-- ===== retro CRT-TV intro (home only) ===== -->
<div id="intro" class="intro" role="presentation">
  <div class="intro__crt">
    <div class="intro__sun" aria-hidden="true"></div>
    <div class="intro__stack">
      <img class="intro__logo" src="<?= e(asset('TheBend-Logo-alt.png')) ?>" alt="The Bend">
      <p class="intro__cap" id="introCap">Warming up the disco ball<span class="intro__cur">_</span></p>
      <div class="intro__bar"><span></span></div>
    </div>
    <div class="intro__skip">Click anywhere to skip ⏭</div>
  </div>
  <div class="intro__line" aria-hidden="true"></div>
</div>

<!-- logo that flies from hero center up into the nav on scroll -->
<img id="logoFlyer" class="logo-flyer" src="<?= e(asset('TheBend-Logo-alt.png')) ?>" alt="" aria-hidden="true">

<!-- ===== HERO ===== -->
<header class="hero" id="top">
  <div class="hero__inner">
    <span class="eyebrow">A Groovy Miami Dive Bar</span>
    <h1 class="hero__title">
      <i class="hero__spark hero__spark--l" aria-hidden="true">✷</i>
      <img src="<?= e(asset('TheBend-Logo-alt.png')) ?>" alt="The Bend">
      <i class="hero__spark hero__spark--r" aria-hidden="true">✷</i>
    </h1>
    <div class="hero__ribbon">
      <span class="hero__star">★</span> Est. 2014 &nbsp;·&nbsp; Hialeah, Florida <span class="hero__star">★</span>
    </div>
    <p class="hero__lede">Orange booths, wood-panel walls and ice-cold cocktails. <em>Step into a 1970s daydream</em> — tucked in the suburbs, glowing all night long.</p>
    <div class="hero__actions">
      <a href="#nights" class="btn btn--sun">See What's On <span class="arr">→</span></a>
      <a href="#drinks" class="btn btn--ghost">The Drink List</a>
    </div>
    <div class="hero__loc">
      <span>📍 <b>Hialeah, FL</b></span>
      <span>🍸 Cocktails, no food</span>
      <span>🎤 Karaoke &amp; live DJs</span>
    </div>
  </div>
</header>

<!-- ===== MARQUEE ===== -->
<div class="marquee" aria-hidden="true">
  <div class="marquee__track">
    <span>Yoda lives here</span><span class="star">✦</span>
    <span>Cold beer, warm vibes</span><span class="star">✦</span>
    <span>Upside down &amp; loving it</span><span class="star">✦</span>
    <span>Best DJs in the burbs</span><span class="star">✦</span>
    <span>Grab the mic</span><span class="star">✦</span>
    <span>Yoda lives here</span><span class="star">✦</span>
    <span>Cold beer, warm vibes</span><span class="star">✦</span>
    <span>Upside down &amp; loving it</span><span class="star">✦</span>
    <span>Best DJs in the burbs</span><span class="star">✦</span>
    <span>Grab the mic</span><span class="star">✦</span>
  </div>
</div>

<!-- ===== VIBE ===== -->
<section class="vibe section" id="vibe">
  <div class="wrap vibe__grid">
    <div class="vibe__copy">
      <span class="eyebrow reveal">Step Inside the Time Warp</span>
      <h2 class="reveal d1">A whole lotta <em>retro</em> in one little room.</h2>
      <p class="reveal d1">Push the door open and it's 1974 again — diagonal wood panels with mirror stripes that meet at angles, candlelight bouncing off tangerine vinyl booths, and that low amber glow you only find in a real dive.</p>
      <p class="reveal d2">There's a life-size Yoda holding court in the middle of it all, nods to classic Miami on the walls, a little Stranger Things creeping in, and LED light washing over everything. Ten-plus years strong and grooving harder than ever.</p>
      <div class="vibe__tags reveal d3">
        <span class="tag">Orange booths</span>
        <span class="tag">Wood &amp; mirror walls</span>
        <span class="tag">Yoda approved</span>
        <span class="tag">LED glow</span>
        <span class="tag">Proper dive</span>
      </div>
    </div>

    <div class="collage reveal d2">
      <figure class="c1"><img src="<?= e(asset('booth-neon.jpg')) ?>" alt="Orange tufted booths beneath angled wood panels and a teal COLD BEER neon sign inside The Bend"></figure>
      <figure class="c2"><img src="<?= e(asset('booth-row.jpg')) ?>" alt="A row of bright orange booths and bar stools along the wood-panelled wall at The Bend"></figure>
      <div class="collage__badge">Est.<br>2014<small>Forever Retro</small></div>
    </div>
  </div>
</section>

<div class="panels" aria-hidden="true"></div>

<!-- ===== ACCOLADES ===== -->
<section class="accolades section" id="accolades">
  <div class="wrap">
    <div class="accolades__head">
      <span class="eyebrow reveal" style="justify-content:center">The Word's Out</span>
      <h2 class="reveal d1">Loved by the <em>locals</em> — and the critics.</h2>
    </div>

    <div class="accolades__grid">
      <a class="acc-card reveal d1" href="<?= e($b['ratings']['google']['url']) ?>" target="_blank" rel="noopener">
        <span class="stars" style="--pct:90%" aria-hidden="true"></span>
        <b class="acc-card__big">4.5<span>/5</span></b>
        <span class="acc-card__meta">476 reviews · Google Maps</span>
      </a>
      <a class="acc-card reveal d2" href="<?= e($b['ratings']['tripadvisor']['url']) ?>" target="_blank" rel="noopener">
        <span class="stars" style="--pct:100%" aria-hidden="true"></span>
        <b class="acc-card__big">5.0<span>/5</span></b>
        <span class="acc-card__meta">Rated on Tripadvisor</span>
      </a>
      <a class="acc-card acc-card--award reveal d3" href="<?= e($b['awards'][0]['url']) ?>" target="_blank" rel="noopener">
        <span class="acc-card__medal">🏆</span>
        <b>Best Suburban Bar</b>
        <span class="acc-card__meta">Best of Miami® · New Times <?= e($b['awards'][0]['year']) ?></span>
      </a>
      <a class="acc-card acc-card--award reveal d4" href="<?= e($b['awards'][1]['url']) ?>" target="_blank" rel="noopener">
        <span class="acc-card__medal">🥇</span>
        <b>Best Bar, West</b>
        <span class="acc-card__meta">Best of Miami® · New Times <?= e($b['awards'][1]['year']) ?></span>
      </a>
    </div>

    <blockquote class="accolades__quote reveal d2">
      &ldquo;One of Miami&rsquo;s best neighborhood dive bars.&rdquo;
      <cite>— Miami New Times</cite>
    </blockquote>

    <div class="accolades__cta reveal d2">
      <a href="<?= e(url('press.php')) ?>" class="btn btn--ghost">Read the Press <span class="arr">→</span></a>
    </div>
  </div>
</section>

<!-- ===== NIGHTS ===== -->
<section class="nights section" id="nights">
  <div class="wrap">
    <div class="nights__head">
      <span class="eyebrow reveal" style="justify-content:center">What's On</span>
      <h2 class="reveal d1">Every night's a <em>good</em> night.</h2>
      <p class="reveal d2">Weekends get loud, the booths fill up, and the room glows. Here's the lineup that keeps the suburbs coming back.</p>
    </div>

    <div class="cards">
      <article class="card reveal d1">
        <span class="card__num">01</span>
        <span class="card__icon">🎤</span>
        <h3>Karaoke Nights</h3>
        <p>Grab the mic, find your light, and give the room a show. No judgment — just applause and another round.</p>
        <span class="card__when">Weekends · Late</span>
      </article>
      <article class="card reveal d2">
        <span class="card__num">02</span>
        <span class="card__icon">🎧</span>
        <h3>Live DJ Sets</h3>
        <p>The best DJs in the burbs spinning disco, funk and everything that makes the booths shake till close.</p>
        <span class="card__when">Fri &amp; Sat · Prime time</span>
      </article>
      <article class="card reveal d3">
        <span class="card__num">03</span>
        <span class="card__icon">🍸</span>
        <h3>Cocktail Hour</h3>
        <p>Amazing cocktails at honest prices, poured strong. Pull up to a booth and let the bartender surprise you.</p>
        <span class="card__when">Open → Close</span>
      </article>
      <article class="card reveal d4">
        <span class="card__num">04</span>
        <span class="card__icon">🛸</span>
        <h3>The Easter Eggs</h3>
        <p>Yoda, the Upside Down, vintage Miami — hunt down every retro detail tucked into the panels and corners.</p>
        <span class="card__when">All night, every night</span>
      </article>
    </div>
  </div>
</section>

<!-- ===== DRINKS ===== -->
<section class="drinks section" id="drinks">
  <div class="wrap">
    <div class="drinks__top">
      <div>
        <span class="eyebrow reveal">The List</span>
        <h2 class="reveal d1">No food. Just <em>damn good</em> drinks.</h2>
      </div>
      <p class="drinks__note reveal d2">Strong pours, honest prices, and a little attitude in every glass. Open &amp; shaking until 3AM, every single night.</p>
    </div>

    <!-- ===== COCKTAILS ===== -->
    <div class="menu__group reveal d1">
      <h3 class="menu__title">Cocktails</h3>
      <div class="menu__list">
        <div class="drink">
          <span class="drink__name"><b>Bend Dover</b><span class="drink__desc">Benchmark bourbon, lemon, honey, apricot, rosemary bitters</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Purple Rain</b><span class="drink__desc">Ford's infused gin, St. Germain, lemon, sugar</span></span>
          <span class="drink__dots"></span><span class="drink__price">13</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Midnight Fling</b><span class="drink__desc">New Amsterdam gin, lemon, velvet falernum, orgeat, bubbles</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Bada-Bing</b><span class="drink__desc">Old Overholt rye, vanilla bitters, smoked</span></span>
          <span class="drink__dots"></span><span class="drink__price">14</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>No Tan Lines</b><span class="drink__desc">New Amsterdam gin, lemon, lavender, cucumber, mint, bitters</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Quemado</b><span class="drink__desc">Los Vecinos mezcal, Corazón reposado, agave, dark chocolate, bitters</span></span>
          <span class="drink__dots"></span><span class="drink__price">14</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Don Francisco</b><span class="drink__desc">Los Vecinos mezcal, Aperol, grapefruit, agave, basil</span></span>
          <span class="drink__dots"></span><span class="drink__price">13</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Tiki Tiki</b><span class="drink__desc">Rye, amaretto, Plantation pineapple &amp; overproof rum, Flor de Caña, grapefruit, pineapple, angostura</span></span>
          <span class="drink__dots"></span><span class="drink__price">14</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Talk to the Hand</b><span class="drink__desc">New Amsterdam vodka, lemon, passion fruit, bitters, bubbles</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Schwing</b><span class="drink__desc">Gin, raspberries, cucumber, lime, soda, egg white</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>You're Killin' Me Smalls</b><span class="drink__desc">Corazón blanco, orange curaçao, coconut, lime, passion fruit, bitters</span></span>
          <span class="drink__dots"></span><span class="drink__price">13</span>
        </div>
        <div class="drink drink--feat">
          <span class="drink__star">★ House Pour ★</span>
          <b>The Big Bender</b>
          <span class="drink__desc">Vodka, iced tea, guava, fresh lemon</span>
          <span class="drink__price">$10</span>
        </div>
      </div>
    </div>

    <!-- ===== CLASSICS ===== -->
    <div class="menu__group reveal d2">
      <h3 class="menu__title">Classics</h3>
      <div class="menu__list">
        <div class="drink">
          <span class="drink__name"><b>Tommy's Margarita</b><span class="drink__desc">Tequila, agave, lime</span></span>
          <span class="drink__dots"></span><span class="drink__price">11</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Tom Collins</b><span class="drink__desc">Gin, simple, lemon, soda water</span></span>
          <span class="drink__dots"></span><span class="drink__price">11</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Daiquiri</b><span class="drink__desc">Rum, simple, lime</span></span>
          <span class="drink__dots"></span><span class="drink__price">11</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Bee's Knees</b><span class="drink__desc">New Amsterdam gin, honey, lemon</span></span>
          <span class="drink__dots"></span><span class="drink__price">11</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Mai Tai</b><span class="drink__desc">White &amp; dark rum, orgeat, orange curaçao, lime</span></span>
          <span class="drink__dots"></span><span class="drink__price">12</span>
        </div>
        <div class="drink">
          <span class="drink__name"><b>Old Fashioned</b><span class="drink__desc">Benchmark bourbon, simple, angostura bitters</span></span>
          <span class="drink__dots"></span><span class="drink__price">11</span>
        </div>
        <div class="drink drink--feat">
          <span class="drink__star">★ The Infamous ★</span>
          <b>Pusser's Painkiller</b>
          <span class="drink__desc">Pusser's Navy rum, pineapple, orange juice, Coco López, fresh ground nutmeg</span>
          <span class="drink__price">$12</span>
        </div>
      </div>
    </div>

    <div class="drinks__foot reveal d2">
      <p><b>Open until 3AM, every day.</b> &nbsp;·&nbsp; 21+ with valid ID &nbsp;·&nbsp; 18% service charge added to checks over $25</p>
    </div>
  </div>
</section>

<!-- ===== FIND US ===== -->
<section class="find section" id="find">
  <div class="wrap find__grid">
    <div>
      <span class="eyebrow reveal">Roll On Over</span>
      <h2 class="reveal d1">Find <em>The Bend.</em></h2>
      <div class="info">
        <div class="info__row reveal d1">
          <div class="info__ic">📍</div>
          <div>
            <h5>The Spot</h5>
            <p><a href="<?= e($b['mapsDir']) ?>" target="_blank" rel="noopener"><?= e($b['street']) ?><br><?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal']) ?> · Tap for directions</a></p>
          </div>
        </div>
        <div class="info__row reveal d2">
          <div class="info__ic">📞</div>
          <div>
            <h5>Ring the Bar</h5>
            <p><a href="tel:<?= e(str_replace(['+','-',' '], '', $b['phone'])) ?>"><?= e($b['phoneHuman']) ?></a></p>
          </div>
        </div>
        <div class="info__row reveal d3">
          <div class="info__ic">📸</div>
          <div>
            <h5>Follow the Glow</h5>
            <p><a href="<?= e($b['instagram']) ?>" target="_blank" rel="noopener">@thebendmiami</a> on Instagram for nightly lineups &amp; karaoke clips</p>
          </div>
        </div>
      </div>
    </div>

    <aside class="clockcard reveal d2">
      <div class="clockcard__neon">Cold<br>Beer</div>
      <div class="clockcard__hours">
        <div class="day"><b>Open 7 Nights</b><span>Every single day</span></div>
        <div class="day hot"><b>Last Call</b><span>3:00 AM · every night</span></div>
        <div class="day"><b>Fri &amp; Sat</b><span>Live DJs &amp; Karaoke</span></div>
        <div class="day"><b>Doors</b><span>Call ahead — <?= e($b['phoneHuman']) ?></span></div>
      </div>
    </aside>
  </div>

  <div class="wrap find__map reveal d1">
    <span class="find__map-tag">📍 You'll find us here</span>
    <iframe
      title="Map to The Bend — <?= e($b['street']) ?>, <?= e($b['city']) ?>, <?= e($b['region']) ?> <?= e($b['postal']) ?>"
      src="https://www.google.com/maps?q=6844+NW+169th+St,+Hialeah,+FL+33015&output=embed"
      loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
