# TaskFlow Personal Task Manager

Project Code: WST21-PM-2026-SF
Student Name: Rohan Choy
Course & Year: BSIT 2nd Year
Database Used: SQLite

## Features
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Project Overview
This project is a personal task manager built with Laravel, Blade, and Tailwind CSS. It allows users to create, manage, complete, and delete tasks from a modern dashboard interface.

## Setup Instructions
1. Clone the project repository.
2. Navigate to the project folder.
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
7. Start the application:
   ```bash
   php artisan serve
   ```
8. In another terminal, run the Vite dev server:
   ```bash
   npm run dev
   ```

## UI Highlights
- Sleek dashboard with task statistics
- Responsive cards and task table
- Task creation and editing forms
- Status toggling for pending/completed tasks
- Clean Tailwind-based styling

## License
This project is for personal and academic use.
