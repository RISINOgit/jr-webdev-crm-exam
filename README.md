Features
Full CRUD Operations: Create, Read, Update, and Delete client records seamlessly.
Authentication System: Secure user registration, login, and logout functionality.
Status Management: Filter and manage clients based on their status (Active or Inactive).
Repository Pattern: Implements a decoupled architecture by separating database logic from controllers for better testability and maintenance.
Responsive UI: Styled with Tailwind CSS for a modern, mobile-friendly experience.

Tech Stack*/
Framework: Laravel
Frontend: Tailwind CSS & Blade Templating
Database: MySQL / SQLite
Architecture: Repository Pattern

Database Schema
Client entity, which includes:
name: The full name of the client.
email: Unique contact email address.
status: Current status (Active/Inactive).

Installation & Setup
Clone the repository:

Bash
git clone https://github.com/RISINOgit/jr-webdev-crm-exam.git
cd jr-webdev-crm-exam
Install dependencies:

Bash
composer install
npm install && npm run build
Environment Setup:

Bash
cp .env.example .env
php artisan key:generate
Database Migration:
(Ensure your database credentials are set in the .env file)

Bash
php artisan migrate
Run the application:

Bash
php artisan serve
