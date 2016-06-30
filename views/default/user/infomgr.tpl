<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;信息管理</div>
    </div>
    <div class="wraper">
<style type="text/css">
/*会员中心*/
#main table{width:700px;margin:0 auto}
#main table td.r{text-align:right}
#main table td.l{text-align:left;padding-left:12px;}
</style>
        <{include file="user/left.tpl"}>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>信息管理</span></span>
            </h1>
            <div class="content">
            	<form name="list" method="post" action="<{$app}>/user/delinfo">
				<table>
                	<caption><a href="<{$app}>/user/pubinfo" class="right">发布信息</a></caption>
                    <thead>
                    	<tr>
                        	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                            <td>品名</td>
                            <td>材质</td>
                            <td>规格</td>
                            <td>数量</td>
                            <td>价格</td>
                            <td>管理</td>
                        </tr>
                    </thead>
                    <tbody>
                    	<{section loop=$list name="ls"}>
                    	<tr>
                        	<td><input type="checkbox" name="id[]" value="<{$list[ls].id}>" /></td>
                            <td><{if $list[ls].type}><font color="blue">[供应]</font><{else}><font color="green">[求购]</font><{/if}><{$list[ls].title}><{if $list[ls].top}><font color="red">[置顶]</font><{/if}></td>
                            <td><{$list[ls].materials}></td>
                            <td><{$list[ls].model}></td>
                            <td><{$list[ls].num}></td>
                            <td><{$list[ls].price}></td>
                            <td><a href="<{$app}>/user/delinfo/id/<{$list[ls].id}>">[删除]</a>　<a href="<{$app}>/user/modinfo/id/<{$list[ls].id}>">[修改]</a></td>
                        </tr>
                        <{sectionelse}>
                        <tr>
                        	<td colspan="7">您目前还没有发布过供求信息.<a href="<{$app}>/user/pubinfo">[发布信息]</a></td>
                        </tr>
                        <{/section}>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="2" class="l"><label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label>　　<input type="submit" value="删除" class="button" /></td>
                            <td colspan="5"><{$fpage}></td>
                        </tr>
                    </tfoot>
                </table>
                </form>
            </div>
        </div>
<script type="text/javascript">
$(function(){
	document.list.onsubmit=function(){
		if(!confirm('您确定要删除这些信息?'))
			return false;
	}
})
</script>
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>