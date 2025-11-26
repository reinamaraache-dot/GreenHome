#  GreenHome: Smart Plant Management Application

This repository contains the source code for the **GreenHome** web application, a project designed to simulate a real-world development environment by integrating multiple web technologies (HTML, CSS, JavaScript, PHP, and MySQL).

GreenHome is a user-friendly platform that helps users manage and care for their indoor and outdoor plants by tracking watering schedules, categories, and maintenance notes.

##  Project Objectives & Technology Stack

**Primary Goal:** To deliver a functional, responsive, and secure web application managing plant data using the MVC architecture.

### Technologies Used

| Component | Technology | Responsibility |
| :--- | :--- | :--- |
| **Front-End** | HTML5, CSS3, JavaScript | Responsive Design (Reina) |
| **Styling** | Custom CSS, CSS Variables | Design System and Components (Reina) |
| **Back-End** | PHP (Planned) | MVC Architecture, Business Logic (Razane) |
| **Database** | MySQL (Planned) | Data Storage and Relationships (Razane) |
| **Integration** | RESTful Web Services (Planned) | Weather & Watering APIs (Razane) |

##  Team & Responsibilities

| Role | Name | Content Area Focus | GitHub Branch |
| :--- | :--- | :--- | :--- |
| **Front-End Lead** | Reina | UI/UX, Component Design, Accessibility | `reina-frontend` |
| **Back-End Lead** | Razane | PHP Logic, Database Schema, API Integration | `razane-backend` |

##  Project Milestones (Completed & Upcoming)

### Milestone 1: Front-End & Static UI (Completed)

* **Status:** **100% Complete** (HTML, CSS, and placeholder JS deployed to `main` branch).
* **Deliverables:** Static views for Home, Plants, Categories, Login, Registration, Contact, Search, and Watering Schedule.
* **Key Feature:** Client-side form validation (`contact.js`) and local storage simulation for watering tracking (`watering.js`).

### Milestone 2: Database & MVC Foundation (Next Focus)

* **Status:** **In Progress**
* **Deliverables:**
    * Full MySQL schema (`greenhome.sql`).
    * Required SQL constraints and Foreign Keys (`constraints.sql`).
    * Basic PHP connection and initial MVC file structure (`connect.php`, `controllers/`, `models/`).
    * Integration of **Registration** and **Login** with the MySQL database.