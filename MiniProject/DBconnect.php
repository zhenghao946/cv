<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_personal_site";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn == false){
  die("Connection failed : " .mysqli_connect_error());
}
?>
