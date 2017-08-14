  <? 
	foreach($products as $item):
?>
		<table align="left" class="product">
		  <tr> 
		
			<td valign="top">
			  <div><a href="index.php?view=product&id=<?echo $item['id'];?>"><img src="userfiles/<?echo $item['image'];?>" class="img" alt="" /></a></div>
			  <div class="description">
			  	<div class="product-name"><a href="#"><?echo $item['title'];?></a></div>
			  	<div class="product-prige">Цена:<?echo $item['price'];?> грн.</div>
			  </div>  
			</td>

		  </tr>
		</table>
	 
			<? endforeach;?>
