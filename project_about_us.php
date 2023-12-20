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
            <h2>We are Paws & People!</h2>
            <p>Our mission is promote physical and emotional well-being through the human-dog bond.</p>
            <div class="pet-card">
                    <img src="images/chav3.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
                    <img src="images/chav4.jpg" alt="Team Photo" style="width: 450px; height: auto; object-fit: cover;">
            </div>
                <div>
                    <p> At Paws & People Association, we believe in the healing power of the human-animal bond. Our organization focuses on leveraging the companionship of animals to provide comfort and support to those facing mental health challenges. Through therapy sessions, educational programs, and community outreach, we aim to make a positive impact on mental health awareness and destigmatization.</p>
                </div>
        </div>
    </section>
    <section class="about-us-section">
        <div class="container">
            <h2>We are Paws & People!</h2>
            <div class="pet-card">
                <img src="images/chav1.jpg" alt="Description of Photo 1" style="width: 350px; height: 400px; object-fit: cover;">
                <img src="images/chav2.jpg" alt="Description of Photo 2" style="width: 350px; height: 400px; object-fit: cover;">
                <!-- Add more images as needed -->
            </div>
        </div>
    </section>

    <!-- Therapy Pets Section -->
    <section id="therapy-pets" class="therapy-pets-section">
        <div class="container">
            <h2>Meet Our Therapy Pets</h2>
            <div class="pet-card-grid">
                <!-- Pet Cards Here -->
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="pet-card">
                <img src="images/chav4.jpg" alt="Team Photo 1"style="width: 450px; height: auto; object-fit: cover;">
                <img src="images/chav3.jpg" alt="Description of Photo 3"style="width: 450px; height: 330px; object-fit: cover;">
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
