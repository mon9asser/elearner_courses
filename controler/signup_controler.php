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
          return $this->sign_up_new_user($args) ;
    }
    
     private function sign_up_new_user ($args = []){
          $this->arguments = [
            'first_name'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['fname'] ))), 
            'second_name'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['sname']))) ,
            'email'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['euser'] ))),
            'password'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim(md5($args['puser'])))) ,
            'mobile'=>mysqli_real_escape_string($this->open_connection(), strip_tags(trim($args['muser'] )))
         ];
        $errorList = [] ;
        
        if($this->arguments['first_name'] =='')
        {
             $errorList[] = "First name is required";
        }
        if($this->arguments['second_name']=='')
        {
             $errorList[] = "Second name is required";
        }
        if($this->arguments['email']=='')
        {
             $errorList[] = "Email is required";
        }     
        if($this->arguments['password']=='')
        {
            $errorList[] = "Password is required";
        }
        if(!filter_var($this->arguments['email'] , FILTER_VALIDATE_EMAIL))
        {
            $errorList[] = "This email does not valid";
        }
        
        
        if(count($errorList) != 0)
        {
             ?>
                <ul>
                    <?php for ($i=0; $i < count($errorList); $i++){ ?>
                        <li><?php echo $errorList[$i];?></li>
                    <?php } ?>
                </ul>
             <?php
             return false ;
        }
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
               $user_info = [
                    'id' => $user_add_new_f->id,
                    'first_name' => $user_add_new_f->first_name,
                    'second_name'=> $user_add_new_f->second_name,
                    'curr_activation_code'=> $user_add_new_f-> curr_activation_code,
                    'is_admin'=> $user_add_new_f->is_admin,
                    'is_disabled'=> $user_add_new_f->is_disabled
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

session_write_close() ;
ob_end_flush() ;
?>
