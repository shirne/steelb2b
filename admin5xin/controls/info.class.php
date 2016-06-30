<?php
class info
{
	function index()
	{
		$model='求购';
		$where=array('type <>'=>1);
		if(!empty($_GET['type']))
		{
			$model='供应';
			$where=array('type'=>1);
		}
		if(!empty($_GET['user']))
		{
			if($user=D('qa_user')->where(array('qa_user'=>$_GET['user']))->find())
			{
				$where['userid']=$user['id'];
			}
			else
			{
				$where['userid']=0;
			}
		}
		
		
		$info=D('information');
		$page=new page($info->where($where)->total(),B_PAGE,'type/'.$where['type'].'/user/'.$_GET['user']);
		
		$this->assign('list',$info->where($where)->limit($page->limit)->order('id desc')->select());
		$this->assign('model',$model.'信息管理');
		$this->assign('act',$model);
		$this->assign('fpage',$page->fpage());
		$this->assign('type',$_GET['type']);
		$this->display();
	}
	
	function add()
	{
		$pc=D('p_class');
		$fcate=$pc->where(array('pid'=>0))->order('sort asc')->select();
			
		
		$this->assign('act','添加');
		$this->assign('model','添加信息');
		$this->assign('fcates',$fcate);
		$this->assign('scates',$pc->where(array('pid'=>$fcate[0]['id']))->order('sort asc')->select());
		$this->display();
	}
	
	function modify()
	{
		if(empty($_GET['id']))
			$this->error('请选择要修改的信息',1);
		
		$info=D('information');
		$pc=D('p_class');
		if(!$ifo=$info->where($_GET['id'])->find())
			$this->error('没有找到该信息<br />已经删除了吗?',1);
		
		$fcate=$pc->where(array('pid'=>0))->order('sort asc')->select();
		
		foreach($fcate as $row)
		{
			if($row['name'] == $ifo['class'])
				$i=$row['id'];
		}
		if(empty($i))
		{
			$i=$fcate[0]['id'];
		}
		
		$this->assign('act','修改');
		$this->assign('model','修改信息');
		$this->assign('cat',$ifo);
		$this->assign('fcates',$fcate);
		$this->assign('scates',$pc->where(array('pid'=>$i))->order('sort asc')->select());
		$this->display('info/add');
	}
	
	function del()
	{
		$sc=D('information');
		$id=$_GET['id'];
		if(!empty($_POST['id']))
			$id=$_POST['id'];
		if($sc->delete($id))
		{
			$this->success('删除成功');
		}
		else
		{
			$this->error('删除失败'.$sc->getMsg());
		}
	}
	
	function save()
	{
		$us=D('qa_user');
		$info=D('information');
		
		if(empty($_POST['type']))
			$_POST['type']=false;
		else
			$_POST['type']=true;
		
		if(empty($_POST['top']))
			$_POST['top']=false;
		else
			$_POST['top']=true;
		
		if(empty($_POST['id']))
		{
			if($usr=$us->where(array('company'=>$_POST['company']))->find())
			{
				$_POST['userid']=$usr['id'];
				$_POST['ip']=getIP();
			}
			$_POST['date']=date('Y-m-d H:i:s');
			if($info->insert())
			{
				$this->success('添加信息成功',1,'info/index/type/'.$_POST['type']);
			}
			else
			{
				$this->error('添加信息失败<br />'.$info->getMsg(),2);
			}
		}
		else
		{
			if($usr=$us->where(array('company'=>$_POST['company']))->find())
			{
				$_POST['userid']=$usr['id'];
			}
			if($info->update())
			{
				$this->success('修改信息成功',1,'info/index/type/'.$_POST['type']);
			}
			else
			{
				$this->error('修改信息失败<br />'.$info->getMsg(),2);
			}
		}
	}
	
	function getenter()
	{
		$ent=D('qa_user');
		$where=array();
		
		if(!empty($_GET['key']))
		{
			$where['company']='%'.$_GET['key'].'%';
		}
		
		$this->assign('model','查找公司');
		$this->assign('list',$ent->where($where)->order('regdate asc')->select());
		$this->display();
	}
}