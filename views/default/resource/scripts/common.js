function initsearch(o,v){
	if(o.value==v){
		o.value='';
	}
	o.onblur=function(){
		if(this.value.match(/^\s*$/))this.value=v;
	}
}

function listHover(lists){
	var hcla='hover'
	lists.hover(function(){
		$(this).addClass(hcla);
	},
	function(){
		$(this).removeClass(hcla);
	})
}

function tab(ts,cs){
	var tcla='active',t;
	$.each(ts,function(i){
		ts.eq(i).mouseover(function(){
			clearTimeout(t);
			t=setTimeout(function(){
				ts.removeClass(tcla).eq(i).addClass(tcla);
				cs.removeClass(tcla).eq(i).addClass(tcla);
			},100)
		})
	})
}

function clickTab(ts,cs){
	var tcla='active';
	$.each(ts,function(i){
		ts.eq(i).click(function(){
			ts.removeClass(tcla).eq(i).addClass(tcla);
			cs.removeClass(tcla).eq(i).addClass(tcla);
		})
	})
}

function autoTab(ts,cs){
	var tcla='current',t,cindex=0;
	
	function auto(){
		clearInterval(t);
		t=setInterval(function(){mouseoverHandle()},2000)
	}
	function mouseoverHandle(e){
		if(typeof e=="object"){
			clearInterval(t);
			cindex=ts.index(e.target);
		}
		
		ts.removeClass(tcla).eq(cindex).addClass(tcla);
		cs.removeClass(tcla).eq(cindex).addClass(tcla);
		cindex==ts.length-1?cindex=0:cindex++;
	}
	ts.bind('mouseenter',mouseoverHandle)
	ts.bind('mouseleave',auto)
	cs.bind('mouseenter',function(e){
			clearInterval(t);
		});
	cs.bind('mouseleave',auto)
	auto();
}

function flash(o){
	var s={
		width:710,
		height:323,
		config:'0xffffff|2|0x000066|60|0xffffff|0x88dd11|0x224444|6|0|1|_blank',
		imgs:'',
		links:'',
		txts:'',
		path:'/images/focus.swf'
		};
	if(o){$.extend(s,o)}
	
	return swf(s.width,s.height,{path:s.path,FlashVars:'bcastr_file=' + s.imgs + '&bcastr_link=' + s.links + '&bcastr_title=' + s.txts + '&bcastr_config='+ s.config });
}

function sosofocus(o){
	var s={
		width:246,
		height:169,
		config:'0xffffff|2|0x000000|60|0xffffff|0xff6633|0x224444|6|0|1|_blank',
		imgs:'',
		links:'',
		txts:'',
		path:'/images/focus.swf'
		};
	if(o){$.extend(s,o)}
	
	return swf(s.width,s.height,{path:s.path,FlashVars:'bcastr_file=' + s.imgs + '&bcastr_link=' + s.links + '&bcastr_title=' + s.txts + '&bcastr_config='+ s.config +'" quality="high" width="' + s.width + '" height="' + s.height })
}

//output swf object,return string
function swf(w,h,p){
	var pm=$.extend({path:'',wmode:'opaque',quality:'high'},p||{}),rswf;
	if($.browser.msie){
		rswf='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cabversion=6,0,0,0" width="' +
w + '" height="' + h + '">\n';
		for(var i in pm){
			if(i=='path'){
				rswf+='<param name="movie" value="'+pm[i]+'">';
			}else{
				rswf+='<param name="'+ i +'" value="'+pm[i]+'">';
			}
		}
		return rswf + '</object>';
	}else{
		rswf='<embed width="' + w + '" height="' + h +'"';
		for(var i in pm){
			if(i=='path'){
				rswf+=' src="'+pm[i]+'"';
			}else{
				rswf+=' '+ i +'="'+pm[i]+'"';
			}
		}
		return rswf + ' type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>';
	}
}

