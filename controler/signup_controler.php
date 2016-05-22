<?php
 ob_start() ;
if(session_id() =='' )
    session_start () ;

/**
 * Description of signup_controler
 *
 * @author Montasser Mossallem
 */

$db_file = dirname(__FILE__)."/../modular/config/elearner_courses_db.php" ;
if(is_file($db_file))
    require_once $db_file ;

class signup_controler extends database {
    private $arguments = [] ;
    
    public function __construct($args = []) {
       return $this->sign_up_new_user( $args );
    }
    
     private function sign_up_new_user ($args = []){ 
          $this->arguments = [
            'first_name'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['fname'] ))), 
            'second_name'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['sname']))) ,
            'email'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['euser'] ))),
            'password'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim(md5($args['puser'])))) ,
            'mobile'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['muser'] )))
         ];
         
          $user_access = dirname(__FILE__).'/../modular/apis/user_apis.php';
       if(is_file($user_access )) require_once $user_access ;
       $user_apps = new user_apis();
        // check if this email exists 
       $user_exists = $user_apps ->user_application_check_exist([
           'email'=> mysqli_real_escape_string($this->open_connection(), strip_tags(trim( $this->arguments['email'] ) ))  
        ]);
       if($user_exists == NULL )
       {
          $user_add_new_f =  $user_apps->user_application_add_new_field( $this->arguments );
          if($user_add_new_f) 
          {
              echo "SIGNED_UP_SUCCESS";
              $user_new_get_info = $user_apps ->user_application_check_exist([
                    'email'=> mysqli_real_escape_string($this->open_connection(), strip_tags(trim( $this->arguments['email'] ) ))  
                 ]);
               $user_info = [
                    'id' => $user_new_get_info->id,
                    'first_name' => $user_new_get_info->first_name,
                    'second_name'=> $user_new_get_info->second_name,
                    'email'=> $user_new_get_info->email,
                    'curr_activation_code'=> $user_new_get_info-> curr_activation_code,
                    'is_admin'=> $user_new_get_info->is_admin,
                    'is_disabled'=> $user_new_get_info->is_disabled
                ] ;
               $_SESSION['user_info'] = $user_info ;
          }
          
       }else 
       {
           echo "THIS_USER_IN_OUR_DATABASE";
           return false ;
       }
        
          return TRUE ;
       
    }
}



/*
$val = new signup_controler([
            'fname'=> "Islam" , 
            'sname'=>"Labeeb",
            'euser'=>"Islam@gmail.com" ,
            'puser'=>"666666" ,
            'muser'=>"0101654" 
 ]);
*/

 
 // new signup_controler() ;
    
  $firstName =  $_POST['fname'] ;
  $scondName =  $_POST['sname'] ;
  $emailName =  $_POST['euser'] ;
  $pass =  $_POST['puser'] ;
  $mobile =   $_POST['muser'] ;
  $args = [] ;
  if(isset($firstName)) {
      if($firstName != NULL )
      $args['fname'] = $_POST['fname'] ;
      else 
      {
           echo "FNAME_REQUIRED";
           return false ;
      }
         
      
  } 
  if(isset($scondName)) {
        if($scondName != NULL )
       $args['sname'] = $_POST['sname'] ;
        else
            { 
                echo "SNAME_REQUIRED"; 
                 return false ;
             }
        
  }
  if(isset($emailName)) {
      if($emailName != NULL )
       $args['euser'] = $_POST['euser'] ;
      else {echo "EMAIL_REQUIRED";return false ;}
      if(!filter_var($emailName , FILTER_VALIDATE_EMAIL))
              {echo "THIS_NOT_EMAIL";return false ;}
  }
  if(isset($pass)) {
      if($pass != NULL )
       $args['puser'] = $_POST['puser'] ;
      else {echo "PASS_REQUIRED";return false ;}
  }
  if(isset($mobile)) {
       $args['muser'] = $_POST['muser'] ;
  }
  
  
  
   
   if($firstName != NULL && $scondName != NULL && $emailName != NULL && $pass )
        new signup_controler($args);
   
session_write_close() ;
ob_end_flush() ;
?>
