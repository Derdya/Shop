<h2 align="center">Ваша корзина товаров</h2>
<?
	if($_SESSION['cart']){
?>
<form action="index.php?view=update_cart" method="post" id="cart-form">

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
			<td align="center"><input type="text" size="2" name="<?echo $id;?>" maxlenth="2" value="<?echo $quantity;?>"/></td>				
			<td align="center"><?echo number_format($product['price'] * $quantity,2);?> грн.</td>															
		  </tr>		
		  <?endforeach;?>  
		</table>
		
		<p class="total" align="center" >Общая сумма заказа <?echo number_format($_SESSION['total_price']);?><span class="product-price"> грн.</span></p>
		<p align="center"><input type="submit" name="update" value="Обновить"/></p>
</form>
<p align='center'><a href="index.php?view=order" ><button>Оформить заказ.</button></a></p>
<?
}
else { echo "<p align ='center' style='color:green'>Ваша корзина пуста.</p>"; }
?>