//auto scroll functions
function scrollTable(t,h,l){
	var b=t[0].tBodies[0],bb=b.outerHTML||'<tbody>'+b.innerHTML+'</tbody>',nt,demo2,demo1,demo;
	t[0].removeChild(b);
	t[0].parentNode.appendChild(demo=document.createElement('div')).appendChild(demo1=document.createElement('div')).appendChild(nt=document.createElement('table')).appendChild($(bb)[0]);
	nt.width='100%';
	demo.style.cssText='height:'+h*l+'px;overflow:hidden';
	demo.appendChild(demo2=document.createElement('div'));
	
	startscroll(demo,demo1,demo2);
}

function scrollLi(o,h,l){
	var b=o[0],bb=b.innerHTML,nt,demo2,demo1,demo;
	b.removeChild(b.getElementsByTagName('ul')[0]);
	b.appendChild(demo=document.createElement('div')).appendChild(demo1=document.createElement('div')).innerHTML=bb;
	demo.style.cssText='height:'+h*l+'px;overflow:hidden';
	demo.appendChild(demo2=document.createElement('div'));
	startscroll(demo,demo1,demo2)
}

function startscroll(demo,demo1,demo2){
	var speedtt=70,offtop=demo1.offsetHeight*2-demo.offsetHeight;
	demo2.innerHTML=demo1.innerHTML;
	function Marquee11(){
		if(demo.scrollTop>=offtop){
			demo.scrollTop-=demo1.offsetHeight;
		}else{
			demo.scrollTop++;
		}
	}
	var MyMar22=setInterval(Marquee11,speedtt);
	demo.onmouseover=function() {clearInterval(MyMar22)};
	demo.onmouseout=function() {MyMar22=setInterval(Marquee11,speedtt)};
}

//image object resize
function resize(o,w,h){
	var s=o.width/o.height;
	if(s>w/h){
		if(o.width>w){
			o.width=w;
			o.parentNode.style.height=o.width/s+'px';
		}
	}else{
		if(o.height>h){
			o.height=h;
		}else{
			o.parentNode.style.height=o.height+'px';
		}
	}
}

function cls(){
	if(!window.opener){
		window.opener=null;
		window.open("",'_self',"");
	}
	window.close();
}

function getmodel(u,f,p,o){
	var id;
	for(var i=0;i<o.options.length;i++){
		if(o.options[i].selected){
			if(o.options[i].value==''){
				var s=document[f][p];
				s.innerHTML="";
				s.options[0]=new Option('不限品种','');
				return false;
			}
			id=o.options[i].getAttribute('uid');
		}
	}
	$.get(u+'?pid='+id,function(d){
				try{
					var s=document[f][p],data=eval(d);
					s.innerHTML="";
					s.options[0]=new Option('不限品种','');
					for(var i=1;i<=data.length;i++){
						s.options[i]=new Option(data[i-1],data[i-1]);
					}
				}catch(err){
					alert('获取信息错误!');
				}
			})
}

function setFavorite(){
	var ua = navigator.userAgent.toLowerCase();
	 if(ua.indexOf("msie 8")>-1){
		 external.AddToFavoritesBar('<{$cfg.siteurl}>','<{$cfg.sitetitle}>','');//IE8
	 }else{
		 try {
			 window.external.addFavorite('<{$cfg.siteurl}>','<{$cfg.sitetitle}>');
		 } catch(e) {
			 try {
				 window.sidebar.addPanel('<{$cfg.sitetitle}>','<{$cfg.siteurl}>', "");//firefox
			 } catch(e) {
				 alert("加入收藏失败，请使用Ctrl+D进行添加");
			 }
		 }
	 }
}

