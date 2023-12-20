<?php
     session_start();
     $error_msg=null;

     require_once('database/init.php');
     require_once('database/insert.php');

     // Get user input from the form
     $event_name = $_POST['event_name'];
     $event_date = $_POST['event_date'];
     $event_type = $_POST['event_type'];
     $event_role = $_POST['event_role'];
     $login_id= $_SESSION['login_id'];  
 
     //Input tests- NOTA: NÃO APARECE MENSAGEM A AVISAR DO ERRO
     if (empty($event_name)) {
        $_SESSION['msg'] = 'Event name is required!';
        header('Location: project_quotas.php');
        die();
    }
    
    if (empty($event_date)) {
        $_SESSION['msg'] = 'Event date is required!';
        header('Location: project_quotas.php');
        die();
    }
    
    if (empty($event_type)) {
        $_SESSION['msg'] = 'Event type is required!';
        header('Location: project_quotas.php');
        die();
    }
    
    if (empty($event_role)) {
        $_SESSION['msg'] = 'Event role is required!';
        header('Location: project_quotas.php');
        die();
    }

    else {
      try {
        $success= insertNewEvent($login_id, $event_name, $event_date, $event_type, $event_role);
        $_SESSION['msg'] = 'Inventory placed successfully!';
        header('Location: project_quotas.php'); 


     } catch (PDOException $e) {
      //die($e->getMessage());
      $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error: ' . $error_msg;
        header('Location: project_quotas.php');
        exit();

     }


    }


?>