<?php
  print_r($_FILES); 
?>

<?php
  $uploadfile = "/storage/sdcard0/www/shop2/userfiles/".$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
?>

<?
if(isset($_POST['load']))
{
try{
	$sql = $pdo->prepare("INSERT INTO products (title, description, price, image, cat, sex) 
										VALUES(:title, :description, :price, :image, '{$_POST['cat']}', '{$_POST['sex']}')");
	$sql->bindValue(':title', $_POST['title']);
	$sql->bindValue(':description', $_POST['description']);
	$sql->bindValue(':price', $_POST['price']);
	$sql->bindValue(':image', $_FILES['image']['name']);
	
	$sql->execute();}
	catch(PDOException $e){ echo "не удалось". $e->getmessage();}
	
	header('Location: index.php?view=admin');
}

?>
