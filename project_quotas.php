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

?>
   if ($login_id==8) { //if admin user
  include_once('templates/admin_tpl.php');
  }
else { //if normal user
  include_once('templates/quotas_tpl.php');
}

  include_once('templates/footer_tpl.php');
  

<header>
        <div class="container">
            <h1>Association Management System</h1>

          ?>

            <?php if (isset($_SESSION['login_id'])) { ?>
                <form id="logout" action="action_logout.php">
                    <span><?php echo $_SESSION['username'] ?></span>
                    <button>Logout</button>
                </form>   
            <?php } ?>

            <nav>
                <ul>
                    <li><a href="project_homepage.php">Home</a></li>
                    <li><a href="project_about_us.php">About Us</a></li>
                    <li><a href="project_login.php">Login</a></li>
                    <li><a href="project_quotas.php">Quotas Information</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="user-info-section">
        <div class="container">
            <h2>User Info</h2>
            <?php if ($error_msg == null) { ?>
                <?php foreach ($user_infos as $row) { ?>
                    <article>
                        <span>Name: <?php echo $row['name'] ?></span>
                        <span>Email: <?php echo $row['email'] ?></span>
                        <span>Gender: <?php echo $row['gender'] ?></span>
                        <span>City: <?php echo $row['city'] ?></span>
                        <span>Joined Date: <?php echo $row['joined_date'] ?></span>
                    </article>
                <?php } ?>

            <?php } else { ?>
                <span><?php echo $error_msg ?></span>
            <?php } ?>
        </div>
    </section>

    <!-- Add other sections as needed -->

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Paws & People Association</p>
        </div>
    </footer>

</body>
</html>
