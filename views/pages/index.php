
  <? 
	foreach($products as $item):
?>
		<table align="left"  class="product" cols="4">
		  <tr> 
		
			<td valign="top">
			  <div><a href="index.php?view=product&id=<?echo $item['id'];?>"><img class="img" src="userfiles/<?echo $item['image'];?>"  alt="" /></a></div>
			  <div class="description">
			  	<div class="product-name"><a href="#"><?echo $item['title'];?></a></div>
			  	<div class="product-prige">Цена:<?echo $item['price'];?> грн.</div>
			  	
			  </div>  
			</td>

		  </tr>
		</table>
	 
			<? endforeach;?>
		
