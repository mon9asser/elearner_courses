  $(document).ready(function (){
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
            
        });