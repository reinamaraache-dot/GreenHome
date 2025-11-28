// Define your categories 
const categories = [
    { name: "Indoor Plants", image: "public/assets/images/indoor_category.jpg" },
    { name: "Outdoor Plants", image: "public/assets/images/outdoor_category.jpg" },
    { name: "Succulents", image: "public/assets/images/succulents_category.jpg" },
    { name: "Flowering Plants", image: "public/assets/images/flowering_category.jpg" }
];

// Define your plants 
const plants = [
    { name: "Aloe Vera", type: "Succulent", image: "public/assets/images/aloe_vera.avif", watering: "Every 7 days" },
    { name: "Monstera Deliciosa", type: "Indoor", image: "public/assets/images/monstera_deliciosa.jpg", watering: "Every 5 days" },
    { name: "Snake Plant", type: "Indoor", image: "public/assets/images/snake_plant.webp", watering: "Every 10 days" },
    { name: "Epipremnum Aureum", type: "Indoor", image: "public/assets/images/epipremnum_aureum.jpg", watering: "Every 5 days" },
    { name: "Orchid", type: "Flowering", image: "public/assets/images/orchid.jpeg", watering: "Every 6 days" },
    { name: "Lavender", type: "Herb", image: "public/assets/images/lavender.jpg", watering: "Every 4 days" },
    { name: "Hibiscus", type: "Flowering", image: "public/assets/images/hibiscus.webp", watering: "Every 3 days" },
    { name: "Peace Lily", type: "Indoor", image: "public/assets/images/peace_lily.jpg", watering: "Every 4 days" },
    { name: "Rosemary", type: "Herb", image: "public/assets/images/rosemary.avif", watering: "Every 2 days" },
    { name: "Panda Plant", type: "Succulent", image: "public/assets/images/panda_plant.png", watering: "Every 10 days" },
    { name: "ZZ Plant", type: "Indoor", image: "public/assets/images/zz_plant.jpg", watering: "Every 14 days" },
    { name: "Bougainvillea", type: "Outdoor", image: "public/assets/images/bougainvillea.webp", watering: "Every 3 days" }
];

//Define watering schedules (derived from plants) 
const wateringSchedules = plants.map(plant => ({
    name: plant.name,
    schedule: plant.watering
}));


// Populate Dashboard Totals and Lists 
document.addEventListener("DOMContentLoaded", () => {
    
    // 1. POPULATE DASHBOARD STATS
    
    // Total plants
    const totalPlantsElem = document.querySelector(".dashboard-card:nth-child(1) p");
    if (totalPlantsElem) {
        totalPlantsElem.textContent = plants.length;
    }
    
    // Total categories
    const totalCategoriesElem = document.querySelector(".dashboard-card:nth-child(2) p");
    if (totalCategoriesElem) {
        totalCategoriesElem.textContent = categories.length;
    }
    
    // Total watering schedules
    const totalWateringElem = document.querySelector(".dashboard-card:nth-child(3) p");
    if (totalWateringElem) {
        totalWateringElem.textContent = `${wateringSchedules.length} Active`;
    }
    
    // Weather status
    const weatherElem = document.querySelector(".dashboard-card:nth-child(4) p");
    if (weatherElem) {
        weatherElem.textContent = "Connected ✅";
    }

    
    // 2. POPULATE ALL PLANTS DYNAMICALLY
    const plantsContainer = document.querySelector("#plants-list");
    
    if (plantsContainer) {
        plantsContainer.innerHTML = "";
        
        plants.forEach(plant => {
            const card = document.createElement("div");
            card.className = "card";
            
            const img = document.createElement("img");
            img.src = plant.image;
            img.alt = plant.name;
            img.className = "card-img";

            
            const title = document.createElement("h3");
            title.textContent = plant.name;
            
            const type = document.createElement("p");
            type.textContent = `Type: ${plant.type}`;

            card.appendChild(img);
            card.appendChild(title);
            card.appendChild(type);
            
            plantsContainer.appendChild(card);
        });
    }

    // 3. POPULATE WATERING SCHEDULES DYNAMICALLY
    const wateringContainer = document.querySelector("#watering-list");

    if (wateringContainer) {
        wateringContainer.innerHTML = "";

        wateringSchedules.forEach(schedule => {
            const card = document.createElement("div");
            card.className = "card small"; 

            const title = document.createElement("h4");
            title.textContent = schedule.name;

            const task = document.createElement("p");
            task.textContent = `Schedule: ${schedule.schedule}`;
            
            card.appendChild(title);
            card.appendChild(task);
            
            wateringContainer.appendChild(card);
        });
    }
});