# NTC Portal System

NTC Portal System is a modern student portal system developed using CodeIgniter 4 that provides students with a centralized platform for managing academic and school-related activities. 

## System Features

### Authentication

* Secure Student Login System
* Session-Based Authentication

### Student Dashboard

* Dashboard Overview
* Student Schedule Management
* Exam Board Access
* Grade Report Viewing

### Academic Services

* Homework Tracking
* File Submission System
* Course Enrollment Management

  * Add Courses
  * Unenroll from Courses

### Communication

* School Announcements
* Pagination for Announcement Listings

### Payment Services

* Online Payment Center

  * GCash
  * Maya
  * DragonPay
  * 7-Eleven Payment Center

### Account Management

* Update Profile Information
* Account Settings Management

## Technology Stack

### Backend

* PHP 8.1+
* CodeIgniter 4

### Database

* MySQL

### Frontend

* HTML5
* CSS3
* JavaScript
* Font Awesome 6.5

## Security Implementation

### Cross-Site Request Forgery (CSRF) Protection

* Enabled globally via `app/Config/Filters.php`
* Every POST form contains `csrf_field()`
* Invalid requests automatically return 403 Forbidden

### Cross-Site Scripting (XSS) Prevention

* User-generated output is escaped using CodeIgniter's `esc()` helper
* Custom XSS Filter sanitizes incoming POST data
* Prevents execution of malicious scripts stored in the database

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/Junelledc0716/NTC-Portal-System.git
```

### 2. Move the Project

Copy the project folder to:

```text
C:\xampp\htdocs\
```

### 3. Import the Database

Import the provided SQL database file using phpMyAdmin.

### 4. Configure Environment Variables

Open the `.env` file and update the following settings:

```env
app.baseURL = 'http://localhost/NTC-Portal-System/public/'

database.default.hostname = localhost
database.default.database = univercity_portal
database.default.username = root
database.default.password =
```

### 5. Start XAMPP Services

Start:

* Apache
* MySQL

### 6. Run the Application

```bash
php spark serve
```

### 7. Access the System

Open your browser and visit:

```text
http://localhost:8080
```

## Deployment

### Live Website

https://ntc-portal-group01.infinityfreeapp.com/login

The system is deployed online and can be accessed through the link above.

## Default Test Account

**Username:** [Elle@school.edu](mailto:Elle@school.edu)
**Password:** password

## Testing and Debugging

The system has been tested using various debugging and validation techniques.

### PHPUnit Testing

```bash
php spark test
```

### Security Testing

* CSRF Protection Testing
* XSS Prevention Testing
* Validation Testing

### Debugging Tools

* Stack Trace Analysis
* Session Inspection
* Request Inspection
* `dd()` Helper for Development Debugging

## Project Structure

```text
NTC-Portal-System/
├── app/
│   ├── Config/
│   │   ├── Filters.php
│   │   ├── Routes.php
│   │   └── Security.php
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── ScheduleController.php
│   │   ├── ExamController.php
│   │   ├── HomeworkController.php
│   │   ├── GradeController.php
│   │   ├── CourseController.php
│   │   ├── AnnouncementController.php
│   │   ├── PaymentController.php
│   │   └── AccountController.php
│   ├── Filters/
│   │   └── XssFilter.php
│   ├── Models/
│   │   ├── StudentModel.php
│   │   ├── CourseModel.php
│   │   ├── ExamModel.php
│   │   ├── HomeworkModel.php
│   │   ├── AnnouncementModel.php
│   │   ├── GradeModel.php
│   │   └── PaymentModel.php
│   └── Views/
│       ├── layouts/
│       │   └── main.php
│       ├── auth/
│       │   └── login.php
│       ├── dashboard/
│       │   └── index.php
│       ├── schedule/
│       │   └── index.php
│       ├── examboard/
│       │   └── index.php
│       ├── homework/
│       │   └── index.php
│       ├── grade/
│       │   └── index.php
│       ├── courses/
│       │   └── index.php
│       ├── announcements/
│       │   └── index.php
│       ├── payment/
│       │   └── index.php
│       └── account/
│           └── index.php
├── public/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   │   ├── ntc_logo.png
│   │   ├── banner.png
│   │   └── default.png
│   └── uploads/
│       └── profiles/
├── tests/
│   └── app/
│       └── AuthTest.php
├── writable/
│   └── uploads/
├── .env
├── composer.json
└── README.md
```

## Developers

Developed by BSIT students for academic and educational purposes.

* April Nicole Custorio
* Junelle F. Dela Cruz
* Maureen C. Santos
* Gabriel C. Maningo

**Bachelor of Science in Information Technology (BSIT)**
**3rd Year – BSIT 3.2**

## Disclaimer

This project was developed for academic and educational purposes only. The system serves as a demonstration of web application development concepts using CodeIgniter 4, database management, security implementation, and responsive user interface design.
