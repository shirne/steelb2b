<{include file="public/top.tpl"}>
	<!--新闻编辑-->
    <script type="text/javascript" src="<{$res}>/kindeditor/kindeditor.js"></script>
    <script type="text/javascript">
		KE.show({
			id:'content',
			resizeMode : 1,
			items : [
			'source','fullscreen','|','fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
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
    <form name="edit" method="post" action="<{$app}>/news/save/id/<{$news.id|string_format:"%d"}>">
    <input type="hidden" name="id" value="<{$news.id|string_format:"%d"}>"  />
	<table>
    	<caption>编辑<font class="red"><{$news.title}></font><a href="javascript:history.back()">[返回]</a></caption>
        <tbody>
        	<tr>
            	<td width="60">标题:</td>
                <td><input type="text" name="title" size="40" value="<{$news.title}>" /></td>
            </tr>
            <tr>
            	<td>关键字:</td>
                <td><input type="text" name="keywords" size="40" value="<{$news.keywords}>" /><span class="tip">请使用 '<font class="red">,</font>' 隔开</span></td>
            </tr>
            <tr>
            	<td>信息来源:</td>
                <td><input type="text" name="quote" size="40" value="<{$news.quote}>" /></td>
            </tr>
            <tr>
            	<td>设置:</td>
                <td>
                	<label>分类:<select name="class" ><{$cateoptions}></select>　</label>
                    <label><input type="radio" name="isshow" value="1" <{if $news.isshow}>checked="checked"<{/if}> /> 显示　</label>
                    <label><input type="radio" name="isshow" value="0" <{if !$news.isshow}>checked="checked"<{/if}> /> 隐藏　</label>
                    <label><input type="radio" name="filt" value="1" <{if $news.filt}>checked="checked"<{/if}> /> 审核　</label>
                    <label><input type="radio" name="filt" value="0" <{if !$news.filt}>checked="checked"<{/if}> /> 未审　</label>
                    <label><input type="radio" name="slide" value="1" <{if $news.slide}>checked="checked"<{/if}> /> 图片　</label>
                    <label><input type="radio" name="slide" value="0" <{if !$news.slide}>checked="checked"<{/if}> /> 无　</label><br /><br />
                    <label>发布日期:<input type="text" size="16" name="date" value="<{$news.date|date_format:"%Y-%m-%d %H:%M:%S"}>" />　</label>
                    <label>发布人:<input type="text" size="16" name="user" value="<{$news.user}>" />　</label>
                    <label>点击:<input type="text" size="4" name="hits" value="<{$news.hits|string_format:"%d"}>" />　</label>
                    评论:<{$news.comments|string_format:"%d"}>　
                    <label>最后修改:<{$news.modate}></label>
                </td>
            </tr>
            <tr>
            	<td>摘要:</td>
                <td><textarea name="summary" style="width:90%;height:50px"><{$news.summary}></textarea></td>
            </tr>
            <tr>
            	<td>内容:</td>
                <td><textarea name="content" id="content" style="width:90%;height:400px"><{$news.content}></textarea></td>
            </tr>
            <tr>
            	<td>图片:</td>
                <td><input type="text" name="images" value="<{$news.images}>" /><span class="tip">请填写图片名称(如:20110722091247_835.jpg)并确定图片已经成功上传</span></td>
            </tr>
        </tbody>
        <tfoot>
             <tr>
            	<td>&nbsp;</td>
                <td><input type="submit" value="确认修改" /><input type="reset" value="重新修改" /></td>
            </tr>
        </tfoot>
    </table>
    </form>
    <p>注:摘要留空将会自动生成</p>
<{include file="public/bottom.tpl"}>
