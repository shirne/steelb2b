<{include file="public/top.tpl"}>
<!--后台首页-->
<table>
	<caption>网站统计数据</caption>
    <tr>
    	<td>会员总数:</td>
        <td><{$memnum}></td>
        <td>待认证会员:</td>
        <td><{$asknum}></td>
    </tr>
    <tr>
    	<td>企业总数:</td>
        <td><{$ennum}></td>
        <td>产品总数:</td>
        <td><{$pdnum}></td>
    </tr>
    <tr>
    	<td>供应信息:</td>
        <td><{$sinfo}></td>
        <td>求购信息:</td>
        <td><{$finfo}></td>
    </tr>
    <tr>
    	<td>留言总数:</td>
        <td><{$msgnum}></td>
        <td>未回复留言:</td>
        <td><{$renum}></td>
    </tr>
</table>
<table>
    <tr>
    	<td><a href="<{$root}>/getdig.php" target="hidef">获取最新钢材行情</a></td>
    </tr>
</table>
<{if $alert}>
<script type="text/javascript">alert('修改成功')</script>
<{/if}>
<iframe name="hidef" href="#" style="display:none"></iframe>
<{include file="public/bottom.tpl"}>
