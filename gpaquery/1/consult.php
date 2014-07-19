<?php
	include 'student.php';
	include 'tags.php';
	include 'shareurl.php';

	$stu = new student($_POST['stuid'],$_POST['pwd']);
	$stu_tags = getTags($stu->credit);
	$share_url_weibo = shareUrlWeibo($stu->credit);
	$share_url_renren = shareUrlRenren($stu->credit);
	$share_url_qzone = shareUrlQzone($stu->credit);

	session_start();
	$_SESSION['stu'] = serialize($stu);
	$_SESSION['stu_tags'] = serialize($stu_tags);
	$_SESSION['share_url_weibo'] = serialize($share_url_weibo);
	$_SESSION['share_url_renren'] = serialize($share_url_renren);
	$_SESSION['share_url_qzone'] = serialize($share_url_qzone);
	
	unset($stu);
	unset($stu_tags);
	unset($share_url_weibo);
	unset($share_url_renren);
	unset($share_url_qzone);
	header("Location: result.php");
?>