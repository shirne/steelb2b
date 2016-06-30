<?php /* Smarty version 2.6.18, created on 2011-12-01 09:04:00
         compiled from index/prodpce.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'index/prodpce.tpl', 14, false),array('modifier', 'date_format', 'index/prodpce.tpl', 33, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="wraper">
    	<div id="position">您现在的位置:<a href="<?php echo $this->_tpl_vars['app']; ?>
/">网站首页</a>&gt;&gt;今日报价</div>
    </div>
    
    <div class="wraper">
        <div class="wraper">
        <table class="list">
        <thead>
            <tr>
                <td colspan="6">今日报价</td>
            </tr>
            <tr>
            	<td colspan="6" style="background:#fff;" height="30"><form name="filt" class="right">品名:<input type="text" name="name" value="<?php echo ((is_array($_tmp=@$_GET['name'])) ? $this->_run_mod_handler('default', true, $_tmp, "输入品名查看") : smarty_modifier_default($_tmp, "输入品名查看")); ?>
" onclick="this.select()" />　<input type="submit" value="搜索" class="button" /></form></td>
            </tr>
            <tr>
                <td>品名</td>
                <td>材质</td>
                <td>规格</td>
                <td>价格</td>
                <td>涨跌副</td>
                <td>发布时间</td>
            </tr>
        </thead>
        <tbody>
        	<?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ls']['name'] = 'ls';
$this->_sections['ls']['show'] = true;
$this->_sections['ls']['max'] = $this->_sections['ls']['loop'];
$this->_sections['ls']['step'] = 1;
$this->_sections['ls']['start'] = $this->_sections['ls']['step'] > 0 ? 0 : $this->_sections['ls']['loop']-1;
if ($this->_sections['ls']['show']) {
    $this->_sections['ls']['total'] = $this->_sections['ls']['loop'];
    if ($this->_sections['ls']['total'] == 0)
        $this->_sections['ls']['show'] = false;
} else
    $this->_sections['ls']['total'] = 0;
if ($this->_sections['ls']['show']):

            for ($this->_sections['ls']['index'] = $this->_sections['ls']['start'], $this->_sections['ls']['iteration'] = 1;
                 $this->_sections['ls']['iteration'] <= $this->_sections['ls']['total'];
                 $this->_sections['ls']['index'] += $this->_sections['ls']['step'], $this->_sections['ls']['iteration']++):
$this->_sections['ls']['rownum'] = $this->_sections['ls']['iteration'];
$this->_sections['ls']['index_prev'] = $this->_sections['ls']['index'] - $this->_sections['ls']['step'];
$this->_sections['ls']['index_next'] = $this->_sections['ls']['index'] + $this->_sections['ls']['step'];
$this->_sections['ls']['first']      = ($this->_sections['ls']['iteration'] == 1);
$this->_sections['ls']['last']       = ($this->_sections['ls']['iteration'] == $this->_sections['ls']['total']);
?>
            <tr>
                <td><?php echo $this->_tpl_vars['list'][$this->_sections['ls']['index']]['name']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list'][$this->_sections['ls']['index']]['material']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list'][$this->_sections['ls']['index']]['model']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list'][$this->_sections['ls']['index']]['price']; ?>
</td>
                <td><?php echo $this->_tpl_vars['list'][$this->_sections['ls']['index']]['rang']; ?>
</td>
                <td><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
            </tr>
            <?php endfor; endif; ?>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="6" height="24"><?php echo $this->_tpl_vars['fpage']; ?>
</td>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>