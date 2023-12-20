<?php
     session_start();
     $error_msg=null;

     $id_ = $_GET['id_'];

     require_once('database/init.php');
     require_once('database/insert.php');

      try {
        $success= insertUser($id_);
        //var_dump( $success);
        $_SESSION['msg'] = 'User added successfully! Login_id:'. $id_;
        header('Location: project_quotas.php'); 


     } catch (PDOException $e) {
      $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error: ' . $error_msg;
        header('Location: project_quotas.php');
        exit();

     }

   


?>