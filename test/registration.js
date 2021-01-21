var array = [];
var valid = false;
function register()
{
	var regname = document.getElementById('name').value;
	var regemail = document.getElementById('email').value;
	var regpassword = document.getElementById('password').value;
	var regcity = document.getElementById('city').value;
	var regstate = document.getElementById('state').value;
	console.log(regname+regemail+regstate+regcity+regpassword);
	
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
            else
            {
                
            }
        }
    }
    is_already_register();
    if (valid === false) {
        array.push(person);
        console.log(array);
        localStorage.setItem("array", JSON.stringify(array));
        var message = window.confirm("registerd successfully");
        if (message) {
            window.location.href = "login.html";
        }
    }
	
};