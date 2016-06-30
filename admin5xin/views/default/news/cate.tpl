<{include file="public/top.tpl"}>
	<!--新闻分类管理-->
    <form name="cate" method="get" action="<{$app}>/news/cate">
    	<label>选择分类:
        	<select name="cate" onchange="this.form.submit()">
            	<option value="">顶级分类</option>
                <{$cateoptions}>
            </select>
        </label>
    </form>
	<table>
    	<caption>所有<font class="red"><{$cate}></font><{if $cate!="顶级分类"}>下的子类<a href="<{$app}>/news/addcate/cid/<{$cateid}>">[添加子类]</a><{else}><a href="<{$app}>/news/addcate/cid/0">[添加分类]</a><{/if}><a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
            <tr>
            	<td>分类ID</td>
                <td>分类名称</td>
                <td>排序</td>
                <td>操作</td>
            </tr>
            <{section loop=$cates name="ct"}>
            <tr>
            	<td><{$cates[ct].id|string_format:"%d"}></td>
                <td><a href="<{$app}>/news/cate?cate=<{$cates[ct].id|string_format:"%d"}>"><{$cates[ct].name}></a></td>
                <td><{$cates[ct].sort|string_format:"%d"}></td>
                <td><a href="<{$app}>/news/addcate/cid/<{$cates[ct].id|string_format:"%d"}>">[添加子类]</a><{if $cates[ct].id > 5}><a href="<{$app}>/news/delcate/id/<{$cates[ct].id|string_format:"%d"}>">[删除]</a><{/if}><a href="<{$app}>/news/addcate/cid/<{$cates[ct].pid|string_format:"%d"}>/id/<{$cates[ct].id|string_format:"%d"}>">[更改]</a></td>
            </tr>
            <{sectionelse}>
             <tr>
            	<td colspan="4">还没有添加过子类<a href="<{$app}>/news/addcate/cid/<{$cateid}>">[添加子类]</a></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <script type="text/javascript">
	bindAction('a','删除','您确定要删除该分类吗?');
	</script>
<{include file="public/bottom.tpl"}>
