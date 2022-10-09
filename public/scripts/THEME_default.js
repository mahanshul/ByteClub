var mobile = false;
var menu_pointer_el = $(".menu-pointer");
var menu_option_width_list = [];
var menu_option_left_list = [];
var menu_current_index = -1;
var menu_hover = false;

$(document).ready(function()
{

	byte_transfer_load = function()
	{
		$(".loader.main-loader .bytes .byte").each(function(){
			$(this).html(Math.round(Math.random(1)));
		});

		setTimeout(function()
		{
			if ($(".load-overlay").css('display') != 'none')
			{
				requestAnimationFrame(byte_transfer_load);	
			}
		},100);
	}
	requestAnimationFrame(byte_transfer_load);

	if (!mobile)
	{
		resize = function()
		{
			$("body > #wrapper > *").css({'min-height': 'calc(100vh - 4rem - ' + $("body > footer").outerHeight() + 'px)'});	
		}
		resize();
		$(window).resize(resize);

		$("#menu > li > a").each(function()
		{
			$(this).mouseenter(function()
			{
				$(this).addClass('hover');
			});
			$(this).mouseleave(function(){
				$(this).removeClass('hover');
			});
		});

		hover = function()
		{
			
			menu_option_width_list.splice(0, menu_option_width_list.length);
			menu_option_left_list.splice(0, menu_option_left_list.length);
			$("#menu > li > a").each(function(i)
			{
				menu_option_width_list[i] = $(this).outerWidth();
				if (i > 0)
				{
					menu_option_left_list[i] = menu_option_width_list[i-1] +  menu_option_left_list[i-1];
				}
				else
				{
					menu_option_left_list[i] = 0;
				}
				if ($(this).hasClass('current'))
				{
					menu_current_index = i;
				}
			});

			menu_hover = false;
			$("#menu > li > a").each(function(i){
				if ($(this).hasClass('hover'))
				{
					menu_move_pointer(i);
					menu_hover = true;
				}
			});
			if (!menu_hover)
			{
				menu_move_pointer(menu_current_index);
			}

			requestAnimationFrame(hover);
		}
		requestAnimationFrame(hover);

	}

});

function menu_move_pointer(i)
{
	menu_pointer_el.css({
		"left": menu_option_left_list[i],
		"width": menu_option_width_list[i],
	});
}