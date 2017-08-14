<h2 align="center">Личный кабинет.</h2>
<table class="regtab" align="center" border="0">
		  <tr>
		<td>
<div class="container mlogin">
<div id="login">
<h1>Вход</h1>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Имя опльзователя<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p> 
   	<p><a href= "#">Забыли пароль?</a></p>
	<p class="submit"><input class="button" name="login" type= "submit" value="Войти"></p>
   </form>
 </div>
 </div>
 </td>
 <td>
 <h3>НОВЫЙ КЛИЕНТ</h3>

<h2>Регистрация</h2>

<p>Создание учетной записи</br>
 поможет покупать быстрее.</br>
 Вы сможете контролировать</br>
 состояние заказа, а также</br>
 просматривать заказы</br>
  сделанные ранее.</br> </p>
 	<p><a href= "index.php?view=register"><button>Регистрация</button></a></p>
 </td>
 </tr>
 </table>
  
  <?
  	
  	require_once("DBconn.php");
  	
  	if(isset($_SESSION["session_username"]) && $_SESSION['session_username'] != 'Гость' )
  	{
		// вывод "Session is set"; // в целях проверки
		header("Location: index.php?view=intropage");
	}
	
if(isset($_POST["login"]))
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$password = md5($password);
		$query = $pdo->query("SELECT * FROM usertb WHERE nick_name='$username' AND password='$password'");
		$numrows=$query->fetchColumn();

		if($numrows!=0)
		{
			$dbpassword=0;
			$dbusername=0;
			while($row= $query->fetchAll(PDO::FETCH_ASSOC))
 			{
				$dbusername=$row['username'];
  				$dbpassword=$row['password'];
 			}
  			if($username == $dbusername && $password == $dbpassword)
 			{
				// старое место расположения
				//  session_start();
				$_SESSION['session_username']=$username;	 
 				/* Перенаправление браузера */
  				 header("Location: index.php?view=intropage");
			}
		}
		else 
		{
			//  $message = "Invalid username or password!";
			echo  "Invalid username or password!";
		}
	}
	else
	{
    	echo "All fields are required!";
	}
}
	
  ?>
