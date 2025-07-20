# Installation Guide - Rengasliike Lappeenranta WordPress Theme

## Quick Start

1. **Upload the theme** to `/wp-content/themes/rengasliike-lappeenranta/`
2. **Activate** via WordPress Admin → Appearance → Themes
3. **Configure** via Appearance → Customize

## Detailed Setup

### 1. Theme Installation

```bash
# Upload the entire theme folder to:
/wp-content/themes/rengasliike-lappeenranta/
```

### 2. Required Pages Setup

Create these pages in WordPress Admin:

- **Home** (set as front page in Settings → Reading)
- **Services** (`/palvelut/`)
- **About Us** (`/tietoa-meista/`)
- **Contact** (`/yhteystiedot/`) - Use "Contact Page" template

### 3. Customizer Configuration

Go to **Appearance → Customize** and set:

#### Contact Information

- Phone: `044 032 3388`
- Email: `myynti@acrengas.com`
- Address: `Lappeenranta, Finland`
- Appointment URL: `https://kcenterprise.compilator.com/public/cms?Id=1&CompanyId=1ad3de4c-f732-4e45-b9ec-9145822c9db3&branchId=1`

### 4. Custom Post Types Setup

#### Services

1. Go to **Services** in admin menu
2. Add services with:
   - Title (e.g., "Renkaanvaihto")
   - Content (detailed description)
   - Icon (emoji like 🔧)
   - Price (e.g., "Alkaen 15€/kpl")
   - Features (one per line)

#### Brands

1. Go to **Brands** in admin menu
2. Add brand logos and URLs
3. Upload brand images

#### Testimonials

1. Go to **Testimonials** in admin menu
2. Add customer reviews with ratings

### 5. Menu Setup

1. Go to **Appearance → Menus**
2. Create "Primary Menu" with:
   - Home
   - Services
   - About Us
   - Contact

### 6. Widget Setup (Optional)

1. Go to **Appearance → Widgets**
2. Add widgets to "Footer Widget Area"

## Theme Features

### ✅ What's Included

- Responsive design
- Custom post types (Services, Brands, Testimonials)
- Custom meta boxes
- WordPress Customizer integration
- SEO optimized
- Translation ready
- Contact form integration
- Appointment booking system

### 🎨 Customization Options

- Colors via CSS custom properties
- Typography (Outfit & Inter fonts)
- Hero images
- Service icons and pricing
- Brand logos and links
- Testimonial ratings

### 📱 Mobile Responsive

- Mobile-first design
- Touch-friendly navigation
- Optimized for all screen sizes

## Troubleshooting

### Common Issues

1. **Styles not loading**

   - Check file permissions
   - Verify CSS file exists in `/assets/css/`

2. **Images not showing**

   - Upload brand images to Media Library
   - Check image paths in theme

3. **Custom post types not appearing**

   - Flush permalinks (Settings → Permalinks → Save)

4. **Contact form not working**
   - Configure email settings in WordPress
   - Check server mail configuration

## Support

For technical support, check:

1. WordPress error logs
2. Browser console for JavaScript errors
3. Theme documentation in README.md

## Next Steps

1. **Content**: Add your services, brands, and testimonials
2. **Images**: Upload hero images and brand logos
3. **SEO**: Configure meta descriptions and titles
4. **Analytics**: Add Google Analytics tracking
5. **Backup**: Set up regular backups

## Performance Tips

1. Optimize images before upload
2. Use caching plugins
3. Enable GZIP compression
4. Minify CSS/JS files
5. Use CDN for static assets
