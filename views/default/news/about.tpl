<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>">网站首页</a>&gt;&gt;<a href="<{$app}>/news/about">市场介绍</a>&gt;&gt;<{$cont.title}></div>
    </div>
    
    <div class="wraper">
    	
        <{include file="public/right.tpl"}>
        
        <!--left columns-->
        <div class="left" id="left_column">
        	<div class="menus">
            	<ul>
                	<{section loop=$list name="ls"}>
                	<li><a href="<{$app}>/news/about/id/<{$list[ls].id|string_format:"%d"}>"><{$list[ls].title}></a></li>
                    <{/section}>
                </ul>
            </div>
            <!--广告
            <script type="text/javascript">
			for(var i=1;i<9;i++){
            	document.write('<div class="ad1">');
            	document.write(swf(130,35,{path:'<{$res}>/ad\/r'+i+'.swf'}))
            	document.write('</div>');
			}
			</script>
            广告 END-->
        </div>
        
        <!--main columns-->
        <div id="main" class="left main">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span><{$cont.title}></span></span>
            </h1>
            <div class="content">
            	 <{$cont.content|htmlspecialchars_decode}>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
<{include file="public/bottom.tpl"}>