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
                 	<caption><{$job.company}>招聘信息</caption>
                    <tbody>
                    	<tr>
                        	<td width="80">职位名称</td>
                            <td class="l"><{$job.job}></td>
                        </tr>
                        <tr>
                        	<td>需求人数</td>
                            <td class="l"><{$job.num}></td>
                        </tr>
                        <tr>
                        	<td>工作地点</td>
                            <td class="l"><{$job.addr}></td>
                        </tr>
                        <tr>
                        	<td>薪资待遇</td>
                            <td class="l"><{$job.pay}></td>
                        </tr>
                        <tr>
                        	<td>发布日期</td>
                            <td class="l"><{$job.date|date_format:"%Y-%m-%d"}></td>
                        </tr>
                        <tr>
                        	<td>有效日期</td>
                            <td class="l"><{$job.vdate|date_format:"%Y-%m-%d"|default:"长期有效"}></td>
                        </tr>
                        <tr>
                        	<td>工作经验要求</td>
                            <td class="l"><{$job.years}></td>
                        </tr>
                        <tr>
                        	<td>学历要求</td>
                            <td class="l"><{$job.edu}></td>
                        </tr>
                        <tr>
                        	<td>岗位要求</td>
                            <td class="l"><pre><{$job.content}></pre></td>
                        </tr>
                        <tr>
                        	<td>联系人</td>
                            <td class="l"><{$job.contact}></td>
                        </tr>
                        <tr>
                        	<td>联系电话</td>
                            <td class="l"><{$job.tele}></td>
                        </tr>
                        <tr>
                        	<td>联系邮箱</td>
                            <td class="l"><{$job.email}></td>
                        </tr>
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="2"><a href="<{$app}>/index/job">返回列表</a></td>
                        </tr>
                    </tfoot>
                 </table>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>