//form validation
e1=false;
e2=false;
e3=false;
e4=false;
e5=false;
e6=false;



function Fname_check()
{
	// body...

	var filter =  /^[A-Za-z]+$/ ;
	var filter_num = /^[0-9]+$/;
	var filter_ar = /[\u0600-\u06FF]/ ;
	var firstName = document.forms["form"]["first_name"].value ;
	if( firstName.match(filter_num) || firstName == null || firstName.length < 3 || firstName == " ")
	{
        //$("#validateFirst").css({"background":"#d3362d"}) ;
		console.log("name");
		return false;
	}else {
		//$("#validateFirst").css({"background":"#65b045" }) ;
		//$("#error_username").html("");
		return true ;
	}
}
function Lname_check()
{
	// body...
	var filter =  /^[A-Za-z]+$/ ;
	var filter_num = /^[0-9]+$/;
	var filter_ar = /[\u0600-\u06FF]/ ;
	var ch = document.forms["form"]["last_name"].value ;
	if( ch.match(filter_num) || ch == null || ch.length < 4 || ch == " ")
	{
		console.log("name");
       // $("#validateLast").css({"background":"#d3362d"}) ;
		//$("#error_username").html("Please enter your true name");
		return false;
	}else {
		//$("#validateLast").css({"background":"#65b045"}) ;
		//$("#error_username").html("");
		return true ;
	}
}
function mob_check() {
	// body...
	var ch = document.forms['form']["mobile"].value ;
	var filter_num = /^[0-9]+$/;
	if (ch == null || ch.length != 11 || !ch.match(filter_num) || ch[0]!=0 || ch[1]!=1) {
        console.log("name");
		return false ;
	}else{
		
		return true ;
	}
}

function email_check()
{

	// body...
	var ch = document.forms["form"]["mail"].value;
	    var atpos = ch.indexOf("@");
	    var dotpos = ch.lastIndexOf(".");
		
		
		
	    if (ch == "" || atpos < 1 || dotpos < atpos + 2 || ch == null || ch == " " || ch == 0 ) {
	       //$("#validateEmail").css({"background":"#d3362d"}) ;
            //$("#error_email").html("write your true mail") ;
			console.log("name");
	        return false;
	    } else {
			//$("#validateEmail").css({"background":"#65b045"}) ;
            //$("#error_email").html("") ;
	        return true ;
	    }

}
function pass_check()
{
	
	var passwordOne     = document.forms["form"]["password"].value;
	if( passwordOne == null || passwordOne.length < 4 || passwordOne == " ")
	{
		console.log("name");
		return false ;
	}
	else
	{
		//$("#validatePass").css("background","#65b045") ;
		return true;
	}
	
}
function confirmPass()
{
	var passwordOne     = document.forms["form"]["password"].value;
	var passwordConfirm = document.forms["form"]["cpassword"].value;
	if(passwordOne != passwordConfirm || passwordConfirm.length < 4)
	{
		console.log("name");
		return false ;
	}
	else
	{
		//$("#validatePassConfirm").css("background","#65b045") ;
		return true;
	}
	
}
// function pos_check()
// {
	// var ch = document.forms["form"]["position"].value ;
	// if(ch=="default")
	// {
      // // $("#validateCollege").css("background","#d3362d") ;
		// //$("#error_username").html("Please enter your true name");
		// return false;
	// }
	// else {
		// //$("#validateCollege").css("background","#65b045") ;
		// //$("#error_username").html("");
		// return true ;
	// }
// }
// function committe_check()
// {
	// var ch = document.forms["form"]["committe"].value ;
	// if(ch=="default")
	// {
       // // $("#validateYear").css({"background":"#d3362d"}) ;
		// //$("#error_username").html("Please enter your true name");
		// return false;
	// }else {
		// //$("#validateYear").css({"background":"#65b045" }) ;
		// //$("#error_username").html("");
		// return true ;
	// }
// }


function ValidateTheForm() 
{

	e1  =	Fname_check()       ;
	e2  =	Lname_check()       ;
	e3  =	mob_check()       ;
	e4  =	email_check()       ;
	e5  =	pass_check()        ;
	e6  =	confirmPass()       ;
	errors=[];
	if (e1 && e2 && e3 && e4 && e5 && e6 ) 
	{
		return true ;
	}
	else 
	{
		if(!e1){errors.push("First Name");}
		if(!e2){errors.push("Last Name");}
		if(!e3){errors.push("Phone Number");}
		if(!e4){errors.push("Email");}
		if(!e5){errors.push("Password");}
		if(!e6){errors.push("Password doesn't match");}
		//if(!e7){errors.push("Position");}
		//if(!e8){errors.push("Committee");}
		errors.toString();
		document.getElementById("Errors-div").innerHTML = "<span style='color:red;'>Attention ! </span>Found Errors at :"+errors;
		
		
		return false ;
	}
	
}
