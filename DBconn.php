<?
	try
	{
		$pdo = new PDO('mysql:host=localhost;dbname=shop', 'shop_user', 'zaq1221287');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');

	}
	catch(PDOException $e)
	{
		echo "Не удалось подключиться к БД: ".$e->getmessage();
		exit();
	}
?>
