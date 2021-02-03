
function disablebtn(){
    document.getElementById('submit').disabled = true;
}


function validation(){
		// alert("fuction call");
var username=document.getElementById('name').value;
// alert(username);
if(username == ""){
	// alert("this call");
	document.getElementById('span_name').innerHTML =" ** Please fill the username field";
	return false;
	}
if((username.length <= 2) || (username.length > 20)) {
	// salert("this call");
	document.getElementById('span_name').innerHTML =" ** Username length must be between 2 and 20";
	return false;	
	}
if(!isNaN(username)){
	document.getElementById('span_name').innerHTML =" ** only characters are allowed";
	return false;
	}

var userlastname=document.getElementById('lastname').value;
// alert(username);
if(userlastname == ""){
	// alert("this call");
	document.getElementById('span_lastname').innerHTML =" ** Please fill the username field";
	return false;
	}
if((userlastname.length <= 2) || (userlastname.length > 20)) {
	// salert("this call");
	document.getElementById('span_lastname').innerHTML =" ** Username length must be between 2 and 20";
	return false;	
	}
if(!isNaN(userlastname)){
	document.getElementById('span_lastname').innerHTML =" ** only characters are allowed";
	return false;
	}

var password=document.getElementById('password').value;
// alert(password);
if(password == ""){
	document.getElementById('span_password').innerHTML =" ** Please fill the password field";
	return false;
	}
	if((password.length <= 8) || (password.length > 20)) {
	document.getElementById('span_password').innerHTML =" ** Passwords length must be between  8 and 20";
	return false;	
	}
var confirmpassword=document.getElementById('confirmpassword').value;
// alert(password);
if(confirmpassword == ""){
	document.getElementById('span_confirmpassword').innerHTML =" ** Please fill the password field";
	return false;
	}
	if((confirmpassword.length <= 8) || (confirmpassword.length > 20)) {
	document.getElementById('span_confirmpassword').innerHTML =" ** Passwords length must be between  8 and 20";
	return false;	
	}

if(password!=confirmpassword){
	document.getElementById('span_confirmpassword').innerHTML =" ** Please fill the correct password field";
	return false;
}
var gender=document.UserForm.gender.value;
 if(gender==""){
 	document.getElementById('span_gender').innerHTML =" ** Please Check gender";
	return false;
 }

var country=document.getElementById('country').value;
if(country=="none"){
	// alert("select");
	document.getElementById('span_country').innerHTML =" ** Please Check country";
	return false;
}

var mobileNumber=document.getElementById('phone').value;
if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile NUmber field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}

var emails=document.getElementById('email').value;
alert(emails);
if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email idx` field";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
				return false;
			}

			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
				return false;
			}


}
function validatename(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_name').style.display="none";
    }
}
function validatepassword(id) {
	var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_password').style.display="none";
    }
}

function acceptcondition(element) {

    if(element.checked) {
      document.getElementById("submit").disabled = false;
     }
     else  {
      document.getElementById("submit").disabled = true;
    }

}