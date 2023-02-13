
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<link href="css/login.css" rel="stylesheet" />

<div class="container vh-100 d-flex align-items-center">
  <div id="innerPage">
  <div class="row align-items-center justify-content-center d-flex">
  <div class="col-sm-6 col-xs-12 d-sm-block d-none order-2">
        <div id="imgBgn">
        </div>
      </div>
      <div class="col-sm-6 col-xs-12 p-5 order-1">
        <div class="formContainer">
  <div class="logo-container"></div>
  <h2 class="p-2 h4 text-center"><i class="fas fa-lock me-2"></i> Login</h2>

          <form action="process_login.php" method ="post">
          <div class="form-group" >
      <label for="name">Username:</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
            <div id="btnHolder">
            <button  type="submit" value="Submit" class="btn btn-lg btn-primary mt-3 w-100">Login</button>
    </div>

            <br>
        <div class="text-center">
  Don't have an account? <a href="registerform.php">Register</a>

</div>
          </form>
            </div>
              </div>
                </div>
                  </div>
                      </div>

          <?php
    if(isset($_GET['error'])){
      echo "<p class='error'>Invalid username or password.</p>";
    }
  ?>
