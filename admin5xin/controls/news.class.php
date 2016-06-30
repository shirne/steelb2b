<?php
	class news
	{
		/*市场介绍-配套服务*/
		function index()
		{
			$ns=D('news');
			$nc=D('n_class');
			if(empty($_GET['cid']))$_GET['cid']=1;
			$marr=$nc->field('id,name,path')->where($_GET['cid'])->find();
			$pathes=explode(',',$marr['path']);
			array_push($pathes,$marr['id']);

			switch($pathes[1])
			{
				case 3:
				case 4:
					$this->redirect('list1','cid/'.$pathes[1].'/sid/'.$marr['id']);
					break;
				case 5:
					$this->redirect('list2','cid/5/sid/'.$_GET['cid']);
					break;
			}
			
			$this->assign('model',$marr['name']);
			$this->assign('cid',$marr['id']);
			$this->assign('nlist',$ns->where(array('class'=>$_GET['cid']))->order('date asc,id asc')->select());
			$this->display();
		}
		
		function list1()
		{
			$ns=D('news');
			$nc=D('n_class');
			
			if(empty($_GET['cid']) || $_GET['cid']==3)
				$_GET['cid']=3;
			else
				$_GET['cid']=4;
				
			$marr=$nc->field('id,name')->where(array('pid'=>0,'id'=>$_GET['cid']))->find();
			$carr=$nc->field('id,name')->where(array('pid'=>$marr['id']))->select();
			
			if(!empty($_GET['sid']))
			{
				if($submodel=$nc->where(array('pid'=>$_GET['cid'],'id'=>$_GET['sid']))->find())
				{
					$ids=array($_GET['sid']);
				}
				else
				{
					$_GET['sid']='';
				}
			}
			if(empty($_GET['sid']))
			{
				$ids=array($marr['id']);
				foreach($carr as $row)
				{
					array_push($ids,$row['id']);
				}
			}
			
			$page=new page($ns->where(array('class'=>$ids))->total(),B_PAGE,'cid/'.$_GET['cid']);
			
			$this->assign('model',$marr['name']);
			$this->assign('submodel',$submodel?'下的<font class="red">'.($submodel['name']).'</font>':'');
			$this->assign('cid',$marr['id']);
			$this->assign('sid',$ids[0]);
			$this->assign('cate',$carr);
			$this->assign('nlist',$ns->where(array('class'=>$ids))->limit($page->limit)->order('id desc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function list2()
		{
			$ns=D('news');
			$nc=D('n_class');
			$ids=array();
			if(empty($_GET['cid']))$_GET['cid']=5;
			$marr=$nc->field('id,name')->where(array('pid'=>0,'id'=>$_GET['cid']))->find();
			
			$path=explode(',',$marr['path']);
			$path[]=$marr['id'];
			if($path[1]!=5)$this->redirect('index');
			
			$carr=$nc->query('select * from n_class where path regexp \'[[:<:]]5[[:>:]]\'','select');
			
			if(!empty($_GET['sid']))
			{
				$scate=$nc->field('id,name')->where($_GET['sid'])->find();
				$sid=$_GET['sid'];
			}
			else
			{
				$ids[]=5;
				foreach($carr as $sd)
				{
					$ids[]=$sd['id'];
				}
			}

			$this->assign('model',$marr['name']);
			$this->assign('cid',$marr['id']);
			$this->assign('sid',$_GET['sid']);
			$this->assign('cate',$carr);
			$this->assign('nlist',$ns->where(array('class'=>$ids))->order('id desc')->select());
			$this->display();
		}
		
		function bat()
		{
			if(empty($_POST['act']))
				$this->error('请选择操作!',2);
				
			$ns=D('news');
			
			switch($_POST['act'])
			{
				case '删除':
					if($num=$ns->delete($_POST['id']))
					{
						$this->success("删除成功!共删除了$num条记录",1);
					}
					else
					{
						$this->error('删除失败!没有记录被删除',2);
					}
					break;
				case '显示':
					if($num=$ns->where($_POST['id'])->update(array('isshow'=>true)))
					{
						$this->success("成功显示了{$num}篇文章!",1);
					}
					else
					{
						$this->error('显示失败!',2);
					}
					break;
				case '隐藏':
					if($num=$ns->where($_POST['id'])->update(array('isshow'=>false)))
					{
						$this->success("成功隐藏了{$num}篇文章!",1);
					}
					else
					{
						$this->error('隐藏失败!',2);
					}
					break;
				case '审核':
					if($num=$ns->where($_POST['id'])->update(array('filt'=>true)))
					{
						$this->success("成功审核了{$num}篇文章!",1);
					}
					else
					{
						$this->error('审核失败!',2);
					}
					break;
				case '取消审核':
					if($num=$ns->where($_POST['id'])->update(array('filt'=>false)))
					{
						$this->success("成功取消审核了{$num}篇文章!",2);
					}
					else
					{
						$this->error('隐藏失败!',1);
					}
					break;
				default:
				$this->error('操作尚未明确!',2);
			}
		}
		
		function modify()
		{
			$ns=D('news');
			
			if(empty($_GET['id']))
				$this->error('请选择要修改的新闻!',2);
			$new=$ns->where(array('id'=>$_GET['id']))->find();
			
			$this->assign('model','编辑新闻');
			$this->assign('news',$new);
			$this->assign('cateoptions',D('n_class')->getOption($new['class']));
			$this->display();
		}
		
		function addnews()
		{
			$this->assign('model','添加新闻');
			$this->assign('cateoptions',D('n_class')->getOption($_GET['cid']));
			$this->display();
		}
		
		function cate()
		{
			$nc=D('n_class');
			if(empty($_GET['cate']))$_GET['cate']=0;
			if(!$cate=$nc->where(array('id'=>$_GET['cate']))->find())
			{
				$cate=array('id'=>0,'name'=>'顶级分类');
			}
			
			$this->assign('model','资讯分类管理');
			$this->assign('cate',$cate['name']);
			$this->assign('cateid',$cate['id']);
			$this->assign('cates',$nc->where(array('pid'=>$cate['id']))->order('sort asc')->select());
			$this->assign('cateoptions',$nc->getOption($_GET['cate']));
			$this->display();
		}
		
		function delcate()
		{
			if(empty($_GET['id']))
			{
				$this->error('没有删除目标!',2);
			}
			if($_GET['id']<6)
			{
				$this->error('由于本系统绑定了初始五个大类，不能删除!',2);
			}
			
			$nc=D('n_class');
			
			if($snum=$nc->where(array('pid'=>$_GET['id']))->total())
			{
				$this->error("此分类下尚有$snum 个子类，请先删除子类!",2);
			}
			
			if($nc->delete($_GET['id']))
			{
				$this->success('删除成功!',1);
			}
			else
			{
				$this->error('删除失败!请返回检查并刷新页面',2);
			}
		}
		
		function addcate()
		{
			$nc=D('n_class');
			$model='修改';
			if(empty($_GET['id']))$_GET['id']=0;
			if(empty($_GET['cid']))$_GET['cid']=0;
			//P($_GET);
			if(!$nc->where($_GET['cid'])->find())$_GET['cid']=0;
			if(!$cat=$nc->where(array('id'=>$_GET['id']))->find())
			{
				$cat=array(
					'id'=>'',
					'name'=>'',
					'pid'=>$_GET['cid'],
					'sort'=>10
					);
				$model='添加';
			}
			
			$this->assign('model',$model.'资讯分类');
			$this->assign('act',$model);
			$this->assign('cat',$cat);
			$this->assign('cateoptions',$nc->getOption($_GET['cid']));
			$this->display();
		}
		
		function savecate()
		{
			$ns=D('n_class');
			if(empty($_POST['pid']))
			{
				$_POST['pid']=0;
				$_POST['path']=0;
			}
			else
			{
				if($pcate=$ns->where(array('id'=>$_POST['pid']))->find())
				{
					$_POST['pid']=$pcate['id'];
					$_POST['path']=$pcate['path'].','.$pcate['id'];
				}
				else
				{
					$_POST['pid']=0;
					$_POST['path']=0;
				}
				
			}
			
			
			
			if(empty($_POST['id']))
			{
				if($ns->insert())
				{
					$this->success('添加成功!',1,'news/cate/cate/'.$_POST['pid']);
				}
				else
				{
					$this->error('添加失败!',2,'news/cate/cate/'.$_POST['pid']);
				}
			}
			else
			{
				if($_POST['pid'] != 0  && $_POST['id']<6)
				{
					$this->error('修改失败!<br />您不能将绑定的五个顶级类移到其它分类',2);
				}
				if($ns->update())
				{
					$this->success('修改成功!',1,'news/cate/cate/'.$_POST['pid']);
				}
				else
				{
					$this->error('修改失败!',2,'news/cate/cate/'.$_POST['pid']);
				}
			}
		}
		
		function lact(){
			if(empty($_GET['id']))
				$this->error('没有选择内容!',2);
			$ns=D('news');
			switch($_GET['act'])
			{
				case 0:
					if($ns->delete($_GET['id']))
					{
						$this->success('删除成功!',1);
					}
					else
					{
						$this->error('删除失败!',2);
					}
					break;
				case 1:
					if($ns->update(array('id'=>$_GET['id'],'isshow'=>true)))
					{
						$this->success('显示成功!',1);
					}
					else
					{
						$this->error('显示失败!',2);
					}
					break;
				case 2:
					if($ns->update(array('id'=>$_GET['id'],'isshow'=>false)))
					{
						$this->success('隐藏成功!',1);
					}
					else
					{
						$this->error('隐藏失败!',2);
					}
					break;
				case 3:
					if($ns->update(array('id'=>$_GET['id'],'filt'=>true)))
					{
						$this->success('审核成功!',1);
					}
					else
					{
						$this->error('审核失败!',2);
					}
					break;
				case 4:
					if($ns->update(array('id'=>$_GET['id'],'filt'=>false)))
					{
						$this->success('取消审核成功!',1);
					}
					else
					{
						$this->error('取消审核失败!',2);
					}
					break;
				default:
				$this->error('操作尚未明确!',2);
			}
		}
		
		function save()
		{
			$ns=D('news');
			$url='news/index/cid/'.$_POST['class'];
			
			if(empty($_POST['title']) || empty($_POST['content']))
				$this->error('标题与内容均不能为空!',2);
			
			if(empty($_POST['summary']))
				$_POST['summary']=nohtml($_POST['content'],250);
			
			if(empty($_POST['images']) || !file_exists(PROJECT_PATH.$GLOBALS['public'].'uploads/'.$_POST['images']))
				$_POST['images']=getimage($_POST['content']);
			
			if(empty($_POST['filt']))
				$_POST['filt']=false;
			else
				$_POST['filt']=true;
			
			if(empty($_POST['isshow']))
				$_POST['isshow']=false;
			else
				$_POST['isshow']=true;
			
			if(empty($_GET['id']))
			{
				$_POST['user']=$_SESSION['admin_name'];
				$_POST['date']=date('Y-m-d H:i:s');
				$_POST['modate']=date('Y-m-d H:i:s');
				if($ns->insert())
				{
					$this->success('添加文章成功!',1,$url);
				}
				else
				{
					$this->error('添加文章失败!',2);
				}
			}
			else
			{
				$_POST['modate']=date('Y-m-d H:i:s');
				if($ns->update($_POST))
				{
					$this->success('修改文章成功!',1,$url);
				}
				else
				{
					$this->error('修改文章失败!或者您没有对文章作任何修改',2);
				}
			}
		}
	}