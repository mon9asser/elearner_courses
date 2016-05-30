<?php
 /*
  * This acess for define who is paid to course , to secure all courses without paid 
  */
@ob_start();
 if(session_id() =='')
     session_start () ;
 // check about public access 
     $public_file = dirname(__FILE__)."/../modular/apis/website_setting_apis.php";
     if(is_file($public_file)) require_once $public_file ;
 
     
     $file_apis = new website_setting_apis();
     $setting = $file_apis->websitesetting_application_apis_get_all();
     if(count($setting) !=0 )
     {
         
         if($setting[count($setting )-1]->is_offline == 1){
             header("location: availability.php");
             exit();
         }
     }
 session_write_close() ;
 ob_end_flush();
?>
