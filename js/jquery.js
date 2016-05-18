jQuery(document).ready(function ($) {
   // set map 
 
 

  $(window).resize(function(){
      // set the same height for connection block like img tripes
 var height_img_trips = $('.img_trips').height();
 $('.connections').height(height_img_trips);
 });
 
 $(window).size(function(){
      // set the same height for connection block like img tripes
 var height_img_trips = $('.img_trips').height();
 $('.connections').height(height_img_trips);
 });
 
 
 
 $('.img-profile').hover(function (){
            
             $('.checkAvilability').css('box-shadow','0px 0px 5px 0px #222');
           
         } 
 ,function (){
           $('.checkAvilability').css('box-shadow','0px 0px 0px 0px #fff');
         }
         );
 

 
 /*
 $('.img-profile').addClass('animated zoomInDown' , function (){
      $('.checkAvilability').addClass('animated zoomInUp');
 });
 */
 
 $('.userStatus').addClass('animated slideInLeft');
 // tooltip 
  $('[data-toggle="tooltip"]').tooltip();   
  // CHECK IF CLICKED IN ROOM TYPE 
  $('.allromeType').click(function (){
     var currentBtn = $(this);
      $('.allromeType').css('border-color','#eee').css('background-color','#fff').css('color','#222').css('opacity','1');
      currentBtn.css('border-color','#FF5A5F #FF5A5F #E00007').css('background-color','#FF5A5F').css('color','#FFF').css('opacity','0.4');

  });
  $('.allromeType').hover(function(){
                      $(this).css('border-color','#FF5A5F #FF5A5F #E00007').css('background-color','#FF5A5F').css('color','#FFF').css('opacity','0.4');


  },function(){
        $(this).css('border-color','#eee').css('background-color','#fff').css('color','#222').css('opacity','1');

  });
  
  
  // open another Filteration Using Jquery 
  $('#opent_more_filterations').click(function (){
      // close all Trips with filter btn 
      $('.block_trips , .add_another_details' ).slideUp();
      //  button Filterations 
      $('.someDetails_to_filter').slideDown();
      
  });
  $('.Cancelation').click(function (){
         $('.someDetails_to_filter').slideUp();
      $('.block_trips , .add_another_details' ).slideDown();
       
  });
  
   // scroll bar style 
     $("html , body").niceScroll({
		    mousescrollstep: 70,
		    cursorcolor: "#DD6B55",
		    cursorwidth: "10px",
		    cursorborderradius: "1px",
		    cursorborder: "2px" ,
                    zindex: "10000",
		    horizrailenabled:false , 
                    railpadding: { top: 0, right: 5, left: 0, bottom: 0 }
  		});
                
                
   // scroll top via button 
   $(".scrollTop").click(function(){
       $("html , body").animate({
           scrollTop : 0 
       },600);
   });
   
   
   
   
   // change style of Header when scrolling 
    $(window).scroll(function (){
        
     if($(this).scrollTop() > 300 )
        {
            $(".scrollTop").fadeIn(500);
        } else 
             $(".scrollTop").fadeOut(500);
         
         
    var videoContainerHeight = $("#slide-Video").height() ;
        if($(this).scrollTop() > 20 && $(this).scrollTop() < videoContainerHeight )
            {
                $("#sweegy-header").addClass("animate slideInDown navbar-first-change");
                
            }
        if($(this).scrollTop() > (videoContainerHeight ))
            {
                $("#sweegy-header").removeClass("animate slideInDown navbar-first-change");
                $("#sweegy-header").addClass("animate slideInDown navbar-second-change");
                  
            }else {
            $("#sweegy-header").removeClass("animate slideInDown navbar-second-change");
            $("#sweegy-header").removeClass("animate slideInDown navbar-first-change");
            }
            
            
            
            
           
      
      
    });  
   
    // change some style in liner of date picker 
    var updateLinerPicker_width = $("#datePicker_block").width();
    var updateLinerPicker_height = $("#datePicker_block").height() ;
     $("#liner_block").css('width', updateLinerPicker_width +'px').css("height",updateLinerPicker_height+"px");
     
     
   // Date Picker 
   $("#checkIn , #checkOut").datepicker();
    
     var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('#dpd1').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
     
     
     
     
     
     
     
   // scroll to spesific Section 
   $("#goTo_section").click(function () {
       var targetSection = $('.sctNewYour').offset().top + 10   ;
       $('html , body ').animate({
           scrollTop :  targetSection 
       },600);
   });
   
  
  
   
   // language change 
   $("#language_selector").click(function () {
       // call another Function to select Language
        return changeLanguage () ;
   }) ;
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $('#footer').bind('inview', function(event, isInView) {
  if (isInView) {
    // element is now visible in the viewport
                                     $('#s1').addClass('animate-down');
                                      setTimeout( function() { $('#s2').addClass('animate-down'); }, 100);
                                      setTimeout( function() { $('#s3').addClass('animate-down'); }, 400);
                                      setTimeout( function() { $('#s4').addClass('animate-down'); }, 700);
                                      setTimeout( function() { $('#s5').addClass('animate-down'); }, 1000);
                                      setTimeout( function() { $('#s6').addClass('animate-down'); }, 1300);
                                      setTimeout( function() { $('#s7').addClass('animate-down'); }, 1600);
                                      setTimeout( function() { $('#s8').addClass('animate-down'); }, 1900);
                                      setTimeout( function() { $('#s9').addClass('animate-down'); }, 2200);
                                      setTimeout( function() { $('#s10').addClass('animate-down'); }, 2500);
  } else {
    $(".stripes").removeClass("animate-down");
  }
});
  
  
  
 // open or close all Aminities 
 $("#openAll_events_related_property").click(function(){
     var offset_top = $('.main_property').offset().top;
      if($(this).hasClass('fa-caret-up') === true)
         {
              $(this).removeClass('fa-caret-up').addClass('fa-caret-down');
              $('.includAll_others_2').slideUp();
              
         }else 
             {
                 $(this).removeClass('fa-caret-down').addClass('fa-caret-up');
                 $('.includAll_others_2').slideDown(function () {
                    $('#all_trips').animate({
                          scrollTop : offset_top 
                       },600);
                      
                 });
             }
 });
 $('#openAll_events').click(function(){
     var offessetTop = $('.include_all_aminities').offset().top;
     if($(this).hasClass('fa-caret-up') === true)
         {
             
              $(this).removeClass('fa-caret-up').addClass('fa-caret-down');
            // Open others of aminities 
                  $('.includAll_others').slideUp();
             
             
             
          }else 
              {
                   $(this).removeClass('fa-caret-down').addClass('fa-caret-up');
                  // close others of aminities 
             $('.includAll_others_1').slideDown(function () {
                    $('#all_trips').animate({
                          scrollTop : offessetTop 
                       },600);
                      
             });
                  
              }
 });
});


  