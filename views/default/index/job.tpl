<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>">网站首页</a>&gt;&gt;<a href="<{$app}>/index/supply">供求专版</a>&gt;&gt;人才招聘</div>
    </div>
    
    <div class="wraper">
    	
        <{include file="public/right.tpl"}>
       
        <!--main columns-->
        <div id="main" class="left main" style="width:766px;padding:0;">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>招聘信息</span></span>
            </h1>
            <div class="content">
            	 <table class="job">
                 	<thead>
                    	<tr>
                        	<td>招聘职位</td>
                            <td>人数</td>
                            <td>工作地点</td>
                            <td>学历要求</td>
                            <td>发布公司</td>
                            <td>发布时间</td>
                        </tr>
                    </thead>
                    <tbody>
                 	<{section loop=$list name="ls"}>
                    <tr>
                    	<td><a href="<{$app}>/index/showjob/id/<{$list[ls].id|string_format:"%d"}>" target="_blank"><{$list[ls].job}></a></td>
                        <td><{$list[ls].num}></td>
                        <td><{$list[ls].addr}></td>
                        <td><{$list[ls].edu}></td>
                        <td><{$list[ls].company}></td>
                        <td><{$list[ls].date|date_format:"%Y-%m-%d"}></td>
                    </tr>
                    <{/section}>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="6"><{$fpage}></td>
                        </tr>
                    </tfoot>
                 </table>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>