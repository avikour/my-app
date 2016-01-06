<?php

    /** function to Start session**/
    
    function wpdev_session_start() {
        session_start();
    }


    /** function to init database connection **/
    
    function wpdev_db_init() {
        global  $db;
        $db = mysqli_connect("localhost", "root", "", "my_app");
        if (!$db){
            die("Connection failed !".mysqli_connect_error());
        }
    }
    wpdev_db_init();

    /** function to create constants for our app **/
    function wpdev_make_constants() {
        
        define("BASE_PATH",__DIR__);
        define("URL_SCHEME",$_SERVER['REQUEST_SCHEME']);
        define("BASE_URL",URL_SCHEME.'://'.$_SERVER['SERVER_NAME'].'/'.basename(BASE_PATH));
        define("ADMIN_URL",BASE_URL."/admin");
        define("ADMIN_PATH",BASE_PATH."/admin");
        
    }
    wpdev_make_constants();

   function get_data($query){
       global $db;
       $all_data = array();
       if($all = mysqli_query($db,$query)) {
           while($row = mysqli_fetch_assoc($all) ) {
               $all_data[] = $row;
            }
        }
       return $all_data;
   }
    
    function update_db($query){
        global $db;
        mysqli_query($db,$query);
        
    }

    function create_db($query){
        global $db;
        mysqli_query($db,$query);
    }

    function delete_db($query){
        global $db;
        mysqli_query($db,$query);
    }

    function authenticate(){
        //to authenticate username and password for user login
        global $db;
        if(isset($_POST['my_login']) && ($_POST['my_login']=="logged_in")){
            $query = "SELECT `u_name`, `pass`
                        FROM users
                        WHERE `u_name` = \"{$_POST['u_name']}\" AND
                        `pass` = \"{$_POST['pass']}\"";
            if((mysqli_num_rows(mysqli_query($db,$query))) == 1){
                
                $_SESSION['u_name'] = $_POST['u_name'];
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit;
            }
            else {
                echo "Username or Password is incorrect!";
            }
        }
    }

    function logged_in(){
        if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] = true)){
             return true;
        } else {
            return false;
        }
    }