<{include file="public/top.tpl"}>
<form name="list" method="post" action="<{$app}>/user/specdel">
    <table>
    	<caption>入驻企业<a href="<{$app}>/user/specadd">[添加]</a></caption>
        <thead>
        	<tr>
            	<td>ID</td>
                <td>公司全称</td>
                <td>公司简称</td>
                <td>地区</td>
                <td>联系人</td>
                <td>联系电话</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$users name="ls"}>
            <tr>
            	<td><input type="checkbox" name="id[]" value="<{$users[ls].id}>" /></td>
                <td><{$users[ls].company}><{if $users[ls].inte}><font color="green">[诚信]</font><{/if}><{if !$users[ls].filt}><font color="red">[隐藏]</font><{/if}></td>
                <td><{$users[ls].scompany}></td>
                <td><{$users[ls].prov}> <{$users[ls].city}> <{$users[ls].area}></td>
                <td><{$users[ls].contact}></td>
                <td><{$users[ls].tele}></td>
                <td><a href="<{$app}>/user/specmodi/id/<{$users[ls].id}>">[修改]</a><a href="<{$app}>/user/specdel/id/<{$users[ls].id}>">[删除]</a></td>
            </tr>
            <{sectionelse}>
            <tr>
            	<td colspan="7">还没有添加入驻企业<a href="<{$app}>/user/specadd">[添加]</a></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="2"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="act" value="删除" /></td>
                <td colspan="5"><{$fpage}></td>
            </tr>
        </tfoot>
    </table>
</form>
<script type="text/javascript">
	bindAction('a','删除','您确定要删除该企业吗?');
	</script>
<{include file="public/bottom.tpl"}>
