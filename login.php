<?php
session_start(); // Start the session

$conn= mysqli_connect("localhost","root","smriti2005");
mysqli_select_db($conn, "php_project");


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$username_or_email = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the statement to find the user
$stmt = $conn->prepare("SELECT password FROM users WHERE User_name = ? OR Email_Id = ?");
$stmt->bind_param("ss", $username_or_email, $username_or_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $stored_password = $row['password'];
    
    // Check if the password matches
    if ($password === $stored_password) {
        echo "Login successful"; // Or any success message
        exit();
    } else {
        // Password incorrect
        echo "Incorrect password. Please try again.";
    }
} else {
    // User not found
    echo "No account found with this username or email.";
}

// Close connections
$stmt->close();
$conn->close();
?>
