# CLAUDE.md — The Bend website

Orientation doc for future edits. Read this first.

## What this is
Marketing site for **The Bend** (legal name **The Bend Liquor Lounge**), an
award-winning retro 1970s dive bar in Hialeah, FL (suburban Miami), open since 2014.
The design is built around the bar's name: sweeping, layered **"bend"** stripes
(orange → amber → peach, teal accents) like a 70s sunset super-graphic, echoing the
real interior (orange tufted booths, angled wood panels with mirror stripes, teal
"COLD BEER" neon, candlelight). Lean into the retro maximalism — more groovy, not less.

## Tech stack
- **PHP (8.x) + plain CSS/JS. No framework, no build step, no dependencies.**
- Shared PHP includes render the head/nav/footer so pages stay DRY.
- Preview locally: `php -S 127.0.0.1:8080` in the project root → http://127.0.0.1:8080
- Fonts via Google Fonts CDN: **Bagel Fat One** (chunky display), **Righteous**
  (geometric accent/labels/nav), **Fraunces** (vintage serif body/menu).

## File map
**Pages**
- `index.php` — homepage (intro, hero, marquee, vibe, accolades, nights, drinks, find)
- `press.php` — Press & Accolades page

**Includes (`includes/`, guarded with `defined('BASE_URL') or exit;`)**
- `config.php` — **the single source of truth.** `BASE_URL` (auto-detected),
  helpers `e()/asset()/url()`, `ASSET_VER`, `biz()` (all business data: address,
  phone, geo, socials, ratings, awards, press), `biz_description()`, and
  `render_jsonld()` (BarOrPub + WebSite + optional BreadcrumbList).
- `head.php` — full `<head>` (SEO meta, OG/Twitter, geo, favicons, fonts, JSON-LD).
  Also opens `<body>`, renders the `.bend-bg` stripe backdrop, and includes nav.
  Each page sets a `$PAGE` array (title, desc, path, jsonld, body) before including it.
- `nav.php`, `footer.php`

**Assets / styling**
- `styles.css` — all styling (CSS custom props in `:root`)
- `script.js` — intro sequence, nav, scroll-reveal, logo fly-to-nav (vanilla, one IIFE)
- `TheBend-Logo-alt.png` — the real transparent logo (nav, hero, footer, intro, OG, favicon source)
- `booth-neon.jpg`, `booth-row.jpg` — real interior photos (vibe collage)
- `og-image.png` — social share image (1200×630, retro TV)
- `favicon.ico`, `favicon-16x16.png`, `favicon-32x32.png`, `favicon-512.png`, `apple-touch-icon.png`, `site.webmanifest`

**Production / SEO**
- `robots.txt` (only honored at a domain ROOT — works at prod), `sitemap.php`
  (dynamic; also served at `/sitemap.xml` via `.htaccess`), `.htaccess`
  (DirectoryIndex, gzip, caching, security headers, blocks `includes/`).

**Dev-only (do NOT need to be on the server):**
- `og.html` — generator for `og-image.png`
- `favicon-src.html` — generator for the favicons (the "B" mark)
- `1.jpg`, `2.jpg` (photo originals), `logo.png` (old sign photo), `menu1.jpg` (menu source)

## Editing business facts / ratings / awards / press
**Everything lives in `biz()` in `includes/config.php`** — address, phone, geo,
Instagram/Facebook, `ratings` (Google 4.5/476, Tripadvisor 5), `awards` (Best
Suburban Bar 2023, Best Bar West 2015 — Best of Miami®/New Times), and `press`
(Miami New Times, The Infatuation, Miami Laker, Spirited Miami · Edible South
Florida). Change it once there and it updates the visible cards, the meta tags,
AND the JSON-LD structured data. Bump `ASSET_VER` to bust CSS/JS/OG caches.

