# CRM

## 🎥 Demo

You can watch a live demo of the system in action here:  
👉 [https://youtu.be/eneLbsGBK9Q](https://youtu.be/eneLbsGBK9Q)

---

## 📋 Overview

CRM is a **Customer Relationship Management** system built with **PHP** and a **MySQL** database, designed to run locally using **XAMPP**.  

It allows users to manage clients, tasks, statistics, and more through a simple, functional interface.

---

## ✅ Key Features

- 🔐 User registration and login  
- 👥 Client management (create, read, update, delete)  
- 🔎 Full client detail views  
- 📅 Custom calendar with:  
  - Meetings  
  - Notes  
  - Tasks with priority and due dates  
- 📊 Statistics module with:  
  - Revenue by period (monthly/annual)  
  - Visual analysis with charts (Chart.js)  
  - Average revenue and comparisons  

---

## 🛠 Technologies Used

- **PHP** – Backend and server logic  
- **MySQL** – Data storage  
- **Bootstrap 5** – Responsive styles and UI components  
- **Chart.js** – Graphical data visualization  
- **JavaScript (ES6)** – Dynamic interactions and event handling  
- **HTML5 + CSS3** – Markup and styling  
- **XAMPP** – Local server (Apache + PHP + MySQL)  

---

## ⚙️ Installation (Local with XAMPP)

1. **Install XAMPP:**  
   Download and install from [apachefriends.org](https://www.apachefriends.org/index.html).

2. **Start Services:**  
   From the XAMPP control panel, start **Apache** and **MySQL**.

3. **Set Up the Database:**  
   - Go to `http://localhost/phpmyadmin`  
   - Create a database named `crm`  
   - (Import a `.sql` script if you have one)

4. **Deploy the Project:**  
   Clone or copy this repository into:  
   `C:\xampp\htdocs\crm`

5. **Configure the Connection:**  
   In `includes/conexion.php`, ensure you have:
   ```php
   <?php
   $host = 'localhost';
   $user = 'root';
   $pass = ''; // default empty password
   $db   = 'crm';
   
   $conexion = new mysqli($host, $user, $pass, $db);
   if ($conexion->connect_error) {
       die('Connection failed: ' . $conexion->connect_error);
   }
   ?>
