<{include file="public/top.tpl"}>
<!--数据库管理-->
<{if $bak}>
数据库备份完成<br />
文件:<{$fname}>　<a href="<{$app}>/manage/downbak/file/<{$fname}>" target="_blank">[下载]</a><a href="<{$app}>/manage/datamgr">[返回]</a>
<{else}>
<table>
    <tr>
        <td>
            <a href="<{$app}>/manage/sqldump" onclick="return confirm('确定开始备份数据库?\n可能需要较长时间')">备份数据库</a>
        </td>
    </tr>
    <form name="rform" onsubmit="return restore();" action="<{$app}>/manage/restore" method="post">
    <{section loop=$bfile name=bf}>
    <tr>
        <td><label><input type="radio" name="file" value="<{$bfile[bf]}>" />  <{$bfile[bf]}></label><a href="<{$app}>/manage/del/file/<{$bfile[bf]}>" onclick="return confirm('确定删除该备份?')">[删除该备份]</a><a href="<{$app}>/manage/downbak/file/<{$bfile[bf]}>" target="_blank">[下载]</a></td>
    </tr>
    <{/section}>
    <tr>
        <td>
            <!--<input type="submit" value="还原数据库" />-->
        </td>
    </tr>
    </form>
</table>
<br />
<strong><span class="red">提示:</span></strong>
<p>1.备份与恢复数据库可能需要较长时间等待,请尽量选在访客少的情况下进行</p>
<p>2.数据库备份可每隔一月左右时间进行一次,如果数据量太大时导致备份缓慢,请用其它辅助工具备份,或找专业人员</p>
<p>3.数据库的备份文件数目保持在3个左右,过多只会占用服务器空间.</p>
<p>4.数据库还原操作只是为了防止意外发生时的数据恢复,没有太大问题尽量避免使用</p>
<p>5.此备份/还原功能不能保证100%成功.特别是还原的时候.失败可能会导致网站无法运行.</p>
<p>6.保留1-3个备份可保证在网站运行出现问题的时候,即使不能在此处还原,亦可利用其它工具使用此备份进行还原</p>
<p>7.下载备份文件保存在本地可在网站发生意外时利用工具还原.下载在本地的文件不能在此处还原</p>
<br />
<script type="text/javascript">
function restore(){
	var rs=document.rform.file,flag=false;
	if(!rs.length){
		if(rs.checked)
			flag=true;
	}else{
		for(var i=0;i<rs.length;i++){
			if(rs[i].checked){
				flag=true;
				break;
			}
		}
	}
	if(!flag){
		alert('请选择一个文件进行还原');
		return false;
	}
	return confirm('您确定要对数据库开始还原?');
}
</script>
<{/if}>
<{include file="public/bottom.tpl"}>
