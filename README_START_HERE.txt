COARSE TECHNOLOGIES - PART 2 BACKEND (Laravel API Starter)

This is the backend/admin API package for:
- Products
- Categories
- Brands
- Technical specifications
- Inventory / low stock limits
- Orders
- Customers
- Quotations
- M-Pesa logs
- Users / roles
- Activity logs

IMPORTANT:
This backend is meant to run on Laravel hosting such as:
- Railway
- Render
- cPanel hosting with PHP/MySQL
- Local XAMPP for testing

Netlify cannot run this backend because Netlify does not run PHP/MySQL.

LOCAL SETUP USING XAMPP:
1. Extract this folder to:
   C:\xampp\htdocs\coarse-backend

2. Open CMD:
   cd /d C:\xampp\htdocs\coarse-backend

3. Install dependencies:
   composer install

4. Copy environment file:
   copy .env.example .env

5. Create database in phpMyAdmin:
   coarse_backend

6. Generate Laravel key:
   php artisan key:generate

7. Run migrations:
   php artisan migrate

8. Seed demo data:
   php artisan db:seed --class=CoarseBackendSeeder

9. Start backend:
   php artisan serve

10. Test:
   http://127.0.0.1:8000/api/products

GITHUB UPLOAD:
Upload the extracted backend files to a GitHub repo called:
coarse-backend

RAILWAY:
Deploy the GitHub repo on Railway and add MySQL/PostgreSQL database.
