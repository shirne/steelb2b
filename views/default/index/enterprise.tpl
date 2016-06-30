<{include file="public/top.tpl"}>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>">网站首页</a>&gt;&gt;入驻企业</div>
    </div>
    
    <div class="wraper">
    	
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
        </div>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>入驻企业</span></span>
            </h1>
            <div class="content">
            	 <form name="search" method="get" action="<{$app}>/index/enterprise">
                 <table>
                 	<tr>
                        <td style="padding:5px 0">
                        	<font color="#0000FF" >检索:</font>
                        	企业名称:<input type="text" name="company" value="<{$smarty.get.company}>" />
                            经营项目:<input type="text" name="business" value="<{$smarty.get.business}>" />
                            联系人:<input type="text" name="contact" value="<{$smarty.get.contact}>" />
                            <select name="type">
                            	<option value="">全部企业</option>
                                <option value="1" <{if $smarty.get.type}>selected="selected"<{/if}>>诚信企业</option>
                            </select>
                            <input type="submit" value="搜 索" class="button" />
                        </td>
                    </tr>
                 </table>
                 </form>
                 <table>
                 	<thead>
                    	<tr>
                        	<td width="200">公司全称</td>
                            <td width="80">公司简称</td>
                            <td width="80">经营地址</td>
                            <td>经营项目</td>
                            <td width="60">联系人</td>
                            <td width="100">联系电话</td>
                            <td width="100">手机</td>
                            <td width="40">详情</td>
                        </tr>
                    </thead>
                    <tbody>
                    	<{section loop=$list name="ls"}>
                    	<tr>
                        	<td><a href="<{$app}>/product/company/id/<{$list[ls].id}>"><{$list[ls].company}></a><{if $list[ls].inte}><a href="<{$app}>/index/enterprise/type/1" class="green">[诚信]</a><{/if}></td>
                            <td><{$list[ls].scompany}></td>
                            <td><{$list[ls].addr}></td>
                            <td><{$list[ls].business}></td>
                            <td><{$list[ls].contact}></td>
                            <td><{$list[ls].tele}></td>
                            <td><{$list[ls].mobile}></td>
                            <td><a href="<{$app}>/product/company/id/<{$list[ls].id}>">查看</a></td>
                        </tr>
                        <{/section}>
                    </tbody>
                 </table>
                 <tfoot>
                 	<tr>
                 	<td colspan="8"><div class="page"><{$fpage}></div></td>
                 	</tr>
                 </tfoot>
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