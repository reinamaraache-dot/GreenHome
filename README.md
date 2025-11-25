# GreenHome — Smart Plant Management (Milestone 1)

**Front-End by:** Reina  
**Back-End by:** Razane

---

## Project Description
GreenHome is a smart and user-friendly web application that helps users manage their indoor and outdoor plants.  
Users can track plants, organize categories, search, contact support, and view a basic dashboard.

Milestone 1 focuses on **front-end**, **UI/UX**, **design system**, and **GitHub workflow**.

---

## Milestone 1 Deliverables (Reina)
✔ Full folder structure  
✔ All HTML screens  
✔ Design System (styleguide.css)  
✔ Components (components.css)  
✔ Layout system (layout.css)  
✔ Base styling (style.css)  
✔ UI interactions (ui.js)  
✔ Search interaction (search.js)  
✔ Contact interaction (contact.js)  
✔ Zero JavaScript console errors  
✔ Accessibility (alt text, contrast, ARIA)  
✔ WORKLOG.md  

---

## 📁 Folder Structure (Front-End Completed)
GreenHome/
│
├── index.html
├── plants.html
├── categories.html
├── search.html
├── contact.html
├── dashboard.html
│
├── css/
│ ├── style.css
│ ├── components.css
│ ├── layout.css
│ └── styleguide.css
│
├── js/
│ ├── script.js
│ ├── ui.js
│ ├── search.js
│ └── contact.js
│
├── assets/
│ ├── images/
│ └── icons/
│
├── WORKLOG.md
└── README.md

---

## How to Run the Project
1. Download or clone the repository  
2. Open **index.html** in your browser  
3. No backend or server required for Milestone 1  

---

## GitHub Workflow (Reina)
**Branch used:** `reina-ui`

Reina completed:
- Folder structure  
- HTML pages  
- CSS files  
- JS files  
- Accessibility  
- Commit history with multiple features  
- Pull Request to merge into main  

---

## Accessibility Features
- `alt` text on all images  
- WCAG AA color contrast  
- ARIA labels where needed  
- Keyboard-friendly navigation  
- Zero JavaScript console errors  

---

• Milestone 2 Deliverables (Razane: Backend & Database)

This milestone introduces the core PHP MVC architecture, database integration, and SQL schema setup.

• Razane's Completed Tasks:
* MVC Architecture: Full separation of logic (Controllers/Models) and presentation (Views).
* Database Integration: Successful connection to `greenhomedb` via `config/db.php`.
* Data Display: Dynamic rendering of plant data from the database on the Home Page (`home.php`).
* Folder Structure: Updated to reflect MVC standards (`app/`, `config/`, `public/`).
* SQL Deliverables: Successful creation and application of `greenhome.sql` and `constraints.sql`.

---

• How to Run the Project (Updated Instructions)

To run the project after this milestone, you must use a PHP server:

1.  **Database Setup:**
    * Create a database named `greenhomedb` in phpMyAdmin.
    * Import the SQL schema from `database/greenhome.sql`.
    * Import the foreign key constraints from `database/constraints.sql`.
2.  **Start PHP Server:**
    * Open your project directory in the terminal (MINGW64).
    * Run the command: `php -S localhost:3000 -t public`
3.  **Access:** Open your browser to `http://localhost:3000/`.


