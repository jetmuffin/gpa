<html xmlns:wb=“http://open.weibo.com/wb”>
<head>
<title>成绩查询代理系统-河海大学</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta content="GPA计算、河海大学成绩查询、成绩查询" name="keywords">
<meta content="提供代理借口，供河海大学学生查询成绩并计算GPA" name="description">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="stylesheet" type="text/css" href="css/semantic.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/semantic.js"></script>
<script type="text/javascript" src="js/jquery.tablesort.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<script>window._bd_share_config = {
    "common": {
        "bdText": "",
        "bdMini": "2",
        "bdMiniList": false,
        "bdPic": "",
        "bdStyle": "0",
        "bdSize": "16"
    },
    "share": {},
};
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~ ( - new Date() / 36e5)];
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#github').popup();
		$('#contact').popup();
		$('.table').tablesort();
	});
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/media-query.css">
</head>
<body>

	<!-- header -->
	<div class="navbar ">
		<div class="navbar-inner">
			<div class="container">
				<img src="images/logo.png" class="logo" alt="成绩查询代理系统">
				<a href="" class="brand">成绩查询代理系统</a>
				<div href="" class="divider-vertical"></div>
				<a href="" class="school">河海大学</a>
				<div class="info">
					<ul>
						<li>
							<a id="github" class="popup icon github item" data-content="查看本站在Github的项目信息" href="https://github.com/JetMuffin/gpa">
	                			<i class="icon github"></i>
		            		</a>
		            	</li>
						<li>|</li>
						<li>
							 <a id="contact" class="popup item" data-content="Bug反映，请联系QQ56436642">
				                Designed By JetMuffin
				            </a>
						</li>
						
						<?php 
							if(isset($_SESSION['stu']))
								echo '<li>|</li><li><a href="logout.php">退出登录</a></li>';
						 ?>		
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>