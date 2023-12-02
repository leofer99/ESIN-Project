<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="project_style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & People Association</title>
   
</head>
<body>
    <header>
        <h1>Paws & People Association</h1>
        <nav>
            <!-- Display membership status here -->
            <ul>
                <li><a href="project_homepage.php">Home</a></li>
                <li><a href="project_about_us.php">About Us</a></li>
                <li><a href="project_login.php">Login</a></li>
                <li><a href="project_site.html"> Quotas Information </a></li>
              </ul>
    
              <style> 
              </style>
        </nav>
    </header>

    <section>
        <h2>Welcome to Paws & People!</h2>
       
    </section>
    
    <section>
        <h2>Login</h2>
        <form method="POST" action="action_login.php">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Login">
            <a href="registration.php"></a>
            </form>
    </section>

    <footer>
        <p>&copy; Association Name</p>
    </footer>
</body>
</html>
