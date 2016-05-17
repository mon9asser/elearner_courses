<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
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
      
      
      <section class="container-fluid section-valuable section-courses">
          <div class="mask-layer"></div>
           <div class="container text-left">
              <div class="row">
                  <div class="col-xs-12 col-md-8">
                      <h1 class="headlin-feature-course" style="color: #e60d2d;">
                        Feature courses
                      </h1>
                  </div>
              </div>
           </div>
          <div class="row">
              <div class="col-xs-12 col-md-8">
                  <center>
                       <h2 class="values">Make yourself valuable to employers </h2>
                  </center>
               </div>
              <div class="col-xs-12 col-md-4">
                  <center>
                      <button class="btn btnprimarico">View all courses</button>
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
                  
                  <div>
                    <div class="feauture-course-container text-center">
                        <div class="image-container">
                            <div style="background-image: url(courses_covers/course-9-450x450.jpg);" class="img-course-block">
                             <div class="mask-layer-courses"></div>
                            </div>
                        </div>
                        <b class="course-name-container">
                             Become a PHP Master and <br />Make Money Fast
                        </b>
                        <p class="Category text-left">
                            <b>Programming language</b>
                        </p>
                        <p class="descripe-course-feauture">
                            <span class="groups">
                                <i class="fa fa-group"></i>
                                15
                            </span>
                            <span class="price-course-feauture">
                                <i class="fa fa-usd" aria-hidden="true"></i>100
                             </span>
                        </p>
                    </div>
                </div>
                  
                   
                  
                   
                   
                  
                  
                  
                  
                  
                  
                </div>
                  
              
              
              
              
              
              
              
              
              
                    
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script type="text/javascript" src="js/application.js"> </script>
  </body>
</html>