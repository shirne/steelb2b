<{include file="public/top.tpl"}>
	<!--产品分类-->
    <form name="edit" method="post" action="<{$app}>/product/savecate">
    <input type="hidden" name="id" value="<{$cat.id|string_format:"%d"}>" />
    
	<table>
    	<caption><{$act}>分类<a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
            <tr>
            	<td>设置:</td>
                <td>
                	<label>所属分类:<select name="pid">
                    <option value="">顶级分类</option>
                    <{$cateoptions}>
                    </select>　</label>
                    <label>分类排序:<input type="text" name="sort" value="<{$cat.sort|string_format:"%d"}>" /><span class="tip">越小越靠前</span></label>
                </td>
            </tr>
            <tr>
            	<td>分类名称:</td>
                <td>
                	<input type="text" name="name" value="<{$cat.name}>" />
                </td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
                <td>
                	<input type="submit" value="确认<{$act}>" />　　<input type="reset" value="重置" />
                </td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    </form>
<{include file="public/bottom.tpl"}>
