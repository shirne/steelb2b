<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;用户反馈</div>
    </div>
    <div class="wraper">
        <{include file="user/left.tpl"}>
        <style type="text/css">
		#main form{width:700px;margin:0 auto;margin-top:20px;}
		#main form p{padding:5px 0;text-indent:0}
		</style>
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>用户反馈</span></span>
            </h1>
            <div class="content">
            	<{section loop=$list name="ls"}>
            	<table style="margin:0 auto;margin-top:10px;width:700px">
                	<tr>
                    	<td>标题</td>
                        <td><{$list[ls].name}></td>
                        <td>类型</td>
                        <td><{$list[ls].type}></td>
                        <td>日期</td>
                        <td><{$list[ls].date|date_format:"%Y/%m/%d"}></td>
                    </tr>
                    <tr>
                    	<td>内容</td>
                        <td colspan="5"><{$list[ls].content}></td>
                    </tr>
                    <{if $replay!=""}>
                    <tr>
                    	<td>回复人</td>
                        <td><{$list[ls].replay}></td>
                        <td>回复日期</td>
                        <td><{$list[ls].redate|date_format:"%Y/%m/%d"}></td>
                    </tr>
                    <tr>
                    	<td>内容</td>
                        <td colspan="5"><{$list[ls].recont}></td>
                    </tr>
                    <{else}>
                    <tr>
                        <td colspan="6">还没有回复</td>
                    </tr>
                    <{/if}>
                </table>
                <{sectionelse}>
                <p style="margin:10px auto;width:700px">您暂时还没有提交任何反馈.<br />如果您对本站或本公司有任何意见或建议，都请在下面反馈给我们，<br />我们将参考您的反馈进行改进!</p>
                <{/section}>
                <div class="page"><{$fpage}></div>
            	<form name="feed" method="post" action="<{$app}>/user/dofeed">
					<p><label>标　题: <input type="text" name="name" size="20"></label></p>
                    <p><label>类　型: <select name="type">
                    	<option value="建议">建议</option>
                        <option value="意见">意见</option>
                        <option value="使用问题">使用问题</option>
                        <option value="其它">其它</option>
                    </select></label></p>
                    <p><label>内　容: <textarea name="content" style="width:600px;height:100px;vertical-align:top"></textarea></label></p>
                    <p><label>验证码: <input type="text" class="text" style="width:60px;height:20px;" name="code" /></label> <img src="<{$app}>/user/code?a" onclick="this.src+='a'" style="vertical-align:middle" /> <font color="#aaaaaa" style="cursor:pointer;" onclick="this.parentNode.getElementsByTagName('img')[0].src+='a'">看不清?</font></p>
                    <p>　　　　<input type="submit" class="button" value="确认提交" /></p>
                </form>
            </div>
        </div>
<script type="text/javascript">
$(function(){
	document.feed.onsubmit=function(){
		if(feed.name.value==''){
			alert('请填写反馈标题');
			return false;
		}
		
		if(feed.content.value.length<5){
			alert('请认真填写反馈内容');
			return false;
		}
		
		if(!confirm('提交以后将不能再修改\n确认提交?'))
			return false;
	}
})
</script>
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>