#  Leave Management System

## Introduction

A leave management system is a process within an organization that determines how leave is requested by employees and approved by managers, as well as how it is tracked for payroll, balance, and other purposes.

<!-- This leave management system has some basic features such as leave requests, leave tracking, approval and etc. --> 

## Technologies
- Laravel Framework 8.83.0
- MySQL


## Configuration and Setup
### Database Migrations

#### Step 1:
- Create an empty database in the MySQL with the name of **LeaveMS** 

#### Step 2:
- Execute the bellow command to migrate and seed the database.

  ```bash
    cd LeaveMS
    php artisan migrate --seed --database=LeaveMS 
  ```


## Credentials
### Admin
- Username:- **admin@tim.com**
- Password:- **admin**

### Users
- Username:- **tim@abc.com**
- Password:- **employee**

## Project Explained

### Home Page
- A link to login page if the user is not Auth.
- Or a link to Admin dash or Employee dash
### Dashboard
#### Admin 
- **Links in the page**
  - List of employees 
    - form to add new employees (now just creates an employee form factory)
    - remove employee
    - change employee types 
  - List of employee Types  
    - Add or remove types
  - List of applied leaves 
    -  approve or reject leaves 

#### Employee 
  - **Values shown**
    -  Max number of  days for leave (set by leave type)
    -  remaining  number of  days for leave 
  - **Links in the page**
    - List of applied leaves by the employee
