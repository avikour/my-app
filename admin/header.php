<html>
    <head>
        <title>
            Admin Dashboard
        </title>
        <link rel="stylesheet" href="<?php echo ADMIN_URL.'/stylesheets/style.css'; ?>">
    </head>
    <body>
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="main">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="<?php echo ADMIN_URL.'/users.php'; ?>">
                            Users
                        </a>
                        
                        
                    </li>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo ADMIN_URL.'/users.php'; ?>">
                                All Users
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_URL.'/new_user.php'; ?>">
                                New User
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="<?php echo ADMIN_URL.'/all_pages.php'; ?>">
                            Pages
                        </a>
                        
                    </li>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo ADMIN_URL.'/all_pages.php'; ?>">
                                All Pages
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_URL.'/new_page.php'; ?>">
                                New page
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="<?php echo ADMIN_URL.'/all_posts.php'; ?>">
                            Posts
                        </a>
                        
                    </li>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo ADMIN_URL.'/all_posts.php'; ?>">
                                All Posts
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo ADMIN_URL.'/new_post.php'; ?>">
                                New Post
                            </a>
                            
                        </li>
                    </ul>
                </ul>
            </div>