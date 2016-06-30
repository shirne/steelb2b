<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;发布信息</div>
    </div>
    <div class="wraper">
<style type="text/css">
/*会员中心*/
#main table{width:700px;margin:0 auto}
#main table td.r{text-align:right;width:80px;}
#main table td.l{text-align:left;padding-left:12px;}
</style>
        <{include file="user/left.tpl"}>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>发布信息</span></span>
            </h1>
            <div class="content">
                <table>
                    <form method="post" name="pubinfo" action="<{$app}>/user/saveinfo">
                    <tr>
                        <td colspan="4">请如实填写下列项目，注意：带有“*”的项目必须填写。</td>
                    </tr>
                    <tr>
                        <td class="r">品名：</td>
                        <td class="l"><input name="title" type="text" size="20" maxlength="30"></td>
                        <td class="r">种类：</td>
                        <td width="280" class="l">
                        <select name="type">
                        <{if $smarty.session.filt}><option value="1">供应</option><{/if}>
                        <option value="0">求购</option>
                        </select>　<{if !$smarty.session.filt}><font color="#aaaaaa">您尚未认证,只能发布求购信息</font><{/if}></td>
                    </tr>
                    <tr>
                        <td class="r">材质：</td>
                        <td class="l"><input name="materials" type="text" size="20" maxlength="30"   msg="材质不能超过30个字" /></td>
                        <td class="r">规格：</td>
                        <td class="l"><input name="model" type="text" size="20" maxlength="30" /></td>
                    </tr>
                    <tr>
                        <td class="r">数量：</td>
                        <td class="l"><input name="num" type="text" size="20" maxlength="20" /></td>
                        <td class="r">价格：</td>
                        <td class="l"><input name="price" type="text" size="20" maxlength="20" /></td>
                    </tr>
                    <tr>
                        <td class="r">仓库：</td>
                        <td colspan="3" class="l"><input name="house" type="text" class="black_1" size="70" dataType="Limit" min="1" max="50"  msg="仓库不能超过50个字"></td>
                    </tr>
                    <tr>
                        <td class="r">描述：</td>
                        <td colspan="3" class="l"><textarea name="content" cols="70" rows="5" ></textarea></td>
                    </tr>
                    <tr>
                    	<td class="r">验证码：</td>
                        <td class="l" colspan="3"><input type="text" class="text" style="width:60px;height:20px;" name="code" /> <img src="<{$app}>/user/code?a" onclick="this.src+='a'" style="vertical-align:middle" /> <font color="#aaaaaa" style="cursor:pointer;" onclick="this.parentNode.getElementsByTagName('img')[0].src+='a'">看不清?</font></td>
                    </tr>
                    <tr>
                        <td colspan="4"><input type="submit" name="btnADD" value="确认添加" style="cursor:hand">
                        　　　　
                        <a href="">取消返回</a></td>
                    </tr>
                    </form>
                </table>
            </div>
        </div>
<script type="text/javascript">
$(function(){
	document.pubinfo.onsubmit=function(){
		
	}
})
</script>
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>