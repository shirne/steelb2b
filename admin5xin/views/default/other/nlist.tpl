<{include file="public/top.tpl"}>
<!--地区管理-->
	<form name="list" action="<{$app}>/other/ndel">
    	<table>
        	<caption>公告管理<a href="<{$app}>/other/nadd">[添加公告]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>标题</td>
                    <td>链接</td>
                    <td>日期</td>
                    <td>内容</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].title|truncate:30}></td>
                    <td><{$list[c].link|truncate:40}></td>
                    <td><{$list[c].date}></td>
                    <td><{$list[c].content|htmlspecialchars_decode|strip_tags|truncate:60}></td>
                    <td><a href="<{$app}>/other/ndel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/nmodify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="6">暂时没有添加公告<a href="<{$app}>/other/nadd">[添加公告]</a></td></tr>
                <{/section}>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="6"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="acr" value="删除" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
<{include file="public/bottom.tpl"}>
