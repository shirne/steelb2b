<?php /* Smarty version 2.6.18, created on 2011-11-29 17:46:45
         compiled from public/success.tpl */ ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>提示消息</title>

		<style type="text/css">
			body { font: 75% Arail; text-align: center; }
			#notice { width: 400px; background: #FFF; border: 1px solid #BBB; background: #EEE; padding: 3px;
			position: absolute; left: 50%; top: 50%; margin-left: -205px; margin-top: -200px; }
			#notice div { background: #FFF; padding: 30px 0 20px; font-size: 1.2em; font-weight:bold }
			#notice p { background: #FFF; margin: 0; padding: 0 0 20px; }
			a { color: #f00} a:hover { text-decoration: none; }
			
		</style>
	</head>
	<body>
		<div id="notice">
	
			<div style="text-align:left;padding-left:10px;padding-right:10px"><?php echo $this->_tpl_vars['mess']; ?>
</div>
				
			<?php if ($this->_tpl_vars['mark']): ?>
				<p style="font: italic bold 2cm cursive,serif; color:green">
					ok 
				</p>
			<?php else: ?>
				<p style="font: italic bold 2cm cursive,serif; color:red">
					×
				</p>
				<p style="color:#aaa">如果此问题一直存在，请联系管理员解决</p>
			<?php endif; ?>		
			<p>
				 在( <span id="sec" style="color:blue;font-weight:bold"><?php echo $this->_tpl_vars['timeout']; ?>
</span> )秒后自动跳转，或直接点击 <a href="javascript:jump('<?php echo $this->_tpl_vars['location']; ?>
')">这里</a> 跳转<br>
				 <span style="display:block;text-decoration:underline;cursor:pointer;line-height:25px" onClick="stop(this)">停止</span>
	
			</p>
		 </div>
						
		 <script>
		 		var seco=document.getElementById("sec");
				var time=<?php echo $this->_tpl_vars['timeout']; ?>
;
				var tt=setInterval(function(){
						time--;
						seco.innerHTML=time;	
						if(time<=0){
							clearInterval(tt);
							jump('<?php echo $this->_tpl_vars['location']; ?>
');
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