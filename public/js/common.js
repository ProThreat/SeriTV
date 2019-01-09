({
	init: function()
	{
		$($.proxy(this.onDOMLoad, this));
	},

	onDOMLoad: function()
	{
			this.initMenus();
			//this.initHeaderModule();
			this.initItemSlider();
			this.initSeriItem();
			this.initImageUpload();
			this.initEditingForm();
			this.initPopup();
	},

	initMenus: function()
	{
			// Check swipe
			$(".swipe-area").swipe({
			    swipeStatus:function(event, phase, direction, distance, duration, fingers)
			        {
									// If swipe right
			            if ( phase == "move" && direction == "right" )
									{
											// Open sidebar
			               	$(".content").addClass("openMenu");

											//
			                return false;
			            }
									// If swipe left
			            if ( phase == "move" && direction == "left" )
									{
											// Close sidebar
			                $(".content").removeClass("openMenu");

											//
			                return false;
			            }
			        }
			});

			setTimeout(function() {
					$('.bounce').css({'opacity': '0'})
			}, 1800);
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
			var groupType = '';

			// Delay for typing
			function delay(callback, ms) {
					var timer = 0;
					return function() {
							var context = this, args = arguments;
							clearTimeout(timer);
							timer = setTimeout(function () {
								callback.apply(context, args);
							}, ms || 0);
					};
			}

			// On click behavior
			$('a[data-popup]').on('click', function()
			{
					// Set group type
					groupType = $(this).data('type');

					// Disable Scroll
					$('body').css({'overflow-y': 'hidden'});

					// Get names
					var name = $(this).data('popup'),
							crew_type = $(this).data('type');

					// Get new URL
					var url = window.location.href;
					var splitUrl = url.substring(url.lastIndexOf('/') + 1);
					var fullUrl = url.replace(splitUrl, name + '/ajax');

					// Get popup information
					getPopupInformation();

					//
					function getPopupInformation(offset = null)
					{
							// Get popup information based on link
							$.post(fullUrl,
		                {
												'_token': $('meta[name=csrf-token]').attr('content'),
		                    name: name,
												offset: offset,
												crew_type: crew_type,
		                }

										).done(
												function(response)
												{
														// Overlay
														var $overlay = $('.SeriOverlay');

														// Update popup?
														if( $overlay.length )
																$overlay.html(response);

														// Append to body
														else
																$('body').append(response);

														refreshPopup();
														refreshPagination();
												}
										).fail(
												function(xhr, status, error) {
								        		// error handling
								    		}
										);
					}

					refreshPagination();

					function refreshPagination()
					{
							setTimeout(function()
							{
									// Pagination
									$('.SeriPopup .pagination .page-item').on('click', function()
									{
											// Update pagination
											getPopupInformation( $(this).find('.page-link').text() );
									});
							}, 200);
					}
			});

			function refreshPopup()
			{
					// Inner popup behavior
					var $filter = $('.SeriPopup input'),
							$crew = $('.SeriPopup .crew-group.'+groupType+' .crew-box'),
							$addButton = $('.SeriPopup .addButton'),
							$closeButton = $('.SeriPopup .closeButton');

					$filter.on('keyup', delay(function(e)
					{
							// Return to normal pagination if there is nothing typed in search field
							if(!this.value)
							{
									// Reset all styling
									$('.SeriPopup .crew-group.'+groupType+' .crew-box').css('display', 'block');
									$('.SeriPopup .crew-group.'+groupType+' .crew-box').removeClass('search-show');

									//
									return;
							}

							// Check search results for each row
							for (i = 0; i < $crew.length; i++)
							{
									// Get row
									var td = $crew[i];

									//
									if (td) {
											if ( $(td).find('input[name="crew_name"]').val().indexOf( $filter.val().toUpperCase() ) > -1)
											{
													// Show anyway because of search
													$(td).addClass('search-show');

													// Reset display styling
													td.style.display = "";
											}
											else
													// Don't show item
													td.style.display = "none";
									}
							}
					}, 400));

					// Click behavior
					$crew.on('click', function()
					{
							// Add selected class
							$(this).toggleClass('selected');
					});

					// Only close Popup
					$closeButton.on('click', function()
					{
							// Turn on scroll on body
							$('body').attr('style', '');

							// Remove overlay
							$(this).parents('.SeriOverlay').remove();
					});

					// Add crew and close popup
					$addButton.on('click', function()
					{
							// Add crew to view
							$.each( $(this).parents('.SeriPopup').find('.crew-box.selected'), function()
							{
									// Append clone of object
									$('.seri .seri-information .seri-body .crew-group.'+groupType+' .crew-add').before( $(this).clone() );
							});

							// Turn on scroll on body
							$('body').attr('style', '');

							// Remove overlay
							$(this).parents('.SeriOverlay').remove();

							// Refresh function for removing crew members
							refreshDelete();
					});

			}

			refreshDelete();
			function refreshDelete()
			{
					// Delete items on click
					$('.seri .seri-information .seri-body .crew-group .crew-box .image').on('click', function() {
							$(this).parents('.crew-box').remove();
					});
			}
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
				setTimeout(function()
				{
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

			// Add more 'seri' names
			$('.seri.edit .seri-information .seriBar .add_input#name').on('click', function() {
					$('.seri.edit .seri-information .seriBar.name ul').append('<li><input class="name_input no-style" name="name[]" value="" placeholder="Title here..."></li>');
			});
			// Change name in short-information
			$('.seri.edit .seri-information .seriBar.name ul li input:first-child').change(function() {
					$('.seri.edit .seri-information .short-information .top h1').text($('.seri.edit .seri-information .seriBar.name ul li input:first-child').val())
			});

			// Select fields as tag fields
			$('.seri.edit .seri-information select.tags').tokenize2();

			$('.seri .seri-information .readmore').on('click', function(event)
			{
				// Prevent redirect
				event.preventDefault();

				// Toggle max height
				$(this).parents('div.expand').find('p').toggleClass('mx-hta');

				// Change text
				if($(this).text() == 'Read more')
						$(this).text('Read less');
				else
		        $(this).text('Read more');
			});

			// Add steps
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

			// Main image
			$("#uploadFile").dropzone({
					url: '/admin/seri/upload-image',
			  	paramName: "file", // The name that will be used to transfer the file
			  	maxFilesize: 5, // MB
					acceptedFiles: '.jpg, .jpeg, .png, .svg',
					autoProcessQueue: false,
			  	accept: function(file, done) {
			    		// done();
			  	},
			});

			// $("#uploadSliderfiles").dropzone({
			//   	paramName: "images", // The name that will be used to transfer the file
			//   	maxFilesize: 5, // MB
			// 		uploadMultiple: true,
			// 		autoProcessQueue: false,
			//   	accept: function(file, done) {
			//     		done();
			//   	}
			// });

			$("#uploadFile").change(function()
			{
					// Change html
					$('.seri .seri-information .image').html("");

					// Get files
					var total_file=document.getElementById("uploadFile").files.length;

					// Apply file
					for(var i=0;i<total_file;i++)
					 		$('.seri .seri-information .image').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

			 });
	},

	initEditingForm: function()
	{
			// Focus input
			$('.editForm .add_table_row input').focus();

			// Click?
	    $(".edit-form").click(function() {
	        // Remove disabled inputs
	        $("input:not([name*=delete])").prop("disabled", false);

	        // Show delete row
	        $('.edit-form-index').hide();
	        $('.edit-form-show').show().addClass('xs-block');

	        // Change opacity label
	        $("input").parent('label.btn-badge').css({opacity:'1'});

	        // Replace edit button to save button
	        $(".edit-form").replaceWith("<button class='btn btn-primary btn-submit edit-form' type='submit' name='updateOrCreate'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> <span>Save</span></button>");
	    });

	    // Click?
	    $("button[name=deleteRow]").click(function(){
	        $(this).parent('td').parent('tr').toggleClass('deleteRow');
	        $(this).parent('td').find('input[name*=delete]').prop('disabled', function(i, v) { return !v; });
	    });

	},

}).init();
