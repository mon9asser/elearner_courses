<?php
ob_start() ;
if(session_id()=='')
    session_start () ;

if(!isset($_SESSION['user_info'])) {
   header ("location : ../undefine_access.php"); 
   exit(1);
}
    
// autoload Paypal sdk
    $bootstrapPaypal = dirname(__FILE__). '/paypal_bootstrap.php'; 
    if(is_file($bootstrapPaypal )) require_once $bootstrapPaypal  ;
    
    
use PayPal\Api\Amount; 
use PayPal\Api\Details; 
use PayPal\Api\ExecutePayment; 
use PayPal\Api\Payment; 
use PayPal\Api\PaymentExecution; 
use PayPal\Api\Transaction;


 
   if(!isset($_GET['course_id']))
   {
       header('location: ../undefine_access.php');
       exit(1);
   }
   
   $ids = (int) trim($_GET['course_id'])  ;
    if($ids == 0)
   {
       header('location: ../undefine_access.php');
       exit(1);
   }
   
   $targget_course = dirname(__FILE__)."/target_course.php";
        if(is_file( $targget_course)) require_once  $targget_course ;
     
        
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $paymentId = $_GET['paymentId']; 
    $payment = Payment::get($paymentId, $apiContext);
   
    $execution = new PaymentExecution(); 
    $execution->setPayerId($_GET['PayerID']);
    
    $transaction = new Transaction();
    $amount = new Amount(); 
    $details = new Details();
    
    $details->setShipping(0) 
            ->setTax(0)
            ->setSubtotal($course_title->course_price);
    
    $amount->setCurrency('USD');
    $amount->setTotal($course_title->course_price);
    $amount->setDetails($details); 
    $transaction->setAmount($amount);
    
     $execution->addTransaction($transaction);
     
     try {
                 $result = $payment->execute($execution, $apiContext);
            //      print ("Executed Payment". "Payment". $payment->getId(). $execution. $result);
                  try { $payment = Payment::get($paymentId, $apiContext); } catch (Exception $ex) {
          //             print("Get Payment". "Payment". null. null. $ex); exit(1);
                  }
     }
      catch (Exception $ex)  {
        //   print("Executed Payment". "Payment". null. null. $ex); exit(1);
      }
      
      //print("Get Payment". "Payment". $payment->getId(). null. $payment); 
      
    
     $payment_id =  trim($payment->id);
     $payment_email =  trim($payment->payer->payer_info->email);
     $firstName = trim($payment->payer->payer_info->first_name);
     $lastName =  trim($payment->payer->payer_info->last_name);
     $payerId =  trim($payment->payer->payer_info->payer_id);
     $recipient_name =  trim($payment->payer->payer_info->shipping_address->recipient_name);
     $city = trim($payment->payer->payer_info->shipping_address->city);
     $country_code = trim($payment->payer->payer_info->shipping_address->country_code);
      
     $courseId = $_GET['course_id'] ;
     $coursePrice =  $course_title->course_price ;
     $user_id  = $_SESSION['user_info']['id']  ; 
     
     $listArr = [
        'user_id'=> trim($user_id), 
        'course_id'=>trim($courseId),
        'payment_id'=>trim($payment_id),
        'payer_id'=>trim($payerId),
        'course_price'=>trim($courseId),
        'payment_email'=>trim($payment_email),
        'first_name'=>trim($firstName),
        'last_name'=>trim($lastName),
        'recipient_name'=>trim($recipient_name),
        'city'=>trim($city),
        'country_code'=>trim($country_code),
         'datemade'=>  time()
     ];
      $transaction_file = dirname(__FILE__)."/../modular/apis/transactions_apis.php";
      if(is_file($transaction_file)) require_once $transaction_file  ;
     
      $transaction_apis = new transactions_apis();
     $trans =  $transaction_apis->transactions_add_new_field($listArr);
     if($trans)
        {
            header("location: ../transactions.php");
            exit(1);
        }else {
            header("location: ../undefine_access.php");
            exit(1);
        }
}else { 
    print ("User Cancelled the Approval <a href='../index.php'>Click here to back </a>". null); 
    exit; 

}
ob_end_flush() ;
?>
