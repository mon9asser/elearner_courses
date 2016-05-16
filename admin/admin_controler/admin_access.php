<?php
    ob_start() ;
    if(session_id() =='')
        session_start () ;
    
    if(!isset($_SESSION['user_info']))
        header ("location: ../../index.php");
    
    
    // get user file Apps 
    $user_access = dirname(__FILE__).'/../../modular/apis/user_apis.php';
    if(is_file($user_access )) require_once $user_access ;
    
    $user_apps = new user_apis();
    
     
    
    //check if this user activated
    
    // check if this is disabled 
    
    // check if this user admin

    
    session_write_close() ;
    ob_end_flush() ;
?>