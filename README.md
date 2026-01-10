# Sales & Delivery Management System

## Overview

The **Sales & Delivery Management System** is a web-based application designed to manage online sales operations, customer orders, and delivery logistics.

The system provides two major roles: **Admin** and **Customer**, each with dedicated functionalities.

This project demonstrates **full-stack web development** using **PHP and MySQL**, with a structured backend and a responsive frontend built using **HTML, CSS, and Bootstrap**.

---

## System Roles

### Admin

The Admin manages the entire system and has access to:

- Product management
- Employee management
- Order tracking
- Payment handling
- Vehicle management
- Customer records

### Customer

Customers can:

- Register and log in
- Place orders
- View order history
- Return products from orders

---

## Key Functionalities

### Product Management
- Add new products  
- Update product price, stock, and description  
- Soft delete products by marking them **Out of Stock**  
- View all available products  

### Employee Management
- Add employee details  
- Update employee contact information  
- Remove employees with leaving date  
- View employee list  

### Customer Management
- Customer registration with login credentials  
- Secure login verification  
- View customer details (admin access)  

### Order Management
- Create orders using selected products  
- Calculate bill amount dynamically  
- Store order details and quantities  
- View order history per customer  

### Return Management
- Return ordered products  
- Update product stock automatically  
- Maintain return records  
- Update order bill amount after return  

### Payment Management
- Generate payment records per order  
- Update payment status (Pending → Paid)  
- View all payment transactions  

### Vehicle Management
- Add delivery vehicles  
- View all registered vehicles  

---

## Technology Stack

- **Frontend:** HTML, CSS, Bootstrap  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** Apache (XAMPP)  

---

## How to Run the Project

1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Open **phpMyAdmin** and import the project database
4. Place the project folder inside:    htdocs/DBMS_PRO/PROJECT/
5. Open the project in browser: http://localhost/DBMS_PRO/PROJECT/FE/mainpage.html
---

## Project Highlights

- Clear separation of frontend and backend
- Relational database design
- Real-time inventory updates
- Order-to-payment workflow
- Return handling with automatic stock correction



