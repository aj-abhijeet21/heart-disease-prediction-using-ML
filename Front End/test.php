 <?php
session_start();
$user = 'root';
$pass = '';
$db = 'test';
$conn = mysqli_connect('localhost', $user, $pass, $db) or die("Unaable to connect...");
echo "great work!!!";
$_SESSION['msg']= 'abhijeet';
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// if (!mysqli_select_db($conn, $db))     
// {    
// die("Unable to select database: " . mysqli_error()); 
// }
// echo "Connected successfully";
?>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SESSION DATA SEND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <a href="create_session.php">Click here...</a>
</body>
</html>>