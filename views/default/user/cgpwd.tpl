<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;修改密码</div>
    </div>
    <div class="wraper">
<style type="text/css">
/*会员中心*/
#cgpwd{width:300px;margin:40px 100px;}
#cgpwd p{padding:5px 0}
#cgpwd img{vertical-align:middle}
#cgpwd input{vertical-align:middle;outline:none}
#cgpwd input.text{height:20px;line-height:20px;padding:2px 3px;width:160px;border:1px #c8c8c8 solid;background:url(<{$res}>/images/text.png) left top no-repeat;}
#cgpwd input.hlight{border-color:#f60}
</style>
        <{include file="user/left.tpl"}>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>修改密码</span></span>
            </h1>
            <div class="content">
            	<div id="cgpwd">
                <p><{$message}></p>
                <form name="cgpwd" action="<{$app}>/user/docgpwd" method="post">
                <p><label>旧　密　码: <input type="password" class="text" name="opassword" /></label></p>
                <p><label>新　密　码: <input type="password" class="text" name="password" /></label></p>
                <p><label>确认新密码: <input type="password" class="text" name="repassword" /></label></p>
                <p>　　　　　<input type="submit" value="确认修改" class="button"/></p>
                </form>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(function(){
	document.cgpwd.onsubmit=function(){
		var es=this.elements;
		for(var i=0;i<es.length;i++){
			if(es[i].type=='password' && es[i].value==''){
				es[i].focus();
				alert("请填写完整!");
				$(es[i]).addClass('hlight').blur(function(){if(this.value!='' && (this.name!='repassword' || this.value==this.form.password.value))$(this).removeClass('hlight')});
				return false;
			}
		}
		
		if(this.password.value.length<5){
			this.repassword.focus();
			alert("请使用复杂些的密码,以保障您的帐号安全!");
			$(this.repassword).addClass('hlight').blur(function(){if(this.value.length>=5)$(this).removeClass('hlight')});
			return false;
		}
		
		if(this.password.value!=this.repassword.value){
			this.repassword.focus();
			alert("两次密码输入不一致!");
			$(this.repassword).addClass('hlight').blur(function(){if(this.value!='' && this.value==this.form.password.value)$(this).removeClass('hlight')});
			return false;
		}
	}
})
</script>
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>