<?php
class job
{
	function index()
	{
		$job=D('job');
		$where=array();
		$wherestr='';
		
		
		$page=new page($job->where($where)->total(),B_PAGE,$wherestr);
		
		$this->assign('model','招聘信息管理');
		$this->assign('list',$job->where($where)->limit($page->limit)->order('id desc')->select());
		$this->assign('fpage',$page->fpage());
		$this->display();
	}
	
	function add()
	{
		$this->assign('model','添加招聘信息');
		$this->assign('act','添加');
		$this->display();
	}
	
	function modify()
	{
		if(empty($_GET['id']))
			$this->error('没有指定要修改的信息');
		
		$job=D('job');
		if(!$jb=$job->where($_GET['id'])->find())
		{
			$this->error('没有找到要修改的信息');
		}
		
		$this->assign('cat',$jb);
		$this->assign('model','修改招聘信息');
		$this->assign('act','修改');
		$this->display('job/add');
	}
	
	function save()
	{
		$job=D('job');
		if(empty($_POST['date']))
			$_POST['date']=date('Y-m-d H:i:s');
		
		if(empty($_POST['filt']))
			$_POST['filt']=false;
		else
			$_POST['filt']=true;
		
		if(empty($_POST['top']))
			$_POST['top']=false;
		else
			$_POST['top']=true;
		
		if(empty($_POST['id']))
		{
			if($job->insert())
			{
				$this->success('添加成功',1,'job/index');
			}
			else
			{
				$this->error('添加失败'.$job->getMsg(),2);
			}
		}
		else
		{
			if($job->update())
			{
				$this->success('修改成功',1,'job/index');
			}
			else
			{
				$this->error('修改失败'.$job->getMsg(),2);
			}
		}
	}
	
	function del()
	{
		$sc=D('job');
		if($sc->delete($_GET['id']))
		{
			$this->success('删除成功');
		}
		else
		{
			$this->error('删除失败'.$sc->getMsg());
		}
	}
}