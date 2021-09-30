<?php
include("connection.php");
session_start();

$uname = $_SESSION['username'];
if (isset($_POST['register'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $query = "INSERT INTO users(title, f_name, l_name, dob, address, district, city, state, zip) VALUES('$title', '$fname', '$lname', '$dob', '$address', '$district', '$city', '$state', '$zip') WHERE email = '".$uname."' ";
    mysqli_query($conn, $query);
    $_SESSION['username'] = $uname;

    $query = "INSERT INTO users (title, f_name, l_name, dob, address, district, city, state, zip) 
                  VALUES('$title', '$fname', '$lname', '$dob', '$address', '$district', '$city', '$state', '$zip')";

    
    header('location: medhist.php');
    }
  



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete your user profile</title>
	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="register">
    <div class="container">
        <div class="row tm-register-row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-register-col-l">
                <form action="register.php" method="post">
                    <div class="mb-2">
                        <label class="mr-4">
                            <input class="with-gap" name="title" type="radio" value="mr" />
                            <span>Mr.</span>
                        </label>
                        <label class="mr-4">
                            <input class="with-gap" name="title" type="radio" value="ms" />
                            <span>Ms.</span>
                        </label>
                        <label>
                            <input class="with-gap" name="title" type="radio" value="mrs" />
                            <span>Mrs.</span>
                        </label>
                    </div>

                    <div class="input-field">
                        <label>
                            <?php echo "Welcome user" .$_SESSION['username']; ?>
                        </label>
                    </div>

                    <div class="input-field">
                        <input placeholder="First Name" id="first_name" name="first_name" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Last Name" id="last_name" name="last_name" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Username" id="email" name="email" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Mobile" id="mobile" name="mobile" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <label>Date of Birth:</label>
                        <input placeholder="DOB" type="date" name="dob" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="Address" id="address" name="address" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="City" id="city" name="city" type="text" class="validate">
                    </div>
                    <div class="input-field">
                        <input placeholder="District/Province" id="district" name="district" type="text" class="validate">
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pl-0 tm-pr-xs-0">
                            <select name="state">
                                <option value="-">Your State</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                            <div class="input-field">
                                <input placeholder="Zip Code" id="zipcode" name="zipcode" type="text" class="validate">
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" name="register" class="waves-effect btn-large btn-large-white px-4 black-text">SUBMIT</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-register-col-r">
                

            <div class="sign">
            <span class="sign word">complete</span>
            <span class="sign word">your</span>
            <span class="sign word">profile</span>
            </div>
    
    

            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12 text-center font-weight-light">
                <p class="d-inline-block tm-bg-black white-text py-2 tm-px-5">
                    Made with <span style="color: #e25555;">&#9829;</span> at VIT 
                    <!-- Made with <i class="icon ion-heart"></i> at VIT -->
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>