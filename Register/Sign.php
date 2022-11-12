<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register Yourself!</title>
  <link rel="stylesheet" href="css/style2.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <form action="thankyou.php" method = "POST">
  <div id="signimg" class="container" data-aos="fade-up">
    <h1 align="center">Register</h1>
    <p align="center">Register yourself by providing your details in this form!</p>
    <hr >

    <label for="firstname"><b>First Name</b></label><br>
    <input type="text" placeholder="Enter Your First Name" name="firstname" required><br>

    <label for="lastname"><b>Last Name</b></label><br>
    <input type="text" placeholder="Enter Your Last Name" name="lastname" required><br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" required><br>

    <label for="phone"><b>Phone Number</b></label><br>
    <input type="text" placeholder="Enter Phone Number" name="phone" required><br>

    <p>By submitting this form you agree to our <a href="#" style="color:dodgerblue">Terms & Conditions</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" style="background-color:#f44336">Cancel</button>
      <input type="submit" class="signupbtn" name="reg_user" value="Submit">
    </div>
  </div>
  </form>
</body>
</html>

