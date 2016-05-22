  $(document).ready(function (){
      
      $('.login-from-sign-up').click(function (){
          $('#sign-up-section').fadeOut();
          $('#login-section').fadeIn();
      });
      
      $('.sign-up-fromlogin').click(function (){
           $('#login-section').fadeOut();
          $('#sign-up-section').fadeIn();
       });
      
      
            $('.loadin-page').delay(3000).fadeOut();
            var wss_array  = [
                '<div class="slider img-background" style="background-image: url(images/2.jpg); display:none;"> </div>',
                '<div class="slider img-background" style="background-image: url(images/3.jpg); display:none;"> </div>',
                '<div class="slider img-background" style="background-image: url(images/4.jpg); display:none;"> </div>',
                '<div class="slider img-background" style="background-image: url(images/1.jpg); display:none;"> </div>',
            ];
            var wss_i = 0;
            var wss_elem;
            
            window.wssNext = function (){
                   
                   wss_i++;
                       if(wss_i > (wss_array.length - 1)){
                            wss_i = 0;
                    }
                    setTimeout('wssSlide()',2500);
            }
           window.wssSlide = function (){
               wss_elem.prepend(wss_array[wss_i]);
                   wss_elem.children('.img-background:first-child').fadeIn('slow');
                     
                    setTimeout('wssNext()',2500);
            }
           wss_elem = $("#slide-container"); wssSlide();
           var fixeditems = 3 ;
            
           $('.single-item').slick({
               infinite: true,
                slidesToShow: fixeditems,
                slidesToScroll: 3
           });
             $('.slick-arrow').css('display','none');
             $('.previouse').click(function (){
                 $('.slick-prev').trigger('click');
             });
             $('.next').click(function (){
                 $('.slick-next').trigger('click');
             });
       
            $('#login-event').click(function (){
                $('#login-section').fadeIn();
            });
            
            $('.login-section-close-login').click(function (){
                $('#login-section').fadeOut();
            });
            
            
           $('#sign-upevent').click(function (){
                $('#sign-up-section').fadeIn();
            });
            
             $('.login-section-close-signup').click(function (){
                $('#sign-up-section').fadeOut();
            });
            
            
            
            window.login_user = function (data){
                var password = document.getElementById('user_password_login');
                var email = document.getElementById('user_mail_login');
                 
                 var loginList = new Array ();
                  if (password.value == '' )
                     {
                         loginList[loginList.length] = "Password is required" ;
                          password.style.border = '1px solid #ff5a5f';
                          password.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                          $(data).html("Logining in");
                     }else 
                         {
                             password.style.border = '1px solid #e1e0de';
                             password.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }
                         
                    if (email.value == '' )
                     {
                         loginList[loginList.length] = "Email is required" ;
                          email.style.border = '1px solid #ff5a5f';
                          email.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                          $(data).html("Logining in");
                     }else 
                         {
                             email.style.border = '1px solid #e1e0de';
                             email.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }   
                   
                if(loginList.length != 0 ){
                     $('.log-headline-in').slideDown();
                    $('.log-headline-in').html(null);
                         for (var i=0 ; i<loginList.length ; i++){
                             $('.log-headline-in').append(loginList[i]+"<br />");
                         }
                         return false ;
                }else {
                     $('.log-headline-in').slideUp();
                    $('.log-headline-in').html(null);
                }
                
                
                // login this user 
                var dataS  = {
                    "email" : email.value  ,
                    "password":password.value 
                }
                  $.ajax({
                    url : 'controler/login_controler.php' ,
                    type : 'post' ,
                    data : dataS, 
                    success : function (data){
                             var responsed = $.trim(data); 
                             if( responsed == "FIELDS_ARE_EMPTY")
                                 {
                                     $('.log-headline-in').slideDown();
                                     $('.log-headline-in').html ('All fields are required !');
                                 }
                                 
                                 
                             else if(responsed == "THIS_IS_NOT_EMAIL")   
                                  {
                                     $('.log-headline-in').slideDown();
                                     $('.log-headline-in').html ('This email does not valid');
                                  }
                                  
                            else if(responsed == "USER_DOES_NOT_EXISTS")   
                                  {
                                     $('.log-headline-in').slideDown();
                                     $('.log-headline-in').html ('Somthing wrong email or password');
                                  }
                            
                           else  if(responsed == "EMAILS_REQUIRED")   
                                  {
                                     $('.log-headline-in').slideDown();
                                     $('.log-headline-in').html ('Email is required');
                                  }
                            
                           else if(responsed == "PASSWORD_REQUIRED")   
                                  {
                                     $('.log-headline-in').slideDown();
                                     $('.log-headline-in').html ('Password is required');
                                  }
                            else 
                                {
                                    $('.log-headline-in').slideUp();
                                    $('.log-headline-in').html(null);
                                }
                                
                                console.log(responsed);
                             if(responsed == "LOGIN_SUCCESS")   
                                  window.location.href ='index.php';
                                  
                                  
                                  
                        }
                    });
            }
            window.signup_new_user  = function (data){
                $(data).html("<img width='25' src='images/loading.gif' /> Signing up .. ");
                var f_name ,s_name , email , password , mobile ;
                f_name = document.getElementById("co_first_name");
                s_name = document.getElementById("co_second_name");
                email= document.getElementById("co_email_name");
                password= document.getElementById("co_password_name");
                mobile= document.getElementById("co_mobile_number_name");
               
               
               // error cases 
               
               var arrList = new Array ();
                if (f_name.value == '' )
                     {
                         arrList[arrList.length] = "First name is required" ;
                          f_name.style.border = '1px solid #ff5a5f';
                          f_name.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                          $(data).html("Sign up");
                     }else 
                         {
                             f_name.style.border = '1px solid #e1e0de';
                          f_name.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }
                     
                    
                    
                if (s_name.value == '' )
                   {
                       arrList[arrList.length] = "Second name is required" ;
                       s_name.style.border = '1px solid #ff5a5f';
                          s_name.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                          $(data).html("Sign up");
                    }else 
                         {
                             s_name.style.border = '1px solid #e1e0de';
                          s_name.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }
                        
                        
                 if (email.value == '' )
                     {arrList[arrList.length] = "Email is required" ;
                        email.style.border = '1px solid #e1e0de';
                          email.style.boxShadow = '0px 0px 5px 0px #ff5a5f';  
                          $(data).html("Sign up");
                    }else 
                         {
                             email.style.border = '1px solid ##e1e0de;';
                          email.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }
                        
                 if (password.value == '' )
                   { arrList[arrList.length] = "Password is required" ;
                password.style.border = '1px solid #e1e0de';
                          password.style.boxShadow = '0px 0px 5px 0px #ff5a5f';    
                          $(data).html("Sign up");
                }else 
                         {
                             password.style.border = '1px solid ##e1e0de;';
                          password.style.boxShadow = '0px 0px 0px 0px #e1e0de';
                         }
                        
                        
                          
                 if(arrList.length != 0)
                     {$('.log-headline').slideDown();
                         $('.log-headline').html(null);
                         for (var i=0 ; i<arrList.length ; i++){
                             $('.log-headline').append(arrList[i]+"<br />");
                         }
                         return false ;
                     }
                    
                var dataString = {
                    'fname':f_name.value ,
                    'sname':s_name.value ,
                    'euser':email.value ,	 
                    'puser':password.value , 
                    'muser':mobile.value 
                } ;
                $.ajax({
                    url : 'controler/signup_controler.php' ,
                    type : 'post' ,
                    data : dataString, 
                    success : function (data){
                        var responsed = $.trim(data);
                        
                        
                        
                          if (responsed == "THIS_USER_IN_OUR_DATABASE") 
                            {
                                  $('.log-headline').slideDown();
                                  email.style.border = '1px solid #ff5a5f';
                                  email.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('This user is alredy exist!');
                            }else {
                                 $('.log-headline').fadeOut();
                                  email.style.border = '1px solid #e1e0de';
                                  email.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                            
                            // check all fields 
                          if(responsed == "SNAME_REQUIRED")  
                              {
                                  $('.log-headline').slideDown();
                                  s_name.style.border = '1px solid #ff5a5f';
                                  s_name.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('Second Name is required <br />');
                            }else {
                                 
                                  s_name.style.border = '1px solid #e1e0de';
                                  s_name.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                            
                            
                            if(responsed == "FNAME_REQUIRED")  
                              {
                                  $('.log-headline').slideDown();
                                  f_name.style.border = '1px solid #ff5a5f';
                                  f_name.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('First Name is required <br />');
                            }else {
                                 $('.log-headline').fadeOut();
                                  f_name.style.border = '1px solid #e1e0de';
                                  f_name.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                            
                            
                            if(responsed == "EMAIL_REQUIRED")  
                              {
                                  $('.log-headline').slideDown();
                                  email.style.border = '1px solid #ff5a5f';
                                  email.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('Email is required <br />');
                            }else {
                                 $('.log-headline').fadeOut();
                                  email.style.border = '1px solid #e1e0de';
                                  email.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                            
                            
                            
                            if(responsed == "PASS_REQUIRED")  
                              {
                                  $('.log-headline').slideDown();
                                  password.style.border = '1px solid #ff5a5f';
                                  password.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('Password is required <br />');
                            }else {
                                 $('.log-headline').fadeOut();
                                  password.style.border = '1px solid #e1e0de';
                                  password.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                           
                            if (responsed == "THIS_NOT_EMAIL")
                            {
                                  $('.log-headline').slideDown();
                                  email.style.border = '1px solid #ff5a5f';
                                  email.style.boxShadow = '0px 0px 5px 0px #ff5a5f';
                                  $('.log-headline').html('This is not valid email');
                                  $(data).html("Sign up");
                            }else {
                                 $('.log-headline').fadeOut();
                                  email.style.border = '1px solid #e1e0de';
                                  email.style.boxShadow = '0px 0px 0px 0px #ff5a5f';
                            }
                            
                            
                            if(responsed == "SIGNED_UP_SUCCESS")
                                {
                                    setTimeout(function(){
                                         $(data).html("You're registered success ..");
                                    }, 1000) ;
                                    window.location.href ="index.php";
                                }
                            
                            
                    }
                });
            }
        });
        
        