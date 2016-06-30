<{include file="public/top.tpl"}>
    <div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;今日报价</div>
    </div>
    
    <div class="wraper">
        <div class="wraper">
        <table class="list">
        <thead>
            <tr>
                <td colspan="6">今日报价</td>
            </tr>
            <tr>
            	<td colspan="6" style="background:#fff;" height="30"><form name="filt" class="right">品名:<input type="text" name="name" value="<{$smarty.get.name|default:"输入品名查看"}>" onclick="this.select()" />　<input type="submit" value="搜索" class="button" /></form></td>
            </tr>
            <tr>
                <td>品名</td>
                <td>材质</td>
                <td>规格</td>
                <td>价格</td>
                <td>涨跌副</td>
                <td>发布时间</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$list name="ls"}>
            <tr>
                <td><{$list[ls].name}></td>
                <td><{$list[ls].material}></td>
                <td><{$list[ls].model}></td>
                <td><{$list[ls].price}></td>
                <td><{if $list[ls].rang>0}><font color="red"><{$list[ls].rang}></font><{elseif $list[ls].rang<0}><font color="green"><{$list[ls].rang}></font><{else}>-<{/if}></td>
                <td><{$smarty.now|date_format:"%Y-%m-%d"}></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="6" height="24"><{$fpage}></td>
            </tr>
        </tfoot>
        </table>
        </div>
        <!--clear float-->
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    $(function(){
		
	})
    </script>
<{include file="public/bottom.tpl"}>
