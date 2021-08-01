<?php
include("DBconnect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $email = $rating = $review = $recommend= "";
  $review_err = "";

  $username = $_POST["username"];
  $email = $_POST["email"];
  $rating = $_POST["rating"];
  $review = $_POST["review"];
  if(isset($_POST["recommend"]) && $_POST["recommend"] == true){
    $recommend = 1;
  } else{
    $recommend = 0;
  }

  $sql = "SELECT * FROM review WHERE CUS_NAME='$username' LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){
    $sql = "UPDATE review SET CUS_EMAIL = '$email', CUS_RATING = '$rating', CUS_REVIEW = '$review', CUS_RECOM = $recommend
    WHERE CUS_NAME = '$username'";
    if(mysqli_query($conn, $sql)){
      $review_err = "Review is updated. Thank you for providing us your opinions!";
    } else{
      $review_err = "Failed to update";
    }
  } else{
    $sql = "INSERT INTO review VALUES('$username', '$email', '$rating', '$review', '$recommend')";
    if(mysqli_query($conn, $sql)){
      $review_err = "Review is created. Thank you for providing us your opinions!";
    } else{
      $review_err = "Failed to create review";
    }
  }
} else{
  echo "sohai";
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="style.css">
<title>Software Review</title>
<body>
  <?php
  if(!empty($review_err)){
    echo '<div class = "center"><h2>' . $review_err . '<h2></div>';
  }
  ?>

  <p class = "center"><a href="index.php">Home</h3></p>
</body>
