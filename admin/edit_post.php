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
    <div class="content edit-post">
        <?php 
            if (isset($_GET['id'])) {
                $_GET['id'] = intval($_GET['id']);
                if ($_GET['id'] == 0){
                    echo "Post Not Found";
                } else {
                    $query = "SELECT * FROM posts where id = ".intval($_GET['id']);
                    $post_info = current(get_data($query));  
        ?>
            <h2>Edit Post</h2>
            <form action="<?php echo ADMIN_URL ?>/all_posts.php" method="post">
                <input type="hidden" name="id" value="<?php echo $post_info['id']; ?>"><br />
                Post Name <input type="text" name="post_name" value="<?php echo $post_info['post_name']; ?>"><br />
                Content <input type="text" name="content" value="<?php echo $post_info['content']; ?>"><br />
                <input type="submit" name="submit" value="Update Page"><br />
                <input type="hidden" name="update" value="updated"><br />      
            </form>
        <?php
                    }
            }
        ?>
    </div>
<?php admin_footer(); ?>
