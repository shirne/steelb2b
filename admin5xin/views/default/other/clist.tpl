<{include file="public/top.tpl"}>
<!--钢市管理-->
	<form name="list" action="<{$app}>/other/cdel">
    	<table>
        	<caption>钢市管理<a href="<{$app}>/other/cadd">[添加钢市]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>名称</td>
                    <td>排序</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].name}></td>
                    <td><{$list[c].sort|string_format:"%d"}></td>
                    <td><a href="<{$app}>/other/cdel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/cmodify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="3">暂时没有添加钢市<a href="<{$app}>/other/cadd">[添加钢市]</a></td></tr>
                <{/section}>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="3"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="acr" value="删除" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
<{include file="public/bottom.tpl"}>
