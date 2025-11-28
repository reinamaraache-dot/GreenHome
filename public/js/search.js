document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("searchInput");
    const results = document.getElementById("results");

    // 1. Plant list (name + page)
    const plants = [
        { name: "Epipremnum Aureum", page: "indoor_plants.html" },
        { name: "Aloe Vera", page: "indoor_plants.html" },
        { name: "Monstera Deliciosa", page: "indoor_plants.html" },
        { name: "Snake Plant", page: "indoor_plants.html" },
        { name: "ZZ Plant", page: "indoor_plants.html" },

        { name: "Peace Lily", page: "flowering_plants.html" },
        { name: "Hibiscus", page: "flowering_plants.html" },
        { name: "Orchid", page: "flowering_plants.html" },

        { name: "Lavender", page: "outdoor_plants.html" },
        { name: "Bougainvillea", page: "outdoor_plants.html" },
        { name: "Rosemary", page: "herbs.html" },
        { name: "Panda Plant", page: "plants.html" }
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