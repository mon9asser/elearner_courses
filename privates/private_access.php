<?php
 /*
  * This acess for define who is paid to course , to secure all courses without paid 
  */

 ob_start();
 if(session_id() =='')
     session_start () ;
 // check about public access 
     $public_file = dirname(__FILE__)."/public_access.php";
     if(is_file($public_file)) require_once $public_file ;
    
     
 session_write_close() ;
 ob_end_flush();
?>
