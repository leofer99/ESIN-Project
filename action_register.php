<?php
//vale a pena ter um register??
//pode registar infos inclusive gender, city, etc
//mas ser aceite pelo admin?

  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  function insertUser($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Member (login_id, password) VALUES (?, ?)');
    $stmt->execute(array($username, hash('sha256', $password)));
  }

  if (strlen($username) == 0) {
    $_SESSION['msg'] = 'Invalid username!';
    header('Location: project_login.php');
    die();
  }

  if (strlen($password) < 8) {
    $_SESSION['msg'] = 'Password must have at least 8 characters.';
    header('Location: project_login.php');
    die();
  }

  try {
    $dbh = new PDO('sqlite:sql/project_.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    insertUser($username, $password);
    $_SESSION['msg'] = 'Registration successful!';
    header('Location: project_login.php');
  } catch (PDOException $e) {
    $error_msg = $e->getMessage();

    if (strpos($error_msg, 'UNIQUE')) {
      $_SESSION['msg'] = 'Username already exists!';
    } else {
      $_SESSION['msg'] = "Registration failed! ($error_msg)";
    }
    header('Location: project_login.php');
  }
?>