<{include file="public/top.tpl"}>
<form name="list" method="post" action="<{$app}>/user/check">
    <table>
    	<caption>用户列表</caption>
        <thead>
        	<tr>
            	<td>ID</td>
                <td>用户名</td>
                <td>公司</td>
                <td>地区</td>
                <td>邮箱</td>
                <td>认证信息</td>
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
                <td><{$users[ls].ask}></td>
                <td><a href="<{$app}>/user/check/act/1/id/<{$users[ls].id}>">[认证]</a><a href="<{$app}>/user/check/act/2/id/<{$users[ls].id}>">[拒绝]</a><a href="<{$app}>/user/del/id/<{$users[ls].id}>">[删除]</a></td>
            </tr>
            <{sectionelse}>
            <tr>
            	<td colspan="7">尚没有用户提交申请</td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="2"><label><input type="checkbox" onclick="" /> 全选</label><input type="submit" name="act" value="认证" /><input type="submit" name="act" value="拒绝" /></td>
                <td colspan="5"><{$fpage}></td>
            </tr>
        </tfoot>
    </table>
</form>
<{include file="public/bottom.tpl"}>
