<?php
  session_start();
  $email="";
  $firstname="";
  $lastname="";
  $errors = array(); 

  $db = mysqli_connect('localhost', 'root', '', 'tiffin');

  if (isset($_POST['reg_user'])) 
  {
    // receive all input values from the form
    $firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname   = mysqli_real_escape_string($db, $_POST['lastname']);
    $email      = mysqli_real_escape_string($db, $_POST['email']);
    $phone        = mysqli_real_escape_string($db, $_POST['phone']);
    
    $query      = "INSERT INTO users(firstname, lastname, email, phone) 
                   VALUES('$firstname', '$lastname', '$email', '$phone')";

    mysqli_query($db, $query);

    $user_id                  =  mysqli_insert_id($db); 

      $_SESSION['user_id']    = $user_id;
      $_SESSION['email']      = $email;
      $_SESSION['firstname']  = $firstname;
      $_SESSION['lastname']   = $lastname;
      $_SESSION['phone']   = $phone;
      $_SESSION['success']    = "You are now logged in";
      //header("location:thankyou.php");
  }

  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Thankyou!</title>
  <link rel="stylesheet" href="css/thank.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div class="thanks" data-aos="fade-up">
    <h1> Hello, <?php echo $_SESSION['firstname']; ?>!</h1>
    <div class="clearfix">
       <?php 
       if (isset($_POST['reg_user'])) 
       { ?>
          <h2>You have submitted your details. We will get in touch with you shortly!</h2>
          <a href="../index.php" style="color: lightblue; font-size: 25px;">Go back to homepage</a>
        <?php 
       }
       else{ ?>
        <h2>Your Profile is saved!</h2>
        <a href="action.php">Click here to Dashboard </a>
       <?php } ?>
      ?>
    </div>
  </div>
</body>
</html>

