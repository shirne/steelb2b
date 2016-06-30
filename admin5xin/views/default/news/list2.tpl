<{include file="public/top.tpl"}>
	<!--资讯列表-->
    <form name="list" action="<{$app}>/news/bat" method="post">
    <table>
    	<caption>所有<font color="red"><{$model}></font>下的分类<a href="<{$app}>/news/addcate/cid/<{$cid}>">[添加分类]</a></caption>
        <tr>
        	<td>
            	<{section loop=$cate name="ct"}>
                <a <{if $cate[ct].id == $sid }>class="red"<{else}>href="<{$app}>/news/list2/cid/<{$cid}>/sid/<{$cate[ct].id}>" <{/if}> ><{$cate[ct].name}></a>
                <{sectionelse}>
                该分类下暂时没有子分类<a href="<{$app}>/news/addcate/cid/<{$cid}>">[添加子分类]</a>
                <{/section}>
            </td>
        </tr>
    </table>
	<table>
    	<caption>所有<font color="red"><{$model}></font><{$submodel}>文章列表<a href="<{$app}>/news/addnews/cid/<{$cid}>">[添加文章]</a></caption>
    	<thead>
        	<tr>
            	<td width="5%"><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                <td>标题</td>
                <td>作者</td>
                <td>日期</td>
                <td>最后编辑</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$nlist name="a"}>
            <tr>
            	<td><input type="checkbox" name="id[]" value="<{$nlist[a].id|string_format:"%d"}>" /></td>
                <td><a href="<{$app}>/news/modify/id/<{$nlist[a].id|string_format:"%d"}>" title="点击编辑"><{$nlist[a].title}></a></td>
                <td><{$nlist[a].user}></td>
                <td><{$nlist[a].date}></td>
                <td><{$nlist[a].modate}></td>
                <td>
                	<{if $nlist[a].isshow}>
                    	<a href="<{$app}>/news/lact/id/<{$nlist[a].id|string_format:"%d"}>/act/2" title="点击隐藏">[显示]</a>
                    <{else}>
                    	<a href="<{$app}>/news/lact/id/<{$nlist[a].id|string_format:"%d"}>/act/1" title="点击显示" class="red">[隐藏]</a>
                    <{/if}>
                    <{if $nlist[a].filt}>
                    	<a href="<{$app}>/news/lact/id/<{$nlist[a].id|string_format:"%d"}>/act/4" title="点击取消">[已审]</a>
                    <{else}>
                    	<a href="<{$app}>/news/lact/id/<{$nlist[a].id|string_format:"%d"}>/act/3" title="点击审核" class="red">[未审]</a>
                    <{/if}>
                </td>
                <td><a href="<{$app}>/news/lact/id/<{$nlist[a].id|string_format:"%d"}>/act/0">[删除]</a><a href="<{$app}>/news/modify/id/<{$nlist[a].id|string_format:"%d"}>">[修改]</a></td>
            </tr>
            <{sectionelse}>
            <tr>
            	<td colspan="7">暂时没有添加过文章<a href="<{$app}>/news/addnews/cid/<{$cid}>">[添加文章]</a></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="2"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label><input type="submit" name="act" value="删除" /><input type="submit" name="act" value="显示" /><input type="submit" name="act" value="隐藏" /><input type="submit" name="act" value="审核" /><input type="submit" name="act" value="取消审核" /></td>
                <td colspan="5" align="right"><{$fpage}></td>
            </tr>
        </tfoot>
    </table>
    </form>
    <script type="text/javascript">
	bindAction('a','删除','您确定要删除该文章吗?');
	
	</script>
<{include file="public/bottom.tpl"}>
