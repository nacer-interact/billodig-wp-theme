# Billodig WordPress Theme

Standalone WordPress theme for **billodig.com**, built to match the client's source design mockup (`国际网页→BILLODIG（可视图）.pdf`, pages 3–10: BILLODIG homepage, nav, product lines, product detail, contact, news) as closely as possible:

- Navy (`#0b3c8c`) / red (`#d71a1a`) BILLODIG brand mark, matching the real logo asset
- Black full-width "BILLODIG挖掘机"-style section banners on Products & Services / product-line / product-detail pages
- Photo hero banner (equipment lineup on snow/mountains) reused across Home / Contact Us / News & Events, same as the mockup's shared slide header
- Navy card footer bands + black "Learn more / 了解更多详情 →" buttons on product cards
- Spec table layout on the product detail page (category / label / value columns, merged category cells, alternating shading) matching the mockup's engine/pump/valve/speed/tank spec sheet
- Bilingual throughout: English primary, Chinese secondary (`.en` / `.zh` spans), per the site's actual audience (Ethiopia/Africa) while staying visually faithful to the Chinese-language mockup

This replaces the Billodig-facing templates that used to live inside the shared `billodig-mt` Multisite theme. Medhin Teklay / `sun-shaft.com` keeps using `billodig-mt` untouched; this theme is for the Billodig site only.

## Requirements

- WordPress (standalone site, not Multisite-dependent — works fine installed on a Multisite network too)
- **Secure Custom Fields** plugin (free ACF fork) — used for the repeater-based product spec fields and per-product videos. Install & activate before switching to this theme, or the spec tables/video fields will be empty.

## What this theme registers

- `product` custom post type (slug `excavators`) + `product_line` taxonomy (slug `product-line`) — same schema as the previous `billodig-mt` theme, so existing product content (the 6 real excavator models) keeps working unchanged after switching themes.
- One Secure Custom Fields group, **Product Specifications**, on `product` — the fixed spec fields, the two spec-table repeaters, and a `product_videos` repeater (video URL + optional thumbnail + Chinese caption) for that model's own work/operation videos, shown on its product detail page. There is no separate site-wide Videos section — videos live with the product they show, not as their own nav item.

If migrating from `billodig-mt`, the existing `product_line` terms should already exist with slugs `gasoline`, `diesel`, `gas`, `cable`, `battery` — these slugs are hardcoded in `functions.php` (`billodig_line_zh()`) and in the Products & Services page template's card links. If recreating terms from scratch, use those exact slugs.

## Pages to create in wp-admin

Create these pages and assign the matching **Page Attributes → Template**:

| Page slug | Template |
|---|---|
| (set as static front page) | *(front-page.php runs automatically)* |
| `about-us` | Billodig — About Us |
| `products-services` | Billodig — Products & Services |
| `contact-us` | Billodig — Contact Us |
| `news-events` | Billodig — News & Events |

Set **Settings → Reading → Your homepage displays → A static page**, and pick any page as the front page (the theme's `front-page.php` template is used automatically regardless of content, since the design is fully coded).

News & Events pulls from standard WordPress posts (`post` type) — just publish blog posts as usual and they'll appear there, tagged "Company News / 公司新闻" as in the mockup.

## Assets

`assets/` contains the real Billodig brand and product assets carried over from the prior design work: `billodig-logo.png` (source logo), `billodig-logo-white.png` (a generated reversed/white variant for the dark footer — background removed and navy strokes recolored to white, red triangle kept as-is), the hero and worksite photography, and the six product photos (`10lc`, `60ec`, `150ec`, `ec260lc`, `ec360`, `ec450lc`).

## Installation on the live site

1. Ensure Secure Custom Fields is active.
2. Upload/activate this theme (`billodig` — zip this folder, or deploy via SFTP/WP-CLI to `wp-content/themes/billodig/`).
3. Create the pages listed above with their templates, and set the static front page.
4. Verify the six existing excavator products still render correctly (archive, product-line, single) — the CPT/taxonomy/field schema is unchanged from `billodig-mt`, so no data migration should be needed.
5. Spot-check the Products & Services dropdown anchors (`#fuel`, `#electric`, `#parts`) and the Contact Us form (it emails the site admin on submit, same as before).
