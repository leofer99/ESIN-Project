<div class="wrapper">
<div class="main-content">   
    <div class="auth-container">

    <!-- 
    <section class="register-section">
        <div class="container">
        <h2>Welcome to Paws & People!</h2>
        
            </div>
    </section> 
     -->

    <section class="register-section">
        <div class="container">
        <h2>Register</h2>
        <?php if (!isset($_SESSION['login_id'])) { //appears when user hasn't done the login
                ?>
        <form method="POST" action="action_register.php">
            <input type="text" placeholder="Full Name" name="name">
            <input type="text" placeholder="Email" name="email">
            <input type="text" placeholder="Phone Number" name="phone_number">
            <input type="text" placeholder="Gender" name="gender">
            <input type="text" placeholder="City" name="city">
            <input type="text" placeholder="Joined Date (yyyy-mm-dd)" name="joined_date">
            <input type="password" placeholder="Password" name="login_password">

            <input type="submit" value="Register">
            <a href="project_login.php"></a>
            </form>

            <?php } else { ?>
                <span>You're already logged in as <?php echo $_SESSION['username']; ?>!</span>
            <?php } ?>
            
            </div>
    </section> 

  
    <section class="login-section">
        <div class="container">
            <h2>Login</h2> 
            <?php if (!isset($_SESSION['login_id'])) { //appears when user hasn't done the login
                ?>
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

    </div>
    </div>








   