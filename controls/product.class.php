<?php
	class product
	{
		/*产品模块*/
		function index()
		{
			$pcat=D('p_class');
			$pd=D('product');
			$where=array();
			$order='';
			
			$page=new page($pd->where($where)->total(),F_PAGE,'');
			
			/*页面变量*/
			$this->assign('index',3);
			$this->assign('title','产品查询');
			$this->assign('css','sub1');
			
			/*产品分类*/
			$fcate=$pcat->where(array('pid'=>0))->order('sort asc')->select();
			$this->assign('fcate',$fcate);
			//$this->assign('scate',$pcat->where(array('pid'=>$fcate[0]['id']))->order('sort asc')->select());
			
			/*数据*/
			$this->assign('pcat',$pcat->where(array('pid >'=>0))->order('sort asc')->limit(40)->select());
			
			$this->assign('list',$pd->where($where)->order($order)->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		/*产品搜索*/
		function search()
		{
			$pcat=D('p_class');
			$pd=D('product');
			$where=array();
			$wherestr='';
			$order='';
			$id=0;
			/*分类转换*/
			if(!empty($_GET['sid']))
			{
				$sc=$pcat->where($_GET['sid'])->find();
				$_GET['model']=$sc['name'];
				$fc=$pcat->where($sc['pid'])->find();
				$_GET['class']=$fc['name'];
				$id=$fc['id'];
			}
			
			/*搜索条件*/
			if(!empty($_GET['class']))
				$where['class']=$_GET['class'];
			
			if(!empty($_GET['model']))
			{
				$where['vari']=$_GET['model'];
				if($id==0)
				{
					$sc=$pcat->where(array('name'=>$_GET['model']))->find();
					$id=$sc['pid'];
					$fc=$pcat->where($sc['pid'])->find();
				}
			}
			
			if(!empty($_GET['name']))
				$where['title']='%'.$_GET['name'].'%';
			
			if(!empty($_GET['material']))
				$where['materials']='%'.$_GET['material'].'%';
			
			if(!empty($_GET['fact']))
				$where['produce']='%'.$_GET['fact'].'%';
			
			if(!empty($_GET['addr']))
				$where['concat(addr,house)']='%'.$_GET['addr'].'%';
			
			if(!empty($_GET['spec']))
				$where['model']='%'.$_GET['spec'].'%';
			
			foreach($where as $k=>$v)
			{
				$wherestr.='/'.$k.'/'.$v;
			}
			$wherestr.='/order/'.$_GET['order'].'/ordertype/'.$_GET['ordertype'];
			switch($_GET['order'])
			{
				case 'price':
					$order='price';
				break;
				case 'model':
					$order='model';
				break;
				default:
					$order='date';
			}
			
			if(empty($_GET['ordertype']))
				$order.=' asc';
			else
				$order.=' desc';
			
			$page=new page($pd->where($where)->total(),F_PAGE,ltrim($wherestr,'/'));
			
			/*页面变量*/
			$this->assign('index',3);
			$this->assign('title','产品查询');
			$this->assign('css','sub1');
			
			/*产品分类*/
			$fcate=$pcat->where(array('pid'=>0))->order('sort asc')->select();
			//if($id==0)$id=$fcate[0]['id'];
			$this->assign('fcate',$fcate);
			if($id != 0)
			$this->assign('scate',$pcat->where(array('pid'=>$id))->order('sort asc')->select());
			
			
			$this->assign('fc',$fc);
			$this->assign('sc',$sc);
			/*数据*/
			$this->assign('pcat',$pcat->where(array('pid >'=>0))->order('sort asc')->limit(40)->select());
			
			$this->assign('list',$pd->where($where)->order($order)->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display('product/index');
		}
		
		function company()
		{
			$ent=D('enter');
			$pd=D('product');
			if(empty($_GET['id']))
				$this->redirect('index');
			
			if(!$com=$ent->where($_GET['id'])->find())
				$this->error('没有找到该企业',1,'index');
			
			$page=new page($pd->where(array('comid'=>$com['id']))->total(),F_PAGE,'id/'.$_GET['id']);
			$cp=$pd->where(array('comid'=>$com['id']))->order('date desc')->limit($page->limit)->select();
			/*页面变量*/
			$this->assign('index',3);
			$this->assign('title','产品查询');
			$this->assign('css','sub1');
			
			/*数据*/
			$this->assign('com',$com);
			$this->assign('list',$cp);
			
			$this->display();
		}
	}