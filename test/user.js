var array = [];
function addUser()
{
	var addusername = document.getElementById('name').value;
	var adduseremail = document.getElementById('email').value;
	var adduserpassword = document.getElementById('password').value;
	var adduserbdate = document.getElementById('dob').value;
	var year;
	 var addUserDetails = {
		name : addusername,
		email : adduseremail,
		birthdate : adduserbdate,
		password:adduserpassword
	};
	
		alert(year+index);
	// alert(addusername + " " + adduseremail + " " + adduserbdate+" "+adduserpassword + " added at index " + array.length);
	if(localStorage.getItem('array'))
	{
		array = JSON.parse(localStorage.getItem('array'));
	}

	array.push(addUserDetails);
    console.log(array);
	localStorage.setItem("array", JSON.stringify(array));
	
	// alert(addusername + " " + adduseremail + " " + adduserbdate+" "+adduserpassword + " added at index " + array.length);

	// document.getElementById('user').text=regname;
};
 array = localStorage.getItem('array');
var items = JSON.parse(array);
		
array = items;
// alert(array.length);
document.write('<table border = "1" id = "table1" style="margin-top:-200px; margin-right:-10px">');
document.write('<tr>');
document.write('<th>Name</th> <th>Email</th> <th>Password</th> <th>Date Of Birth</th><th>Age</th><th colspan=2>Actions</th> </tr> <tr>');

for(var k = 0 ; k < array.length; k++)
{	

	document.write('<td>'+ array[k].name + '</td>' );
	document.write('<td>'+ array[k].email + '</td>' );
	document.write('<td>'+ array[k].password + '</td>' );
	document.write('<td>'+ array[k].birthdate + '</td>' );
	// document.write('<td>'+ year+ '</td>' );
	document.write('<td a href="edituser.html">'+'Edit'+'</td>' );
	document.write('<td a href="deleteuser.html">'+'Delete'+'</td>' );
	document.write('</tr>');
}


			
