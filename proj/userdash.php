
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    User dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

<style>

.blur2 {
  filter: blur(5px);
}
body{
    min-height: 100vh;

    align-items: center;
    justify-content: center;
    background-image: url('https://s3-us-west-2.amazonaws.com/myra-jobs-uploads/images/DOWNSIZE%20OWWA%20ARTICLE%20IMAGE%205.jpg');
    background-size: cover;
}

body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 170%;
  background-color: rgb(255,255,255,0.8)
;

}

.container {
  background-color: #fff;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 0 auto;
  width: 50%;

}
h1 {
  text-align: center;
  margin-top: 20px;
}
form {
  margin: 20px;
}
label {
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
}
input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}
input[type="submit"] {
  width: 100%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type="submit"]:hover {
  background-color: red;
}
.error {
  color: red;
  text-align: center;
  margin-top: 20px;
}

</style>
</head>

<?php
  // Connect to the database
include 'configure.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Retrieve the id from the URL
$id = $_GET['id'];



// Select the information for the specified record from the database
$id = mysqli_real_escape_string($conn, $id);
$sql = "SELECT users.*, address.*, contact.*
FROM users
JOIN address ON users.ID = address.User_ID
JOIN contact ON users.ID = contact.User_ID
WHERE users.ID='$id'";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: Query failed.");
  }

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $firstname = $row['FirstName'];
  $middlename = $row['MiddleName'];
  $lastname = $row['LastName'];
  $profilepic = $row['profilepic'];
  $occupation = $row['occupation'];
  $gender = $row['gender'];
  $nationality = $row['nationality'];
  $company = $row['company'];
  $street = $row['Street'];
  $city = $row['City'];
  $zipcode = $row['Zip_code'];
  $province = $row['province'];
  $country = $row['country'];
  $number = $row['Phone_Number'];
  $email = $row['Email'];

} else {
  echo "Error: No results returned.";
}

mysqli_close($conn);

?>
<body>

<div id="main-page" class"blur2">



    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
       <br>
         <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile </li>
    </ol>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="logout.php" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log out</span>
              </a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('assets/img/bg.png'); background-position-y: 80%; background-size: 80%;">
          </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
            <form action="upload_image.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" id="upload-form">
                <a href=" userdash.php?id=<?php echo $id; ?>"></a>
                    <label for="fileToUpload">
                        <img src="<?php echo $profilepic?>" alt="User Profile Image" class="img-thumbnail rounded-circle" id="profile-img" style="max-width:90px; max-height:90px; min-width:90px; min-height:90px; cursor:pointer;">
                    </label>
                    <input type="file" name="fileToUpload" id="fileToUpload" style="display:none" onchange="document.querySelector('#upload-form').submit()">
            </form>
            </div>
          </div>


          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $firstname . " " . $lastname?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php echo $occupation  . " at " . $company ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
               <a href="#" id="import-file">
                <li class="nav-item">
                  <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(154.000000, 300.000000)">
                              <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                              <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Import File</span>
                </li>
                </a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-10">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Personal Information</h6>
                </div>
                <div class="col-md-4 text-end">


                  <a href="#" id="edit-button" class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>

                  </a>


                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;  <?php echo $firstname; ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Middle Name:</strong> &nbsp;<?php echo $middlename; ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Last Name:</strong> &nbsp; <?php echo $lastname; ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; <?php echo $gender; ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nationality:</strong> &nbsp; <?php echo $nationality; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-10">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Address Information</h6>
                </div>
                <div class="col-md-4 text-end">


                  <a href="#" id="edit-button1" class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>settings</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>

                  </a>

                </div>
              </div>
            </div>
            <div class="card-body p-3">

              <ul class="list-group">
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Street/Baranggay :</strong> &nbsp; <?php echo $street; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">City :</strong> &nbsp; <?php echo $city; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Province :</strong> &nbsp; <?php echo $province; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Zip code :</strong> &nbsp; <?php echo $zipcode; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Country :</strong> &nbsp; <?php echo $country; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl-10">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Contact Information</h6>
                </div>
                <div class="col-md-4 text-end">


                  <a href="#" id="edit-button2" class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>Edit Address Information</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                              <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                              </polygon>
                              <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                              <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>

                  </a>

                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Phone Number:</strong> &nbsp; <?php echo $number; ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $email; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

<!-- Personal Detailsv -->
<div class="container" id="edit-form" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">

