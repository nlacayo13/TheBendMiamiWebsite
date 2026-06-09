# The Bend — Website

Marketing website for **The Bend** (legal name *The Bend Liquor Lounge*) — an
award-winning retro **1970s dive bar** in Hialeah, FL (suburban Miami), open since 2014.

> *Orange booths, wood-panel walls, ice-cold cocktails, the best DJs in the burbs and
> a life-size Yoda holding court. Step into a 1970s daydream.*

The whole design is built around the bar's name: sweeping, layered **"bend"** stripes
(orange → amber → peach with teal neon accents) like a 70s sunset super-graphic,
echoing the real interior — tufted tangerine booths, angled wood panels with mirror
stripes, the teal "COLD BEER" neon, and warm candlelight.

🔗 **Preview:** https://www.goaberrant.com/thebendmiami/ · **Production:** _TBD_

---

## ✨ Features

- **Retro CRT-TV intro** — the screen powers on, a sunburst spins, the logo *boings*
  in, a segmented loading bar fills while funny captions cycle ("Polishing the orange
  booths…", "Telling Yoda we're open…"), then the whole thing collapses like an old TV
  switching off to reveal the page. Click-to-skip; respects reduced-motion.
- **Logo fly-to-nav** — at the top the nav has no logo; as you scroll, the centered
  hero logo flies up and locks into the navbar.
- **Layered "bend" stripe backdrop** — animated 70s sunset super-graphic behind every page.
- **Accolades & social proof** — Google 4.5★ (476 reviews), Tripadvisor 5★, and the
  *Best of Miami®* awards, shown as retro star-meters and award medallions.
- **Press page** — featured write-ups from Miami New Times, The Infatuation, the Miami
  Laker, and Edible South Florida.
- **Real cocktail menu** — the full Cocktails + Classics list, with two featured pours.
- **Find Us** — address, phone, hours, socials, and an embedded (keyless) Google Map
  styled to match the retro vibe.
- **Production SEO** — per-page meta, canonical, geo tags, Open Graph + Twitter cards,
  JSON-LD structured data (`BarOrPub`), `sitemap.xml`, `robots.txt`.
- **Custom retro OG share image** (the loader screen inside a wood-grain TV) + a full
  favicon set generated from the logo.
- **Fully responsive** and accessibility-aware (reduced-motion, alt text, semantic markup).

---

## 🛠 Tech stack

**PHP 8.x + plain CSS & vanilla JS. No framework, no build step, no dependencies.**

Shared PHP includes render the `<head>`, nav and footer so the two pages stay DRY.

| Role | Choice |
| --- | --- |
| Display font | [Bagel Fat One](https://fonts.google.com/specimen/Bagel+Fat+One) — chunky 70s headline |
| Accent font | [Righteous](https://fonts.google.com/specimen/Righteous) — geometric labels/nav |
| Body font | [Fraunces](https://fonts.google.com/specimen/Fraunces) — vintage serif |
| Fonts delivery | Google Fonts CDN |
| Server | Any host that runs PHP (7.4+; built with 8.x) |

---

## 📁 Project structure

```
thebendmiami/
├── index.php              # Homepage (intro, hero, marquee, vibe, accolades, nights, drinks, find)
├── press.php              # Press & Accolades page
├── includes/
│   ├── config.php         # ⭐ Single source of truth: BASE_URL, biz() data, helpers, JSON-LD
│   ├── head.php           # Full <head> (SEO/OG/JSON-LD) + opens <body>, bend-bg, nav
│   ├── nav.php            # Top navigation
│   └── footer.php         # Footer
├── styles.css             # All styling (CSS custom properties in :root)
├── script.js              # Intro, nav, scroll-reveal, logo fly-to-nav (one vanilla IIFE)
│
├── TheBend-Logo-alt.png   # Transparent logo (nav, hero, footer, intro, OG, favicon)
├── booth-neon.jpg         # Real interior photo (vibe collage)
├── booth-row.jpg          # Real interior photo (vibe collage)
├── og-image.png           # Social share image (1200×630 retro TV)
├── favicon.ico / -16 / -32 / -512 / apple-touch-icon.png / site.webmanifest
│
├── robots.txt             # Crawl rules (honored at a domain root)
├── sitemap.php            # Dynamic sitemap (also served at /sitemap.xml via .htaccess)
├── .htaccess              # DirectoryIndex, gzip, caching, security headers, blocks /includes
│
├── CLAUDE.md              # Notes for AI-assisted edits
└── README.md             # You are here

# Dev-only (NOT needed on the server):
#   og.html  favicon-src.html   (HTML generators for the OG image & favicons)
#   1.jpg  2.jpg  logo.png  menu1.jpg   (photo / menu originals)
```

---

## 🚀 Local development

No build step — just serve the folder with PHP:

```bash
cd thebendmiami
php -S 127.0.0.1:8080
```

Then open **http://127.0.0.1:8080**.

Lint PHP after edits:

```bash
php -l index.php && php -l press.php && php -l includes/config.php
```

---

## ✏️ Editing content

**Almost everything lives in one place: `biz()` in `includes/config.php`.**
Change it once and it updates the visible page, the meta tags, **and** the JSON-LD
structured data together.

That includes:

- **Address, phone, geo coordinates**
- **Socials** (Instagram, Facebook)
- **Ratings** — Google (4.5 / 476) and Tripadvisor (5)
- **Awards** — Best Suburban Bar (2023) and Best Bar, West (2015) — *Best of Miami® / Miami New Times*
- **Press** — Miami New Times, The Infatuation, Miami Laker, Spirited Miami · Edible South Florida

After changing CSS/JS or the OG image, bump **`ASSET_VER`** in `config.php` to bust caches.

The **cocktail menu** is hand-coded in `index.php` (the Drinks section), transcribed
from the printed menu (`menu1.jpg`).

### Business facts (current)

| | |
| --- | --- |
| **Address** | 6844 NW 169th St, Hialeah, FL 33015 |
| **Phone** | (786) 542-1948 |
| **Hours** | Open 7 nights · last call **3:00 AM every day** · Fri & Sat = live DJs & karaoke |
| **Founded** | 2014 |
| **Vibe** | Cocktails only — **no food** · 21+ · 18% service charge on checks over $25 |
| **Instagram** | [@thebendmiami](https://www.instagram.com/thebendmiami/) |
| **Facebook** | [facebook.com/thebendmiami](https://www.facebook.com/thebendmiami/) |

---

## 🔍 SEO & structured data

- Per-page `<title>`, meta description, `canonical`, robots, and local-geo meta
  (`geo.region`, `geo.position`, `ICBM`).
- **Open Graph + Twitter** cards with an absolute image URL.
- **JSON-LD**: `BarOrPub` (address, geo, `aggregateRating`, `award[]`, `sameAs`),
  `WebSite`, and a `BreadcrumbList` on the press page.
- `sitemap.php` (served as `/sitemap.xml`) and `robots.txt`.

### The Open Graph / link-preview detail (important)

Link-preview bots (iMessage, Facebook, etc.) **don't run JavaScript** and need
**absolute** image URLs. Because this site is PHP, `BASE_URL` is **auto-detected from
the request**, so `og:image`, `og:url`, and `canonical` are emitted as absolute URLs
that resolve correctly on **any** domain — preview or production — **with no
find/replace.** If a proxy ever rewrites the Host header, hard-set it near the top of
`config.php`:

```php
define('BASE_URL', 'https://www.thebendmiami.com');
```

After deploying, verify the image loads directly (`/og-image.png`) and re-scrape via
the [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/).
iMessage caches per URL — test with a throwaway query like `?2`.

Validate the structured data at the
[Rich Results Test](https://search.google.com/test/rich-results).

---

## 🎨 Regenerating image assets

The OG image and favicons are produced by screenshotting generator HTML with Playwright
Chromium.

```bash
# OG image (1200×630) from og.html
node -e "import('playwright-core').then(async({chromium})=>{
  const b=await chromium.launch({args:['--no-sandbox']});
  const p=await b.newPage({viewport:{width:1200,height:630}});
  await p.goto('file://'+process.cwd()+'/og.html'); await p.waitForTimeout(1400);
  await (await p.\$('#og')).screenshot({path:'og-image.png'}); await b.close();
})"
```

Favicons render from `favicon-src.html` at 512 / 180 (`?sq=1`) / 32 / 16; the `.ico` is
a PNG-embedded ICO built from `favicon-32x32.png`.

---

## 📦 Deployment

1. Server must run **PHP** (8.x recommended; 7.4+ fine).
2. Upload **everything except** the dev-only files:
   `og.html`, `favicon-src.html`, `1.jpg`, `2.jpg`, `logo.png`, `menu1.jpg`.
3. **Remember to upload new/changed files** — `og-image.png` and the favicons must be
   on the server (a missing OG image = broken link previews).
4. `.htaccess` sets `DirectoryIndex` to `index.php`. No build step.
5. The **one** manual production edit: the `Sitemap:` line in `robots.txt` (robots is
   only honored at a domain root, so it matters once The Bend has its own domain).
   All other URLs auto-resolve.

---

## ♿ Accessibility & support

- Honors `prefers-reduced-motion` (intro, logo-fly, reveals, marquee, all motion).
- Semantic landmarks, alt text on imagery, labelled controls, keyboard-skippable intro.
- Responsive from large desktop down to 390 px phones (hamburger nav, stacked layouts).
- Tested in current Chromium-based browsers; progressive-enhancement friendly.

---

## 🙌 Credits

- **The Bend Liquor Lounge** — Hialeah, FL · Est. 2014
- Photography & logo provided by the owner
- Design & development by **[Aberrant | Web Experts](https://www.goaberrant.com/)**

© The Bend Liquor Lounge. Please sip responsibly. 21+.
