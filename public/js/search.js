document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("searchInput");
    const results = document.getElementById("results");

    // 1. Plant list (name + page)
    const plants = [
        // Indoor Plants
        { name: "Epipremnum Aureum", page: "indoor_plants.html" },
        { name: "Monstera Deliciosa", page: "indoor_plants.html" },
        { name: "Snake Plant", page: "indoor_plants.html" },
        { name: "ZZ Plant", page: "indoor_plants.html" },
        { name: "Peace Lily", page: "flowering_plants.html" },

        // Flowering Plants
        { name: "Hibiscus", page: "flowering_plants.html" },
        { name: "Orchid", page: "flowering_plants.html" },

        // Outdoor Plants
        { name: "Bougainvillea", page: "outdoor_plants.html" },
        
        // Herbs & Succulents 
        { name: "Lavender", page: "herbs.html" },
        { name: "Rosemary", page: "herbs.html" },
        { name: "Aloe Vera", page: "herbs.html" }, 
        { name: "Panda Plant", page: "herbs.html" } 
    ];

    // 2. Handle search typing
    input.addEventListener("input", () => {
        const query = input.value.toLowerCase();
        results.innerHTML = "";

        if (query.trim() === "") return;

        const filtered = plants.filter(p =>
            p.name.toLowerCase().includes(query)
        );

        // 3. Show results in list
        filtered.forEach(p => {
            const li = document.createElement("li");
            li.textContent = p.name;
            li.classList.add("result-item");

            // 4. Redirect on click
            li.addEventListener("click", () => {
                window.location.href = p.page;
            });

            results.appendChild(li);
        });
    });
});