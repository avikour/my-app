<?php require_once("admin_functions.php");?>
<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if(logged_in()){
            admin_header(); ?>
            <div class="content new-page">
                
                    <h2>Add a New Page</h2>
                    
                    <form action="<?php echo ADMIN_URL ?>/all_pages.php" method="post">
                        Page name <input type="text" name="p_name" placeholder="Enter the page name"><br />
                        Content <input type="text" name="content" placeholder="Submit your content here"><br />
                        <input type="submit" name="submit" value="Create Page"><br />
                        <input type="hidden" name="create" value="created"><br />
                    </form>   
                    <?php echo "<a href=\"?logout=1\">Logout</a>";?>
            </div>
<?php 
    }
?>
<?php admin_footer(); ?>