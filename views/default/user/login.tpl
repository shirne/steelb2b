<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;会员登录</div>
    </div>
    <div class="wraper">
<style type="text/css">
/*会员中心*/
#login{width:300px;margin:40px 100px;padding-left:160px;background:url(<{$res}>/images/login.jpg) 20px center no-repeat}
#login p{padding:5px 0}
#login img{vertical-align:middle}
#login input{vertical-align:middle;outline:none}
#login input.text{height:20px;line-height:20px;padding:2px 3px;width:160px;border:1px #c8c8c8 solid;background:url(<{$res}>/images/text.png) left top no-repeat;}
		</style>
        <{include file="user/left.tpl"}>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>会员登录</span></span>
            </h1>
            <div class="content">
            	<div id="login">
                <p><{$message}></p>
                <form action="<{$app}>/user/dologin" method="post" target="_self">
                <p><label>用户名: <input type="text" class="text" name="username" /></label></p>
                <p><label>密　码: <input type="password" class="text" name="password" /></label></p>
                <p>　　　 <label><input type="checkbox" name="auto" value="1" onclick="var ft=this.parentNode.parentNode.getElementsByTagName('font')[0];if(this.checked)ft.color='#ff2222';else ft.color='#aaaaaa';" /> 自动登录</label><font color="#aaaaaa">(公共电脑请慎选此项)</font></p>
                <p>　　　 <input type="submit" value="登录" class="button"/>　　<a href="<{$app}>/user/register">免费注册会员</a></p>
                </form>
                </div>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>