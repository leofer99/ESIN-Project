<?php
  session_start();

  if (isset($_SESSION['login_id'])) {  //appears when user has already done the login
    $_SESSION['msg'] = "You're already logged in as" . $_SESSION['username']."!";
  }

  else {

    // get username and password from HTTP parameters
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];

    // check if username and password are correct
    function loginSuccess($login_id, $password) {
      global $dbh;
      $stmt = $dbh->prepare('SELECT login_id, login_password FROM Member WHERE login_id = ? AND login_password = ?');
      $stmt->execute(array($login_id, $password));
      return $stmt->fetch();
    }

    // if login successful:
    // - create a new session attribute for the user
    // - redirect user to main page
    // else:
    // - set error msg "Login failed!"
    // - redirect user to main page

    try {
      $dbh = new PDO('sqlite:sql/project_.db');
      $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if (loginSuccess($login_id, $password)) {
        $_SESSION['login_id'] = $login_id;
        $_SESSION['msg'] = 'Successful login!';
      
      //finds username based on specific login_id:
        $stmt = $dbh->prepare('SELECT name 
          FROM Person
          JOIN Member ON member.id=person.id
      WHERE member.login_id=?;');

      $stmt->execute(array($login_id));
      $result = $stmt->fetch();
      $username = $result['name'];
      $_SESSION['username']=$username;
        
      } else {
        $_SESSION['msg'] = 'Invalid username or password!';
        }

    } catch (PDOException $e) {
      $_SESSION['msg'] = 'Error: ' . $e->getMessage();
    }
  header('Location: project_login.php');
  }
  
?>
