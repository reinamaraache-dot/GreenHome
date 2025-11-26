ALTER TABLE plants
ADD CONSTRAINT fk_plants_categories
FOREIGN KEY (category_id) REFERENCES categories(category_id)
ON DELETE SET NULL
ON UPDATE CASCADE;

ALTER TABLE watering_schedule
ADD CONSTRAINT fk_watering_plants
FOREIGN KEY (plant_id) REFERENCES plants(plant_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

