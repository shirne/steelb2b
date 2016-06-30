<{include file="public/top.tpl"}>
    <div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/product">产品查询</a>&gt;&gt;企业产品列表</div>
    </div>
    
    <div class="wraper">
        <div class="wraper">
        <table class="list">
        <thead>
            <tr>
                <td colspan="9"><{$com.company}>产品列表</td>
            </tr>
            <tr>
                <td>品名</td>
                <td>材质</td>
                <td>规格</td>
                <td>价格</td>
                <td>吨数</td>
                <td>公司名称</td>
                <td>联系人</td>
                <td>电话</td>
                <td>发布时间</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$list name="ls"}>
            <tr>
                <td><{$list[ls].title}></td>
                <td><{$list[ls].materials}></td>
                <td><{$list[ls].model}></td>
                <td><{$list[ls].price}></td>
                <td><{$list[ls].num}></td>
                <td><{$list[ls].company}></td>
                <td><{$list[ls].contact}></td>
                <td><{$list[ls].tele}></td>
                <td><{$list[ls].date}></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="9" height="24"><{$fpage}></td>
            </tr>
        </tfoot>
        </table>
        <table class="info">
        	<caption><{$com.company}></caption>
            <tr>
            	<td width="10%">公司名称(中文)</td>
                <td width="40%"><{$com.company}></td>
                <td width="10%">公司名称(英文)</td>
                <td width="40%"><{$com.ecompany}></td>
            </tr>
            <tr>
            	<td>所在地区</td>
                <td><{$com.prov}><{$com.city}><{$com.area}></td>
                <td>所属钢市</td>
                <td><{$com.scity}></td>
            </tr>
            <tr>
            	<td>联系人</td>
                <td><{$com.contact}></td>
                <td>联系电话</td>
                <td><{$com.tele}></td>
            </tr>
            <tr>
            	<td>传真</td>
                <td><{$com.fax}></td>
                <td>手机</td>
                <td><{$com.mobile}></td>
            </tr>
            <tr>
            	<td>邮箱</td>
                <td><{$com.email}></td>
                <td>公司网址</td>
                <td><{$com.url}></td>
            </tr>
            <tr>
            	<td>详细地址</td>
                <td colspan="3"><{$com.addr}>&nbsp;<{if $com.zcode}>邮编:<{$com.zcode}><{/if}></td>
            </tr>
            <tr>
            	<td>经营项目</td>
                <td colspan="3"><{$com.business}></td>
            </tr>
            <tr>
            	<td>公司简介</td>
                <td colspan="3"><{$com.content}></td>
            </tr>
        </table>
        </div>
        <!--clear float-->
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    $(function(){
		
	})
    </script>
<{include file="public/bottom.tpl"}>