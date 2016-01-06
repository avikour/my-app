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
                    $updated_user = $_POST;
                    $update_query = "UPDATE users
                                    SET `f_name` = \"{$updated_user['f_name']}\",
                                    `l_name` = \"{$updated_user['l_name']}\",
                                    `u_name` = \"{$updated_user['u_name']}\",
                                    `email` = \"{$updated_user['email']}\",
                                    `pass` = \"{$updated_user['pass']}\"
                                    WHERE `id` = {$updated_user['id']}
                                    ";
                    update_db($update_query);
                }

                if(isset($_POST['create']) && ($_POST['create']=='created')){            
                    $new_user = $_POST;
                    $create_query = "INSERT INTO `users`(
                                    `f_name`, `l_name`, `u_name`, `email`, `pass`)
                                    VALUES (\"{$new_user['f_name']}\",
                                    \"{$new_user['l_name']}\",
                                    \"{$new_user['u_name']}\",
                                    \"{$new_user['email']}\",
                                    \"{$new_user['pass']}\"
                                    )";
                    create_user($create_query);
                }
        
                if(isset($_GET['delete'])){            
                    $delete_query = "DELETE FROM `users`
                                    WHERE `id` = {$_GET['delete']}";
                    delete_db($delete_query);
                }
        ?>
        <div class="content content-all-users">
                        <table>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Password</th>       
                            </tr>
                            <?php
                                $query = "Select * from users";
                                foreach(get_data($query) as $key => $value){
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $value['f_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['l_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['u_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $value['pass'] ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo ADMIN_URL."/edit_user.php?id=".$value['id'];?>">Edit</a>
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
<?php
    }
?>
<?php admin_footer(); ?>
