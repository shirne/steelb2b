<{include file="public/top.tpl"}>
	<form name="search" method="get" action="<{$app}>/product/getenter">
    <label>搜索:<input type="text" name="key" value="<{$smarty.get.key}>" /></label>　　<input type="submit" value="搜索" />
    </form>
    <div id="result">
    	<{section loop=$list name="ls"}>
        <a href="javascript:" onclick="fill(this,'edit','company')"><{$list[ls].company}></a>
        <{/section}>
    </div>
<{include file="public/bottom.tpl"}>
