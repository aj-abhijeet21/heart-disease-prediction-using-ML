<?php
    session_start();
    include("connection.php");
    $temp = 0;
if(isset($_POST['submit']))
{
    $uname=$_POST['email'];
    $pass=$_POST['password'];
// 2tas
    $sql="SELECT * FROM allinfo WHERE email='".$uname."' AND password='".$pass."' limit 1";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1)
    {
        //echo "You've successfully logged in to the system";
        $_SESSION['username'] = $uname;
        header("Location: medhist.php");
   
        exit();
    }
    else
    {
        //echo "You've entered wrong details";
        //header("Location: login.php");
        global $temp;
        $temp = 1;
        //sexit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/gradient.css">

	<!--
    Template 2105 Input
	http://www.tooplate.com/view/2105-input
	-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="cont">
    <div class="container" style="margin-top: 50px; max-width: 1000px;
  margin-top: 238px;
}">
        <div class="row tm-register-row tm-mb-35">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-l">
                <form method="POST" class="tm-bg-black p-5 h-100" style="background-color: rgba(0, 0, 0, 0.7);">
                    <div class="input-field">
                        <input placeholder="Username" id="email" name="email" type="text" class="validate">
                    </div>
                    <div class="input-field mb-5">
                        <input placeholder="Password" id="password" name="password" type="password" class="validate">
                    </div>

                  

                    <div class="tm-flex-lr">


                        <button type="submit" name="submit" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">Login</button>
                    <?php global $temp;
                        if($temp == 1){ ?>
                        <p style="color:red;"><b>Wrong credentials entered!!!</b></p>
                        <?php } ?>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 tm-login-r">
                <header class="font-weight-light tm-bg-black p-5 h-100" style="background-color: rgba(0, 0, 0, 0.7);">
                    <h3 class="mt-0 text-white font-weight-light">Your Login</h3>
                    <p>Pick up where you let off!</p>
                    <p class="mb-0">Log in to your account to see your details</p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 ml-auto mr-0 text-center">
                <a href="signup.php" class="waves-effect btn-large btn-large-white px-4 black-text rounded-0">Create New Account</a>
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
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>