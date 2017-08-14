<h2 align="center">Оформление заказа.</h2>
<?
	if($_SESSION['cart'] && !isset($_POST['order'])){
?>
<form action="index.php?view=order" method="post" id="cart-form">

		<table align="center" id="mycart" >
		  <tr> 
			<th>Товар</th>
			<th>Цена</th>				
			<th>Кол-во</th>
			<th>Всего</th>					
		  </tr>
		  <? 
		  	foreach($_SESSION['cart'] as $id => $quantity):
		    $product = get_product($id);
		  ?>
		  <tr> 
			<td align="center"><?echo $product['title'];?></td>	
			<td align="center"><?echo number_format($product['price'],2);?> грн.</td>	
			<td align="center"> <?echo $quantity;?></td>				
			<td align="center"><?echo number_format($product['price'] * $quantity,2);?> грн.</td>															
		  </tr>		
		  <?endforeach;?>  
		</table>
		
		<p class="total" align="center" >Общая сумма заказа <?echo number_format($_SESSION['total_price']);?><span class="product-price"> грн.</span></p>
		<?
			if(isset($_SESSION['session_username']))
			{
			include ('DBconn.php');
			$bdname = $_SESSION['session_username'];
			$sql = "SELECT * FROM usertb WHERE 	nick_name='$bdname'";
			$res = $pdo->query($sql);
			$res = $res->fetch();
			}
			
		?>
		<p align="center">
		Ваше имя: </br>
		<input type="text" name="name" value="<? echo $res['name'];?>"/></br>
		Ваша фамилия: </br>
		<input type="text" name="s_name" value="<? echo $res['s_name'];?>"/></br>
		Ваш адрес: </br>
		<input type="text" name="address" value="<? echo $res['address1'];?>"/></br>
		Почтовый индекс: </br>
		<input type="text" name="post_index" value="<? echo $res['post_index'];?>"/></br>
		Ваш e-mail: </br>
		<input type="text" name="email" value="<? echo $res['email'];?>"/></br>
		</p>
		
		<p align="center"><input type="submit" name="order" value="Заказать."/></p>
</form>
<?
}
	if($_SESSION['cart'] && isset($_POST['order']))
	{  
		include ('DBconn.php');
		
	/* $ArrKey = 0;
		foreach($_POST as $ArrKey => $ArrStr) 
		{
  			 $ArrKey = $_POST[$ArrKey];
  			 echo $ArrKey;
		}*/
		$date = date('Y-m-d');
		$time = date('H:i:s');
		
		foreach($_SESSION['cart'] as $id => $quantity):
		    $product = get_product($id);
		    $s = $pdo->prepare("INSERT INTO orders(name, s_name, address, post_index, email, product, prod_id, price, qty, date, time)
		    			  VALUES(:name, :s_name, :address, :post_index, :email, '{$product['title']}','{$product['id']}','{$product['price']}','$quantity', '$date', '$time')");
			$s->bindValue(':name', $_POST['name']) ;
			$s->bindValue(':s_name', $_POST['s_name']) ;
			$s->bindValue(':address', $_POST['address']) ;
			$s->bindValue(':post_index', $_POST['post_index']) ;
			$s->bindValue(':email', $_POST['email']) ;	
			$s->execute();
		    endforeach;
		    echo "<p align='center'>Ваш заказ успешно принят! Спасибо за покупку.</p>";
		    unset($_SESSION['cart']);
	}
?>

