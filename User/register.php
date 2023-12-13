<?php
include "connect.php";

// Get the values from the form
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$username = $_POST['uname'];
$password = $_POST['pwd'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if user already exists
$checkUserSql = "SELECT * FROM users WHERE username = '$username'";
$checkUserResult = mysqli_query($conn, $checkUserSql);

if (mysqli_num_rows($checkUserResult) > 0) {
    // User already exists, redirect to login page
    echo '<script language="javascript">alert("'.$username.' already exists, Please Login!"); location.href="login.html";</script>';
} else {
    // User doesn't exist, proceed with registration
    $sql = "INSERT INTO users(firstname, lastname, username, password) VALUES ('$firstname', '$lastname', '$username', '$hashed_password')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Registration successful, redirect to mainframe
        echo '<script language="javascript">alert("' . $firstname . ', You Registered successfully!"); location.href="login.html";</script>';
    } else {
        // Registration failed, handle error
        echo '<script language="javascript">alert("Registration failed, Please try again!");</script>';
    }
}

$conn->close();
?>


