<?php
     session_start();
     $error_msg=null;

     $id_ = $_GET['id_'];

     require_once('database/init.php');
     require_once('database/remove.php');


      try {
        $success= removeRegistration($id_);
        $_SESSION['msg'] = 'Inventory removed successfully!';
        header('Location: project_quotas.php'); 


     } catch (PDOException $e) {
      $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error: ' . $error_msg;
        header('Location: project_quotas.php');
        exit();

     }

    # redirect user to wherever they were already
    header('location: ' . $_SERVER['HTTP_REFERER']);


?>