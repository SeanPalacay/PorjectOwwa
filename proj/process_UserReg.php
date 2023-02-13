<?php

// Connect to the database
include 'configure.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$firstname2 = $_GET['FirstName'];
$middlename2 = $_GET['MiddleName'];
$lastname2 = $_GET['LastName'];


$sql1 = "SELECT * FROM users WHERE FirstName='$firstname2' AND MiddleName='$middlename2' AND LastName='$lastname2'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['ID'];
  }

  
//personal details
$username = $_POST['username'];
$password = $_POST['password'];
// Default profile picture path

// Insert the user's information into the database
$sql = "INSERT INTO users_login (user_id, username, password) VALUES ('$id', '$username', '$password')";
$sql1 = "UPDATE contact SET User_ID='$id'  WHERE ID ='$id'";
$sql2 = "UPDATE address SET User_ID='$id'  WHERE ID ='$id'";

if (mysqli_query($conn, $sql)) {
  if (mysqli_query($conn, $sql1)) {
    if (mysqli_query($conn, $sql2)) 
      {
    header("Location: login.php");
  exit;
   
  }
 }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
