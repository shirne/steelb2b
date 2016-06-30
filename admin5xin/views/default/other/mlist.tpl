<{include file="public/top.tpl"}>
<!--地区管理-->
	<form name="list" action="<{$app}>/other/mdel">
    	<table>
        	<caption>留言管理</caption>
            <thead>
            	<tr>
                	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                    <td>标题</td>
                    <td>类型</td>
                    <td>日期</td>
                    <td>内容</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
            	<{section loop=$list name="c"}>
            	<tr>
                	<td><input type="checkbox" name="id[]" value="<{$list[c].id}>" /></td>
                    <td><{$list[c].name|truncate:30}> <{if $list[c].replay}><font color="green">[已回复]</font><{/if}>
                    	 <{if $list[c].filt}><font color="green">[显示]</font><{else}><font color="red">[隐藏]</font><{/if}>
                    </td>
                    <td><{$list[c].type|truncate:40}></td>
                    <td><{$list[c].date}></td>
                    <td><{$list[c].content|truncate:60}></td>
                    <td><a href="<{$app}>/other/mdel/id/<{$list[c].id}>">[删除]</a><a href="<{$app}>/other/mmodify/id/<{$list[c].id}>">[回复]</a></td>
                </tr>
                <{sectionelse}>
                <tr><td colspan="6">暂时没有用户留言</td></tr>
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
