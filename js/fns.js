function digitalWatch() 
  {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    if (hours < 10) hours = "0" + hours;
    if (minutes < 10) minutes = "0" + minutes;
    if (seconds < 10) seconds = "0" + seconds;
    document.getElementById("digital_watch").innerHTML = hours + ":" + minutes + ":" + seconds;
    setTimeout("digitalWatch()", 1000);
  }
  
function checkForm()
{
	valid = true;

	if (document.registerform.name.value == "" && document.registerform.s_name.value == "" && document.registerform.nickname.value == "" && document.registerform.email.value == "" && document.registerform.phone.value == "" )
	{
		document.getElementById("mess").innerHTML = "Все, 'ОБЯЗАТЕЛЬНЫЕ(*)' поля должны быть заполнены.";
		valid = false;
	}
	
  	if(document.registerform.password.value != document.registerform.repass.value)
	{
		document.getElementById("mess").innerHTML = "Пароли не совпадают.";
		 valid = false;
	}
	
	var test = document.registerform.password.value.length;
	var test2 = 8;
	if(parseInt(test) < parseInt(test2))
	{
		document.getElementById("mess").innerHTML = "Пароль сшишком короткий, мин. 8 символов";
		valid = false;
	}
	return valid;
}
