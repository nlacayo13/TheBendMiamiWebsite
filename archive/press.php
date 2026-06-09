<?php
require __DIR__ . '/includes/config.php';
$b = biz();
$PAGE = [
  'title'  => "Press & Accolades — The Bend | Best of Miami Dive Bar",
  'desc'   => "The Bend in the press: Best of Miami® winner (Best Suburban Bar 2023, Best Bar West 2015), 4.5★ on Google, 5★ on Tripadvisor, and featured in Miami New Times, the Miami Laker and Edible South Florida.",
  'path'   => '/press.php',
  'jsonld' => 'press',
  'body'   => 'sub',
];
include __DIR__ . '/includes/head.php';
?>

<!-- ===== PRESS HERO ===== -->
<header class="subhero">
  <div class="wrap">
    <nav class="crumbs" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a> <span>›</span> <span>Press &amp; Accolades</span>
    </nav>
    <span class="eyebrow">In Good Company</span>
    <h1 class="subhero__title">Press &amp; <em>Accolades</em></h1>
    <p class="subhero__lede">A neighborhood dive that keeps turning critics' heads. Here's a little of what Miami's been saying about The Bend.</p>
  </div>
</header>

<!-- ===== RATINGS ===== -->
<section class="section press-ratings">
  <div class="wrap">
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
  </div>
</section>

<div class="panels" aria-hidden="true"></div>

<!-- ===== IN THE PRESS ===== -->
<section class="section press-list">
  <div class="wrap">
    <div class="nights__head">
      <span class="eyebrow reveal" style="justify-content:center">As Featured In</span>
      <h2 class="reveal d1">In the <em>Press</em>.</h2>
    </div>

    <div class="press-grid">
      <?php foreach ($b['press'] as $i => $p): ?>
      <article class="press-card reveal d<?= ($i % 4) + 1 ?>">
        <span class="press-card__pub"><?= e($p['pub']) ?></span>
        <h3 class="press-card__title"><?= e($p['title']) ?></h3>
        <p class="press-card__quote"><?= e($p['quote']) ?></p>
        <a class="press-card__link" href="<?= e($p['url']) ?>" target="_blank" rel="noopener">Read the article <span class="arr">→</span></a>
      </article>
      <?php endforeach; ?>
    </div>

    <p class="press-note reveal">
      Press or partnership inquiry? Ring the bar at
      <a href="tel:<?= e(str_replace(['+','-',' '], '', $b['phone'])) ?>"><?= e($b['phoneHuman']) ?></a>
      or DM <a href="<?= e($b['instagram']) ?>" target="_blank" rel="noopener">@thebendmiami</a>.
    </p>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="section press-cta">
  <div class="wrap">
    <h2 class="reveal">Come see what the fuss is about.</h2>
    <div class="press-cta__btns reveal d1">
      <a href="<?= e($b['mapsDir']) ?>" target="_blank" rel="noopener" class="btn btn--sun">Get Directions <span class="arr">→</span></a>
      <a href="<?= e(url('#drinks')) ?>" class="btn btn--ghost">See the Drinks</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
