<{include file="public/top.tpl"}>
    <div class="wraper">
    	
        <!--right columns-->
    	<div class="right" id="right_column">
        	<div class="column" id="map">
            	<h3>
                	<span class="right"></span>
                    <span class="title">行情地图</span>
                </h3>
                <div class="content">
                	<a href="<{$app}>/index/price" target="_blank"><img src="<{$res}>/images/map.gif" width="228" height="195" alt="" /></a>
                </div>
            </div>
            
            <div class="ad">
            	<script type="text/javascript">
				ad.show(5,0);
				</script>
            </div>
            
            <div class="column">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/enterprise/type/1" class="right" target="_blank">更多...</a>
                    <span class="title">诚信企业</span>
                </h3>
                <div class="content">
                	<div id="enti">
                	<ul>
                    	<{section loop=$enterhot name="eh"}>
                        <li><a href="<{$app}>/product/company/id/<{$enterhot[eh].id}>" target="_blank"><{$enterhot[eh].company|truncate:36}></a></li>
                        <{/section}>
                    </ul>
                    </div>
                </div>
            </div>
            
            <div class="ad">
            	<script type="text/javascript">
				ad.show(5,1);
				</script>
            </div>
            
            <div class="column" id="quot">
            	<h3>
                	<span class="right"></span>
                    <span class="title">钢材行情</span>
                </h3>
                <div class="content">
                	<table width="100%">
                    	<thead>
                        	<tr>
                            	<td width="30%">交货期</td>
                                <td width="25%">最新价</td>
                                <td width="20%">涨跌幅</td>
                                <td width="30%">成交量</td>
                            </tr>
                        </thead>
                        <{$dig}>
                    </table>
                </div>
            </div>
            
            
            <!--广告-->
            <div class="ad">
            	<script type="text/javascript">
				ad.show(5,2);
				</script>
            </div>
            
            <!--广告 END-->
            
            <div class="column" id="job">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/job" class="right" target="_blank">更多...</a>
                    <span class="title">招聘信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<{section loop=$job name="jb"}>
                    	<li><a href="<{$app}>/index/showjob/id/<{$job[jb].id|string_format:"%d"}>" target="_blank"><{$job[jb].company|truncate:16}>&nbsp;&nbsp;[<{$job[jb].job|truncate:10}>]</a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
        </div>
        
        <!--left columns-->
        <div class="left" id="left_column">
        	<div class="column" id="news">
            	<h3>
                	<span class="right"></span>
                    <span class="title">新闻图片</span>
                </h3>
                <div class="content">
                	<script type="text/javascript">document.write(sosofocus({width:228,height:195,path:'<{$res}>/images/focus.swf',imgs:'<{$pic.pic}>',links:'<{$pic.url}>',txts:'<{$pic.txt}>'}))</script>
                </div>
            </div>
            
            <div class="ad">
            	<script type="text/javascript">
				ad.show(4,0);
				</script>
            </div>
            
            <div class="column" id="newjoin">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/enterprise" class="right" target="_blank">查看...</a>
                    <span class="title">最新加盟</span>
                </h3>
                <div class="content">
                	<div id="newjoinlist">
                	<ul>
                    	<{section loop=$enternew name="en"}>
                        <li><a href="<{$app}>/product/company/id/<{$enternew[en].id}>" target="_blank"><{$enternew[en].company|truncate:36}></a></li>
                        <{/section}>
                    </ul>
                    </div>
                </div>
            </div>
            
            <div class="ad">
            	<script type="text/javascript">
				ad.show(4,1);
				</script>
            </div>
            
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
            
            <!--广告-->
            
            <div class="ad">
            	<script type="text/javascript">
				ad.show(4,2);
				</script>
            </div>
            
            <!--广告 END-->
            
            <div class="column" id="logist">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/news/index/cate/9" class="right" target="_blank">更多...</a>
                    <span class="title">物流信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<{section loop=$logist name="lg"}>
                    	<li><a href="<{$app}>/news/show/id/<{$logist[lg].id|string_format:"%d"}>" target="_blank"><{$logist[lg].title|truncate:30}></a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
            
            
        </div>
        
        <!--main columns-->
        <div id="main" class="left">
        	<div id="tabcolumn">
            	<h2>
                	<ul>
                    	<{section loop=$cate name="c"}>
                    	<li <{if $smarty.section.c.index == 0}>class="active"<{/if}>><a href="javascript:" ><{$cate[c].name}></a></li>
                        <{/section}>
                    </ul>
                </h2>
                <div class="content">
                	<ul>
                    	<li class="content active">
                        	<ul>
                            	<{section loop=$news1 name="n1"}>
                            	<li><span class="right"><{$news1[n1].date|date_format:"%Y/%m/%d"}></span><a href="<{$app}>/news/show/id/<{$news1[n1].id|string_format:"%d"}>" target="_blank"><{$news1[n1].title}></a></li>
                                <{/section}>
                                <li class="more"><a class="right" href="<{$app}>/news/index/cate/<{$cate[0].id}>" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<{section loop=$news2 name="n2"}>
                                <li><span class="right"><{$news2[n2].date|date_format:"%Y/%m/%d"}></span><a href="<{$app}>/news/show/id/<{$news2[n2].id|string_format:"%d"}>" target="_blank"><{$news2[n2].title}></a></li>
                                <{/section}>
                                <li class="more"><a class="right" href="<{$app}>/news/index/cate/<{$cate[1].id}>" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<{section loop=$news3 name="n3"}>
                            	<li><span class="right"><{$news3[n3].date|date_format:"%Y/%m/%d"}></span><a href="<{$app}>/news/show/id/<{$news3[n3].id|string_format:"%d"}>" target="_blank"><{$news3[n3].title}></a></li>
                                <{/section}>
                                <li class="more"><a class="right" href="<{$app}>/news/index/cate/<{$cate[2].id}>" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<{section loop=$news4 name="n4"}>
                            	<li><span class="right"><{$news4[n4].date|date_format:"%Y/%m/%d"}></span><a href="<{$app}>/news/show/id/<{$news4[n4].id|string_format:"%d"}>" target="_blank"><{$news4[n4].title}></a></li>
                                <{/section}>
                                <li class="more"><a class="right" href="<{$app}>/news/index/cate/<{$cate[3].id}>" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!--广告-->
            <div class="ad1">
            	<script type="text/javascript">
				ad.show(1);
				</script>
            </div>
            <!--广告 END-->
            
            <div class="column" id="resource">
            	<h3>
                	<span class="right"></span>
                    <span class="title">资源中心</span>
                </h3>
                <div class="content">
                    <table style="width:496px">
                        <tbody>
                            <{section loop=$pcat name="pc"}>
                            <{if ($smarty.section.pc.index mod 8) == 0}><tr><{/if}>
                                <td><a href="<{$app}>/product/search/sid/<{$pcat[pc].id}>" target="_blank"><{$pcat[pc].name|truncate:8}></a></td>
                            <{if ($smarty.section.pc.index mod 8) == 7}></tr><{/if}>
                            <{/section}>
                        </tbody>
                    </table>
                    <form name="product" id="searchProduct" action="<{$app}>/product/search" method="get" target="_blank">
                    	<div>
                        	<label>类别:<select name="class" onchange="getmodel('<{$app}>/index/getcate','product','model',this)" class="w1">
                            		<option value="">不限类别</option>
                                    <{section loop=$fcate name="pfc"}>
                                	<option value="<{$fcate[pfc].name}>" uid="<{$fcate[pfc].id}>" ><{$fcate[pfc].name}></option>
                                    <{/section}>
                                </select>
                            </label>
                            <label>品种:<select name="model" class="w1">
                                	<option value="">不限品种</option>
                                </select>
                            </label>
                            <label>品名:<input type="text" name="name" class="w1" /></label>
                            <label>材质:<input type="text" name="material" class="w1" /></label>
                        </div>
                        <div>
                        	<label>厂家:<input type="text" name="fact" class="w2" /></label>
                            <label>交货地:<input type="text" name="addr" class="w2" /></label>
                            <label>规格:<input type="text" name="spec" class="w1" /></label>
                            <label>排序:<select name="order">
                                	<option value="date">时间</option>
                                    <option value="price">价格</option>
                                    <option value="model">规格</option>
                                </select>
                            </label>
                            <input type="submit" value="搜索" />
                        </div>
                    </form>
                </div>
            </div>
            
            <!--广告-->
            <div class="ad1">
            	<script type="text/javascript">
				ad.show(2);
				</script>
            </div>
            <!--广告 END-->
            
            <div class="column" id="supply">
            	<h3>
                	<span class="right"></span>
                    <a href="<{$app}>/index/supply" class="right" target="_blank">更多...</a>
                    <span class="title">供求信息</span>
                </h3>
                <div class="content">
                	<ul class="right">
                    	<{section loop=$infob name="ib"}>
                    	<li><a href="<{$app}>/index/supply/type/0" class="class" target="_blank">[求购]</a><a href="<{$app}>/index/user/id/<{$infob[ib].userid}>" target="_blank"><{$infob[ib].title|truncate:24:"..."}>&nbsp;&nbsp;<{$infob[ib].price}></a></li>
                        <{/section}>
                    </ul>
                    <ul>
                    	<{section loop=$infoa name="ia"}>
                    	<li><a href="<{$app}>/index/supply/type/1" class="class" target="_blank">[供应]</a><a href="<{$app}>/index/user/id/<{$infoa[ia].userid}>" target="_blank"><{$infoa[ia].title|truncate:24:"..."}>&nbsp;&nbsp;<{$infoa[ia].price}></a></li>
                        <{/section}>
                    </ul>
                </div>
            </div>
            
            <!--广告-->
            <div class="ad1">
            	<script type="text/javascript">
				ad.show(3);
				</script>
            </div>
            <!--广告 END-->
            
            <div class="column" id="link">
            	<table>
                    <tr>
                        <td width="80" class="cate">钢铁</td>
                        <td width="206">
                        	<{section loop=$olink.gt name="olk" max=3 }>
                            <a href="<{$olink.gt[olk].url}>" target="_blank"><{$olink.gt[olk].title}></a>
                            <{if $smarty.section.olk.index<2}>|<{/if}>
                            <{/section}>
                        </td>
                        <td width="80" class="cate">搜索</td>
                        <td width="206">
                            <{section loop=$olink.ss name="olk" max=3 }>
                            <a href="<{$olink.ss[olk].url}>" target="_blank"><{$olink.ss[olk].title}></a>
                            <{if $smarty.section.olk.index<2}>|<{/if}>
                            <{/section}>
                        </td>
                    </tr>
                    <tr>
                        <td class="cate">天气</td>
                        <td>
                            <{section loop=$olink.tq name="olk" max=3 }>
                            <a href="<{$olink.tq[olk].url}>" target="_blank"><{$olink.tq[olk].title}></a>
                            <{if $smarty.section.olk.index<2}>|<{/if}>
                            <{/section}>
                        </td>
                        <td class="cate">时间</td>
                        <td>
                        	<{section loop=$olink.sj name="olk" max=3 }>
                            <a href="<{$olink.sj[olk].url}>" target="_blank"><{$olink.sj[olk].title}></a>
                            <{if $smarty.section.olk.index<2}>|<{/if}>
                            <{/section}>
                        </td>
                    </tr>
                    <tr>
                        <td class="cate">交通</td>
                        <td colspan="3"><{section loop=$olink.jt name="olk" max=7 }>
                            <a href="<{$olink.jt[olk].url}>" target="_blank"><{$olink.jt[olk].title}></a>
                            <{if $smarty.section.olk.index<6}>|<{/if}>
                            <{/section}></td>
                    </tr>
                    <tr>
                        <td class="cate">银行</td>
                        <td colspan="3"><{section loop=$olink.yh name="olk" max=7 }>
                            <a href="<{$olink.yh[olk].url}>" target="_blank"><{$olink.yh[olk].title}></a>
                            <{if $smarty.section.olk.index<6}>|<{/if}>
                            <{/section}></td>
                    </tr>
                    <tr>
                        <td class="cate">其他</td>
                        <td colspan="3"><{section loop=$olink.qt name="olk" max=7 }>
                            <a href="<{$olink.qt[olk].url}>" target="_blank"><{$olink.qt[olk].title}></a>
                            <{if $smarty.section.olk.index<6}>|<{/if}>
                            <{/section}></td>
                    </tr>
                </table>
            </div>
            
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    $(function(){
		clickTab($('#tabcolumn h2 ul li'),$('#tabcolumn div.content ul li.content'));
		$('#quot .content table tbody td').each(function(i,o){
			if(o.cellIndex==2){
				if(o.innerText>0){
					o.style.color='red';
				}else if(o.innerText<0){
					o.style.color='green';
				}
			};
		});
		scrollLi($('#newjoinlist'),24,10);
		scrollLi($('#enti'),24,10);
		scrollTable($('#quot table'),24,10);
		scrollTable($('#price table'),24,9);
	})
    </script>
<{include file="public/bottom.tpl"}>