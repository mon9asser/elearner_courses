 <?php
     ob_start() ;
     if(session_id() =='')
         session_start () ;
 if(!isset($_POST))
     return false ;
 
 
 $all_fileds = [] ;
  $webSettingFiles = dirname(__FILE__)."/../modular/config/elearner_courses_db.php";
  if(is_file($webSettingFiles))  require_once $webSettingFiles ;
  $connection = new database() ;

 
 if(isset($_POST['first_name']))
    {
        if($_POST['first_name'] != '' )
            $all_fileds['first_name'] = mysqli_real_escape_string ($connection->open_connection () , trim($_POST['first_name']));
    }    
 
if(isset($_POST['second_name']))
    {
        if($_POST['second_name'] != '')
            $all_fileds['second_name'] = mysqli_real_escape_string ($connection->open_connection () , trim( $_POST['second_name'])) ;
    }

    
    
if(isset($_POST['email']))    
    {
        if($_POST['email'] !='' && !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL))
            $all_fileds['email'] = mysqli_real_escape_string ($connection->open_connection () , trim($_POST['email'])) ;
    }
    
 
    
if(isset($_POST['mobile']))    
    {
        if($_POST['mobile'] !='')
            $all_fileds['mobile'] = mysqli_real_escape_string ($connection->open_connection () , trim($_POST['mobile'] ));
    }
    
 
 $webSettingFiles = dirname(__FILE__)."/../modular/apis/user_apis.php";
 if(is_file($webSettingFiles )) require_once $webSettingFiles ;
 
 $user_apis = new user_apis();
 $userExist = $user_apis->user_application_check_exist(['id'=>$_SESSION['user_info']['id']]);
 if($userExist == NULL )
     return false ;
 
 
 if(isset($_POST['old_password'])) {
     if($_POST['old_password'] != '')
     {
         if (trim(md5($_POST['old_password'])) == $userExist->password ){
             if(isset($_POST['new_password']))
             {
                 if($_POST['new_password'] != '')
                  $all_fileds['password'] = $_POST['new_password'] ;
             }
         }else {
             echo "<span color='tomato'>old password not matched with in our database</span>";
             return false ;
         }
     }
 }
    
  //image/jpeg
 //image/png
   

 if(isset($_FILES['profile_picture'])) {
     if($_FILES['profile_picture'] != '' )
     {
         
          if($_FILES['profile_picture']['type'] != "image/jpeg" and  $_FILES['profile_picture']['type'] != "image/png" )
            {
               echo "<span color='tomato'>We not support this image please provide us with jpg or png image</span>";
               return false ;

            } 

         if($_FILES['profile_picture'] ['size'] < 40000 )
         {
              
             $blob = file_get_contents(addslashes($_FILES['profile_picture']['tmp_name']));
             $dir = dirname(__FILE__)."/../user_images/".rand(100,500000)."_ID".$userExist->id."_".$_FILES['profile_picture']['name'] ;
             $all_fileds['avatar'] = $blob  ;
             
             if( ! move_uploaded_file($_FILES['profile_picture']['tmp_name'] , $dir ))
             {
                 echo "<span color='tomato'>There are an error in upload file , please try later .. </span>";
                 return false ;
             }
           $upsd =  $user_apis->user_application_update_fields(['id'=>$_SESSION['user_info']['id']] , $all_fileds )    ;    
           if($upsd) echo "<span color='green'>Updated success</span>";
         }
         else {
             echo "<span color='tomato'>This image is too large , please provide use an image less than 40 kb</span> ";
         }
     }
 }
    
     
 ?>