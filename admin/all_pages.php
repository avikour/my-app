<?php require_once("admin_functions.php");?>

<?php
    if((isset($_GET['logout'])) || (!logged_in())){
        session_destroy();
        header('Location: login.php');
        exit;
    }

    if(logged_in()){
            admin_header();  
            if(isset($_POST['update']) && ($_POST['update']=='updated')){
                
                $updated_page = $_POST;
                $update_query = "UPDATE pages
                                SET `p_name` = ? ,
                                `content` = ? 
                                WHERE `id` = ? ";
                 
                db_query(
                    $update_query,
                    array(
                        'ssi',
                        $updated_page['p_name'],
                        $updated_page['content'],
                        $updated_page['id']
                    )
                );
            }

            if(isset($_POST['create']) && ($_POST['create']=='created')){  
                
                $new_page = $_POST;
                $create_query = "INSERT INTO `pages`(
                                `p_name`, `content`)
                                VALUES (?, ?)";
                
                db_query(
                    $create_query,
                    array(
                        'ss',
                        $new_page['p_name'],
                        $new_page['content']
                    )
                );
            }
        
            if(isset($_GET['delete'])){    
                
                $delete_query = "DELETE FROM `pages`
                                WHERE `id` = ?";
                
                 db_query(
                    $delete_query,
                    array(
                        'i',
                        $_GET['delete']
                    )
                );
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
