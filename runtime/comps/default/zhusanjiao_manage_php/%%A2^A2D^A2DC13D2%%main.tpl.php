<?php /* Smarty version 2.6.18, created on 2011-11-30 09:43:40
         compiled from index/main.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--后台首页-->
<table>
	<caption>网站统计数据</caption>
    <tr>
    	<td>会员总数:</td>
        <td><?php echo $this->_tpl_vars['memnum']; ?>
</td>
        <td>待认证会员:</td>
        <td><?php echo $this->_tpl_vars['asknum']; ?>
</td>
    </tr>
    <tr>
    	<td>企业总数:</td>
        <td><?php echo $this->_tpl_vars['ennum']; ?>
</td>
        <td>产品总数:</td>
        <td><?php echo $this->_tpl_vars['pdnum']; ?>
</td>
    </tr>
    <tr>
    	<td>供应信息:</td>
        <td><?php echo $this->_tpl_vars['sinfo']; ?>
</td>
        <td>求购信息:</td>
        <td><?php echo $this->_tpl_vars['finfo']; ?>
</td>
    </tr>
    <tr>
    	<td>留言总数:</td>
        <td><?php echo $this->_tpl_vars['msgnum']; ?>
</td>
        <td>未回复留言:</td>
        <td><?php echo $this->_tpl_vars['renum']; ?>
</td>
    </tr>
</table>
<table>
    <tr>
    	<td><a href="<?php echo $this->_tpl_vars['root']; ?>
/getdig.php" target="hidef">获取最新钢材行情</a></td>
    </tr>
</table>
<?php if ($this->_tpl_vars['alert']): ?>
<script type="text/javascript">alert('修改成功')</script>
<?php endif; ?>
<iframe name="hidef" href="#" style="display:none"></iframe>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>