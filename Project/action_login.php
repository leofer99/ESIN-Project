<?php
  session_start();

  require_once('database/init.php');
  require_once('database/user.php');

    // get username and password from HTTP parameters
    $login_id = $_POST['login_id'];
    $login_password = $_POST['password'];
    

    try {
      
    // check if username and password are correct
      if (loginSuccess($login_id, $login_password)) {
        $_SESSION['login_id'] = $login_id;
        $username= findUsernameByLoginId($login_id);
        $_SESSION['username'] = $username['name'];
        $_SESSION['msg'] = 'Successful login!';
        
        header('Location: project_quotas.php');
        exit();
        
      } else {
        $_SESSION['msg'] = 'Invalid username or password!';
        header('Location: project_login.php');
        exit();
        }

    } catch (PDOException $e) {
      $_SESSION['msg'] = 'Error: ' . $e->getMessage();
      header('Location: project_login.php');
      exit();
    }
  
  
?>
