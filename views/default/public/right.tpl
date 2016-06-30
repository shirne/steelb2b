<!--right columns-->
    	<div class="right" id="right_column">
            <div class="column" id="price">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/prodpce" class="right" target="_blank">详细...</a>
                    <span class="title">今日报价</span>
                </h3>
                <div class="content">
                	<p class="title">珠三角钢材城报价</p>
                    <table width="100%">
                    	<thead>
                        	<tr>
                            	<td>品　名</td>
                                <td>规　格</td>
                                <td>价　格</td>
                            </tr>
                        </thead>
                        <tbody>
                        	<{section loop=$price name=prc}>
                        	<tr>
                            	<td><{$price[prc].name}></td>
                                <td><{$price[prc].model}></td>
                                <td><{$price[prc].price}></td>
                            </tr>
                            <{/section}>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="column" id="newjoin">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/enterprise" class="right" target="_blank">查看...</a>
                    <span class="title">推荐企业</span>
                </h3>
                <div class="content">
                	<div>
                	<ul>
                    	<{section loop=$enterhot name="eh"}>
                        <li><a href="<{$app}>/product/company/id/<{$enterhot[eh].id}>" target="_blank"><{$enterhot[eh].company|truncate:36}></a></li>
                        <{/section}>
                    </ul>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
			$(function(){
				scrollTable($('#price table'),24,10);
				scrollLi($('#newjoin .content div'),24,10);
			})
			</script>
        </div>