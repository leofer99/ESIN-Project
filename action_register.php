<?php
  session_start();

  require_once('database/init.php');
  require_once('database/insert.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];

  if (strlen($name) == 0) {
    $_SESSION['msg'] = 'Invalid Name!';
    header('Location: registration.php');
    die();
  }

  if (strlen($email) == 0) {
    $_SESSION['msg'] = 'Invalid Email!';
    header('Location: registration.php');
    die();
  }

  if (strlen($phone_number) < 9) {
    $_SESSION['msg'] = 'Phone number must have at least 9 digits.';
    header('Location: registration.php');
    die();
  }
  
  try {
    $success= insertNewcomer($name, $email, $phone_number);
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