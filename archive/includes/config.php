<?php
/* ============================================================
   The Bend — site config, business data, helpers, structured data
   Single source of truth for SEO + JSON-LD. Edit business facts here.
   ============================================================ */

/* ---- Base URL ----------------------------------------------------------
   Auto-detected from the request so OG/canonical URLs are correct on ANY
   domain (preview OR prod) with no find/replace needed. PHP runs server-side,
   so these absolute URLs reach link-preview bots (which don't run JS).
   If you ever sit behind a proxy that rewrites Host, hard-set BASE_URL:
     define('BASE_URL', 'https://www.thebendmiami.com');
------------------------------------------------------------------------- */
if (!defined('BASE_URL')) {
  $scheme = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
            || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'] ?? 'www.goaberrant.com';
  $dir  = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/thebendmiami/index.php')), '/');
  define('BASE_URL', $scheme . '://' . $host . $dir);
}

/* ---- tiny helpers ---- */
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function asset($p) { return BASE_URL . '/' . ltrim($p, '/'); }
function url($p = '') { return BASE_URL . '/' . ltrim($p, '/'); }
define('ASSET_VER', '4');                       // bump to bust CSS/JS caches

/* ---- business data (keep accurate — sourced from owner & public listings) ---- */
function biz() {
  return [
    'name'       => 'The Bend',
    'legalName'  => 'The Bend Liquor Lounge',
    'tagline'    => "Miami's Grooviest Dive Bar",
    'phone'      => '+1-786-542-1948',
    'phoneHuman' => '(786) 542-1948',
    'street'     => '6844 NW 169th St',
    'city'       => 'Hialeah',
    'region'     => 'FL',
    'postal'     => '33015',
    'country'    => 'US',
    'lat'        => 25.9293,   // approximate — refine from Google Business if needed
    'lng'        => -80.3097,  // approximate
    'priceRange' => '$$',
    'founded'    => '2014',
    'instagram'  => 'https://www.instagram.com/thebendmiami/?hl=en',
    'facebook'   => 'https://www.facebook.com/thebendmiami/',
    'mapsDir'    => 'https://www.google.com/maps/dir/?api=1&destination=6844+NW+169th+St+Hialeah+FL+33015',
    'newtimes'   => 'https://www.miaminewtimes.com/location/the-bend-liquor-lounge-7675551/',
    'ratings'    => [
      'google'      => ['value' => '4.5', 'count' => '476', 'url' => 'https://www.google.com/maps/dir/?api=1&destination=6844+NW+169th+St+Hialeah+FL+33015'],
      'tripadvisor' => ['value' => '5',   'count' => null,  'url' => 'https://www.tripadvisor.com/'],
    ],
    'awards' => [
      ['title' => 'Best Suburban Bar', 'src' => 'Best of Miami® · Miami New Times', 'year' => '2023', 'url' => 'https://www.miaminewtimes.com/best-of-miami/2023/eat-and-drink/'],
      ['title' => 'Best Bar, West',    'src' => 'Best of Miami® · Miami New Times', 'year' => '2015', 'url' => 'https://www.miaminewtimes.com/best-of-miami/2015/arts-and-entertainment/'],
    ],
    'press' => [
      [
        'pub'   => 'Miami New Times',
        'title' => 'One of Miami’s best neighborhood dive bars',
        'quote' => 'Nestled inside an unassuming North Dade shopping plaza, the Bend Liquor Lounge has quietly built a reputation as one of Miami’s best neighborhood dive bars. Open for more than a decade, the retro lounge leans into its restored 1970s aesthetic, complete with a massive bar, quirky décor, and a relaxed crowd of regulars.',
        'url'   => 'https://www.miaminewtimes.com/food-drink/best-bars-in-miami-22747229/',
      ],
      [
        'pub'   => 'The Infatuation',
        'title' => 'A pick on Miami’s best-bars guide',
        'quote' => 'The Bend earns its spot in The Infatuation’s rundown of Miami’s best bars — a retro neighborhood lounge worth the trip to the suburbs for serious cocktails and laid-back good company.',
        'url'   => 'https://www.theinfatuation.com/miami/reviews/the-bend',
      ],
      [
        'pub'   => 'Miami Laker',
        'title' => 'The Bend becomes a modern-day, upscale version of a former area lounge',
        'quote' => 'A look at how the longtime neighborhood spot was reborn as a polished, retro-inspired lounge — while keeping the laid-back soul that made it a local favorite.',
        'url'   => 'https://miamilaker.com/Business/the-bend-becomes-modern-day-upscale-version-of-former-area-lounge',
      ],
      [
        'pub'   => 'Spirited Miami · Edible South Florida',
        'title' => 'Raising the Bar',
        'quote' => 'An expanded feature on the owner and the story behind The Bend — the vision, the cocktails, and the love of a proper neighborhood bar.',
        'url'   => 'http://spiritedmiami.com/raising-the-bar-expanded-version-via-edible-south-florida/',
      ],
    ],
  ];
}

