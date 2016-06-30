<?php /* Smarty version 2.6.18, created on 2011-11-29 17:46:31
         compiled from public/top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'public/top.tpl', 96, false),array('modifier', 'date_format', 'public/top.tpl', 96, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
<?php if ($this->_tpl_vars['title']): ?>--<?php endif; ?><?php echo $this->_tpl_vars['cfg']['sitetitle']; ?>
</title>
<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['res']; ?>
/style/master.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['res']; ?>
/style/<?php echo $this->_tpl_vars['css']; ?>
.css" />
<script type="text/javascript" charset="gb2312" src="<?php echo $this->_tpl_vars['res']; ?>
/scripts/jQuery1.42.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['res']; ?>
/scripts/common.js"></script>
<script type="text/javascript">
var blank_img='<?php echo $this->_tpl_vars['res']; ?>
/images/blank.gif';
$(function(){
	$('#menu .level_1 li').eq(0<?php echo $this->_tpl_vars['index']; ?>
).addClass('active');
	if(document.toplogin)document.toplogin.onsubmit=function(){
		var u=this.username,p=this.password;
		if(u.value=='' || p.value==''){
			alert('用户名或密码为空,请填写!');
			if(u.value=='')u.focus();
			else p.focus();
			return false;
		}
	}
});
ad.p={title:'',link:'<?php echo $this->_tpl_vars['cfg']['siteurl']; ?>
',type:0,path:'<?php echo $this->_tpl_vars['res']; ?>
/ad/default.swf'};
<?php unset($this->_sections['ad']);
$this->_sections['ad']['loop'] = is_array($_loop=$this->_tpl_vars['ad']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ad']['name'] = 'ad';
$this->_sections['ad']['show'] = true;
$this->_sections['ad']['max'] = $this->_sections['ad']['loop'];
$this->_sections['ad']['step'] = 1;
$this->_sections['ad']['start'] = $this->_sections['ad']['step'] > 0 ? 0 : $this->_sections['ad']['loop']-1;
if ($this->_sections['ad']['show']) {
    $this->_sections['ad']['total'] = $this->_sections['ad']['loop'];
    if ($this->_sections['ad']['total'] == 0)
        $this->_sections['ad']['show'] = false;
} else
    $this->_sections['ad']['total'] = 0;
if ($this->_sections['ad']['show']):

            for ($this->_sections['ad']['index'] = $this->_sections['ad']['start'], $this->_sections['ad']['iteration'] = 1;
                 $this->_sections['ad']['iteration'] <= $this->_sections['ad']['total'];
                 $this->_sections['ad']['index'] += $this->_sections['ad']['step'], $this->_sections['ad']['iteration']++):
$this->_sections['ad']['rownum'] = $this->_sections['ad']['iteration'];
$this->_sections['ad']['index_prev'] = $this->_sections['ad']['index'] - $this->_sections['ad']['step'];
$this->_sections['ad']['index_next'] = $this->_sections['ad']['index'] + $this->_sections['ad']['step'];
$this->_sections['ad']['first']      = ($this->_sections['ad']['iteration'] == 1);
$this->_sections['ad']['last']       = ($this->_sections['ad']['iteration'] == $this->_sections['ad']['total']);
?>
ad.add('<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['type']; ?>
','<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['title']; ?>
','<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['link']; ?>
','<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['postn']; ?>
','<?php echo $this->_tpl_vars['public']; ?>
/uploads/<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['img']; ?>
',0<?php echo $this->_tpl_vars['ad'][$this->_sections['ad']['index']]['border']; ?>
);
<?php endfor; endif; ?>
</script>
</head>

<body>
<script type="text/javascript">
if($.browser.msie && ($.browser.version>=6 && $.browser.version<8)){
	document.write('<style type="text/css">html body{width:auto}</style>');
	document.write('<div style="margin:0 auto;position:relative;width:996px;">');
}
<?php if (( $_GET['m'] == 'index' ) && ( $_GET['a'] == 'index' )): ?>
if(ad.c[8]){
	document.write('<div id="top_ad" style="display:none">');
	ad.show(8,0);
	document.write('</div>');
	$(function(){
		$("#top_ad").slideDown();
		setTimeout('$("#top_ad").slideUp("slow")',10000);
	});
}
<?php endif; ?>
</script>
	<div id="top">
    	<div class="right">
        	<a href="<?php echo $this->_tpl_vars['app']; ?>
" class="h">站点首页</a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/user/register" class="f">会员注册</a>
            <a href="javascript:setFavorite()" class="c">加入收藏</a>
        </div>
    </div>
    
    
    <div id="banner">
        <script type="text/javascript">ad.show(0)</script>
    </div>
	
    
    <div id="menu">
    	<div class="level_1">
        	<ul>
            	<li class="first"><a href="<?php echo $this->_tpl_vars['app']; ?>
">网站首页</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/about" target="_blank">市场介绍</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/service" target="_blank">配套服务</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/product" target="_blank">产品查询</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/supply" target="_blank">供求专版</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/enterprise" target="_blank">入驻企业</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/" target="_blank">综合资讯</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/market" target="_blank">行情快递</a></li>
                <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/knowledge" target="_blank">钢材知识</a></li>
            </ul>
        </div>
        <div class="level_2">
        	<span class="border right"></span>
            <span class="border left"></span>
            <div class="content">
            	<div class="form">
                    <?php if ($_SESSION['username'] != ""): ?>
                    <p class="uinfo">欢迎您: <font color="#2222aa" style="font-weight:bold"><?php echo $_SESSION['username']; ?>
</font><a href="<?php echo $this->_tpl_vars['app']; ?>
/user/">会员中心</a><a href="<?php echo $this->_tpl_vars['app']; ?>
/user/loginout">退出登陆</a></p>
                    <?php else: ?>
                    <form name="toplogin" method="post" action="<?php echo $this->_tpl_vars['app']; ?>
/user/dologin" target="_self">
                        <strong>会员登录</strong>
                        <label>用户名:<input class="text" type="text" name="username" /></label>
                        <label>密码:<input class="text" type="password" name="password" /></label>
                        <input class="button" type="submit" value="登　录" />
                    </form>
                    <?php endif; ?>
                </div>
            	<div class="notice">
                	<marquee onmouseover="stop()" onmouseout="start()" height="25" width="100%" scrollAmount="2" scrollDelay="10">
                    	<?php unset($this->_sections['notice']);
$this->_sections['notice']['loop'] = is_array($_loop=$this->_tpl_vars['ntc']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['notice']['name'] = 'notice';
$this->_sections['notice']['show'] = true;
$this->_sections['notice']['max'] = $this->_sections['notice']['loop'];
$this->_sections['notice']['step'] = 1;
$this->_sections['notice']['start'] = $this->_sections['notice']['step'] > 0 ? 0 : $this->_sections['notice']['loop']-1;
if ($this->_sections['notice']['show']) {
    $this->_sections['notice']['total'] = $this->_sections['notice']['loop'];
    if ($this->_sections['notice']['total'] == 0)
        $this->_sections['notice']['show'] = false;
} else
    $this->_sections['notice']['total'] = 0;
if ($this->_sections['notice']['show']):

            for ($this->_sections['notice']['index'] = $this->_sections['notice']['start'], $this->_sections['notice']['iteration'] = 1;
                 $this->_sections['notice']['iteration'] <= $this->_sections['notice']['total'];
                 $this->_sections['notice']['index'] += $this->_sections['notice']['step'], $this->_sections['notice']['iteration']++):
$this->_sections['notice']['rownum'] = $this->_sections['notice']['iteration'];
$this->_sections['notice']['index_prev'] = $this->_sections['notice']['index'] - $this->_sections['notice']['step'];
$this->_sections['notice']['index_next'] = $this->_sections['notice']['index'] + $this->_sections['notice']['step'];
$this->_sections['notice']['first']      = ($this->_sections['notice']['iteration'] == 1);
$this->_sections['notice']['last']       = ($this->_sections['notice']['iteration'] == $this->_sections['notice']['total']);
?>
                        <a href="<?php echo ((is_array($_tmp=@$this->_tpl_vars['ntc'][$this->_sections['notice']['index']]['link'])) ? $this->_run_mod_handler('default', true, $_tmp, "javascript:") : smarty_modifier_default($_tmp, "javascript:")); ?>
" target="_blank" style="color:red">.<?php echo $this->_tpl_vars['ntc'][$this->_sections['notice']['index']]['title']; ?>
&nbsp;&nbsp;<!--<?php echo ((is_array($_tmp=$this->_tpl_vars['ntc'][$this->_sections['notice']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
--></a>
                        <?php endfor; endif; ?>
            		</marquee>
                </div>
            </div>
        </div>
    </div>