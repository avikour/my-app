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
    <div class="content edit-page">
        <?php 
            if (isset($_GET['id'])) {
                $_GET['id'] = intval($_GET['id']);
                if ($_GET['id'] == 0){
                    echo "Page Not Found";
                } else {
                    $query = "SELECT * FROM pages where id = ".intval($_GET['id']);
                    $page_info = current(get_data($query));
        ?>
            <h2>Edit Page</h2>
            <form action="<?php echo ADMIN_URL ?>/all_pages.php" method="post">
                <input type="hidden" name="id" value="<?php echo $page_info['id']; ?>"><br />
                Page Name <input type="text" name="p_name" value="<?php echo $page_info['p_name']; ?>"><br />
                Content <input type="text" name="content" value="<?php echo $page_info['content']; ?>"><br />
                <input type="submit" name="submit" value="Update Page"><br />
                <input type="hidden" name="update" value="updated"><br />      
            </form>
        <?php
                    }
            }
        ?>
    </div>
<?php admin_footer(); ?>