<?php defined('BASE_URL') or exit; $b = biz(); ?>
<!-- ===== FOOTER ===== -->
<footer class="footer">
  <div class="wrap">
    <div class="footer__top">
      <div class="footer__brand">
        <img src="<?= e(asset('TheBend-Logo-alt.png')) ?>" alt="The Bend — Est. 2014" class="footer__logo">
        <small>Miami's grooviest dive · <?= e($b['street']) ?>, <?= e($b['city']) ?> <?= e($b['region']) ?> · Est. <?= e($b['founded']) ?></small>
      </div>
      <nav class="footer__nav" aria-label="Footer">
        <a href="<?= e(url('#vibe')) ?>">The Vibe</a>
        <a href="<?= e(url('#nights')) ?>">Nights</a>
        <a href="<?= e(url('#drinks')) ?>">Drinks</a>
        <a href="<?= e(url('press.php')) ?>">Press</a>
        <a href="<?= e(url('#find')) ?>">Find Us</a>
      </nav>
      <div class="footer__socials">
        <a href="<?= e($b['instagram']) ?>" target="_blank" rel="noopener" aria-label="The Bend on Instagram">IG</a>
        <a href="<?= e($b['facebook']) ?>" target="_blank" rel="noopener" aria-label="The Bend on Facebook">FB</a>
      </div>
    </div>
    <div class="footer__bar">
      <span>© <?= date('Y') ?> <?= e($b['legalName']) ?>. Please sip responsibly. 21+.</span>
      <span><a href="<?= e(url()) ?>">Back to the top ↑</a></span>
    </div>
    <div class="footer__credit">
      Website developed by
      <a href="https://www.goaberrant.com/" target="_blank" rel="noopener">Aberrant <span>| Web Experts</span></a>
    </div>
  </div>
</footer>

<script src="<?= e(asset('script.js')) ?>?v=<?= ASSET_VER ?>"></script>
</body>
</html>
