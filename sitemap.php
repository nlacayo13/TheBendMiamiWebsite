<?php
require __DIR__ . '/includes/config.php';
header('Content-Type: application/xml; charset=utf-8');
$today = date('Y-m-d');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
$pages = [
  ['',          '1.0', 'weekly'],
  ['press.php', '0.6', 'monthly'],
];
foreach ($pages as $p) {
  echo '  <url>'
     . '<loc>' . e(url($p[0])) . '</loc>'
     . '<lastmod>' . $today . '</lastmod>'
     . '<changefreq>' . $p[2] . '</changefreq>'
     . '<priority>' . $p[1] . '</priority>'
     . '</url>' . "\n";
}
echo '</urlset>' . "\n";
