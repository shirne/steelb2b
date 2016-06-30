<{include file="public/top.tpl"}>
	<div class="wraper">
    	<{include file="user/left.tpl"}>
        
        <!--主版块-->
<style type="text/css">
#main table td{height:22px}
#main table td.r{text-align:right;}
#main table td.l{text-align:left;padding-left:12px;}
</style>
        <div id="main" class="left main enter">
        	<h1 class="title">
            	<span class="right border"></span>
                <span class="left border"></span>
            	<span class="title left"><span>会员信息</span></span>
            </h1>
            <div class="content">
                <table>
                    <tr>
                        <td class="r" width="120">用户名：</td>
                        <td class="l"><{$user.qa_user}>　　<{if $user.filt}><font color="green">[已认证]</font><{else}><font color="red">[未认证]</font><{/if}></td>
                    </tr>
                    <tr>
                        <td class="r">公司中文名称： </td>
                        <td class="l"><{$user.company}></td>
                    </tr>
                    <tr>
                        <td class="r">公司英文名称： </td>
                        <td class="l"><{$user.ecompany}></td>
                    </tr>
                    <tr>
                        <td class="r">公司简称： </td>
                        <td class="l"><{$user.scompany}></td>
                    </tr>
                    <tr>
                        <td class="r">联系电话：</td>
                        <td class="l"><{$user.tele}></td>
                    </tr>
                    <tr>
                        <td class="r">传真号码：</td>
                        <td class="l"><{$user.fax}></td>
                    </tr>
                    <tr>
                        <td class="r">所在地： </td>
                        <td class="l"><{$user.prov}>．<{$user.city}>．<{$user.area}></td>
                    </tr>
                    <tr>
                        <td class="r">所属钢市： </td>
                        <td class="l"><{$user.scity}></td>
                    </tr>
                    <tr>
                        <td class="r">邮政编码：</td>
                        <td class="l"><{$user.zcode}></td>
                    </tr>
                    <tr>
                        <td class="r">联系人：</td>
                        <td class="l"><{$user.contact}></td>
                    </tr>
                    <tr>
                        <td class="r">联系地址： </td>
                        <td class="l"><{$user.addr}></td>
                    </tr>
                    <tr>
                        <td class="r">E-mail地址：</td>
                        <td class="l"><{$user.email}></td>
                    </tr>
                    <tr>
                        <td class="r">公司主页：</td>
                        <td class="l"><a href="<{$user.url}>" target="_blank"><{$user.company}></a></td>
                    </tr>
                    <tr>
                        <td class="r">开户银行：</td>
                        <td class="l"><{$user.bank}></td>
                    </tr>
                    <tr>
                        <td class="r">银行账号：</td>
                        <td class="l"><{$user.banknum}></td>
                    </tr>
                    <tr>
                        <td class="r">业务范围： </td>
                        <td class="l"><{$user.business}></td>
                    </tr>
                    <tr>
                        <td class="r">公司简介： </td>
                        <td class="l"><{$user.content}></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<{include file="public/bottom.tpl"}>