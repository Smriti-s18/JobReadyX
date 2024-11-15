<?php

$conn= mysqli_connect("localhost","root","smriti2005");
mysqli_select_db($conn, "php_project");


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];
$captcha_input = $_POST['captcha'];

// CAPTCHA validation
// Replace 'your_captcha_code' with the actual CAPTCHA code
$expected_captcha_code = 'N53Bh2'; // This should be dynamically generated and validated
if ($captcha_input !== $expected_captcha_code) {
    echo "<p class='error'>Invalid CAPTCHA code.</p>";
    exit();
}

// Check if the email already exists
$stmt = $conn->prepare("SELECT user_name FROM users WHERE email_id = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p class='error'>An account with this email already exists.</p>";
    $stmt->close();
    $conn->close();
    exit();
}

// Validate passwords
if ($password !== $confirm_password) {
    echo "<p class='error'>Passwords do not match.</p>";
    exit();
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to about.html after a delay
    echo "<p>Registration successful. Redirecting...</p>";
    header("refresh:3;url=about.html"); // Redirect after 3 seconds
} else {
    echo "<p class='error'>Error: " . $stmt->error . "</p>";
}

// Close connections
$stmt->close();
$conn->close();
?>
