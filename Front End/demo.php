<?php
include("connection.php");
session_start();
$_SESSION['username'] = "okb1998@gmail.com";
if ( isset( $_SESSION['username'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
     //   $uname = $_SESSION['username'];
     $mail = $_SESSION['username'];

if (isset($_POST['submit'])) {
    // receive all input values from the form
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $cholestrol = mysqli_real_escape_string($conn, $_POST['cholestrol']);
    $chest_pain = mysqli_real_escape_string($conn, $_POST['chest_pain']);
    $rblood_sugar = mysqli_real_escape_string($conn, $_POST['rblood_pressure']);
    $heart_rate = mysqli_real_escape_string($conn, $_POST['heart_rate']);
    $ecg = mysqli_real_escape_string($conn, $_POST['ecg']);
    $angina = mysqli_real_escape_string($conn, $_POST['angina']);
    $oldpeak = mysqli_real_escape_string($conn, $_POST['oldpeak']);
	$ca = mysqli_real_escape_string($conn, $_POST['ca']);
	$thal = mysqli_real_escape_string($conn, $_POST['thal']);
	$diabeties = mysqli_real_escape_string($conn, $_POST['diabeties']);
	$fblood_sugar = mysqli_real_escape_string($conn, $_POST['fblood_sugar']);
	$slope = mysqli_real_escape_string($conn, $_POST['slope']);
	$smoke = mysqli_real_escape_string($conn, $_POST['smoke']);
	$attack = mysqli_real_escape_string($conn, $_POST['attack']);
    $exercise = mysqli_real_escape_string($conn, $_POST['exercise']);
    $query = "UPDATE medical_history SET age='$age',sex='$sex',blood_group='$blood_group',cholestrol='$cholestrol',fblood_sugar='$fblood_sugar',rblood_sugar='$rblood_sugar',chest_pain='$chest_pain',heart_rate='$heart_rate',ecg='$ecg',angina='$angina',slope='$slope',oldpeak='$oldpeak',thal='$oldpeak',smoke='$smoke',diabeties='$diabeties',attack='$attack',exercise='$exercise', WHERE username = 'aj21'";
    $result = mysqli_query($conn, $query);
    if($result)
    {header('location: report.php');}
    else
    {
        echo "Number of rows affected: " . mysqli_affected_rows($conn) . "<br>";
        die('Could not update data: ' . mysqli_error($conn));}
}
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
                    <p class="mb-0" style="color: white;">Welcome <?php $email = $_SESSION['username']; echo $email;?>, enter your medical details</p>
    </header>
        <div class="row tm-register-row">
            <div style="background-color: rgba(0, 0, 0, 0.8);" class="col-xl-9 col-lg-9 col-md-9 col-sm-12  tm-bg-black tm-form-block" >
                <form method="post" action="">
                <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                            <input placeholder="Age" id="age" name="age" type="number" min = "13" max = "110" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                        <p class="mb-4" style="color:white;">Sex</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" value="1" name="sex" type="radio" />
                                <span>Male</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="validate" value="0" name="sex" type="radio" />
                                <span>Female</span>
                                </label>
                        </li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                        <div class="row">
                            <select name="blood_group">
                                <option value="-">Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="AB+">AB+</option>
                                <option value="O+">O+</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="AB-">AB-</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                            <input placeholder="Cholestrol" id="cholestrol" name="cholestrol" type="number" max = "" min = "" class="validate">
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                             <div class="row">
                            <select name="chest_pain">
                                <option value="-">Chest pain type</option>
                                <option value="1">Typical angina</option>
                                <option value="2">Atypical angina</option>
                                <option value="3">Non-anginal pain</option>
                                <option value="4">Asymptomatic</option>
                            </select>
                        </div>
                        </div>
                    </div>
					<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                    <!-- <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                            <input placeholder="fasting blood sugar" id="fblood_sugar" name="fbs" type="number" min="0" max="1" class="validate">
                        </div>
                    </div> -->

                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                             <div class="row">
                            <select name="fblood_sugar">
                                <option value="-">fasting blood sugar</option>
                                <option value="0"> less than 120mg/dL </option>
                                <option value="1"> greater than 120mg/dL </option>
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                        <div class="input-field">
                            <input placeholder="Resting blood pressure" id="rblood_pressure" name="rblood_pressure" type="number" min="94" max="200" class="validate">
                        </div>
                    </div>
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">    
                        <div class="input-field">
                            <input placeholder="Max. heart rate" id="heart_rate" name="heart_rate" type="number" min="71" max="202" class="validate">
                        </div>
                    </div>
                    <!-- <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                        <div class="input-field">
                            <input placeholder="Electro-cardiographic" id="ecg" name="ecg" type="number" min="0" max="2" class="validate">
                        </div>
                    </div> -->

                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                             <div class="row">
                            <select name="ecg">
                                <option value="-">Electro-cardiograph</option>
                                <option value="0"> Normal</option>
                                <option value="1"> Having ST-T wave abnormality </option>
                                <option value="2"> Having LV hypertrophy </option>
                            </select>
                        </div>
                        </div>
                    </div>


                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                        <div class="input-field">
						 <p class="mb-4" style="color:white;">Exercise induced angina</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" name="angina" value="1" type="radio" />
                                <span>Yes</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="with-gap" name="angina" value="0" type="radio" />
                                <span>No</span>
                                </label>
                        </li>
                        </ul>
                       </div>
					   </div>
					   <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                       <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
						 <p class="mb-4" style="color:white;">Slope</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" name="slope" value="1" type="radio" />
                                <span>Upslopping</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="validate" name="slope" value="2" type="radio" />
                                <span>Flat</span>
                                </label>
                        </li>
						 <li>    <label>
                                <input class="validate" name="slope" value="3" type="radio" />
                                <span>Downslopping</span>
                                </label>
                        </li>
                        </ul>
                    </div>
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
                            <input placeholder="Old peak" id="oldpeak" name="oldpeak" type="number" max="10" min="1" class="validate">
                        </div>
                    </div>
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="input-field">
		                    <div class="row">
                            <select name="ca">
                                <option value="-">No. of major vessels colored by fluroscopy</option>
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0"> -->
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                       <div class="input-field">
                       <div class="row">
                            <select name="thal">
                                <option value="-">Thal</option>
                                <option value="3">Normal</option>
                                <option value="6">Fixed defect</option>
                                <option value="7">Reversible defect</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field">
                        
                            <p class="mb-4" style="color:white;">Do you smoke?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="smoke" value="1" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="smoke" value="0" type="radio" />
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
					</div>
					<p class="mb-4" style="color:white;">Do you have diabeties?</p>
                        <ul class="ml-3">                     
                        <li>    <label>
                                <input class="validate" name="diabeties" value="1" type="radio" />
                                <span>Yes, I'm a Diabeties Patient</span>
                                </label>
                        </li>

                        <li>    <label>
                                <input class="with-gap" name="diabeties" value="0" type="radio" />
                                <span>No, I'm not a Diabeties Patient</span>
                                </label>
                        </li>
                        </ul>
                    <div class="input-field">
                            <p class="mb-4" style="color:white;">Do you have received any attack earlier?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="attack" value="1" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="attack" value="0" type="radio" />
                                    <span>No</span>
                                    </label>
                            </li>
                            <!--<li>
                                    <div class="input-field" id="attacks_text" style="color: aliceblue" hidden="true">
                                        <input placeholder="If yes, enter the number of attacks" type="number" name="attacks_no" >
                                    </div>
                            </li>
                            </ul>!-->
                    </div>

                    <div class="input-field">
                            <p class="mb-4" style="color:white;">Do you exercise daily?</p>
                            <ul class="ml-3">                     
                            <li>    <label>
                                    <input class="validate" name="exercise" value="1" type="radio" />
                                    <span>Yes</span>
                                    </label>
                            </li>
    
                            <li>    <label>
                                    <input class="with-gap" name="exercise" value="0" type="radio" />
                                    <span>No</span>
                                    </label>
                            </li>
                            </ul>
                    </div>
                    <div class="text-right mt-4">
                        <button name="submit" value="submit" type="submit" class="waves-effect btn-large btn-large-white px-4 black-text">SUBMIT</button>
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
    
    </script>
</body>
</html> 