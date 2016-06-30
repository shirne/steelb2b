<?php /* Smarty version 2.6.18, created on 2011-11-29 17:47:52
         compiled from sys/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--全局配置-->
<form name="config" method="post" action="<?php echo $this->_tpl_vars['app']; ?>
/sys/savecfg">
<table style="width:680px;margin:0 auto">
	<caption>网站全局配置</caption>
    <tbody>
    	<tr>
        	<td width="80">网站名称：</td>
            <td><input type="text" name="sitename" value="<?php echo $this->_tpl_vars['cfg']['sitename']; ?>
" size="60" /></td>
        </tr>
        <tr>
        	<td>网站域名：</td>
            <td><input type="text" name="siteurl" value="<?php echo $this->_tpl_vars['cfg']['siteurl']; ?>
" size="60" /><span class="tip">http://<?php echo $_SERVER['SERVER_NAME']; ?>
</span></td>
        </tr>
        <tr>
        	<td>网站标题：</td>
            <td><input type="text" name="sitetitle" value="<?php echo $this->_tpl_vars['cfg']['sitetitle']; ?>
" size="60" /></td>
        </tr>
        <tr>
        	<td>网站关键字：</td>
            <td><input type="text" name="keyword" value="<?php echo $this->_tpl_vars['cfg']['keyword']; ?>
" size="60" /><span class="tip">使用'<font class="red"> | </font>'分割</span></td>
        </tr>
        <tr>
        	<td>网站说明：</td>
            <td><input type="text" name="descp" value="<?php echo $this->_tpl_vars['cfg']['descp']; ?>
" size="60" /></td>
        </tr>
        <tr>
        	<td>友情链接显示方式：</td>
            <td>
            	<label><input type="radio" name="linktype" value="1" <?php if ($this->_tpl_vars['cfg']['isrun']): ?>checked="checked"<?php endif; ?> />图片</label>　　
                <label><input type="radio" name="linktype" value="0" <?php if ($this->_tpl_vars['cfg']['isrun'] == false): ?>checked="checked"<?php endif; ?> />文字</label>
            </td>
        </tr>
        <tr>
        	<td>客服QQ：</td>
            <td><textarea name="qqs" style="width:400px;height:40px;"><?php echo $this->_tpl_vars['cfg']['qqs']; ?>
</textarea><span class="tip">多个QQ请使用'<font class="red"> | </font>'分开</span><br /><span class="tip">如果QQ添加后显示未启用,用该QQ登录<a href="http://wp.qq.com/" target="_blank">http://wp.qq.com/</a>即可</span></td>
        </tr>
		<tr>
        	<td>客服QQ：</td>
            <td>
            	<label><input type="radio" name="service" value="1" <?php if ($this->_tpl_vars['cfg']['service']): ?>checked="checked"<?php endif; ?> />显示</label>　　
                <label><input type="radio" name="service" value="0" <?php if ($this->_tpl_vars['cfg']['service'] == 0): ?>checked="checked"<?php endif; ?> />隐藏</label>
            </td>
        </tr>
		<tr>
        	<td>对联广告：</td>
            <td>
            	<label><input type="radio" name="couplet" value="1" <?php if ($this->_tpl_vars['cfg']['couplet']): ?>checked="checked"<?php endif; ?> />显示</label>　　
                <label><input type="radio" name="couplet" value="0" <?php if ($this->_tpl_vars['cfg']['couplet'] == 0): ?>checked="checked"<?php endif; ?> />隐藏</label>
            </td>
        </tr>
        <tr>
        	<td>网站统计：</td>
            <td>
            	<label><input type="radio" name="visitor" value="1" <?php if ($this->_tpl_vars['cfg']['visitor']): ?>checked="checked"<?php endif; ?> />显示</label>　　
                <label><input type="radio" name="visitor" value="0" <?php if ($this->_tpl_vars['cfg']['visitor'] == 0): ?>checked="checked"<?php endif; ?> />隐藏</label>
            </td>
        </tr>
		<tr>
        	<td>访客数：</td>
            <td>
            	<label><input type="text" name="visitora" value="<?php echo $this->_tpl_vars['cfg']['visitora']; ?>
" readonly="readonly" />真实</label>　　
                <label><input type="text" name="visitors" value="<?php echo $this->_tpl_vars['cfg']['visitors']; ?>
"  /></label>
            </td>
        </tr>
        <tr>
        	<td>网站开关：</td>
            <td>
            	<label><input type="radio" name="isrun" value="1" <?php if ($this->_tpl_vars['cfg']['isrun']): ?>checked="checked"<?php endif; ?> />开启</label>　　
                <label><input type="radio" name="isrun" value="0" <?php if ($this->_tpl_vars['cfg']['isrun'] == false): ?>checked="checked"<?php endif; ?> />关闭</label>
                <span class="tip">关闭后前台将不能访问</span>
            </td>
        </tr>
        <tr>
        	<td>IP阻止：</td>
            <td>
            	<label><input type="radio" name="ipstop" value="1" <?php if ($this->_tpl_vars['cfg']['ipstop']): ?>checked="checked"<?php endif; ?> />开启</label>　　
                <label><input type="radio" name="ipstop" value="0" <?php if ($this->_tpl_vars['cfg']['ipstop'] == false): ?>checked="checked"<?php endif; ?> />关闭</label>
                <span class="tip">设置为开启时下面列出的IP将不能访问本站</span>
            </td>
        </tr>
        <tr>
        	<td>阻止的IP：</td>
            <td><textarea name="stopip" style="width:400px;height:50px;"><?php echo $this->_tpl_vars['cfg']['stopip']; ?>
</textarea><span class="tip">多个IP请使用'<font class="red"> | </font>'分开</span></td>
        </tr>
        <tr>
        	<td>网站版权：</td>
            <td><textarea name="copyright" style="width:400px;height:100px;"><?php echo $this->_tpl_vars['cfg']['copyright']; ?>
</textarea></td>
        </tr>
    </tbody>
    <tfoot>
    	<tr>
        	<td>&nbsp;</td>
            <td><input type="submit" value="保存设置" /><input type="reset" value="重置" /></td>
        </tr>
    </tfoot>
</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>