// Pricing constants for Rengasmarket Lappeenranta
const PRICES = {
  // Rengashotelli (Tire Hotel)
  TIRE_HOTEL: {
    price: 90,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Turvallinen säilytys vaihtokauden ajaksi",
      en: "Safe storage for the change season",
    },
  },

  // Renkaanvaihto (Tire Change)
  TIRE_CHANGE: {
    price: 50,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Sisältää pesun, paineiden tarkistuksen ja asennuksen",
      en: "Includes washing, pressure check and installation",
    },
  },

  // Henkilöautojen renkaat (Passenger Car Tires)
  PASSENGER_CAR_TIRES: {
    price: 80,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Kesä- ja talvirenkaat kaikille henkilöautoille",
      en: "Summer and winter tires for all passenger cars",
    },
  },

  // Renkaan paikkaus (Tire Repair)
  TIRE_REPAIR: {
    price: 25,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Laadukkailla materiaaleilla tehty paikkaus",
      en: "Repair made with quality materials",
    },
  },

  // Tasapainoitus (Balancing)
  BALANCING: {
    price: 10,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Ammattitaitoinen tasapainoitus tarkkuuslaiteella",
      en: "Professional balancing with precision equipment",
    },
  },

  // Pakettiautojen renkaat (Van Tires)
  VAN_TIRES: {
    price: 120,
    currency: "€",
    unit: "kpl",
    description: {
      fi: "Kestävät renkaat pakettiautoihin",
      en: "Durable tires for vans",
    },
  },
};

// Function to format price with currency and unit
function formatPrice(priceData, lang = "fi") {
  const unit = lang === "en" ? "pc" : "kpl";
  const prefix = lang === "en" ? "From" : "Alkaen";
  return `${prefix} ${priceData.price}${priceData.currency}/${unit}`;
}

// Function to get localized description
function getDescription(priceData, lang = "fi") {
  if (typeof priceData.description === "string") {
    return priceData.description; // Fallback for old format
  }
  return priceData.description[lang] || priceData.description.fi;
}

// Function to inject prices into the pricing section
function injectPrices() {
  const pricingCards = document.querySelectorAll(".pricing-card");
  const currentLang = document.documentElement.lang || "fi";

  pricingCards.forEach((card) => {
    const title = card.querySelector("h4").textContent.trim();
    const priceElement = card.querySelector(".price");
    const descriptionElement = card.querySelector("p");

    // Map Finnish titles to price constants
    let priceKey = null;

    switch (title) {
      case "Rengashotelli":
      case "Tire Hotel":
        priceKey = "TIRE_HOTEL";
        break;
      case "Renkaanvaihto":
      case "Tire Change":
        priceKey = "TIRE_CHANGE";
        break;
      case "Henkilöautojen renkaat":
      case "Passenger Car Tires":
        priceKey = "PASSENGER_CAR_TIRES";
        break;
      case "Renkaan paikkaus":
      case "Tire Repair":
        priceKey = "TIRE_REPAIR";
        break;
      case "Tasapainoitus":
      case "Balancing":
        priceKey = "BALANCING";
        break;
      case "Pakettiautojen renkaat":
      case "Van Tires":
        priceKey = "VAN_TIRES";
        break;
    }

    if (priceKey && PRICES[priceKey]) {
      priceElement.textContent = formatPrice(PRICES[priceKey], currentLang);
      if (descriptionElement) {
        descriptionElement.textContent = getDescription(
          PRICES[priceKey],
          currentLang
        );
      }
    }
  });
}

// Auto-inject prices when DOM is loaded
document.addEventListener("DOMContentLoaded", injectPrices);

// Export for use in other scripts
if (typeof module !== "undefined" && module.exports) {
  module.exports = { PRICES, formatPrice, getDescription, injectPrices };
}
