<?php
	class product
	{
		//产品列表
		function index()
		{
			$pc=D('p_class');
			$pd=D('product');
			$et=D('qa_user');
			$where=array();
			$getstr='';
			
			if(!empty($_GET['cate']))
			{
				$cate=$pc->where($_GET['cate'])->find();
				if($cate['pid'] == 0)
				{
					$_GET['fcate']=$_GET['cate'];
				}
				else
				{
					$_GET['scate']=$_GET['cate'];
					$_GET['fcate']=$cate['pid'];
				}
			}
			
			if(!empty($_GET['scate']))
			{
				if($scate=$pc->where($_GET['scate'])->find())
				{
					$where['vari']=$scate['name'];
					$getstr.='/scate/'.$scate['id'];
					if($fcate=$pc->where($scate['pid'])->find())
					{
						$where['class']=$fcate['name'];
						$getstr.='/fcate/'.$fcate['id'];
						$scates=$pc->where(array('pid'=>$fcate['id']))->select();
					}
				}
				else
				{
					$_GET['scate']='';
				}
			}
			if(empty($fcate) && !empty($_GET['fcate']))
			{
				if($fcate=$pc->where($_GET['fcate'])->find())
				{
					$where['class']=$fcate['name'];
					$getstr.='/fcate/'.$fcate['id'];
					$scates=$pc->where(array('pid'=>$fcate['id']))->select();
				}
				else
				{
					$_GET['fcate']='';
				}
			}
			
			$page=new page($pd->where($where)->total(),B_PAGE,ltrim($getstr,'/'));
			
			$this->assign('model','产品管理');
			$this->assign('cateoptions',$pc->getOption(empty($_GET['cate'])?(empty($_GET['scate'])?$_GET['fcate']:$_GET['scate']):$_GET['cate']));
			$this->assign('fcate',$pc->where(array('pid'=>0))->order('sort asc')->select());
			$this->assign('scate',$scates);
			$this->assign('hasfcate',!empty($fcate));
			$this->assign('lists',$pd->where($where)->order('id desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function search()
		{
			$this->display();
		}
		
		function add()
		{
			$pc=D('p_class');
			$fcate=$pc->where(array('pid'=>0))->order('sort asc')->select();
			
			$this->assign('act','添加');
			$this->assign('model','添加产品');
			$this->assign('fcates',$fcate);
			$this->assign('scates',$pc->where(array('pid'=>$fcate[0]['id']))->order('sort asc')->select());
			$this->display();
		}
		
		function del()
		{
			if(empty($_POST['id']) && empty($_GET['id']))
				$this->error('请选择要删除的产品',2);
			
			if(empty($_POST['id']))
				$id=$_GET['id'];
			else
				$id=$_POST['id'];
			
			$pd=D('product');
			if($pd->delete($id))
			{
				$this->success('产品删除成功',1);
			}
			else
			{
				$this->error('产品删除失败<br />'.$pd->getMsg(),2);
			}
		}
		
		function modify()
		{
			if(empty($_GET['id']))
			{
				$this->error('请指定要修改的产品',2);
			}
			
			$pc=D('p_class');
			$pd=D('product');
			
			if(!$p=$pd->where($_GET['id'])->find())
			{
				$this->error('要修改的产品不存在!',2);
			}
			$fcate=$pc->where(array('pid'=>0))->order('sort asc')->select();
			foreach($fcate as $row)
			{
				if($row['name'] == $p['class'])
					$i=$row['id'];
			}
			if(empty($i))
			{
				$i=$fcate[0]['id'];
			}
			
			$this->assign('act','修改');
			$this->assign('cat',$p);
			$this->assign('model','修改产品');
			$this->assign('fcates',$fcate);
			$this->assign('scates',$pc->where(array('pid'=>$i))->order('sort asc')->select());
			$this->display('product/add');
		}
		
		function save()
		{
			$ent=D('enter');
			$pd=D('product');
			
			if(empty($_POST['isshow']))
				$_POST['isshow']=false;
			else
				$_POST['isshow']=true;
			
			if(empty($_POST['id']))
			{
				if($com=$ent->where(array('company'=>$_POST['company']))->find())
				{
					$_POST['comid']=$com['id'];
					$_POST['contact']=$com['contact'];
					$_POST['tele']=$com['tele'];
					$_POST['date']=date('Y-m-d H:i:s');
				}
				if($pd->insert())
				{
					$this->success('添加成功',1,'product/index');
				}
				else
				{
					$this->error('添加失败'.$pd->getMsg(),2);
				}
			}
			else
			{
				if($com=$ent->where(array('company'=>$_POST['company']))->find())
				{
					$_POST['comid']=$com['id'];
					$_POST['contact']=$com['contact'];
					$_POST['tele']=$com['tele'];
				}
				if($pd->where($_POST['id'])->update())
				{
					$this->success('修改成功',1,'product/index');
				}
				else
				{
					$this->error('修改失败'.$pd->getMsg(),2);
				}
			}
		}
		
		function getenter()
		{
			$ent=D('enter');
			$where=array();
			
			if(!empty($_GET['key']))
			{
				$where['company']='%'.$_GET['key'].'%';
			}
			
			$this->assign('model','查找企业');
			$this->assign('list',$ent->where($where)->order('regdate asc')->limit(200)->select());
			$this->display();
		}
		
		function getcate()
		{
			if(empty($_GET['pid']) && empty($_GET['name']))
			{
				$_GET['pid']=0;
			}
			if(!empty($_GET['name']))
			{
				$where=array('name'=>$_GET['name']);
			}
			else
			{
				$where=array('id'=>$_GET['pid']);
			}
			$pc=D('p_class');
			if($p=$pc->where($where)->find())
			{
				echo $pc->getarr($p['id']);
				exit;
			}
			else
			{
				echo $pc->getarr(0);
				exit;
			}
		}
		
		
		
		/*产品分类管理*/
		function cate()
		{
			$pc=D('p_class');
			if(empty($_GET['pid']))$_GET['pid']=0;
			if(!$cate=$pc->where(array('id'=>$_GET['pid']))->find())
			{
				$cate=array('id'=>0,'name'=>'顶级分类');
			}
			
			$this->assign('model','产品分类管理');
			$this->assign('cate',$cate['name']);
			$this->assign('cateid',$cate['id']);
			$this->assign('cateoptions',$pc->getOption($cate['id']));
			$this->assign('cates',$pc->where(array('pid'=>$cate['id']))->select());
			$this->display();
		}
		
		function addcate()
		{
			$pc=D('p_class');
			$model='修改';
			if(empty($_GET['id']))$_GET['id']=0;
			if(empty($_GET['cid']))$_GET['cid']=0;
			//P($_GET);
			if(!$pc->where($_GET['cid'])->find())$_GET['cid']=0;
			if(!$cat=$pc->where(array('id'=>$_GET['id']))->find())
			{
				$cat=array(
					'id'=>'',
					'name'=>'',
					'pid'=>$_GET['cid'],
					'sort'=>10
					);
				$model='添加';
			}
			
			$this->assign('model',$model.'产品分类');
			$this->assign('act',$model);
			$this->assign('cat',$cat);
			$this->assign('cateoptions',$pc->getOption($_GET['cid']));
			$this->display();
		}
		
		function savecate()
		{
			$pc=D('p_class');
			if(empty($_POST['pid']))
			{
				$_POST['pid']=0;
			}
			if($pcate=$pc->where(array('id'=>$_POST['pid']))->find())
			{
				$_POST['pid']=$pcate['id'];
				$_POST['path']=$pcate['path'].','.$pcate['id'];
			}
			else
			{
				$_POST['pid']=0;
				$_POST['path']=0;
			}
				
			
			if(empty($_POST['id']))
			{
				if($pc->insert())
				{
					$this->success('添加成功!',2,'product/cate/pid/'.$_POST['pid']);
				}
				else
				{
					$this->error('添加失败!',2,'product/cate/pid/'.$_POST['pid']);
				}
			}
			else
			{
				if($pc->update())
				{
					$this->success('修改成功!',2,'product/cate/pid/'.$_POST['pid']);
				}
				else
				{
					$this->error('修改失败!',2,'product/cate/pid/'.$_POST['pid']);
				}
			}
		}
		
		function delcate()
		{
			if(empty($_GET['id']))
			{
				$this->error('没有删除目标!',2);
			}
			
			$pc=D('p_class');
			
			if($snum=$pc->where(array('pid'=>$_GET['id']))->total())
			{
				$this->error("此分类下尚有$snum 个子类，请先删除子类!",2);
			}
			
			if($pc->delete($_GET['id']))
			{
				$this->success('删除成功!',2);
			}
			else
			{
				$this->error('删除失败!请返回检查并刷新页面',2);
			}
		}
		
		function bat()
		{
			
		}
	}