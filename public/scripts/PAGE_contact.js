$.validator.addMethod("pattern", function(value, element, regexpr)
{
	return regexpr.test(value);
}, "Invalid Format");

$("#message-form").validate({
	errorPlacement:
		function(error, element)
		{
			error.insertAfter(element.parents(".normal"));
		},
	highlight:
		function(element, errorClass, validClass)
		{
			$(element).parents(".form-field").addClass(errorClass).removeClass(validClass);
		},
	unhighlight:
		function(element, errorClass, validClass)
		{
			$(element).parents(".form-field").removeClass(errorClass).addClass(validClass);
		},
	rules:
		{
			name:
			{
				pattern: /^[a-zA-Z][a-zA-Z\.\'\-\ ]+$/
			},
			email:
			{
				pattern: /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/i
			}
		},
	messages:
	{
		name:
		{
			required: "We need to know what we should call you",
			minlength: "That doesn't appear to be a valid name",
			pattern: "That doesn't appear to be a valid name",
		},
		email:
		{
			required: "We need your E-Mail ID to reply back to you",
			minlength: "That doesn't appear to be a valid E-Mail ID",
			email: "That doesn't appear to be a valid  E-Mail ID",
			pattern: "That doesn't appear to be a valid  E-Mail ID",
		},
		subject:
		{
			required: "You can't send a message without a subject",
		},
		body:
		{
			required: "The message appears to be empty",
		}
	}
	,
	normalizer:
		function(value)
		{
			return reduce_multiple_spaces(value);
		}
});

$("#message-form").submit(function(event)
{
	event.preventDefault();
	if ($("#message-form").valid())
	{
		grecaptcha.execute();
	}
});

function message_form_submit()
{
	$(".server-message").fadeOut(0);
	$("#send").fadeOut(150);
	$("#inner").fadeOut(150, function()
	{
		requestAnimationFrame(byte_transfer_form);
		$("#loader-message").fadeIn(150, function()
		{
			submit($("#message-form"), $("#message-form").attr('action'), function(response)
			{
				$("#loader-message").fadeOut(150, function()
				{
					if (response.overall_success)
					{
						$("#success-message").fadeIn(150);
						$("body, html").animate({"scrollTop": ($("#success-message").offset().top - $("#topbar").outerHeight())}, 150);
					}
					else
					{
						$("#error-message").fadeIn(150);
						$("#inner").fadeIn(150);
						$("#send").fadeIn(150);
						$("body, html").animate({"scrollTop": ($("#error-message").offset().top - $("#topbar").outerHeight())}, 150);
						grecaptcha.reset();
					}
				});
			});			
		});
		$("body, html").animate({"scrollTop": ($("#loader-message").offset().top - $("#topbar").outerHeight())}, 150);
	});
}

byte_transfer_form = function()
{
	$(".loader.server-message-loader .bytes .byte").each(function(){
		$(this).html(Math.round(Math.random(1)));
	});

	setTimeout(function()
	{
		if ($(".loader.server-message-loader").css('display') != 'none')
		{
			requestAnimationFrame(byte_transfer_form);
		}
	},100);
}