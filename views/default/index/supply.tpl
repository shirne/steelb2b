<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;供求信息</div>
    </div>
    
    <div class="wraper">
    	
        <!--right columns-->
    	<div class="right" id="right_column">

            <div class="column" id="supply">
            	<h3>
                	<span class="right"></span>
                    <span class="title">最新供求</span>
                </h3>
                <div class="content">
                	<ul>
                    	<{section loop=$nlist name="nls"}>
                    	<li><a href="<{$app}>/index/user/id/<{$nlist[nls].userid}>"><{$nlist[nls].company|truncate:12}>&nbsp;&nbsp;<{if $nlist[nls].type}><span class="orange">[供应-<{$nlist[nls].title|truncate:8}>]</span><{else}><span class="green">[求购-<{$nlist[nls].title|truncate:8}>]</span><{/if}></a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
            <div class="column" id="logist">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/news/index/cate/9" class="right">更多...</a>
                    <span class="title">物流信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<{section loop=$logist name="lsg"}>
                    	<li><a href="<{$app}>/news/show/id/<{$logist[lsg].id|string_format:"%d"}>"><{$logist[lsg].title|truncate:26}></a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
            <div class="column" id="newjoin">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/job" class="right">更多...</a>
                    <span class="title">招聘信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<{section loop=$job name="jb"}>
                    	<li><a href="<{$app}>/index/showjob/id/<{$job[jb].id|string_format:"%d"}>"><{$job[jb].company|truncate:18}>&nbsp;&nbsp;[<{$job[jb].job|truncate:8}>]</a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
        </div>
        
        <!--left columns-->
        <div class="left" id="left_column">
        	<div class="cate">
            	<ul>
                	<{section loop=$pc name="f"}>
                    <li class="cat">
                    	<a href="javascript:" class="cat"><{$pc[f].name}></a>
                    	<div>
                        	<{section loop=$pc[f].sub name="s"}>
                            <a href="<{$app}>/product/search/sid/<{$pc[f].sub[s].id}>"><{$pc[f].sub[s].name}></a>
                            <{/section}>
                        </div>
                    </li>
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
            	<span class="title left"><span>供求专版</span></span>
            </h1>
            <div class="content">
            	 <ul class="list">
                 	<{section loop=$list name=ls}>
                 	<li><span class="right"><{$list[ls].date|date_format:"%Y/%m/%d"}></span><{if $list[ls].top}><span class="red">[置顶]</span><{/if}><a href="<{$app}>/index/user/id/<{$list[ls].userid}>"><{$list[ls].company}>&nbsp;&nbsp;<{if $list[ls].type}><span class="orange">[供应-<{$list[ls].title}>]</span><{else}><span class="green">[求购-<{$list[ls].title}>]</span><{/if}></a></li>
                    <{/section}>
                 </ul>
                 <div class="page"><{$fpage}></div>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
    <script type="text/javascript">
    $(function(){
		
	})
    </script>
<{include file="public/bottom.tpl"}>