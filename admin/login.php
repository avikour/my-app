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
        <?php
            if(logged_in()){
                header('Location: index.php');
                exit;
            }
            else{
                authenticate();
            }

        ?>
            <div class="content">
                <h2>Please Login</h2>
                <form action="" method="post">
                    <input type="text" name="u_name" placeholder="Enter your Username"><br />
                    <input type="text" name="pass" placeholder="Enter your Password"><br />
                    <input type="submit" name="login" value="Log In"><br />
                    <input type="hidden" name="my_login" value="logged_in"><br />
                </form>

            </div>
        </div>
<?php admin_footer(); ?>
