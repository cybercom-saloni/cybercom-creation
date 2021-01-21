var array = [];

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

	
	if(localStorage.getItem('array') !== null )
	{
		alert("Already Admin is Registered!");
		window.location.href = "login.html";
	}
	
	else if(localStorage.getItem('array'))
	{
		array = JSON.parse(localStorage.getItem('array'));
	}

	array.push(person);
    console.log(array);
	localStorage.setItem("array", JSON.stringify(array));
	
};