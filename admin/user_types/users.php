<?php
    $user_file = dirname(__FILE__)."/../../modular/apis/user_apis.php";
    if(is_file($user_file))    require_once $user_file;
    
    
    $user_apis = new user_apis();
    $user_application = $user_apis->user_application_get_by_values(['is_admin'=>0], 'and') ;
     
?>
<?php 
    if(count($user_application) == 0)
    {
        ?>
            <div class="spanx6">
                    There are no users
            </div>
        <?php
    }else {  
        for ($i=0; $i<count($user_application);$i++)
            {
 ?>
<div class="spanx6">
         <div style="background-image: url(../user_images/man_avatar.jpg);" class="img-block"></div>
         <div class="user-info-block">
            <b><?php echo $user_application[$i]->first_name .' '. $user_application[$i]->second_name; ?></b>
            <div class="clearfix"></div>
            <span>Email :- <?php echo $user_application[$i]->email; ?></span>
            <div class="clearfix"></div>
            <span>Mobile :- <?php if( $user_application[$i]->mobile != NULL )   echo $user_application[$i]->mobile; else echo 'not available ..';  ?></span>
            <div class="clearfix"></div>
           <div class="user-access">
               <a user-id="<?php echo $user_application[$i]->id;?>" onclick="admin_access(this);" class="adminAccess" style="background: <?php if($user_application[$i]->is_admin == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application[$i]->is_admin == 0) echo 'Make'; else echo 'Remove';?> admin</a>
               <a user-id="<?php echo $user_application[$i]->id;?>" onclick="disable_access(this);" class="adminAccess" style="background: <?php if($user_application[$i]->is_disabled == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application[$i]->is_disabled == 0) echo 'Disable'; else echo 'Undisable';?></a>
               <a user-id="<?php echo $user_application[$i]->id;?>" onclick="delete_access(this);" class="adminAccess" style="background: <?php if($user_application[$i]->is_deleted == 0) echo 'tomato'; else echo 'teal';?>;"><?php if($user_application[$i]->is_deleted == 0) echo 'Delete'; else echo 'Undelete';?></a>
           </div>
        </div>
</div>
    <?php } ?>
 <?php } ?>

<script src ="scripts/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        window.admin_access = function (data){
            var userId = $(data).attr('user-id');
            
            var dataString = {
                'type':'ADMIN_ACCESS' ,
                'user_id':userId
            }
            
            $.ajax({
                url : 'user_types/access/update.php' ,
                data : dataString ,
                type : 'POST' ,
                success : function (resposed){
                   var returned_data =  $.trim(resposed);
                   if(returned_data == 0 )
                       {
                           $(data).css('background','tomato');
                           $(data).html('Make admin');
                       }
                       
                   else 
                       {
                           $(data).css('background','teal');
                           $(data).html('Remove admin');
                       }
                }
            });
        }
        window.disable_access = function (data){
            var userId = $(data).attr('user-id');
            
            var dataString = {
                'type':'DISABLE_ACCESS' ,
                'user_id':userId
            }
           
            $.ajax({
                url : 'user_types/access/update.php' ,
                data : dataString ,
                type : 'POST' ,
                success : function (resposed){
                    var returned_data =  $.trim(resposed);
                    if(returned_data == 0 )
                       {
                           $(data).css('background','tomato');
                           $(data).html('Disable');
                       }
                       
                   else 
                       {
                           $(data).css('background','teal');
                           $(data).html('Undisable');
                       }
                }
            });
        }
        window.delete_access = function (data){
            var userId = $(data).attr('user-id');
            
            var dataString = {
                'type':'DELETE_ACCESS' ,
                'user_id':userId
            }
            
            $.ajax({
                url : 'user_types/access/update.php' ,
                data : dataString ,
                type : 'POST' ,
                success : function (resposed){
                     var returned_data =  $.trim(resposed);
                    if(returned_data == 0 )
                       {
                           $(data).css('background','tomato');
                           $(data).html('Delete');
                       }
                       
                   else 
                       {
                           $(data).css('background','teal');
                           $(data).html('Undelete');
                       }
                }
            });
        }
    });
    
</script>