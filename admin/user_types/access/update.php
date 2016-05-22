<?php
    ob_start() ;
    if(session_id()=='')
        session_start () ;
    
    if(!isset($_POST)){
        return false ;
        exit(1);
    }
    
    if(!isset($_POST['type']))
        return false ;
    
    if(!isset($_POST['user_id']))
        return false ;
    
    $user_id = trim($_POST['user_id']);
    
    $user_files = dirname(__FILE__)."/../../../modular/apis/user_apis.php";
    if(is_file($user_files)) require_once $user_files ;
    
    $user_application = new user_apis();
    
    switch (trim($_POST['type'])) {
            case 'DISABLE_ACCESS':
                $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                if($userExist != NULL){
                   $value = 0 ;
                  if( $userExist->is_disabled == 0 ) 
                       $value = 1 ;
                    $user_update = $user_application->user_application_update_fields(['id'=>$user_id],['is_disabled'=> $value]);
                    if($user_update)
                    {   
                        $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                        echo $userExist->is_disabled ;
                        return false ;
                    }
                }
                
              break;
            case 'DELETE_ACCESS':
                $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                if($userExist != NULL){
                   $value = 0 ;
                  if( $userExist->is_deleted == 0 ) 
                       $value = 1 ;
                    $user_update = $user_application->user_application_update_fields(['id'=>$user_id],['is_deleted'=> $value]);
                    if($user_update)
                    {   
                        $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                        echo $userExist->is_deleted ;
                        return false ;
                    }
                }
              break;
             case 'ADMIN_ACCESS':
                 $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                if($userExist != NULL){
                   $value = 0 ;
                  if( $userExist->is_admin == 0 ) 
                       $value = 1 ;
                    $user_update = $user_application->user_application_update_fields(['id'=>$user_id],['is_admin'=> $value]);
                    if($user_update)
                    {   
                        $userExist = $user_application->user_application_check_exist(['id'=>$user_id]);
                        echo $userExist->is_admin ;
                        return false ;
                    }
                }
              break;
        }
    
    ob_end_flush() ;
?>