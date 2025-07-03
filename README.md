# College Management System

A web-based College Management System built with PHP and MySQL, designed to help colleges efficiently manage students, faculty, courses, departments, library resources, attendance, and reporting. The project is intended for use on a local XAMPP server and leverages MySQL for all database operations.

## Features

- Secure login system for administrators and users
- Student, faculty, course, and department management
- Attendance tracking and assignment submission
- Library resource management
- Announcements and reporting modules
- Responsive and user-friendly interface

## Technologies Used

- **Frontend:** HTML, CSS
- **Backend:** PHP
- **Database:** MySQL (via XAMPP)
- **Development Tools:** XAMPP, phpMyAdmin, VS Code

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) installed on your system
- Basic knowledge of PHP and MySQL

### Installation

1. **Clone or Download the Project**
   - Place the project folder (e.g., `piet/cms`) inside your `C:\xampp\htdocs\` directory.

2. **Start XAMPP**
   - Open XAMPP Control Panel.
   - Start **Apache** and **MySQL** modules.

3. **Create the Database**
   - Open your browser and go to [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
   - Run the `db.php` file by visiting [http://localhost/piet/cms/db.php](http://localhost/piet/cms/db.php) to automatically create the required database and tables.

4. **Access the Application**
   - Open [http://localhost/piet/cms/login.php](http://localhost/piet/cms/login.php) in your browser.
   - Use the default credentials (e.g., username: `admin`, password: `password123`) to log in.

## Project Structure

```
cms/
├── attendance marking.php
├── course.php
├── db.php
├── department.php
├── faculty.php
├── index.php
├── library.php
├── login.php
├── report.php
├── student.php
├── styles.css
```

## Notes

- All database operations are handled using PDO for security and reliability.
- You can modify the database connection settings in `db.php` as per your environment.
- For production use, enhance security (password hashing, input validation, etc.).

## License

This project is for educational purposes.
