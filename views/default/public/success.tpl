<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>提示消息 - 珠三角钢材城</title>

		<style type="text/css">
			body { font: 12px Arail; text-align: center; }
			#notice { width: 500px; background: #FFF; border: 1px solid #BBB; background: #EEE; padding: 3px;
			position: absolute; left: 50%; top: 50%; margin-left: -250px; margin-top: -150px; }
			#notice div { background: #FFF; padding: 30px 0 20px; font-size: 1.2em; font-weight:bold }
			#notice p { background: #FFF; margin: 0; padding: 0 0 20px; }
			a { color: #f00} a:hover { text-decoration: none; }
			
		</style>
	</head>
	<body>
		<div id="notice">
	
			<div style="text-align:left;padding-left:10px;padding-right:10px"><{$mess}></div>
				
			<{if $mark}>
				<p style="font: italic bold 2cm cursive,serif; color:green">
					ok 
				</p>
			<{else}>
				<p style="font: italic bold 2cm cursive,serif; color:red">
					×
				</p>

			<{/if}>		
			<p>
				 在( <span id="sec" style="color:blue;font-weight:bold"><{$timeout}></span> )秒后自动跳转，或直接点击 <a href="javascript:jump('<{$location}>')">这里</a> 跳转<br>
				 <span style="display:block;text-decoration:underline;cursor:pointer;line-height:25px" onClick="stop(this)">停止</span>
	
			</p>
		 </div>
						
		 <script>
		 		var seco=document.getElementById("sec");
				var time=<{$timeout}>;
				var tt=setInterval(function(){
						time--;
						seco.innerHTML=time;
						if(time<=0){
							clearInterval(tt);
							jump('<{$location}>');
							return;
						}
					}, 1000);
				function stop(obj){
					clearInterval(tt);
					obj.style.display="none";
				}
				function jump(url){
				if(url==''){
					window.history.back();
				}else{
					if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
					  var referLink = document.createElement('a');
					  referLink.href = url;
					  document.body.appendChild(referLink);
					  referLink.click();
					} else {
					  location.href = url;
					}
				}
				}
		</script>
	</body>
</html>
