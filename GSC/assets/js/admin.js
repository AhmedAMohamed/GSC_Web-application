$(document).ready(function()
{
	$('.xp-add-mnbly').on('click',function()
	{
		$('.bobBackground-X').fadeIn();
		console.log('hi here');
	});
	$('.gollars-add-mnbly').on('click',function()
	{
		$('.bobBackground-G').fadeIn();
		console.log('hi here');
	});
	
	/*******************************
	Event Listeners
	*******************************/

	$('.addXpButton').on('click',function()
	{
		console.log("hi");
		AddXp();
	});
	
	$('.addGButton').on('click',function()
	{
		console.log("hi");
		AddGollars();
	});
	// Close
	$('.bobClose').on('click', function()
	{
		$('.bobBackground-X , .bobBackground-G').fadeOut();
	});
	
	
	
	
	
	
	
	
	
	$('.uploadPic').on('click',function()
	{
		$('.bobEditProfile').fadeIn();
	});

});












function AddXp()
{
	
	var xp=parseInt($('.exp-text-mnbly').text());
	var amount= parseInt($(".xpAmount").val());
	var all=xp+amount;
	
	var sentData = {
		memberId  :$(".memberId").val(),
		xpAmount  : $(".xpAmount").val()
		};
		
	console.log(sentData);
	$.ajax({
	    type: "POST",
	    url: base_url+"Admins/xp/add_xp/",
	    data: sentData,
	    dataType: "html",    
	    success: function (result) 
	    {
			console.log(result);
	      	if(result=="true")
			{
				console.log("hamada");
				// $.each(jQuery.parseJSON( result ), function(index, obj) 
				// {
					// console.log(index+" "+obj.time);
					// $('#'+id[intervals.indexOf(obj.time)]).css('background-color','#e51c23');
					
				// });	
				$('.exp-text-mnbly').text(all);
				$('.bobBackground-X').fadeOut();
				$(".xpAmount").text("0");
				
			}
			else
			{
				alert("Failure");
			}
	    }
	  }); 
}

function AddGollars()
{
	
	var gollars=parseInt($('.currentMoney').val());
	var amount= parseInt($(".gollarsAmount").val());
	var all=gollars+amount;
	
	var sentData = {
		memberId  :$(".memberId").val(),
		gollarsAmount  : $(".gollarsAmount").val()
		};
		
	console.log(sentData);
	$.ajax({
	    type: "POST",
	    url: base_url+"Admins/money/add_goolar/",
	    data: sentData,
	    dataType: "html",    
	    success: function (result) 
	    {
			console.log(result);
	      	if(result=="true")
			{
				console.log("hamada");
				// $.each(jQuery.parseJSON( result ), function(index, obj) 
				// {
					// console.log(index+" "+obj.time);
					// $('#'+id[intervals.indexOf(obj.time)]).css('background-color','#e51c23');
					
				// });	
				$('.money-value-text-mnbly').text(all+".00");
				$('.bobBackground-G').fadeOut();
				$(".gollarsAmount").text("0");
				
			}
			else
			{
				alert("Failure");
			}
	    }
	  }); 
}












