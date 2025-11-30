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