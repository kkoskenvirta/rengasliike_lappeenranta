# Rengasmarket Lappeenranta

Modern tire company website built with HTML, CSS, JavaScript, and Node.js. Fully responsive and optimized for Finnish market.

## Features

- 🚗 **Modern Design**: Clean, professional design with Finnish aesthetic
- 📱 **Fully Responsive**: Works perfectly on all devices
- 🎨 **Interactive Elements**: Smooth animations and hover effects
- 📄 **Multiple Pages**: Home, Services, About Us, Contact
- 🔧 **Simple Stack**: No complex frameworks, easy to maintain
- 🇫🇮 **Finnish Content**: All content in Finnish language

## Pages

- **Etusivu** (`/`) - Homepage with hero section, features, and call-to-action
- **Palvelut** (`/palvelut`) - Services page with detailed tire services and pricing
- **Tietoa meistä** (`/tietoa-meista`) - About us page with company history and team
- **Yhteystiedot** (`/yhteystiedot`) - Contact page with form and location info

## Tech Stack

- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Backend**: Node.js with Express
- **Styling**: Custom CSS with modern design patterns
- **Fonts**: Inter (Google Fonts)
- **Icons**: Emoji icons for simplicity

## Quick Start

### Prerequisites

- Node.js (version 14 or higher)
- npm (comes with Node.js)

### Installation

1. Clone or download the project
2. Navigate to the project directory:

   ```bash
   cd best-drive-website
   ```

3. Install dependencies:

   ```bash
   npm install
   ```

4. Start the development server:

   ```bash
   npm run dev
   ```

5. Open your browser and visit:
   ```
   http://localhost:3000
   ```

### Production

To run in production mode:

```bash
npm start
```

## Project Structure

```
best-drive-website/
├── public/                 # Static files
│   ├── index.html         # Homepage
│   ├── palvelut.html      # Services page
│   ├── tietoa-meista.html # About us page
│   ├── yhteystiedot.html  # Contact page
│   ├── styles.css         # Main stylesheet
│   └── script.js          # JavaScript functionality
├── server.js              # Express server
├── package.json           # Dependencies and scripts
└── README.md             # This file
```

## Customization

### Content

- Edit HTML files in `public/` directory to change content
- All text is in Finnish and can be easily modified

### Styling

- Main styles are in `public/styles.css`
- Uses CSS Grid and Flexbox for modern layouts
- Color scheme: Blue (#1e40af) and gray tones

### Images

- Currently uses CSS-generated placeholders
- Replace with actual tire/company images as needed

## Features

### Responsive Design

- Mobile-first approach
- Breakpoints at 768px for tablets/mobile
- Hamburger menu for mobile navigation

### Interactive Elements

- Smooth scrolling navigation
- Hover effects on cards and buttons
- Mobile menu toggle
- Form validation (frontend only)

### Performance

- Lightweight (no heavy frameworks)
- Fast loading times
- Optimized CSS and JavaScript

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Development

### Adding New Pages

1. Create new HTML file in `public/` directory
2. Add route in `server.js`
3. Update navigation in all HTML files
4. Add corresponding CSS styles

### Styling Guidelines

- Use CSS Grid for layouts
- Use Flexbox for alignment
- Follow BEM-like naming conventions
- Keep colors consistent with design system

## 🚀 Live Demo

Visit the live demo: [https://yourusername.github.io/best-drive-website](https://yourusername.github.io/best-drive-website)

## Deployment

### Local Development

```bash
npm run dev
```

### Production Build

```bash
npm start
```

### GitHub Pages Deployment

This site is automatically deployed to GitHub Pages via GitHub Actions.

#### Setup Instructions:

1. **Enable GitHub Pages:**

   - Go to your repository settings
   - Navigate to "Pages" section
   - Set source to "GitHub Actions"

2. **Deploy:**

   ```bash
   git add .
   git commit -m "Setup GitHub Pages"
   git push origin main
   ```

3. **Access your site:**
   - Your site will be available at: `https://yourusername.github.io/best-drive-website`
   - Replace `yourusername` with your actual GitHub username

#### Manual Build (if needed):

```bash
npm run build
```

### Other Deployment Options

- **Vercel**: Connect GitHub repository
- **Netlify**: Drag and drop `public/` folder
- **Heroku**: Deploy with Node.js buildpack
- **Traditional hosting**: Upload files to web server

## License

MIT License - feel free to use and modify as needed.

## Contact

For questions or support, contact the development team.

---

**Rengasmarket Lappeenranta** - Laadukkaat renkaat ja ammattitaitoinen palvelu
