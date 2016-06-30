<?php
	class other
	{
		function index()
		{
			$pr=D('offer');
			$where=array();
			
			if(!empty($_GET['area']))
				$where['area']=$_GET['area'];
			if($where['area']=='本地')
				$where['area']='';
			
			$page=new page($pr->where($where)->total(),B_PAGE,'');
			
			$this->assign('model','价格管理');
			$this->assign('area',D('area')->select());
			$this->assign('list',$pr->where($where)->order('date asc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function add()
		{
			$this->assign('area',D('area')->select());
			$this->assign('model','添加价格');
			$this->assign('act','添加');
			$this->display();
		}
		
		function refresh(){
			D('offer')->where(0)->update(array('date'=>date('Y-m-d')));
			$this->success('更新完成',1,'other/index');
		}
		function modify()
		{
			if(empty($_GET['id']))
			$this->error('没有指定要修改的信息');
		
			$pr=D('offer');
			if(!$jb=$pr->where($_GET['id'])->find())
			{
				$this->error('没有找到要修改的信息');
			}
			
			$this->assign('city',$jb);
			$this->assign('area',D('area')->select());
			$this->assign('model','修改价格信息');
			$this->assign('act','修改');
			$this->display('other/add');
		}
		
		function save()
		{
			$pr=D('offer');
			$_POST['date']=date('Y-m-d');
			if(empty($_POST['id']))
			{
				$_POST['user']=$_SESSION['admin_name'];
				if($pr->insert())
				{
					$this->success('添加成功',1,'other/index');
				}
				else
				{
					$this->error('添加失败'.$pr->getMsg(),2);
				}
			}
			else
			{
				if($pr->update())
				{
					$this->success('修改成功',1,'other/index');
				}
				else
				{
					$this->error('修改失败'.$pr->getMsg(),2);
				}
			}
		}
		
		function del()
		{
			$sc=D('offer');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		/*留言管理*/
		function mlist()
		{
			$pr=D('feedbook');
			$where=array();
			
			if(!empty($_GET['area']))
				$where['area']=$_GET['area'];
			if($where['area']=='本地')
				$where['area']='';
			
			$page=new page($pr->where($where)->total(),B_PAGE,'');
			
			$this->assign('model','留言管理');
			$this->assign('area',D('area')->select());
			$this->assign('list',$pr->where($where)->order('date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function madd()
		{
			$this->assign('area',D('feedbook')->select());
			$this->assign('model','回复留言');
			$this->assign('act','回复');
			$this->display();
		}
		
		function mmodify()
		{
			if(empty($_GET['id']))
			$this->error('没有指定要修改的信息');
		
			$pr=D('feedbook');
			if(!$jb=$pr->where($_GET['id'])->find())
			{
				$this->error('没有找到要修改的信息');
			}
			
			$this->assign('city',$jb);
			$this->assign('model','修改回复信息');
			$this->assign('act','修改');
			$this->display('other/madd');
		}
		
		function msave()
		{
			$pr=D('feedbook');
			
			$_POST['redate']=date('Y-m-d H:i:s');
			$_POST['replay']=$_SESSION['admin_name'];
			if($pr->update())
			{
				$this->success('回复成功',1,'other/mlist');
			}
			else
			{
				$this->error('回复失败'.$pr->getMsg(),2);
			}
		}
		
		function mdel()
		{
			$sc=D('feedbook');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		/*广告管理*/
		function adlist()
		{
			$sc=D('ad');
			$this->assign('model','广告管理');
			$this->assign('list',$sc->order('id asc')->select());
			$this->display();
		}
		
		function adadd()
		{
			$this->assign('model','添加广告');
			$this->assign('act','添加');
			$this->display();
		}
		
		function addel()
		{
			$sc=D('ad');
			$s=$sc->where($_GET['id'])->find();
			if($sc->delete($_GET['id']))
			{
				if(file_exists(PROJECT_PATH.$GLOBALS['public'].'uploads/'.$s['img']))
					unlink(PROJECT_PATH.$GLOBALS['public'].'uploads/'.$s['img']);
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function adsave()
		{
			if(empty($_POST['title']))
			{
				$this->error('请填写广告名称');
			}
			$sc=D('ad');
			
			if(empty($_POST['border']))
				$_POST['border']=0;
			else
				$_POST['border']=1;
			
			$up=new FileUpload();
			$up->set("allowtype", array('gif', 'png', 'jpg','swf'));
			
			if(empty($_POST['id']))
			{
				$_POST['date']=date('Y-m-d H:i:s');
				if($up->upload('img'))
				{
					$_POST['img']=$up->getFileName();
					if(strtolower(substr($_POST['img'],strlen($_POST['img'])-4,4))=='.swf')
					{
						$_POST['type']=0;
					}
					else
					{
						$_POST['type']=1;
					}
				}
				else
					$this->error('请上传图片或flash',1);
				
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/adlist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				if($lk=$sc->where($_POST['id'])->find())
				{
					if($up->upload('img'))
					{
						$_POST['img']=$up->getFileName();
						if(strtolower(substr($_POST['img'],strlen($_POST['img'])-4,4))=='.swf')
						{
							$_POST['type']=0;
						}
						else
						{
							$_POST['type']=1;
						}
						if(file_exists(PROJECT_PATH.$GLOBALS['public'].'uploads/'.$lk['img']))
							unlink(PROJECT_PATH.$GLOBALS['public'].'uploads/'.$lk['img']);
					}
					
					if($sc->update($_POST))
					{
						$this->success('修改成功',1,'other/adlist');
					}
					else
					{
						$this->error('修改失败'.$sc->getMsg());
					}
				}
				else
					$this->error('修改失败:没有找到该数据',1);
			}
		}
		
		function admodify()
		{
			$sc=D('ad');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改广告');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/adadd');
			}
			else
			{
				$this->error('没有添加过该广告');
			}
		}
		
		/*常用链接管理*/
		function ulist()
		{
			$sc=D('links2');
			
			$this->assign('model','常用链接管理');
			$this->assign('list',$sc->order('id asc')->select());
			$this->display();
		}
		
		function uadd()
		{
			$this->assign('model','添加常用链接');
			$this->assign('act','添加');
			$this->display();
		}
		
		function udel()
		{
			$sc=D('links2');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function usave()
		{
			if(empty($_POST['title']))
			{
				$this->error('请填写链接名称');
			}
			$sc=D('links2');
			
			
			if(empty($_POST['id']))
			{
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/ulist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				$oinfo=$sc->where($_POST['id'])->find();
				if($sc->update($_POST))
				{
					$this->success('修改成功',1,'other/ulist');
				}
				else
				{
					$this->error('修改失败'.$sc->getMsg());
				}
			}
		}
		
		function umodify()
		{
			$sc=D('links2');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改常用链接');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/uadd');
			}
			else
			{
				$this->error('没有添加过该链接');
			}
		}
		
		/*友情链接管理*/
		function flist()
		{
			$sc=D('links');
			
			$this->assign('model','友情链接管理');
			$this->assign('list',$sc->order('id asc')->select());
			$this->display();
		}
		
		function fadd()
		{
			$this->assign('model','添加友情链接');
			$this->assign('act','添加');
			$this->display();
		}
		
		function fdel()
		{
			$sc=D('links');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function fsave()
		{
			if(empty($_POST['name']))
			{
				$this->error('请填写链接名称');
			}
			$sc=D('links');
			
			
			$up=new FileUpload();

			$up->set("maxsize", 200000);	   

			if($up->upload('image')){
				$_POST['image']=$up->getFileName();
			}

			if(empty($_POST['id']))
			{
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/flist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				$oinfo=$sc->where($_POST['id'])->find();
				if($sc->update($_POST))
				{
					if($_POST['image'] != $oinfo['image'])
					{
						$name=PROJECT_PATH."/public/uploads/".$oinfo['image'];
						if(file_exists($name)){
							unlink($name);
						}
					}
					$this->success('修改成功',1,'other/flist');
				}
				else
				{
					$this->error('修改失败'.$sc->getMsg());
				}
			}
		}
		
		function fmodify()
		{
			$sc=D('links');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改友情链接');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/fadd');
			}
			else
			{
				$this->error('没有添加过该链接');
			}
		}
		
		/*公告管理*/
		function nlist()
		{
			$sc=D('notice');
			
			$this->assign('model','公告管理');
			$this->assign('list',$sc->order('date desc,id desc')->select());
			$this->display();
		}
		
		function nadd()
		{
			$this->assign('model','添加公告');
			$this->assign('act','添加');
			$this->display();
		}
		
		function ndel()
		{
			$sc=D('notice');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function nsave()
		{
			if(empty($_POST['title']))
			{
				$this->error('请填写公告标题');
			}
			$sc=D('notice');
			if(empty($_POST['id']))
			{
				$_POST['date']=date('Y-m-d H:i:s');
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/nlist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				if($sc->update($_POST))
				{
					$this->success('修改成功',1,'other/nlist');
				}
				else
				{
					$this->error('修改失败'.$sc->getMsg());
				}
			}
		}
		
		function nmodify()
		{
			$sc=D('notice');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改公告');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/nadd');
			}
			else
			{
				$this->error('没有该公告');
			}
		}
		
		/*地区管理*/
		function alist()
		{
			$sc=D('area');
			
			$this->assign('model','地区管理');
			$this->assign('list',$sc->order('sort asc,id asc')->select());
			$this->display();
		}
		
		function aadd()
		{
			$this->assign('model','添加地区');
			$this->assign('act','添加');
			$this->display();
		}
		
		function adel()
		{
			$sc=D('area');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function asave()
		{
			if(empty($_POST['name']))
			{
				$this->error('请填写地区名称');
			}
			$sc=D('area');
			if(empty($_POST['id']))
			{
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/alist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				if($sc->update($_POST))
				{
					$this->success('修改成功',1,'other/alist');
				}
				else
				{
					$this->error('修改失败'.$sc->getMsg());
				}
			}
		}
		
		function amodify()
		{
			$sc=D('area');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改地区');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/aadd');
			}
			else
			{
				$this->error('没有添加过该地区');
			}
		}
		
		/*钢市管理*/
		function clist()
		{
			$sc=D('city');
			
			$this->assign('model','钢市管理');
			$this->assign('list',$sc->order('sort asc,id asc')->select());
			$this->display();
		}
		
		function cadd()
		{
			$this->assign('model','添加钢市');
			$this->assign('act','添加');
			$this->display();
		}
		
		function cdel()
		{
			$sc=D('city');
			if($sc->delete($_GET['id']))
			{
				$this->success('删除成功');
			}
			else
			{
				$this->error('删除失败'.$sc->getMsg());
			}
		}
		
		function csave()
		{
			if(empty($_POST['name']))
			{
				$this->error('请填写钢市名称');
			}
			$sc=D('city');
			if(empty($_POST['id']))
			{
				if($sc->insert($_POST))
				{
					$this->success('添加成功',1,'other/clist');
				}
				else
				{
					$this->error('添加失败'.$sc->getMsg());
				}
			}
			else
			{
				if($sc->update($_POST))
				{
					$this->success('修改成功',1,'other/clist');
				}
				else
				{
					$this->error('修改失败'.$sc->getMsg());
				}
			}
		}
		
		function cmodify()
		{
			$sc=D('city');
			if($city=$sc->find($_GET['id']))
			{
				$this->assign('model','修改钢市');
				$this->assign('city',$city);
				$this->assign('act','修改');
				$this->display('other/cadd');
			}
			else
			{
				$this->error('没有添加过该钢市');
			}
		}
	}
