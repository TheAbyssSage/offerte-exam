# Offerte Generator

Generate a polished, print-ready PDF offerte (business proposal) from an HTML template using [Dompdf](https://github.com/dompdf/dompdf).

## What it does

- Reads `offerte.html` — a styled HTML document containing the proposal content
- Renders it to a multi-page A4 PDF via Dompdf
- Outputs `offerte-ritmebox-2026.pdf` in the project root

The included example is a real-world project proposal for **RitmeBox**, a dance school website and registration platform.

## Requirements

- PHP 8.0+
- [Composer](https://getcomposer.org/)

## Setup

```bash
composer install
```

## Usage

```bash
php generate.php
```

Output:

```
✅ PDF generated successfully!
📄 Output: /path/to/offerte-ritmebox-2026.pdf
📏 Pages: 5
```

## Project structure

```
├── composer.json          # Dependencies (dompdf/dompdf ^3.1)
├── generate.php           # Main script — loads HTML, renders PDF
├── offerte.html           # HTML template with inline CSS
├── offerte-ritmebox-2026.pdf  # Generated PDF (after running generate.php)
├── vendor/                # Composer dependencies
│   ├── dompdf/dompdf/     # PDF rendering engine
│   ├── masterminds/html5/ # HTML5 parser (dompdf dependency)
│   ├── sabberworm/php-css-parser/  # CSS parser (dompdf dependency)
│   └── thecodingmachine/safe/      # Safe PHP functions
└── README.md
```

## Customizing

To create your own offerte:

1. Edit `offerte.html` with your content — the CSS classes (`.cover`, `.phase-card`, `.info-box`, `.price-hero`, etc.) are ready to reuse
2. Update the output filename in `generate.php` (line 24)
3. Run `php generate.php`

### Styling tips

- The `@page` directive controls margins and footer content
- Use `page-break-before: always` (class `.page-break`) to force new pages
- Use `page-break-inside: avoid` (on `.phase-card`) to keep cards together
- Dompdf supports CSS 2.1 and some CSS 3 — flexbox and grid are **not** supported; use tables for layout

## License

This project template is free to use. Dompdf is licensed under [LGPL v2.1](https://github.com/dompdf/dompdf/blob/master/LICENSE.LGPL).
