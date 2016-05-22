<?php 
ob_start() ;
if(session_id() =='' )
    session_start () ;
/*
 * Description of login_controler
 *
 * @author Montasser Mossallem
 */
$db_file = dirname(__FILE__)."/../modular/config/elearner_courses_db.php" ;
if(is_file($db_file))
    require_once $db_file ;
class login_controler extends database {
    
    private $email ;
    private $password ;
    
    public function __construct($args=[]) {
        $this->email = $args['user_mail'] ;
        $this->password = $args['user_password'];
        
        return $this->login_to_user_account() ;
    }
    
    private function login_to_user_account(){
       if($this->email == '' and $this->password =='')
        {
            echo "FIELDS_ARE_EMPTY" ;
            return false ;
        }
        
        $user_access = dirname(__FILE__).'/../modular/apis/user_apis.php';
       if(is_file($user_access )) require_once $user_access ;
       
       $user_apps = new user_apis(); 
       
       if(!filter_var($this->email , FILTER_VALIDATE_EMAIL))
        {
           echo 'THIS_IS_NOT_EMAIL';
           return false ;
        }
 
        // check if this email exists 
       $user_exists = $user_apps ->user_application_check_exist([
           'email'=> mysqli_real_escape_string($this->open_connection(), strip_tags(trim(  $this->email) )) ,
           'password' => mysqli_real_escape_string($this->open_connection(), strip_tags(trim(md5( $this->password)))) ,
       ]);
       if($user_exists == NULL )
       {
           echo "USER_DOES_NOT_EXISTS";
           return false ;
       }
       if($user_exists == NULL ) 
       {
           header('location: ../index.php');
           exit(1);
       }
        $user_info = [
           'id' => $user_exists->id,
           'first_name' => $user_exists->first_name,
           'second_name'=> $user_exists->second_name,
           'curr_activation_code'=> $user_exists-> curr_activation_code,
           'is_admin'=> $user_exists->is_admin,
           'email'=> $user_exists->email,
           'is_disabled'=> $user_exists->is_disabled
               
       ] ;
       $_SESSION['user_info'] = $user_info  ;
      if($user_exists != NULL )
          echo "LOGIN_SUCCESS";
      
    }
    
}

$mail = $_POST['email'] ;
$pass = $_POST['password'] ;
if(isset($mail))
{
   if($mail == NULL )
   {
       echo "EMAILS_REQUIRED";
       return false ;
   }
   
}


if(isset($pass))
{
   if($pass == NULL )
   {
       echo "PASSWORD_REQUIRED";
       return false ;
   }
   
}

if ($pass != '' and $mail !='')
{
    $args  = [
        'user_mail'=>$mail , 
        'user_password'=>$pass
    ];
    
   new login_controler($args);
}
//user_password
session_write_close() ;
ob_end_flush() ;
?>
