<?php
defined('BASE_URL') or exit;
$b = biz();
$P = array_merge([
  'title'    => $b['name'] . ' — ' . $b['tagline'],
  'desc'     => biz_description(),
  'path'     => '/',
  'og_image' => 'og-image.png',
  'og_type'  => 'website',
  'jsonld'   => 'home',
  'body'     => 'home',
], $PAGE ?? []);

$canonical = BASE_URL . $P['path'];
$ogImage   = asset($P['og_image']) . '?v=' . ASSET_VER;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= e($P['title']) ?></title>
<meta name="description" content="<?= e($P['desc']) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="author" content="<?= e($b['legalName']) ?>">
<meta name="theme-color" content="#160c06">

<!-- Local SEO / geo -->
<meta name="geo.region" content="US-FL">
<meta name="geo.placename" content="Hialeah, Florida">
<meta name="geo.position" content="<?= e($b['lat']) ?>;<?= e($b['lng']) ?>">
<meta name="ICBM" content="<?= e($b['lat']) ?>, <?= e($b['lng']) ?>">

<!-- Open Graph -->
<meta property="og:site_name" content="<?= e($b['name']) ?>">
<meta property="og:title" content="<?= e($P['title']) ?>">
<meta property="og:description" content="<?= e($P['desc']) ?>">
<meta property="og:type" content="<?= e($P['og_type']) ?>">
<meta property="og:locale" content="en_US">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:image:secure_url" content="<?= e($ogImage) ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="The Bend logo glowing on a retro 1970s TV screen with sunburst rays">

<!-- Twitter / X -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($P['title']) ?>">
<meta name="twitter:description" content="<?= e($P['desc']) ?>">
<meta name="twitter:image" content="<?= e($ogImage) ?>">
<meta name="twitter:image:alt" content="The Bend logo on a retro TV screen with sunburst rays">
<link rel="image_src" href="<?= e($ogImage) ?>">

<!-- Favicons / icons -->
<link rel="icon" href="<?= e(asset('favicon.ico')) ?>" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="<?= e(asset('favicon-32x32.png')) ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?= e(asset('favicon-16x16.png')) ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?= e(asset('apple-touch-icon.png')) ?>">
<link rel="manifest" href="<?= e(asset('site.webmanifest')) ?>">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bagel+Fat+One&family=Righteous&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400;1,9..144,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e(asset('styles.css')) ?>?v=<?= ASSET_VER ?>">

<?= render_jsonld($P['jsonld']) ?>
</head>
<body class="<?= e($P['body']) ?>">

<!-- ===== bending stripe backdrop ===== -->
<div class="bend-bg" aria-hidden="true">
  <svg viewBox="0 0 1400 900" preserveAspectRatio="xMidYMid slice" fill="none">
    <g class="bend-band" stroke-linecap="round">
      <path d="M-200 720 Q 500 360 1600 640" stroke="#cf3c0a" stroke-width="120" opacity=".5"/>
      <path d="M-200 770 Q 500 410 1600 690" stroke="#f0531c" stroke-width="120" opacity=".55"/>
      <path d="M-200 820 Q 500 460 1600 740" stroke="#ffa733" stroke-width="120" opacity=".5"/>
      <path d="M-200 870 Q 500 510 1600 790" stroke="#ffc99b" stroke-width="120" opacity=".4"/>
    </g>
    <g class="bend-band" stroke-linecap="round">
      <path d="M-200 120 Q 700 -120 1600 180" stroke="#1bd6c7" stroke-width="46" opacity=".22"/>
      <path d="M-200 60 Q 700 -180 1600 120" stroke="#ffa733" stroke-width="30" opacity=".18"/>
    </g>
    <g class="bend-band" stroke-linecap="round">
      <path d="M-200 460 Q 600 240 1600 460" stroke="#f0531c" stroke-width="14" opacity=".25"/>
      <path d="M-200 510 Q 600 300 1600 520" stroke="#ffc99b" stroke-width="10" opacity=".2"/>
    </g>
  </svg>
</div>

<?php include __DIR__ . '/nav.php'; ?>
