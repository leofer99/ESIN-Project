<?php
  session_start();

  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);

?>

<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Paws & People Association</title>
</head>
<body>
    <header>
        <div class="container">
            <h1> <a href="project_homepage.php">Paws & People Association</a></h1>

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
                </ul>
            </nav>
        </div>
    </header>
<div class="wrapper">
<div class="main-content">   
    <div class="auth-container">
    <section class="login-section">
        <div class="container">
            <h2>Login</h2> 
            <?php if (!isset($_SESSION['login_id'])) { ?>
                <form action="action_login.php" method="post">
                    <input type="text" placeholder="Login ID" name="login_id">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="Login">
                </form>
            <?php } else { ?>
                <span>You're already logged in as <?php echo $_SESSION['username']; ?>!</span>
            <?php } ?>

            <?php if (isset($msg)) { ?>
                <p><?php echo $msg; ?></p>
            <?php } ?>
        </div>
    </section>

    <section class="register-section">
        <div class="container">
            <h2>Register</h2>
            <form method="POST" action="action_register.php">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Register">
            </form>
        </div>
    </section> 
    </div>
</div>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Paws & People Association</p>
        </div>
    </footer>
</div>
</body>
</html>
