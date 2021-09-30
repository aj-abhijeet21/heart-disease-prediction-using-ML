<?php
session_start();

//$_SESSION['username']= "priyam@vit.edu.in";

$host='localhost';
$user = 'root';
$pass = '';
$db = 'heartprediction';
$conn = mysqli_connect($host, $user, $pass, $db) or die("Unable to connect...");

$email = $_SESSION['username'];
echo "Welcome " .$_SESSION['username']. "<br>Your report will be displayed here...<br>";



// $age = $_POST['age'];
// $query1 = "INSERT INTO medical_history (email,age) VALUES('$email', '$age')";
// $query = "UPDATE medical_history set age ='$age' WHERE email='$email'";
//     mysqli_query($conn, $query);
//     echo  $_POST['age'];

//     // if($result){echo "inserted successfully";}
//     // else{echo "error";}


?>

<!-- // <!DOCTYPE html>
// <html>
// <head>
//     <meta charset="utf-8" />
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <title>Page Title</title>
//     <meta name="viewport" content="width=device-width, initial-scale=1">
//     <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
//     <script src="main.js"></script>
// </head>
// <body><form method="post">
//     <input type = text placeholder="enter age" name="age" id="age"><br>
//     <input type = "submit" value="submit" button="submit"></form>
// </body>
// </html> -->