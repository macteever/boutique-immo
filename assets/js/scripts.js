(function ($, root, undefined) {
	$(document).ready(function(){

		// // SELECTED FILE INPUT 

		Vue.component('image-field', {
			data: function() {
				return {
					image: ''
				}
			},
			props: {
				number: {
					type: Number,
					default: 0
				},
				required: {
					type: Boolean,
					default: false
				}
			},
			methods: {
			   onFileChange(e) {
				  var files = e.target.files || e.dataTransfer.files;
				  if (!files.length)
					 return;
				  this.createImage(files[0]);
			   },
			   createImage(file) {
				  var image = new Image();
				  var reader = new FileReader();
				  var vm = this;

				  reader.onload = (e) => {
					 vm.image = e.target.result;
				  };
				  reader.readAsDataURL(file);
			   },
			   removeImage: function (e) {
				  this.image = '';
			   }
			 },
			template: '<div id="app" class="d-flex flex-column justify-content-center p-relative form-file">' +
						   '<div v-show="!image" >'+
							   '<input @change="onFileChange" :required="required" class="input-file" type="file" :name="`user-post-file-${number}`" >'+
							   '<label class="input-file-trigger d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="huey"><i class="material-icons fs-28">cloud_upload</i><span class="fs-15 text-grey">Choisir une photo</span></label>'+
						   '</div>'+
						   '<div v-if="image" class="d-flex flex-column p-relative">'+
							   '<img :src="image" />'+
							   '<button class="btn-immo fs-13" @click="removeImage">Supprimer</button>'+
						   '</div>'+
					   '</div>'
		})
		
		new Vue({
			el: '#vue-target',
			data: {
			  list: [1, 2, 3]
			}
		 })



		
		// MODAL POST ESTATE

		var $modalTarget = $('.box-offres .btn-modal');
		
		$($modalTarget).click(function(e){
			var buttonId = $(this).attr('id');
			$('#modal-overlay').removeAttr('class').addClass(buttonId);
			$('body').addClass('modal-active');
		 });
		 
		var modal = document.getElementById("modal-overlay");

		window.onclick = function(event) {
			if (event.target == modal) {

				//modal.style.display = "none";
				$('#modal-overlay').addClass('out');
				$('body').removeClass('modal-active');
			}
		}
		$('.modal-close').click(function(){
			$('#modal-overlay').addClass('out');
			$('body').removeClass('modal-active');
		});

		// MODAL REGISTER
		var $modalTarget2 = $('.btn-register');

		$($modalTarget2).click(function(f){
			var buttonId2 = $(this).attr('id');
			$('#modal-overlay-2').removeAttr('class').addClass(buttonId2);
			$('body').addClass('modal-active');
		 });
		 
		$(document).mouseup(function(e) {

			var containerParent = $("#modal-overlay-2");
			var container = $("#modal-overlay-2 .modal");

			// if the target of the click isn't the container nor a descendant of the container
			if (!container.is(e.target) && container.has(e.target).length === 0) 
			{
				containerParent.addClass('out');
				$('body').removeClass('modal-active');
			}
		});

		// APPARITION
		var delay = 0;
		$('.apparition-2').each(function () {
				var $li = $(this);
				setTimeout(function () {
						$li.addClass('animation-fade-in');
				}, delay += 150);
		});

		var delay1 = 0;
		$('.apparition-3').each(function () {
				var $li = $(this);
				setTimeout(function () {
						$li.addClass('animation-fade-up');
				}, delay1 += 200);
		});

		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
		//>=, not <=
			if (scroll >= 80) {
				$('.update-user-confirm').addClass('translateY-100')
			}
		});
	
		// CLOSE FORMS
		$('#close-form, #close-form2').click(function() {
			console.log('close forms');
			$('#deposer-form, #trouver-form, #close-form').fadeOut(300);
			$('main').removeClass('filter-form');
		});

		// TABS ANIMATION FORMS
		$('.tab a').on('click', function (e) {
		  e.preventDefault();
		  $(this).parent().addClass('active');
		  $(this).parent().siblings().removeClass('active');

		  target = $(this).attr('href');

		  $('.tab-content > div').not(target).hide();
		  $(target).fadeIn(600);
		});
		// TABS ANIMATION REGISTER FORMS
		$('.register-tab a').on('click', function (e) {
		  e.preventDefault();
		  $(this).parent().addClass('active');
		  $(this).parent().siblings().removeClass('active');

		  target = $(this).attr('href');

		  $('.register-tab-content > div').not(target).hide();
		  $(target).fadeIn(600);
		});

		// TABS ANIMATION DASHBOARD
		$('.dashboard-tab a').on('click', function (e) {
			e.preventDefault();
			$(this).parent().addClass('active');
			$(this).parent().siblings().removeClass('active');
 
			target = $(this).attr('href');
 
			$('.dashboard-tab-content > section').not(target).hide();
			$(target).fadeIn(600);
		});

		// RESIZE HEADER SCROLLTOP
		$(window).on( "scroll", function() {
			if ( $(window).scrollTop() > 80) {
				$('body').addClass("fixed");
			}else{
				$('body').removeClass("fixed");
			}
		});


		// TEST NEW MENU ANIMATION 

		var burgerBtn = document.getElementById('burgerBtn');
		var mobile = document.getElementById('mobile');
		var demo1 = document.getElementById('demo1');
		var demo2 = document.getElementById('demo2');

		burgerBtn.addEventListener('click', function() {
			mobile.classList.toggle('navigation');
		 }, false);
		 
		
		

    	// MENU BURGER
      // Object variables for event handlers
      // var triggers = ({
      //     menuBtn : $('#burgerBtn')
      // });

      // triggers.menuBtn.click(function() {
      //   $("body").toggleClass("responsive");
      // //   $(".sideMenu").slideToggle("slow");
      //   $(this).toggleClass('open');
      //   $(this).find("button").toggleClass('menu-open');

      //   });

      // // // ADD class anim with Delay
      //   $('#burgerBtn').click(function() {
      //       if ( $('.wrapper').hasClass( "navigation" ) ) {
      //           $('.sideMenu li').removeClass('animation-fade-out')
      //           var delay = 0;
      //            $('.sideMenu li').each(function() {
      //              var $li = $(this);
      //              setTimeout(function() {
      //                $li.addClass('animation-fade-up');
      //              }, delay+=100); // delay 100 ms
      //            });
      //       }
      //       else {
      //           setTimeout(function() {
      //               $('.sideMenu li').removeClass('animation-fade-up');
      //           }, 800);
      //       }
      //   });
      //   $('ul>li>a').click(function() {
      //    // $('body').removeClass('responsive');
      //    $('.sideMenu').css('display', 'none');
      //    $('#burgerBtn > button').toggleClass('menu-open');
      //   });

		// START RESIZE
      $(window).on("load resize", function () {

			// SLIDER HOME TOP
			$('.home-slider').slick({
				dots: false,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 7000,
				accessibility: true,
			});

			$('.home-partner-slider').slick({
				dots: false,
				arrows: false,
				speed: 500,
				cssEase: 'linear',
				autoplay: true,
				autoplaySpeed: 7000,
				infinite: true,
				slidesToShow: 4, 
				slidesToScroll: 1,
				responsive: [
					{
					  breakpoint: 770,
					  settings: {
						 slidesToShow: 3,
						 slidesToScroll: 1,
					  }
					},
					{
					  breakpoint: 425,
					  settings: {
						 slidesToShow: 2,
						 slidesToScroll: 1
					  }
					}
				 ]
			  });

			// /* SLICK SLIDER SINGLE BIENS */
			//
			$('.slider-biens').slick({
			  infinite: true,
				arrows: false,
				autoplay: true,
				autoplaySpeed: 5000,
				fade: false,
				dots: false,
			  slidesToShow: 1,
			  slidesToScroll: 1,
			});
			// Init fancyBox
			$().fancybox({
			  selector : '.slick-single .slick-slide:not(.slick-cloned)',
			  hash     : false
			});
			$('.slider-biens').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
				infinite: true,
			  arrows: false,
				autoplay: true
			});

			// /* SLICK SLIDER ARCHIVE BIENS */
			// $(function () {
		   //  var $arrows = $('.archive-arrows');
		   //  var $next = $arrows.children(".archive-slide-next");
		   //  var $prev = $arrows.children(".archive-slide-prev");

			// $('.slider-archive-biens').slick({
			// 		arrows: false,
			// 		infinite: true,
			// 		slidesToShow: 1,
			// 		slidesToScroll: 1
		   //  });

		   //  $('.archive-slide-next').on('click', function (e) {
		   //      var i = $next.index( this )
		   //      slick.eq(i).slick('slickNext');
		   //  });
		   //  $('.archive-slide-prev').on('click', function (e) {
		   //      var i = $prev.index( this )
		   //      slick.eq(i).slick('slickPrev');
		   //  });
			// });

    }).resize();
		// END RESIZE

		});
})(jQuery, this);