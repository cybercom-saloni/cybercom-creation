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

var address=document.getElementById('address').value;
if(address == ""){
	document.getElementById('span_address').innerHTML =" ** Please fill the address field";
	return false;
}

var Hockey=document.getElementById('Hockey').value;
var Football=document.getElementById('Football').value;
var Badminton=document.getElementById('Badminton').value;
var Cricket=document.getElementById('Cricket').value;
var VolleyBall=document.getElementById('VolleyBall').value;

var gender=document.getElementById('gender').value;

// if(form.gender[0].checked == true){
// // || Football == "" ||Football == ""||Badminton == ""|| Cricket=="" || VolleyBall==""){
// 	alert("called");
// 	document.getElementById('span_gender').innerHTML =" ** Please check gender ";
// 	return false;
// }
}