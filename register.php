<?php
session_start();
if(isset($_SESSION['loggedInStatus'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form in PHP MySQL with Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="mt-4 card card-body shadow">
                <center><h4>Register</h4></center>
                <hr>

                <?php
                if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0){
                    foreach($_SESSION['errors'] as $error){
                        echo '<div class="alert alert-warning">'.$error.'</div>';
                    }
                    unset($_SESSION['errors']);
                }

                if(isset($_SESSION['message'])){
                    echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']);
                }
                ?>

                <form action="register-code.php" method="POST">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="number" name="phone" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>

                    <!-- Role Dropdown -->
                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Select Role --</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="registerBtn" class="btn btn-primary w-100">Submit</button>
                    </div>
                    <div class="text-center">
                        <a href="login.php">Click here to Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
