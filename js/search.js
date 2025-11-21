document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("searchInput");
    const results = document.getElementById("results");

    if (input && results) {
        input.addEventListener("input", () => {
            results.innerHTML = "";
        });
    }
});
