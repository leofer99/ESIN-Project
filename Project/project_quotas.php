<?php
  session_start();
  $error_msg=null;

  if (!isset($_SESSION['login_id'])) {
    $_SESSION['msg'] = 'Please login to see your personal info.';
    header('Location: project_login.php');
  }

  require_once('database/init.php');
  require_once('database/user.php');
  require_once('database/admin.php');

  
  try {
    $login_id = $_SESSION['login_id'];  

    //User Functions:
    $user_infos = getUserInfoById($login_id);
    $annual_fees=getAnnualFees();
    $payments = getUserPaymentHistoryById($login_id);
    $association = getUserAssociationHistoryById($login_id);
    $events = getUserEventHistoryById($login_id);
    $inventory = getUserInventoryById($login_id);
    $user_paid=getUserAmountPaid($login_id);
    $user_debt=getUserDebt($login_id);

    //$balance=$user_paid-$user_debt;
    $balance=0;

    if ($balance<-50) {
      $fee_status='Danger of expulsion';
    } elseif ($balance<0) {
        $fee_status="Behind on payment";
    } else {
        $fee_status='paid';
    }

    //Admin Functions:
    $members=getAllMembers();
    $new_registrations=getNewRegistrations();
    $all_payments=getAllPayments();
    $all_fees=getAnnualFees();
    $all_events=getAllEvents();
    $all_inventory=getAllInventory();
    

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

