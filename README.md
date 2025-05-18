# 🎓 Placement Record Management System

The **Placement Record Management System** is a web-based application designed to manage student placement records efficiently. It allows students to input their placement details and enables the admin to manage and view the overall placement data.

## 🌐 Technologies Used

* **Frontend**: HTML, CSS
* **Backend**: PHP
* **Database**: MySQL (via phpMyAdmin)
* **Server**: XAMPP (Apache + MySQL)

## 👥 User Roles

### 1. **Student**

* Login to the system
* Add company name, package, and placement details

### 2. **Admin**

* Login to view all placement records
* Delete or manage entries in the placement database

## 📂 Features

* Secure login system for students and admin
* Form for entering placement details (company name, package, etc.)
* Admin dashboard to view and manage placement records
* CRUD operations (Create, Read, Delete)

## 🛠️ Installation & Setup

1. **Install XAMPP**
   Download and install [XAMPP](https://www.apachefriends.org/index.html) if not already installed.

2. **Clone or Download the Project**
   Place the project folder inside the `htdocs` directory of your XAMPP installation:

   ```
   C:\xampp\htdocs\placement-record-system
   ```

3. **Start XAMPP Services**
   Open the XAMPP Control Panel and start **Apache** and **MySQL**.

4. **Create the Database**

   * Go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   * Create a new database, e.g., `user`
 

5. **Configure Database Connection**
   In your PHP files (e.g., `config.php` or `db.php`), ensure the DB credentials match:

   ```php
   $conn = mysqli_connect("localhost", "root", "", "user");
   ```

6. **Run the Project**
   Open your browser and go to:

   ```
   http://localhost/placement-record-system/
   ```


## ✅ Future Enhancements

* Add editing functionality for student records
* Add email notifications for admin updates
* Responsive mobile-friendly design

