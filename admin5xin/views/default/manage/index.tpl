<{include file="public/top.tpl"}>
	<form name="list" method="post" action="<{$app}>/manage/bat">
	<table>
    	<caption>管理员帐户管理</caption>
    	<thead>
        	<tr>
            	<td><input type="checkbox" onclick="syncck(this,'list','id[]')" /></td>
                <td>帐号</td>
                <td>创建日期</td>
                <td>登录次数</td>
                <td>最后登录</td>
                <td>登录IP</td>
                <td>权限</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        	<{section loop=$admlist name="ls"}>
        	<tr>
            	<td><input type="checkbox" name="id[]" value="<{$admlist[ls].id}>"/></td>
                <td><{$admlist[ls].qa_admin}></td>
                <td><{$admlist[ls].create_date|date_format:"%Y/%m/%d %H:%M:%S"}></td>
                <td><{$admlist[ls].login_times|string_format:"%d"}></td>
                <td><{$admlist[ls].login_date|date_format:"%Y/%m/%d %H:%M:%S"}></td>
                <td><{$admlist[ls].login_ip}></td>
                <td><{$admlist[ls].purview|string_format:"%d"}></td>
                <td><a href="<{$app}>/manage/delmgr/id/<{$admlist[ls].id}>">[删除]</a><a href="<{$app}>/manage/cgdata/id/<{$admlist[ls].id}>">[更改]</a></td>
            </tr>
            <{/section}>
        </tbody>
        <tfoot>
        	<tr>
            	<td colspan="8">
                	<!--<label><input type="checkbox" onclick="syncck(this,'list','id[]')" /> 全选</label>
                    <input type="submit" name="act" value="删除" />-->
                </td>
            </tr>
        </tfoot>
    </table>
    </form>
    
    <form name="add" method="post" action="<{$app}>/manage/addmgr">
    <a name="add"></a>
    <table style="width:500px;margin:0 auto;margin-top:10px;">
    	<caption>添加管理员</caption>
        <tr>
        	<td>帐户:</td>
            <td><input type="text" name="username" /></td>
        </tr>
        <tr>
        	<td>密码:</td>
            <td><input type="password" name="pwd" /></td>
        </tr>
        <tr>
        	<td>确认密码:</td>
            <td><input type="password" name="pwd2" /></td>
        </tr>
        <tr>
        	<td>权限:</td>
            <td><input type="text" name="purview" value="255" /></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
            <td><input type="submit" value="添加" /></td>
        </tr>
    </table>
    </form>
<{include file="public/bottom.tpl"}>
