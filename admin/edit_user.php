<?php require_once("admin_functions.php");?>
<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if(logged_in()){
        admin_header();
    }
       ?>
    <div class="content edit-user">
        <?php 
            if (isset($_GET['id'])) {
                $_GET['id'] = intval($_GET['id']);
                if ($_GET['id'] == 0){
                    echo "User Not Found";
                } else {
                    $query = "SELECT * FROM users where id = {$_GET['id']}";
                    $user_info = current(get_data($query));
        ?>
            <h2>Edit User Details</h2>
            <form action="<?php echo ADMIN_URL ?>/users.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user_info['id']; ?>"><br />
                First Name <input type="text" name="f_name" value="<?php echo $user_info['f_name']; ?>"><br />
                Last Name <input type="text" name="l_name" value="<?php echo $user_info['l_name']; ?>"><br />
                Username <input type="text" name="u_name" value="<?php echo $user_info['u_name']; ?>"><br />
                Password <input type="text" name="pass" value="<?php echo $user_info['pass']; ?>"><br />
                Email <input type="email" name="email" value="<?php echo $user_info['email']; ?>"><br />
                <input type="submit" name="submit" value="Update Details"><br />
                <input type="hidden" name="update" value="updated"><br />      
            </form>
        <?php
                    }
            }
        ?>
    </div>
<?php admin_footer(); ?>