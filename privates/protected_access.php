<?php

 
 ob_start();
 if(session_id() =='')
     session_start () ;
 
     // check about public access 
     $public_file = dirname(__FILE__)."/public_access.php";
     if(is_file($public_file)) require_once $public_file ;
    
       
     // checl if this admin 
     if( $_SESSION['user_info']['is_admin'] != 1)
     {
          header("location: ../index.php");
          exit(1);
     }
     
 session_write_close() ;
 ob_end_flush();
?>