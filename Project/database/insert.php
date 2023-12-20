<?php

function insertNewcomer($name, $email, $phone_number, $gender, $city, $joined_date, $login_password) {
  try {
  global $dbh;
  $stmt = $dbh->prepare('INSERT INTO Person (name, email, phone_number) VALUES (?, ?, ?)');
  $stmt->execute(array($name, $email, $phone_number));

  //Find the corresponding id_
  $stmt = $dbh->prepare('SELECT id_ FROM Person WHERE name=? AND email=? AND phone_number=?;');
  $stmt->execute(array($name, $email, $phone_number));
  $id_=$stmt->fetchColumn(); 

  $stmt = $dbh->prepare('INSERT INTO NonMember (id_, gender, city, joined_date, login_password) VALUES (?, ?, ?, ?, ?)');
  return $stmt->execute(array($id_, $gender, $city, $joined_date, hash('sha256', $login_password)));
  
} catch (PDOException $e) {
    $error_msg = $e->getMessage();
    $_SESSION['msg'] = 'Error creating new registration: ' . $error_msg;
    return false; // Return false if there is an error
  }
}

function insertUser($id_) {
    try {
      //var_dump($id_);

    global $dbh;
    //Find the corresponding id_
    $stmt = $dbh->prepare('SELECT gender, city, joined_date, login_password FROM NonMember WHERE id_=?;');
    $stmt->execute(array($id_));
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($user_data);

    $gender= $user_data['gender'];
    $city= $user_data['city'];
    $joined_date= $user_data['joined_date'];
    $login_password= $user_data['login_password'];
    
    $stmt = $dbh->prepare('INSERT INTO Member (id_, gender, city, joined_date, login_id, login_password) VALUES (?, ?, ?, ?, ?, ?);');
    $result= $stmt->execute(array($id_, $gender, $city, $joined_date, $id_, $login_password));
    
    $stmt = $dbh->prepare('DELETE FROM NonMember WHERE id_=?;');
    $result= $stmt->execute(array($id_));

    return $result;


  } catch (PDOException $e) {
    $error_msg = $e->getMessage();
    $_SESSION['msg'] = 'Error creating new user: ' . $error_msg;
    return false; // Return false if there is an error
  }
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
        $_SESSION['msg'] = 'Error inserting new inventory: ' . $error_msg;
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
        $_SESSION['msg'] = 'Error inserting new event: ' . $error_msg;
        return false; // Return false if there is an error
      }

  }

  function insertNewPayment($login_id, $event_name, $event_date, $event_type, $event_role) {
    try {
      
      return true;
      
      } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        $_SESSION['msg'] = 'Error inserting new payment: ' . $error_msg;
        return false; // Return false if there is an error
      }

  }


?>