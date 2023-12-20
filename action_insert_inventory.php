<?php
     session_start();
     $error_msg=null;

     require_once('database/init.php');
     require_once('database/insert.php');

     // Get user input from the form
     $product_type = $_POST['product_type'];
     $quantity = $_POST['quantity'];
     $login_id= $_SESSION['login_id'];  
 
     //Input tests- NOTA: NÃO APARECE MENSAGEM A AVISAR DO ERRO
     if (empty($product_type) ) {
         $_SESSION['msg'] = 'Invalid product type!';
         header('Location: project_quotas.php');
         die();
     }
 
     elseif ($quantity <= 0) {
         $_SESSION['msg'] = 'Invalid quantity!';
         header('Location: project_quotas.php');
         die();
     }

     else {
      try {          
        $success= insertUserInventory($login_id, $product_type, $quantity);
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