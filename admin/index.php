<?php require_once("admin_functions.php");?>
<html>
    <head>
        <title>
            Admin Dashboard
        </title>
        <link rel="stylesheet" href="<?php echo ADMIN_URL.'/stylesheets/style.css'; ?>">
    </head>
    <body>
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="main">
            <div class="content">
                <?php
                    if((isset($_GET['logout'])) || (!logged_in())){
                        session_destroy();
                        header('Location: login.php');
                        exit;
                    }
                    if(logged_in()){
                        echo " Welcome !!!";?> <br/><br/>     
                        <?php echo "<a href=\"?logout=1\">Logout</a>";?><br />
                        <?php echo "<a href=\"".ADMIN_URL."/edit_user.php\">Go to Admin Dashboard</a>";
                    }
                ?>
            </div>
        </div>
<?php admin_footer(); ?>