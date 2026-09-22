# Inventory Management System

A multilingual inventory management web application built with PHP and MySQL. It demonstrates common data-structure operations through inventory search and sorting, an undo stack (LIFO), and a request queue (FIFO).

## Features

- Add, remove, search, and sort inventory items
- Undo the latest inventory operation
- Queue and process restock/order requests
- English, Thai, and Burmese interfaces
- Light and dark modes
- Automatic table creation and starter inventory on first run
- Responsive interface using Tailwind CSS via CDN

## Technology

- PHP 8.x with the `mysqli` extension
- MySQL 8.x or compatible MariaDB
- HTML, JavaScript, and Tailwind CSS

## Project structure

| Path | Purpose |
| --- | --- |
| `index.php` | Main application and web entry point |
| `inventory_system.sql` | Optional manual database setup and sample data |
| `Dockerfile` | Production container for the PHP application |
| `.env.example` | Database environment-variable example |
| `php2/` | Legacy duplicate retained from the original project; not used by the Docker image |

## Run locally with XAMPP

1. Install XAMPP and start Apache and MySQL.
2. Copy this project folder into `xampp/htdocs/InventoryManagementSystem`.
3. In phpMyAdmin, create a database named `inventory_system`. Importing `inventory_system.sql` is optional because the app creates its tables and starter data automatically.
4. Set your database values as environment variables, or adjust the local fallback values in `index.php`. The defaults are user `root`, blank password, host `localhost`, port `3306`, and database `inventory_system`.
5. Open `http://localhost/InventoryManagementSystem/`.

## Run locally with PHP

Make sure PHP, the `mysqli` extension, and MySQL are installed. Create the `inventory_system` database, then set the variables for your shell:

```bash
export MYSQLHOST=127.0.0.1
export MYSQLPORT=3306
export MYSQLUSER=root
export MYSQLPASSWORD=your_password
export MYSQLDATABASE=inventory_system
php -S localhost:8000
```

Open `http://localhost:8000`.

## Upload to GitHub

Create an empty repository on GitHub. Do **not** initialize it with another README, `.gitignore`, or license. From this project directory, run:

```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/inventory-management-system.git
git push -u origin main
```

Replace `YOUR_USERNAME` with your GitHub username. Never commit `.env`, database passwords, or API keys.

## Deploy on Railway

This repository includes a Dockerfile, so Railway can build the PHP/Apache app directly.

1. Create a Railway project and choose **Deploy from GitHub repo**.
2. Select this repository.
3. Add a MySQL database to the same Railway project.
4. In the web-service **Variables** tab, add references to the MySQL service values:

   - `MYSQLHOST` = `${{MySQL.MYSQLHOST}}`
   - `MYSQLPORT` = `${{MySQL.MYSQLPORT}}`
   - `MYSQLUSER` = `${{MySQL.MYSQLUSER}}`
   - `MYSQLPASSWORD` = `${{MySQL.MYSQLPASSWORD}}`
   - `MYSQLDATABASE` = `${{MySQL.MYSQLDATABASE}}`

   If your database service has a different name, replace `MySQL` in the references with that service name.

5. In the web service networking settings, set the target/internal port to `80`, then generate a public domain.
6. Redeploy if Railway does not do so automatically, and open the generated URL. The app creates its tables and starter data on the first request.

## Deploy on shared hosting / cPanel

1. Create a MySQL database and database user in the hosting dashboard.
2. Grant the user all privileges on that database.
3. Upload the project files to `public_html` (or a subdirectory).
4. Configure `MYSQLHOST`, `MYSQLPORT`, `MYSQLUSER`, `MYSQLPASSWORD`, and `MYSQLDATABASE` in the host's environment-variable settings. If your host does not support environment variables, set the fallback values in `index.php` and keep the repository private.
5. Visit the site. Import `inventory_system.sql` with phpMyAdmin only if automatic table creation is not permitted.

## Production notes

- Use HTTPS and a dedicated database user with only the required database permissions.
- This educational app has no login or authorization layer. Add authentication before exposing real inventory data publicly.
- Add CSRF protection and server-side access controls before production use.
- The included SQL file contains demonstration data only.
