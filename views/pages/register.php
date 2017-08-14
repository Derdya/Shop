<h2 align="center">Регистрация.</h2>


<div class="mregister" align="center">
<div id="login">
<form onsubmit="return checkForm();" action="index.php?view=register" id="registerform" method="post" name="registerform">
 <h2 align="left" class="lab">Основные данные.</h2>
 
	 <p><label for="nickname"><span style="color: red;">*</span>Никнейм:<br>
	 <input class="input" id="nickname" name="nickname"size="32"  type="text" value=""></label></p>

	 <p><label for="name"><span style="color: red;">*</span>Имя:<br>
 	 <input class="input" id="name" name="name"size="32"  type="text" value=""></label></p>
 	 
 	 <p><label for="s_name"><span style="color: red;">*</span>Фамилия:<br>
 	 <input class="input" id="s_name" name="s_name" size="32"  type="text" value=""></label></p>

 	 <p><label for="email"><span style="color: red;">*</span>E-mail:<br>
	 <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>

	 <p><label for="phone"><span style="color: red;">*</span>Телефон:<br>
	 <input class="input" id="phone" name="phone" size="32" type="tel" value=""></label></p>
  
  <h2 align="left" class="lab">Адрес.</h2>
  
 	 <p><label for="company">Компания:<br>
 	 <input class="input" id="company" name="company" size="32"  type="text" value=""></label></p>

	 <p><label for="addres1">Адрес1:<br>
 	 <input class="input" id="address1" name="address1" size="32"  type="text" value=""></label></p>

	 <p><label for="addres2">Адрес2:<br>
	 <input class="input" id="address2" name="address2" size="32"  type="text" value=""></label></p>

	 <p><label for="town">Город:<br>
 	 <input class="input" id="town" name="town" size="32"  type="text" value=""></label></p>
 	 
 	 <p><label for="country">Страна:<br>
 	 <input class="input" id="country" name="country" size="32"  type="text" value=""></label></p>

	 <p><label for="post_index">Почтовый индекс:<br>
 	 <input class="input" id="post_index" name="post_index" size="32"  type="number" value=""></label></p>
 	 
 	 <p><label for="state">Область:<br>
 	 <input class="input" id="state" name="state" size="32"  type="text" value=""></label></p>
 
 
 <h2 align="left" class="lab">Ваш пароль.</h2>
<p><label for="user_pass"><span style="color: red;">*</span>Пароль:<br>
<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
<p><label for="repass"><span style="color: red;">*</span>Подтверждение пароля:<br>
<input class="input" id="repass" name="repass" size="32" type="password" value=""></label></p>
 <h2 align="center" id="mess" style="color: red;"></h2>

<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
 </form>
</div>
</div>

<?php
	
if(isset($_POST["register"]))
{
	if(!empty($_POST['nickname']) && !empty($_POST['name']) && !empty($_POST['s_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) )
	{
		include 'DBconn.php';
		$nickname = htmlspecialchars($_POST['nickname']);
  		$name = htmlspecialchars($_POST['name']);
		$s_name = htmlspecialchars($_POST['s_name']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);
		$company = htmlspecialchars($_POST['company']);
		$address1 = htmlspecialchars($_POST['address1']);
 		$address2 = htmlspecialchars($_POST['address2']);
 		$town = htmlspecialchars($_POST['town']);
 		$country = htmlspecialchars($_POST['country']);
 		$post_index = htmlspecialchars($_POST['post_index']);
 		$state = htmlspecialchars($_POST['state']);
 		$password = htmlspecialchars($_POST['password']);
		$password = md5($password);
		$query=$pdo->query("SELECT * FROM usertb WHERE nick_name='$nickname'");
  		$numrows=$query->fetchColumn();
	
		if($numrows==0)
    	{ 
		$sql=("INSERT INTO usertb (nick_name, name, s_name, email, phone, company, address1, address2, town, country, post_index, state, password)
		VALUES('$nickname', '$name', '$s_name', '$email', '$phone', '$company', '$address1', '$address2', '$town', '$country', '$post_index', '$state','$password')");
 		$result=$pdo->exec($sql);
  		
  		
 			if($result)
			{	
				$message = "Регистрация прошла успешно!";
				header("location: index.php?view=personal_area");
 			} 
 			else 
 			{
 				$message = "Ошибка при добавлении информации!";
 			}
 		} 
 		else 
 		{
			$message = "Такой 'ЛОГИН' уже существует.";
   		}
	}
	else 
	{
		$message = "Заполните все обязательные поля!";
	}
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
