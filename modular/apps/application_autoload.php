<?php
    $get_application = dirname(__FILE__)."/get_application.php";
    if(is_file($get_application))    require_once $get_application;
 
    $add_application = dirname(__FILE__)."/add_application.php";
    if(is_file($add_application))    require_once $add_application;
 
    $update_application = dirname(__FILE__)."/update_application.php";
    if(is_file($update_application))    require_once $update_application;
    
    $delete_application = dirname(__FILE__)."/delete_application.php";
    if(is_file($delete_application))    require_once $delete_application;
?>
