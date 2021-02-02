// validation for terms and condition
function acceptcondition(checkbox){
	if (checkbox.checked) {
		accept = true;
		// alert("Yes");
 		buttonshow();
	}
	else {
		accept = false;
		// alert("not");
		btninvisible();
	}
}
function buttonshow(){
	if (accept) {
		document.getElementById('UserSubmit').disabled = false;
	} 
}
function btninvisible(){
	document.getElementById('UserSubmit').disabled = true;
}

btninvisible();


//validation for form
function validation(){
		 // alert("fuction call");
		 
var username=document.getElementById('name').value;
// alert(username);
if(username == ""){
// 	// alert("this call");
	document.getElementById('span_name').innerHTML =" ** Please fill the username field";
	return false;
	}
if((username.length <= 2) || (username.length > 20)) {
	// alert("this call");
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

var gender=document.UserForm.gender.value;
 if(gender==""){
 	document.getElementById('span_gender').innerHTML =" ** Please Check gender";
	return false;
 }

var address=document.getElementById('address').value;
if(address == ""){
	document.getElementById('span_address').innerHTML =" ** Please fill the address field";
	return false;
}
if(!isNaN(address)){
	document.getElementById('span_address').innerHTML =" ** only characters are allowed";
	return false;
	}

var Month=document.getElementById('Month').value;
if(Month=="none" ){
	alert("select");
	document.getElementById('span_Month').innerHTML =" ** Please select Month";
	alert("select2");
	return false;
}
var Day=document.getElementById('Day').value;
if(Day=="none"){
	alert("selectday");
	document.getElementById('span_Month').innerHTML =" ** Please select Day";
	alert("selectday3");
	return false;
}
var Year=document.getElementById('Year').value;
if(Year=="none"){
	// alert("select");
	document.getElementById('span_Month').innerHTML =" ** Please select Year";
	return false;
}

var game = [];
    var checkboxes = document.getElementsByName("game[]");
    var checked=false;
    for(var i=0; i < checkboxes.length; i++) {
        if(checkboxes[i].checked) {
            // Populate hobbies array with selected values
            game.push(checkboxes[i].value);
            checked=true;
        }
    }
        if(checked == false){
    	document.getElementById('span_selectgame').innerHTML =" ** Please Check atleast one game";
        // alert("pick atlest one game");
        return false;
    }
var MaritalStatus=document.UserForm.MaritalStatus.value;
 if(MaritalStatus==""){
 	document.getElementById('span_maritalstatus').innerHTML =" ** Please Check Marital Status";
	return false;
 }


}
function validatename(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_name').style.display="none";
    }
}
