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
                $updated_page = $_POST;
                $update_query = "UPDATE pages
                                SET `p_name` = \"{$updated_page['p_name']}\",
                                `content` = \"{$updated_page['content']}\"
                                WHERE `id` = {$updated_page['id']}
                                ";
                update_db($update_query);
            }

            if(isset($_POST['create']) && ($_POST['create']=='created')){            
                $new_page = $_POST;
                $create_query = "INSERT INTO `pages`(
                                `p_name`, `content`)
                                VALUES (\"{$new_page['p_name']}\",
                                \"{$new_page['content']}\"
                                )";
                create_db($create_query);
            }
        
            if(isset($_GET['delete'])){            
                $delete_query = "DELETE FROM `pages`
                                WHERE `id` = {$_GET['delete']}";
                delete_db($delete_query);
            }
        ?>
        <div class="content content-all-pages">
            <table>
                <tr>
                    <th>Page Name</th>
                    <th>Content</th>     
                </tr>
                <?php
                    $query = "Select * from pages";
                    foreach(get_data($query) as $key => $value){
                    ?>
                    <tr>
                        <td>
                            <?php echo $value['p_name'] ?>
                        </td>
                        <td>
                            <?php echo $value['content'] ?>
                        </td>
                        <td>
                            <a href="<?php echo ADMIN_URL."/edit_page.php?id=".$value['id'];?>">Edit</a>
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
