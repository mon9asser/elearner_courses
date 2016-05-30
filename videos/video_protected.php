<?php
     ob_start() ;
     if(session_id() =='')
         session_start () ;
    
     if(!isset($_SESSION['user_info']))
     {
         header ('location: ../undefine_access.php');
         exit(1);
     }
     
     if(!isset($_GET['lesson_id']))
     {
         header ('location: ../undefine_access.php');
         exit(1);
     }
     
     
     $file_tutorials = dirname(__FILE__)."/../modular/apis/course_tutorial_key_apis.php";
     if(is_file($file_tutorials)) require_once $file_tutorials ;
     $file_lessons = dirname(__FILE__)."/../modular/apis/video_tuts_apis.php";
     if(is_file($file_lessons )) require_once $file_lessons  ;
     
     
     
     
   $user_id ;
   $lesson_id = $_GET['lesson_id'] ; 
   $tutorial_id ;
   $transaction_id ;
   
   
     $lesson_modul = new course_tuts_apis();
     $lesson = $lesson_modul->videotuts_application_check_exist(['id'=>$lesson_id]);
   
     
    $file = '../admin/tutorials_video/'.$lesson->lesson_video_url;
     header('Content-Type: '.$lesson->file_type.'/'.$lesson->file_name); 
    echo file_get_contents(addslashes( $file  ));
 ob_end_flush(); 
    
 ?>
