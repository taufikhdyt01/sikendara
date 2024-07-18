# Sikendara

<p align="center">
  <a href="https://github.com/taufikhdyt01/sikendara">
    <h1 align="center" style="color: #4B47FF">Sikendara</h1>
  </a>
</p>

Sikendara is a vehicle management application developed for a nickel mining company with multiple locations, including a headquarters, a branch office, and six mining sites. The company owns and leases various types of vehicles for transporting people and goods. The application aims to monitor company vehicles, including fuel consumption, service schedules, and usage history.

## DB Structure

![db structure](https://github.com/taufikhdyt01/sikendara/blob/main/public/db_structure.png?raw=true)

## System Requirements

-   **PHP Version:** 8.3.8
-   **Laravel Framework Version:** 11.16.0
-   **Database Version:** MySQL 8.0

## Installation

The following steps will guide you through the installation process for running in a development environment locally on your machine:

1. Clone the latest version from the repository
2. Run `composer install` to install the required PHP dependencies
3. Copy the .env.example file to .env and edit the database credentials according to your database server
4. Run `php artisan key:generate` to generate a new application key
5. Run `php artisan migrate` to create the database tables. You can also add the `--seed` flag to seed the database with some dummy data
6. Run `php artisan serve` to start the development server
7. Open another terminal and run `npm install && npm run build` to install the required node modules
8. Run `npm run dev` to compile the assets for development
9. Open your browser and go to `http://localhost:8000` to view the application

## User Accounts

The following user accounts are available for testing:

| Name          | Email                  | Password | Role     | Position            | Office          |
| ------------- | ---------------------- | -------- | -------- | ------------------- | --------------- |
| Budi Santoso  | admin@nickelmining.com | password | Admin    | Pengelola Kendaraan | Head Office     |
| Agus Setiawan | agus@nickelmining.com  | password | Approver | Manajer             | Branch Office 1 |
| Dewi Sartika  | dewi@nickelmining.com  | password | Approver | Kepala Operasi      | Branch Office 1 |
| Siti Aisyah   | siti@nickelmining.com  | password | Approver | Manajer             | Head Office     |
