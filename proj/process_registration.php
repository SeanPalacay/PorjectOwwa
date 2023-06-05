<?php

// Connect to the database
include 'configure.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//personal details
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$occupation = $_POST['occupation'];
$gender = $row['gender'];
$nationality = $row['nationality'];
$company = $row['company'];
//contact details
$number = $_POST['number'];
$email = $_POST['email'];

//address details
$street = $_POST['street'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];

// Default profile picture path
$default_pic = "img/default.jpg";

// Check if the email is already in use
$email_check_query = "SELECT * FROM users WHERE FirstName='$firstname' AND MiddleName='$middlename' AND LastName='$lastname'";
$email_check_query1 = "SELECT * FROM contact WHERE Phone_Number='$number' AND Email='$email'";

$result = mysqli_query($conn, $email_check_query);
$result1 = mysqli_query($conn, $email_check_query1);


$user = mysqli_fetch_assoc($result);
$user1 = mysqli_fetch_assoc($result1);


if ($user) { // if user exists

    if ($user['FirstName'] === $firstname && $user['MiddleName'] === $middlename && $user['LastName'] === $lastname)
    {

        echo "Error: This user is already registered";

    }  
} else if ($user1) {
  
  if ($user1['Phone_Number'] === $number && $user1['Email'] === $email) {

  echo "Error: This user is already registered";
}

}

else 
{
    // Insert the user's information into the database
    $sql = "INSERT INTO users (FirstName, MiddleName, LastName, profilepic) VALUES ('$firstname', '$middlename', '$lastname','$default_pic')";
   
    if (mysqli_query($conn, $sql)) {

      $sql = "SELECT ID FROM users WHERE FirstName='$firstname' AND MiddleName='$middlename' AND LastName='$lastname'";

$result1 = mysqli_query($conn, $sql);

if (mysqli_num_rows($result1) > 0) {
    $row = mysqli_fetch_assoc($result1);
    $id = $row['ID'];
  }

    $sql1 = "INSERT INTO contact (User_ID, Phone_Number, Email) VALUES ('$id','$number', '$email')";
    $sql2 = "INSERT INTO address  (User_ID, Street, City, Zip_code) VALUES ('$id','$street', '$city', '$zipcode')";
   
        if (mysqli_query($conn, $sql1)) {
            if (mysqli_query($conn, $sql2)) {

                header("Location: UserRegister.php?FirstName=$firstname&MiddleName=$middlename&LastName=$lastname&Email=$email");
                exit;
            }
            else {
              echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
          }
        }
        else {
          echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
      }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>