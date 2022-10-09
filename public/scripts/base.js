var transition_elements = [];
var i = 0;
var done_step = 0;

function done()
{
	done_step++;
	if (done_step >= 2)
	{
		$.each(transition_elements, function(i){
			$(transition_elements[i][0]).css({'transition-property': transition_elements[i][1]}); 
		});
		$(".loader.main-loader").fadeOut(150, function(){
			$(".load-overlay").fadeOut(150, function(){
				$("html").css({'overflow': 'auto'});
				$(".load-overlay").css({'display': 'none'});			
			});
		});
	}
}

$(window).on('load', function(){
	done();
});

$(document).ready(function(){
	$(".loader.main-loader").fadeOut(0, function(){
		$(".loader.main-loader").fadeIn(150, function(){
			$("html body *").each(function()
			{
				if ($(this).css('transition-property') != 'none')
				{
					transition_elements[i] = [$(this), $(this).css('transition-property')];
					$(this).css({'transition-property': 'none'});
					i++;
				}
			});
			setTimeout(function(){
				done();
			}, 150);
		});
	});


	$("a").click(function(e)
	{
		var anchor = $(this), target = anchor.attr('target');
		
		if ((target == ''))
		{
			e.preventDefault();
			alert(target);
			var href = anchor.attr('href');
			$("body").fadeOut(150, function(){
				window.location.href = href;
			});
		}
	});
});


function reduce_multiple_spaces(value)
{
	value = value.trim();
	value = value.replace(/([ ])+/g, " ");
	return value;
}

function submit(el, action, complete, options=[])
{
	if (options["method"] == undefined)
	{
		options["method"] = "POST";
	}
	$.ajax({
		url: action,
		data: el.serialize(),
		method: options["method"],
	}).done(function(response){
		complete(JSON.parse(response));
	}).fail(function(){
		complete({action_performed: false});
	});
}