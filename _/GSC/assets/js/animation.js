jQuery(document).ready(function() {


	$('.menu-icon-img-mnbly').click(function() {
		$('.menu-icon-holder-mnbly').toggleClass('orange');
		if ($('.menu-icon-img-mnbly').hasClass('rotate'))
		 {
		 	$( ".side-menu-mnbly" ).animate({
			    left: "-400"
			  }, 600);
		 }else
		 {
			$( ".side-menu-mnbly" ).animate({
			    left: "5"
			  }, 600, function() {
			    // Animation complete.
			    $( ".side-menu-mnbly" ).animate({
			    left: "0"
			  	},300);
			  });
		 }
			  

	});

	$('.menu-icon-img-mnbly').click(function(e){
    	$('.menu-icon-img-mnbly').toggleClass('rotate', {duration:500});
    	e.preventDefault();
	});
	
	
	
	
	
	
});


//onload

$( window).load(function()
{
	
	$('.account-right-info').animate(
		{
			opacity     :"1",
			paddingRight:"100px"
		},400);

});









//header Animation

$(window).scroll(function(){
    if($(document).scrollTop() > 0) {
        $('.ppic-mnbly').addClass('minimize');
        $('.name-info-mnbly').addClass('minimizefont');
        $('.img-info-mnbly').animate({
			    width: "47px"
			  }, 00);
    } else {
        $('.ppic-mnbly').removeClass('minimize');
        $('.name-info-mnbly').removeClass('minimizefont');
        $('.img-info-mnbly').animate({
			    width: "120px"
			  }, 00);
    }
});