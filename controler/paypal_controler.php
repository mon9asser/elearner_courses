<?php
   ob_start() ;
   
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
        
        
        
    // autoload Paypal sdk
    $bootstrapPaypal = dirname(__FILE__). '/paypal_bootstrap.php'; 
    if(is_file($bootstrapPaypal )) require_once $bootstrapPaypal  ;
    
    use PayPal\Api\Amount; 
    use PayPal\Api\Details; 
    use PayPal\Api\Item; 
    use PayPal\Api\ItemList; 
    use PayPal\Api\Payer; 
    use PayPal\Api\Payment; 
    use PayPal\Api\RedirectUrls; 
    use PayPal\Api\Transaction;
    
    $payer = new Payer(); 
    $payer->setPaymentMethod("paypal");
    
    $item1 = new Item();
    $item1->setName(trim($course_title->course_name)) 
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") 
// Similar to `item_number` in Classic API
            ->setPrice( trim($course_title->course_price) ); 
 
    
    $itemList = new ItemList(); 
    $itemList->setItems(array($item1));
    
    $details = new Details(); 
    $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(trim($course_title->course_price));
    
    $amount = new Amount(); 
    $amount->setCurrency("USD") 
            ->setTotal(trim($course_title->course_price))
            ->setDetails($details);
    
    $transaction = new Transaction(); 
    $transaction->setAmount($amount) 
            ->setItemList($itemList)
            ->setDescription($course_title->course_description) 
            ->setInvoiceNumber(uniqid());
    
    $baseUrl = getBaseUrl(); $redirectUrls = new RedirectUrls(); 
    $redirectUrls->setReturnUrl("$baseUrl/Execute_payment_controler.php?success=true&course_id=".$_GET['course_id']) 
            ->setCancelUrl("$baseUrl/Execute_payment_controler.php?success=false&course_id");
    
    $payment = new Payment();
    $payment->setIntent("sale") 
            ->setPayer($payer) 
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
    
    $request = clone $payment;
    
    try { $payment->create($apiContext); } catch (Exception $ex) {
    //    print ("Created Payment Using PayPal. Please visit the URL to Approve."."Payment". null.$request. $ex); 
        exit(1);
    }
    $approvalUrl = $payment->getApprovalLink();
   // print ("Created Payment Using PayPal. Please visit the URL to Approve.". "Payment"."<a href='$approvalUrl' >$approvalUrl</a>". $request. $payment); 
  
   header('location: '. $approvalUrl) ;
   ob_end_flush();
?>