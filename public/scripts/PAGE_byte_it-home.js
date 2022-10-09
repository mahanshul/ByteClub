$('.playbtn').click(function(event) {
	event.preventDefault();
	$('#text-to-replace').fadeOut(400, function() {
		$('#video_wrapper').fadeIn(200, function() {
			$('#byte_it_ad').css("background-color", "black");
			$('.close').css("transform", "scale(1)");
	        $('.close').css("color", "white");
	        player.playVideo();
		});
	});
});

$('.close').click(function() {
	player.stopVideo();
	$('#byte_it_ad').css("background-color", "#3F51B5");
	$('close').css("transform", "scale(1)");
	$('close').css("color", "white");
	$('#video_wrapper').fadeOut(400, function() {
		$('#text-to-replace').fadeIn();
	});
});


// 2. This code loads the IFrame Player API code asynchronously.
let tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
let player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
		height: '432',
		width: '768',
		videoId: '__wbAh2fYKg',
		events: {
			// 'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

// 4. The API will call this function when the video player is ready.
// function onPlayerReady(event) {
// 	event.target.playVideo();
// }

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
let done_playing = false;
function onPlayerStateChange(event) {
/*	if (event.data == YT.PlayerState.PLAYING && !done_playing) {
		setTimeout(stopVideo, 60000);
		done_playing = true;
	}*/
	if(event.data == YT.PlayerState.ENDED) {
		done_playing = true;
		$('.close').css("color", "red");
		$('.close').css("transform", "scale(2.3)");
	}
}
function stopVideo() {
	player.stopVideo();
}
function myFunction(x) {
	$('#menuToggle').addClass("resp");
	$('body').addClass("resp");
	$('#topbar').addClass("resp");
	$('#menu').addClass("resp");

	$('.right').addClass("resp");
	$('.menu-pointer').addClass("resp");
	if (x.matches) { // If media query matches
		$('.sidebar').css({"margin-left":"-17rem"});
		
	} 

	let open = false;
$('#menuToggle').click(function(){
	if(open == true){
		$('.sidebar').animate({"margin-left":"-17rem"});
		setTimeout(function() {
			$('main').fadeIn('slow');
			$('footer').fadeIn('slow');
    }, 500);
		
		open = false;
	} else if(open == false){
		$('main').fadeOut('fast');
		$('footer').fadeOut('fast');
		$('.sidebar').animate({"margin-left":"0px"});
		open = true;
	}
	
});
}


let x = window.matchMedia("(max-width: 550px)");
myFunction(x);
x.addListener(myFunction);



