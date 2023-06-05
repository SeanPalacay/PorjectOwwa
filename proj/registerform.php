<!DOCTYPE html>
<html lang="en">
<head>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Regisration Form </title>


</head>
<body>
    <div class="container">
        <header>Registration</header>

		<form action="process_registration.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name" id="firstname" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Middle Name</label>
                            <input type="text" placeholder="Enter your middle name" id="middlename" name="middlename" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter your last name" id="lastname" name="lastname"required>
                        </div>

                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" placeholder="Enter your occupation" id="occupation" name="occupation" required>
                        </div>

						<div class="input-field">
							<label>Gender</label>
							<select id="gender" name="gender" required>
								<option disabled selected>Select gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Others</option>
							</select>
						</div>
                        <div class="input-field">
                            <label>Company</label>
                            <input type="text" placeholder="Enter your company name" id="company" name="company" required>
                        </div>
                    </div>
                </div>
<br>
                <div class="details ID">
                    <span class="title">Contact Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Phone Number</label>
                            <input type="number" placeholder="Enter your phone number" id="number" name="number" required>
                        </div>

                        <div class="input-field">
                            <label>Email Address</label>
                            <input type="email" placeholder="Enter your email" id="email" name="email" required>
                        </div>
                        <div class="input-field">
                        </div>
                    </div>

                    <button type="button" class="nextBtn">
                <span class="btnText">Next</span>
                <i class="uil uil-navigator"></i>
            </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Street</label>
                            <input type="text" placeholder="Permanent or Temporary" id="street" name="street" required>
                        </div>

                        <div class="input-field">
                            <label>City</label>
                            <input type="text" placeholder="Enter nationality" id="city" name="city"required>
                        </div>

                        <div class="input-field">
                            <label>Zip_code</label>
                            <input type="text" placeholder="Enter your state" id="zipcode" name="zipcode" required>
                        </div>
                    </div>
                </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button type="submit" class="submitBtn">
                <span class="btnText">Submit</span>
                <i class="uil uil-navigator"></i>
            </button>
						
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
<script>
 document.querySelector("input[type='submit']").addEventListener("click", function(event){
    event.preventDefault();
});

</script>
</body>
</html>
