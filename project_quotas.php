<?php
  session_start();
  $error_msg=null;

  if (!isset($_SESSION['login_id'])) {
    $_SESSION['msg'] = 'Please login to see your personal info.';
    header('Location: project_login.php');
  }

  require_once('database/init.php');
  require_once('database/user.php');
  
  try {
    $login_id = $_SESSION['login_id'];  

      //User Functions:
    $user_infos = getUserInfoById($login_id);
    $user_fees = getUserFeesInfoById($login_id);
    $payments = getUserPaymentHistoryById($login_id);
    $association = getUserAssociationHistoryById($login_id);
    $events = getUserEventHistoryById($login_id);
    $inventory = getUserInventoryById($login_id);
    
    $dbh = new PDO('sqlite:sql/project_.db');
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //selects user's info
    $stmt = $dbh->prepare('SELECT name, email, gender, city, joined_date
        FROM Person
        JOIN Member ON member.id_=person.id_
    WHERE member.login_id=?;');
    $stmt->execute(array($login_id));
    $user_infos = $stmt->fetchAll();

    //selects user's fee info
    $stmt = $dbh->prepare('SELECT fee_type, fee_status, fee_months_ahead
        FROM FeesInfo
        JOIN Member ON feesinfo.id_feeinfo= member.id_feeinfo
    WHERE member.login_id=?;');
    $stmt->execute(array($login_id));
    $user_fees = $stmt->fetchAll();

    //selects payments made by the user:
    $stmt = $dbh->prepare('SELECT date_payment, amount_paid, type_payment
    FROM Payment
    JOIN MemberPayment ON memberpayment.id_pay = payment.id_pay
    JOIN Member ON memberpayment.login_id = member.login_id
    WHERE member.login_id=? 
    ORDER BY date_payment DESC;');
    $stmt->execute(array($login_id));
    $payments = $stmt->fetchAll();

    //selects user's association history
    $stmt = $dbh->prepare('SELECT member.login_id, memberhistory.id_asso, role_asso, year_asso
        FROM Member
        JOIN MemberHistory ON member.login_id = memberhistory.login_id
        JOIN AssociationHistory ON associationhistory.id_asso = memberhistory.id_asso
    WHERE member.login_id=?  --specific_login_id
    ORDER BY year_asso DESC;');
    $stmt->execute(array($login_id));
    $association = $stmt->fetchAll();

    //selects user's event history
    $stmt = $dbh->prepare('SELECT member.login_id, memberevent.event_id, event_name, event_date, event_type, event_role
        FROM Member
        JOIN MemberEvent ON member.login_id = memberevent.login_id
        JOIN EventHistory ON memberevent.event_id = eventhistory.event_id
    WHERE member.login_id=?  --specific_login_id
    ORDER BY event_date DESC, memberevent.event_id DESC;');
    $stmt->execute(array($login_id));
    $events = $stmt->fetchAll();

     //$members= getAllMembers();

    //selects inventory of the user
    $stmt = $dbh->prepare('SELECT product_type, quantity
        FROM Member
        JOIN MemberStorage ON member.login_id = memberstorage.login_id
        JOIN Storage ON memberstorage.sid = storage.sid
    WHERE member.login_id=?  --specific_login_id
    ORDER BY storage.sid DESC;');
    $stmt->execute(array($login_id));
    $inventory = $stmt->fetchAll();


  } catch (PDOException $e) {
    $error_msg = $e->getMessage();
  }

  include_once('templates/header_tpl.php');

    if ($login_id==8) { //if admin user             

  include_once('templates/admin_tpl.php');
  }
else { //if normal user
  include_once('templates/quotas_tpl.php');
}

  include_once('templates/footer_tpl.php');
  ?>

