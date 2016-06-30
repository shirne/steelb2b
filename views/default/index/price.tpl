<{include file="public/top.tpl"}>
    <div class="wraper">
    	<div id="position">您现在的位置:<a href="<{$app}>/">网站首页</a>&gt;&gt;各地行情</div>
    </div>
<style type="text/css">
#map{background:url(<{$res}>/images/mapa.png) left top no-repeat;width:800px;height:600px;margin:0 auto;position:relative}
#map div.city{position:absolute;height:16px;border:1px #555 solid;background:url(<{$res}>/images/label_bg.gif) left top repeat-x #fafafa;font-size:12px;line-height:16px;text-align:center}
.data{width:280px;position:absolute;border:1px #aaa solid;background:#eee}
.data table{width:270px;margin:0 auto}
.data table td.red,.data table td.green{font-weight:bold}
.data p.title{text-align:center;font-weight:bold}
.data p.title font{font-weight:normal}
.data p.center{text-align:center}
</style>
<script type="text/javascript">
var data={
	c:{},
	add:function(key,value){
		if(this.c[key]){
			this.c[key][this.c[key].length]=value;
		}else{
			this.c[key]=[value];
		}
	},
	show:function(){
	}
}
<{section loop=$data name="dt"}>
<{section loop=$data[dt].dat name="dat"}>
data.add('<{$data[dt].dat[dat].area}>',['<{$data[dt].dat[dat].name}>','<{$data[dt].dat[dat].material}>','<{$data[dt].dat[dat].model}>','<{$data[dt].dat[dat].price}>','<{$data[dt].dat[dat].rang}>']);
<{/section}>
<{/section}>
</script>
    <div class="wraper">
        <div class="wraper">
			<div></div>
            <div id="map">
            	<{section loop=$cts name="ct"}>
                <div class="city" style="left:<{$cts[ct].p_x|string_format:"%d"}>px;top:<{$cts[ct].p_y|string_format:"%d"}>px;width:<{$cts[ct].name|countlen}>px"><{$cts[ct].name}></div>
                <{/section}>
            </div>
        </div>
        <!--clear float-->
        <div class="clear"></div>
    </div>
    <script type="text/javascript">
    $(function(){
		dat=$('<div class="data"></div>');
		dat.appendTo(document.body).hide();
		$('#map div.city').hover(
			function(){
				var d=data.c[this.innerHTML]||null;
				dat.html('<p class="title">'+this.innerHTML+' <font color="red">'+date()+'</font>'+'</p>');
				if(d){
					var dstr='<table>';
					for(var i=0,ilen=d.length>10?10:d.length;i<ilen;i++){
						dstr+='<tr><td>'+d[i][0]+'</td><td>'+d[i][1]+'</td><td>'+d[i][2]+'</td><td>'+d[i][3]+'</td>';
						if(d[i][4]==0){
							dstr+='<td>--</td></tr>';
						}else if(d[i][4]>0){
							dstr+='<td class="red">&uarr;('+d[i][4]+')</td></tr>';
						}else{
							dstr+='<td class="green">&darr;('+Math.abs(d[i][4])+')</td></tr>';
						}
					}
					dat.append(dstr+'</table>');
				}else{
					dat.append('<p class="center">暂无报价</p>');
				}
				var os=$(this).offset(),
				w=$(this).width(),
				h=$(this).height();
				sc=[$(document).width(),$(document).scrollTop()],
				ot=[sc[0]-os.left>400?$(this).width()+20:-300,os.top-sc[1]>500?-dat.height():0];
				
				dat.css({left:os.left+ot[0],top:os.top+ot[1]});
				dat.show();
			},
			function(){
				dat.hide();
			}
		)
	})
	function date(){
		var d=new Date()
		return d.getFullYear()+'年'+(d.getMonth()+1)+'月'+d.getDate()+'日';
	}
    </script>
<{include file="public/bottom.tpl"}>