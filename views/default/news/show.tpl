<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>">网站首页</a>&gt;&gt;<a href="<{$app}>/news/index/cate/<{$fc.id}>"><{$fc.name}></a>&gt;&gt;<{$sc.name}></div>
    </div>
    
    <div class="wraper">
    	
		<{include file="public/right.tpl"}> 
              
        <!--left columns-->
        <div class="left" id="left_column">
        	<div class="menus">
            	<ul>
                	<{section loop=$mcate name="ls"}>
                	<li><a href="<{$app}>/news/index/cate/<{$mcate[ls].id|string_format:"%d"}>"><{$mcate[ls].name}></a></li>
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
            <div class="content<{if !$new.images}> indent<{/if}>" id="new">
            	<h1 class="ttl"><{$new.title}></h1>
                <p class="info">点击:<{$new.hits|string_format:"%d"}>　　发布日期:<{$new.date|date_format:"%Y-%m-%d"}>　　信息来源:<{$new.quote|default:"本站原创"}></p>
                <div>
            	 <{$new.content|htmlspecialchars_decode}>
                 </div>
                 <p class="info"><a href="javascript:window.print()" target="_self">【 打印本页 】</a><a href="javascript:cls()" target="_self">【 关闭窗口 】</a></p>
                 <div>
                 	<span class="right">下一篇: <{if $next}><a href="<{$app}>/news/show/id/<{$next.id|string_format:"%d"}>" target="_self"><{$next.title}></a><{else}>没有了<{/if}></span>
                    <span>上一篇: <{if $prev}><a href="<{$app}>/news/show/id/<{$prev.id|string_format:"%d"}>" target="_self"><{$prev.title}></a><{else}>没有了<{/if}></span>
                 </div>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
<{include file="public/bottom.tpl"}>