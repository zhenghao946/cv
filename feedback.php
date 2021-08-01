<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Register</title>
</head>
<body>
  <h1>Feedback form</h1>
  <p class= "center">Please provide me feedback on what you think i should inprove on!</p>
  <div class = "form">
    <?php
    if(!empty($feedback_err)){
        echo '<div class="alert alert-danger">' . $feedback_err . '</div>';
    }
    ?>
    <form action="feedback_action.php" method="post">
      <p><label>Username</label>
      <input type="text" name="username" value = <?php echo $_SESSION["username"]?> readonly = "readonly"></p>
      <p><label for="email">E-mail:</label>
      <input type="email" name="email" id="userEmail" required="required" placeholder="you@yourdomain.com"></P>
      <p><label for="rating">Software Rating (1 - 10):</label>
      <input type="range" name="rating" id="userRating" min="1" max="10"></p>
      <p><label for="review">Review:</label>
      <textarea name="review" id="review" rows="2" cols="20" required="required"></textarea></p>
      <p><label for="recommend">Recommend to others?:</label><input type="checkbox" name="recommend" value="yes"></p>
      <p><input id="mySubmit" type="submit" value="Submit"></p>
    </form>
  </div>
</body>
</html>
