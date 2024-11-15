<?php
// reset_password.php

$conn= mysqli_connect("localhost","root","smriti2005");
mysqli_select_db($conn, "php_project");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$user = $_POST['username'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];

// Sanitize input to prevent SQL injection
$user = $conn->real_escape_string($user);
$new_password = $conn->real_escape_string($new_password);
$confirm_password = $conn->real_escape_string($confirm_password);

// Check if new password and confirm password match
if ($new_password !== $confirm_password) {
    echo "New password and confirm password do not match.";
    exit();
}

// Fetch the current password for the user
$sql = "SELECT password FROM users WHERE user_name='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $old_password = $row['password'];

    // Check if the new password is the same as the old password
    if ($new_password === $old_password) {
        echo "The new password cannot be the same as the old password.";
        exit();
    }

    // Update the password
    $sql = "UPDATE users SET password='$new_password' WHERE user_name='$user'";
    if ($conn->query($sql) === TRUE) {
        echo "Password reset successful.";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "User not found.";
}

$conn->close();
?>