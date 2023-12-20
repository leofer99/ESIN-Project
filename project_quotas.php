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
    //$user_fees = getUserFeesInfoById($login_id);
    $payments = getUserPaymentHistoryById($login_id);
    $association = getUserAssociationHistoryById($login_id);
    $events = getUserEventHistoryById($login_id);
    $inventory = getUserInventoryById($login_id);

    $members=getAllMembers();
    $new_registrations=getNewRegistrations();
    $all_payments=getAllPayments();
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

