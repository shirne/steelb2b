<?php
	class news
	{
		/*综合资讯*/
		function index(){
			$ns=D('news');
			$nc=D('n_class');
			$where=array('isshow'=>1);
			$fcate=$nc->where(array('pid'=>3))->order('sort asc,id desc')->select();
			if(empty($_GET['cate']))
				$_GET['cate']=$fcate[0]['id'];
			
			if(!$sc=$nc->where($_GET['cate'])->find())
				$this->error('新闻分类没有找到',1,'news/index');
			
			$path=$sc['path'];
			$parr=explode(',',$path);
			$parr[]=$sc['id'];
			switch($parr[1])
			{
				case 1:
					$this->redirect('about','cate/'.$sc['id']);
					break;
				case 2:
					$this->redirect('service','cate/'.$sc['id']);
					break;
				case 5:
					$this->redirect('knowledge','cate/'.$sc['id']);
					break;
				case 4:
					$this->redirect('market','cate/'.$sc['id']);
					break;
			}
			$where['class']=$sc['id'];
			
			$page=new page($ns->where($where)->total(),F_PAGE,'cate/'.$sc['id']);
			
			$list=$ns->where($where)->order('date desc')->limit($page->limit)->select();
			/*页面变量*/
			$this->assign('index',6);
			$this->assign('css','sub1');
			$this->assign('title','综合资讯');
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*数据*/
			$this->assign('sc',$sc);
			$this->assign('list',$list);
			$this->assign('mcate',$fcate);
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function about(){
			$ns=D('news');
			$fcate=1;
			$list=$ns->field('id,title')->where(array('class'=>$fcate))->order('date asc')->select();
			if(empty($_GET['id']))$_GET['id']=$list[0]['id'];
			if(!$cont=$ns->where($_GET['id'])->find())
			{
				$_GET['id']=$list[0]['id'];
				$cont=$ns->where($_GET['id'])->find();
			}
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*页面变量*/
			$this->assign('index',1);
			$this->assign('css','sub1');
			$this->assign('title','市场介绍');
			$this->assign('list',$list);
			$this->assign('cont',$cont);
			$this->display();
		}
		
		function service(){
			$ns=D('news');
			$fcate=2;
			$list=$ns->field('id,title')->where(array('class'=>$fcate))->order('date asc')->select();
			if(empty($_GET['id']))$_GET['id']=$list[0]['id'];
			if(!$cont=$ns->where($_GET['id'])->find())
			{
				$_GET['id']=$list[0]['id'];
				$cont=$ns->where($_GET['id'])->find();
			}
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*页面变量*/
			$this->assign('index',2);
			$this->assign('css','sub1');
			$this->assign('title','配套服务');
			$this->assign('list',$list);
			$this->assign('cont',$cont);
			$this->display();
		}
		
		function market(){
			$ns=D('news');
			$nc=D('n_class');
			$where=array('isshow'=>1);
			$fcate=$nc->where(array('pid'=>4))->order('sort asc,id desc')->select();
			if(empty($_GET['cate']))
				$_GET['cate']=$fcate[0]['id'];
			
			if(!$sc=$nc->where($_GET['cate'])->find())
				$this->error('新闻分类没有找到',1,'news/index');
			
			$path=$sc['path'];
			$parr=explode(',',$path);
			$parr[]=$sc['id'];
			switch($parr[1])
			{
				case 1:
					$this->redirect('about','cate/'.$sc['id']);
					break;
				case 2:
					$this->redirect('service','cate/'.$sc['id']);
					break;
				case 5:
					$this->redirect('knowledge','cate/'.$sc['id']);
					break;
				case 3:
					$this->redirect('index','cate/'.$sc['id']);
					break;
			}
			$where['class']=$sc['id'];
			
			$page=new page($ns->where($where)->total(),F_PAGE,'cate/'.$sc['id']);
			
			$list=$ns->where($where)->order('date desc')->limit($page->limit)->select();
			/*页面变量*/
			$this->assign('index',7);
			$this->assign('css','sub1');
			$this->assign('title','行情快递');
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*数据*/
			$this->assign('sc',$sc);
			$this->assign('list',$list);
			$this->assign('mcate',$fcate);
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function knowledge(){
			$nc=D('n_class');
			
			/*页面变量*/
			$this->assign('index',8);
			$this->assign('css','sub1');
			$this->assign('title','钢材知识');
			
			$this->assign('mlist',$nc->getList(5));
			$this->display();
		}
		
		function shown()
		{
			$GLOBALS['debug']=0;
			$ns=D('news');
			if(empty($_GET['id']) || !$new=$ns->where($_GET['id'])->find())
			{
				$new=$ns->query('select * from news where class in(select id from n_class where id=5 or path regexp \'[[:<:]]5[[:>:]]\')',find);
			}
			
			$this->assign('new',$new);
			$this->display();
		}
		
		function show()
		{
			if(empty($_GET['id']))
				$this->redirect('index');
			$ns=D('news');
			$ent=D('enter');
			$nc=D('n_class');
			if(!$new=$ns->where($_GET['id'])->find())
			{
				$this->error('新闻不存在或已经删除',1,'index');
			}
			
			if($p=$nc->where($new['class'])->find())
			{
				$path=$p['path'];
				$parr=explode(',',$path);
				$parr[]=$p['id'];
				switch($parr[1])
				{
					case 1:
						$this->redirect('about','id/'.$new['id']);
						break;
					case 2:
						$this->redirect('service','id/'.$new['id']);
						break;
					case 5:
						$this->redirect('knowledge','id/'.$new['id']);
						break;
					case 4:
						$index=7;
					case 3:
						if(empty($index))$index=6;
						$sc=$p;
						$fc=$nc->where($parr[1])->find();
						break;
					default:
						$sc=$p;
						$fc=$nc->where(3)->find();
				}
				$ns->where($_GET['id'])->update(array('hits'=>$new['hits']+1));
			}
			else
			{
				$dcate=$nc->where(array('pid'=>3))->order('sort asc')->find();
				$ns->update(array('id'=>$new['id'],'class'=>$dcate['id']));
				$this->redirect('show','id/'.$new['id']);
			}
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*数据*/
			$this->assign('new',$new);
			$this->assign('mcate',$nc->where(array('pid'=>$fc['id']))->order('sort asc,id desc')->select());
			$this->assign('sc',$sc);
			$this->assign('fc',$fc);
			
			$this->assign('prev',$ns->query('select id,title from news where class='.$sc['id'].' and id<'.$new[id].' order by id desc limit 1','find'));
			$this->assign('next',$ns->field('id,title')->where(array('class'=>$sc['id'],'id >'=>$new['id']))->find());
			
			$this->assign('enter',$ent->where(array())->limit(20)->select());
			$this->assign('title',$fc['name']);
			$this->assign('index',$index);
			$this->assign('css','sub1');
			$this->display();
		}
	}