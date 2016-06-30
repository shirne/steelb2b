<?php
	class sys
	{
		function index()
		{
			$this->assign('model','网站配置');
			$this->assign('cfg',D('config')->find());
			$this->display();
		}
		
		function savecfg()
		{
			$cfg=D('config');
			//$_POST['id']=1;
			if(empty($_POST['isrun']))
				$_POST['isrun']=false;
			else
				$_POST['isrun']=true;
				
			if(empty($_POST['ipstop']))
				$_POST['ipstop']=false;
			else
				$_POST['ipstop']=true;
				
			if(empty($_POST['linktype']))
				$_POST['linktype']=false;
			else
				$_POST['linktype']=true;
			
			//P($_POST);
			//exit;
			
			if($cfg->where(1)->update($_POST))
			{
				$this->success('保存成功',1);
			}
			else
			{
				$this->error('保存失败'.$cfg->getMsg());
			}
		}
	}