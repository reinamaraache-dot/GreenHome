// watering.js

document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        const plantId = card.querySelector("h3").textContent.replace(/\s+/g, "-").toLowerCase();

        // Load saved data from localStorage
        const savedData = JSON.parse(localStorage.getItem(plantId));
        if (savedData) {
            card.querySelector(`#last-water-${plantId}`).value = savedData.lastWatered;
            card.querySelector(`#next-water-${plantId}`).value = savedData.nextWatering;
            card.querySelector(`#notes-${plantId}`).value = savedData.notes;
        }

        // Add change listeners to inputs
        const lastWater = card.querySelector(`#last-water-${plantId}`);
        const nextWater = card.querySelector(`#next-water-${plantId}`);
        const notes = card.querySelector(`#notes-${plantId}`);

        [lastWater, nextWater, notes].forEach(input => {
            input.addEventListener("change", () => {
                savePlantData(plantId, lastWater.value, nextWater.value, notes.value, card);
            });
        });
    });

    function savePlantData(id, last, next, note, card) {
        const data = {
            lastWatered: last,
            nextWatering: next,
            notes: note
        };
        localStorage.setItem(id, JSON.stringify(data));
        showSavedMessage(card);
    }

    function showSavedMessage(card) {
        let msg = card.querySelector(".saved-message");
        if (!msg) {
            msg = document.createElement("span");
            msg.className = "saved-message";
            msg.style.color = "green";
            msg.style.fontSize = "0.9rem";
            msg.style.display = "block";
            msg.style.marginTop = "5px";
            msg.textContent = "Saved!";
            card.appendChild(msg);
        }
        msg.style.opacity = "1";
        setTimeout(() => {
            msg.style.opacity = "0";
        }, 1500);
    }
});
