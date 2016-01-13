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
                
                $updated_post = $_POST;
                $update_query = "UPDATE posts
                                SET `post_name` = ? ,
                                `content` = ? 
                                WHERE `id` = ? ";
                 
                db_query(
                    $update_query,
                    array(
                        'ssi',
                        $updated_post['post_name'],
                        $updated_post['content'],
                        $updated_post['id']
                    )
                );
            }

            if(isset($_POST['create']) && ($_POST['create']=='created')){            
               
                $new_post = $_POST;
                
                $create_query = "INSERT INTO `posts`(
                                `post_name`, `content`)
                                VALUES (?, ?)";
                
                db_query(
                    $create_query,
                    array(
                        'ss',
                        $new_post['post_name'],
                        $new_post['content']
                    )
                );
}
        
            if(isset($_GET['delete'])){  
                
                $delete_query = "DELETE FROM `posts`
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
        <div class="content content-all-posts">
            <table>
                <tr>
                    <th>Post Name</th>
                    <th>Content</th>     
                </tr>
                <?php
                    if(isset($_GET['page'])){
                        $page = intval($_GET['page']);
                    } else {
                        $page = 1;
                    }
                    
                    if($page>0){
                        
                        $limit = 3;
                        $offset = $limit * ( $page - 1 );
                        
                        $query = "Select * from posts LIMIT {$offset}, {$limit}";
                       
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
            
            <?php 
                $query = "Select * from posts";
                $total_rows = mysqli_num_rows(mysqli_query($db,$query));
                $total_pages = ceil($total_rows/$limit);
                if ($page <= $total_pages){ 
                    if($page!=1){
                        $prev = $page - 1;
                        echo "<a href=\"?page={$prev}\">Previous</a>";
                    }
                    $j = $page + 2;
                    for($i=$page;$i<=$j;$i++){
                        if($i <= $total_pages ){
                            echo "<a href=\"?page={$i}\">{$i}</a>";
                        }
                    }
                    if($page!=$total_pages){
                        $next = $page + 1;
                        echo "<a href=\"?page={$next}\">Next</a>";
                    }
               }
                        
                echo "<br /><a href=\"?logout=1\">Logout</a>";?>
        </div>
    </div>
    <?php
        }
    }
?>
<?php admin_footer(); ?>
