function disablebtn(){
    document.getElementById('submit').disabled = true;
}
function validation(){
	var prefix=document.getElementById('prefix').value;
	if(prefix=="none"){
		document.getElementById('span_prefix').innerHTML =" ** Please select prefix ";
		return false;
	}
	var username=document.getElementById('firstname').value;
	if(username == ""){
		document.getElementById('span_name').innerHTML =" ** Please fill the last name field";
		return false;
	}
	if((username.length <= 2) || (username.length > 20)) {
		document.getElementById('span_name').innerHTML =" ** Username length must be between 2 and 20";
		return false;	
	}
	if(!isNaN(username)){
		document.getElementById('span_name').innerHTML =" ** only characters are allowed";
		return false;
	}

	var userlastname=document.getElementById('lastname').value;
	if(userlastname == ""){
		document.getElementById('span_lastname').innerHTML =" ** Please fill the last name field";
		return false;
	}
	if((userlastname.length <= 2) || (userlastname.length > 20)) {
		document.getElementById('span_lastname').innerHTML =" ** Username length must be between 2 and 20";
		return false;	
	}
	if(!isNaN(userlastname)){
		document.getElementById('span_lastname').innerHTML =" ** only characters are allowed";
		return false;
		}
	var emails=document.getElementById('email').value;
	if(emails == ""){
		document.getElementById('span_email').innerHTML =" ** Please fill the email id field";
		return false;
	}
	if(emails.indexOf('@') <= 0 ){
		document.getElementById('span_email').innerHTML =" ** @ Invalid Position";
		return false;
	}

	if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
		document.getElementById('span_email').innerHTML =" ** . Invalid Position";
		return false;
	}
	var mobileNumber=document.getElementById('mobileno').value;
	if(mobileNumber == ""){
		document.getElementById('span_mobile').innerHTML =" ** Please fill the mobile Number field";
		return false;
	}
	if(isNaN(mobileNumber)){
		document.getElementById('span_mobile').innerHTML =" ** user must write digits only not characters";
		return false;
	}
	if(mobileNumber.length!=10){
		document.getElementById('span_mobile').innerHTML =" ** Mobile Number must be 10 digits only";
		return false;
	}
	if((mobileNumber.charAt(0)!=9) && (mobileNumber.charAt(0)!=8) && (mobileNumber.charAt(0)!=7)){
		document.getElementById('span_mobile').innerHTML =" ** Mobile Number must start with 9,8 and 7";
        return false;
    }
	var password=document.getElementById('password').value;

	if(password == ""){
		document.getElementById('span_password').innerHTML =" ** Please fill the password field";
		return false;
	}
	if((password.length <= 8) || (password.length > 12)) {
		document.getElementById('span_password').innerHTML =" ** Passwords length must be between  8 and 12";
		return false;	
	}
	var confirmpassword=document.getElementById('confirmpassword').value;

	if(confirmpassword == ""){
		document.getElementById('span_confirmpassword').innerHTML =" **confirm Please fill the password field";
		return false;
	}
	if((confirmpassword.length <= 8) || (confirmpassword.length > 12)) {
		document.getElementById('span_confirmpassword').innerHTML =" ** confirm Passwords length must be between  8 and 12";
		return false;	
	}

	if(password!=confirmpassword){
		document.getElementById('span_confirmpassword').innerHTML =" ** Please fill the correct password field";
		return false;
	}

	var information=document.getElementById('information').value;
	if(information == ""){
		document.getElementById('span_information').innerHTML =" ** Please fill the field";
		return false;
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

function validateprefix(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_prefix').style.display="none";
    }
}
function validatename(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_name').style.display="none";
    }
}

function validatelastname(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_lastname').style.display="none";
    }
}