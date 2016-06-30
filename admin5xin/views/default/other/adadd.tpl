<{include file="public/top.tpl"}>
	<form name="list" method="post" enctype="multipart/form-data" action="<{$app}>/other/adsave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>广告<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>标题</td>
                    <td><input type="text" name="title" value="<{$city.title}>" size="30" /></td>
                </tr>
                <tr>
                	<td>类型</td>
                    <td><label><input type="radio" name="type" value="1" <{if $city.type || !$city}>checked="checked"<{/if}> /> 图片</label>　　<label><input type="radio" name="type" value="0" <{if !$city.type && $city}>checked="checked"<{/if}> /> flash</label>　　<label><input type="checkbox" value="1" name="border" <{if $city.border}>checked="checked"<{/if}> /> 边框</label></td>
                </tr>
                <tr>
                	<td>位置</td>
                    <td>
                    	<select name="postn">
                        	<option value="0">首页-banner　996*120</option>
                        	<option value="1" <{if $city.postn==1}>selected="selected"<{/if}>>首页-中间-上　516*95</option>
                            <option value="2" <{if $city.postn==2}>selected="selected"<{/if}>>首页-中间-中　516*95</option>
                            <option value="3" <{if $city.postn==3}>selected="selected"<{/if}>>首页-中间-下　516*95</option>
                            <option value="4" <{if $city.postn==4}>selected="selected"<{/if}>>首页-左　230*66</option>
                            <option value="5" <{if $city.postn==5}>selected="selected"<{/if}>>首页-右　230*66</option>
                            <option value="6" <{if $city.postn==6}>selected="selected"<{/if}>>子页面　170*80</option>
                            <option value="7" <{if $city.postn==7}>selected="selected"<{/if}>>对联广告　100*300</option>
                            <option value="8" <{if $city.postn==8}>selected="selected"<{/if}>>顶部大广告　996*300</option>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td>图片或flash</td>
                    <td><input type="file" name="img" value="<{$city.img}>" /><{if $city.img}><a href="<{$public}>/uploads/<{$city.img}>" target="_blank">查看</a><{/if}></td>
                </tr>
                <tr>
                	<td>链接</td>
                    <td><input type="text" name="link" value="<{$city.link}>" size="30" /></td>
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
