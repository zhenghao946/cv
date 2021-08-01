<?php
session_start();
require_once "DBconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "style.css">
  <title>Welcome</title>
</head>
<body>
  <h1>Zheng House</h1>
  <?php
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<div class = "usernav">' .$_SESSION["username"]. '<a href="logout.php">Logout</a></div>';
  } else{
    echo '<div class = "usernav"><a href="login.php">Login</a> | <a href="reg.php">Register</a> </div>';
  }
  include "index.html";
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    include "feedback.php";
  } else{
    echo '<p class="center"><h3 class="center">Please login to help fill up a feedback form.</h3></p>';
  }
  ?>
  <footer>
    <br><br>
    <div><small>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></small></div>
    <small><i>Copyright Liew Zheng Hao 2021</i></small>
  </footer>
</body>
</html>
