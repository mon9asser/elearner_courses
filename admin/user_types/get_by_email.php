<?php
    
    $email = trim($_POST['email']);
    
    $user_file = dirname(__FILE__)."/../../modular/apis/user_apis.php";
    if(is_file($user_file))    require_once $user_file;
    
    
    $user_apis = new user_apis();
    $user_application = $user_apis->user_application_check_exist(['email'=>$email]);
    if($user_application == NULL )
    {
        echo "<center><b style='padding:10px;display:block;'>This user does not exist ...<b/></center>";
        return false ;
    }
?>
<div class="spanx6" style="width: 830px;">
     <div style="background-image: url(../user_images/man_avatar.jpg);" class="img-block"></div>
         <div class="user-info-block">
            <b><?php echo $user_application->first_name .' '. $user_application->second_name; ?></b>
            <div class="clearfix"></div>
            <span>Email :- <?php echo $user_application->email; ?></span>
            <div class="clearfix"></div>
            <span>Mobile :- <?php if( $user_application->mobile != NULL )   echo $user_application->mobile; else echo 'not available ..';  ?></span>
            <div class="clearfix"></div>
           <div class="user-access">
               <a user-id="<?php echo $user_application->id;?>" onclick="admin_access(this);" class="adminAccess" style="background: <?php if($user_application->is_admin == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application->is_admin == 0) echo 'Make'; else echo 'Remove';?> admin</a>
               <a user-id="<?php echo $user_application->id;?>" onclick="disable_access(this);" class="adminAccess" style="background: <?php if($user_application->is_disabled == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application->is_disabled == 0) echo 'Disable'; else echo 'Undisable';?></a>
               <a user-id="<?php echo $user_application->id;?>" onclick="delete_access(this);" class="adminAccess" style="background: <?php if($user_application->is_deleted == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application->is_deleted == 0) echo 'Delete'; else echo 'Undelete';?></a>
           </div>
</div>