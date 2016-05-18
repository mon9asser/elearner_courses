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
      
      
      <section class="container-fluid main-course-info">
          <div class="container-of-coursename"></div>
          <div class="container items">
              <h1 class="headline-course-name"> Wordpress Website Design and Development for Beginners  </h1>
              <div class="clear"></div>
              <p class="">
                  <span class="title-description">
                       Use Wordpress Website Design and Development for Beginners to create your first Wordpress website from scratch. 
                  </span>
                  <span class="category-item">Web Design</span>
              </p>
              <div class="clearfix"></div>
              <p>
                  <span class="title-description" style="padding: 0px 0px 0px 15px;margin: 0px; display: block; color: #fff; ">
                      Instructed by : <b style="">Montasser Mossallem</b>
                  </span>
              </p>
          </div>
          <div class="container items-video">
              <div class="col-xs-12 col-md-8">
                  
                  <div style="text-align:center">
                    <button onclick="playPause()">Play/Pause</button>
                    <button onclick="makeBig()">Big</button>
                    <button onclick="makeSmall()">Small</button>
                    <button onclick="makeNormal()">Normal</button>
                    <br><br>
                    <video id="video1" width="420">
                       <source src="video_courses_cover/inreduce.mp4" type="video/mp4">
                      <source src="video_courses_cover/inreduce.mp4.ogg" type="video/ogg">
                      Your browser does not support HTML5 video.
                    </video>
                  </div>
                  
              </div>
              <div class="col-xs-12 col-md-4"></div>
              
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
    <script>
            var myVideo = document.getElementById("video1");

            function playPause() {
                if (myVideo.paused)
                    myVideo.play();
                else
                    myVideo.pause();
            }
            
            //the video always maintains its original aspect ratio
            /*
            function makeBig() {
                myVideo.width = 560;
            }

            function makeSmall() {
                myVideo.width = 320;
            }

            function makeNormal() {
                myVideo.width = 420;
            } */
                
            </script>
  </body>
</html>