# Apple Museum WordPress Theme — Final Requirements

## 1. Project Overview
- Classic PHP theme (not a block theme), readable/editable code, commented throughout.
- `theme.json` scoped to editor settings only (color palette, spacing, typography) — not full site editing.
- Audience: general visitors, donors, business partners/sponsors.
- Aesthetic: immersive, whitespace-heavy, modern, warm.

## 2. Design Tokens

**Colors**
| Token | Value | Use |
|---|---|---|
| `--color-bg` | `#ffffff` | Primary background |
| `--color-text` | `#0a0a0a` | Body text, buttons, links |
| `--color-bg-secondary` | `#f4f4f4` | Section backgrounds, cards |
| `--color-bg-hover` | `#1a1a1a` (proposed) | Button/link hover |
| `--color-success` | `#1e7f4f` (proposed) | Form success states |
| `--color-error` | `#c0392b` (proposed) | Form validation errors |

**Spacing scale (px):** 4, 8, 16, 24, 32, 48, 64, 96, 128

**Typography (Inter, headings + body)**
| Level | Size | Line-height |
|---|---|---|
| h1 | 56px | 1.1 |
| h2 | 40px | 1.15 |
| h3 | 28px | 1.2 |
| h4 | 22px | 1.3 |
| body | 18px | 1.6 |
| small | 14px | 1.5 |

*(Adjust any of the above — these are proposals to fill gaps in the original brief.)*

## 3. Content Structure

**Custom Post Types**
- `museum_wishlist` — items the museum is looking for. Taxonomy: `wishlist_category` (e.g. Hardware, Software, Peripherals, Memorabilia). Fields (SCF): item name, description, priority, image.
- `museum_story` — the museum's story, told through many entries (hardware components, milestones, people, company history). One reusable single template, filled dynamically per entry. Taxonomy: `story_category` (e.g. Hardware, Milestone, People). Fields (SCF): title, year/date, description, image, optional related-links. `page-about.php` pulls these into a timeline/grid; each entry also gets its own `single-museum_story.php` page.

No partner/sponsor CPT needed — nothing about individual partners is shown publicly, so their sign-up details just live as Forminator form entries for internal follow-up.

**Native Posts** — used for News/Articles, with a category taxonomy (e.g. Restorations, Events, Press). No separate CPT needed.

**WooCommerce Products** — used for tickets only (via FooEvents, see below).

**Money donations** — handled by Mollie Forms (not WooCommerce), open to all visitors on the general Donate page. Public total/goal display via its built-in shortcode.

**Hardware donations** — not a checkout flow. A Forminator form (item name, description, photo upload) on the same Donate page, open to all visitors, reviewed manually by the museum.

**Partner/sponsor sign-up** — a separate Forminator form on its own Partners page (business inquiries, not donations). No payment, no public display — submissions are internal-only entries for follow-up.

## 4. Base Templates
- `front-page.php`
- `page.php` (generic)
- `page-donate.php` (public donation total display + money donation form + hardware donation form — open to all visitors)
- `page-wishlist.php` (archive of `museum_wishlist`)
- `single-museum_wishlist.php`
- `page-about.php` (museum story — dynamic archive/timeline of `museum_story` items)
- `single-museum_story.php` (one reusable layout for every story/component entry)
- `page-partners.php` (business partner/sponsor sign-up form only — no donations, no public display)
- `index.php` / `archive.php` (news listing)
- `single.php` (single news article)
- `search.php`
- `404.php`
- `woocommerce.php` + `/woocommerce/` template overrides (cart, checkout, single-product) for tickets and donations

## 5. Template Parts
- `template-parts/header/site-header.php`
- `template-parts/footer/site-footer.php`
- `template-parts/navigation.php`
- `template-parts/hero.php`
- `template-parts/cta-banner.php` (tickets/donate call-to-action)
- `template-parts/card-grid.php` (reusable — news + wishlist)
- `template-parts/content-news.php`
- `template-parts/content-wishlist.php`
- `template-parts/content-story.php` (reusable story/component card and single layout pieces)
- `template-parts/donation-total.php` (Mollie Forms total/goal shortcode wrapper + a custom "recent donations" feed — see note below)

## 6. Custom Fields (Secure Custom Fields)
Field groups will be generated as **SCF Local JSON** (synced to `/acf-json/`). This is what makes the later switch to ACF frictionless — ACF reads the same JSON schema natively, no rebuilding fields. Groups needed:
- Wishlist item fields
- Story item fields (title, year/date, description, image, related links)
- News article extra fields (if any beyond title/content/featured image)

## 7. Plugins
| Plugin | Purpose | Cost |
|---|---|---|
| Secure Custom Fields | Already installed — custom fields, Local JSON sync | Free |
| WooCommerce | Ticket sales engine | Free |
| Mollie Payments for WooCommerce | iDEAL/Mollie gateway for ticket checkout | Free |
| FooEvents for WooCommerce | Dated/timed ticket generation, QR tickets, check-in | Free |
| Mollie Forms | Money donations — iDEAL, public running total/goal display | Free |
| Forminator | Hardware donation form (file upload) + partner sign-up form | Free |
| Polylang | Dutch + English | Free |
| Yoast SEO | SEO, sitemap, multilingual hreflang (pairs well with Polylang) | Free tier |
| Complianz | GDPR/cookie consent (EU requirement) | Free tier |

Everything above is on a free tier — matches "test version for now." Note for later: Forminator's free payment fields only support Stripe/PayPal (no Mollie), so it's used for non-payment forms only; Mollie Forms handles anything involving money.

**Important note on the "recent donations" list:** Mollie Forms only ships shortcodes for a running total and a goal countdown — a public list of recent donor names isn't a built-in feature. It needs a small custom query against the donation records the plugin stores in the database, built once the plugin is installed and its data structure can be inspected directly (covered in the prompt sequence below). Also worth deciding: should donors get an opt-in checkbox for "show my name publicly," so nobody's name appears without consent? Flag if you'd rather default to first-name-only or fully anonymous instead.

## Open assumptions to confirm
1. Donate page is public, open to everyone (money via Mollie Forms + hardware via Forminator). Partners page is separate, for business/sponsor sign-up only — no payment there.
2. No partner CPT — sign-up submissions are just form entries for internal follow-up.
3. `museum_story` entries don't need individual approval/publish workflow beyond normal WP drafts — say so if this needs a review step.
