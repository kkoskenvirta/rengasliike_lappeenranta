// Mobile menu functionality
const navbarToggle = document.querySelector(".navbar-toggle");
const navbarMenu = document.querySelector(".navbar-menu");

navbarToggle.addEventListener("click", () => {
  navbarToggle.classList.toggle("active");
  navbarMenu.classList.toggle("active");
});

// Close mobile menu when clicking on a link
document.querySelectorAll(".navbar-link").forEach((link) => {
  link.addEventListener("click", () => {
    navbarToggle.classList.remove("active");
    navbarMenu.classList.remove("active");
  });
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});

// Add scroll effect to header
window.addEventListener("scroll", () => {
  const header = document.querySelector(".header");
  if (window.scrollY > 100) {
    header.style.background = "rgba(255, 255, 255, 0.95)";
    header.style.backdropFilter = "blur(10px)";
  } else {
    header.style.background = "#fff";
    header.style.backdropFilter = "none";
  }
});

// Add active class to current nav link
const currentLocation = location.pathname;
document.querySelectorAll(".navbar-link").forEach((link) => {
  if (link.getAttribute("href") === currentLocation) {
    link.classList.add("active");
  }
});

// Simple animation on scroll
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1";
      // entry.target.style.transform = "translateY(0)";
    }
  });
}, observerOptions);

// Contact form handling with mailto
document.addEventListener("DOMContentLoaded", () => {
  // Contact form submission
  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Get form data
      const formData = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        phone: document.getElementById("phone").value,
        subject: document.getElementById("subject").value,
        message: document.getElementById("message").value,
      };

      // Generate mailto URL with form content as template
      const mailtoUrl = generateMailtoUrl(formData);

      // Open default email client
      window.location.href = mailtoUrl;
    });
  }

  // Function to generate mailto URL with form content
  function generateMailtoUrl(formData) {
    const to = "myynti@acrengas.com";
    const subject = formData.subject
      ? `Rengasmarket - ${formData.subject}`
      : "Rengasmarket - Yhteydenotto";

    // Create email body template
    let body = `Hei Rengasmarket,\n\n`;
    body += `Olen kiinnostunut rengaspalveluistanne.\n\n`;
    body += `Yhteystietoni:\n`;
    body += `Nimi: ${formData.name}\n`;
    body += `Sähköposti: ${formData.email}\n`;
    if (formData.phone) {
      body += `Puhelin: ${formData.phone}\n`;
    }
    if (formData.subject) {
      body += `Aihe: ${formData.subject}\n`;
    }
    body += `\nViesti:\n${formData.message}\n\n`;
    body += `Ystävällisin terveisin,\n${formData.name}`;

    // Encode parameters for URL
    const encodedSubject = encodeURIComponent(subject);
    const encodedBody = encodeURIComponent(body);

    return `mailto:${to}?subject=${encodedSubject}&body=${encodedBody}`;
  }

  // Observe elements for animation
  const animateElements = document.querySelectorAll(
    ".feature-card, .brand-item"
  );
  animateElements.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(20px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
  });
});
