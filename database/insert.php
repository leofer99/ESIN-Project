<?php

      function insertUserInventory($dbh, $login_id, $product_type, $quantity) {
      
        try {
      // Insert data into the table
      $stmt = $dbh->prepare('INSERT INTO Storage(product_type) VALUES (?);');
      $stmt->execute(array($product_type));
  
      //Find the corresponding sid
      $stmt = $dbh->prepare('SELECT sid FROM Storage WHERE product_type=?;');
      $stmt->execute(array($product_type));
      $sid=$stmt->fetch();
  
      //Add the quantity
      $stmt = $dbh->prepare('INSERT INTO MemberStorage (login_id, sid, quantity) VALUES (?, ?, ?);');
      $stmt->execute(array($login_id, $sid, $quantity));
          
      return true;
      
      } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error inserting data: ' . $error_msg;
        return false; // Return false if there is an error
      }
    }


?>