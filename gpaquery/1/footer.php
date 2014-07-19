<script>
	$(document).ready(function(){
		$('#login-button').click(function(){
			$("#loading").addClass("active");
			var stuid = $("input[name='stuid']").val();
			var pwd = $("input[name='pwd']").val();
			console.log(stuid);
			console.log(pwd);
			$.ajax( { 
			    type :"post",  //提交方式 
			    url :"consult.php",         //请求链接 
			    dataType :"json", //返回数据类型 
			    data :"stuid=" + stuid +"&pwd=" +pwd,  //参数 
			    error:function(msg){   //后台出错，显示提示信息 
					location.href = "index.php";
			    }, 
			    success :function(res) 
			    { 
			        location.href = "result.php";
				} 
			});
		});
	});

</script>
</body>
</html>