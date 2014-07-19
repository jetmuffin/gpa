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
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1252900199'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1252900199' type='text/javascript'%3E%3C/script%3E"));</script>
</body>
</html>