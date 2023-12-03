<?php
  session_start();
  $error_msg=null;

  if (!isset($_SESSION['login_id'])) {
    $_SESSION['msg'] = 'Please login to see your personal info.';
    header('Location: project_login.php');
  }
  
  try {
    $login_id = $_SESSION['login_id'];  

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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association Management System</title>
  
</head>
<body>
    <header>
        <h1>Association Management System</h1>

        <?php if (isset($_SESSION['login_id'])) { ?>
            <form id="logout" action="action_logout.php">
            <span><?php echo $_SESSION['username'] ?></span>
            <button>Logout</button>
            </form>   
        <?php } ?>

        <nav>
            <!-- Display membership status here -->
            <ul>
                <li><a href="project_homepage.php">Home</a></li>
                <li><a href="project_about_us.php">About Us</a></li>
                <li><a href="project_login.php">Login</a></li>
                <li><a href="project_quotas.php"> Quotas Information </a></li>
              </ul> 
        </nav>

    </header>

    <section>
        <h2>User Info</h2>
        <!-- Display membership status here -->
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
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Fees Payment Info</h2>

        <!-- Display membership status here -->
        <?php if ($error_msg == null) { ?>
          <?php foreach ($user_fees as $row) { ?>
            <article>
              <span>Fee Type: <?php echo $row['fee_type'] ?></span>
              <span>Fee Status: <?php echo $row['fee_status'] ?></span>
              <span>Months Ahead Without Needing To Pay: <?php echo $row['fee_months_ahead'] ?></span>
            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section id="payments">
        <h2>Payment History</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Amount Paid</th>
                <th>Type of Payment</th>
            </tr>
             <!-- Display payment history table rows here -->
        </table>

            <?php if ($error_msg == null) { ?>
          <?php foreach ($payments as $row) { ?>
            <article>
            <span><?php echo $row['date_payment'] ?></span>
              <span> <?php echo $row['amount_paid'] ?>€ </span>
              <span class="price"><?php echo $row['type_payment'] ?></span>
            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>
    </section>


    <section>
        <h2>Association History</h2>
        <table>
            <tr>
                <th>Role</th>
                <th>Year</th>
            </tr>
           <!-- Display association history here -->
        </table>
        <?php if ($error_msg == null) { ?>
          <?php foreach ($association as $row) { ?>
            <article>
            <span><?php echo $row['role_asso'] ?></span>
              <span> <?php echo $row['year_asso'] ?>€ </span>
            </article>
          <?php } ?>
        
        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Event History</h2>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Event Type</th>
                <th>Event Role</th>
            </tr>
            <!-- Display event history table rows here -->
        </table>

        <?php if ($error_msg == null) { ?>
          <?php foreach ($events as $row) { ?>
            <article>
              <span><?php echo $row['event_name'] ?></span>
              <span> <?php echo $row['event_date'] ?> </span>
              <span> <?php echo $row['event_type'] ?> </span>
              <span> <?php echo $row['event_role'] ?> </span>

            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <section>
        <h2>Inventory</h2>
        <table>
            <tr>
                <th>Product Type</th>
                <th>Quantity</th>
            </tr>
                    <!-- Display inventory information here -->
        </table>

        <?php if ($error_msg == null) { ?>
          <?php foreach ($inventory as $row) { ?>
            <article>
            <span><?php echo $row['product_type'] ?></span>
              <span> <?php echo $row['quantity'] ?> </span>
            </article>
          <?php } ?>

        <?php } else { ?>
          <span>  <?php echo $error_msg ?> </span>
          <?php } ?>

    </section>

    <footer>
        <p>&copy; Association Name</p>
    </footer>
</body>
</html>
