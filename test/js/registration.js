var array = [];
var valid = false;
function register()
{

	var regname = document.getElementById('name').value;
	var regemail = document.getElementById('email').value;
	var regpassword = document.getElementById('password').value;
	var regconfirmpassword = document.getElementById('confirm-password').value;
	var regcity = document.getElementById('city').value;
	var regstate = document.getElementById('state').value;
	console.log(regname+regemail+regstate+regcity+regpassword);
	// alert('call'+regname);
	 // var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
  //       var letters = /^[A-Za-z]+$/;
  //       var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // if(regname=='')
        // {
        //     alert('Please enter your name');

        // }
        // else if(!letters.test(regname))
        // {
        //     alert('Name field required only alphabet characters');
        // }
        // else if(regemail=='')
        // {
        //     alert('Please enter email id');
        // }
        // else if (!filter.test(regemail))
        // {
        //     alert('Invalid email');
        // }
        
        // else if(regpassword=='')
        // {
        //     alert('Please enter Password');
        // }
        // else if(regconfirmpassword=='')
        // {
        //     alert('Enter Confirm Password');
        // }
        // else if(!pwd_expression.test(regconfirmpassword))
        // {
        //     alert ('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
        // }
        // else if(regconfirmpassword != regpassword)
        // {
        //     alert ('Password not Matched');
        // }
        // else if(document.getElementById("regpassword").value.length < 8)
        // {
        //     alert ('Password minimum length is 8');
        // }
        // else if(document.getElementById("regpassword").value.length > 20)
        // {
        //     alert ('Password max length is 20');
        // }

	
	 var person = {
		name : regname,
		password:regpassword,
		email : regemail,
		city:regcity,
		state:regstate
	};

	 if(localStorage.getItem('array'))
	{
		array = JSON.parse(localStorage.getItem('array'));
	}

	function is_already_register()
	{
		for (var i = 0; i < array.length; ++i) {

            var temp = array[i];

            if (temp.email == regemail) {
                valid = true;
                alert("admin already exist with same email");
                break;
            }
            else {}
        }
    }
    is_already_register();
    if (valid === false) {
		        array.push(person);
		        console.log(array);
		        localStorage.setItem("array", JSON.stringify(array));
		          sessionStorage.setItem("username", regname);
		        var message = window.confirm("registerd successfully");
		        if (message) {
		            window.location.href = "login.html";

		        }
    }
	
};