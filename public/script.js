// Typography toggle (preserved for compatibility)
let currentTypography = localStorage.getItem("typography") || "outfit";

function initTypography() {
  const themeToggle = document.getElementById("themeToggle");
  if (themeToggle) {
    loadTypography(currentTypography);
    updateTypographyButton(currentTypography);
    themeToggle.addEventListener("click", () => {
      currentTypography = currentTypography === "outfit" ? "inter" : "outfit";
      localStorage.setItem("typography", currentTypography);
      loadTypography(currentTypography);
      updateTypographyButton(currentTypography);
    });
  }
}

function updateTypographyButton(typography) {
  const themeToggle = document.getElementById("themeToggle");
  if (!themeToggle) return;
  const themeText = themeToggle.querySelector(".theme-text");
  if (typography === "inter") {
    themeText.textContent = "Outfit";
    themeToggle.classList.add("active");
  } else {
    themeText.textContent = "Inter";
    themeToggle.classList.remove("active");
  }
}

function loadTypography(typography) {
  const existing = document.getElementById("typography-theme");
  if (typography === "inter") {
    if (!existing) {
      const link = document.createElement("link");
      link.id = "typography-theme";
      link.rel = "stylesheet";
      link.href = "typography-theme.css";
      document.head.appendChild(link);
    }
  } else if (existing) {
    existing.remove();
  }
}

// Mobile menu
const navbarToggle = document.querySelector(".navbar-toggle");
const navbarMenu = document.querySelector(".navbar-menu");

if (navbarToggle && navbarMenu) {
  navbarToggle.addEventListener("click", () => {
    navbarToggle.classList.toggle("active");
    navbarMenu.classList.toggle("active");
    document.body.style.overflow = navbarMenu.classList.contains("active") ? "hidden" : "";
  });

  document.querySelectorAll(".navbar-link").forEach((link) => {
    link.addEventListener("click", () => {
      navbarToggle.classList.remove("active");
      navbarMenu.classList.remove("active");
      document.body.style.overflow = "";
    });
  });
}

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      window.scrollTo({ top: offsetPosition, behavior: "smooth" });
    }
  });
});

// Header scroll effect
const header = document.querySelector(".header");
let lastScroll = 0;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 10) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
  lastScroll = currentScroll;
}, { passive: true });

// Scroll reveal animation
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1, rootMargin: "0px 0px -40px 0px" }
);

// Contact form (mailto)
function initContactForm() {
  const contactForm = document.getElementById("contactForm");
  if (!contactForm) return;

  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      phone: document.getElementById("phone").value,
      subject: document.getElementById("subject").value,
      message: document.getElementById("message").value,
    };

    const to = "myynti@acrengas.com";
    const subject = formData.subject
      ? `Rengasliike - ${formData.subject}`
      : "Rengasliike - Yhteydenotto";

    let body = `Hei Rengasliike,\n\n`;
    body += `Olen kiinnostunut rengaspalveluistanne.\n\n`;
    body += `Yhteystietoni:\n`;
    body += `Nimi: ${formData.name}\n`;
    body += `Sähköposti: ${formData.email}\n`;
    if (formData.phone) body += `Puhelin: ${formData.phone}\n`;
    if (formData.subject) body += `Aihe: ${formData.subject}\n`;
    body += `\nViesti:\n${formData.message}\n\n`;
    body += `Ystävällisin terveisin,\n${formData.name}`;

    window.location.href = `mailto:${to}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
  });
}

// Initialize
document.addEventListener("DOMContentLoaded", () => {
  initTypography();
  initContactForm();

  document.querySelectorAll(".reveal").forEach((el) => {
    revealObserver.observe(el);
  });
});
