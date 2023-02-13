<?php

// Connect to the database
include 'configure.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the id from the URL
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["update1"])) {
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];

$sql = "UPDATE users SET FirstName='$firstname', MiddleName='$middlename' , LastName='$lastname' , gender='$gender' , nationality='$nationality'    WHERE ID ='$id'";

$result = mysqli_query($conn, $sql);

if ($result) {
  // Update was successful
  header("Location: userdash.php?id=$id");
  exit;
} else {
  // Update was not successful
  header("Location: userdash.php?error=1");
  exit;
}
  }

  if (isset($_POST["update2"])) {

$street = $_POST['street'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$province = $_POST['province'];
$country = $_POST['country'];

$sql1 = "UPDATE address SET Street='$street', City='$city' , Zip_code='$zipcode' , province='$province' , country='$country'  WHERE User_ID ='$id'";

$result1 = mysqli_query($conn, $sql1);

if ($result1) {
  // Update was successful
  header("Location: userdash.php?id=$id");
  exit;
} else {
  // Update was not successful
  header("Location: userdash.php?error=1");
  exit;
}
  }

  if (isset($_POST["update3"])) {

$number = $_POST['number'];
$email = $_POST['email'];

// Update the user's information in the database
$sql2 = "UPDATE contact SET Phone_Number='$number' , Email='$email' WHERE User_ID ='$id'";

$result2 = mysqli_query($conn, $sql2);


if ($result2) {
  // Update was successful
  header("Location: userdash.php?id=$id");
  exit;
} else {
  // Update was not successful
  header("Location: userdash.php?error=1");
  exit;
}
  }
}


mysqli_close($conn);

?>
