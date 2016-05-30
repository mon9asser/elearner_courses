
 <?php

            $fileAccss = dirname(__FILE__)."/privates/private_access.php";
            if(is_file($fileAccss ))    require_once $fileAccss  ;

      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link href="css/home.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      
      <!-- ----------------------------------------------------------------------------------- -->
      <!-- ------------------------------------- HEADER -------------------------------------- -->
      <!-- ----------------------------------------------------------------------------------- -->
      <?php
        $header_file = dirname(__FILE__)."/parts/header.php";
        if(is_file($header_file))   require_once $header_file ;
      ?>
      
      
     
     <section class="container-fluid testmonalisa tester">
         <div class="container-fluid" style="margin-top: -30px; margin-left: 100px;">
              <div class="row">
                  <div class="col-xs-12">
                      <h1 style="color: #e60d2d;" class="headlin-feature-course">
                     <span class="main-name">My Transactions</span>
                        <div class="search-block"></div>
                      </h1>
                  </div>
                 
               </div> 
          </div>
         <div class="container">
             <?php
                $fileTransactions = dirname(__FILE__)."/modular/apis/transactions_apis.php";
                if(is_file($fileTransactions )) require_once $fileTransactions  ;
                
                $transCourses = new transactions_apis();
                $transaction_data = $transCourses->transactions_get_by_values([
                    'user_id' => $_SESSION['user_info']['id']
                ], 'and');
                
                $file_coursr = dirname(__FILE__)."/modular/apis/course_tutorial_key_apis.php";
                if(is_file($file_coursr)) require_once $file_coursr ;
                if(count($transaction_data) == 0 )
                    {
                        echo "<center> <h3>There are no transations </h3></center>";
                    }
        
                for ($i=count($transaction_data)-1; $i >= 0; $i--)
                {
                    ?>
                    <div class="row transactionBlock">
                            <div class="col-xs-12">
                                <div class="headline">
                                    <h3><?php
                                     $modul = new course_tutorial_title();
                                    $co_name = $modul->coursetutkey_application_check_exist(['id'=>$transaction_data[$i]->course_id]);
                                    if($co_name != NULL)
                                    print ($co_name->course_name);
                                    else echo "This Course Not available Now , Please try Later";
                                    ?></h3>
                                    <b class="paymentId"><font>Payment id :- </font><i><?php print ($transaction_data[$i]->payment_id); ?></i></b>
                                </div>
                                <div class="block-trans">
                                    <p class="text-center" style="overflow: hidden; font-family: arial , sans-serif; ">
                                        <?php
                                        if($co_name != NULL)
                                        {
                                            ?>
                                    <h1 style="padding: 0px;margin: 0px;">$<?php print ($co_name->course_price); ?></h1> 
                                            <?php
                                        } else echo "This Course Not available Now , Please try Later";
                                        ?>
                                    </p>
                                    <h5 style="display: block;width: 98%;text-align: center;" class="nameHeadline">
                                         <?php
                                            echo $transaction_data[$i]->payment_email;
                                        ?>
                                    </h5>
                                      <div class="clearFix"></div>
                                    <a href="http://localhost/elearner_courses/tuts.php?course_id=<?php echo$transaction_data[$i]->course_id ; ;?>" style="float: right; margin: 5px 0px 10px 0px" class="nameHeadline">
                                        <div class="btn btn-info">Go to this course</div>
                                    </a>
                                </div>
                            </div>
                        </div>
              
         
                    <?php
                }
             ?>
             </div>
        
     </section>
      
      <section class="feauture_skills">
          <div class="container text-left">
              <div class="row">
                  <div class="col-xs-12 col-md-8">
                      <h1 class="headlin-feature-course">
                        Feature courses
                      </h1>
                  </div>
                  <div class="col-xs-12 col-md-4 text-right">
                      <span class="btn btn-slider previouse">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i>
                      </span>
                       
                      <span class="btn btn-slider next">
                          <i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </span> 
                       
                  </div>
              </div>
            </div>
          <div class="container">
              <div class="single-item">
                  
                
                  
                   <?php 
                   $file_coursr = dirname(__FILE__)."/modular/apis/course_tutorial_key_apis.php";
                if(is_file($file_coursr)) require_once $file_coursr ;
                
                $file_category = dirname(__FILE__)."/modular/apis/category_apis.php";
                if(is_file($file_category)) require_once $file_category ;
                
                $modul = new course_tutorial_title();
                $course_title =  $modul->coursetutkey_application_apis_get_all() ;
                   
                   
                                     $is_featured_courses =  $modul->coursetutkey_application_get_by_values(['is_feature'=>1], 'and');

                   for($i=  count($is_featured_courses)-1; $i >= 0; $i--){ ?>
               
                  <a href="tuts.php?course_id=<?php echo $is_featured_courses[$i]->id;?>">
                    <div class="feauture-course-container text-center">
                        <div class="image-container">
                             <div style="background-image: url(<?php echo $is_featured_courses[$i]->course_intro_image; ?>);" class="img-course-block">
                             <div class="mask-layer-courses"></div>
                            </div>
                        </div>
                        <b class="course-name-container">
                              <?php
                                echo $is_featured_courses[$i]->course_name ;
                            ?>
                        </b>
                        <p class="Category text-left">
                            <b>
                                <?php
                                    $cat = new category_apis();
                                     $category =  $cat->category_apis_check_exist(['id'=>$is_featured_courses[$i]->category_id]);
                                     if($category != NULL )
                                         echo $category->category_name ;
                                ?>
                            </b>
                        </p>
                        <p class="descripe-course-feauture">
                            <span class="groups">
                                <i class="fa fa-group"></i>
                                15
                            </span>
                            <span class="price-course-feauture">
                                <i class="fa fa-usd" aria-hidden="true"></i>
                                 <?php
                                    echo $is_featured_courses[$i]->course_price ;
                                ?>
                             </span>
                        </p>
                    </div>
                </a>
                  
                   
                   
                   
                <?php } ?>
                  
                  
                  
                  
                  
                </div>
                   
              </div>
   
      </section>
      
       <!-- -------------------------------------------------------------- -->
      <!-- ------------------------- Footer ----------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <?php
        $footer_file = dirname(__FILE__)."/parts/footer.php";
        if(is_file($footer_file )) require_once $footer_file  ;
      ?>
      
      
      
      
      
      
      
      
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/application.js"> </script>
    
  </body>
</html>