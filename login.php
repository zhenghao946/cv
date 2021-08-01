<?php
session_start();
include("DBconnect.php");

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}

$login_err = "";
//login values from login form
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"])) || empty(trim($_POST["password"]))){
    if(empty(trim($_POST["username"])))
      $login_err = "Please key in username.";
    if(empty(trim($_POST["password"])))
      $login_err = "Please key in password.";
  } else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  $sql = "SELECT * FROM customer WHERE CUS_NAME='$username' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1) {
    //check password hash
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password,$row['PWD_HASH'])) {
      $_SESSION["loggedin"] = true;
      //echo 'Pwd Verified'; // password_verify success!
    	$_SESSION["UID"] = $row["CUS_ID"];//the first record set, bind to userID
    	$_SESSION["username"] = $row["CUS_NAME"];
    	header("location:index.php");
    } else {
      $login_err = 'Login error, username or password is incorrect.';
    }
  } else {
    $login_err = "Login error, username does not exist.";
  }
}
mysqli_close($conn);
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>
      <h1 class = "center">Login</h1>
      <p class = "center">Please fill in your credentials to login.</p>
      <div class = "form">
      <form action="login.php" method="post">
        <p><label>Username</label><input type="text" name="username"></p>
        <p><label>Password</label><input type="password" name="password"></p>
        <?php
        if(!empty($login_err)){
          echo '<div class="error">' . $login_err . '</div>';
        }
        ?>
        <p><input type="submit" class = "center" value="Login"></p>
        <p>Don't have an account? <a href="reg.php">Sign up now</a>.</p>
        <p class = "center"><a href="index.php">Home</a></p>
      </form>
    </div>

</body>
</html>
