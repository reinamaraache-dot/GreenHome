

// 1️ Define categories
const categories = [
  { name: "Indoor Plants", image: "assets/images/indoor_category.jpg" },
  { name: "Outdoor Plants", image: "assets/images/outdoor_category.jpg" },
  { name: "Succulents", image: "assets/images/succulents_category.jpg" },
  { name: "Flowering Plants", image: "assets/images/flowering_category.jpg" }
];

// 2 Define plants
const plants = [
  { name: "Aloe Vera", type: "Succulent", image: "assets/images/aloe_vera.avif", watering: "Every 7 days" },
  { name: "Monstera Deliciosa", type: "Indoor", image: "assets/images/monstera_deliciosa.jpg", watering: "Every 5 days" },
  { name: "Snake Plant", type: "Indoor", image: "assets/images/snake_plant.webp", watering: "Every 10 days" },
  { name: "Rose", type: "Flowering", image: "assets/images/rose.jpg", watering: "Every 3 days" },
  { name: "Lavender", type: "Herb", image: "assets/images/lavender.jpg", watering: "Every 4 days" },
  { name: "Cactus", type: "Succulent", image: "assets/images/cactus.jpg", watering: "Every 14 days" },
  { name: "Basil", type: "Herb", image: "assets/images/basil.jpg", watering: "Every 2 days" },
  { name: "Jade Plant", type: "Succulent", image: "assets/images/jade_plant.jpg", watering: "Every 7 days" },
  { name: "Sunflower", type: "Outdoor", image: "assets/images/sunflower.jpg", watering: "Every 3 days" },
  { name: "Fern", type: "Indoor", image: "assets/images/fern.jpg", watering: "Every 4 days" },
  { name: "Orchid", type: "Flowering", image: "assets/images/orchid.jpg", watering: "Every 6 days" },
  { name: "Mint", type: "Herb", image: "assets/images/mint.jpg", watering: "Every 2 days" }
];

// Define watering schedules (derived from plants)
const wateringSchedules = plants.map(plant => ({
  name: plant.name,
  schedule: plant.watering
}));

//  Populate Dashboard Totals 
document.addEventListener("DOMContentLoaded", () => {
  // Total plants
  const totalPlantsElem = document.querySelector(".dashboard-card:nth-child(1) p");
  totalPlantsElem.textContent = plants.length;

  // Total categories
  const totalCategoriesElem = document.querySelector(".dashboard-card:nth-child(2) p");
  totalCategoriesElem.textContent = categories.length;

  // Total watering schedules
  const totalWateringElem = document.querySelector(".dashboard-card:nth-child(3) p");
  totalWateringElem.textContent = `${wateringSchedules.length} Active`;

  // Weather status
  const weatherElem = document.querySelector(".dashboard-card:nth-child(4) p");
  weatherElem.textContent = "Connected ✅";

  // Populate Recent Plants dynamically 
  const recentPlantsContainer = document.querySelector(".dashboard-grid ~ section .card-grid");
  recentPlantsContainer.innerHTML = ""; // clear existing cards

  plants.forEach(plant => {
    const card = document.createElement("div");
    card.className = "card";

    const img = document.createElement("img");
    img.src = plant.image;
    img.alt = plant.name;
    img.className = "card-img";

    const h4 = document.createElement("h4");
    h4.textContent = plant.name;

    const p = document.createElement("p");
    p.textContent = `${plant.type}, ${plant.watering}`;

    card.appendChild(img);
    card.appendChild(h4);
    card.appendChild(p);

    recentPlantsContainer.appendChild(card);
  });
});
