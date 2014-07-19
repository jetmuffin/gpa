<?php 
	session_start();
	unset($_SESSION['stu']);   
	session_unset();
	header('Location:index.php');
 ?>