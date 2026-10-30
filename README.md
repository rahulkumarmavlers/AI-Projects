# Mepchem theme

Custom theme for MEPCHEM, built from the Figma file "Meptech Changes" → Final Design page.

## Requirements
- WordPress 6.5+, PHP 8.1+
- **Secure Custom Fields** (or ACF PRO): Flexible Content, Repeater, Options Page
- **Contact Form 7**

## Content model
- **Pages** are built with the `page_builder` Flexible Content field (Custom Fields → Field Groups → *Page Builder*).
  Each layout renders `template-parts/flex-layouts/{layout}.php`:
  `hero_slider`, `page_banner`, `products_grid`, `about_split`, `value_proposition`, `recent_shipments`,
  `contact_cta`, `rich_text`, `icon_carousel`, `enquiry_form`, `contact_details`, `accordion`, `technical_sheet`.
- **Products** (`mep_product`, `/product/{slug}/`) with **Product categories** (`mep_product_cat`, `/product-category/{slug}/`).
  Product data lives in the *Product Details* field group (prices per currency, package types, incoterms, gallery,
  technical text, analysis table, documents).
- **Theme Settings** (admin menu) hold contact details, header/footer, socials and defaults.
- Field groups are stored in `/acf-json` and synced to the database; edits in the admin write back to `/acf-json`.

## Quote flow
"Request To Quote" on a product sends a GET request to the Contact page's enquiry form (`#enquiry`). CF7 hidden fields
(`default:get`) carry the product, package, quantity and incoterm into the enquiry email.

## Front-end assets
- `assets/css/critical.css` is inlined in `<head>`; `assets/css/main.css` loads without blocking render; `assets/js/main.js` is deferred.
- After editing CSS/JS, rebuild the minified files (served unless `SCRIPT_DEBUG` is on):
  `php bin/build-assets.php`
- Fonts (Poppins, Inter) are self-hosted in `assets/fonts`.

## Coding standards
`phpcs --standard=phpcs.xml.dist` (WordPress Coding Standards 3.x).
