<{include file="public/top.tpl"}>
<!--钢市管理-->
	<form name="list" method="post" action="<{$app}>/other/nsave">
    <input type="hidden" name="id" value="<{$city.id}>" />
    	<table style="width:500px;margin:0 auto">
        	<caption><{$act}>公告<a href="javascript:history.back()">[返回]</a></caption>
            <tbody>
            	<tr>
                	<td width="60">公告标题</td>
                    <td><input type="text" name="title" size="50" value="<{$city.title}>" /></td>
                </tr>
                <tr>
                	<td width="60">链接</td>
                    <td><input type="text" name="link" size="50" value="<{$city.link}>" /></td>
                </tr>
                <{if $city}>
                <tr>
                	<td>发布日期</td>
                    <td><input type="text" name="date" value="<{$city.date}>" /></td>
                </tr>
                <{/if}>
                <tr>
                	<td>内容</td>
                    <td><textarea name="content" id="content" style="width:100%;height:200px;"><{$city.content}></textarea></td>
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
    <script type="text/javascript" src="<{$res}>/kindeditor/kindeditor.js"></script>
    <script type="text/javascript">
		KE.show({
			id:'content',
			resizeMode : 1,
			items : [
			'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link','|','about'],
			imageUploadJson:'<{$app}>/index/upload/',
			afterCreate : function(id) {
				KE.event.ctrl(document, 13, function() {
					KE.sync(id);
					document.forms['edit'].submit();
				});
				KE.event.ctrl(KE.g[id].iframeDoc, 13, function() {
					KE.sync(id);
					document.forms['edit'].submit();
				});
			}
		});
	</script>
<{include file="public/bottom.tpl"}>
