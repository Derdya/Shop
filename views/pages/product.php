		<table align="left" class="product">
		  <tr> 
			<td valign="top">
			  <div><a href="#"><img src="userfiles/<?echo $product['image'];?>" width="180" height="200" alt="" /></a></div>
			  <div class="description">
			  	<div class="product-name"><a href="#"><?echo $product['title'];?></a></div>
			  	<div class="product-prige">Цена:<?echo $product['price'];?> грн.</div>
			  </div>  
			</td>
		  </tr>
		</table>
	    <div><h2>Описание товара</h2><?echo $product['description'];?></div>
	     <div><a href="index.php?view=add_to_cart&id=<?echo $product['id']?>"><button>Добавить в корзину</button></a></div>
	    		
