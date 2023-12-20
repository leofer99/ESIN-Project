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
                    
                    <?php  
                    // Check if the user is logged in and their role
                    $isLoggedIn = isset($_SESSION['login_id']);
                    $userRole = $_SESSION['login_id'] == 8 ? 'admin' : 'user';

                    // Define menu items based on the user's role
                    $menuItems = [
                        ["text" => "myP&P", "url" => "project_quotas.php"],
                        ["text" => "Admin", "url" => "project_quotas.php"]
                    ];

                    if ($isLoggedIn) {
                        if ($userRole === "admin") {
                            // Add an additional menu item for admin
                            echo '<li><a href="' . $menuItems[1]['url'] . '">' . $menuItems[1]['text'] . '</a></li>';
                        } else {
                            // Add a different menu item for regular users
                            echo '<li><a href="' . $menuItems[0]['url'] . '">' . $menuItems[0]['text'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>

