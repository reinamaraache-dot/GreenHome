
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
       
        const plantId = card.querySelector("h3").textContent.replace(/\s+/g, "-").toLowerCase();

        
        const savedData = JSON.parse(localStorage.getItem(plantId));
        if (savedData) {
            
           
            if (card.querySelector(`#last-water-${plantId}`)) {
                card.querySelector(`#last-water-${plantId}`).value = savedData.lastWatered;
            }
            if (card.querySelector(`#next-water-${plantId}`)) {
                card.querySelector(`#next-water-${plantId}`).value = savedData.nextWatering;
            }
            if (card.querySelector(`#notes-${plantId}`)) {
                card.querySelector(`#notes-${plantId}`).value = savedData.notes;
            }
        }

        
        const lastWater = card.querySelector(`#last-water-${plantId}`);
        const nextWater = card.querySelector(`#next-water-${plantId}`);
        const notes = card.querySelector(`#notes-${plantId}`);

        [lastWater, nextWater, notes].forEach(input => {
            if (input) {
                input.addEventListener("change", () => {
                    savePlantData(plantId, lastWater.value, nextWater.value, notes.value, card);
                });
            }
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