# Employee Management System

The Employee Management System is a web application built using PHP and MySQL. 
It provides functionalities for managing employee records such as adding new employees, editing existing ones, and deleting employees.

# Features

- **Authentication**: Secure login system to access the application.
- **CRUD Operations**: Create, Read, Update, and Delete employee records.
- **Image Upload**: Ability to upload and display employee profile pictures.
- **Search Functionality**: Search employees by name.
- **Responsive Design**: Bootstrap framework for a mobile-friendly UI.

## Installation and Setup

### Prerequisites

- Web server (Apache recommended)
- PHP (version 7.x recommended)
- MySQL (version 5.x recommended)

### Installation Steps

1. Clone the repository
    `git clone https://github.com/cher-dinesh/Employee-Management.git`

2. Import Database

   - Create a MySQL database named `employee_management`.
   - Import the provided SQL file `employee_management.sql` into your database to create necessary tables.
     
     `mysql -u root -p employee_management < employee_management.sql`

3. Configure Database Connection

   - Open `db.php` file in the root directory.
   - Modify the following variables with your MySQL database credentials:

    ` $servername = "localhost";
     $username = "root";
     $password = "root";
     $dbname = "employee_management";`

4. Start the Application
   
   - Ensure your web server (Apache) and MySQL are running.
   - Navigate to the project directory on your web server (e.g., `http://localhost/employee-management-system`).
   - The application should now be accessible.

## Usage

1. Login

   - Open the application in your web browser.
   - Navigate to `login.php`.
   - Use the following credentials to log in:

     - Username: `admin`
     - Password: `password`

2. Manage Employees

   - After logging in, you'll be redirected to `index.php` where you can view all employees.
   - Use the navigation links to `Add Employee`, `Edit`, or `Delete` employees.

3. Adding New Employee

   - Click on `Add Employee` in the navigation bar.
   - Fill in the employee details including profile picture upload.
   - Click `Add Employee` button to save.

4. Editing Employee

   - Click `Edit` on an employee card in the `index.php` page.
   - Update employee details and click `Update Employee` button.

5. Deleting Employee

   - Click `Delete` on an employee card in the `index.php` page to delete an employee.

## Screenshots
**1.Home Page**
![emp1](https://github.com/user-attachments/assets/dddf746e-f010-4837-9a81-2296ed47ad26)

**2.Add Employee**
![emp2](https://github.com/user-attachments/assets/c59c535b-ba15-4a20-8b07-8c0c632a8883)

**3.Update Employee Details**
![emp3](https://github.com/user-attachments/assets/9321af08-334e-47d2-8824-a61ee3a6f076)




## Technologies Used

- PHP
- MySQL
- HTML/CSS
- Bootstrap
