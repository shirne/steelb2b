<{include file="public/top.tpl"}>
<style type="text/css">
table#reg td.r{text-align:right}
table#reg td.l{text-align:left;padding-left:10px;}
table#reg td textarea{width:90%}
table#reg td span.tip{background:#ffffe1;border:1px #999 solid;height:20px;line-height:20px;padding:0 5px}
table#reg td span.warning{color:#f60;border-color:#f60}
</style>
<script type="text/javascript" src="<{$res}>/scripts/area.js"></script>
<script type="text/javascript" src="<{$res}>/scripts/reg.js"></script>
	<div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;<a href="<{$app}>/user">会员中心</a>&gt;&gt;新会员注册</div>
    </div>
    
    <div class="wraper">
    	
        <{include file="user/left.tpl"}>
        
        <!--main columns-->
        <div id="main" class="left main enter">
            <h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>会员注册</span></span>
            </h1>
            <div class="content">
            	<form name="reg" method="post" action="<{$app}>/user/add">
                    <table id="reg" style="width:700px;margin:10px auto">
                        <tr>
                            <td colspan="4">请如实填写下列项目，注意：带有“<font color="#ff0000">*</font>”的项目必须填写。</td>
                        </tr>
                        <tr>
                            <td width="100" class="r">用 户 名：</td>
                            <td colspan="3" class="l"><input type="text" name="username" size="20" maxlength="20" check="[a-z_0-9]{5,20}" msg="请拟定您的登录帐号" warn="会员帐号必须在5-20个字之内,只能使用字母,数字,下划线" />
                            <font color="red">*</font></td>
                        </tr>
                        <tr>
                            <td class="r">用户密码：</td>
                            <td colspan="3" class="l"><input type="password" name="password" size="20" maxlength="20" dataType="Limit" min="6" max="20" check=".{6,16}" msg="请填写您的登录密码" warn="用户密码长度必须在6-16个字之内"  style="ime-mode:disabled" />
                            <font color="red">*</font></td>
                        </tr>
                        <tr>
                            <td class="r">确认密码：</td>
                            <td colspan="3" class="l"><input type="password" name="repassword" size="20" maxlength="20" dataType="Limit" min="6" max="20"  check=".{6,16}" msg="请确认您的登录密码" warn="请确认密码与上面保持一致"  style="ime-mode:disabled" />
                            <font color="red">*</font></td>
                        </tr>
                        <tr>
                            <td class="r">公司中文名称： </td>
                            <td colspan="3" class="l"><input type="text" name="company" size="50" maxlength="100" msg="请填写公司中文全称" /></td>
                        </tr>
                        <tr>
                            <td class="r">公司英文名称： </td>
                            <td colspan="3" class="l"><input type="text" name="ecompany" size="50" maxlength="200"  msg="请填写公司英文名称"/>               
                            </td>
                        </tr>
                        <tr>
                            <td class="r">公司简写名称： </td>
                            <td colspan="3" class="l"><input type="text" name="scompany" size="50" maxlength="100" msg="请填写公司简称"/>               
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="r">所在地： </td>
                            <td colspan="3" class="l">
                            <select name="prov" >
                                <option value="" >==请选择==</option>
                            </select> 
                            <select name="city">
                                <option value="" >==请选择==</option>
                            </select> 
                            <select name="area">
                                <option value="" >==请选择==</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="r">联系地址： </td>
                            <td class="l"><input type="text" name="addr" size="20" maxlength="100" check=".{1,100}" msg="请填写您的详细地址" msg="您的地址过长,请扼要填写" /><font color="red">*</font></td>
                            <td class="r">邮政编码：</td>
                            <td class="l"><input type="text" name="zcode" size="20" maxlength="6" check="(\d{6}|.{0})" msg="请填写邮编" warn="邮政编码不正确"  style="ime-mode:disabled" /></td>
                        </tr>
                        
                        <tr>
                            <td class="r">所属钢市： </td>
                            <td class="l">
                            <select name="scity">
                                <{section loop=$city name="ct"}>
                                <option value="<{$city[ct].name}>"><{$city[ct].name}></option>
                                <{/section}>
                            </select>
                            </td>
                            <td class="r">门牌号：</td>
                            <td class="l"><input type="text" name="door" size="20" maxlength="20" msg="请填写您的营业门牌号"  style="ime-mode:disabled" /></td>
                        </tr>
                        
                        <tr>
                            <td class="r">联系人：</td>
                            <td class="l"><input type="text" name="contact" value="" size="20" maxlength="50" msg="只用填写称呼就可以了" /></td>
                            <td class="r">电话号码：</td>
                            <td class="l"><input type="text" name="tele" size="20" maxlength="30" msg="请填写可以联系到您的电话" check="((\d{4}-)?\d{7,8}|.{0})" warn="请检查电话号码无误!" style="ime-mode:disabled"/></td>
                        </tr>
                        
                        <tr>
                            <td class="r">手机号码：</td>
                            <td class="l"><input type="text" name="mobile" size="20" maxlength="20" check="\d{11}" msg="请填写您使用的手机号码" style="ime-mode:disabled"/><font color="red">*</font></td>
                            <td class="r">传真号码：</td>
                            <td class="l"><input type="text" name="fax" size="20" maxlength="30" style="ime-mode:disabled"/></td>
                        </tr>
                        <tr>
                            <td class="r">E-mail地址：</td>
                            <td class="l"><input type="text" name="email" size="20" maxlength="30" check="([a-z_0-9\.\-]{3,20}@([a-z_0-9\-]{1,20}\.)+[a-z]{1,5}|.{0})" msg="请填写您的常用邮箱" warn="邮箱格式不正确"  style="ime-mode:disabled"/></td>
                            <td class="r">公司主页：</td>
                            <td class="l"><input type="text" name="url" value="http://" size="20" maxlength="100" check="(https?:\/\/(\w+\.)+\w+[\w\d\/\-\.]*|.{0}|http:\/\/)" msg="请填写您或公司的网址" warn="格式不正确" style="ime-mode:disabled"></td>
                        </tr>
                        <tr>
                            <td class="r">开户银行：</td>
                            <td class="l"><input type="text" name="bank" size="20" maxlength="100" msg="请填写银行名称" /> </td>
                            <td class="r">银行账号：</td>
                            <td class="l"><input type="text" name="banknum" size="20" maxlength="100" msg="银行帐号."  style="ime-mode:disabled" /> </td>
                        </tr>
                        <tr>
                            <td class="r">业务范围： </td>
                            <td colspan="3" class="l"><textarea name="business" rows="3"  check="[^`]{0,200}" msg="请填写公司经营的业务" warn="业务范围必须在200个字之内"></textarea></td>
                        </tr>
                        <tr>
                            <td class="r">公司简介： </td>
                            <td colspan="3" class="l"><textarea name="content" rows="6" check="[^`]{0,500}" msg="请填写公司说明"  msg="公司简介必须在500个字之内"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                            <input type="submit" class="button" value="注册提交">　　
                            <input type="reset" class="button" value="重新填写">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        
        <!--clear float-->
        <div class="clear"></div>
    </div>
    
    <script type="text/javascript">
    $(function(){
		initArea('reg');
		form('reg');
	})
    </script>
<{include file="public/bottom.tpl"}>