<?php

session_start();

$email="";
$name="";
$dob="";
$gen="";
$age="";
$height="";
$weight="";
$targetweight="";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['reg_user'])) 
{
	// receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['psw']);
  $password_2 = mysqli_real_escape_string($db, $_POST['pswrepeat']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) 
  {
	array_push($errors, "The two passwords do not match");
  }

   // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) 
  { // if user exists
    if ($user['email'] === $email) 
    {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (email, password) 
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: Sign2.php');
  }
}

if (isset($_POST['abt_user'])) 
{
	// receive all input values from the Almost there form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $gen = mysqli_real_escape_string($db, $_POST['gen']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $targetweight = mysqli_real_escape_string($db, $_POST['targetweight']);

  if (empty($name)) {
    array_push($errors, "Username is required");
  }

	if (count($errors) == 0) 
	{
  // Finally, register user if there are no errors in the form
  	$query = "INSERT INTO users (name, gen, dob, age, height, weight, targetweight) 
  			  VALUES('$name', '$gen', '$dob', '$age', '$height', '$weight', '$targetweight')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['gen'] = $gen;
  	$_SESSION['dob'] = $dob;
  	$_SESSION['age'] = $age;
  	$_SESSION['height'] = $height;
  	$_SESSION['weight'] = $weight;
  	$_SESSION['targetweight'] = $targetweight;
  	header('location: action.php');
  	}
}
?>