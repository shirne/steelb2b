<{include file="public/top.tpl"}>
<!--钢市管理-->
	<form name="list" method="post" action="<{$app}>/other/csave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>钢市<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>钢市名称</td>
                    <td><input type="text" name="name" value="<{$city.name}>" /></td>
                </tr>
                <tr>
                	<td>排序</td>
                    <td><input type="text" name="sort" value="<{$city.sort|string_format:"%d"}>" /></td>
                </tr>
            </tbody>
            <tfoot>
            	<tr>
                	<td>&nbsp;</td>
                	<td><input type="submit" value="确认<{$act}>" /></td>
                </tr>
            </tfoot>
        </table>
    </form>
<{include file="public/bottom.tpl"}>
