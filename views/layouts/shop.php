<!DOCTYPE html>
<html>
  <head>
  <script src="js/fns.js"></script>

 
	<meta charset="utf-8">
	<title>OPTodessaSHOP</title>
	<link href="css/styles.css?r=8812778888355860" rel="stylesheet">
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	  
  </head>
  <body onload="digitalWatch()">
	<div id="container">
	  <header>
		<ul class="hr">
		  <li><a href="index.php">Главная</a></li>
		  <li><a href="test/test.php">Вопрос ответ</a></li>
		  <li><a href="tab.php">Доставка и оплата</a></li>
		  <li><a href="index.php?view=tab">Гарантия</a></li>
		  <li><a href="tab.html">Контакты</a></li>
		  <li><a href="index.php?view=personal_area">Вход/Регистрация</a></li>
		  <li><a href="index.php?view=cart">Корзина (<?echo $_SESSION['total_items']; ?>) <?echo number_format($_SESSION['total_price'])?> грн. &nbsp;&nbsp;<img src="images/product.png" width="20" height="11" border="0"></a></li>
		  <li id="digital_watch" style="color: #f00; font-size: 100%; font-weight: bold;"></li>
		</ul>
	  </header>
	  <div class="logo">
        <a href="index.php"> <img src="images/logo.png" width="200" height="30" border="0" alt="пример"></a>
		<a href="index.php?view=personal_area"><img src="images/personal.png" width="30" height="30" border="2"><?php if(isset($_SESSION['session_username'])){echo $_SESSION['session_username'];}?></a>
		<?
		if($_SESSION['session_username'] == 'Derdya'): ?>
				<a href="index.php?view=admin">Администрирование.</a>
		
		<? endif;?>
		<a href=""> <img src="images/vk2.png" width="80" height="23" border="0" align="right" alt="пример"></a>
		<a href=""> <img src="images/vk.png" width="80" height="23" border="0" align="right" alt="пример"></a>
	  </div>
	  <nav>
		<ul class="hm">
		<?
			$categories = get_cat();
			foreach($categories as $cat):
		?>
		  <li><a href="index.php?view=cat&id=<?echo $cat['cat_id'];?>"><?echo $cat['name'];?></a></li>
		 <?endforeach;?>
		</ul>
	  </nav>
	  <div id="article">
	  <?php include ($_SERVER['DOCUMENT_ROOT'].'/shop2/views/pages/'.$view.'.php'); ?>
	   </div>
	  <footer>&copy; Andrey Diorditsa</footer>
	</div> 
  </body>
</html>
