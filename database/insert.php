<?php

function insertNewcomer($name, $email, $phone_number) {
  global $dbh;
  $stmt = $dbh->prepare('INSERT INTO Person (name, email, phone_number) VALUES (?, ?, ?)');
  return $stmt->execute(array($name, $email, $phone_number));

}

//  INACABADA
function insertUser($login_id, $password) {
  global $dbh;
  $stmt = $dbh->prepare('INSERT INTO Member (login_id, login_password) VALUES (?, ?)');
  $stmt->execute(array($login_id, hash('sha256', $password)));
}

function insertUserInventory($login_id, $product_type, $quantity) {
      
      try {
      // Insert data into the table
      global $dbh;
      $stmt = $dbh->prepare('INSERT INTO Storage(product_type) VALUES (?);');
      $stmt->execute(array($product_type));
  
      //Find the corresponding sid
      $stmt = $dbh->prepare('SELECT sid FROM Storage WHERE product_type=?;');
      $stmt->execute(array($product_type));
      $sid=$stmt->fetchColumn();
  
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

  function insertNewEvent($login_id, $event_name, $event_date, $event_type, $event_role) {
    try {
      // Insert data into the table
      global $dbh;
      $stmt = $dbh->prepare('INSERT INTO EventHistory (event_name, event_date, event_type) VALUES (?, ?, ?);');
      $stmt->execute(array($event_name, $event_date, $event_type));
  
      //Find the corresponding id
      $stmt = $dbh->prepare('SELECT event_id FROM EventHistory WHERE event_name=? AND event_date=? AND event_type=?;');
      $stmt->execute(array($event_name, $event_date, $event_type));
      $event_id=$stmt->fetchColumn();
  
      //Add the quantity
      $stmt = $dbh->prepare('INSERT INTO MemberEvent (login_id, event_id, event_role) VALUES (?, ?, ?);');
      $stmt->execute(array($login_id, $event_id, $event_role));
      
      return true;
      
      } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error inserting data: ' . $error_msg;
        return false; // Return false if there is an error
      }

  }


?>