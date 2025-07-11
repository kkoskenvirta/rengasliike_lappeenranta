// Pricing constants for Rengasmarket Lappeenranta
const PRICES = {
  // Rengashotelli (Tire Hotel)
  TIRE_HOTEL: {
    price: 90,
    currency: "€",
    unit: "kpl",
    description: "Turvallinen säilytys vaihtokauden ajaksi",
  },

  // Renkaanvaihto (Tire Change)
  TIRE_CHANGE: {
    price: 15,
    currency: "€",
    unit: "kpl",
    description: "Sisältää pesun, paineiden tarkistuksen ja asennuksen",
  },

  // Henkilöautojen renkaat (Passenger Car Tires)
  PASSENGER_CAR_TIRES: {
    price: 80,
    currency: "€",
    unit: "kpl",
    description: "Kesä- ja talvirenkaat kaikille henkilöautoille",
  },

  // Renkaan paikkaus (Tire Repair)
  TIRE_REPAIR: {
    price: 25,
    currency: "€",
    unit: "kpl",
    description: "Laadukkailla materiaaleilla tehty paikkaus",
  },

  // Tasapainoitus (Balancing)
  BALANCING: {
    price: 10,
    currency: "€",
    unit: "kpl",
    description: "Ammattitaitoinen tasapainoitus tarkkuuslaiteella",
  },

  // Pakettiautojen renkaat (Van Tires)
  VAN_TIRES: {
    price: 120,
    currency: "€",
    unit: "kpl",
    description: "Kestävät renkaat pakettiautoihin",
  },
};

// Function to format price with currency and unit
function formatPrice(priceData) {
  return `Alkaen ${priceData.price}${priceData.currency}/${priceData.unit}`;
}

// Function to inject prices into the pricing section
function injectPrices() {
  const pricingCards = document.querySelectorAll(".pricing-card");

  pricingCards.forEach((card) => {
    const title = card.querySelector("h4").textContent.trim();
    const priceElement = card.querySelector(".price");

    // Map Finnish titles to price constants
    let priceKey = null;

    switch (title) {
      case "Rengashotelli":
        priceKey = "TIRE_HOTEL";
        break;
      case "Renkaanvaihto":
        priceKey = "TIRE_CHANGE";
        break;
      case "Henkilöautojen renkaat":
        priceKey = "PASSENGER_CAR_TIRES";
        break;
      case "Renkaan paikkaus":
        priceKey = "TIRE_REPAIR";
        break;
      case "Tasapainoitus":
        priceKey = "BALANCING";
        break;
      case "Pakettiautojen renkaat":
        priceKey = "VAN_TIRES";
        break;
    }

    if (priceKey && PRICES[priceKey]) {
      priceElement.textContent = formatPrice(PRICES[priceKey]);
    }
  });
}

// Auto-inject prices when DOM is loaded
document.addEventListener("DOMContentLoaded", injectPrices);

// Export for use in other scripts
if (typeof module !== "undefined" && module.exports) {
  module.exports = { PRICES, formatPrice, injectPrices };
}
