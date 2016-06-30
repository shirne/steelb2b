<{include file="public/top.tpl"}>
<!--地区管理-->
	<form name="list" action="<{$app}>/other/adel">
    	<table>
        	<caption>地区管理<a href="<{$app}>/other/aadd">[添加地区]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>地区名称</td>
                    <td>地区简称</td>
                    <td>排序</td>
                    <td>座标</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].name}>　<{if $list[c].hide}><font color="#FF0000">[隐藏]</font><{/if}></td>
                    <td><{$list[c].sname}></td>
                    <td><{$list[c].sort|string_format:"%d"}></td>
                    <td><{$list[c].p_x|string_format:"%d"}>-<{$list[c].p_y|string_format:"%d"}></td>
                    <td><a href="<{$app}>/other/adel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/amodify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="6">暂时没有添加地区<a href="<{$app}>/other/aadd">[添加地区]</a></td></tr>
                <{/section}>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="6"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="acr" value="删除" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
    <p>该页地区对应价格管理内的地区</p>
<{include file="public/bottom.tpl"}>
