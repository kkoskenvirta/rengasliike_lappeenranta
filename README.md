# Rengasliike Lappeenranta Website

A modern, responsive website for Rengasliike Lappeenranta tire shop with dual theme support.

## Features

- **Dual Theme Support**: Toggle between default red theme and Goodyear blue theme
- **Responsive Design**: Works on all devices
- **Multi-language Support**: Finnish and English
- **Modern UI**: Clean, professional design with smooth animations
- **Contact Integration**: Direct email and phone integration

## Theme Toggle

The website includes a theme toggle button that allows users to switch between:

1. **Default Theme**: Red color scheme (original design)
2. **Goodyear Theme**: Blue color scheme using Goodyear brand colors

### Goodyear Theme Colors

- Primary Blue: `rgb(0 78 168)`
- Primary Dark: `rgb(14 43 108)`
- Primary Light: `rgb(38 99 161)`
- Primary Extra Light: `rgb(230 237 244)`
- Secondary Yellow: `rgb(254 219 0)`
- Secondary Light: `rgb(230 199 0)`

### How to Use Theme Toggle

1. Look for the theme toggle button in the top-right corner of the page
2. Click to switch between "Default Theme" and "Goodyear Theme"
3. Your preference is saved in localStorage and will persist across sessions

## File Structure

```
├── public/
│   ├── index.html              # Home page
│   ├── palvelut.html           # Services page
│   ├── tietoa-meista.html      # About page
│   ├── yhteystiedot.html       # Contact page
│   ├── styles.css              # Default theme styles
│   ├── goodyear-theme.css      # Goodyear theme styles
│   ├── script.js               # Main JavaScript (includes theme toggle)
│   ├── localization.js         # Multi-language support
│   └── images/                 # Brand logos and images
├── script.js                   # Root level script (for development)
└── README.md                   # This file
```

## Development

### Running the Server

```bash
npm start
```

The website will be available at `http://localhost:3000`

### Theme Implementation

The theme toggle functionality is implemented in `script.js`:

- Uses CSS variables for consistent theming
- Dynamically loads/unloads theme stylesheets
- Persists user preference in localStorage
- Works across all pages

### Adding New Themes

To add a new theme:

1. Create a new CSS file (e.g., `new-theme.css`)
2. Define CSS variables for the theme colors
3. Update the theme toggle logic in `script.js`
4. Add the new theme option to the toggle button

## Technologies Used

- HTML5
- CSS3 (with CSS Variables)
- Vanilla JavaScript
- Responsive Design
- Local Storage for theme persistence

## Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge

## License

This project is proprietary to Rengasliike Lappeenranta.
