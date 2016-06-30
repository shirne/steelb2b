<{include file="public/top.tpl"}>
<!--钢市管理-->
	<form name="list" method="post" action="<{$app}>/other/msave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>留言回复<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td width="60">留言标题</td>
                    <td><input type="text" name="name" size="50" value="<{$city.name}>" /></td>
                </tr>
                <tr>
                	<td width="60">类型</td>
                    <td><input type="text" name="type" size="50" value="<{$city.type}>" /></td>
                </tr>
                <{if $city}>
                <tr>
                	<td>日期</td>
                    <td>
                    	<input type="text" name="date" value="<{$city.date}>" />
                        <label><input type="radio" name="filt" value="1" <{if $city.filt}>checked="checked"<{/if}> /> 显示　</label>
                        <label><input type="radio" name="filt" value="0" <{if !$city.filt}>checked="checked"<{/if}> /> 隐藏　</label>
                    </td>
                </tr>
                <{/if}>
                <tr>
                	<td>内容</td>
                    <td><textarea name="content" id="content" style="width:100%;height:200px;"><{$city.content}></textarea></td>
                </tr>
            </tbody>
            <tbody>
            	<tr>
                	<td width="60">回复内容</td>
                    <td><textarea name="recont" id="recont" style="width:100%;height:200px;"><{$city.recont}></textarea></td>
                </tr>
            </tbody>
            <tfoot>
            	<tr>
                	<td>&nbsp;</td>
                	<td><input type="submit" value="确认<{$act}>" />　<input type="reset" value="重置" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
<{include file="public/bottom.tpl"}>
