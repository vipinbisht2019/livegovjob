
function check()
{
	
var email = document.myForm.email.value;

var emails=document.getElementById('emails');

var pwd=document.myForm.passwd.value;
var passwords=document.getElementById('passwords');

	if(email == '')
	{
		emails.innerHTML='Please enter your email Id';
		return false;
	} 
	else {
		emails.innerHTML='';
	}
	
	if(pwd == '')
	{
		passwords.innerHTML='Please enter the correct password';
		return false;
	} 
	else {
		passwords.innerHTML='';
	}


}

