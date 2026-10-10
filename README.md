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

## Editing the site from wp-admin

Nothing below changes how the site looks until someone edits a value. Every option defaults to the text, image or link that used to be hardcoded.

| What | Where in wp-admin |
|---|---|
| Logo | Appearance > Customize > Site Identity (falls back to the bundled white logo) |
| Site Icon (favicon) | Appearance > Customize > Site Identity |
| Site title, tagline | Appearance > Customize > Site Identity |
| Header menu | Appearance > Menus, assign to **Primary menu (header)** |
| Footer "Quick Links" | Appearance > Menus, assign to **Footer quick links** |
| Static front page | Appearance > Customize > Homepage Settings |
| Homepage hero, product tiles, patents banner | Customize > Billodig Theme Options > Homepage: ... |
| Inner-page banner text and images | Customize > Billodig Theme Options > Page banners |
| Phone, WhatsApp, emails, offices | Customize > Billodig Theme Options > Contact details |
| Footer text, copyright, social links | Customize > Billodig Theme Options > Footer / Social links |
| Accent colours | Customize > Billodig Theme Options > Colours |

**Menus.** Until a menu is assigned to a location, the theme shows its built-in default menu (Home, About Us, Products & Services with its dropdown, News & Events, Contact Us). Once you assign one, yours replaces it. Bilingual labels: the menu item's **Navigation Label** is the English text and its **Description** is the Chinese text (turn on "Description" under Screen Options at the top of Appearance > Menus if you do not see the box). Items nested one level deep become the dropdown. Products & Services stays highlighted on all product pages, and News & Events on single news posts.

**Contact form.** Enquiries go to "Send enquiries to" (Contact details); if empty, to the site admin email in Settings > General.

**Fixed interface text.** Labels that are not Customizer options (nav labels, product-page headings, button text, Contact page labels, empty-state messages and so on) live in one file, `inc/strings.php`, as `'key' => array( English, Chinese )`. Templates only reference the key, so changing a label never touches a template. Each entry is wrapped for translation, so it can be changed three ways without editing theme code: a `.po` file (use `languages/billodig.pot` as the template, e.g. with Loco Translate), a plugin or child theme hooking the `billodig_strings` filter, or by editing the entry directly. Example: `add_filter( 'billodig_strings', fn( $s ) => array_replace_recursive( $s, array( 'nav.contact' => array( 'Get in touch' ) ) ) );`

Text that is editable in the Customizer has its default in `inc/defaults.php`, also wrapped for translation. Page and post body text is edited in the normal WordPress editors.

## Code layout

- `functions.php` loads everything in `inc/`: `setup.php` (theme supports, menu locations, assets), `post-types.php`, `fields.php` (Secure Custom Fields), `defaults.php` (default values for the Customizer options), `strings.php` (all fixed interface text, bilingual and translatable), `template-tags.php` (helpers and menu fallbacks), `class-billodig-walker-nav.php` (menu markup), `customizer.php`.
- `languages/billodig.pot` is the translation template (text domain `billodig`).

## Assets

`assets/` contains the real Billodig brand and product assets carried over from the prior design work: `billodig-logo.png` (source logo), `billodig-logo-white.png` (a generated reversed/white variant for the dark footer — background removed and navy strokes recolored to white, red triangle kept as-is), the hero and worksite photography, and the six product photos (`10lc`, `60ec`, `150ec`, `ec260lc`, `ec360`, `ec450lc`).

## Installation on the live site

1. Ensure Secure Custom Fields is active.
2. Upload/activate this theme (`billodig` — zip this folder, or deploy via SFTP/WP-CLI to `wp-content/themes/billodig/`).
3. Create the pages listed above with their templates, and set the static front page.
4. Verify the six existing excavator products still render correctly (archive, product-line, single) — the CPT/taxonomy/field schema is unchanged from `billodig-mt`, so no data migration should be needed.
5. Spot-check the Products & Services dropdown anchors (`#fuel`, `#electric`, `#parts`) and the Contact Us form (it emails the site admin on submit, same as before).
