<?php
 
 
 // cehck if session exist 
 if(!isset($_SESSION['user_info']))
    {
         header("location: ../logout.php");
        exit(1);
    }
  if((int) $_SESSION['user_info']['id'] == 0)
      {
         header("location: ../logout.php");
        exit(1);
    }
  $user_files = dirname(__FILE__)."/../modular/apis/user_apis.php";
   if(is_file( $user_files))   require_once $user_files  ;
    
   $user_apis = new user_apis();
   
// check if this user NULL or not
$user_exist = $user_apis->user_application_check_exist(['id'=>$_SESSION['user_info']['id']]); 
if($user_exist == NULL )
     {
         header("location: ../logout.php");
        exit(1);
    }
//check if this user deleted
if($user_exist->is_deleted == 1 )
    {
        header("location: ../undefine.php");
        exit(1);
    }
// check if this user disabled 
if($user_exist->is_disabled == 1 )
    {
        header("location: ../disabled.php");
        exit(1);
    }
    
    
 
?>
