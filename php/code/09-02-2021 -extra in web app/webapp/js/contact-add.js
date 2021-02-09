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
	// salert("this call");
	document.getElementById('span_name').innerHTML =" ** Username length must be between 2 and 20";
	return false;	
	}
if(!isNaN(username)){
	document.getElementById('span_name').innerHTML =" ** only characters are allowed";
	return false;
	}


var emails=document.getElementById('email').value;
// alert(emails);
if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email id field";
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

var mobileNumber=document.getElementById('mobileno').value;
if(mobileNumber == ""){
				document.getElementById('span_mobileno').innerHTML =" ** Please fill the mobile Number field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('span_mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('span_mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}
if((mobileNumber.charAt(0)!=9) && (mobileNumber.charAt(0)!=8) && (mobileNumber.charAt(0)!=7))
            {
                 document.getElementById('span_mobileno').innerHTML =" ** Mobile Number must start with 9,8 and 7";
                return false;
            }

var employee=document.getElementById('employee').value;
// alert(employee);
if(employee == ""){
// 	// alert("this call");
	document.getElementById('span_employee').innerHTML =" ** Please fill the employee field";
	return false;
	}
if((employee.length <= 2) || (employee.length > 20)) {
	// salert("this call");
	document.getElementById('span_employee').innerHTML =" ** employee length must be between 2 and 20";
	return false;	
	}
if(!isNaN(employee)){
	document.getElementById('span_employee').innerHTML =" ** only characters are allowed";
	return false;
	}

var dateTime = document.getElementById("created").value;
// alert(dateTime);
if (dateTime == "" || dateTime == null) {
	// alert("dateTime");
    document.getElementById("span_created").innerHTML = "Please select a date and time";
    return valid = false;
}
}
function validatename(id){
    var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_name').style.display="none";
    }
}
function validate_email(id){
	var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('emailids').style.display="none";
    }
}
function validate_phone(id) {
	var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_mobileno').style.display="none";
    }
}

function validate_date(id){
	var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_created').style.display="none";
    }
}
function validate_employee(id) {
	var name =document.getElementById(id);
    if(name.value.length >=0){
        document.getElementById('span_employee').style.display="none";
    }
}




