# Rashed — Swiss Architectural WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-6.0%2B-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.4-38bdf8.svg)](https://tailwindcss.com)
[![KaTeX](https://img.shields.io/badge/KaTeX-0.16.21-00d084.svg)](https://katex.org)
[![License](https://img.shields.io/badge/License-GPLv2%2B-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

A precision Swiss architectural editorial portfolio and blog WordPress theme crafted for **Rashed Hossain** ([rashed.im](https://rashed.im)).

## Highlights

- **Core Web Vitals & Speed**: Engineered for 100/100 Google PageSpeed scores across Desktop and Mobile with sub-0.5s FCP/LCP, zero TBT, and CLS < 0.02.
- **Responsive WebP Assets**: High-DPI display density support with optimized 400w and 800w WebP image pipelines.
- **KaTeX Mathematical Typography**: Native LaTeX rendering for complex technical formulas, matrices, and expressions (`$...$`, `$$...$$`, `\[...\]`, `\(...\)`).
- **Interactive Shader & Ambient Effects**: WebGL fluid shader canvas animations with live Dhaka (UTC+6) telemetry.
- **Full Theme Mode Switching**: Seamless, persistent dark/light mode toggle with smooth color-transition tokens conforming to WCAG AA color contrast guidelines.
- **Editorial Contribution Showcase**: Dedicated architecture for verified WordPress Core releases, open-source badges, and technical writing.

## Technology Stack

- **Template Engine**: PHP 8.0+ / WordPress Template Hierarchy
- **Styling**: Tailwind CSS v3.4 + Custom CSS Design Tokens
- **Icons**: Material Symbols Outlined (scoped variable axes)
- **Math Typesetting**: KaTeX 0.16.21 auto-render engine
- **Interactivity**: Vanilla JavaScript (deferred & minified via Terser)

## Structure

```text
rashed/
├── assets/
│   ├── css/
│   │   ├── input.css          # Tailwind source
│   │   └── tailwind.min.css   # Compiled production CSS
│   ├── images/                # Theme graphics & responsive WebP avatars
│   └── js/
│       ├── theme.js           # Interactive UI controller
│       ├── theme.min.js       # Production minified bundle
│       └── shader.js          # WebGL ambient shader
├── template-parts/            # Modular template components
├── comments.php               # Architectural comment layout
├── footer.php                 # Global footer
├── front-page.php             # Homepage & editorial hero
├── functions.php              # Customizer, hooks & asset enqueuing
├── header.php                 # Masthead & quick-jump navigation
├── home.php                   # Article archive & category toolbar
├── page-about.php             # Detailed bio & career timeline
├── page-contact.php           # Inquiries dispatch system
├── page-contributions.php     # Open-source ledger
├── single.php                 # Single article reading experience
└── style.css                  # Theme metadata & core CSS variables
```

## License

GPL v2 or later. See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html).
