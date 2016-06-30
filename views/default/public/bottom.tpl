	<div id="footer">
    	<div id="links">
        	<h2><{if $cfg.visitor}><span class="right"><{$cfg.visitors}></span><{/if}><span class="title">友情链接</span></h2>
        	<div class="content">
            	<ul>
                	<{section loop=$lnk name="lk"}>
                    <li><a href="<{$lnk[lk].link}>"><{$lnk[lk].name}></a></li>
                    <{/section}>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="info">
        	  <p><{$cfg.copyright}></p>
        </div>
    </div>
<script type="text/javascript">
if($.browser.msie && ($.browser.version>=6 && $.browser.version<8)){
	document.write('</div>')
}
var kf,couplet;
$(function(){
		  // <{if $cfg.service}>

	var qqs='<{$cfg.qqs}>'.split('|'),str='';
	for(var i=0;i<qqs.length;i++){
		if(qqs[i]!='')
			str+='<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='+qqs[i]+'&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:'+qqs[i]+':41" alt="点击此处咨询" title="点击此处咨询"></a>';
	}
	$(document.body).append(kf=$('<div id="kf"><div class="top"><a href="javascript:void(kf.hide())" class="right" target="_self"></a></div><div class="cont"><div class="contain"><p>欢迎咨询</p>'+str+'</div></div><div class="bottom"></div></div>'));
	kf.animate({'top':(document.body.scrollTop||document.documentElement.scrollTop)+160},{});
	//<{/if}>
	
	// <{if $cfg.service}>

	ad.width=100;
	ad.height=300;
	$(document.body).append($('<div class="coupletright">'+ad.html(ad.c[7]?ad.c[7][0]:false)+'<a class="close" href="javascript:void(couplet.hide())"  target="_self">关闭</a></div><div class="coupletleft">'+ad.html(ad.c[7]?(ad.c[7][1]?ad.c[7][1]:ad.c[7][0]):false)+'<a class="close" href="javascript:void(couplet.hide())"  target="_self">关闭</a></div>'));
	couplet=$('.coupletright,.coupletleft');
	couplet.animate({'top':(document.body.scrollTop||document.documentElement.scrollTop)+200},{});
	// <{/if}>
	

	$(window).bind('scroll',function(){
		var scrtop=document.body.scrollTop||document.documentElement.scrollTop;
		try{
		kf.stop(true,true).animate({'top':scrtop+160});
		}catch(e){}
		try{
		couplet.stop(true,true).animate({'top':scrtop+200});
		}catch(e){}
	});
});
</script>
</body>
</html>
