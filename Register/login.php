<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <form action="action.php" method = "POST">
  <div id="signimg" class="container" data-aos="fade-up">
    <h1 align="center">Employee Login</h1>
    <p align="center">Login to view your Company Dashboard</p>
    <hr >

    <label for="emp_id"><b>Employee ID</b></label><br>
    <input type="text" placeholder="Enter Your Employee ID" name="emp_id" required><br>

    <label for="pwd"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Your Password" name="pwd" required><br>

    <p><a href="#" style="color:pink">Forgot Password?</a></p>

    <div class="clearfix">
      <input type="submit" class="signupbtn" name="sign_user" value="Sign-in">
    </div>
  </div>
  </form>
</body>
</html>