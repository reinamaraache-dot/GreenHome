CREATE TABLE users (
    user_id INT(11) PRIMARY KEY AUTO_INCREMENT, 
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user', 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,     
    updated_at DATETIME NULL
);

CREATE TABLE categories (
    category_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE plants (
    plant_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    category_id INT NULL,
    description TEXT,                               
    image VARCHAR(255) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NULL
);

CREATE TABLE watering_schedule (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    plant_id INT NOT NULL,
    watering_date DATE NOT NULL,
    notes VARCHAR(500) NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);