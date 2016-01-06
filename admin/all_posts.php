<?php require_once("admin_functions.php");?>
<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }
    if(logged_in()){
        admin_header();
       ?>
        <?php   
            if(isset($_POST['update']) && ($_POST['update']=='updated')){
                $updated_post = $_POST;
                $update_query = "UPDATE posts
                                SET `post_name` = \"{$updated_post['post_name']}\",
                                `content` = \"{$updated_post['content']}\"
                                WHERE `id` = {$updated_post['id']}
                                ";
                update_db($update_query);
            }

            if(isset($_POST['create']) && ($_POST['create']=='created')){            
                $new_post = $_POST;
                $create_query = "INSERT INTO `posts`(
                                `post_name`, `content`)
                                VALUES (\"{$new_post['post_name']}\",
                                \"{$new_post['content']}\"
                                )";
                create_db($create_query);
            }
        
            if(isset($_GET['delete'])){            
                $delete_query = "DELETE FROM `posts`
                                WHERE `id` = {$_GET['delete']}";
                delete_db($delete_query);
            }
        ?>
        <div class="content content-all-posts">
            <table>
                <tr>
                    <th>Post Title</th>
                    <th>Content</th>     
                </tr>
                <?php
                    $query = "Select * from posts";
                    foreach(get_data($query) as $key => $value){
                    ?>
                    <tr>
                        <td>
                            <?php echo $value['post_name'] ?>
                        </td>
                        <td>
                            <?php echo $value['content'] ?>
                        </td>
                        <td>
                            <a href="<?php echo ADMIN_URL."/edit_post.php?id=".$value['id'];?>">Edit</a>
                        </td>
                        <td>
                            <?php echo "<a href=\"?delete={$value['id']}\">Delete</a>";?>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
            </table>
            <?php echo "<a href=\"?logout=1\">Logout</a>";?>
        </div>
    </div>
    <?php
        }
?>
<?php admin_footer(); ?>
