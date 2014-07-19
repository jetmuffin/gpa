<script>
	$(document).ready(function(){
		function login()
		{
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
		}
		$('#login-button').click(function(){
			login();
		});
		$("input").keyup(function(event){ 
          	if(event.keyCode == 13) 
            	login(); 
        });
	});

</script>
</body>
</html>