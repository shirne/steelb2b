<{include file="public/top.tpl"}>
	<form name="list" method="post" enctype="multipart/form-data" action="<{$app}>/other/save">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>价格<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>品名</td>
                    <td><input type="text" name="name" value="<{$city.name}>" /></td>
                </tr>
                <tr>
                	<td>材质</td>
                    <td><input type="text" name="material" value="<{$city.material}>" /></td>
                </tr>
                <tr>
                	<td>规格</td>
                    <td><input type="text" name="model" value="<{$city.model}>" /></td>
                </tr>
                <tr>
                	<td>地区</td>
                    <td>
                    	<select name="area" onchange="this.form.areaid.value=this.options[this.selectedIndex].getAttribute('uid')">
                    	<option value="">本地</option>
                        <{section loop=$area name="ar"}>
                        <option value="<{$area[ar].name}>" uid="<{$area[ar].id}>"  <{if $area[ar].name==$city.area}>selected="selected"<{/if}>><{$area[ar].name}></option>
                        <{/section}>
                        </select>
                        <input type="hidden" name="areaid" value="<{$city.areaid}>" />
                    </td>
                </tr>
                <tr>
                	<td>价格</td>
                    <td><input type="text" name="price" value="<{$city.price}>" /></td>
                </tr>
                <tr>
                	<td>增副</td>
                    <td><input type="text" name="rang" value="<{$city.rang}>" />　<span class="tip">正数为升,负数为降,0 持平</span></td>
                </tr>
                <tr>
                	<td>产地</td>
                    <td><input type="text" name="addr" value="<{$city.addr}>" /></td>
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
