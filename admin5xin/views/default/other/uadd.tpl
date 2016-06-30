<{include file="public/top.tpl"}>
	<form name="list" method="post" enctype="multipart/form-data" action="<{$app}>/other/usave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>常用链接<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>链接名称</td>
                    <td><input type="text" name="title" value="<{$city.title}>" /></td>
                </tr>
                <tr>
                	<td>分类</td>
                    <td>
                    	<select name="cate" onchange="this.form.scate.value=this.options[this.selectedIndex].getAttribute('uname')">
                        	<option value="钢铁"  uname="gt">钢铁</option>
                            <option value="搜索" uname="ss" <{if $city.cate == "搜索"}>selected="selected"<{/if}>>搜索</option>
                            <option value="天气" uname="tq" <{if $city.cate == "天气"}>selected="selected"<{/if}>>天气</option>
                            <option value="时间" uname="sj" <{if $city.cate == "时间"}>selected="selected"<{/if}>>时间</option>
                            <option value="交通" uname="jt" <{if $city.cate == "交通"}>selected="selected"<{/if}>>交通</option>
                            <option value="银行" uname="yh" <{if $city.cate == "银行"}>selected="selected"<{/if}>>银行</option>
                            <option value="其它" uname="qt" <{if $city.cate == "其它"}>selected="selected"<{/if}>>其它</option>
                        </select>
                        <input type="hidden" name="scate" value="<{$city.scate|default:"gt"}>" />
                    </td>
                </tr>
                <tr>
                	<td>链接地址</td>
                    <td><input type="text" name="url" value="<{$city.url}>" /></td>
                </tr>
                <tr>
                	<td>排序</td>
                    <td><input type="text" name="sort" value="<{$city.sort}>" />
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
