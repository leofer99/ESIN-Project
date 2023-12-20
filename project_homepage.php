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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & People Association</title>
</head>
<body>

    <header>
        <div class="container">
            <h1>Paws & People Association</h1>

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
                    <li><a href="project_event.php">Events</a></li>
                    <li><a href="project_login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero-section">
        <div class="container">
            <h2>Welcome to Paws & People!</h2>
            <div class="video-container">
                <video id="myVideo" autoplay muted loop>
                    <source src="video/v3.mp4" type="video/mp4">
                </video>
            </div>
            <p>Promoting mental health and well-being through the heartwarming companionship of our loyal dogs!</p>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Paws & People Association</p>
        </div>
    </footer>
</body>
</html>