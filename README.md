# 🚧 Project Custom Post Type

A fully functional **Project Custom Post Type** for WordPress with advanced filtering, dynamic fields, and custom templates. Built with **FacetWP**, **ACF**, and theme compatibility (e.g., OceanWP).

---

## 📌 Description

This plugin registers a custom post type called `cll_project`, integrates **ACF** fields for detailed project information, and uses **FacetWP** for advanced AJAX filtering. It includes a front-end shortcode for listing and filtering projects, and a custom single project template with gallery, meta info, and custom layout blocks.

---

## ⚙️ Features

- Registers `cll_project` Custom Post Type
- Supports ACF fields:
  - Project Date
  - Location
  - Services (taxonomy)
  - Equipment (taxonomy)
  - Gallery images (repeater)
  - Meta info (repeater for custom labels and values)
- FacetWP filter integration:
  - Filter by Date, Services, Equipment
- Shortcode `[cll_project item="N"]` for filtered project listings
- Custom single project layout with:
  - Breadcrumbs
  - Title and content section
  - Meta list (date, services, etc.)
  - Image gallery
  - Enquire button and contact CTA
- OceanWP-compatible styling
- Pagination using FacetWP or WordPress pagination

---

## 🧱 Template Structure

### Shortcode Template (`[cll_project item="N"]`)
- Outputs a grid of projects with:
  - Featured image or fallback
  - Title and trimmed content
  - Meta info using ACF fields
  - Optional hover effects or category tags
- Works with or without FacetWP filters

### Single Project Template
- Structured layout using theme wrappers
- Left and right content columns
- Top section:
  - Title, subtitle, project date
  - Gallery section
- Right sidebar:
  - Project meta list (location, services, equipment)
  - Custom repeater data
  - Enquire Now button
- Optional SVG decorations or scroll animations

---

## 🔧 Requirements

- WordPress 5.8 or higher
- [Advanced Custom Fields (ACF)](https://wordpress.org/plugins/advanced-custom-fields/)
- [FacetWP](https://facetwp.com/)
- OceanWP or compatible theme

---

## 🚀 Installation & Usage

1. **Install required plugins**:
   - ACF
   - FacetWP

2. **Add ACF Field Group**:
   - Assign to post type `cll_project`
   - Add required fields: Gallery, Date, Meta Info, etc.

3. **Create Facets in FacetWP**:
   - Use relevant ACF fields or taxonomy for filters

4. **Insert Shortcode on Page**:
   ```php
   [cll_project item="9"]
