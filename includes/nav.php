<?php defined('BASE_URL') or exit; ?>
<!-- ===== NAV ===== -->
<nav class="nav" id="nav">
  <a href="<?= e(url()) ?>" class="nav__brand" aria-label="The Bend — home">
    <span class="nav__dot"></span>
    <img src="<?= e(asset('TheBend-Logo-alt.png')) ?>" alt="The Bend">
  </a>
  <div class="nav__links">
    <a href="<?= e(url('#vibe')) ?>">The Vibe</a>
    <a href="<?= e(url('#nights')) ?>">Nights</a>
    <a href="<?= e(url('#drinks')) ?>">Drinks</a>
    <a href="<?= e(url('press.php')) ?>">Press</a>
    <a href="<?= e(url('#find')) ?>">Find Us</a>
  </div>
  <a href="<?= e(biz()['mapsDir']) ?>" class="nav__cta" target="_blank" rel="noopener">Get Directions</a>
  <button class="nav__burger" id="burger" aria-label="Menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>
