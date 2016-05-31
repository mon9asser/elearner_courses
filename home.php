<?php
ob_start();
if(session_id() =='')
     session_start ();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
     -->
    <!--
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    -->
        <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
   
    
    
    <!-- With net -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
      
      
      
      <section id="slide-container" style="" class="slider">
            <div class="slider img-background" style="background-image: url(images/1.jpg);"> </div>
            <div class="slider img-background" style="background-image: url(images/1.jpg);"> </div>
           <div class="slide-mask"></div>
           <div class="carousel">
               <h1 class="heading">LEARN NEW <span>SKILLS <br />
                    <h3 class="heading3">in anytime as you like</h3>
                   </span></h1>
               <p class="slogan">
                   Better educations for better world
               </p>
               <p class="slogan">
               <center>
                     
                        <img style="width: 100px;  border-radius: 2px; position: relative;z-index: 50;margin-top: -27px; " class="img-responsive " src="images/logo.png" />
                     
               </center>
                </p>
           </div>
      </section>
      
      
      <section class="container-fluid section-valuable section-courses" style="margin-top: 0px;">
          <div class="mask-layer"></div>
            
          <div class="row">
              <div class="col-xs-12 col-md-8">
                  <center>
                       <h2 class="values">Make yourself valuable to employers </h2>
                  </center>
               </div>
              <div class="col-xs-12 col-md-4">
                  <center>
                      <a href="courses.php" class="btn btnprimarico">View all courses</a>
                  </center>
               </div>
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
      
      
      <section class="container-fluid testmonalisa">
          <!-- 
          <div class="layer-mask-test"></div>
          -->
          <div class="container">
              <h1 class="headlin-feature-course" style="color: #000;">
                Testimonials
               </h1>
          </div>
           
              <div id="text-carousel" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="carousel-content">
                                <div>
                                    <p>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint fuga temporibus nam saepe delectus expedita vitae magnam necessitatibus dolores tempore consequatur dicta cumque repellendus eligendi ducimus placeat! </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="carousel-content">
                                <div>                          
                                    <p>Sapiente, ducimus, voluptas, mollitia voluptatibus nemo explicabo sit blanditiis laborum dolore illum fuga veniam quae expedita libero accusamus quas harum ex numquam necessitatibus provident deleniti tenetur iusto officiis recusandae corporis culpa quaerat?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
    <!-- Include all compiled plugins (below), or include individual files as needed 
    <script src="js/bootstrap.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
     
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <!-- <script type="text/javascript" src="slick/slick.js"></script> -->
    <script type="text/javascript" src="js/application.js"> </script>
   
  </body>
</html>

<?php
      ob_end_flush();
?>