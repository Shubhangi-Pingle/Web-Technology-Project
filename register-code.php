<?php
session_start();
require_once "dbcon.php";

if(isset($_POST['registerBtn']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']); // Assuming you added a role field

    $errors = [];

    if($name == '' || $phone == '' || $email == '' || $password == '' || $role == ''){
        array_push($errors, "All fields are required");
    }

    if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Enter a valid email address");
    }

    if($email != ''){
        $userCheck = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
        if($userCheck){
            if(mysqli_num_rows($userCheck) > 0){
                array_push($errors, "Email already registered");
            }
        } else {
            array_push($errors, "Something went wrong while checking the email");
        }
    }

    if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    //  Hash the password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //  Insert with hashed password and role
    $query = "INSERT INTO users (name, phone, email, password, role) VALUES ('$name', '$phone', '$email', '$hashedPassword', '$role')";
    $userResult = mysqli_query($conn, $query);

    if($userResult){
        $_SESSION['message'] = "Registered Successfully";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Something went wrong while registering";
        header('Location: register.php');
        exit();
    }
}
?>
