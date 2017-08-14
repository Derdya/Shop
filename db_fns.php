<?php

	include ('DBconn.php');
	
	function db_result_to_array($result){

		$res_array = array();
		$count = 0;
		
		while($row = $result->fetch()){
			$res_array[$count] = $row;
			$count++;
		}
		return $res_array;
	}
	
	function get_products(){

			include ('DBconn.php');
		
		$query = 'SELECT * FROM products ORDER BY id DESC';
		$result = $pdo->query($query);
		
		$result = db_result_to_array($result);
		return $result;
	}

	function get_cat_products($cat){

	  			include ('DBconn.php');
		
		$query = "SELECT * FROM products WHERE cat='$cat' ORDER BY id DESC";
		$result = $pdo->query($query);
		
		$result = db_result_to_array($result);
		return $result;
	}
	
	function get_cat(){

					include ('DBconn.php');
		
		$query = 'SELECT * FROM categories ORDER BY id DESC';
		$result = $pdo->query($query);
		
		$result = db_result_to_array($result);
		return $result;
	}
	
	function get_product($id){
	
					include ('DBconn.php');
		
		$query =("SELECT * FROM products WHERE id='$id'");
		$result = $pdo->query($query);
		
		$row = $result->fetch();
		return $row;
	}
?>
