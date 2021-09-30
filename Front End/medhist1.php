<?php
session_start();
include("connection.php");
if ( isset( $_SESSION['username'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
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
            $query = "INSERT INTO users(title, f_name, l_name, dob, address, district, city, state, zip) VALUES('$title', '$fname', '$lname', '$dob', '$address', '$district', '$city', '$state', '$zip') WHERE username= '$uname'";
            mysqli_query($conn, $query);
            header('location: report.php');
        }
} 
else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical History</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>
<body id="medhist">
<!--  style="padding-top: 180px;
background-image: url(../img/medhist.jpg);
background-size: cover;
background-repeat: no-repeat;
background-position: 50% 30%;
color: black;"> -->
    <div class="container">
    <header class="font-weight-light tm-bg-black p-5 h-100" style="background-color: rgba(0, 0, 0, 0.7);">
                    <h3 class="mt-0 text-white font-weight-light">Medical History</h3>
                    <p class="mb-0">Enter your medical details</p>
    </header>
        <div class="row tm-register-row">
                <div style="background-color: rgba(0, 0, 0, 0.8);" class="col-xl-9 col-lg-9 col-md-9 col-sm-12  tm-bg-black tm-form-block" >
                <form action="" method="post">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Age" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                        <p class="mb-4" style="color:white;">Sex</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" name="diabeties" type="radio" />
                                <span>Male</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="validate" name="diabeties" type="radio" />
                                <span>Female</span>
                                </label>
                        </li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                        <div class="row">
                            <select name="state">
                                <option value="-">Blood Group</option>
                                <option value="Maharashtra">A+</option>
                                <option value="Andaman and Nicobar Islands">B+</option>
                                <option value="Andhra Pradesh">AB+</option>
                                <option value="Arunachal Pradesh">O+</option>
                                <option value="Assam">A-</option>
                                <option value="Bihar">B-</option>
                                <option value="Chandigarh">AB-</option>
                                <option value="Chhattisgarh">O-</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Cholestrol" id="last_name" name="last_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Chest pain type" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Resting blood pressure" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Max. heart rate" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Electro-cardiographic" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Exercise induced angina" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Old peak" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Ca" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Thal" id="first_name" name="first_name" type="text" class="validate">
                        </div>
                    </div>
                    <div class="input-field">
                        <p class="mb-4" style="color:white;">Do you have diabeties?</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" name="diabeties" value="yes" type="radio" />
                                <span>Yes, I'm a Diabeties Patient</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="with-gap" name="diabeties" value="no" type="radio" />
                                <span>No, I'm not a Diabeties Patient</span>
                                </label>
                        </li>
                        </ul>
                    </div>
                    <div class="input-field">
                        
                            <p class="mb-4" style="color:white;">Do you smoke?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="smoking" value="yes" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="smoking" value="no" type="radio" />
                                    <span>No</span>
                                    </label>
                            </li>
                            <li>
                                    <div class="input-field" id="smoking_text"  hidden="true" >
                                        <input placeholder="How much cigarattes per day?" type="number" name="attacks_no">
                                    </div>
                            </li>
                            </ul>
                    </div>
                    <div class="input-field">
                            <p class="mb-4" style="color:white;">Do you have received any attack earlier?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="attacks" value="yes" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="attacks" value="no" type="radio" />
                                    <span>No</span>
                                    </label>
                            </li>
                            <li>
                                    <div class="input-field" id="attacks_text" style="color: aliceblue" hidden="true">
                                        <input placeholder="If yes, enter the number of attacks" type="number" name="attacks_no" >
                                    </div>
                            </li>
                            </ul>
                    </div>

                    <div class="input-field">
                            <p class="mb-4" style="color:white;">Do you exercise daily?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="exercise" value="yes" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="exercise" value="no" type="radio" />
                                    <span>No</span>
                                    </label>
                            </li>
                            </ul>
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" class="waves-effect btn-large btn-large-white px-4 black-text">SUBMIT</button>
                    </div>
                </form>
            </div>
            <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 tm-register-col-r">
                <header class="mb-5">
                    <h3 class="mt-0 text-white">MEDICAL HISTORY</h3>
                    <p  style="font-size: 30px; color:black; text-shadow: 0 0 3px #FF0000;" >Answer simple medical questions related to your health </p>
                     <p  style="font-size: 30px;
                    font-family: 'Futura';
                    color: #fff;
                    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff0080, 0 0 30px #ff0080, 0 0 40px #ff0080, 0 0 55px #ff0080, 0 0 75px #ff0080;
                    text-align: center;" >
                    HEALTH is like
                    MONEY<br> We never have a
                    true idea of its
                    VALUE until we
                    LOSE it.</p> -->
                </header>

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
        
        $(function() {
    $('input[name="attacks"]').on('click', function() {
        if ($(this).val() == 'yes') {
            $('#attacks_text').show();
        }
        else {
            $('#attacks_text').hide();
        }
    });
});

$(function() {
    $('input[name="smoking"]').on('click', function() {
        if ($(this).val() == 'yes') {
            $('#smoking_text').show();
        }
        else {
            $('#smoking_text').hide();
        }
    });
});

    </script>
</body>

</html>