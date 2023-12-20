<?php
  session_start();
?>

<!-- About Us Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Paws & People Association - About Us</title>
</head>
<body>

    <header>
        <div class="container">
            <h1> <a href="project_homepage.php">Paws & People Association</a></h1>

            <?php if (isset($_SESSION['login_id'])) { ?>
                <form id="logout" action="action_logout.php">
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span> <!-- htmlspecialchars for security -->
                    <button type="submit">Logout</button> <!-- Added type attribute -->
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

    <!-- About Us Section -->

    <section class="hero-section">
        <div class="container">
            <h2>This is Paws & People!</h2>
            <div class="pet-card">
                    <img src="images/chav3.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
                    <img src="images/chav4.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
            </div>
            <div>
                <p> At Paws & People Association, we believe in the healing power of the human-dog bond. Our organization focuses on leveraging the companionship of our trained dogs to provide comfort and support to those facing health challenges. Through therapy sessions, educational programs, and community outreach, we make a positive impact on health.</p>
            </div>
        </div>
    </section>
    <section class="about-us-section">
        <div class="container">
            <h2>Who are we?</h2>
            <div>
              <p>   We are experts in emotional support, emphatic and highly trained therapists, focused on rehabilitation and emotional support to patients with chronic and terminal conditions and their families. Our mission is promote physical and emotional well-being through the human-dog bond.</p>
            </div>
        </div>
    </section>
    <section class="hero-section">
        <div class="container">
            <h2> Meet our Chavinho!</h2>
            <div class="pet-card">
                    <img src="images/chav3.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
                    <img src="images/chav4.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
            </div>
            <div>
                <p> The most highly trained dog specialist in human care! Order of the fenix .</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Paws & People Association</p>
        </div>
    </footer>
</body>
</html>
