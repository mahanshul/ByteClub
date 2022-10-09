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