<{include file="public/top.tpl"}>
    <form name="edit" method="post" action="<{$app}>/job/save">
    <input type="hidden" name="id" value="<{$cat.id|string_format:"%d"}>" />
    
	<table>
    	<caption><{$act}>招聘信息<a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
        	<tr>
            	<td>职位:</td>
                <td>
                	<input type="text" name="job" value="<{$cat.job}>" />
                </td>
            </tr>
            <tr>
            	<td>公司:</td>
                <td>
                	<input type="text" name="company" value="<{$cat.company}>" size="40" />　<input type="button" value="点此查找" onclick="winO('<{$app}>/product/getenter',600,400)" />
                </td>
            </tr>
            <tr>
            	<td>数量:</td>
                <td>
                	<input type="text" name="num" value="<{$cat.num}>" />
                </td>
            </tr>
            <tr>
            	<td>地址:</td>
                <td>
                	<input type="text" name="addr" value="<{$cat.addr}>" />
                </td>
            </tr>
            <tr>
            	<td>薪资:</td>
                <td>
                	<select name="pay">
                    	<option value="面议" <{if $cat.pay=="面议"}>selected="selected"<{/if}> >面议</option>
                        <option value="1000以下" <{if $cat.pay=="1000以下"}>selected="selected"<{/if}> >1000以下</option>
                        <option value="1001到2000" <{if $cat.pay=="1001到2000"}>selected="selected"<{/if}> >1001到2000</option>
                        <option value="2001到3000" <{if $cat.pay=="2001到3000"}>selected="selected"<{/if}> >2001到3000</option>
                        <option value="3001到4000" <{if $cat.pay=="3001到4000"}>selected="selected"<{/if}> >3001到4000</option>
                        <option value="4001到6000" <{if $cat.pay=="4001到6000"}>selected="selected"<{/if}> >4001到6000</option>
                        <option value="6001到8000" <{if $cat.pay=="6001到8000"}>selected="selected"<{/if}> >6001到8000</option>
                        <option value="8001到10000" <{if $cat.pay=="8001到10000"}>selected="selected"<{/if}> >8001到10000</option>
                        <option value="10001到15000" <{if $cat.pay=="10001到15000"}>selected="selected"<{/if}> >10001到15000</option>
                        <option value="15001到30000" <{if $cat.pay=="15001到30000"}>selected="selected"<{/if}> >15001到30000</option>
                        <option value="30001到50000" <{if $cat.pay=="30001到50000"}>selected="selected"<{/if}> >30001到50000</option>
                        <option value="50000以上" <{if $cat.pay=="50000以上"}>selected="selected"<{/if}> >50000以上</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>工作经验:</td>
                <td>
                	<select name="years">
                    	<option value="无" >无</option>
                        <option value="1-2年" <{if $cat.years=="1-2年"}>selected="selected"<{/if}> >1-2年</option>
                        <option value="2-3年" <{if $cat.years=="2-3年"}>selected="selected"<{/if}> >2-3年</option>
                        <option value="3-5年" <{if $cat.years=="3-5年"}>selected="selected"<{/if}> >3-5年</option>
                        <option value="5-10年" <{if $cat.years=="5-10年"}>selected="selected"<{/if}> >5-10年</option>
                        <option value="10年以上" <{if $cat.years=="10年以上"}>selected="selected"<{/if}> >10年以上</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>学历要求:</td>
                <td>
                	<select name="edu">
                    	<option value="无" <{if $cat.edu=="无"}>selected="selected"<{/if}> >无</option>
                        <option value="初中以上" <{if $cat.edu=="初中以上"}>selected="selected"<{/if}> >初中以上</option>
                        <option value="高中、中专以上" <{if $cat.edu=="高中、中专以上"}>selected="selected"<{/if}> >高中、中专以上</option>
                        <option value="大专以上" <{if $cat.edu=="大专以上"}>selected="selected"<{/if}> >大专以上</option>
                        <option value="本科以上" <{if $cat.edu=="本科以上"}>selected="selected"<{/if}> >本科以上</option>
                        <option value="硕士以上" <{if $cat.edu=="硕士以上"}>selected="selected"<{/if}> >硕士以上</option>
                        <option value="博士以上" <{if $cat.edu=="博士以上"}>selected="selected"<{/if}> >博士以上</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>日期:</td>
                <td>
                	<input type="text" name="date" class="Wdate" value="<{$cat.date}>" /> -
                    <input type="text" name="vdate" class="Wdate" value="<{$cat.vdate}>" />
                </td>
            </tr>
            <tr>
            	<td>联系人:</td>
                <td>
                	<input type="text" name="contact" value="<{$cat.contact}>" />
                    <label>电话:<input type="text" name="tele" value="" /> </label>
                    <label>邮箱:<input type="text" name="email" value="" /> </label>
                </td>
            </tr>
            <tr>
            	<td>设置:</td>
                <td>
                	<label><input type="radio" name="filt" value="1" <{if $cat.filt || !$cat}>checked="checked"<{/if}> > 显示</label>
                    <label><input type="radio" name="filt" value="0" <{if !$cat.filt && $cat}>checked="checked"<{/if}> > 隐藏</label>
                    <label><input type="radio" name="top" value="1" <{if $cat.top}>checked="checked"<{/if}> > 置顶</label>
                    <label><input type="radio" name="top" value="0" <{if !$cat.top}>checked="checked"<{/if}> > 普通</label>
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
