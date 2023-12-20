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
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <button type="submit">Logout</button>
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

   <!-- Events Section -->
    <section class="events-section">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="event-list">
                <div class="event-item">
                    <h3>Dog Therapy Workshop</h3>
                    <p>Date: January 15, 2024</p>
                    <p>Location: Community Center, 123 Main Street</p>
                    <p>Description: Join us for a workshop on the benefits of dog therapy for emotional support and recovery.</p>
                </div>
                <div class="event-item">
                    <h3>Pet Adoption Day</h3>
                    <p>Date: February 20, 2024</p>
                    <p>Location: Local Park, 456 Elm Avenue</p>
                    <p>Description: Looking for a new furry friend? Come meet adoptable dogs in need of loving homes.</p>
                </div>
                <!-- Additional events here -->
            </div>
        </div>
    </section>

    <section class="events-section">
        <div class="container">
            <h2>Past Events</h2>
            <div class="event-list">
                <div class="event-item">
                    <h3>Doggy dinner party</h3>
                    <p>Date: December 13, 2023</p>
                    <p>Location: Community Center, 123 Main Street</p>
                </div>
                <div class="event-item">
                    <h3>Pet Adoption Day</h3>
                    <p>Date: February 20, 2024</p>
                    <p>Location: Local Park, 456 Elm Avenue</p>
                    <p>Description: Looking for a new furry friend? Come meet adoptable dogs in need of loving homes.</p>
                </div>
                <!-- Additional events here -->
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
