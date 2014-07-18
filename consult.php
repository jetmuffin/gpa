<?php
	include 'student.php';
	$stu = new student($_POST['stuid'],$_POST['pwd']);
	session_start();
	$_SESSION['stu'] = serialize($stu);
	unset($stu);
	header("Location: result.php");
?>