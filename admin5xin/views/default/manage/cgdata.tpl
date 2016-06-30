<{include file="public/top.tpl"}>
<style type="text/css">
form{width:400px;margin:0 auto}
form p{padding:5px 0}
</style>
<form method="post" action="<{$app}>/manage/docgdata">
<input type="hidden" name="id" value="<{$adm.id}>" />
<p><label>帐　户:<input type="text" name="username" value="<{$adm.qa_admin}>" /></label></p>
<p><label>权　限:<input type="text" name="purview" <{if $smarty.session.purview < 65536}>readonly="readonly"<{/if}> value="<{$adm.purview|string_format:"%d"}>" /></label></p>
<p><label>新密码:<input type="password" name="pwd" /></label><span class="tip">不更改密码请留空</span></p>
<p><label>确　认:<input type="password" name="pwd2" /><span class="tip">再输入一遍新密码</span></label></p>
<p>　　　<input type="submit" value="确认修改" />　<a href="javascript:history.back()">返回</a></label></p>
</form>
<{include file="public/bottom.tpl"}>
