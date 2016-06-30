<{include file="public/top.tpl"}>
	<form name="list" method="post" enctype="multipart/form-data" action="<{$app}>/other/fsave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>友情链接<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td>链接名称</td>
                    <td><input type="text" name="name" value="<{$city.name}>" /></td>
                </tr>
                <tr>
                	<td>名称简写</td>
                    <td><input type="text" name="sname" value="<{$city.sname}>" /></td>
                </tr>
                <tr>
                	<td>链接地址</td>
                    <td><input type="text" name="link" value="<{$city.link}>" /></td>
                </tr>
                <tr>
                	<td>图片</td>
                    <td><input type="file" name="image" />
                    <{if $city.image != ""}><img src="<{$public}>/uploads/<{$city.image}>" height="50" /><{/if}></td>
                </tr>
                <tr>
                	<td>说明</td>
                    <td><textarea name="intro" style="width:300px;height:50px"><{$city.intro}></textarea></td>
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
