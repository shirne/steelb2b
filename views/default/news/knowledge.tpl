<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;钢材知识</div>
    </div>
    
    <div class="wraper">
    	
        <!--left columns-->
        <div class="left" id="kn_menu">
            <h2>相关知识</h2>
        	<div class="cate">
            	<{$mlist}>
            </div>
        </div>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>钢材知识</span></span>
            </h1>
            <div class="content">
            	 <iframe name="maincontent" id="maincontent" src="<{$app}>/news/shown" frameborder="0"></iframe>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
    <script type="text/javascript">
    $(function(){
		$('#kn_menu div.cate li.dir').click(function(e){
			e.stopPropagation();
			$(this).toggleClass('dirc');
			$(this).children('ul').slideToggle('fast');
			})
		$('#kn_menu div.cate li.art').click(function(e){
			e.stopPropagation();
			})
	})
    </script>
<{include file="public/bottom.tpl"}>