/* ---- description used across meta + schema ---- */
function biz_description() {
  return "The Bend is an award-winning retro 1970s dive bar in Hialeah, Florida (suburban Miami). "
       . "Open for more than a decade with restored '70s décor, a massive bar, craft beer, fresh-ingredient "
       . "cocktails and house signature drinks — plus live DJs, karaoke and trivia. No food, just damn good drinks.";
}

/* ---- JSON-LD structured data (BarOrPub + WebSite) ---- */
function render_jsonld($page = 'home') {
  $b = biz();
  $bar = [
    '@type'         => 'BarOrPub',
    '@id'           => BASE_URL . '/#bar',
    'name'          => $b['legalName'],
    'alternateName' => $b['name'],
    'description'   => biz_description(),
    'url'           => BASE_URL . '/',
    'telephone'     => $b['phone'],
    'image'         => [asset('og-image.png'), asset('booth-neon.jpg'), asset('booth-row.jpg')],
    'logo'          => asset('TheBend-Logo-alt.png'),
    'priceRange'    => $b['priceRange'],
    'foundingDate'  => $b['founded'],
    'currenciesAccepted' => 'USD',
    'paymentAccepted'    => 'Cash, Credit Card',
    'smokingAllowed'     => false,
    'address' => [
      '@type'           => 'PostalAddress',
      'streetAddress'   => $b['street'],
      'addressLocality' => $b['city'],
      'addressRegion'   => $b['region'],
      'postalCode'      => $b['postal'],
      'addressCountry'  => $b['country'],
    ],
    'geo'    => ['@type' => 'GeoCoordinates', 'latitude' => $b['lat'], 'longitude' => $b['lng']],
    'hasMap' => $b['mapsDir'],
    'sameAs' => [$b['instagram'], $b['facebook'], $b['newtimes']],
    'aggregateRating' => [
      '@type'       => 'AggregateRating',
      'ratingValue' => $b['ratings']['google']['value'],
      'reviewCount' => $b['ratings']['google']['count'],
      'bestRating'  => '5',
      'worstRating' => '1',
    ],
    'award' => array_map(function ($a) {
      return $a['title'] . ' — ' . $a['src'] . ' ' . $a['year'];
    }, $b['awards']),
  ];

  $website = [
    '@type'     => 'WebSite',
    '@id'       => BASE_URL . '/#website',
    'url'       => BASE_URL . '/',
    'name'      => $b['name'] . ' — ' . $b['tagline'],
    'publisher' => ['@id' => BASE_URL . '/#bar'],
    'inLanguage'=> 'en-US',
  ];

  $graph = [$bar, $website];

  if ($page === 'press') {
    $graph[] = [
      '@type' => 'BreadcrumbList',
      'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => BASE_URL . '/'],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Press & Accolades', 'item' => BASE_URL . '/press.php'],
      ],
    ];
  }

  $doc = ['@context' => 'https://schema.org', '@graph' => $graph];
  return '<script type="application/ld+json">'
       . json_encode($doc, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
       . '</script>';
}
