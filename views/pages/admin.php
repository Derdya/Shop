
<h2>Администрирование</h2>

<?
	if(isset($_SESSION['session_username']) && $_SESSION['session_username'] == 'Derdya')
	{
?>

<form action="index.php?view=load" method="post" enctype = "multipart/form-data">
		<table align="left" class="product">
		  <tr> 
			<td valign="top">
			<h2>Добавить продукт</h2>
			<p><input type="file" name="image" value="" accept="image/*,image/jpeg,image/png"></p>
			  <div align="center" class="description">
			  Название:
			  	<div class="product-title"><input type="text" name="title" value=""></div>
			  	Цена:
			  	<div class="product-price"><input type="text" name="price" value=""></div>
			  	Описание:
			  	<div class="product-description"><textarea name="description" value="" cols="20" rows="3"></textarea></div>

			    			  	<div class="cats">
			    			  	Категория: <select name="cat">
			    			  	<?
									$categories = get_cat();
									foreach($categories as $cat):
								?>
			    			  	<option value="<?echo $cat['cat_id'];?>"><?echo $cat['name'];?></option>
			    			   <?endforeach;?>
			    			  	</select>
			    			  	</div>
			    			  	
			    			  	<div class="sex">
			    			  	Пол: <select name="sex">
			    			  	<option value="male">М</option>
			    			  	<option value="female">Ж</option>
			    			  	</select>
			    			  	</div>
			    			  	
			    			  
			  	<input class="button" name="load" type="submit" value="Добавить">
			  </div>  
			</td>
		  </tr>
		</table>
		 </form>
		 

  <? 
	$products = get_products();
	foreach($products as $item):
?>

	<form action="index.php?view=admin" method="post">
		<table align="left" class="product">
		  <tr> 
			<td valign="top">
			<input type="hidden" name="id" value="<?echo $item['id'];?>">
			  <div><a href="index.php?view=product&id=<?echo $item['id'];?>"><img src="userfiles/<?echo $item['image'];?>" class="img" alt="" /></a></div>
			  <div class="description">
			  	<div class="product-name"><a href="#"><?echo $item['title'];?></a></div>
			  	<div class="product-prige">Цена:<?echo $item['price'];?> грн.</div>
			  	<input class="button" name="delete" type="submit" value="Удалить">
			  </div>  
			</td>
		  </tr>
		</table>
		 </form>
	 			<? endforeach;?>
	



<?
	}
	else
	{
	echo "У ВАС НЕТ ДОСТУПА К ЭТОЙ СТРАНИЦЕ";
	}
?>

 <?

	if(isset($_POST['delete']))
	{
	$id = $_POST['id'];
		try{
	$sql = "DELETE FROM products WHERE id='$id'";
    $pdo->query($sql);
    }
    catch(PDOException $e){
    echo "не удалось удалить";
    }
	}
?>
