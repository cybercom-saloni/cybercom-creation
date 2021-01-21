var array = localStorage.getItem('array');
		var items = JSON.parse(array);
		
		array = items;
if(localStorage.getItem('array') !== null )
{
		alert("Already Admin is Registered!");
		sessionStorage.removeItem("REGISTERNOW");
}