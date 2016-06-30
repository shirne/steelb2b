<{include file="public/top.tpl"}>
<style type="text/css">
form{width:400px;margin:0 auto}
form p{padding:5px 0}
</style>
<form method="post" action="<{$app}>/index/docgpwd">
<p><label>旧密码:<input type="password" name="opwd" /></label><span class="tip">您原来使用的密码</span></p>
<p><label>新密码:<input type="password" name="npwd" /></label><span class="tip">新的密码</span></p>
<p><label>新密码:<input type="password" name="npwd2" /><span class="tip">再输入一遍新密码</span></label></p>
<p>　　　<input type="submit" value="确认修改" />　<a href="javascript:history.back()">返回</a></label></p>
</form>
<{include file="public/bottom.tpl"}>
