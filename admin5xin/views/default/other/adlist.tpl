<{include file="public/top.tpl"}>
	<form name="list" action="<{$app}>/other/addel">
    	<table>
        	<caption>广告管理<a href="<{$app}>/other/adadd">[添加广告]</a></caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>名称</td>
                    <td>链接</td>
                    <td>类型</td>
                    <td>日期</td>
                    <td>位置</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].title}></td>
                    <td><{$list[c].link}></td>
                    <td><{if $list[c].type}>图片<{else}>flash<{/if}></td>
                    <td><{$list[c].date}></td>
                    <td><{$list[c].postn|adposition}></td>
                    <td><a href="<{$app}>/other/addel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/admodify/id/<{$list[c].id}>">[修改]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="7">暂时没有添加广告<a href="<{$app}>/other/adadd">[添加广告]</a></td></tr>
                <{/section}>
            </tbody>
            <tfoot>
            	<tr>
                	<td colspan="7"><input type="checkbox" onclick="syncck(this,'list','id[]')" /><input type="submit" name="acr" value="删除" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
<{include file="public/bottom.tpl"}>
