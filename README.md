# TaskFlow Personal Task Manager

Project Code: WST21-PM-2026-SF  
Student Name: Kurt Rohan Escuadro
Course & Year: BSIT 2nd Year  
Database Used: SQLite

## Project Overview
TaskFlow is a personal task management web app built with Laravel, Blade, and Tailwind CSS. It allows users to create, view, edit, complete, and delete tasks through a clean and responsive dashboard interface.

## Features
- Add new tasks
- View tasks in a dashboard
- Edit task details
- Delete tasks
- Update status between pending and completed
- Track total, pending, completed, and overdue counts

## UI Highlights
- Clean dashboard layout
- Responsive card-based statistics
- Structured task table for management
- Modern green-themed design
- Tailwind CSS styling

## Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/kurtrohan22-pixel/Escaudro_Wst.git
   ```
2. Open the project folder:
   ```bash
   cd Escaudro_Wst
   ```
3. Install PHP dependencies:
   ```bash
   composer install
   ```
4. Install frontend dependencies:
   ```bash
   npm install
   ```
5. Create the SQLite database file if it does not already exist:
   ```bash
   touch database/database.sqlite
   ```
6. Run the migrations:
   ```bash
   php artisan migrate
   ```
7. Start the Laravel server:
   ```bash
   php artisan serve
   ```
8. In a separate terminal, run the frontend dev server:
   ```bash
   npm run dev
   ```

## Usage
- Open the local app in your browser.
- Create a new task from the Add Task form.
- Manage tasks from the dashboard.
- Update status or delete tasks as needed.

## License
This project is intended for personal and academic use.
