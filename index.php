<?php session_start(); include 'header.php'; ?>
<?php if(isset($_SESSION['msg'])) echo '<div class="ui red message">'.$_SESSION['msg'].'</div>';?>
	<!-- main-content -->
	<div class="main-content">
		<div class="ui column  relaxed basic segment">
			<div class="column left-side">
			    <form class="ui form segment" action="" method="post">
			        <div class="field">
			            <label>用户名</label>
			            <div class="ui left labeled icon input">
			                <input placeholder="用户名" type="text" name="stuid">
		                    <i class="user icon"></i>
		                    <div class="ui corner label">
	   	                        <i class="asterisk icon icon-offset"></i>
			                </div>
			            </div>
			        </div>
			    	<div class="field">
			            <label>密码</label>
			            <div class="ui left labeled icon input">
			                <input type="password" placeholder="密码" name="pwd">
			                <i class="lock icon"></i>
			                <div class="ui corner label">
			                    <i class="asterisk icon icon-offset"></i>
			                </div>
			              </div>
			        </div>
			        <a class="ui blue submit button center" href="javascript::" id="login-button">立即登录</a>
			    </form>
			</div>
			<div class="ui vertical divider new-divider">
			    AND
			</div>
			<div class="column right-side">
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
					    <div class="login-notice">本站只是对教务系统的一个代理，抓取教务系统页面的数据，不会泄露您的账户密码。</div>
					</a>
					<a class="item">
					    <div class="ui purple horizontal label login-tag">安全</div>
					    <div class="login-notice">本站采用一次性查询机制，未使用数据库，您不用担心您的密码被泄露。</div>
					</a>
				</div>
			</div>
	    </div>
	    <div class="ui dimmer" id="loading">
	    	<div class="ui text loader">玩命查找中...</div>
	    </div>
    </div>

<?php include 'footer.php'; ?>