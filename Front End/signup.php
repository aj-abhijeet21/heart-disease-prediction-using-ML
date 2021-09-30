<?php
session_start();
include("connection.php");
if (isset($_POST['reg_user']))
{
    // receive all input values from the form
    //$username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zipcode']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding grey-text2 unto $grey-text2s array
    // if (empty($username)) { array_push($grey-text2s, "Username is "); }
    // if (empty($email)) { array_push($grey-text2s, "Email is "); }
    // if (empty($password_1)) { array_push($grey-text2s, "Password is "); }
    // if ($password_1 != $password_2) {
    //   array_push($grey-text2s, "The two passwords do not match");
    // }
 
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM allinfo WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
 
      if ($user['email'] === $email) {
        //array_push($grey-text2s, "email already exists");
      }
   
 
    // Finally, register user if there are no grey-text2s in the form
    //if (count($grey-text2s) == 0) {
        $password = md5($password1);//encrypt the password before saving in the database
 
       
        $query = "INSERT INTO allinfo (password, email, phone, f_name, l_name, dob, address, city, state, zip)
                  VALUES('$password1', '$email', '$phone', '$fname', '$lname', '$dob', '$address','$city', '$state', '$zip')";
        mysqli_query($conn, $query);
        //$query1 = "INSERT INTO medical_history (email) VALUES('$email')";
        //mysqli_query($conn, $query1);

        // $uname = $_POST['username'];
        $url = "login.php";
        $_SESSION['username'] = $email;
        // $_SESSION['success'] = "You are now logged in";
        //header('location: ' . $url);
    //}
 
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
    
</head>

<body id="register" style="padding-top: 80px;padding-right: 50px;padding-left: 50px;">
    <div class="container" >
        <div class="row tm-bg-black" style="padding-top: 80px;padding-right: 50px;padding-left: 50px;">
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12">
                <header class="mb-5">
                    <h3 class="mt-0 white-text">Create an account</h3>
                    <p class="white-text mb-4">MyHeartLife is a personal Heart management dashboard designed to help you manage your health and wellbeing. It provides a number of heart disease symptoms, information and recommendations tailored to you. It's your free, personal and secure health dashboard. Sign up and become a member today.</p>
                    <p class="white-text"> Already have an account?</p>
<!--                     <p class="grey-text"> Click <a href= "login.php">here</a> to login</p>
 -->                    <a href= "login.php"><button class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0" >Login</button></a>
                   
                </header>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-6 col-sm-12 ">
                <!-- //////////////////////////////////////////////////////////////////////////////////// -->
                <form  method="post" class="tm-signup-form " name="signup"  >
                    <!-- <div class="input-field">
                        <input placeholder="Username" id="username" name="username" type="text" class="validate" >
                        <label class="grey-text2"></label>
                    </div> -->
                    <div class="input-field" >
                        <input placeholder="Username" id="email" name="email" type="text" class="validate" data-toggle="tooltip" data-placement="right" title="Please enter a username">
                        <p class="grey-username" style="color: red; font-style: italic;"></p> 

                    </div>
                    <div class="input-field">
                        <input placeholder="Password" id="password1" name="password1" type="password" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="Re-type Password" id="password2" name="password2" type="password" class="validate" onkeyup='check();' >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="Phone" id="phone" name="phone" type="tel" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="First Name" id="first_name" name="first_name" type="text" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="Last Name" id="last_name" name="last_name" type="text" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <label>Date of Birth:</label>
                        <input placeholder="DOB" type="date" id="dob" name="dob" class="validate" max="2000-12-31" value="2000-01-01"
>
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="Address" id="address" name="address" type="text" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                    </div>
                    <div class="input-field">
                        <input placeholder="City" id="city" name="city" type="text" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
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
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pr-0 tm-pl-xs-0">
                            <div class="input-field">
                                <input placeholder="Zip Code" id="zipcode" name="zipcode" type="text" class="validate" >
                        <p class="grey-username" style="color: red; font-style: italic;"></p>
                            </div>
                        </div>
                    <label>
                        <input type="checkbox" name="disclaimer" class="filled-in" checked="false" />
                        <span>I agree to Terms & Conditions</span>
                        <p class="grey-username" style="color: red; font-style: italic;"></p>

                    </label>                   
                    <div class="text-right mt-4">
                        <button type="button" name="reg_user" onclick="ValidateForm();" class="waves-effect btn-large btn-large-white px-4 tm-border-radius-0">Sign Up</button>
                    </div>
                </form>
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
    <script src="js/validate.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('select').formSelect();
            $('[data-toggle="tooltip"]').tooltip(); 
        });
       
    </script>
    <script>
    var check = function() {
      if (document.getElementById('password1').value ==
          document.getElementById('password2').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'matching';
      } else {
              document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'not matching';
      }

      if(document.getElementById('email') == ""){
                  document.getElementById('grey-username').innerHTML = 'blank username';

      }
  }
    </script>
</body>

</html>