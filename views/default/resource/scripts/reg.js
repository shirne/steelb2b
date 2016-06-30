/*注册页面*/
function form(fname){
	var f=document[fname],es=f.elements;
	for(var i=0,ilen=es.length;i<ilen;i++){
		if(es[i].disabled || es[i].name=='')continue;
		$(es[i]).parent().css('position:relative');
		$(es[i]).focus(function(){
			var _=$(this),pst=_.position(),w=_.width(),h=_.height(),msg=_.attr('msg');
			if(msg){
				var tps=_.parent().find('span.tip').length?
						_.parent().find('span.tip'):
						$('<span class="tip" style="position:absolute;display:none;width:'+textlen(msg,12)+'px;left:'+(pst.left+w+10)+'px;top:'+(pst.top-(20-h)*.5)+'px">'+msg+'</span>').appendTo(_.parent());
					tps.text(msg).css('width',textlen(msg,12)).fadeIn();
					_.blur(function(){
							if(this.chk())
								tps.removeClass('warning').fadeOut();
							else
								$(this).attr('warn')?tps.text($(this).attr('warn')).css('width',textlen($(this).attr('warn'),12)).addClass('warning'):
									tps.addClass('warning');
						}
					);
			}
		})
		
		switch(es[i].tagName.toLowerCase()){
			case 'input':
				switch(es[i].type.toLowerCase()){
					case 'text':
						es[i].chk=function(){return this.value.match(new RegExp('^'+($(this).attr('check')||'.*')+'$','igm'))}
						break;
					case 'password':
						es[i].chk=function(){
							if(this.name=="repassword")
								bool=(this.value==this.form.password.value)
							else 
								bool=true;
							return this.value.match(new RegExp('^'+($(this).attr('check')||'.*')+'$','igm')) && bool
						}
						break;
					case 'check':
					case 'radio':
					default:
				}
				break;
			case 'textarea':
				es[i].chk=function(){return this.value.match(new RegExp('^'+($(this).attr('check')||'.*')+'$','igm'))}
				break;
			case 'select':
				es[i].chk=function(){return this.options[this.selectedIndex].value.match(new RegExp('^'+($(this).attr('check')||'.*')+'$','igm'))}
				break;
			case 'button':
			default:
				
		}
	}
	f.onsubmit=function(){
		if($(f).find('span.tip.warning').length>0){
			alert('请将资料填写正确');
			return false;
		}
		
		if(f.username)if(!f.username.chk()){alert('用户名格式不正确');f.username.focus();return false}
		if(f.password)if(!f.password.chk()){alert('用户密码格式不正确');f.username.focus();return false}
		if(f.repassword)if(!f.repassword.chk() && f.repassword.value==f.password.value){alert('请确认密码输入一致');f.username.focus();return false}
		if(!f.addr.chk()){
			alert('请将资料填写完整正确');
			f.addr.focus();
			return false;
		} 
		if(!f.mobile.chk()){alert('请填写手机号,码方便联系');f.mobile.focus();return false}
	}
}

