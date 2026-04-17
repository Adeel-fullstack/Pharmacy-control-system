# Pharmacy Control System

A complete **Pharmacy Management System** built to streamline daily operations of a medical store. This system helps manage medicines, stock, sales, and billing efficiently with a user-friendly interface.

---

## 📌 Overview

The Pharmacy Control System is designed to simplify pharmacy workflows by digitizing inventory management and sales processes. It ensures accurate stock tracking, fast billing, and organized record keeping.

---

## 🚀 Features

### 🧾 Billing System (PDF Invoice)

* Generate professional **PDF bills/invoices**
* Auto-calculation of total, tax, and discounts
* Print and download invoices بسهولة
* Maintain billing history for future reference

---

### 💊 Medicine Management

* Add, update, and delete medicines
* Manage categories and suppliers
* Store details like batch number, expiry date, and price

---

### 📦 Stock Management

* Real-time stock tracking
* Alerts for low stock
* Expiry date monitoring

---

### 👥 User Management

* Secure login system
* Role-based access (Admin / Staff)

---

### 📊 Reports & Records

* Sales reports
* Purchase history
* Daily/monthly transaction summaries

---

## 🛠️ Technologies Used

* **Backend:** Laravel (PHP Framework)
* **Frontend:** Blade / Livewire
* **Database:** MySQL
* **PDF Generation:** Laravel PDF / DOMPDF
* **Server:** XAMPP / Apache

---

## ⚙️ Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Adeel-fullstack/Pharmacy-control-system.git
   ```

2. Navigate to project folder:

   ```bash
   cd Pharmacy-control-system
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Copy `.env` file:

   ```bash
   cp .env.example .env
   ```

5. Configure database in `.env`

6. Generate application key:

   ```bash
   php artisan key:generate
   ```

7. Run migrations:

   ```bash
   php artisan migrate
   ```

8. Start server:

   ```bash
   php artisan serve
   ```
---

## 🎯 Purpose

This project is developed to:

* Reduce manual work in pharmacies
* Improve billing accuracy
* Maintain proper inventory records
* Provide fast and reliable invoice generation (PDF)

---

## 📬 Contact

For any queries or suggestions, feel free to reach out.

---

## ⭐ Contribution

Contributions are welcome! Feel free to fork the repo and submit a pull request.