<form action="process_update.php?id=<?php echo $id; ?>" method="post" >
      <h1>Edit Information</h1>
      <div class="form-group">
        <label for="name">First Name:</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Middle Name:</label>
        <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $middlename; ?>" required>
      </div>
      <div class="form-group">
        <label for="name">Last Name:</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
      </div>
      <div class="form-group">
        <label for="name">Gender:</label>
        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $gender; ?>" required>
      </div>
      <div class="form-group">
        <label for="name">Nationality:</label>
        <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $nationality; ?>" required>
      </div>
    <input type="submit" name="update1" value="Update">


<br><br>
        <button type="button" id="cancel-button">Cancel</button>
  </form>
  <?php
  if(isset($_GET['error'])){
    echo "<p style='color:red'>Update not succesful.</p>";
  }
  ?>
  </div>

  <div class="container" id="contact-form" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">

<form action="process_update.php?id=<?php echo $id; ?>" method="post" >
      <h1>Edit Information</h1>
      <div class="form-group">
        <label for="name">street:</label>
        <input type="text" class="form-control" id="street" name="street" value="<?php echo $street; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">city:</label>
        <input type="text" class="form-control" id="city" name="city" value="<?php echo $city; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">province:</label>
        <input type="text" class="form-control" id="province" name="province" value="<?php echo $province; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Zip Code:</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $zipcode; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">country:</label>
        <input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" required>
      </div>
    <input type="submit" name="update2" value="Update">


<br><br>
        <button type="button" id="cancel-button1">Cancel</button>
  </form>
  <?php
  if(isset($_GET['error'])){
    echo "<p style='color:red'>Update not succesful.</p>";
  }
  ?>
  </div>

  <div class="container" id="address-form" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">

<form action="process_update.php?id=<?php echo $id; ?>" method="post" >
      <h1>Edit Information</h1>
      <div class="form-group">
        <label for="name">Phone Number:</label>
        <input type="text" class="form-control" id="number" name="number" value="<?php echo $number; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>
    <input type="submit" name="update3" value="Update">


<br><br>
        <button type="button" id="cancel-button2">Cancel</button>
  </form>
  <?php
  if(isset($_GET['error'])){
    echo "<p style='color:red'>Update not succesful.</p>";
  }
  ?>
  </div>

  <div class="container" id="upload-file" style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <form action="import.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <h2>Update and Import Information</h2>
    <br>
    <label for='file' class='file-label'>Please choose an excel file:</label>
    <input type="file" name="file" accept=".xls,.xlsx" id='file'>
    <input type="submit" name="submit" value="Upload">
    <br><br>
    <button type="button" id ="cancel-file" onclick="cancelFile()">Cancel</button>
</form>
  <?php
  if(isset($_GET['error'])){
    echo "<p style='color:red'>Upload not succesful.</p>";
  }
  ?>
</div>

  <!--   Core JS Files   -->

  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script>
         // JavaScript to show the edit form
         document.getElementById("edit-button").addEventListener("click", function() {
             document.getElementById("edit-form").style.display = "block";
             document.getElementById("main-page").classList.add("blur2");
         });

         // JavaScript to hide the edit form
         document.getElementById("cancel-button").addEventListener("click", function() {
             document.getElementById("edit-form").style.display = "none";
             document.getElementById("main-page").classList.remove("blur2");
         });
       </script>

<script>
         // JavaScript to show the edit form
         document.getElementById("edit-button1").addEventListener("click", function() {
             document.getElementById("contact-form").style.display = "block";
             document.getElementById("main-page").classList.add("blur2");
         });

         // JavaScript to hide the edit form
         document.getElementById("cancel-button1").addEventListener("click", function() {
             document.getElementById("contact-form").style.display = "none";
             document.getElementById("main-page").classList.remove("blur2");
         });
       </script>


<script>
         // JavaScript to show the edit form
         document.getElementById("edit-button2").addEventListener("click", function() {
             document.getElementById("address-form").style.display = "block";
             document.getElementById("main-page").classList.add("blur2");
         });

         // JavaScript to hide the edit form
         document.getElementById("cancel-button2").addEventListener("click", function() {
             document.getElementById("address-form").style.display = "none";
             document.getElementById("main-page").classList.remove("blur2");
         });
       </script>


       <script>
         document.getElementById("import-file").addEventListener("click", function() {
             document.getElementById("upload-file").style.display = "block";
             document.getElementById("main-page").classList.add("blur2");
         });

         // JavaScript to hide the edit form
         function cancelFile() {
    document.getElementById("upload-file").style.display = "none";
     document.getElementById("main-page").classList.remove("blur2");
  }
     </script>


</html>
