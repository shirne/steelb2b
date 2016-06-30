<{include file="public/top.tpl"}>
<!--钢市管理-->
	<form name="list" method="post" action="<{$app}>/other/asave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>地区<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>地区名称</td>
                    <td><input type="text" name="name" value="<{$city.name}>" />　<label><input type="radio" name="hide" value="0" <{if !$city.hide}>checked="checked"<{/if}> /> 显示</label><label><input type="radio" name="hide" value="1" <{if $city.hide}>checked="checked"<{/if}> /> 隐藏</label></td>
                </tr>
                <tr>
                	<td>简称</td>
                    <td><input type="text" name="sname" value="<{$city.sname}>" /></td>
                </tr>
                <tr>
                	<td>排序</td>
                    <td><input type="text" name="sort" value="<{$city.sort|string_format:"%d"}>" /></td>
                </tr>
                <tr>
                	<td>座标</td>
                    <td>X座标:<input type="text" name="p_x" value="<{$city.p_x|string_format:"%d"}>" size="5" />　Y座标:<input type="text" name="p_y" value="<{$city.p_y|string_format:"%d"}>" size="5" /></td>
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