//地区
function initArea(f,prov,city,area,an){
	var f=document[f],
		p=f.prov,
		c=f.city,
		a=f.area,
		an=an||false;
	p.innerHTML='';
	if(an)p.options[p.options.length]=new Option('-不限-','');
	p.onchange=fillCity
	c.onchange=fillArea
	for(var n in areas){
		p.options[p.options.length]=new Option(n,n);
		if(prov==n)p.options[p.options.length-1].selected='selected';
	}
	fillCity();
	function fillCity(){
		var cs=areas[p.value]||{}
		c.innerHTML='';
		if(an)c.options[c.options.length]=new Option('-不限-','');
		for(var n in cs){
			c.options[c.options.length]=new Option(n,n);
			if(city==n)c.options[c.options.length-1].selected='selected';
		}
		fillArea();
	}
	function fillArea(){
		var cs=areas[p.value]?areas[p.value][c.value]?areas[p.value][c.value]:[]:[]
		a.innerHTML='';
		if(an)a.options[a.options.length]=new Option('-不限-','');
		for(var i =0;i<cs.length;i++){
			a.options[a.options.length]=new Option(cs[i],cs[i]);
			if(area==cs[i])a.options[a.options.length-1].selected='selected';
		}
	}
}

//广告
var ad={
	p:{},
	c:{},
	width:0,
	height:0,
	show:function(a,b){
		if(!b)b=0;
		if(a==0){
			this.width=992;
			this.height=219;
			document.write(this.html(this.c[a] || this.p));
		}else if(a<4){
			this.width=516;
			this.height=95;
			document.write(this.html(this.c[a] || this.p));
		}else{
			if(a==6){
				this.width=170;
				this.height=95;
			}else if(a==8){
				this.width=996;
				this.height=300;
			}else{
				this.width=230;
				this.height=66;
			}
			document.write(this.html(this.c[a]?(this.c[a][b]||this.p):this.p));
		}
	},
	html:function(o){
		if(!o)return '';
		var borderstr='';
		if(o.border){
			this.width-=2;
			this.height-=2;
			borderstr='border:1px #ccc solid';
		}
		str=(o.link!=''?'<a href="'+o.link+'" target="_blank"':'<a ');
		if(o.type==1){
			return str+'><img width="'+this.width+'" height="'+this.height+'" src="'+o.path+'" /></a>';
		}else{
			return '<div style="'+borderstr+'"><div class="adwrap">'+str+' style="display:block;width:'+this.width+'px;height:'+this.height+'px;'+($.browser.msie?'filter:alpha(opacity=0);background:#000':'')+'" ></a></div>'+swf(this.width,this.height,{path:o.path})+'</div>';
		}
	},
	add:function(tpe,ttl,lnk,pst,pic,bor){
		if(pst==0 || pst==1 || pst==2 || pst==3){
			this.c[pst]={title:ttl,link:lnk,type:tpe,path:pic,border:!!bor}
		}else{
			if(typeof this.c[pst] != 'object')
				this.c[pst]=[];
			this.c[pst][this.c[pst].length||0]={title:ttl,link:lnk,type:tpe,path:pic,border:!!bor}
		}
	}
}

function every(fn){
	if(!this.length)return fn.call(this);;
	for(var i=0;i<this.length;i++){
		fn.call(this[i]);
	}
}


function textlen(m,s,data){
	var nums=m.length;
	num1=m.match(/[fijl1tI,]/gm)?m.match(/[fijl1tI,]/gm).length:0;
	num2=m.match(/[02-9a-eghkm-su-z]/gm)?m.match(/[02-9a-eghkm-su-z]/gm).length:0;
	num3=m.match(/[A-HJ-Z]/gm)?m.match(/[A-HJ-Z]/gm).length:0;

	return (nums-num1-num2-num3)*s+num1*.4*s+num2*.7*s+num3*.8*s;
}

function syncck(o,f,c){
	var cs=document[f][c]||[],ck=o.checked;
	every.call(cs,function(){this.checked=ck});
}

$(function(){
	var imgs=$('#main div.content img');
	imgs.load(function(){
		if($(this).width()>556){
			scale=$(this).width()/$(this).height();
			this.width=556;
			this.height=556/scale;
		}
	})
})
window.onerror=function(){return true};
