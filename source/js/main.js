(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 'use strict';
	 var _Scl,_Wh,_Ww,_Wiw, brUrl, aF, sF, menuToggle, main, mscr;

	 $(document).ready(function() {
	     currBrul();
	     getWindowDimensions();
	     floatImgFix();
	     if(pageIs == 'main') {
	        main = new runTooltip();
	        if(_Ww > 895) {
	             $("#main-modal .container").niceScroll({horizrailenabled: false, scrollspeed: 60, mousescrollstep : 100});}
	     } else {
	         if(_Ww > 895) {
	             $(".wrapper").niceScroll({horizrailenabled: false, scrollspeed: 60, mousescrollstep : 100});
	         }
	     }
	     menuToggle = new menuToggle();
	 });
	 $(window).on({
	     'load' : function() {
	         _Scl = $(window).scrollTop();
	         getWindowDimensions();
	         
	         if(pageIs == 'single' || pageIs == 'main') {
	             clickTweet();
	             videoJsFixed();
	         }
	             gallerySlider();
	         if(pageIs == 'single') {
	             enableSharing();
	         }
	         mscr = new mainScroll();
	         if(pageIs == 'main') {
	             if(_Ww > 895) {
	                 animateDiv();
	             }
	         }
	         aF = new ajaxSearch();
	         sF = new ajaxSubscribe();
	         modalClose();
	     },
	     'resize' : function() {
	         getWindowDimensions();
	     },
	     'scroll' : function() {
	         _Scl = $(window).scrollTop();
	     }
	 });

	 function floatImgFix() {
	     $('.floating-square').height($('#floating-mage').height());
	 }

	 function getWindowDimensions() {
	     _Ww = $(window).width();
	     _Wh = $(window).height();
	     _Wiw = window.innerWidth;
	 }

	 /**
	  * Menu toggle
	  */

	 function menuTarget(event) {
	     if($(event.target).parent().hasClass('menu-item') || $(event.target).hasClass('menu')) {
	     } else {
	         escCloseMenu();
	     }
	 }

	 function openMenu() {
	     $('body').toggleClass('menu-open');
	     if(_Ww > 895) {
	         setTimeout(function() {
	             $(document).on('click', 'body', menuTarget);
	             $(document).on('keyup', 'body', modalIfExex)
	         }, 300);
	     }
	 }

	 function modalIfExex(e) {
	     if (e.keyCode == 27) { escCloseMenu();}
	 }

	 function escCloseMenu() {
	     $('body').removeClass('menu-open');
	     $(document).off("keyup",'body', modalIfExex);
	     $(document).off('click','body', menuTarget);
	 }

	 function menuToggle() {
	     var self = this;
	     /*
	      binds
	      */
	     $('.menu-toggle').click(function() {
	         openMenu();
	     });
	     
	     $('.menu-close').click(function() {
	         escCloseMenu();
	     });
	     $('.cat-menu-mob-toggle').click(function() {
	         $(this).toggleClass('open');
	         $('.cat-mob-list').slideToggle('slow');
	     });
	 }

	 /*
	  Menu toggle
	  */

	 /**
	  * Gallery slider
	  */
	 function gallerySlider() {
	     var swiper = new Swiper('.wp-gallery', {
	         pagination          : '.swiper-pagination',
	         slidesPerView       : 3,
	         paginationClickable : true,
	         spaceBetween        : 10,
	         // centeredSlides      : true,
	         nextButton          : '.button-next-sl',
	         prevButton          : '.button-prev-sl',
	         loop                : false,
	         breakpoints: {
	             320: {
	                 slidesPerView: 1,
	             },
	             480: {
	                 slidesPerView: 2,
	             }
	         }
	     });
	 }
	 /*
	  fancybox
	  */

	  $(".fanc-single").fancybox({
	     caption : {
	         type : 'outside'
	     },
	     openEffect  : 'elastic',
	     closeEffect : 'elastic',
	     nextEffect  : 'elastic',
	     prevEffect  : 'elastic'
	 });

	 /*
	  Gallery slider
	  */

	 /**
	  * Map Tooltips
	  */
	 function runTooltip() {
	     var self = this, 
	     tolintrvl, 
	     slider, 
	     interval = 3000,
	     destroyed = true, 
	     tolTime, 
	     tolCount, 
	     olx = 0, 
	     marker = $('.map-marker');
	     tolCount = marker.length;
	     self.run = function() {
	         $(document).on('mousemove', self.mousemove);
	         tolintrvl = setInterval(function(){
	             // console.log(new Date());
	             marker.eq(olx).removeClass('open');
	             if(slider != undefined && !destroyed) {
	                 slider.destroy();
	                 destroyed = true;
	             }
	             var inx = Math.floor((Math.random() * tolCount));
	             marker.eq(inx).addClass('open');
	             self.tooltip(marker.eq(inx));
	             self.runSlider(marker.eq(inx));
	             destroyed = false;
	             olx = inx;
	         }, interval);
	     }
	     self.runSlider = function(element) {
	         var sld = element.find('.swiper-container');
	         slider = new Swiper (sld, {
	             spaceBetween: 0,
	             nextButton: '.button-next',
	             prevButton: '.button-prev',
	             loop: true
	         });
	     };
	     self.mobTooltip = function() {
	         $(this).addClass('active');
	         self.runSlider($(this));
	         $(document).off('click', '.map-marker', self.mobTooltip);
	     }
	     self.tooltip = function(el) {
	         var bal = _Ww * 0.322;
	         var balt = _Wh * 0.29;
	         var right = _Ww - $(el).offset().left;
	         var bottom = _Wh - $(el).offset().top;
	         if(right < bal) {
	             $(el).find('.dot-hover').addClass('right');
	         }
	         if(bottom < balt) {
	             $(el).find('.dot-hover').addClass('bottom');
	         }
	     }
	     self.stop = function() {
	         clearTimeout(tolTime);
	         clearInterval(tolintrvl);
	         marker.removeClass('open');
	         $(document).off('mousemove', self.mousemove);
	     }
	     self.mousemove = function() {
	         clearTimeout(tolTime);
	         clearInterval(tolintrvl);
	         marker.removeClass('open');
	         tolTime = setTimeout(function() {
	             self.run();
	         }, interval);
	     }
	     /*
	     binds
	      */
	     if(_Ww < 896) {
	         $(document).on('click', '.map-marker', self.mobTooltip);
	         $(document).on('click', '.tooltip-close', function() {
	             marker.removeClass('active');
	             slider.destroy();
	             $(document).on('click', '.map-marker', self.mobTooltip);
	         });
	     } else {
	         $('.map-marker').hover(
	             function() {
	                 // console.log(right);
	                 self.tooltip(this);
	                 self.runSlider($(this));
	             }, 
	             function() {
	                 slider.destroy();
	                 destroyed = true;
	             }
	         );
	         self.run();
	     }
	 }

	 /*
	  Map Tooltips
	  */

	 /**
	  * Main Scroll
	  */

	 function mainScroll() {
	     var 
	         self          = this,
	         scrlContainer = $('.scroll-container'),
	         popContainer  = $('.popular-posts'),
	         popPosition,
	         mapWrapper    = $('.map-wrapper.full'),
	         oldIndex      = 0,
	         tooltip       = true,
	         wheellOn      = true,
	         wrapper       = $('.main-related-post'),
	         index         = 0;

	     self.mouseWheel = function(event) {
	         var event = window.event || event;
	         var delta = Math.max(-1, Math.min(1, (event.wheelDelta || -event.detail)));
	         if(delta < 0) {
	             index = 1;
	             self.scrollAnim();
	         } else if(delta > 0) {
	             index = 0;
	             self.scrollAnim();
	         }
	     }
	     self.onOfWheel = function() {
	         if($(this).scrollTop() > 3) {
	             if(wheellOn) {
	                 self.whellDisable();
	                 // console.log('off');
	                 wheellOn = false;
	             }
	         } else  {
	             if(!wheellOn) {
	                 self.whellEnable();
	                 // console.log('on');
	                 wheellOn = true;
	             }
	         }
	     }
	     self.scrollAnim = function() {
	         $('.main-navigation a').removeClass('active');
	         $('.main-navigation li').eq(index).find('a').addClass('active');
	         scrlContainer.onCSSTransitionEnd(function() {
	             // console.log(index );
	             if(index == 1) {
	                 // popContainer.addClass('fixed');
	                 // console.log('end');
	                 stopAnimatioon();
	                 wrapper.scrollTop( 0 );
	             }
	         });
	         if(index == 1) {
	             wrapper.on('scroll', self.onOfWheel);
	             wrapper.scrollTop( 0 );
	             if(tooltip == true) {
	                 main.stop();
	                 tooltip = false
	             }
	             stopAnimatioon();
	         } else {
	             wrapper.off('scroll', self.onOfWheel);
	             if(tooltip == false) {
	                 main.run();
	                 tooltip = true;
	             }
	             animateDiv();
	             // popContainer.removeClass('fixed');
	         }
	         // popContainer.css({
	         //     'top': (100 - (100 * index * -1))+'%'
	         // });
	         scrlContainer.css({
	             'top': (100 * index * -1)+'%'
	         });
	         mapWrapper.css({
	             'top': (100 * index * -1)+'%'
	         });
	     }
	     self.whellDisable = function() {
	         if(_Ww > 895 && pageIs == 'main') {
	             $(document).off('DOMMouseScroll mousewheel onmousewheel', self.mouseWheel);
	         }
	     }
	     self.whellEnable = function() {
	         if(_Ww > 895 && pageIs == 'main') {
	             $(document).on('DOMMouseScroll mousewheel onmousewheel', self.mouseWheel);
	         }
	     }
	     self.init = function() {
	         $(document).on('click', '.main-navigation a', function(e) {
	             index = $(this).parent().index();
	             self.scrollAnim(index);
	         });
	         $(document).on('DOMMouseScroll mousewheel onmousewheel', self.mouseWheel);
	     }
	     if(_Ww > 895 && pageIs == 'main' && mainPopup == 'false') {
	         self.init();
	     }
	 }

	 /*
	  Main Scroll
	  */


	 /**
	  * Twitter
	  */

	 function invTweetPopup( url, winW, winH ){
	     var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left,
	         dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top,
	         left, top, newWindow,
	     width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width,
	     height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height,
	     left = ((width / 2) - (winW / 2)) + dualScreenLeft,
	     top = ((height / 2) - (winH / 2)) + dualScreenTop,
	     newWindow = window.open( url, 'invTweetable', 'scrollbars=yes, width='+winW+', height='+winH+', top=' + top + ', left=' + left);
	     if (window.focus){ newWindow.focus(); }
	 }

	 function clickTweet() {
	     $('.tm-ctt-btn, .tw-cl').on('click', function(e){
	         e.preventDefault();
	         e.stopPropagation();
	         var href = $(this).attr('href');
	         invTweetPopup( href, 800, 400 );
	     });
	 }

	 /*
	  Twitter
	  */

	 /**
	  * Video fixed
	  */

	 function videoJsFixed() {
	     var videos = new videoSingle();
	      $(".vid-fix").each(function (videoIndex) {
	         var videoId = $(this).attr("id");

	         videojs(videoId).ready(function(){
	             this.on('pause', function(e) {
	                 // videos.update();
	                 // console.log('pause');
	             });
	             this.on("play", function(e) {
	                 //pause other video
	                 videos.update();
	                 // console.log('play');
	                 $(".video-js").each(function (index) {
	                     if (videoIndex !== index) {
	                         this.player.pause();
	                         setTimeout(function() {
	                             videos.update();
	                         }, 1000);
	                     }
	                 });
	             });
	         });
	     });
	 }

	 function videoSingle() {
	     /*
	     Vars
	      */ 
	     var self       = this,
	     videoElement   = $('.video-single'),
	     video          = $('.video-js.vjs-playing'),
	     allVideo       = $('.video-js'),
	     wrapper        = $('.main-related-post').length > 0 ? $('.main-related-post') : $('.wrapper'),
	     dropdown       = $('.single-dropdown'),
	     videoContainer =  videoElement.find('.vjs-playing').parent(),
	     isPlaying      = $('.video-single .vjs-playing').length > 0 ? true : false,
	     videoDimension,
	     videoPosition;
	     // console.log(videoContainer);
	     // console.log(wrapper);

	     self.calculateElement = function() {
	         if (isPlaying) {
	             // console.log('has');
	             videoPosition  = videoContainer.offset();
	             videoDimension = {
	                 h : video.height(),
	                 w : video.width()
	             }
	             // console.log(videoPosition);
	             // console.log(videoDimension);
	             if(videoPosition.top + videoDimension.h <= 0 ) {
	                 // console.log('hide');
	                 self.hide();
	             } else {
	                 // console.log('show');
	                 self.show();
	             }
	         } else {
	             // self.show();
	         }
	     }
	     self.update = function() {
	         // console.log('update');
	         videoElement   = $('.video-single');
	         video          = $('.video-js.vjs-playing');
	         wrapper        = $('.wrapper');
	         dropdown       = $('.single-dropdown');
	         videoContainer = null;
	         videoContainer =  $('.video-single .vjs-playing').parent();
	         isPlaying      = $('.video-single .vjs-playing').length > 0 ? true : false;
	         videoPosition  = videoContainer.offset();
	         videoDimension = {
	             h : video.height(),
	             w : video.width()
	         }
	         // if(!isPlaying) {
	             self.show();
	         // }
	         // console.log(videoContainer);
	     }
	     self.show = function() {
	         allVideo.removeClass('small slide-top');
	         dropdown.removeClass('show');
	     }
	     self.hide = function() {
	         video.addClass('small slide-top');
	         dropdown.addClass('show');
	     }
	     self.init = function() {
	         if(_Ww > 895) {
	             self.calculateElement();
	         }
	     }

	     self.init();
	     /*
	      binds
	      */
	     wrapper.on('scroll', function() {
	         // console.log('scroll');
	         self.calculateElement();
	     });
	 }

	 /*
	   Video fixed
	  */

	 /**
	  * Floating square
	  */

	 function stopAnimatioon() {
	     var isAnimSq = $(".floating-square").is(':animated');
	     while(isAnimSq) {
	         isAnimSq = $(".floating-square").is(':animated');
	         $(".floating-square").stop();
	     }
	 }
	  function makeNewPosition(){
	      // Get viewport dimensions (remove the dimension of the div)
	      var h = $(window).height() - 50;
	      var w = $(window).width() - 50;
	      var nh = Math.floor(Math.random() * h);
	      var nw = Math.floor(Math.random() * w);
	      return [nh,nw];    
	  }

	  function animateDiv() {
	     if(pageIs == 'main') {
	          var newq = makeNewPosition();
	          var oldq = $('.floating-square').offset();
	          var speed = calcSpeed([oldq.top, oldq.left], newq);
	          $('.floating-square').animate({ top: newq[0], left: newq[1] }, speed, function(){
	            animateDiv();        
	          });
	     }
	  };

	  function calcSpeed(prev, next) {
	      var x = Math.abs(prev[1] - next[1]);
	      var y = Math.abs(prev[0] - next[0]);
	      var greatest = x > y ? x : y;
	      var speedModifier = 0.1;
	      var speed = Math.ceil(greatest/speedModifier);
	      return speed;
	  }
	 /*
	  Floating square
	  */

	 function modalClose() {
	     var ink = $('.modal-wrapper .ink'),
	         modal = $('.modal-wrapper'),
	         close = $('.modal-wrapper .close');
	     close.click(function() {
	         var modalOpen = $('.modal-wrapper.open');
	         var modalOpenInk = $('.modal-wrapper.open .ink');
	         modalOpenInk.removeClass('animate-ink').addClass('animate-ink-back');
	         modalOpen.removeClass('animation-end');
	         modalAnimations(modalOpen.attr('id'), 'hide');
	         if (modal.hasClass('no-anim')) {
	             modalOpen.removeClass('open no-anim');
	             mscr.init();
	         }
	         modalOpenInk.onCSSAnimationEnd(function() {
	             modalOpenInk.removeClass('animate-ink-back');
	             modalOpen.removeClass('open');
	             animateDiv();
	         });
	     });
	     $(document).keyup(function(e) {
	         if($('.modal-wrapper').hasClass('open')) {
	             if (e.keyCode === 27) {
	                 $('.modal-wrapper .ink').removeClass('animate-ink').addClass('animate-ink-back');
	                 $('.modal-wrapper .ink').onCSSAnimationEnd(function() {
	                     $('.modal-wrapper .ink').removeClass('animate-ink-back');
	                     modal.removeClass('open');
	                     modalAnimations('search', 'hide');
	                     modalAnimations('main-modal', 'hide');
	                     animateDiv();
	                 });
	             }
	         }
	     });
	 }

	  $(function(){
	     var ink, d, x, y, toModal;

	         $(".ripplelink").click(function(e){
	         $(this).stop();
	         toModal = $(this).attr('tomodal');
	         $('#'+toModal).addClass('open');
	         $('body').addClass('modal-open');
	          if($('#'+toModal).find(".ink").length === 0){
	              $('#'+toModal).prepend("<span class='ink'></span>");
	         }
	               
	          ink = $('#'+toModal).find(".ink");
	          escCloseMenu();
	          mscr.whellDisable();
	         if (typeof main != "undefined") {
	             main.stop();
	         }
	          ink.onCSSAnimationEnd(function() {
	             $('#'+toModal).addClass('animation-end');
	             modalAnimations(toModal, 'show');
	          })
	          ink.removeClass("animate-ink");
	           
	          if(!ink.height() && !ink.width()){
	              d = Math.max($('#'+toModal).outerWidth() - 150, $('#'+toModal).outerHeight() - 150);
	              ink.css({height: d, width: d});
	          }
	           
	          x = e.pageX - $('#'+toModal).offset().left - ink.width()/2;
	          y = e.pageY - $('#'+toModal).offset().top - ink.height()/2;
	           
	          ink.css({top: y+'px', left: x+'px'}).addClass("animate-ink");
	      });
	  });

	 function modalAnimations(atr, type) {
	     if(atr == 'search' && type == 'show') {
	         $('.s-input').addClass('animating show-search').onCSSAnimationEnd(function() {
	              $('.s-input').removeClass('animating').addClass('show-end');
	         });
	         stopAnimatioon();
	     }
	     if(atr == 'search' && type == 'hide') {
	         aF.remove();
	         mscr.whellEnable();
	         if (typeof main != "undefined") {
	             main.run();
	         }
	         animateDiv();
	         $('.s-input').removeClass('show-end show-search');
	         $('body').removeClass('modal-open');
	     }
	     if(atr == 'subscribe' && type == 'show') {
	         $('.s-input').addClass('animating show-search').onCSSAnimationEnd(function() {
	              $('.s-input').removeClass('animating').addClass('show-end');
	         });
	         stopAnimatioon();
	     }
	     if(atr == 'subscribe' && type == 'hide') {
	         animateDiv();
	         sF.remove();
	         mscr.whellEnable();
	         if (typeof main != "undefined") {
	             main.run();
	         }
	         $('.s-input').removeClass('show-end show-search');
	         $('body').removeClass('modal-open');
	     }
	     if(atr == 'main-modal' && type == 'show') {
	         stopAnimatioon();
	     }
	     if(atr == 'main-modal' && type == 'hide') {
	         $('body').removeClass('modal-open');
	         animateDiv();
	         mscr.whellEnable();
	         if (typeof main != "undefined") {
	             main.run();
	         }
	     }
	 }


	  /**
	   * Ajax search
	   */

	 function ajaxSearch() {
	     var self = this,
	         timeout,
	         formElement = $('#search-form'),
	         notFound = $('.not-found');
	     self.doAjax = function() {
	         formElement.addClass('searcing');
	         var data = formElement.serialize();
	         var seartStringLenght = formElement.find('input').val().length;
	         if(seartStringLenght < 30 && seartStringLenght > 2) {
	             $.ajax({
	                 method: "POST",
	                 url : ajaxurl,
	                 data: data+'&action=ajaxSearch',
	             }).done(function(data, textStatus, xhr) {
	                 if(xhr.status != 204) {
	                     formElement.addClass('have-results');
	                     formElement.removeClass('searcing error not-found');
	                     self.showResults(data);
	                 } else {
	                     formElement.removeClass('searcing error have-results');
	                     formElement.addClass('not-found')
	                     self.showResults('');
	                 }
	             }).error(function(data, textStatus, xhr) {
	                 formElement.removeClass('searcing not-found have-results');
	                 formElement.addClass('error');
	                 self.showResults('');
	                 // console.log(data);
	             });
	         } else {
	             self.reset();
	         }
	     }
	     self.showResults = function(data) {
	         formElement.find('.results').html(data);
	     }
	     self.reset = function() {
	         document.getElementById('search-form').reset();
	     }
	     self.remove = function() {
	         formElement.removeClass('searcing error not-found have-results');
	         self.showResults('');
	         self.reset();
	     }
	     /*
	         Binds
	      */
	     formElement.on('submit', function(e) {
	         e.preventDefault();
	         clearTimeout(timeout);
	         self.doAjax();
	     });
	     formElement.find('input').keyup(function() {
	         clearTimeout(timeout);
	         timeout = setTimeout(function() {
	             self.doAjax();
	         }, 1000);
	     });
	 }

	  /*
	   Ajax search
	   */
	  /**
	   * Subscribe
	   */
	  /*
	     facebook subscribe
	   */

	   function checkFBstatus() {

	   }

	 function ajaxSubscribe() {
	     var self = this,
	     formElement = $('#subscribe-form');
	     self.doAjax = function(type, data) {
	         if(type == 'fb') {
	             // var data = 'dota';
	         } else if (type == 'form') {
	             var data = formElement.serialize();
	         } else if (type == 'twitter') {

	         }
	         $.ajax({
	             method: "POST",
	             url : ajaxurl,
	             data: {
	                 action : 'mailChimpSubscribe',
	                 type : type,
	                 response : data
	             },
	         }).done(function(data, textStatus, xhr) {
	             if(xhr.status != 204) {
	                 self.showRes(data);
	             } else {
	                 self.showRes('Thank you for subscription');
	                 self.reset();
	             }
	         }).error(function(data, textStatus, xhr) {
	             // console.log(data);
	         });
	     }
	     self.reset = function() {
	         document.getElementById('subscribe-form').reset();
	     }
	     /*
	     binds
	      */
	     self.showRes = function(res) {
	         formElement.find('.results').html(res);
	     }
	     self.remove = function() {
	         self.showRes('');
	         self.reset();
	     }
	     formElement.on('submit', function(e) {
	         e.preventDefault();
	         self.doAjax();
	     });
	     $('#fb-subscribe').click(function() {
	         FB.login(function(response) {
	             if (response.status === 'connected') {
	                 var userId = response.authResponse.userID;
	                 FB.api(
	                     "/"+userId+"?fields=id,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified,friends,bio,education,hometown,location,interested_in,website,work,books.reads,email",
	                     function (response) {
	                       if (response && !response.error) {
	                         // console.log(response);
	                         self.doAjax('fb', response);
	                       }
	                     }
	                 );
	             } else if (response.status === 'not_authorized') {
	                 self.showRes('not authorized');
	             } else {
	             }
	         },{scope: 'public_profile, user_friends, email, user_about_me, user_birthday, user_education_history, user_hometown,user_location,user_relationship_details,user_website,user_work_history,user_actions.books'});
	     });
	     // $('#in-subscribe').click(function() {
	     //     var windowAttributes = "copyhistory=no, directories=yes, location=yes, menubar=yes, resizable=yes, scrollbars=yes, status=yes, toolbar=yes";
	         
	     //     var location = "https://api.instagram.com/oauth/authorize?client_id=56a956e766cb41d0ac46140a7f69e020&redirect_uri=http%3A%2F%2Fmyopia.dev.webenhanced.ml%2Finstagram-success%2F&scope=basic&response_type=code",
	     //         windowName = "Instagram",
	     //         windowSize = "height=500, width=600, ";

	     //     var ddd = window.open(location, windowName, windowSize, windowAttributes);
	     //     // console.log(ddd);
	     //     // $.ajax({
	     //     //     method: "POST",
	     //     //     url : ajaxurl,
	     //     //     data: 'action=instagramLogin',
	     //     // }).done(function(data, textStatus, xhr) {
	     //     //     console.log(data);
	     //     // }).error(function(data, textStatus, xhr) {
	     //     //     console.log(data);
	     //     // });
	     // });
	 }

	 /*
	  subscribe
	  */
	 /**
	  * Social sharing
	  */
	 function currBrul() {
	     if(pageIs == 'single') {
	     brUrl = document.getElementById('page-url');
	     brUrl.setAttribute("data-clipboard-text", window.location.href);

	     var clipboard = new Clipboard('.copy');
	         clipboard.on('success', function(e) {
	             $('.social-tolltip').fadeIn('slow');
	             setTimeout(function() {
	                 $('.social-tolltip').fadeOut('slow');
	             }, 300);
	         });
	     }
	 }
	  function enableSharing() {
	      var windowAttributes = "copyhistory=no, directories=yes, location=yes, menubar=yes, resizable=yes, scrollbars=yes, status=yes, toolbar=yes";
	      // Check for the presence of sharing utilities in the footer
	      if ($('.share-buttons > li').length == 454554) {
	          // sharing utilities are present
	          // $.sharedCount(socialURI, function (data) {
	          //
	          //                 // Retrieve stats and format counts
	          //                 var countTwitter = numberFormat(data.Twitter, "dd.twitter strong"),
	          //                     countFacebook = numberFormat(data.Facebook.share_count, "dd.facebook strong"),
	          //                     countLinkedIn = numberFormat(data.LinkedIn, "dd.linkedin strong"),
	          //                     countGoogle = numberFormat(data.GooglePlusOne, "dd.google-plus strong");
	          //             });
	          // Attach functionality
	          var links = $('.share-buttons > li').find("a");

	          $(links).on("click", function (event) {
	              var network = $(this).attr("class"),
	                  URI = window.location.href,
	                  URIEncoded = encodeURIComponent(URI),
	                  title = document.title,
	                  description = '',
	                  source = '';

	              //console.log('^_^ > 3 '+network);
	              if (!network === "email") {
	                  // Send data to analytics
	                  // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Social", "" + network + ""]); // category, action, label (optional), value (optional), non interaction (optional)
	              }
	              switch (network) {
	                  case "twitter visible":
	                      var location = "https://twitter.com/intent/tweet?text=" + description + "&url=" + URIEncoded + "",
	                          windowName = "Twitter",
	                          windowSize = "height=500, width=600, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Twitter", "" + URI + ""]);
	                      break;

	                  case "facebook visible":
	                      var location = "https://www.facebook.com/sharer/sharer.php?u=" + URIEncoded + "",
	                          windowName = "Facebook",
	                          windowSize = "height=480, width=650, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Facebook", "" + URI + ""]);
	                      break;

	                  case "linkedin visible":
	                      var location = "http://www.linkedin.com/shareArticle?url=" + URIEncoded + "&title=" + title + "&summary=" + description + "&source=" + source + "",
	                          windowName = "LinkedIn",
	                          windowSize = "height=500, width=750, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "LinkedIn", "" + URI + ""]);
	                      break;

	                  case "google-plus visible":
	                      var location = 'https://plus.google.com/up/?continue=https://plus.google.com/share?url%3D' + URI + '',
	                          WindowName = 'Google',
	                          WindowSize = 'height=600, width=700, ';

	                      window.open(location, WindowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Google+", "" + URI + ""]);
	                      break;

	                  case "email":
	                      return true;

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Email", "" + URI + ""]);
	                      break;
	              }

	              event.preventDefault();
	          });

	      }

	      // Check for the presence of sharing utilities for page-specific content
	      if ($('.share-buttons > li').length !== 0) {
	          // sharing utilities are present
	          // $.sharedCount(socialURI, function (data) {
	          //
	          //                 // Retrieve stats and format counts
	          //                 var countTwitter = numberFormat(data.Twitter, "dd.twitter strong"),
	          //                     countFacebook = numberFormat(data.Facebook.share_count, "dd.facebook strong"),
	          //                     countLinkedIn = numberFormat(data.LinkedIn, "dd.linkedin strong"),
	          //                     countGoogle = numberFormat(data.GooglePlusOne, "dd.google-plus strong");
	          //             });
	          // Attach functionality
	          var links = $('.share-buttons > li').find("a");

	          $(links).on("click", function (event) {
	              var network = $(this).attr("class"),
	                  URI = window.location,
	                  URIEncoded = encodeURIComponent(URI),
	                  title = document.title,
	                  description = '',
	                  source = '';

	              if (!network === "email") {
	                  // Send data to analytics
	                  //_gaq.push(["_trackEvent", "2014 Sustainability Report", "Social", "" + network + ""]); // category, action, label (optional), value (optional), non interaction (optional)
	              }

	              switch (network) {
	                  case "twitter":
	                      var twitfix = title;
	                      twitfix = twitfix.split('|').join('%7C');
	                      var location = "https://twitter.com/intent/tweet?text=" + twitfix + ": " + description + "&url=" + URIEncoded + "",
	                          windowName = "Twitter",
	                          windowSize = "height=500, width=600, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Twitter", "" + URI + ""]);
	                      break;

	                  case "facebook":
	                      var location = "https://www.facebook.com/sharer/sharer.php?u=" + URIEncoded + "",
	                          windowName = "Facebook",
	                          windowSize = "height=480, width=650, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Facebook", "" + URI + ""]);
	                      break;

	                  case "linkedin":
	                      var location = "http://www.linkedin.com/shareArticle?url=" + URIEncoded + "&title=" + title + "&summary=" + description + "&source=" + source + "",
	                          windowName = "LinkedIn",
	                          windowSize = "height=500, width=750, ";

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "LinkedIn", "" + URI + ""]);
	                      break;

	                  case "google-plus":
	                      var location = 'https://plus.google.com/up/?continue=https://plus.google.com/share?url%3D' + URI + '',
	                          windowName = 'Google',
	                          windowSize = 'height=600, width=700, ';

	                      window.open(location, windowName, windowSize, windowAttributes);

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Google+", "" + URI + ""]);
	                      break;

	                  case "email":
	                      return true;

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Email", "" + URI + ""]);
	                      break;
	                 case "print":
	                      return true;

	                      // Send data to analytics
	                      // _gaq.push(["_trackEvent", "2014 Sustainability Report", "Print", "" + URI + ""]);
	                      break;
	              }

	              event.preventDefault();
	          });

	      }
	  }

})( jQuery );