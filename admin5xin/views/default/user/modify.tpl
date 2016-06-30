<{include file="public/top.tpl"}>
    <form name="edit" method="post" action="<{$app}>/user/save">
    <input type="hidden" name="id" value="<{$user.id}>" />
	<table>
    	<caption>更改用户<a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
            <tr>
            	<td width="60">用户名:</td>
                <td><input type="text" name="qa_user" size="20" value="<{$user.qa_user}>" />　<label><input type="radio" name="filt" <{if $user.filt}>checked="checked"<{/if}> value="1" /> 认证　</label><label><input type="radio" name="filt" <{if !$user.filt}>checked="checked"<{/if}> value="0" /> 普通</label></td>
            </tr>
            <tr>
            	<td>用户密码:</td>
                <td><input type="password" name="qa_pwd" size="20" /><span class="tip">不更改请留空</span></td>
            </tr>
            <tr>
            	<td>公司名称:</td>
                <td><input type="text" name="company" size="40" value="<{$user.company}>" /> 英文:<input type="text" name="ecompany" size="40" value="<{$user.ecompany}>" /></td>
            </tr>
            <tr>
            	<td>公司简称:</td>
                <td>
                	<input type="text" name="scompany" size="20" value="<{$user.scompany}>" />　
                	<label>所在钢市:
                    	<select name="scity">
                		<{section loop=$city name="c"}>
                        <option value="<{$city[c].name}>" <{if $city[c].name == $user.scity}>selected="selected"<{/if}> ><{$city[c].name}></option>
                        <{/section}>
                        </select>
                	</label>
                </td>
            </tr>
            <tr>
            	<td>公司网址:</td>
                <td><input type="text" name="url" size="60" value="<{$user.url}>" /></td>
            </tr>
            <tr>
            	<td>业务范围:</td>
                <td><input type="text" name="business" size="60" value="<{$user.business}>" /></td>
            </tr>
            <tr>
            	<td>所在地区:</td>
                <td>
                	<label>省:<select name="prov"></select>　</label>
                    <label>市:<select name="city"></select>　</label>
                    <label>区/县:<select name="area"></select>　</label>
                    <label>邮政编码:<input type="text" name="zcode" value="<{$user.zcode}>" /></label>
                </td>
            </tr>
            <tr>
            	<td>详细住址:</td>
                <td><input type="text" name="addr" size="60" value="<{$user.addr}>" /></td>
            </tr>
            <tr>
            	<td>联系方式:</td>
                <td>
                	<label>电话:<input type="text" name="tele" size="20" value="<{$user.tele}>" />　</label>
                    <label>传真:<input type="text" name="fax" size="20" value="<{$user.fax}>" />　</label>
                    <label>手机:<input type="text" name="mobile" size="20" value="<{$user.mobile}>" />　</label><br />
                    <label>邮箱:<input type="text" name="email" size="30" value="<{$user.email}>" />　</label>
                    <label>其它:<input type="text" name="contact" size="30" value="<{$user.contact}>" /></label>
                </td>
            </tr>
            <tr>
            	<td>公司介绍:</td>
                <td><textarea name="content" style="width:100%;height:300px"><{$user.content}></textarea></td>
            </tr>
        </tbody>
        <tfoot>
        	<tr>
            	<td>&nbsp;</td>
                <td>
                	<input type="submit" value="确认更改" />　　<input type="reset" value="重置" />
                </td>
            </tr>
        </tfoot>
    </table>
    </form>
    <script type="text/javascript" src="<{$res}>/scripts/area.js">
	</script>
    <script type="text/javascript">
	initArea('edit','<{$user.prov}>','<{$user.city}>','<{$user.area}>',false);
	</script>
<{include file="public/bottom.tpl"}>
