<?php
if (session_id() =='')
    session_start () ;

if(!isset($_POST['textbox'] )) 
    return FALSE;

if($_POST['textbox'] == '' )
    return FALSE ;
 
$userFile = dirname(__FILE__)."/../../modular/apis/user_apis.php";
if(is_file($userFile)) require_once $userFile ;
 
$emailList = "'" ;
$user_apis = new user_apis();
$emails = $user_apis->user_application_apis_get_all();
for($i=0; $i< count($emails);$i++){
    if($emails[$i]->email != $_SESSION['user_info']['email'])
    {
       $emailList .=  $emails[$i]->email;
       
       if($i != (count($emails) -2))
           $emailList .=  ',' ;
    }
        
}
$emailList  .=  "'";
  $emailList ;
 $to = $emailList  ;
 $subject = 'Courses';
 $headers = "From: Courses@mail.com\r\n";
$headers .= "Reply-To: Courses@mail.com\r\n";
$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body>';
$message .= '<h1>'.$_POST['textbox'].'</h1>';
$message .= '</body></html>';
 if(mail($to, $subject, $message, $headers))
     header("location: ../mail.php");
 else 
     echo "Email was not sent";
?>
