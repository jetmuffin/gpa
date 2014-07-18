<html>
<head>
	<title>GPA</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<link rel="stylesheet" type="text/css" href="css/semantic.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
	<div class="ui fixed transparent inverted main menu">
        <div class="container header-top">
            <a class="launch item"><i class="icon search"></i> 成绩查询代理系统</a>
            <div class="title item">
                <b>河海大学</b> 
            </div>
            <div class="right menu">
	            <a id="github" class="popup icon github item" title="查看本站在Github的项目信息"  data-content="查看本站在Github的项目信息" href="https://github.com/quirkyinc/semantic">
	                <i class="icon github"></i>
	            </a>
	            <div class="title item">
	                Design By JetMuffin
	            </div>
            </div>
        </div>
	</div>
	<div class="main-content">
		<div class="ui two column middle aligned relaxed grid basic segment">
			<div class="column three wide"></div>
			<div class="column five wide">
			    <form class="ui form segment" action="consult.php" method="post">
			        <div class="field">
			            <label>用户名</label>
			            <div class="ui left labeled icon input">
			                <input placeholder="用户名" type="text" name="stuid">
		                    <i class="user icon"></i>
		                    <div class="ui corner label">
	   	                        <i class="asterisk icon"></i>
			                </div>
			            </div>
			        </div>
			    	<div class="field">
			            <label>密码</label>
			            <div class="ui left labeled icon input">
			                <input type="password" placeholder="密码" name="pwd">
			                <i class="lock icon"></i>
			                <div class="ui corner label">
			                    <i class="asterisk icon"></i>
			                </div>
			              </div>
			        </div>
			        <input class="ui blue submit button center" type="submit" value="立即登录">
			    </form>
			</div>
			<div class="ui vertical divider">
			    AND
			</div>
			<div class="column two right-side">
				<h2 class="ui header black">
				    <i class="circular question icon"></i>
				    登录须知
				</h2>
				<div class="ui divided selection list">
					<a class="item">
					    <div class="ui blue horizontal label login-tag">使用</div>
					    <div class="login-notice">请使用教务系统的账号及密码进行登录查询。</div>
					</a>
					<a class="item">
					    <div class="ui red horizontal label login-tag">保密</div>
					    <div class="login-notice">本站只是对教务系统的一个代理，旨在更好展现地学习成绩，不会泄露您的账户密码。</div>
					</a>
					<a class="item">
					    <div class="ui purple horizontal label login-tag">安全</div>
					    <div class="login-notice">本站采用一次性查询机制，未使用数据库，您不用担心您的密码被泄露。</div>
					</a>
				</div>
			</div>
	    </div>
    </div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/semantic.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#github').popup();
	});
</script>
</body>
</html>