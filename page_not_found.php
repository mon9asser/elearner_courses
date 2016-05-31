<?php
ob_start();
if(session_id() =='')
     session_start ();
 ?>
 <?php

            $fileAccss = dirname(__FILE__)."/privates/private_access.php";
            if(is_file($fileAccss ))    require_once $fileAccss  ;

      ?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTMl>
<html>
<head>
<title>404</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Strait' rel='stylesheet' type='text/css'>
</head>
<body>
	
			<div class="wrap">
				<h1>Courses</h1>
				<div class="banner"><img src="images/fuel-404-logo.png" alt="" /></div>
				<div class="search">
                                    <a href="index.php" class="goLink"></a>
				</div>
			<div class="copy">
	    		 
	    	</div>
			</div>
	    	
</body>
</html>    

<?php
      ob_end_flush();
?>