## SEO & the OG gotcha — now SOLVED by PHP
- `BASE_URL` is **auto-detected from the request** (scheme + host + dir). Because PHP
  runs server-side, `og:image`, `og:url`, and `canonical` are emitted as ABSOLUTE
  URLs that link-preview bots (which don't run JS) can fetch — on **any** domain,
  preview or prod, **with no find/replace.** If a proxy mangles Host, hard-set it:
  `define('BASE_URL', 'https://www.thebendmiami.com');` near the top of config.php.
- Structured data: `BarOrPub` with address, geo, `aggregateRating`, `award[]`,
  `sameAs`, hours note; plus `WebSite`, and `BreadcrumbList` on the press page.
- The ONE manual prod edit: the `Sitemap:` line in `robots.txt` (robots is only read
  at a domain root, so it only matters once The Bend has its own root domain).
- After deploy: confirm the image loads directly (`/og-image.png`), then re-scrape via
  the Facebook Sharing Debugger (https://developers.facebook.com/tools/debug/).
  iMessage caches per URL — test with a throwaway query like `?2`.

## Design system (CSS variables in styles.css `:root`)
- Background: `--ink #160c06`, `--ink-2 #20120a`, `--ink-3 #2c1a0e` (candlelit dark)
- Warm: `--orange #f0531c`, `--orange-hot #ff5e1a`, `--amber #ffa733`, `--peach #ffc99b`, `--cream #fff3e2`
- Accent: `--teal #1bd6c7` (the COLD BEER neon). Wood: `--wood #7a3d16`.
- Spacing: `--gutter` (clamped), `--maxw 1240px`, easing `--ease`.
- Texture: film grain + warm vignette via `body::before/::after`.

## Key custom behaviors (script.js) — read before touching
- **Body class:** home = `<body class="home">`, sub-pages = `class="sub"`. The intro
  and logo-fly only run on home. On sub-pages the nav logo is always visible
  (`body.sub .nav__brand{opacity:1}`).
- **Intro gating:** hero entrance animations are suppressed until `<body>` gets
  `.loaded` (added when the intro finishes / is skipped, or immediately if there's
  no `#intro`). If you add a hero element with a load animation, add it to the
  `body:not(.loaded) .hero …` suppression list in styles.css.
- **Logo fly-to-nav (home only):** at the top the nav logo is hidden. On scroll a
  fixed clone `#logoFlyer` interpolates position+size from the hero logo's rect to
  the nav logo's rect (rAF, `dist = innerHeight*0.55`); at the end the flyer hides
  and the real nav logo shows (`.nav.brand-on`). Respects `prefers-reduced-motion`.
- **Scroll reveal:** `.reveal` (+ `.d1`–`.d4` delays) fade up via IntersectionObserver.
- **Find Us map:** keyless Google Maps `<iframe>` (`?output=embed`, lazy-loaded),
  framed retro with a sepia/warm filter that clears to full color on hover; the
  amber "You'll find us here" tag sits top-right to avoid Google's own labels.
- All motion respects `prefers-reduced-motion`.

## Real business data (also encoded in config.php — keep both in sync if hardcoding)
- **Address:** 6844 NW 169th St, Hialeah, FL 33015  ·  **Phone:** (786) 542-1948
- **Hours:** open 7 nights, last call **3:00 AM every day**; Fri & Sat = live DJs &
  karaoke. Exact opening time NOT confirmed (card says "call ahead"). Hours are
  intentionally left out of JSON-LD to avoid publishing a wrong open time.
- **Est. 2014.** Cocktails only, **no food**. 21+. 18% service charge over $25.
- **Instagram:** instagram.com/thebendmiami  ·  **Facebook:** facebook.com/thebendmiami
- Featured pours: **The Big Bender** $10, **Pusser's Painkiller** $12. Full list is in
  the Drinks section, transcribed from `menu1.jpg`.
- **Dev credit (footer):** Aberrant | Web Experts → https://www.goaberrant.com/

## Deployment
- **Preview URL:** https://www.goaberrant.com/thebendmiami/ (site lives in a subfolder).
  **Prod URL:** different — not set yet (BASE_URL auto-detect handles the swap).
- Server must run **PHP** (uses 8.x features; fine on 7.4+). Upload everything EXCEPT
  the dev-only files listed above. Remember to upload NEW files (a past bug:
  `og-image.png`/favicons existed locally but were never uploaded → 404).
- No build step. `.htaccess` sets DirectoryIndex to `index.php`.

## Regenerating image assets (needs Playwright Chromium; renders HTML → PNG)
The OG image and favicons are produced by screenshotting generator HTML.
```bash
# OG image (1200x630) from og.html
node -e "import('playwright-core').then(async({chromium})=>{
  const b=await chromium.launch({args:['--no-sandbox']});
  const p=await b.newPage({viewport:{width:1200,height:630}});
  await p.goto('file://'+process.cwd()+'/og.html'); await p.waitForTimeout(1400);
  await (await p.$('#og')).screenshot({path:'og-image.png'}); await b.close();
})"
# Favicons from favicon-src.html — render at 512 / 180(?sq=1) / 32 / 16, then build
# favicon.ico = PNG-embedded ICO from favicon-32x32.png (6-byte header + 16-byte dir + PNG bytes).
```

## Testing / screenshots
Serve with `php -S 127.0.0.1:8080`. To bypass the ~3.6s intro in a test:
`document.getElementById('intro')?.remove(); document.body.classList.add('loaded');
document.querySelectorAll('.reveal').forEach(e=>e.classList.add('in'));`
Always check **mobile (390×844)** too. Responsive tweaks live in the
`@media (max-width:880px)` and `(max-width:720px)` blocks (collage stacks, nav → hamburger).
Lint PHP after edits: `php -l index.php` etc. Validate JSON-LD at
https://search.google.com/test/rich-results.

## Open TODOs / things owner may still provide
- Real prod domain → update the `Sitemap:` line in robots.txt (URLs auto-resolve otherwise).
- Exact daily opening time (only the 3 AM close is confirmed) → then add
  `openingHoursSpecification` to the JSON-LD in config.php.
- Refine the approximate geo coordinates in `biz()` from the Google Business listing.
- Optional, floated but not built: DJ/karaoke weekly schedule block.
