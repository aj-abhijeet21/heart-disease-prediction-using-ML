<?php
session_start();
$msg = $_SESSION['msg'];
$user = 'root';
$pass = '';
$db = 'test';
$conn = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect...");
echo "welcome " .$msg;
$sql="SELECT * FROM login WHERE username='".$msg."' limit 1";
$result = mysqli_query($conn, $sql);
$r = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "username: " . $row["username"]. "<br>";
    }
}
?>