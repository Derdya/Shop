<?php
	unset($_SESSION['session_username']);
	session_destroy();
	header("location: index.php?view=personal_area");
?>
