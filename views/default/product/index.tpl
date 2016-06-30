<{include file="public/top.tpl"}>
    <div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;产品查询</div>
    </div>
    
    <div class="wraper">
		<div id="category" class="main">
        	<h1 class="title">
                <span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>资源搜索</span></span>
            </h1>
            <div class="content">
                <table class="category">
                    <tbody>
                        <{section loop=$pcat name="pc"}>
                        <{if ($smarty.section.pc.index mod 8) == 0}><tr><{/if}>
                            <td><a href="<{$app}>/product/search/sid/<{$pcat[pc].id}>"><{$pcat[pc].name|truncate:14}></a></td>
                        <{if ($smarty.section.pc.index mod 8) == 7}></tr><{/if}>
                        <{/section}>
                    </tbody>
                </table>
                <form name="product" id="searchProduct" action="<{$app}>/product/search" method="get" >
                	<table class="category">
                    	<tr>
                        	<td><label for="class">类　　别:</label></td>
                            <td>
                            	<select name="class" onchange="getmodel('<{$app}>/index/getcate','product','model',this)" class="w1">
                            		<option value="">不限类别</option>
                                    <{section loop=$fcate name="pfc"}>
                                	<option value="<{$fcate[pfc].name}>" uid="<{$fcate[pfc].id}>" <{if $fcate[pfc].name == $fc.name}>selected="selected"<{/if}> ><{$fcate[pfc].name}></option>
                                    <{/section}>
                                </select>
                            </td>
                            <td><label for="model">品　　种:</label></td>
                            <td>
                                <select name="model" class="w1">
                                	<option value="">不限品种</option>
                                	<{section loop=$scate name="psc"}>
                                	<option value="<{$scate[psc].name}>" <{if $scate[psc].name == $sc.name}>selected="selected"<{/if}> ><{$scate[psc].name}></option>
                                    <{/section}>
                                </select>
                            </td>
                            <td><label for="name">品　　名:</label></td>
                            <td><input type="text" name="name" class="w1" value="<{$smarty.get.name}>" /></td>
                        	<td><label for="material">材　　质:</label></td>
                            <td><input type="text" name="material" class="w1" value="<{$smarty.get.material}>" /></td>
                            <td rowspan="2">
                            	<input type="submit" value="搜 索" class="button" />
                            </td>
                    	</tr>
                        <tr>
                    		<td><label for="fact">生产厂家:</label></td>
                            <td><input type="text" name="fact" class="w2" value="<{$smarty.get.fact}>" /></td>
                        	<td><label for="addr">交货点地:</label></td>
                            <td><input type="text" name="addr" class="w2" value="<{$smarty.get.addr}>" /></td>
                        	<td><label for="spec">规　　格:</label></td>
                            <td><input type="text" name="spec" class="w1" value="<{$smarty.get.spec}>" /></td>
                        	<td><label for="order">排　　序:</label></td>
                            <td>
                            	<select name="order">
                                    <option value="date" <{if $smarty.get.order=="date"}>selected="selected"<{/if}> >时间</option>
                                    <option value="model" <{if $smarty.get.order=="model"}>selected="selected"<{/if}> >规格</option>
                                    <option value="price" <{if $smarty.get.order=="price"}>selected="selected"<{/if}> >价格</option>
                                </select>
                                <label><input type="radio" name="ordertype" value="0" <{if $smarty.get.ordertype==0}>checked="checked"<{/if}> /> 升序</label>
                                <label><input type="radio" name="ordertype" value="1" <{if $smarty.get.ordertype==1}>checked="checked"<{/if}> /> 降序</label>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="wraper">
        <table class="list">
        <thead>
            <tr>
                <td colspan="9">产品搜索结果</td>
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
                <td><{$list[ls].price}> <font color="#aaaaaa">(批发价:<{if $smarty.session.filt}><font color="green"><{$list[ls].vprice}></font><{else}>认证会员可见<{/if}>)</font></td>
                <td><{$list[ls].num}></td>
                <td><a href="<{$app}>/product/company/id/<{$list[ls].comid}>" target="_blank"><{$list[ls].company}></a></td>
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
        </div>
        <!--clear float-->
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    $(function(){
		
	})
    </script>
<{include file="public/bottom.tpl"}>