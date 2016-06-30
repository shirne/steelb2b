<{include file="public/top.tpl"}>

<form name="search" method="get" action="<{$app}>/product/search">
<table>
	<caption>产品搜索</caption>
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

<form name="list" method="post" action="<{$app}>/product/bat">
<table>
	<caption>产品管理<a href="">添加产品</a></caption>
    <thead>
    	<tr>
        	<td><input type="checkbox" onclick="" /></td>
            <td>产品名称</td>
            <td>材质</td>
            <td>价格</td>
            <td>批发价格</td>
            <td>数量</td>
            <td>规格</td>
            <td>公司名称</td>
            <td>操作</td>
        </tr>
    </thead>
    <tbody>
    	<{section loop=$lists name="ls"}>
    	<tr>
        	<td><input type="checkbox" name="id[]" value="<{$lists[ls].id}>" /></td>
            <td><{$lists[ls].title}></td>
            <td><{$lists[ls].materials}></td>
            <td><{$lists[ls].price|string_format:"%d"}></td>
            <td><{$lists[ls].vprice|string_format:"%d"}></td>
            <td><{$lists[ls].num}></td>
            <td><{$lists[ls].model}></td>
            <td><{$lists[ls].company}></td>
            <td><a href="<{$app}>/product/del/id/<{$lists[ls].id}>">[删除]</a><a href="<{$app}>/product/modify/id/<{$lists[ls].id}>">[更改]</a></td>
        </tr>
        <{sectionelse}>
        <tr><td colspan="9">没有搜索到产品<a href="<{$app}>/product/add">[去添加]</a></td></tr>
        <{/section}>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="3"><label><input type="checkbox" onclick="" /> 全选</label><input type="submit" class="button" name="act" value="删除" /></td>
            <td colspan="6"><{$fpage}></td>
        </tr>
    </tfoot>
</table>
</form>
<script type="text/javascript">
	bindAction('a','删除','您确定要删除该产品吗?');
	</script>
<{include file="public/bottom.tpl"}>
