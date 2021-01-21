var array = [];
var valid = false;
function ValidUser() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function is_user_already_registered() {
        for (var i = 0; i< array.length; i++) {

            var temp = array[i];

            if (array[i].email == email && array[i].password == password) {
                valid = true;
                break;
                
            }
        }
    }
    is_user_already_registered();

    if(valid == false)
    {
        valid = false;
        alert("Invalid email and password!")
    }
    else{
        window.location.href = "login.html";
    }
};