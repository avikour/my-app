<?php
    session_start();
    require_once("../functions.php");

    function admin_header() {
        include_once(ADMIN_PATH."/header.php");
    }

    function admin_footer() {
        include_once(ADMIN_PATH."/footer.php");
    }