<{include file="public/top.tpl"}>
<!--价格管理-->
	
	<form name="list" action="<{$app}>/other/del">
    	<table>
        	<caption>价格管理<a href="<{$app}>/other/add">[添加价格]</a><a href="<{$app}>/other/refresh">[更新日期]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>地区</td>
                    <td>品名</td>
                    <td>材质</td>
                    <td>型号</td>
                    <td>价格</td>
                    <td>日期</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].area|default:"本地"}></td>
                    <td><{$list[c].name}></td>
                    <td><{$list[c].material}></td>
                    <td><{$list[c].model}></td>
                    <td><{$list[c].price}></td>
                    <td><{$list[c].date}></td>
                    <td><a href="<{$app}>/other/del/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/modify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="8">暂时没有添加价格<a href="<{$app}>/other/add">[添加价格]</a></td></tr>
                <{/section}>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="2"><input type="checkbox" onclick="" /><input type="submit" name="acr" value="删除" /></td>
                    <td colspan="6"><{$fpage}></td>
                </tr>
            </tfoot>
        </table>
    </form>
    <p>该页地区对应价格管理内的地区</p>
<{include file="public/bottom.tpl"}>
