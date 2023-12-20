<section>
<div class="main-content">   
    <div class="auth-container">
    <section class="register-section">
        <div class="container">
        <h2>Register</h2>
        <?php //if (!isset($_SESSION['login_id'])) { //appears when user hasn't done the login
                ?>
        <form method="POST" action="action_register.php">
            <input type="text" placeholder="Full Name" name="name">
            <input type="text" placeholder="Email" name="email">
            <input type="text" placeholder="Phone Number" name="phone_number">
            <input type="submit" value="Register">
            <a href="project_login.php"></a>
            </form>

            <?php /*} 
            else { ?>
                <span>You're already logged in as <?php echo $_SESSION['username']; ?>!</span>
            <?php }*/ ?>
            
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
</section>

<section class="hero-section">
        <div class="container">
            <h2>Becoming a Member</h2>
                    <p class="bold-sentence">To maintain the integrity, cohesion, and purpose of our organization, it is imperative that each prospective member undergoes a thorough review of their application by our President.</p>
                    <p> This careful evaluation process serves several vital purposes.
                    <br>Firstly, it guarantees that potential members align with the organization's mission and values, fostering a sense of unity and commitment among existing members.
                    <br>Secondly, it ensures that applicants meet the required eligibility criteria, preventing any potential misuse of resources or privileges.
                    <br>Lastly, President reviews help identify and mitigate potential risks, such as security concerns or conflicts of interest, safeguarding the organization's reputation and promoting a safe and harmonious environment for all members.</p>
            </div>
        </div>
        </section>








   