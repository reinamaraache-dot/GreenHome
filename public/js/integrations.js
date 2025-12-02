document.addEventListener('DOMContentLoaded', () => {
    
    const fetchWeather = async () => {
        try {
            const response = await fetch('index.php?page=api&action=weather');
            const data = await response.json();

            const weatherContainer = document.getElementById('weather-info');
            if (data.status === 'success' && weatherContainer) {
                weatherContainer.innerHTML = `
                    <p><strong>Location:</strong> ${data.weather.location}</p>
                    <p><strong>Temp:</strong> ${data.weather.temperature}</p>
                    <p><strong>Condition:</strong> ${data.weather.condition}</p>
                `;
            } else if (weatherContainer) {
                weatherContainer.innerHTML = `<p class="error">${data.error || 'Failed to fetch weather data.'}</p>`;
            }
        } catch (error) {
            console.error("Error fetching weather:", error);
        }
    };
    
    const handleWateringSchedule = async (plantId, moistureLevel) => {
        const formData = new FormData();
        formData.append('plant_id', plantId);
        formData.append('moisture', moistureLevel);

        try {
            const response = await fetch('index.php?page=api&action=schedule_watering', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            
            if (data.status === 'success') {
                alert(`Success! Plant ${data.plant_id}: ${data.message} Next water: ${data.next_watering}`);
            } else {
                alert(`Error: ${data.error}`);
            }
        } catch (error) {
            console.error("Error scheduling watering:", error);
        }
    };

    fetchWeather(); 
    
});

