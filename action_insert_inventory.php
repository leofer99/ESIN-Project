<?php
     session_start();
     $error_msg=null;

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
        $dbh = new PDO('sqlite:sql/project_.db');
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sid=null; $result=null;

         // Insert data into the table
         $stmt = $dbh->prepare('INSERT INTO Storage(product_type) VALUES (?);');
         $result=$stmt->execute(array($product_type));
     
         //Find the corresponding sid
         $stmt = $dbh->prepare('SELECT sid FROM Storage WHERE product_type=?;');
         $stmt->execute(array($product_type));
         $sid=$stmt->fetchColumn();
         //fetch() retrieves only one row as an associative array, 
         // you should use $sid = $stmt->fetchColumn()

         //Add the quantity
         $stmt = $dbh->prepare('INSERT INTO MemberStorage (login_id, sid, quantity) VALUES (?, ?, ?);');
         $result=$stmt->execute(array($login_id, $sid, $quantity));
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