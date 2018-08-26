({
	init: function()
	{
		$($.proxy(this.onDOMLoad, this));
	},

	onDOMLoad: function()
	{
			//this.initHeaderModule();
			this.initItemSlider();
			this.initSeriItem();
			this.initImageUpload();
			this.initEditingForm();
			this.initPopup();
	},

	initHeaderModule: function()
	{
		// Init slider.
		$('.mod-header')
				.flexslider({
						animation: 'fade',
						controlNav: false,
						directionNav: false,
						slideshowSpeed: 8000,
						animationSpeed: 2000,
				});
	},

	initPopup: function()
	{
			// On click behavior
			$('a[data-popup]').on('click', function()
			{
					// Get new URL
					var url = window.location.href;
					var splitUrl = url.substring(url.lastIndexOf('/') + 1);
					var fullUrl = url.replace(splitUrl, 'ajax');

					// Get names
					var name = $(this).data('popup');

					// Get popup information
					$.post(fullUrl,
                {
                    name: name
                }

								).done(
										function(msg){

										}
								).fail(
										function(xhr, status, error) {
						        // error handling
						    		}
								);

					// Append to body
					//$('body').append();
			});
	},

	initItemSlider: function()
	{

		$('.flex .box-slider')
		.owlCarousel({
		    items:4,
		    loop:true,
				nav: true,
				autoWidth:true,
				pagination: false,
		    margin:10,
		    responsive:{
		        540:{
		            items:1
		        },
						720:{
								items:2
						},
						960:{
								items:3
						}
		    }
		});

		$('.flex .item .categories')
		.owlCarousel({
		    center: true,
		    items:3,
		    loop:true,
			nav: true,
			autoWidth:true,
			pagination: false,
		    margin:10
		    // responsive:{
		    //     600:{
		    //         items:4
		    //     }
		    // }
		});

		$('.flex .item .image-slider')
		.owlCarousel({
		    center: true,
		    items:1,
		    loop:true,
			nav: true,
			pagination: false
		    // responsive:{
		    //     600:{
		    //         items:4
		    //     }
		    // }
		});

		$(".flex .item .fa.fa-window-maximize").on('click', function() {
			var el = $(this).parents('.item');
			var offset = $(this).parents('.item').offset();
			var width = $(this).parents('.item').outerWidth();
			$(this).parents('.item')
				.addClass('.item-popup')
				.css({position: 'fixed', top: offset.top, left: offset.left, 'z-index': '10', width: width})
				setTimeout(function(){
			        el.animate({width: "30vw"}, {duration: 1200, queue: false})
						.delay(50).animate({left: '50%', transform: 'translateX(-50%)'}, {duration: 10000})
						.delay(25).animate({top: '50%', transform: 'translateY(-50%)'}, {duration: 11200})
						.delay(50).animate({height: '50vw'}, {duration: 300});
		        },100);

				//.animate({height: '50vw', width: '30vw', top: '50%', left: '50%' });
		});

	},

	//Code that should run when viewing a 'seri'
	initSeriItem: function()
	{
		// Fit text in items
		// $('.content .flex .item .title, .textfit').textfill({
		// 	'minFontPixels': 15,
		// 	'maxFontPixels': 19,
		// });

		// Activate popover for title
		$(".popover").popover({ trigger: "hover" });

		$('.seri .images .slider')
		.owlCarousel({
		    center: true,
		    items:1,
		    loop:true,
				nav: false,
				pagination: false
		});

        // $('#test').simplyTag(
        // {
        //     forMultiple: true,
        //     dataSource: JSON.parse('[{ "key": 1, "value": "jQuery" }, { "key": 2, "value": "Script" }, { "key": 3, "value": "Net" }]')
        // });

		// Add more 'seri' names
		$('.seri.edit .seri-information .seriBar .add_input#name').on('click', function() {
			$('.seri.edit .seri-information .seriBar.name ul').append('<li><input class="name_input no-style" name="name[]" value="" placeholder="Title here..."></li>');
		});
		// Change name in short-information
		$('.seri.edit .seri-information .seriBar.name ul li input:first-child').change(function() {
			$('.seri.edit .seri-information .short-information .top h1').text($('.seri.edit .seri-information .seriBar.name ul li input:first-child').val())
		});

		// Genres as tags
		$('.seri.edit .seri-information .genre_select').tokenize2();

		$('.seri .seri-information .readmore').on('click', function(event) {
			// Prevent redirect (a tag)
			event.preventDefault();
			// Toggle max height
			$(this).parents('div.expand').find('p').toggleClass('mx-hta');

			// Change text
			if($(this).text() == 'Read more')
				$(this).text('Read less');
			else
	           $(this).text('Read more');
		});

		$(".seri .seri-information .seri-body .steps").steps({
		    headerTag: "h3",
		    bodyTag: "section",
		    transitionEffect: "slideLeft",
		    enableFinishButton: false,
		    enablePagination: false,
		    enableAllSteps: true,
		    titleTemplate: "#title#",
		    cssClass: "tabcontrol"
		});

	},

	initImageUpload: function()
	{

		$("#uploadFile").dropzone({
		  	paramName: "file", // The name that will be used to transfer the file
		  	maxFilesize: 5, // MB
			autoProcessQueue: false,
			previewTemplate: '#image_preview',
		  	accept: function(file, done) {
		    	done();
		  	}
		});

		$("#uploadSliderfiles").dropzone({
		  	paramName: "file", // The name that will be used to transfer the file
		  	maxFilesize: 5, // MB
			uploadMultiple: true,
			autoProcessQueue: false,
		  	accept: function(file, done) {
		    	done();
		  	}
		});

		$("#uploadFile").change(function(){
			$('#image_preview').html("");

		     var total_file=document.getElementById("uploadFile").files.length;
		     for(var i=0;i<total_file;i++) {
			     $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
		     }

	  	});
	},

	initEditingForm: function()
	{
		//Click?
	    $(".edit-form").click(function(){
	        //Remove disabled inputs
	        $("input:not([name*=delete])").prop("disabled", false);

	        //Show delete row
	        $('.edit-form-index').hide();
	        $('.edit-form-show').show().addClass('xs-block');

	        //Change opacity label
	        $("input").parent('label.btn-badge').css({opacity:'1'});

	        //Replace edit button to save button
	        $(".edit-form").replaceWith("<button class='btn btn-primary btn-submit edit-form' type='submit' name='updateOrCreate'><i class='fa fa-pencil-square-o' aria-hidden='true'></i><span>Save</span></button>");
	    });

	    //Click?
	    $("button[name=deleteRow]").click(function(){
	        $(this).parent('td').parent('tr').toggleClass('deleteRow');
	        $(this).parent('td').find('input[name*=delete]').prop('disabled', function(i, v) { return !v; });
	    });

	},

	initMaterialMotions: function()
	{
		/** Ripple effect **/
		$(".paper").mousedown(function(e) {
 		//    console.log($(this).offset().left);
 		//    console.log(e.pageX);
 		//    console.log($(this).offset().left - ( $(this).find(".ripple").width() ));
 		//    console.log($(this).offset().left - ( $(this).find(".ripple").width() /2 ));
 	      var ripple = $(this).find(".ripple");
 	      ripple.removeClass("animate");
 	      var x = parseInt(e.pageX - $(this).offset().left) - (ripple.width() / 2);
 	      var y = parseInt(e.pageY - $(this).offset().top) - (ripple.height() / 2);
 	      ripple.css({
 	         top: y,
 	         left: x
 	      }).addClass("animate");
 	   });

	   /** Material expand motion **/
	   $.Velocity.defaults.easing = [0.4, 0.0, 0.2, 1];
	   $.Velocity.defaults.queue = false;

	   var $box = $(".box");
	   var box_expanded = false;

	   $box.click(function() {
		 box_expanded === false ? expand_animation() : collapse_animation();
	   });

	   var offset = $box.offset();
	   var width = $box.outerWidth();

	   var expand_animation = function() {
		 $box
		   //.css({position:'fixed', top: offset.top, left: offset.left, width: width})
		   .velocity(
			 {
			   width: 300,
			   top: '50%',
			   translateY: '-50%',
			   'z-index': '10'
			 },
			 {
			   duration: 280
			 }
		   )
		   .velocity(
			 {
			   height: 300,
			   left: '50%',
			   translateX: '-50%'
			 },
			 {
			   delay: 35,
			   duration: 340,
			   complete: function() {
				 box_expanded = true;
			   }
			 }
		   );
	   };
	   var collapse_animation = function() {
		 $box
		   .velocity(
			 {
			   position: 'relative',
			   width: 100,
			   top: 0,
			   translateY: 0,
			   'z-index': '1'
			 },
			 {
			   duration: 320,
			   delay: 55
			 }
		   )
		   .velocity(
			 {
			   height: 100,
			   left: 0,
			   translateX: 0,
			 },
			 {
			   duration: 320,
			   complete: function() {
				 box_expanded = false;
			   }
			 }
		 )
		 //.removeAttr('style')
	   };
   	},

}).init();
