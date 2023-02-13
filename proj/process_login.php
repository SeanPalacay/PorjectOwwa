<?php

// Connect to the database
include 'configure.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$name = $_POST['username'];
$password = $_POST['password'];

// Check the email and password against the information in the database
$sql = "SELECT * FROM users_login WHERE username='$name' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['user_id'];
  }

  if (mysqli_num_rows($result) > 0) {
    // Login successful, redirect to dashboard
    header("Location: userdash.php?id=$id");
    exit;
  } else {
    // Login failed, display an error message
    header("Location: login.php?error=1");
    exit;
  }

mysqli_close($conn);

?>
