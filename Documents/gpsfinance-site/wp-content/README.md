Create a file called README.md in the same root folder.

# GPS Finance – WordPress Theme & Site Code

This repository contains all **custom code** for the GPS Finance website.

WordPress core files and the database are **intentionally excluded**.
The site is deployed to Hostinger via FTP.

---

## 📁 Repository Structure



wp-content/
themes/
gpsfinance-premium/
assets/
legacy/
theme.css # Original legacy site CSS
theme.js # Original legacy site JS
overrides.css # Safe CSS overrides
front-page.php # Home page template
page-*.php # Page templates (About, Services, etc.)
header.php
footer.php
functions.php
mu-plugins/
gpsfinance-site-tweaks.php


---

## 🧠 Architecture Overview

- WordPress is used as:
  - CMS
  - Router
  - Admin interface

- The **legacy custom PHP site** has been converted into:
  - WordPress page templates (`page-*.php`)
  - With original CSS/JS loaded globally

- Page content is **template-driven**, not Gutenberg-driven.
  This preserves layout fidelity and simplifies maintenance.

---

## 🚀 Deployment Workflow

1. Make changes locally
2. Commit to Git
3. Push to GitHub
4. Upload changed files via FTP (FileZilla) to:


/public_html/wp-content/


WordPress core updates are handled **inside Hostinger**, not via Git.

---

## 🛡️ Governance Rules

✔ Track in Git:
- Theme files
- CSS / JS
- Page templates
- MU plugins
- Documentation

✘ Do NOT track:
- `wp-config.php`
- WordPress core
- Database exports
- Uploads folder

---

## 🔧 Local Development Notes

- PHP 8.0+ required (tested on PHP 8.3)
- No WP-CLI required
- Compatible with shared hosting environments

---

## 🧩 Extending the Site

Future enhancements should follow these rules:
- CSS overrides go in `assets/legacy/overrides.css`
- Do not edit legacy CSS directly unless necessary
- New layouts should use new templates, not inline hacks
- Keep WordPress logic inside `functions.php` or MU plugins

---

## 📌 Handoff Notes for Developers

This is a **template-driven WordPress site**.

Before refactoring:
- Understand legacy CSS dependencies
- Avoid moving markup without checking layout impact
- Prefer incremental conversion to blocks or ACF fields

---

## 📄 License

Private repository – all rights reserved.
