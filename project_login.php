<?php
  session_start();

  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & People Association</title>
   
</head>
<body>
    <header>
        <h1>Paws & People Association</h1>

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
    
              <style> 
              </style>
        </nav>
    </header>

    <section>
        <h2>Welcome to Paws & People!</h2>

        
       
    </section>

    <section>
        <h2>Register</h2>
        <form method="POST" action="action_register.php">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Register">
            <a href="project_login.php"></a>
            </form>
    </section>
    
    <section>
        <h2>Login</h2> 
            <?php if (!isset($_SESSION['login_id'])) { //appears when user hasn't done the login
                ?>
            <form action="action_login.php" method="post">
            <input type="text" placeholder="login_id" name="login_id">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Login">
            </form>
        <?php } else { ?>
            <span> You're already logged in as <?php echo $_SESSION['username'] ?>! </span>
           
        <?php } ?>

        <?php if (isset($msg)) { ?>
            <p><?php echo $msg ?></p>
        <?php } ?>




    </section>
</body>
</html>
