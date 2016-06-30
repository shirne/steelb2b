<{include file="public/top.tpl"}>
<form name="search" method="get">
<table>
	<caption>招聘信息搜索</caption>
    <tr>
        <td>&nbsp;</td>
        <td rowspan="2" width="100">
        	<input type="submit" value="搜索" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
</form>

<form name="list" method="post" action="<{$app}>/job/bat">
<table>
	<caption>招聘信息管理<a href="<{$app}>/job/add">[添加招聘信息]</a></caption>
    <thead>
    	<tr>
        	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
            <td>公司</td>
            <td>职位</td>
            <td>数量</td>
            <td>地区</td>
            <td>日期</td>
            <td>联系人</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
    </thead>
    <tbody>
    	<{section loop=$list name="ls"}>
    	<tr>
        	<td><input type="checkbox" name="id[]" value="" /></td>
            <td><{$list[ls].company}></td>
            <td><{$list[ls].job}></td>
            <td><{$list[ls].num}></td>
            <td><{$list[ls].addr}></td>
            <td><{$list[ls].date}></td>
            <td><{$list[ls].contact}></td>
            <td><{if $list[ls].top}><font color="red">[置顶]</font><{/if}><{if !$list[ls].filt}><font color="red">[隐藏]</font><{else}>显示<{/if}></td>
            <td><a href="<{$app}>/job/del/id/<{$list[ls].id}>">[删除]</a><a href="<{$app}>/job/modify/id/<{$list[ls].id}>">[修改]</a></td>
        </tr>
        <{sectionelse}>
        <tr><td colspan="9">没有搜索到招聘信息</td></tr>
        <{/section}>
    </tbody>
    <tfoot>
    	<tr>
        	<td colspan="3"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" class="button" name="act" value="删除" /></td>
            <td colspan="6"><{$fpage}></td>
        </tr>
    </tfoot>
</table>
</form>
<script type="text/javascript">
bindAction('a','删除','您确定要删除该信息吗?');
</script>
<{include file="public/bottom.tpl"}>
