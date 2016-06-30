<{include file="public/top.tpl"}>
<table>
	<caption>产品分类</caption>
    <tr>
    	<td width="30">类别</td>
        <td>
        	<{section loop=$fcate name="fc"}>
            <a href="<{$app}>/product/index/fcate/<{$fcate[fc].id}>" <{if $smarty.get.fcate==$fcate[fc].id}>class="red" <{/if}> ><{$fcate[fc].name}></a>
            <{sectionelse}>
            还没有添加过产品分类<a href="<{$app}>/product/addcate">[去添加]</a>
            <{/section}>
        </td>
        <td rowspan="2" width="100">
        	<form name="class" method="get" action="<{$app}>/product/index">
            	<label for="cate">快速选择:</label>
                <select name="cate" onchange="this.form.submit()">
                	<option value="">所有产品</option>
                	<{$cateoptions}>
                </select>
            </form>
        </td>
    </tr>
    <tr>
    	<td>品种</td>
        <td>
        	<{section loop=$scate name="sc"}>
            <a href="<{$app}>/product/index/fcate/<{$smarty.get.fcate}>/scate/<{$scate[sc].id}>" <{if $smarty.get.scate==$scate[sc].id}>class="red" <{/if}> ><{$scate[sc].name}></a>
            <{sectionelse}>
            <{if $hasfcate}>此类别下还没有添加过品种<a href="<{$app}>/product/addcate">[去添加]</a><{else}>
            没有选择类别<{/if}>
            <{/section}>
        </td>
    </tr>
</table>

<form name="list" method="post" action="<{$app}>/product/del">
<table>
	<caption>产品管理<a href="<{$app}>/product/add">添加产品</a></caption>
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
            <td><{$lists[ls].price}></td>
            <td><{$lists[ls].vprice}></td>
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
