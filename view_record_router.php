<?php
session_start();

if (!isset($_SESSION['role'])) {
    // Not logged in
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] === 'admin') {
    header("Location: admin_view_record.php");
} elseif ($_SESSION['role'] === 'student') {
    header("Location: student_view_record.php");
} else {
    echo "Unauthorized role.";
}
exit();
?>
