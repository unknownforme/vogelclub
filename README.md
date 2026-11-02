# Vogelvereniging 't Fratertje Management System

This is a web application built with Laravel and Tailwind CSS designed to manage bird club memberships and track invoice payments.

## Quick Start Guide

Follow these steps to set up the project on a local environment or a production server.

### Prerequisites

Ensure your environment has the following installed:
PHP (8.2 or higher recommended)
Composer (PHP dependency manager)
Node.js & NPM (for frontend assets)
MySQL / MariaDB (or any supported database)

---

### Installation Steps

1. Clone the repository
   ```bash
   git clone <repository-url>
   cd vogelclub
   ```

2. Install PHP dependencies
   ```bash
   composer install
   ```

3. Install Frontend dependencies & build assets
   ```bash
   npm install
   npm run build
   ```

4. Configure the Environment
   Copy the example environment file and generate a new application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Database Configuration
   Open the `.env` file in a text editor and update the database connection details to match your server settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run Migrations
   Create the database tables:
   ```bash
   php artisan migrate
   ```

---

### Running the Application

Local Development:
To start a local development server, run:
```bash
php artisan serve
```
The application will be available at `http://127.0.0.1:8000`.

Production Server:
On a production server (e.g., Nginx or Apache), ensure the document root points to the `public/` directory of this project.

---

### Access Control

Public Access: New members can register themselves via the registration page.
Member Management: Accessing the list of members, editing profiles, or managing invoices requires an authenticated admin account.

---
