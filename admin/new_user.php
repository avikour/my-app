<?php require_once("admin_functions.php");?>
<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if(logged_in()){
            admin_header(); ?>
            <div class="content new-user">
                
                    <h2>Add a New User</h2>
                    
                    <form action="<?php echo ADMIN_URL ?>/users.php" method="post">
                        First Name <input type="text" name="f_name" placeholder="Enter your first name"><br />
                        Last Name <input type="text" name="l_name" placeholder="Enter your last name"><br />
                        Username <input type="text" name="u_name" placeholder="Enter a username"><br />
                        Email <input type="email" name="email" placeholder="Enter your e-mail"><br />
                        Password <input type="text" name="pass" placeholder="Enter a password"><br />
                        <input type="submit" name="submit" value="Create User"><br />
                        <input type="hidden" name="create" value="created"><br />
                    </form>
                    <?php echo "<a href=\"?logout=1\">Logout</a>";?>
            </div>
<?php 
    }
?>
<?php admin_footer(); ?>