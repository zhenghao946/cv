<?php
session_start();
include("DBconnect.php");

$register_err = "";
$username = $password = $usernamelength = $passwordlength = $pwsame = "";
//login values from login form
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $usernamelength = strlen($_POST["username"]);
  $passwordlength = strlen($_POST["password"]);
  if(empty(trim($_POST["username"])) || empty(trim($_POST["password"])) || empty(trim($_POST["comfirm_password"]))){
    if(empty(trim($_POST["username"])))
      $register_err = "Please enter username";
    else if(empty(trim($_POST["password"])))
      $register_err = "Please enter password";
    else if(empty(trim($_POST["comfirm_password"])))
      $register_err = "Please comfirm password";
  } else{
    if($usernamelength < 6 || $usernamelength > 15 || !preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
      $register_err = "Username must be between 6 and 15 characters. Can only contain letters, numbers, and underscores.";
    } else
      $username = trim($_POST['username']);
    if(trim($_POST["password"]) != trim($_POST["comfirm_password"])){
      $register_err = "Password and comfirm password do not match";
    } else if($passwordlength < 6){
      $register_err = "Password must be at least 6 characters";
    } else
      $pwsame = true;
      $password = trim($_POST['password']);
  }

  if(!empty($username) && !empty($password) && $pwsame == true){
    $sql = "SELECT * from customer where CUS_NAME = '$username' LIMIT 1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
      $register_err = "Username exist, please enter another username.";
    } else {
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO customer (CUS_NAME, PWD_HASH) VALUES ('" .$username. "' , '".$password_hash."')";
      if(mysqli_query($conn, $sql)){
        $_SESSION["registered"] = true;
        header("location: welcome.php");
        mysqli_close($conn);
        session_unset();
        session_destroy();
      } else{
        $register_err = "Error registering for the account, please try again.";
      }
    }
  }
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="style.css">
<title>Register</title>
</head>
<body>
  <h1 class = "center">Register</h1>
  <p class = "center">Please fill in your credentials.</p>
  <div class = "form">
    <form action="reg.php" method="post">
      <p><label>Username</label><input type="text" name="username" ></p>
      <p><label>Password</label><input type="password" name="password"></p>
      <p><label>Comfirm password</label><input type="password" name="comfirm_password"></p>
      <?php
      if(!empty($register_err)){
        echo '<div class="error">' . $register_err . '</div>';
      }
      ?>
      <p><input type="submit" class = "center" value="Register"></p>
      <p class = "center"><a href="index.php">Home</a></p>
    </form>
  </div>
</body>
</html>
