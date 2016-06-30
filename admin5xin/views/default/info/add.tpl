<{include file="public/top.tpl"}>
	<!--产品添加-->
    <form name="edit" method="post" action="<{$app}>/info/save">
    <input type="hidden" name="id" value="<{$cat.id|string_format:"%d"}>" />
    
	<table>
    	<caption><{$act}>信息<a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
        	<tr>
            	<td>品名:</td>
                <td>
                	<input type="text" name="title" value="<{$cat.title}>" />
                    <label>信息类型:<select name="type"><option value="1">供应</option><option value="0" <{if ($smarty.get.type != 1) && ($cat.type != 1)}>selected="selected"<{/if}> >求购</option></select></label>　　<label><input type="checkbox" name="top" value="1" <{if $cat.top}>checked="checked"<{/if}> />置顶</label>
                </td>
            	<td>材质:</td>
                <td>
                	<input type="text" name="materials" value="<{$cat.materials}>" />
                </td>
            </tr>
            <tr>
            	<td>类别:</td>
                <td>
                	<select name="class" onchange="ajaxcate(this,document.edit.vari,'<{$app}>/product/getcate/pid/')">
                    <{section loop=$fcates name=fc}>
                    <option value="<{$fcates[fc].name}>" uid="<{$fcates[fc].id}>" <{if $cat.class == $fcates[fc].name}>selected="selected" <{/if}> ><{$fcates[fc].name}></option>
                    <{/section}>
                    </select>
                </td>
                <td>品种:</td>
                <td>
                	<select name="vari">
                    <{section loop=$scates name=sc}>
                    <option value="<{$scates[sc].name}>" <{if $cat.vari == $scates[sc].name}>selected="selected" <{/if}> ><{$scates[sc].name}></option>
                    <{/section}>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>价格:</td>
                <td>
                	<input type="text" name="price" value="<{$cat.price}>" />
                </td>
                <td>批发价:</td>
                <td>
                	<input type="text" name="vprice" value="<{$cat.vprice}>" />
                </td>
            </tr>
            <tr>
            	<td>规格:</td>
                <td>
                	<input type="text" name="model" value="<{$cat.model}>" />
                </td>
                <td>数量:</td>
                <td>
                	<input type="text" name="num" value="<{$cat.num}>" />
                </td>
            </tr>
            <tr>
            	<td>交货地点:</td>
                <td>
                	<input type="text" name="addr" value="<{$cat.addr}>" />
                </td>
                <td>交货仓库:</td>
                <td>
                	<input type="text" name="house" value="<{$cat.house}>" />
                </td>
            </tr>
            <tr>
            	<td>生产厂家:</td>
                <td>
                	<input type="text" name="produce" value="<{$cat.produce}>" />
                </td>
            	<td>所属公司:</td>
                <td>
                	<input type="text" name="company" value="<{$cat.company}>" size="40" />　<input type="button" value="点此查找" onclick="winO('<{$app}>/info/getenter',600,400)" />
                </td>
            </tr>
            <tr>
            	<td>备注</td>
                <td colspan="3">
                	<textarea name="content" style="width:600px;height:50px;"><{$cat.content}></textarea>
                </td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
                <td colspan="3">
                	<input type="submit" value="确认<{$act}>" />　　<input type="reset" value="重置" />
                </td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    </form>
<{include file="public/bottom.tpl"}>
