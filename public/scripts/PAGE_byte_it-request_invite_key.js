$.validator.addMethod("pattern", function(value, element, regexpr)
{
	return regexpr.test(value);
}, "Invalid Format");

$("#request-invite-key-form").validate({
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
		institution_name:
		{
			pattern: /^[a-zA-Z0-9][a-zA-Z0-9\.\'\-\/\\\(\)\,\ ]+$/
		},
		co_ordinator_name:
		{
			pattern: /^[a-zA-Z][a-zA-Z\.\'\-\ ]+$/
		},
		co_ordinator_email:
		{
			pattern: /^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/i
		}
	},
	messages:
	{
		institution_name:
		{
			required: "The team must represent an Institution",
			minlength: "That doesn't appear to be a valid Institution name",
			pattern: "That doesn't appear to be a valid Institution name",
		},
		co_ordinator_name:
		{
			required: "The team must have a co-ordinator",
			minlength: "That doesn't appear to be a valid name",
			pattern: "That doesn't appear to be a valid name",
		},
		co_ordinator_email:
		{
			required: "We would need your E-Mail ID for further communication",
			minlength: "That doesn't appear to be a valid E-Mail ID",
			email: "That doesn't appear to be a valid  E-Mail ID",
			pattern: "That doesn't appear to be a valid  E-Mail ID",
		},
	},
	normalizer:
	function(value)
	{
		return reduce_multiple_spaces(value);
	}
});

$("#request-invite-key-form").submit(function(event)
{
	event.preventDefault();
	if ($("#request-invite-key-form").valid())
	{
		grecaptcha.execute();
		// request_invite_key_form_submit();
	}
});

function request_invite_key_form_submit()
{
	submit($("#request-invite-key-form"), $("#request-invite-key-form").attr('action'), function(response){
		console.log(response);
		grecaptcha.reset();
	});	
}