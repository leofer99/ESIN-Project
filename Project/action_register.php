<?php
  session_start();

  require_once('database/init.php');
  require_once('database/insert.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $joined_date = $_POST['joined_date'];
  $login_password = $_POST['login_password'];

  if (strlen($name) == 0) {
    $_SESSION['msg'] = 'Invalid Name!';
    header('Location: project_login.php');
    die();
  }

  if (strlen($email) == 0) {
    $_SESSION['msg'] = 'Invalid Email!';
    header('Location: project_login.php');
    die();
  }

  if (strlen($phone_number) < 9) {
    $_SESSION['msg'] = 'Phone number must have at least 9 digits.';
    header('Location: project_login.php');
    die();
  }

  if ( $gender!="female" && $gender!="male" && $gender!="other") {
    $_SESSION['msg'] = 'Gender must be either "male", "female" or "other".';
    header('Location: project_login.php');
    die();
  }

  if (strlen($city) < 3 ) {
    $_SESSION['msg'] = 'City must have at least 3 digits.';
    header('Location: project_login.php');
    die();
  }

  if (strlen($joined_date) < 8 ) {
    $_SESSION['msg'] = 'Joined date must have at least 8 digits.';
    header('Location: project_login.php');
    die();
  }

  if (strlen($login_password) < 3 ) {
    $_SESSION['msg'] = 'Login_id date must have at least 3 digits.';
    header('Location: project_login.php');
    die();
  }

  
  try {
   
    $success= insertNewcomer($name, $email, $phone_number, $gender, $city, $joined_date, $login_password);
    //var_dump($success);
    if ($success) {
    $_SESSION['msg'] = 'Registration successful!';
    }
    header('Location: project_login.php');
    
  } catch (PDOException $e) {
    $error_msg = $e->getMessage();

    if (strpos($error_msg, 'UNIQUE')) {
      $_SESSION['msg'] = 'This registration information already exists!';
    } else {
      $_SESSION['msg'] = "Registration failed! ($error_msg)";
    }
    header('Location: project_login.php');
  }
?>