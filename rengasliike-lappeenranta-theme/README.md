# Rengasliike Lappeenranta WordPress Theme

A modern, responsive WordPress theme designed specifically for tire shops and automotive service businesses. This theme is based on the original Best Drive website design and converted to work seamlessly with WordPress.

## Features

### 🎨 Design & Layout

- Modern, responsive design optimized for all devices
- Clean, professional appearance suitable for automotive businesses
- Goodyear-inspired color scheme with customizable branding
- Hero sections with dynamic content
- Card-based layouts for services and products

### 📝 Content Management

- **Custom Post Types**: Services, Brands, Testimonials
- **Custom Meta Boxes**: Service details, brand URLs, testimonial ratings
- **Customizer Integration**: Contact information, appointment URLs
- **Widget Areas**: Footer widget support
- **Translation Ready**: Full internationalization support

### 🔧 Functionality

- Mobile-responsive navigation
- Search functionality
- Contact form integration
- Appointment booking system
- Social media integration
- SEO optimized structure

## Installation

1. **Upload the theme** to your WordPress themes directory (`/wp-content/themes/`)
2. **Activate the theme** through WordPress Admin → Appearance → Themes
3. **Configure settings** in WordPress Admin → Appearance → Customize

## Required Pages

Create these pages for full functionality:

- **Home** (set as front page)
- **Services** (`/palvelut/`)
- **About Us** (`/tietoa-meista/`)
- **Contact** (`/yhteystiedot/`)

## Custom Post Types

### Services

- **Icon**: Emoji or text icon for the service
- **Price**: Service pricing information
- **Features**: List of service features (one per line)
- **Content**: Detailed service description

### Brands

- **Logo**: Brand logo image
- **Website URL**: Link to brand's website
- **Description**: Brand information

### Testimonials

- **Author**: Customer name
- **Source**: Review platform (Google, Facebook, etc.)
- **Rating**: 1-5 star rating
- **Content**: Customer testimonial

## Customizer Settings

Access via **Appearance → Customize**:

### Contact Information

- Phone number
- Email address
- Business address
- Appointment booking URL

## Template Files

- `front-page.php` - Homepage template
- `page.php` - Static pages
- `single-services.php` - Individual service pages
- `archive-services.php` - Services listing
- `index.php` - Blog posts
- `single.php` - Individual blog posts
- `search.php` - Search results
- `404.php` - Error page
- `comments.php` - Comments template

## Customization

### Colors

The theme uses CSS custom properties for easy color customization:

```css
:root {
  --color-brand-primary: rgb(0 78 168);
  --color-brand-secondary: rgb(254 219 0);
  --color-text-primary: #1a1a1a;
  --color-background: #ffffff;
}
```

### Typography

- Primary font: Outfit (Google Fonts)
- Secondary font: Inter (Google Fonts)
- Font weights: 300, 400, 500, 600, 700, 800

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Support

For support and customization requests, please contact the development team.

## License

This theme is proprietary software developed for Rengasliike Lappeenranta.

## Changelog

### Version 1.0.0

- Initial release
- Custom post types for services, brands, testimonials
- Responsive design
- WordPress integration
- Customizer settings
