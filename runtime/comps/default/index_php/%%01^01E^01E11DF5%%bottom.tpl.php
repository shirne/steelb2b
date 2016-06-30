<?php /* Smarty version 2.6.18, created on 2011-11-29 17:46:31
         compiled from public/bottom.tpl */ ?>
	<div id="footer">
    	<div id="links">
        	<h2><?php if ($this->_tpl_vars['cfg']['visitor']): ?><span class="right"><?php echo $this->_tpl_vars['cfg']['visitors']; ?>
</span><?php endif; ?><span class="title">友情链接</span></h2>
        	<div class="content">
            	<ul>
                	<?php unset($this->_sections['lk']);
$this->_sections['lk']['loop'] = is_array($_loop=$this->_tpl_vars['lnk']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lk']['name'] = 'lk';
$this->_sections['lk']['show'] = true;
$this->_sections['lk']['max'] = $this->_sections['lk']['loop'];
$this->_sections['lk']['step'] = 1;
$this->_sections['lk']['start'] = $this->_sections['lk']['step'] > 0 ? 0 : $this->_sections['lk']['loop']-1;
if ($this->_sections['lk']['show']) {
    $this->_sections['lk']['total'] = $this->_sections['lk']['loop'];
    if ($this->_sections['lk']['total'] == 0)
        $this->_sections['lk']['show'] = false;
} else
    $this->_sections['lk']['total'] = 0;
if ($this->_sections['lk']['show']):

            for ($this->_sections['lk']['index'] = $this->_sections['lk']['start'], $this->_sections['lk']['iteration'] = 1;
                 $this->_sections['lk']['iteration'] <= $this->_sections['lk']['total'];
                 $this->_sections['lk']['index'] += $this->_sections['lk']['step'], $this->_sections['lk']['iteration']++):
$this->_sections['lk']['rownum'] = $this->_sections['lk']['iteration'];
$this->_sections['lk']['index_prev'] = $this->_sections['lk']['index'] - $this->_sections['lk']['step'];
$this->_sections['lk']['index_next'] = $this->_sections['lk']['index'] + $this->_sections['lk']['step'];
$this->_sections['lk']['first']      = ($this->_sections['lk']['iteration'] == 1);
$this->_sections['lk']['last']       = ($this->_sections['lk']['iteration'] == $this->_sections['lk']['total']);
?>
                    <li><a href="<?php echo $this->_tpl_vars['lnk'][$this->_sections['lk']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['lnk'][$this->_sections['lk']['index']]['name']; ?>
</a></li>
                    <?php endfor; endif; ?>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="info">
        	  <p><?php echo $this->_tpl_vars['cfg']['copyright']; ?>
</p>
        </div>
    </div>
<script type="text/javascript">
if($.browser.msie && ($.browser.version>=6 && $.browser.version<8)){
	document.write('</div>')
}
var kf,couplet;
$(function(){
		  // <?php if ($this->_tpl_vars['cfg']['service']): ?>

	var qqs='<?php echo $this->_tpl_vars['cfg']['qqs']; ?>
'.split('|'),str='';
	for(var i=0;i<qqs.length;i++){
		if(qqs[i]!='')
			str+='<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin='+qqs[i]+'&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:'+qqs[i]+':41" alt="点击此处咨询" title="点击此处咨询"></a>';
	}
	$(document.body).append(kf=$('<div id="kf"><div class="top"><a href="javascript:void(kf.hide())" class="right" target="_self"></a></div><div class="cont"><div class="contain"><p>欢迎咨询</p>'+str+'</div></div><div class="bottom"></div></div>'));
	kf.animate({'top':(document.body.scrollTop||document.documentElement.scrollTop)+160},{});
	//<?php endif; ?>
	
	// <?php if ($this->_tpl_vars['cfg']['service']): ?>

	ad.width=100;
	ad.height=300;
	$(document.body).append($('<div class="coupletright">'+ad.html(ad.c[7]?ad.c[7][0]:false)+'<a class="close" href="javascript:void(couplet.hide())"  target="_self">关闭</a></div><div class="coupletleft">'+ad.html(ad.c[7]?(ad.c[7][1]?ad.c[7][1]:ad.c[7][0]):false)+'<a class="close" href="javascript:void(couplet.hide())"  target="_self">关闭</a></div>'));
	couplet=$('.coupletright,.coupletleft');
	couplet.animate({'top':(document.body.scrollTop||document.documentElement.scrollTop)+200},{});
	// <?php endif; ?>
	

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