function getTimeRemaining(endtime){
	var t = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor( (t/1000) % 60 );
	var minutes = Math.floor( (t/1000/60) % 60 );
	var hours = Math.floor( (t/(1000*60*60)) % 24 );
	var days = Math.floor( t/(1000*60*60*24) );
	return {
		'total': t,
		'days': days,
		'hours': hours,
		'minutes': minutes,
		'seconds': seconds
	};
}

function initializeClock(clock, from, to) {

	var daysSpan = clock.find('.days');
	var hoursSpan = clock.find('.hours');
	var minutesSpan = clock.find('.minutes');
	var secondsSpan = clock.find('.seconds');

	var beg = Date.parse(new Date());

	function updateClock() {
		var t_from = getTimeRemaining(from);
		var t_to = getTimeRemaining(to);

		if (Date.parse(from) > beg)
		{
			if (t_from.total >= 0)
			{
				daysSpan.html(t_from.days);
				hoursSpan.html(('0' + t_from.hours).slice(-2));
				minutesSpan.html(('0' + t_from.minutes).slice(-2));
				secondsSpan.html(('0' + t_from.seconds).slice(-2));
			}
			else
			{
				location.reload();
			}
		}
		else
		{
			if (Date.parse(to) > beg)
			{
				if (t_to.total < 0)
				{
					location.reload();
				}
			}
			else
			{
				clearInterval(timeinterval);				
			}
		}
	}

	updateClock();
	var timeinterval = setInterval(updateClock, 1000);
}


$(document).ready(function(){
	$("#countdown").each(function(){
		initializeClock($(this), $(this).data('from'), $(this).data('to'));
	});
});