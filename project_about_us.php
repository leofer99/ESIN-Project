<?php
  session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & People Association</title>
  
    <!-- Add any additional styles specific to the About Us page -->
    <style>
        section {
            background-color: #f8f8f8;
            padding: 40px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        section h2 {
            color: #e44d26;
            margin-bottom: 20px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .photo-grid img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
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
                <li><a href="project_quotas.php">Quotas Information</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Welcome to Paws & People!</h2>
        <p>
            At Paws & People Association, we believe in the healing power of the human-animal bond. Our organization focuses on leveraging the companionship of animals to provide comfort and support to those facing mental health challenges. Through therapy sessions, educational programs, and community outreach, we aim to make a positive impact on mental health awareness and destigmatization.
        </p>
    </section>

    <section>
        <h2>About Us</h2>
        <p>
            Our dedicated team is committed to creating a safe and welcoming space for individuals seeking mental health support. We understand the importance of empathy, understanding, and the unique bond between humans and animals in promoting well-being.
        </p>

        <div class="photo-grid">
            <!-- Add photo elements with appropriate image sources -->
            <img src="path/to/photo1.jpg" alt="Team Photo 1">
            <img src="path/to/photo2.jpg" alt="Team Photo 2">
            <img src="path/to/photo3.jpg" alt="Team Photo 3">
        </div>
    </section>

    <footer>
        <p>&copy; Association Name</p>
    </footer>
</body>
</html>

