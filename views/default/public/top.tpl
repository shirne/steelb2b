<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><{$title}><{if $title}>--<{/if}><{$cfg.sitetitle}></title>
<link type="text/css" rel="stylesheet" href="<{$res}>/style/master.css" />
<link type="text/css" rel="stylesheet" href="<{$res}>/style/<{$css}>.css" />
<script type="text/javascript" charset="gb2312" src="<{$res}>/scripts/jQuery1.42.js"></script>
<script type="text/javascript" src="<{$res}>/scripts/common.js"></script>
<script type="text/javascript">
var blank_img='<{$res}>/images/blank.gif';
$(function(){
	$('#menu .level_1 li').eq(0<{$index}>).addClass('active');
	if(document.toplogin)document.toplogin.onsubmit=function(){
		var u=this.username,p=this.password;
		if(u.value=='' || p.value==''){
			alert('用户名或密码为空,请填写!');
			if(u.value=='')u.focus();
			else p.focus();
			return false;
		}
	}
});
ad.p={title:'',link:'<{$cfg.siteurl}>',type:0,path:'<{$res}>/ad/default.swf'};
<{section loop=$ad name="ad"}>
ad.add('<{$ad[ad].type}>','<{$ad[ad].title}>','<{$ad[ad].link}>','<{$ad[ad].postn}>','<{$public}>/uploads/<{$ad[ad].img}>',0<{$ad[ad].border}>);
<{/section}>
</script>
</head>

<body>
<script type="text/javascript">
if($.browser.msie && ($.browser.version>=6 && $.browser.version<8)){
	document.write('<style type="text/css">html body{width:auto}</style>');
	document.write('<div style="margin:0 auto;position:relative;width:996px;">');
}
<{if ($smarty.get.m == "index" )&&($smarty.get.a == "index")}>
if(ad.c[8]){
	document.write('<div id="top_ad" style="display:none">');
	ad.show(8,0);
	document.write('</div>');
	$(function(){
		$("#top_ad").slideDown();
		setTimeout('$("#top_ad").slideUp("slow")',10000);
	});
}
<{/if}>
</script>
	<div id="top">
    	<div class="right">
        	<a href="<{$app}>" class="h">站点首页</a>
            <a href="<{$app}>/user/register" class="f">会员注册</a>
            <a href="javascript:setFavorite()" class="c">加入收藏</a>
        </div>
    </div>
    
    
    <div id="banner">
        <script type="text/javascript">ad.show(0)</script>
    </div>
	
    
    <div id="menu">
    	<div class="level_1">
        	<ul>
            	<li class="first"><a href="<{$app}>">网站首页</a></li>
                <li><a href="<{$app}>/news/about" target="_blank">市场介绍</a></li>
                <li><a href="<{$app}>/news/service" target="_blank">配套服务</a></li>
                <li><a href="<{$app}>/product" target="_blank">产品查询</a></li>
                <li><a href="<{$app}>/index/supply" target="_blank">供求专版</a></li>
                <li><a href="<{$app}>/index/enterprise" target="_blank">入驻企业</a></li>
                <li><a href="<{$app}>/news/" target="_blank">综合资讯</a></li>
                <li><a href="<{$app}>/news/market" target="_blank">行情快递</a></li>
                <li><a href="<{$app}>/news/knowledge" target="_blank">钢材知识</a></li>
            </ul>
        </div>
        <div class="level_2">
        	<span class="border right"></span>
            <span class="border left"></span>
            <div class="content">
            	<div class="form">
                    <{if $smarty.session.username != ""}>
                    <p class="uinfo">欢迎您: <font color="#2222aa" style="font-weight:bold"><{$smarty.session.username}></font><a href="<{$app}>/user/">会员中心</a><a href="<{$app}>/user/loginout">退出登陆</a></p>
                    <{else}>
                    <form name="toplogin" method="post" action="<{$app}>/user/dologin" target="_self">
                        <strong>会员登录</strong>
                        <label>用户名:<input class="text" type="text" name="username" /></label>
                        <label>密码:<input class="text" type="password" name="password" /></label>
                        <input class="button" type="submit" value="登　录" />
                    </form>
                    <{/if}>
                </div>
            	<div class="notice">
                	<marquee onmouseover="stop()" onmouseout="start()" height="25" width="100%" scrollAmount="2" scrollDelay="10">
                    	<{section loop=$ntc name="notice"}>
                        <a href="<{$ntc[notice].link|default:"javascript:"}>" target="_blank" style="color:red">.<{$ntc[notice].title}>&nbsp;&nbsp;<!--<{$ntc[notice].date|date_format:"%Y-%m-%d"}>--></a>
                        <{/section}>
            		</marquee>
                </div>
            </div>
        </div>
    </div>