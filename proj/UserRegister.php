<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Responsive Regisration Form </title>


</head>
<body>

<?php 
$firstname1 = $_GET['FirstName'];
$middlename1 = $_GET['MiddleName'];
$lastname1 = $_GET['LastName'];
?>

<div class="container">
        <header>Registration</header>

        <form action="process_UserReg.php?FirstName=<?php echo $firstname1; ?>&MiddleName=<?php echo $middlename1; ?>&LastName=<?php echo $lastname1; ?>" method="post">
           
                    <span class="title">Login Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>UserName</label>
                            <input type="text" placeholder="Enter your first name" name="username" required>
                        </div>

                        <div class="input-field">
                            <label>Confirm Password</label>
                            <input type="text" placeholder="Enter your middle name"  required>
                        </div>

                  
               
<br> 
            </div>
            <div class="fields">
                    

                        <div class="input-field">
                            <label>Password</label>
                            <input type="text" placeholder="Enter your middle name" name="password" required>
                        </div>
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
						
                  
               
<br>  
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
