<?php require_once("admin_functions.php");?>
<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if(logged_in()){
            admin_header(); ?>
            <div class="content new-post">
                
                    <h2>Add a New Post</h2>
                    
                    <form action="<?php echo ADMIN_URL ?>/all_posts.php" method="post">
                        Post name <input type="text" name="post_name" placeholder="Enter the post name"><br />
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