<?php

if(!isset($_SESSION["session_username"])):
header("location: index.php?view=personal_area");
else:
?>
	
<div id="welcome">
 <?	if($_SESSION['session_username'] != 'Derdya'){?>
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="index.php?view=logout">Выйти из системы</a> </p>
<? 
	}
	else{ ?>
	<h2>Добро пожаловать, Администратор <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="index.php?view=logout">Выйти из системы</a> </p>
<?}
?>
</div>

	

	
<?php endif; ?>
