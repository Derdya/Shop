<?
	function dellete($id){

	try{
	$sql = "DELETE FROM products WHERE id='$id'";
    $pdo->query($sql);
    }
    catch(PDOException $e){
    echo "не удалось удалить";
    }
}
?>
