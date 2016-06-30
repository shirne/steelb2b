<?php /* Smarty version 2.6.18, created on 2011-11-29 17:46:31
         compiled from index/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index/index.tpl', 32, false),array('modifier', 'string_format', 'index/index.tpl', 84, false),array('modifier', 'date_format', 'index/index.tpl', 206, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="wraper">
    	
        <!--right columns-->
    	<div class="right" id="right_column">
        	<div class="column" id="map">
            	<h3>
                	<span class="right"></span>
                    <span class="title">行情地图</span>
                </h3>
                <div class="content">
                	<a href="<?php echo $this->_tpl_vars['app']; ?>
/index/price" target="_blank"><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/map.gif" width="228" height="195" alt="" /></a>
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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/index/enterprise/type/1" class="right" target="_blank">更多...</a>
                    <span class="title">诚信企业</span>
                </h3>
                <div class="content">
                	<div id="enti">
                	<ul>
                    	<?php unset($this->_sections['eh']);
$this->_sections['eh']['loop'] = is_array($_loop=$this->_tpl_vars['enterhot']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['eh']['name'] = 'eh';
$this->_sections['eh']['show'] = true;
$this->_sections['eh']['max'] = $this->_sections['eh']['loop'];
$this->_sections['eh']['step'] = 1;
$this->_sections['eh']['start'] = $this->_sections['eh']['step'] > 0 ? 0 : $this->_sections['eh']['loop']-1;
if ($this->_sections['eh']['show']) {
    $this->_sections['eh']['total'] = $this->_sections['eh']['loop'];
    if ($this->_sections['eh']['total'] == 0)
        $this->_sections['eh']['show'] = false;
} else
    $this->_sections['eh']['total'] = 0;
if ($this->_sections['eh']['show']):

            for ($this->_sections['eh']['index'] = $this->_sections['eh']['start'], $this->_sections['eh']['iteration'] = 1;
                 $this->_sections['eh']['iteration'] <= $this->_sections['eh']['total'];
                 $this->_sections['eh']['index'] += $this->_sections['eh']['step'], $this->_sections['eh']['iteration']++):
$this->_sections['eh']['rownum'] = $this->_sections['eh']['iteration'];
$this->_sections['eh']['index_prev'] = $this->_sections['eh']['index'] - $this->_sections['eh']['step'];
$this->_sections['eh']['index_next'] = $this->_sections['eh']['index'] + $this->_sections['eh']['step'];
$this->_sections['eh']['first']      = ($this->_sections['eh']['iteration'] == 1);
$this->_sections['eh']['last']       = ($this->_sections['eh']['iteration'] == $this->_sections['eh']['total']);
?>
                        <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/product/company/id/<?php echo $this->_tpl_vars['enterhot'][$this->_sections['eh']['index']]['id']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['enterhot'][$this->_sections['eh']['index']]['company'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 36) : smarty_modifier_truncate($_tmp, 36)); ?>
</a></li>
                        <?php endfor; endif; ?>
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
                        <?php echo $this->_tpl_vars['dig']; ?>

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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/index/job" class="right" target="_blank">更多...</a>
                    <span class="title">招聘信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<?php unset($this->_sections['jb']);
$this->_sections['jb']['loop'] = is_array($_loop=$this->_tpl_vars['job']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jb']['name'] = 'jb';
$this->_sections['jb']['show'] = true;
$this->_sections['jb']['max'] = $this->_sections['jb']['loop'];
$this->_sections['jb']['step'] = 1;
$this->_sections['jb']['start'] = $this->_sections['jb']['step'] > 0 ? 0 : $this->_sections['jb']['loop']-1;
if ($this->_sections['jb']['show']) {
    $this->_sections['jb']['total'] = $this->_sections['jb']['loop'];
    if ($this->_sections['jb']['total'] == 0)
        $this->_sections['jb']['show'] = false;
} else
    $this->_sections['jb']['total'] = 0;
if ($this->_sections['jb']['show']):

            for ($this->_sections['jb']['index'] = $this->_sections['jb']['start'], $this->_sections['jb']['iteration'] = 1;
                 $this->_sections['jb']['iteration'] <= $this->_sections['jb']['total'];
                 $this->_sections['jb']['index'] += $this->_sections['jb']['step'], $this->_sections['jb']['iteration']++):
$this->_sections['jb']['rownum'] = $this->_sections['jb']['iteration'];
$this->_sections['jb']['index_prev'] = $this->_sections['jb']['index'] - $this->_sections['jb']['step'];
$this->_sections['jb']['index_next'] = $this->_sections['jb']['index'] + $this->_sections['jb']['step'];
$this->_sections['jb']['first']      = ($this->_sections['jb']['iteration'] == 1);
$this->_sections['jb']['last']       = ($this->_sections['jb']['iteration'] == $this->_sections['jb']['total']);
?>
                    	<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/showjob/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['job'][$this->_sections['jb']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['job'][$this->_sections['jb']['index']]['company'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
&nbsp;&nbsp;[<?php echo ((is_array($_tmp=$this->_tpl_vars['job'][$this->_sections['jb']['index']]['job'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10) : smarty_modifier_truncate($_tmp, 10)); ?>
]</a></li>
                        <?php endfor; endif; ?>
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
                	<script type="text/javascript">document.write(sosofocus({width:228,height:195,path:'<?php echo $this->_tpl_vars['res']; ?>
/images/focus.swf',imgs:'<?php echo $this->_tpl_vars['pic']['pic']; ?>
',links:'<?php echo $this->_tpl_vars['pic']['url']; ?>
',txts:'<?php echo $this->_tpl_vars['pic']['txt']; ?>
'}))</script>
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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/index/enterprise" class="right" target="_blank">查看...</a>
                    <span class="title">最新加盟</span>
                </h3>
                <div class="content">
                	<div id="newjoinlist">
                	<ul>
                    	<?php unset($this->_sections['en']);
$this->_sections['en']['loop'] = is_array($_loop=$this->_tpl_vars['enternew']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['en']['name'] = 'en';
$this->_sections['en']['show'] = true;
$this->_sections['en']['max'] = $this->_sections['en']['loop'];
$this->_sections['en']['step'] = 1;
$this->_sections['en']['start'] = $this->_sections['en']['step'] > 0 ? 0 : $this->_sections['en']['loop']-1;
if ($this->_sections['en']['show']) {
    $this->_sections['en']['total'] = $this->_sections['en']['loop'];
    if ($this->_sections['en']['total'] == 0)
        $this->_sections['en']['show'] = false;
} else
    $this->_sections['en']['total'] = 0;
if ($this->_sections['en']['show']):

            for ($this->_sections['en']['index'] = $this->_sections['en']['start'], $this->_sections['en']['iteration'] = 1;
                 $this->_sections['en']['iteration'] <= $this->_sections['en']['total'];
                 $this->_sections['en']['index'] += $this->_sections['en']['step'], $this->_sections['en']['iteration']++):
$this->_sections['en']['rownum'] = $this->_sections['en']['iteration'];
$this->_sections['en']['index_prev'] = $this->_sections['en']['index'] - $this->_sections['en']['step'];
$this->_sections['en']['index_next'] = $this->_sections['en']['index'] + $this->_sections['en']['step'];
$this->_sections['en']['first']      = ($this->_sections['en']['iteration'] == 1);
$this->_sections['en']['last']       = ($this->_sections['en']['iteration'] == $this->_sections['en']['total']);
?>
                        <li><a href="<?php echo $this->_tpl_vars['app']; ?>
/product/company/id/<?php echo $this->_tpl_vars['enternew'][$this->_sections['en']['index']]['id']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['enternew'][$this->_sections['en']['index']]['company'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 36) : smarty_modifier_truncate($_tmp, 36)); ?>
</a></li>
                        <?php endfor; endif; ?>
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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/index/prodpce" class="right" target="_blank">详细...</a>
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
                        	<?php unset($this->_sections['prc']);
$this->_sections['prc']['loop'] = is_array($_loop=$this->_tpl_vars['price']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prc']['name'] = 'prc';
$this->_sections['prc']['show'] = true;
$this->_sections['prc']['max'] = $this->_sections['prc']['loop'];
$this->_sections['prc']['step'] = 1;
$this->_sections['prc']['start'] = $this->_sections['prc']['step'] > 0 ? 0 : $this->_sections['prc']['loop']-1;
if ($this->_sections['prc']['show']) {
    $this->_sections['prc']['total'] = $this->_sections['prc']['loop'];
    if ($this->_sections['prc']['total'] == 0)
        $this->_sections['prc']['show'] = false;
} else
    $this->_sections['prc']['total'] = 0;
if ($this->_sections['prc']['show']):

            for ($this->_sections['prc']['index'] = $this->_sections['prc']['start'], $this->_sections['prc']['iteration'] = 1;
                 $this->_sections['prc']['iteration'] <= $this->_sections['prc']['total'];
                 $this->_sections['prc']['index'] += $this->_sections['prc']['step'], $this->_sections['prc']['iteration']++):
$this->_sections['prc']['rownum'] = $this->_sections['prc']['iteration'];
$this->_sections['prc']['index_prev'] = $this->_sections['prc']['index'] - $this->_sections['prc']['step'];
$this->_sections['prc']['index_next'] = $this->_sections['prc']['index'] + $this->_sections['prc']['step'];
$this->_sections['prc']['first']      = ($this->_sections['prc']['iteration'] == 1);
$this->_sections['prc']['last']       = ($this->_sections['prc']['iteration'] == $this->_sections['prc']['total']);
?>
                        	<tr>
                            	<td><?php echo $this->_tpl_vars['price'][$this->_sections['prc']['index']]['name']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['price'][$this->_sections['prc']['index']]['model']; ?>
</td>
                                <td><?php echo $this->_tpl_vars['price'][$this->_sections['prc']['index']]['price']; ?>
</td>
                            </tr>
                            <?php endfor; endif; ?>
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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/news/index/cate/9" class="right" target="_blank">更多...</a>
                    <span class="title">物流信息</span>
                </h3>
                <div class="content">
                	<ul>
                    	<?php unset($this->_sections['lg']);
$this->_sections['lg']['loop'] = is_array($_loop=$this->_tpl_vars['logist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lg']['name'] = 'lg';
$this->_sections['lg']['show'] = true;
$this->_sections['lg']['max'] = $this->_sections['lg']['loop'];
$this->_sections['lg']['step'] = 1;
$this->_sections['lg']['start'] = $this->_sections['lg']['step'] > 0 ? 0 : $this->_sections['lg']['loop']-1;
if ($this->_sections['lg']['show']) {
    $this->_sections['lg']['total'] = $this->_sections['lg']['loop'];
    if ($this->_sections['lg']['total'] == 0)
        $this->_sections['lg']['show'] = false;
} else
    $this->_sections['lg']['total'] = 0;
if ($this->_sections['lg']['show']):

            for ($this->_sections['lg']['index'] = $this->_sections['lg']['start'], $this->_sections['lg']['iteration'] = 1;
                 $this->_sections['lg']['iteration'] <= $this->_sections['lg']['total'];
                 $this->_sections['lg']['index'] += $this->_sections['lg']['step'], $this->_sections['lg']['iteration']++):
$this->_sections['lg']['rownum'] = $this->_sections['lg']['iteration'];
$this->_sections['lg']['index_prev'] = $this->_sections['lg']['index'] - $this->_sections['lg']['step'];
$this->_sections['lg']['index_next'] = $this->_sections['lg']['index'] + $this->_sections['lg']['step'];
$this->_sections['lg']['first']      = ($this->_sections['lg']['iteration'] == 1);
$this->_sections['lg']['last']       = ($this->_sections['lg']['iteration'] == $this->_sections['lg']['total']);
?>
                    	<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/show/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['logist'][$this->_sections['lg']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['logist'][$this->_sections['lg']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</a></li>
                        <?php endfor; endif; ?>
                    </ul>
                </div>
            </div>
            
            
            
        </div>
        
        <!--main columns-->
        <div id="main" class="left">
        	<div id="tabcolumn">
            	<h2>
                	<ul>
                    	<?php unset($this->_sections['c']);
$this->_sections['c']['loop'] = is_array($_loop=$this->_tpl_vars['cate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['c']['name'] = 'c';
$this->_sections['c']['show'] = true;
$this->_sections['c']['max'] = $this->_sections['c']['loop'];
$this->_sections['c']['step'] = 1;
$this->_sections['c']['start'] = $this->_sections['c']['step'] > 0 ? 0 : $this->_sections['c']['loop']-1;
if ($this->_sections['c']['show']) {
    $this->_sections['c']['total'] = $this->_sections['c']['loop'];
    if ($this->_sections['c']['total'] == 0)
        $this->_sections['c']['show'] = false;
} else
    $this->_sections['c']['total'] = 0;
if ($this->_sections['c']['show']):

            for ($this->_sections['c']['index'] = $this->_sections['c']['start'], $this->_sections['c']['iteration'] = 1;
                 $this->_sections['c']['iteration'] <= $this->_sections['c']['total'];
                 $this->_sections['c']['index'] += $this->_sections['c']['step'], $this->_sections['c']['iteration']++):
$this->_sections['c']['rownum'] = $this->_sections['c']['iteration'];
$this->_sections['c']['index_prev'] = $this->_sections['c']['index'] - $this->_sections['c']['step'];
$this->_sections['c']['index_next'] = $this->_sections['c']['index'] + $this->_sections['c']['step'];
$this->_sections['c']['first']      = ($this->_sections['c']['iteration'] == 1);
$this->_sections['c']['last']       = ($this->_sections['c']['iteration'] == $this->_sections['c']['total']);
?>
                    	<li <?php if ($this->_sections['c']['index'] == 0): ?>class="active"<?php endif; ?>><a href="javascript:" ><?php echo $this->_tpl_vars['cate'][$this->_sections['c']['index']]['name']; ?>
</a></li>
                        <?php endfor; endif; ?>
                    </ul>
                </h2>
                <div class="content">
                	<ul>
                    	<li class="content active">
                        	<ul>
                            	<?php unset($this->_sections['n1']);
$this->_sections['n1']['loop'] = is_array($_loop=$this->_tpl_vars['news1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n1']['name'] = 'n1';
$this->_sections['n1']['show'] = true;
$this->_sections['n1']['max'] = $this->_sections['n1']['loop'];
$this->_sections['n1']['step'] = 1;
$this->_sections['n1']['start'] = $this->_sections['n1']['step'] > 0 ? 0 : $this->_sections['n1']['loop']-1;
if ($this->_sections['n1']['show']) {
    $this->_sections['n1']['total'] = $this->_sections['n1']['loop'];
    if ($this->_sections['n1']['total'] == 0)
        $this->_sections['n1']['show'] = false;
} else
    $this->_sections['n1']['total'] = 0;
if ($this->_sections['n1']['show']):

            for ($this->_sections['n1']['index'] = $this->_sections['n1']['start'], $this->_sections['n1']['iteration'] = 1;
                 $this->_sections['n1']['iteration'] <= $this->_sections['n1']['total'];
                 $this->_sections['n1']['index'] += $this->_sections['n1']['step'], $this->_sections['n1']['iteration']++):
$this->_sections['n1']['rownum'] = $this->_sections['n1']['iteration'];
$this->_sections['n1']['index_prev'] = $this->_sections['n1']['index'] - $this->_sections['n1']['step'];
$this->_sections['n1']['index_next'] = $this->_sections['n1']['index'] + $this->_sections['n1']['step'];
$this->_sections['n1']['first']      = ($this->_sections['n1']['iteration'] == 1);
$this->_sections['n1']['last']       = ($this->_sections['n1']['iteration'] == $this->_sections['n1']['total']);
?>
                            	<li><span class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['news1'][$this->_sections['n1']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/show/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['news1'][$this->_sections['n1']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo $this->_tpl_vars['news1'][$this->_sections['n1']['index']]['title']; ?>
</a></li>
                                <?php endfor; endif; ?>
                                <li class="more"><a class="right" href="<?php echo $this->_tpl_vars['app']; ?>
/news/index/cate/<?php echo $this->_tpl_vars['cate'][0]['id']; ?>
" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<?php unset($this->_sections['n2']);
$this->_sections['n2']['loop'] = is_array($_loop=$this->_tpl_vars['news2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n2']['name'] = 'n2';
$this->_sections['n2']['show'] = true;
$this->_sections['n2']['max'] = $this->_sections['n2']['loop'];
$this->_sections['n2']['step'] = 1;
$this->_sections['n2']['start'] = $this->_sections['n2']['step'] > 0 ? 0 : $this->_sections['n2']['loop']-1;
if ($this->_sections['n2']['show']) {
    $this->_sections['n2']['total'] = $this->_sections['n2']['loop'];
    if ($this->_sections['n2']['total'] == 0)
        $this->_sections['n2']['show'] = false;
} else
    $this->_sections['n2']['total'] = 0;
if ($this->_sections['n2']['show']):

            for ($this->_sections['n2']['index'] = $this->_sections['n2']['start'], $this->_sections['n2']['iteration'] = 1;
                 $this->_sections['n2']['iteration'] <= $this->_sections['n2']['total'];
                 $this->_sections['n2']['index'] += $this->_sections['n2']['step'], $this->_sections['n2']['iteration']++):
$this->_sections['n2']['rownum'] = $this->_sections['n2']['iteration'];
$this->_sections['n2']['index_prev'] = $this->_sections['n2']['index'] - $this->_sections['n2']['step'];
$this->_sections['n2']['index_next'] = $this->_sections['n2']['index'] + $this->_sections['n2']['step'];
$this->_sections['n2']['first']      = ($this->_sections['n2']['iteration'] == 1);
$this->_sections['n2']['last']       = ($this->_sections['n2']['iteration'] == $this->_sections['n2']['total']);
?>
                                <li><span class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['news2'][$this->_sections['n2']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/show/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['news2'][$this->_sections['n2']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo $this->_tpl_vars['news2'][$this->_sections['n2']['index']]['title']; ?>
</a></li>
                                <?php endfor; endif; ?>
                                <li class="more"><a class="right" href="<?php echo $this->_tpl_vars['app']; ?>
/news/index/cate/<?php echo $this->_tpl_vars['cate'][1]['id']; ?>
" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<?php unset($this->_sections['n3']);
$this->_sections['n3']['loop'] = is_array($_loop=$this->_tpl_vars['news3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n3']['name'] = 'n3';
$this->_sections['n3']['show'] = true;
$this->_sections['n3']['max'] = $this->_sections['n3']['loop'];
$this->_sections['n3']['step'] = 1;
$this->_sections['n3']['start'] = $this->_sections['n3']['step'] > 0 ? 0 : $this->_sections['n3']['loop']-1;
if ($this->_sections['n3']['show']) {
    $this->_sections['n3']['total'] = $this->_sections['n3']['loop'];
    if ($this->_sections['n3']['total'] == 0)
        $this->_sections['n3']['show'] = false;
} else
    $this->_sections['n3']['total'] = 0;
if ($this->_sections['n3']['show']):

            for ($this->_sections['n3']['index'] = $this->_sections['n3']['start'], $this->_sections['n3']['iteration'] = 1;
                 $this->_sections['n3']['iteration'] <= $this->_sections['n3']['total'];
                 $this->_sections['n3']['index'] += $this->_sections['n3']['step'], $this->_sections['n3']['iteration']++):
$this->_sections['n3']['rownum'] = $this->_sections['n3']['iteration'];
$this->_sections['n3']['index_prev'] = $this->_sections['n3']['index'] - $this->_sections['n3']['step'];
$this->_sections['n3']['index_next'] = $this->_sections['n3']['index'] + $this->_sections['n3']['step'];
$this->_sections['n3']['first']      = ($this->_sections['n3']['iteration'] == 1);
$this->_sections['n3']['last']       = ($this->_sections['n3']['iteration'] == $this->_sections['n3']['total']);
?>
                            	<li><span class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['news3'][$this->_sections['n3']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/show/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['news3'][$this->_sections['n3']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo $this->_tpl_vars['news3'][$this->_sections['n3']['index']]['title']; ?>
</a></li>
                                <?php endfor; endif; ?>
                                <li class="more"><a class="right" href="<?php echo $this->_tpl_vars['app']; ?>
/news/index/cate/<?php echo $this->_tpl_vars['cate'][2]['id']; ?>
" target="_blank">更多>></a></li>
                            </ul>
                        </li>
                        <li class="content">
                        	<ul>
                            	<?php unset($this->_sections['n4']);
$this->_sections['n4']['loop'] = is_array($_loop=$this->_tpl_vars['news4']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n4']['name'] = 'n4';
$this->_sections['n4']['show'] = true;
$this->_sections['n4']['max'] = $this->_sections['n4']['loop'];
$this->_sections['n4']['step'] = 1;
$this->_sections['n4']['start'] = $this->_sections['n4']['step'] > 0 ? 0 : $this->_sections['n4']['loop']-1;
if ($this->_sections['n4']['show']) {
    $this->_sections['n4']['total'] = $this->_sections['n4']['loop'];
    if ($this->_sections['n4']['total'] == 0)
        $this->_sections['n4']['show'] = false;
} else
    $this->_sections['n4']['total'] = 0;
if ($this->_sections['n4']['show']):

            for ($this->_sections['n4']['index'] = $this->_sections['n4']['start'], $this->_sections['n4']['iteration'] = 1;
                 $this->_sections['n4']['iteration'] <= $this->_sections['n4']['total'];
                 $this->_sections['n4']['index'] += $this->_sections['n4']['step'], $this->_sections['n4']['iteration']++):
$this->_sections['n4']['rownum'] = $this->_sections['n4']['iteration'];
$this->_sections['n4']['index_prev'] = $this->_sections['n4']['index'] - $this->_sections['n4']['step'];
$this->_sections['n4']['index_next'] = $this->_sections['n4']['index'] + $this->_sections['n4']['step'];
$this->_sections['n4']['first']      = ($this->_sections['n4']['iteration'] == 1);
$this->_sections['n4']['last']       = ($this->_sections['n4']['iteration'] == $this->_sections['n4']['total']);
?>
                            	<li><span class="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['news4'][$this->_sections['n4']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d") : smarty_modifier_date_format($_tmp, "%Y/%m/%d")); ?>
</span><a href="<?php echo $this->_tpl_vars['app']; ?>
/news/show/id/<?php echo ((is_array($_tmp=$this->_tpl_vars['news4'][$this->_sections['n4']['index']]['id'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
" target="_blank"><?php echo $this->_tpl_vars['news4'][$this->_sections['n4']['index']]['title']; ?>
</a></li>
                                <?php endfor; endif; ?>
                                <li class="more"><a class="right" href="<?php echo $this->_tpl_vars['app']; ?>
/news/index/cate/<?php echo $this->_tpl_vars['cate'][3]['id']; ?>
" target="_blank">更多>></a></li>
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
                            <?php unset($this->_sections['pc']);
$this->_sections['pc']['loop'] = is_array($_loop=$this->_tpl_vars['pcat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pc']['name'] = 'pc';
$this->_sections['pc']['show'] = true;
$this->_sections['pc']['max'] = $this->_sections['pc']['loop'];
$this->_sections['pc']['step'] = 1;
$this->_sections['pc']['start'] = $this->_sections['pc']['step'] > 0 ? 0 : $this->_sections['pc']['loop']-1;
if ($this->_sections['pc']['show']) {
    $this->_sections['pc']['total'] = $this->_sections['pc']['loop'];
    if ($this->_sections['pc']['total'] == 0)
        $this->_sections['pc']['show'] = false;
} else
    $this->_sections['pc']['total'] = 0;
if ($this->_sections['pc']['show']):

            for ($this->_sections['pc']['index'] = $this->_sections['pc']['start'], $this->_sections['pc']['iteration'] = 1;
                 $this->_sections['pc']['iteration'] <= $this->_sections['pc']['total'];
                 $this->_sections['pc']['index'] += $this->_sections['pc']['step'], $this->_sections['pc']['iteration']++):
$this->_sections['pc']['rownum'] = $this->_sections['pc']['iteration'];
$this->_sections['pc']['index_prev'] = $this->_sections['pc']['index'] - $this->_sections['pc']['step'];
$this->_sections['pc']['index_next'] = $this->_sections['pc']['index'] + $this->_sections['pc']['step'];
$this->_sections['pc']['first']      = ($this->_sections['pc']['iteration'] == 1);
$this->_sections['pc']['last']       = ($this->_sections['pc']['iteration'] == $this->_sections['pc']['total']);
?>
                            <?php if (( $this->_sections['pc']['index'] % 8 ) == 0): ?><tr><?php endif; ?>
                                <td><a href="<?php echo $this->_tpl_vars['app']; ?>
/product/search/sid/<?php echo $this->_tpl_vars['pcat'][$this->_sections['pc']['index']]['id']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['pcat'][$this->_sections['pc']['index']]['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 8) : smarty_modifier_truncate($_tmp, 8)); ?>
</a></td>
                            <?php if (( $this->_sections['pc']['index'] % 8 ) == 7): ?></tr><?php endif; ?>
                            <?php endfor; endif; ?>
                        </tbody>
                    </table>
                    <form name="product" id="searchProduct" action="<?php echo $this->_tpl_vars['app']; ?>
/product/search" method="get" target="_blank">
                    	<div>
                        	<label>类别:<select name="class" onchange="getmodel('<?php echo $this->_tpl_vars['app']; ?>
/index/getcate','product','model',this)" class="w1">
                            		<option value="">不限类别</option>
                                    <?php unset($this->_sections['pfc']);
$this->_sections['pfc']['loop'] = is_array($_loop=$this->_tpl_vars['fcate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pfc']['name'] = 'pfc';
$this->_sections['pfc']['show'] = true;
$this->_sections['pfc']['max'] = $this->_sections['pfc']['loop'];
$this->_sections['pfc']['step'] = 1;
$this->_sections['pfc']['start'] = $this->_sections['pfc']['step'] > 0 ? 0 : $this->_sections['pfc']['loop']-1;
if ($this->_sections['pfc']['show']) {
    $this->_sections['pfc']['total'] = $this->_sections['pfc']['loop'];
    if ($this->_sections['pfc']['total'] == 0)
        $this->_sections['pfc']['show'] = false;
} else
    $this->_sections['pfc']['total'] = 0;
if ($this->_sections['pfc']['show']):

            for ($this->_sections['pfc']['index'] = $this->_sections['pfc']['start'], $this->_sections['pfc']['iteration'] = 1;
                 $this->_sections['pfc']['iteration'] <= $this->_sections['pfc']['total'];
                 $this->_sections['pfc']['index'] += $this->_sections['pfc']['step'], $this->_sections['pfc']['iteration']++):
$this->_sections['pfc']['rownum'] = $this->_sections['pfc']['iteration'];
$this->_sections['pfc']['index_prev'] = $this->_sections['pfc']['index'] - $this->_sections['pfc']['step'];
$this->_sections['pfc']['index_next'] = $this->_sections['pfc']['index'] + $this->_sections['pfc']['step'];
$this->_sections['pfc']['first']      = ($this->_sections['pfc']['iteration'] == 1);
$this->_sections['pfc']['last']       = ($this->_sections['pfc']['iteration'] == $this->_sections['pfc']['total']);
?>
                                	<option value="<?php echo $this->_tpl_vars['fcate'][$this->_sections['pfc']['index']]['name']; ?>
" uid="<?php echo $this->_tpl_vars['fcate'][$this->_sections['pfc']['index']]['id']; ?>
" ><?php echo $this->_tpl_vars['fcate'][$this->_sections['pfc']['index']]['name']; ?>
</option>
                                    <?php endfor; endif; ?>
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
                    <a href="<?php echo $this->_tpl_vars['app']; ?>
/index/supply" class="right" target="_blank">更多...</a>
                    <span class="title">供求信息</span>
                </h3>
                <div class="content">
                	<ul class="right">
                    	<?php unset($this->_sections['ib']);
$this->_sections['ib']['loop'] = is_array($_loop=$this->_tpl_vars['infob']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ib']['name'] = 'ib';
$this->_sections['ib']['show'] = true;
$this->_sections['ib']['max'] = $this->_sections['ib']['loop'];
$this->_sections['ib']['step'] = 1;
$this->_sections['ib']['start'] = $this->_sections['ib']['step'] > 0 ? 0 : $this->_sections['ib']['loop']-1;
if ($this->_sections['ib']['show']) {
    $this->_sections['ib']['total'] = $this->_sections['ib']['loop'];
    if ($this->_sections['ib']['total'] == 0)
        $this->_sections['ib']['show'] = false;
} else
    $this->_sections['ib']['total'] = 0;
if ($this->_sections['ib']['show']):

            for ($this->_sections['ib']['index'] = $this->_sections['ib']['start'], $this->_sections['ib']['iteration'] = 1;
                 $this->_sections['ib']['iteration'] <= $this->_sections['ib']['total'];
                 $this->_sections['ib']['index'] += $this->_sections['ib']['step'], $this->_sections['ib']['iteration']++):
$this->_sections['ib']['rownum'] = $this->_sections['ib']['iteration'];
$this->_sections['ib']['index_prev'] = $this->_sections['ib']['index'] - $this->_sections['ib']['step'];
$this->_sections['ib']['index_next'] = $this->_sections['ib']['index'] + $this->_sections['ib']['step'];
$this->_sections['ib']['first']      = ($this->_sections['ib']['iteration'] == 1);
$this->_sections['ib']['last']       = ($this->_sections['ib']['iteration'] == $this->_sections['ib']['total']);
?>
                    	<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/supply/type/0" class="class" target="_blank">[求购]</a><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/user/id/<?php echo $this->_tpl_vars['infob'][$this->_sections['ib']['index']]['userid']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['infob'][$this->_sections['ib']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 24, "...") : smarty_modifier_truncate($_tmp, 24, "...")); ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['infob'][$this->_sections['ib']['index']]['price']; ?>
</a></li>
                        <?php endfor; endif; ?>
                    </ul>
                    <ul>
                    	<?php unset($this->_sections['ia']);
$this->_sections['ia']['loop'] = is_array($_loop=$this->_tpl_vars['infoa']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ia']['name'] = 'ia';
$this->_sections['ia']['show'] = true;
$this->_sections['ia']['max'] = $this->_sections['ia']['loop'];
$this->_sections['ia']['step'] = 1;
$this->_sections['ia']['start'] = $this->_sections['ia']['step'] > 0 ? 0 : $this->_sections['ia']['loop']-1;
if ($this->_sections['ia']['show']) {
    $this->_sections['ia']['total'] = $this->_sections['ia']['loop'];
    if ($this->_sections['ia']['total'] == 0)
        $this->_sections['ia']['show'] = false;
} else
    $this->_sections['ia']['total'] = 0;
if ($this->_sections['ia']['show']):

            for ($this->_sections['ia']['index'] = $this->_sections['ia']['start'], $this->_sections['ia']['iteration'] = 1;
                 $this->_sections['ia']['iteration'] <= $this->_sections['ia']['total'];
                 $this->_sections['ia']['index'] += $this->_sections['ia']['step'], $this->_sections['ia']['iteration']++):
$this->_sections['ia']['rownum'] = $this->_sections['ia']['iteration'];
$this->_sections['ia']['index_prev'] = $this->_sections['ia']['index'] - $this->_sections['ia']['step'];
$this->_sections['ia']['index_next'] = $this->_sections['ia']['index'] + $this->_sections['ia']['step'];
$this->_sections['ia']['first']      = ($this->_sections['ia']['iteration'] == 1);
$this->_sections['ia']['last']       = ($this->_sections['ia']['iteration'] == $this->_sections['ia']['total']);
?>
                    	<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/supply/type/1" class="class" target="_blank">[供应]</a><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/user/id/<?php echo $this->_tpl_vars['infoa'][$this->_sections['ia']['index']]['userid']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['infoa'][$this->_sections['ia']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 24, "...") : smarty_modifier_truncate($_tmp, 24, "...")); ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['infoa'][$this->_sections['ia']['index']]['price']; ?>
</a></li>
                        <?php endfor; endif; ?>
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
                        	<?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['gt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)3;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['gt'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['gt'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 2): ?>|<?php endif; ?>
                            <?php endfor; endif; ?>
                        </td>
                        <td width="80" class="cate">搜索</td>
                        <td width="206">
                            <?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['ss']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)3;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['ss'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['ss'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 2): ?>|<?php endif; ?>
                            <?php endfor; endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="cate">天气</td>
                        <td>
                            <?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['tq']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)3;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['tq'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['tq'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 2): ?>|<?php endif; ?>
                            <?php endfor; endif; ?>
                        </td>
                        <td class="cate">时间</td>
                        <td>
                        	<?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['sj']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)3;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['sj'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['sj'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 2): ?>|<?php endif; ?>
                            <?php endfor; endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="cate">交通</td>
                        <td colspan="3"><?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['jt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)7;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['jt'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['jt'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 6): ?>|<?php endif; ?>
                            <?php endfor; endif; ?></td>
                    </tr>
                    <tr>
                        <td class="cate">银行</td>
                        <td colspan="3"><?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['yh']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)7;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['yh'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['yh'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 6): ?>|<?php endif; ?>
                            <?php endfor; endif; ?></td>
                    </tr>
                    <tr>
                        <td class="cate">其他</td>
                        <td colspan="3"><?php unset($this->_sections['olk']);
$this->_sections['olk']['loop'] = is_array($_loop=$this->_tpl_vars['olink']['qt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['olk']['name'] = 'olk';
$this->_sections['olk']['max'] = (int)7;
$this->_sections['olk']['show'] = true;
if ($this->_sections['olk']['max'] < 0)
    $this->_sections['olk']['max'] = $this->_sections['olk']['loop'];
$this->_sections['olk']['step'] = 1;
$this->_sections['olk']['start'] = $this->_sections['olk']['step'] > 0 ? 0 : $this->_sections['olk']['loop']-1;
if ($this->_sections['olk']['show']) {
    $this->_sections['olk']['total'] = min(ceil(($this->_sections['olk']['step'] > 0 ? $this->_sections['olk']['loop'] - $this->_sections['olk']['start'] : $this->_sections['olk']['start']+1)/abs($this->_sections['olk']['step'])), $this->_sections['olk']['max']);
    if ($this->_sections['olk']['total'] == 0)
        $this->_sections['olk']['show'] = false;
} else
    $this->_sections['olk']['total'] = 0;
if ($this->_sections['olk']['show']):

            for ($this->_sections['olk']['index'] = $this->_sections['olk']['start'], $this->_sections['olk']['iteration'] = 1;
                 $this->_sections['olk']['iteration'] <= $this->_sections['olk']['total'];
                 $this->_sections['olk']['index'] += $this->_sections['olk']['step'], $this->_sections['olk']['iteration']++):
$this->_sections['olk']['rownum'] = $this->_sections['olk']['iteration'];
$this->_sections['olk']['index_prev'] = $this->_sections['olk']['index'] - $this->_sections['olk']['step'];
$this->_sections['olk']['index_next'] = $this->_sections['olk']['index'] + $this->_sections['olk']['step'];
$this->_sections['olk']['first']      = ($this->_sections['olk']['iteration'] == 1);
$this->_sections['olk']['last']       = ($this->_sections['olk']['iteration'] == $this->_sections['olk']['total']);
?>
                            <a href="<?php echo $this->_tpl_vars['olink']['qt'][$this->_sections['olk']['index']]['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['olink']['qt'][$this->_sections['olk']['index']]['title']; ?>
</a>
                            <?php if ($this->_sections['olk']['index'] < 6): ?>|<?php endif; ?>
                            <?php endfor; endif; ?></td>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>