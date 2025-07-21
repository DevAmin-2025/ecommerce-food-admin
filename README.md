# Admin Panel – Laravel 12
This is the Admin Panel for an eCommerce food ordering platform built with Laravel 12. It provides backend management features including CRUD operations for products, categories, coupons, orders, content pages, and more. The panel is built to work alongside a customer-facing website.

**Note:** The frontend assets (HTML, CSS, JavaScript, Bootstrap, Alpine.js, etc.) were pre-built and **not developed by me.** This project focuses exclusively on Laravel backend development and integration with the frontend.

## Features
- Admin authentication and access control.
- Manage food categories and items.
- Create and manage discount coupons.
- Static content management (About Us, Contact Us, etc.).
- Order management.
- Jalali date support via morilog/jalali.

## Installation
1. Clone the Repository:
```bash
git clone https://your-repo-url.git
cd ecommerce-food-admin-main
```
2. Install Dependencies:
```bash
composer install
```
3. Environment Setup:
```bash
cp .env.example .env
php artisan key:generate
```
4. Database Setup:
Configure your .env with your database credentials, then run:
```bash
php artisan migrate
```
5. Run the Development Server:
```bash
php artisan serve
```

## Licence
This project is licensed under the MIT License.
