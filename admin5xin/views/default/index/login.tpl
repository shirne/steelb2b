<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
*{margin:0;padding:0;}
a,input{outline:none;vertical-align:middle}
img{border:none;vertical-align:middle;margin:0 10px}
form p{padding:8px 0}
input.text{background:url(<{$res}>/images/login.png) -304px top no-repeat;border:1px solid #b6b6b6;border-color:#7b7b7b #b6b6b6 #b6b6b6 #7b7b7b;height:24px;padding:0 3px;*height:20px;*padding-top:4px;height:20px\9;padding-top:4px\9;}
input.button{width:67px;height:24px;border:0;text-align:center;background:url(<{$res}>/images/login.png) left top no-repeat}
body{background:#fafafa;font-size:14px;line-height:24px;}
input.buttonc{background-position:-70px top;}

div#block{width:460px;height:250px;border:3px #99d solid;border-color:#aaf #99d #99d #aaf;background:#eee;position:absolute;left:50%;top:50%;margin-left:-230px;margin-top:-150px;}
div#block p.tip{border:1px #f60 solid;background:url(<{$res}>/images/fwdw_icons_02_mb5ucom.png) 4px center no-repeat #ddd;padding:5px;color:red;width:80%;margin:0 auto;margin-top:20px;padding-left:40px;}
div#block form{width:80%;margin:0 auto}
div#block form a{color:#66d;font-size:12px;}
</style>
<body>
<div id="block">
    <p class="tip"><{$message}></p>
    <form name="login" method="post" action="<{$app}>/index/dologin">
    <p><label>用户名: <input type="text" class="text" name="username" /></label></p>
    <p><label>密　码: <input type="password" class="text" name="password" /></label></p>
    <p><label>验证码: <input type="text" class="text" name="code" size="8" /></label><img src="<{$app}>/index/code" alt="" onclick="this.src='<{$app}>/index/code/'+new Date().getTime()" /></p>
    <p>　　　  <input type="submit" class="button" value="登 录" onmousedown="this.className='button buttonc'" onmouseout="this.className='button'" />　　<a href="<{$root}>/">网站首页</a></p>
    </form>
</div>
</body>
</html>
