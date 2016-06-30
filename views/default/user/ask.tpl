<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;申请认证</div>
    </div>
    <div class="wraper">
        <{include file="user/left.tpl"}>
        <style type="text/css">
		#main form{width:700px;margin:0 auto}
		#main form p{padding:5px 0;text-indent:0}
		</style>
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>申请认证</span></span>
            </h1>
            <div class="content">
            	<{if $smarty.session.filt}>
                您已经是认证会员了.
                <{else}>
            	<{if $ask!=""}>您已经提交过申请了，请等待审核!<br />如果需要修改内容,请点击<a href="javascript:document.list.style.display='block'">此处</a><{/if}>
            	<form name="list" method="post" action="<{$app}>/user/doask" <{if $ask!=""}>style="display:none"<{/if}> >
					<p>请填写您请求审核的原因(保持在200个字符以内)：</p>
                    <p><textarea name="ask" style="width:500px;height:100px;"><{$ask}></textarea></p>
                    <p><input type="submit" class="button" value="提交申请" />　　<{if $ask!=""}><font color="#999999" onclick="if(confirm('您确定要取消申请?')){document.list.ask.value='';document.list.submit()}">取消申请</font><{/if}></p>
                </form>
                <{/if}>
            </div>
        </div>
<script type="text/javascript">
$(function(){
	document.list.onsubmit=function(){
		if(this.ask.value.length<5){
			alert('请认真填写申请内容\n否则将不能通过.');
			return false;
		}
	}
})
</script>
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>