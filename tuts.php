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
       <script src="js/jquery.js"></script> 
    <script>
        $(document).ready(function (){
 
        });
    </script>
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
             <div class="imgVideo" style="text-align:center">
                 <div class="poster">
                     <div class="mask-poster"></div>
                 </div>
                 <div class="playIcon"></div>
             </div>
              <div class="video-contr">
                  <span class="current-price " data-purpose="course-price-text">
                    $100
                  </span>
                  <span class="take-this">
                      <div style=" margin-top: 15px;" class="btn-custome">
                      Take This Course
                      </div>
                  </span>
                  <span class="take-this video-contr--">
                      <div id="setCoupon" class="btn-custome">
                          <span id="setCoupon-tx"> Redeem a Coupon </span>
                      </div>
                  </span>
                  <span class="take-this nitem">
                      <div class="content-course">
                          <b> Lecture </b>: 40
                      </div>
                      <div class="content-course">
                          <b> Who this course for ? </b>: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                      </div>
                      <div class="content-course">
                          <b> Category </b>: Web Design
                      </div>
                  </span>
              </div>
          </div>
      </section>
      <section class="header-foooter container-fluid">
          <div class="container">
            <b class="desc"> Curriculum </b>
          </div>
      </section>
      <section class="container-fluid course-objective">
          <div class="container">
              <h3 class="courses-headline">About This Course</h3>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="">
                          <b>
                              What will I learn? 
                          </b>
                          <ul>
                              <li>
                                  Install and maintain their own Wordpress based website
                              </li>
                               <li>
                                  Save money by installing and maintaining your own website
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <div class="">
                          <b>
                               Who is this for? 
                          </b>
                          <ul>
                              <li>
                                    Anyone interested in creating a personal website
                               </li>
                                <li>
                                    Anyone interested in creating a personal website
                               </li>
                                
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <div class="container">
              <h3 class="courses-headline">Curriculum</h3>
          </div>
          <div class="container">
            <table class="table">
                <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 1 </span>
                            <span class="lect_name">Course Overview</span>
                        </a>
                    </td>
                   <td class="text-right">
                        <span class="lect_minutes">05:50 </span>
                      </td>
                </tr>
                
                
                
                 <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 2 </span>
                            <span class="lect_name"> 	How Wordpress Works</span>
                        </a>
                    </td>
                    <td class="text-right">
                        <span class="lect_minutes">02:45 </span>
                      </td>
                </tr>
                
                
                
                 <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 3 </span>
                            <span class="lect_name"> 	Sample Website</span>
                        </a>
                    </td>
                   <td class="text-right">
                        <span class="lect_minutes">10:00 </span>
                      </td>
                </tr>
                
                
                
                 <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 4 </span>
                            <span class="lect_name"> 	Wordpress Administrative Interface</span>
                        </a>
                    </td>
                    <td class="text-right">
                        <span class="lect_minutes">15:00 </span>
                      </td>
                </tr>
                
                
                
                 <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 5 </span>
                            <span class="lect_name"> 	Responsive Theme Home Page Configuration</span>
                        </a>
                    </td>
                   <td class="text-right">
                        <span class="lect_minutes">07:00 </span>
                      </td>
                </tr>
                
                
                 <tr>
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 6 </span>
                            <span class="lect_name"> 	Creating Your Blog Page and Primary Menu</span>
                        </a>
                    </td>
                   <td class="text-right">
                        <span class="lect_minutes">13:45 </span>
                      </td>
                </tr>
                
                <tr class="dis">
                    <td>
                        <a class="videos-link">
                            <span class="lect_number">Lecture 7 </span>
                            <span class="lect_name disabled">	 Switching Between Standard and HTML Editing Modes</span>
                        </a>
                    </td>
                    <td class="text-right">
                        <span class="lect_minutes">16:00 </span>
                      </td>
                </tr>
                
            </table>
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
    
    <script>
           /* var myVideo = document.getElementById("video1");

            function playPause() {
                if (myVideo.paused)
                    myVideo.play();
                else
                    myVideo.pause();
            }*/
            
           

         
               
            window.done_coupon = function (){
               document.getElementById('setCoupon').innerHTML ='Coupon: W1DS254SD' ; 
               document.getElementById('setCoupon').style.opacity ="0.3";
            }
           $('#setCoupon-tx').click(function(){
               document.getElementById('setCoupon').innerHTML = "<input id='coupon-value' type='text' /> <d onclick='done_coupon();' class='btna'> Done </button>";
           });   
            </script>
  </body>
</html>