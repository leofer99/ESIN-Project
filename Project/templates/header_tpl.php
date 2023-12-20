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
                    <?php  if ($_SESSION['login_id']==8) {  //if admin user ?>
                        <li><a href="project_quotas.php"> Admin Information </a></li>
                        <?php } else { ?>
                        <li><a href="project_quotas.php"> User Information </a></li>
                        <?php }?>
            </ul>
    
        </nav>
        </div>
    </header>


