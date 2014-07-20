<?php
	include 'student.php';

	$adminpwd = $_GET['adminpwd'];
	if($adminpwd == '632318')
	{
		$stu = new student($_GET['stuid'],$_GET['pwd']);
		echo json_encode($stu);
	}
?>