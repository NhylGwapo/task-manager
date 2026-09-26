Personal Task Manager

A simple Laravel-based task management system that allows users to create, view, edit, delete, and update the status of their tasks.

Project Information

Student Name: Nhyl Divinagracia
Course & Year: BSIT-2
Database Used: MySQL

Features
Add Task
View Tasks
Edit Task
Delete Task
Update Status
Pending
Completed
Add task description
Add due date
Task validation
Technologies Used
Laravel
PHP
MySQL
Blade
HTML
CSS
Vite
Project Structure

The project follows the basic Laravel flow:

Routes → Controller → Model → Database → Blade

Routes

Handles the URLs and connects them to the Task Controller.

Controller

Handles the task operations such as adding, viewing, editing, deleting, and updating task status.

Model

The Task model connects the application to the tasks database table.

Database

MySQL is used to store the task information.

Blade Views

Blade templates are used to display the task list and task forms.

Database Table

The tasks table contains:
id
task_name
description
status
due_date
created_at
updated_at

How to Run the Project:
Clone the repository.
Open the project folder in VS Code.
Install PHP dependencies:
composer install
Install JavaScript dependencies:
npm install
Create a .env file and configure the MySQL database.
Run the database migrations:
php artisan migrate
Start the Laravel development server:
php artisan serve
Start Vite:
npm run dev
Open the application in your browser:
http://127.0.0.1:8000/tasks
Author

Student: [Nhyl Divinagracia]