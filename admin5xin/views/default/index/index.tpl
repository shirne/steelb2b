<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{padding:0;margin:0;} 
html,body{font-size:12px;/*height:100%*/}
table{border-collapse:collapse;border-spacing:0;font-size:12px} 
fieldset,img,iframe{border:0;}
h1,h2,h3,h4,h5,h6{font-weight:normal;font-size:100%;}
ol,ul,dl{list-style:none;}
input{outline:none}
body{line-height:2em;}
a{text-decoration:none;outline:none}
a:hover{text-decoration:underline}

.left{float:left;display:inline}
.right{float:right;display:inline}
.center{margin:0 auto;width:100%}
.clear{display:block;width:100%;font-size:0px;line-height:0px;height:0px;visibility:hidden;overflow:hidden;clear:both}

html,body{height:100%;overflow:hidden;font-family: 微软雅黑,Arial, Helvetica, sans-serif;background:#fff6ea}
#menu{height:100%;overflow-y:scroll}
#menu ul li *{zoom:1}/*fixed ie6*/
#menu li.mcla{background:#ffa;}
#menu li.mcla span{display:block;line-height:30px;padding-left:30px;border-bottom:1px #999 solid;cursor:pointer;}
#menu li.mcla span.active{background-position:10px -10px}
#menu li.mcla ul{display:none;}
#menu li.mcla li{border-bottom:1px #999 solid;background:#ffd}
#menu li.mcla li a{padding-left:30px;display:block;text-decoration:none;color:#555}
#menu li.mcla li a:hover{color:#333;background:#fff;}

p.right{padding-right:20px;}
p.right a{padding:2px 5px;text-decoration:none;color:#000;text-shadow:#fff 0px 1px 1px;}
</style>
<title>后台管理系统</title>
</head>

<body>
<table height="100%" width="100%">
<tr>
	<td height="40" colspan="2" style="background:url(images/top_bg.png) left top repeat-x">
    	<p class="right"><font color="#999">欢迎您</font>&nbsp;<font color="#aa0000"><{$smarty.session.admin_name}></font>&nbsp;&nbsp;<a href="<{$root}>/index.php">网站主页</a><a href="<{$app}>">管理首页</a><a href="<{$app}>/index/cgpwd" target="main">修改密码</a><a href="javascript:void(main.location.reload())">刷新本页</a><a href="<{$app}>/index/loginout">退出登陆</a></p>
        <a style="font-size:20px;padding-left:20px">珠三角钢材城后台管理系统</a>
    </td>
</tr>
<tr>
	<td width="160" valign="top">
    	<div id="menu">
        	<ul>
            	<li class="mcla"><span>全局配置</span>
                	<ul>
                    	<li><a href="<{$app}>/sys" target="main">网站基本设置</a></li>
                        <li><a href="<{$app}>/index/main" target="main">管理首页</a></li>
                	</ul>
    			</li>
                <li class="mcla"><span>资讯管理</span>
                	<ul>
                        <li><a href="<{$app}>/news" target="main">市场介绍</a></li>
                        <li><a href="<{$app}>/news/index/cid/2" target="main">配套服务</a></li>
                        <li><a href="<{$app}>/news/list1" target="main">综合资讯</a></li>
                        <li><a href="<{$app}>/news/list1/cid/4" target="main">行情快递</a></li>
                        <li><a href="<{$app}>/news/list2" target="main">钢材知识</a></li>
                        <li><a href="<{$app}>/news/cate" target="main">分类管理</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>会员管理</span>
                	<ul>
                        <li><a href="<{$app}>/user" target="main">普通会员管理</a></li>
                        <li><a href="<{$app}>/user/auth" target="main">认证会员管理</a></li>
                        <li><a href="<{$app}>/user/ask" target="main">待认证会员</a></li>
                        <li><a href="<{$app}>/user/add" target="main">添加会员</a></li>
                        <li><a href="<{$app}>/user/spec" target="main">入驻企业</a></li>
                        <li><a href="<{$app}>/user/specadd" target="main">添加企业</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>产品管理</span>
                	<ul>
                        <li><a href="<{$app}>/product" target="main">产品管理</a></li>
                        <li><a href="<{$app}>/product/add" target="main">添加产品</a></li>
                        <li><a href="<{$app}>/product/cate" target="main">产品分类</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>信息管理</span>
                	<ul>
                        <li><a href="<{$app}>/info/index/type/1" target="main">供应信息</a></li>
                        <li><a href="<{$app}>/info" target="main">求购信息</a></li>
                        <li><a href="<{$app}>/info/add" target="main">添加信息</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>招聘管理</span>
                	<ul>
                        <li><a href="<{$app}>/job/add" target="main">添加招聘</a></li>
                        <li><a href="<{$app}>/job" target="main">招聘列表</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>交互管理</span>
                	<ul>
                        <li><a href="<{$app}>/other/mlist" target="main">留言管理</a></li>
                        <li><a href="<{$app}>/other/nlist" target="main">公告管理</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>管理员管理</span>
                	<ul>
                        <li><a href="<{$app}>/manage" target="main">管理员列表</a></li>
                        <li><a href="<{$app}>/manage/#add" target="main">添加管理员</a></li>
                        <li><a href="<{$app}>/manage/datamgr" target="main">数据库管理</a></li>
                    </ul>
                </li>
                <li class="mcla"><span>其它选项</span>
                	<ul>
                        <li><a href="<{$app}>/other" target="main">价格管理</a></li>
                        <li><a href="<{$app}>/other/clist" target="main">钢市管理</a></li>
                        <li><a href="<{$app}>/other/adlist" target="main">广告管理</a></li>
                        <li><a href="<{$app}>/other/alist" target="main">地区管理</a></li>
                        <li><a href="<{$app}>/other/flist" target="main">友情链接</a></li>
                        <li><a href="<{$app}>/other/ulist" target="main">常用链接</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </td>
    <td valign="top" height="100%" ><iframe name="main" id="main" width="100%" height="100%" frameborder="0" src="<{$app}>/index/main"></iframe></td>
</tr>
</table>
<script type="text/javascript">
if(window!=top){top.location=window.location}
window.onload=window.onresize=function(){
	document.getElementById('main').style.height=(document.body.offsetHeight-40)+'px';
	document.getElementById('menu').style.height=(document.body.offsetHeight-40)+'px';
};

function index(o){
	if(!this.length)return
	for(i=0;i<this.length;i++)
		if(this[i]===o)return i;
	return -1;
}

(function initMenu(){
	var temp=document.getElementById('menu').getElementsByTagName('li'),
		bm=[];
	for(var i=0;i<temp.length;i++){
		if(temp[i].className=='mcla')bm.push(temp[i].getElementsByTagName('span')[0])
	}
	for(var i=0;i<bm.length;i++){
		bm[i].onclick=function(){
			if(this.className=='active'){
				this.className='';
				this.parentNode.getElementsByTagName('ul')[0].style.display='none';
			}else{
				this.className='active';
				this.parentNode.getElementsByTagName('ul')[0].style.display='block';
			}
		}
	}
})();
</script>
</body>
</html>
