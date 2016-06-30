		<!--left columns-->
<style type="text/css">
#left_column li p{background:#eee;border-bottom:1px #fff dashed}
#left_column li p a{}
</style>
        <div class="left" id="left_column">
        	<div class="cate">
            	<ul>
                	<li class="cat">
                    	<a href="javascript:" class="cat">会员中心</a>
                        <p><a href="<{$app}>/user/">会员首页</a></p>
                    	<p><a href="<{$app}>/user/userdata">修改资料</a></p>
                        <p><a href="<{$app}>/user/cgpwd">修改密码</a></p>
                        <p><a href="<{$app}>/user/loginout" onclick="if(!confirm('您确定要退出?'))return false;">退出登录</a></p>
                    </li>
                    <li class="cat">
                    	<a href="javascript:" class="cat">商务中心</a>
                    	<p><a href="<{$app}>/user/pubinfo">发布信息</a></p>
                        <p><a href="<{$app}>/user/infomgr">信息管理</a></p>
                        <p><a href="<{$app}>/user/ask">申请认证</a></p>
                        <p><a href="<{$app}>/user/feed">留言反馈</a></p>
                    </li>
                </ul>
            </div>
        </div>