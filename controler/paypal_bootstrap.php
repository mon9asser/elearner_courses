<?php


// PAYPAL SDK
$paypal_file = dirname(__FILE__)."/../modular/lib/paypal/vendor/autoload.php";
if(is_file($paypal_file )) require_once $paypal_file  ;

$common_file = dirname(__FILE__)."/common.php";
if(is_file($common_file )) require_once $common_file  ;

$paypal_file_setting = dirname(__FILE__)."/../modular/apis/paypal_setting_apis.php";
if(is_file($paypal_file_setting)) require_once $paypal_file_setting ;

$paypalApis = new paypalsetting_apis() ;
$paypalGet = $paypalApis->paypalsetting_application_apis_get_all();

 $clientId = $paypalGet [count($paypalGet )-1]->client_id ;
 $clientSecret = $paypalGet [count($paypalGet )-1]->client_secret ;
 $mode = $paypalGet [count($paypalGet )-1]->mode ;
 //$return_url = "http://localhost/elearner_courses/controler/Execute_payment_controler.php";
 
 
  

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

error_reporting(E_ALL);
ini_set('display_errors', '1');


/** @var \Paypal\Rest\ApiContext $apiContext */
$apiContext = getApiContext($clientId, $clientSecret,$mode);

return $apiContext;
/**
 * Helper method for getting an APIContext for all calls
 * @param string $clientId Client ID
 * @param string $clientSecret Client Secret
 * @return PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $mode = NULL )
{

    // #### SDK configuration
    // Register the sdk_config.ini file in current directory
    // as the configuration source.
    /*
    if(!defined("PP_CONFIG_PATH")) {
        define("PP_CONFIG_PATH", __DIR__);
    }
    */


    // ### Api context
    // Use an ApiContext object to authenticate
    // API calls. The clientId and clientSecret for the
    // OAuthTokenCredential class can be retrieved from
    // developer.paypal.com

    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            $clientId,
            $clientSecret
        )
    );

    // Comment this line out and uncomment the PP_CONFIG_PATH
    // 'define' block if you want to use static file
    // based configuration

    $apiContext->setConfig(
        array(
            'mode' => $mode ,
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'DEBUG', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
            'cache.enabled' => true,
            // 'http.CURLOPT_CONNECTTIMEOUT' => 30
            // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
        )
    );

    // Partner Attribution Id
    // Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
    // To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
    // $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');

    return $apiContext;
}
 
?>
