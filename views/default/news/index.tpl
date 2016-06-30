<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/news/">综合资讯</a>&gt;&gt;<{$sc.name}></div>
    </div>
    
    <div class="wraper">
    	
        <{include file="public/right.tpl"}>
        
        <!--left columns-->
        <div class="left" id="left_column">
        	<div class="menus">
            	<ul>
                	<{section loop=$mcate name="mc"}>
                	<li><a href="<{$app}>/news/index/cate/<{$mcate[mc].id}>"><{$mcate[mc].name}></a></li>
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
            	<span class="title left"><span><{$sc.name}></span></span>
            </h1>
            <div class="content">
            	 <ul class="list">
                 	<{section loop=$list name="ls"}>
                 	<li><span class="right"><{$list[ls].date|date_format:"%Y/%m/%d"}></span><a href="<{$app}>/news/show/id/<{$list[ls].id|string_format:"%d"}>" target="_blank"><{$list[ls].title}></a></li>
                    <{sectionelse}>
                    <li>内容更新中,请稍候关注...</li>
                    <{/section}>
                 </ul>
                 <div class="page"><{$fpage}></div>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
<{include file="public/bottom.tpl"}>