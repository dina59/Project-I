var uname=document.forms['form']['user_name'];
var password=document.forms['form']['password'];

var uname_error=document.getElementById('uname_error');
var pass_error=document.getElementById('pass_error');

uname.addEventListener('textInput',uname_verify());
password.addEventListener('textInput',pass_verify());


function validated(){
    if(uname.value.length<9){
        uname.style.border="1px solid red";
        uname.focus();
        uname_error.style.display="block";
        return false;
    
    }

        if(password.value.length<6){
            password.style.border="1px solid red";
            password.focus();
            pass_error.style.display="block";
            return false;
        }
    }

    function uname_verify(){
        if(uname.value.length>=8){
            uname.style.border="1px solid silver";
            uname_error.style.display="none";
            return true;
        
        }

        if(password.value.length>=5){
            password.style.border="1px solid silver";
            pass_error.style.display="none";
            return true;
        }

    }