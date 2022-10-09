var win_h = 0, win_w = 0;
var topbar_el = $("#topbar"), topbar_height = 0;
var logo_big_el = $("#logo.big"), logo_big_height = 0, logo_big_top = 0;
var title_home_el = $("#title.home"), title_home_inner_el = $("#title.home .inner"), title_home_inner_height = 0;
var subtitle_home_el = $("#subtitle"), subtitle_home_height = 0, subtitle_home_top = 0, subtitle_home_inner_el = $("#subtitle .inner"), subtitle_home_inner_height = 0;
var cover_el = $("#cover"), cover_height = 0, cover_top = 0;
var title_top_el = $("#title.top");
var scroll_top = 0;
var scroll_a = 0, scroll_b = 0, scroll_c = 0, scroll_d = 0, scroll_e = 0, scroll_f = 0, scroll_g = 0, scroll_h = 0;

$(document).ready(function()
{
	resize = function()
	{

		win_h = $(window).outerHeight();
		win_w = $(window).outerWidth();	

		topbar_height = topbar_el.outerHeight();

		title_home_inner_height = title_home_inner_el.outerHeight();
		title_home_el.css({'height': title_home_inner_height});

		subtitle_home_inner_height = subtitle_home_inner_el.outerHeight();
		subtitle_home_el.css({'height': subtitle_home_inner_height});
		subtitle_home_height = subtitle_home_el.outerHeight();
		subtitle_home_top = subtitle_home_el.offset().top;

		logo_big_height = logo_big_el.outerHeight();
		logo_big_top = logo_big_el.offset().top;

		cover_height = cover_el.outerHeight();
		cover_top = cover_el.offset().top;

		scroll_a = ((win_h - (title_home_inner_height + subtitle_home_inner_height))/2);
		scroll_b = logo_big_height + logo_big_top + ((title_home_inner_height + subtitle_home_inner_height)/2) - (win_h/2);
		scroll_c = scroll_a + title_home_inner_height;
		scroll_d = subtitle_home_top + subtitle_home_inner_height;
		scroll_e = cover_top - topbar_height;
		scroll_f = scroll_e + scroll_a;
		scroll_g = scroll_f + title_home_inner_height - topbar_height;
		scroll_h = scroll_g + subtitle_home_inner_height;

	}
	resize();
	$(window).resize(resize);

	scroll = function()
	{

		scroll_top = $(window).scrollTop();

		if (scroll_top < scroll_b)
		{
			logo_big_el.css({
				"visibility": "visible",
				"opacity": 1 - (scroll_top/scroll_b),
			});
			title_home_inner_el.css({
				"position": "static",
				"visibility": "visible",
			});
			subtitle_home_inner_el.css({
				"visibility": "hidden",
				"position": "fixed",
				"top": scroll_c,
			});
			topbar_el.removeClass("solid");
			title_top_el.css({
				"opacity": 0,
				"visibility": "hidden",
			});
		}
		else
		{
			logo_big_el.css({"visibility": "hidden"});

			title_home_inner_el.css({
				"position": "fixed",
			});

			subtitle_home_inner_el.css({
				"position": "fixed",
			});

			if (scroll_top < scroll_e)
			{
				subtitle_home_inner_el.css({
					"visibility": "visible",
					"top": scroll_c,
					"opacity": (scroll_top - scroll_b)/(scroll_d - scroll_b),
				});
				title_home_inner_el.css({
					"top": scroll_a,
					"opacity": 1,
					"visibility": "visible",
				});
				topbar_el.removeClass("solid");
				title_top_el.css({
					"opacity": 0,
					"visibility": "hidden",
				});
			}
			else
			{
				subtitle_home_inner_el.css({
					"top": scroll_c - (scroll_top - scroll_e),
				});
				title_home_inner_el.css({
					"top": scroll_a - (scroll_top - scroll_e),
				});
				topbar_el.addClass("solid");

				if (scroll_top < scroll_f)
				{
					title_home_inner_el.css({
						"opacity": 1,
						"visibility": "visible",
					});
					subtitle_home_inner_el.css({
						"visibility": "visible",
						"opacity": 1,
					});
					title_top_el.css({
						"opacity": 0,
						"visibility": "hidden",
					});
				}
				else
				{
					if (scroll_top < scroll_g)
					{
						title_home_inner_el.css({
							"opacity": 1 - ((scroll_top - scroll_f)/(scroll_g - scroll_f)),
							"visibility": "visible",
						});
						title_top_el.css({
							"opacity": ((scroll_top - scroll_f)/(scroll_g - scroll_f)),
							"visibility": "visible",
						});
						subtitle_home_inner_el.css({
							"visibility": "visible",
							"opacity": 1 - ((scroll_top - scroll_f)/(scroll_h - scroll_f)),
						});
					}
					else
					{
						title_home_inner_el.css({
							"opacity": 0,
							"visibility": "hidden",
						});

						title_top_el.css({
							"opacity": 1,
							"visibility": "visible",
						});

						if (scroll_top < scroll_h)
						{
							subtitle_home_inner_el.css({
								"visibility": "visible",
								"opacity": 1 - ((scroll_top - scroll_f)/(scroll_h - scroll_f)),
							});
						}
						else
						{
							subtitle_home_inner_el.css({
								"visibility": "hidden",
								"opacity": 0,
							});
						}
					}
				}
			}
			
		}

		requestAnimationFrame(scroll);
	}
	//requestAnimationFrame(scroll);
	function myFunction(x) {
		if (x.matches) { // If media query matches
		
			var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  
	window.onscroll = function hello() {
  
		if (document.body.scrollTop > 400 | document.documentElement.scrollTop > 400) {
	    // alert('scrol');
	    document.getElementById("title_mob_txt").style.display = "none";
            } else {
				// alert('!scroll');
        document.getElementById("title_mob_txt").style.display = "block";
			}

		}
		
		} else {
			requestAnimationFrame(scroll);
		}
	}
	
	let x = window.matchMedia("(max-width: 550px)");
	myFunction(x);
	x.addListener(myFunction);

	
});
