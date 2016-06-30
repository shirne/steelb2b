/*基本函数区*/
function $(id){return document.getElementById(id)}
function ce(tag){return document.createElement(tag)}
function next(DOMObj){
	n=DOMObj;
	while(n=n.nextSibling){
		if(n.nodeType==1){
			return n;
		}
	}
	return false
}
function prev(DOMObj){
	p=DOMObj;
	while( p=p.previousSibling){
		if(p.nodeType==1){
			return p;
		}
	}
	return false;
}
var ie=function(ua){return /msie/.test(ua) && !/opera/.test(ua)}(window.navigator.userAgent.toLowerCase());

var hide=ie?function(){
		if(this.tagName){
			var o=this;
			if(!o.filters['alpha'])o.style.filter='alpha(opacity=100)';
			var op=o.filters['alpha']['opacity'],s=op/50,t;
			t=setInterval(function(){
				op-=s;
				o.style.filter='alpha(opacity='+op+')';
				if(op<=0){
					clearInterval(t);
					o.parentNode.removeChild(o)
				}
			},10)
		}
	}:function(){
		if(this.tagName){
			var o=this
			if(!o.style.opacity)o.style.opacity=1;
			var op=o.style.opacity,s=op/20,t;
			t=setInterval(function(){
				op-=s;
				o.style.opacity=op;
				if(op<=0){
					clearInterval(t);
					o.parentNode.removeChild(o)
				}
			},10)
		}
	};

function every(fn){
	if(!this.length)return fn.call(this);;
	for(var i=0;i<this.length;i++){
		fn.call(this[i]);
	}
}


/*扩展函数区*/
function syncck(o,f,c){
	var cs=document[f][c]||[],ck=o.checked
	every.call(cs,function(){this.checked=ck})
}

function bindAction(tag,like,notice){
	var nodes=document.getElementsByTagName(tag);
	every.call(nodes,function(){
			if(this.innerHTML.match(new RegExp(like,'gim'))){
				this.onclick=function(){
					if(confirm(notice)){
						return true;
					}else{
						return false;
					}
				}
			}
		});
}

function bindSubmit(fname,rule){
	var f=document[fname];
	f.oncubmit=function(){
		for(var i in rule){
			if(!f[i])continue;
			if(!f[i].length){
				switch(f[i].tagName.toLowerCase()){
					case 'select':
						break;
					case 'input':
						switch(f[i].type.toLowerCase()){
							case 'text':
							case 'password':
							case 'button':
							case 'submit':
								if(!f[i].value.match(new RegExp(rule[i]['rule'],'igm'))){
									alert(rule[i]['tip']);
									f[i].focus();
									return false;
								}
								break;
							case 'radio':
							case 'checkbox':
								break;
							default:
						}
						break;
					default:
				}
			}
		}
	}
}

function winO(url,w,h){
	wa=(document.documentElement.clientWidth-w)/2;
	window.open(url,'newwindow','height='+h+',width='+w+',top=20,left='+wa+',toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no');
}

function fill(o,f,t){
	var txt=o.innerHTML;
	w=window.opener;
	if(w && w.document[f][t])
		w.document[f][t].value=txt;
	else
		window.opener=null;
	window.close()
}

function ajaxcate(o,s,u){
	if(o.options){
		for(var i=0;i<o.options.length;i++){
			if(o.options[i].selected){
				get(u+(o.options[i].getAttribute('uid')),function(d){
						try{
							var data=eval(d);
							s.innerHTML='';
							for(var k=0;k<data.length;k++){
								s.options[k]=new Option(data[k],data[k]);
							}
						}catch(err){
							alert('获取资料失败\n'+err);
						}
					})
			}
		}
	}
}


function get(url,fn){
	var a=function(){
			try{
				return new XMLHttpRequest;
			}catch(e){
				try{
					return new ActiveXObject('MSXML2.XMLHTTP');
				}catch(e){
					return new ActiveXObject('Microsoft.XMLHTTP');
				}
			}
		}();
	a.open('get',url,true);
	a.onreadystatechange=function(){
		if(a.readyState==4){
			if(a.status==200){
				fn(a.responseText,a);
			}else{
				fn(a.status,a);
			}
		}
	}
	a.send(null);
}

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


var loadevents=[];
function addload(fn){
	loadevents.push(fn);
}

window.onload=function(){
	for(var i=0;i<loadevents.length;i++){
		loadevents[i]();
	}
}

addload(function(){
	var ips=document.getElementsByTagName('input');
	for(var i=0;i<ips.length;i++){
		if(ips[i].className.match(/\bWdate\b/i))
			ips[i].onclick=function(){new Calendar().show(this);};
	}
});