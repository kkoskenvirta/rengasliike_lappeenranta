// Mobile menu functionality
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const closeMenuBtn = document.getElementById("close-menu");

if (mobileMenuBtn && mobileMenu && closeMenuBtn) {
  mobileMenuBtn.addEventListener("click", () => {
    mobileMenu.classList.remove("hidden");
    mobileMenu.classList.add("visible");
    document.body.style.overflow = "hidden";
  });

  closeMenuBtn.addEventListener("click", () => {
    mobileMenu.classList.add("hidden");
    mobileMenu.classList.remove("visible");
    document.body.style.overflow = "auto";
  });

  // Close mobile menu when clicking on a link
  document.querySelectorAll("#mobile-menu a").forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.add("hidden");
      mobileMenu.classList.remove("visible");
      document.body.style.overflow = "auto";
    });
  });
}

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
  const header = document.querySelector("header");
  if (window.scrollY > 50) {
    header.classList.add("shadow-lg");
    header.style.background = "rgba(255, 255, 255, 0.98)";
  } else {
    header.classList.remove("shadow-lg");
    header.style.background = "rgba(255, 255, 255, 0.95)";
  }
});

// Add active class to current nav link
const currentLocation = location.pathname;
document.querySelectorAll(".navbar-link").forEach((link) => {
  if (link.getAttribute("href") === currentLocation) {
    link.classList.add("active");
  }
});

// Enhanced animation on scroll
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate-fade-in");
      entry.target.style.opacity = "1";
      entry.target.style.transform = "translateY(0)";
    }
  });
}, observerOptions);

// Observe elements for animation
document.addEventListener("DOMContentLoaded", () => {
  const animateElements = document.querySelectorAll(
    ".feature-card, .brand-item, .service-card, .pricing-card, .team-member"
  );

  animateElements.forEach((el, index) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = `opacity 0.6s ease ${
      index * 0.1
    }s, transform 0.6s ease ${index * 0.1}s`;
    observer.observe(el);
  });

  // Add hover effects to cards
  const cards = document.querySelectorAll(
    ".card, .feature-card, .service-card, .pricing-card, .team-member"
  );
  cards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
      card.style.transform = "translateY(-8px) scale(1.02)";
    });

    card.addEventListener("mouseleave", () => {
      card.style.transform = "translateY(0) scale(1)";
    });
  });

  // Add loading animation to brand logos
  const brandLogos = document.querySelectorAll(".brand-logo");
  brandLogos.forEach((logo, index) => {
    logo.style.opacity = "0";
    logo.style.transform = "scale(0.8)";
    logo.style.transition = `opacity 0.5s ease ${
      index * 0.1
    }s, transform 0.5s ease ${index * 0.1}s`;

    setTimeout(() => {
      logo.style.opacity = "0.7";
      logo.style.transform = "scale(1)";
    }, 500 + index * 100);
  });
});

// Form validation and enhancement
document.addEventListener("DOMContentLoaded", () => {
  const forms = document.querySelectorAll("form");

  forms.forEach((form) => {
    const inputs = form.querySelectorAll("input, textarea, select");

    inputs.forEach((input) => {
      // Add focus effects
      input.addEventListener("focus", () => {
        input.parentElement.classList.add("ring-2", "ring-primary-200");
      });

      input.addEventListener("blur", () => {
        input.parentElement.classList.remove("ring-2", "ring-primary-200");
      });

      // Add floating label effect if needed
      if (input.value) {
        input.classList.add("has-value");
      }

      input.addEventListener("input", () => {
        if (input.value) {
          input.classList.add("has-value");
        } else {
          input.classList.remove("has-value");
        }
      });
    });
  });
});

// Performance optimization: Lazy loading for images
document.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll("img[data-src]");

  const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.classList.remove("lazy");
        imageObserver.unobserve(img);
      }
    });
  });

  images.forEach((img) => imageObserver.observe(img));
});
