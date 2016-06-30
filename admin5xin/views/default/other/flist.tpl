<{include file="public/top.tpl"}>
<!--地区管理-->
	<form name="list" action="<{$app}>/other/fdel">
    	<table>
        	<caption>友情链接管理<a href="<{$app}>/other/fadd">[添加链接]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>链接名称</td>
                    <td>链接地址</td>
                    <td>图片</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].name}></td>
                    <td><{$list[c].sname}></td>
                    <td><a href="<{$public}>/uploads/<{$list[c].image}>" target="_blank"><{$list[c].image}></a></td>
                    <td><a href="<{$app}>/other/fdel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/fmodify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="6">暂时没有添加链接<a href="<{$app}>/other/fadd">[添加链接]</a></td></tr>
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
