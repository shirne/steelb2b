<{include file="public/top.tpl"}>

	<form name="search" action="<{$app}>/user/<{$smarty.get.a}>" method="get">
	<table>
    	<caption>用户搜索<a href="<{$app}>/user/<{$smarty.get.a}>">[全部用户]</a><a href="<{$app}>/user/add">[添加用户]</a></caption>
        <tr>
        	<td><label for="username">用户名:</label></td>
            <td><input type="text" name="username" value="<{$search.username}>" /></td>
            <td><label for="company">公司:</label></td>
            <td><input type="text" name="company" value="<{$search.company}>" /></td>
            <td><label for="email">邮箱:</label></td>
            <td><input type="text" name="email" value="<{$search.email}>" /></td>
            <td rowspan="2"><input type="submit" value="搜索" /></td>
        </tr>
        <tr>
        	<td><label for="rdate">注册日期:</label></td>
            <td colspan="3"><input type="text" name="rdate" class="Wdate" value="<{$search.rdate}>" />-<input type="text" class="Wdate"  name="edate" value="<{$search.edate}>" /></td>
            <td><label for="area">所在地区:</label></td>
            <td><input type="text" name="area" value="<{$search.area}>" /></td>
        </tr>
    </table>
    </form>
    <form name="list" method="post" action="<{$app}>/user/del">
    <table>
    	<caption>用户列表</caption>
        <thead>
        	<tr>
            	<td>ID</td>
                <td>用户名</td>
                <td>公司</td>
                <td>地区</td>
                <td>邮箱</td>
                <td>注册日期</td>
                <td>电话</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$users name="ls"}>
            <tr>
            	<td><input type="checkbox" name="id[]" value="<{$users[ls].id}>" /></td>
                <td><{$users[ls].qa_user}></td>
                <td><{$users[ls].company}></td>
                <td><{$users[ls].prov}> <{$users[ls].city}> <{$users[ls].area}></td>
                <td><{$users[ls].email}></td>
                <td><{$users[ls].regdate}></td>
                <td><{$users[ls].mobile}></td>
                <td><a href="<{$app}>/user/del/id/<{$users[ls].id}>">[删除]</a><a href="<{$app}>/user/modify/id/<{$users[ls].id}>">[更改]</a></td>
            </tr>
            <{sectionelse}>
            <tr>
            	<td colspan="8"><{if $searchstr != ""}>没有搜索到用户<{else}>尚没有注册用户<{/if}></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="2"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="act" value="删除" /></td>
                <td colspan="6"><{$fpage}></td>
            </tr>
        </tfoot>
    </table>
    </form>
<script type="text/javascript">
	bindAction('a','删除','您确定要删除该用户吗?');
	</script>
<{include file="public/bottom.tpl"}>
