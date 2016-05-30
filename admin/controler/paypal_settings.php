<?php
 
if(!isset($_POST['website-paypal-client-id']))
    return false ;
if(!isset($_POST['website-paypal-secret-id']))
    return false ;
if(!isset($_POST['website-paypal-mode']))
    return false ;

if( $_POST['website-paypal-client-id']=='')
    return false ;
if( $_POST['website-paypal-secret-id']=='')
    return false ;
if( $_POST['website-paypal-mode']=='')
    return false ;

$arr = [];
$arr['client_id']=$_POST['website-paypal-client-id'];
$arr['client_secret']=$_POST['website-paypal-secret-id'];
$arr['mode']=$_POST['website-paypal-mode'];

  $paypal_module = dirname(__FILE__)."/../../modular/apis/paypal_setting_apis.php";
          if(is_file($paypal_module ))  require_once  $paypal_module ;
          
          $paypal = new paypalsetting_apis() ;
        $pa =   $paypal->paypalsetting_application_add_new_field($arr);
        if($pa) echo 'Paypal Added Success';
?>
