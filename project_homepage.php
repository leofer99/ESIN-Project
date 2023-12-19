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
                    <li><a href="project_login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero-section">
        <div class="container">
            <h2>Welcome to Paws & People!</h2>
            <p>The transformative journey of the human-animal bond. Promoting mental health and well-being through dogs companion.</p>
            <div class="pet-card">
                    <img src="images/chav3.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
                    <img src="images/chav4.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
            </div>
                <div>
                    <p> At Paws & People Association, we believe in the healing power of the human-animal bond. Our organization focuses on leveraging the companionship of animals to provide comfort and support to those facing mental health challenges. Through therapy sessions, educational programs, and community outreach, we aim to make a positive impact on mental health awareness and destigmatization.</p>
                </div>
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