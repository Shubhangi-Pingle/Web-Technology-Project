<?php 
session_start();
require_once 'dbcon.php';

if(isset($_POST['loginBtn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $errors = [];

    if($email == '' || $password == ''){
        array_push($errors, "All fields are mandatory");
    }

    if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }

    if(count($errors) > 0)
    {
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit();
    }

    // Fetch the user by email only (not password)
    $userQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $userQuery);

    if($result && mysqli_num_rows($result) == 1){
        $userData = mysqli_fetch_assoc($result);

        // Verify hashed password
        if(password_verify($password, $userData['password'])) {

            $_SESSION['loggedInStatus'] = true;
            $_SESSION['auth_user'] = [
                'id' => $userData['id'],
                'name' => $userData['name'],
                'email' => $userData['email'],
                'role' => $userData['role']
            ];
            $_SESSION['message'] = "Logged In Successfully!";
            
            header('Location: dashboard.php');
            exit();

        } else {
            array_push($errors, "Invalid Email or Password!");
            $_SESSION['errors'] = $errors;
            header('Location: login.php');
            exit();
        }

    } else {
        array_push($errors, "Invalid Email or Password!");
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit();
    }
}
?>
