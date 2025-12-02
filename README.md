* GreenHome: Smart Plant Management Application

GreenHome is a full web application built using HTML, CSS, JavaScript, PHP, and MySQL, following the structure and requirements of the Web Programming course.
It provides a clean interface for browsing plants, categories, searching, contacting support, and managing plant care.

The project follows the MVC architecture and includes both front-end and back-end modules.

* Technology Stack
Layer	Technologies	Developer
Front-End	HTML5, CSS3, JavaScript	Reina
Styling System	CSS components, layout system, styleguide	Reina
Back-End	PHP (MVC: Controllers, Models, Views)	Razane
Database	MySQL + Constraints + ERD	Razane
Integrations	Weather API, Watering API	Razane

* Team & Responsibilities:

**Reina — Front-End Developer + UI/UX Designer

Completed Responsibilities:

All HTML pages

All CSS files (style.css, layout.css, components.css, styleguide.css)

All front-end JavaScript (UI behaviors, interactions, validation, search front-end)

Full Responsive Design + Testing Documentation.

UI/UX Polishing: Implemented required Micro-animations (smooth transitions for buttons/cards/menu, input focus) and developed JavaScript functions for inline Error states and Success states (eliminating alert())

Full UI/UX system (colors, spacing, components, grid, typography)

Accessibility implementation (alt text, contrast, ARIA)

Ensuring no console errors


Complete front-end for:
Home, Plants, Categories, Search, Contact, Login, Register, Dashboard, Indoor/Outdoor/Herbs/Flowering pages

-> Reina completed the entire Front-End layer of the project.

** Razane — Back-End Developer + Database Engineer

Completed Responsibilities:

Full MVC backend (controllers, models, views)

PHP logic for:

Registration

Login

Search

Admin dashboard

Contact form

Database schema (greenhome.sql)

Constraints + Foreign Keys (constraints.sql)

ERD design

API integrations:

Weather API

Watering API

Backend validation + sanitization

-> Razane completed the entire Back-End, Database, and Integration layer.

Responsiveness Verification(Reina)
The design has been verified across key breakpoints using Chrome Developer Tools:

Mobile Width (375px - 425px): All card-grid and dashboard-grid layouts correctly reflow to single-column or two-column displays. Header navigation stack is stable.

Tablet Width (768px - 1024px): Grid layouts correctly show 2-3 columns. Text and images are legible.

Desktop Width (1000px+): Layout maintains the intended design with a max-width: 1000px container.

* How to Run the Project

Import greenhome.sql and constraints.sql into MySQL

Update database credentials in php/connect.php

Place the project folder in XAMPP/htdocs/

Run:

http://localhost/GreenHome/





GreenHome Project - Comprehensive Backend and Database Implementation

 Architectural Excellence and MVC Foundation

The GreenHome application stands on a flexible and resilient Model-View-Controller (MVC) architecture, ensuring high maintainability and scalability.

Centralized Routing: The main entry point (index.php) successfully manages all application traffic, dynamically routing requests to the correct handler.

Controller Implementation: Essential business logic is handled by dedicated controllers: AuthController (for security), PlantController (for data management), and WateringController (for scheduling features).

Data Models: Dedicated models (UserModel, PlantModel, CategoryModel) abstract and manage all interactions with the database.

Database Integration: A robust Database class ensures a stable, single connection point using secure configuration constants.

Code Structure: The project adheres to high standards of PHP development, focusing on organized file structure and clear separation of concerns.

 Robust User Authentication and Data Security

Security is a primary feature of the application, ensuring user data integrity and controlled access.

Full Authentication Suite: Complete functionality for user registration, secure login, and controlled logout has been implemented and tested.

Session-Based Access Control: User state is securely managed using PHP Sessions, and access to private areas (like the Dashboard) is strictly enforced upon successful login.

SQL Injection Prevention: All database operations utilize PDO Prepared Statements exclusively across all models, providing a strong defense against common SQL injection vulnerabilities.

User Authorization: All plant management functions (CRUD) are tied to the logged-in user's ID, preventing users from accessing or modifying data they do not own.

 Core Features and Functionality

1. Complete Plant Data Management (CRUD)

The system provides users with seamless control over their plant inventory:

Plant Entry: Users can successfully add and record new plants with all necessary details (species, category, acquisition date, and watering schedule).

Data Visualization: The application dynamically displays all user-specific plant data in the Dashboard view.

Data Updates: Secure forms allow users to edit and modify details for their existing plants.

Secure Deletion: A reliable mechanism is in place for users to remove plants from their inventory when no longer needed.

2. Intelligent Watering Scheduler Module

A specialized feature enhances the core utility of the application:

Next Watering Date Calculation: A dedicated module accurately calculates the next watering date based on the last recorded watering date and the plant's defined frequency.

Instant Update Mechanism: A function is available to instantly update a plant's last_watered timestamp, automatically triggering the recalculation of the next schedule date.


Comprehensive MVC File Structure and Implementation

This section details every file created and implemented within the MVC structure to make the application fully functional.

1. Root and Configuration

index.php (The Router): The single entry point. This file handles the following crucial tasks:

Initiates Output Buffering and PHP Sessions.

Defines the application's ROOT_PATH.

Crucially includes config/db.php FIRST to ensure database constants are defined.

Loads all core Controllers and Models.

Manages dynamic request routing (?page=...&action=...).

config/db.php: Defines the secure database connection constants (DB_HOST, DB_USER, DB_PASS, etc.).

2. Controllers (app/controllers/)

These files contain the application's business logic:

AuthController.php: Manages user sessions, registration, login attempt verification, and secure logout.

PlantController.php: The main workhorse for plant management, handling CRUD operations (add, edit, delete) and displaying the main Dashboard.

WateringController.php: The specialized controller responsible for fetching data and presenting the dynamic watering schedule.

HomeController.php: Manages the logic for the public landing page (home).

BaseController.php / Controller.php: The core abstract class that provides helper methods (like view()) to all other controllers.

3. Models (app/models/)

These files abstract all database interaction logic:

Database.php: The base class that establishes the PDO connection using prepared statements.

UserModel.php: Contains methods for user creation, verification by email, and fetching user data.

PlantModel.php: Contains all CRUD methods for plants (e.g., addPlant, updatePlant, deletePlant, getPlantsByUserId).

CategoryModel.php: Manages methods related to plant categories (e.g., getAllCategories).

4. Views (app/views/)

These files contain the HTML markup, styled with Tailwind CSS:

header.php and footer.php: The structural components that provide the consistent layout, navigation, and styling for every page.

home.php: The public landing page.

login.php and register.php: User authentication forms.

dashboard.php: Displays the logged-in user's plant list.

plant_add.php and plant_edit.php: Forms for creating and updating plant records.

watering_schedule.php: The specialized view for displaying the calculated watering calendar.

This detailed documentation highlights all the successful architectural, functional, and security tasks completed, serving as a comprehensive record of your high-quality back-end implementation.
