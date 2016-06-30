<{include file="public/top.tpl"}>
<form name="search" method="get">
<table>
	<caption><{$act}>信息搜索</caption>
    <tr>
        <td>&nbsp;</td>
        <td rowspan="2" width="100">
        	<input type="submit" value="搜索" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</form>

<form name="list" method="post" action="<{$app}>/info/del">
<table>
	<caption><{$act}>信息管理<a href="<{$app}>/info/add/type/<{$type}>">[添加<{$act}>信息]</a></caption>
    <thead>
    	<tr>
        	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
            <td>标题</td>
            <td>材质</td>
            <td>价格</td>
            <td>日期</td>
            <td>数量</td>
            <td>规格</td>
            <td>公司名称</td>
            <td>操作</td>
        </tr>
    </thead>
    <tbody>
    	<{section loop=$list name="ls"}>
    	<tr>
        	<td><input type="checkbox" name="id[]" value="<{$list[ls].id}>" /></td>
            <td><{$list[ls].title}><{if $list[ls].top}><font color="red">[置顶]</font><{/if}></td>
            <td><{$list[ls].materials}></td>
            <td><{$list[ls].price}></td>
            <td><{$list[ls].date}></td>
            <td><{$list[ls].num}></td>
            <td><{$list[ls].model}></td>
            <td><{$list[ls].company}></td>
            <td><a href="<{$app}>/info/del/id/<{$list[ls].id}>">[删除]</a><a href="<{$app}>/info/modify/id/<{$list[ls].id}>">[修改]</a></td>
        </tr>
        <{sectionelse}>
        <tr><td colspan="9">没有搜索到<{$act}>信息</td></tr>
        <{/section}>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="3"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" class="button" name="act" value="删除" /></td>
            <td colspan="6"><{$fpage}></td>
        </tr>
    </tfoot>
</table>
</form>
<script type="text/javascript">
bindAction('a','删除','您确定要删除该信息吗?');
</script>
<{include file="public/bottom.tpl"}>
