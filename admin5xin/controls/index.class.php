<?php
	class Index
	{
		function index()
		{
			$GLOBALS['debug']=0;
			$this->display();
		}
		
		function main()
		{
			$this->assign('memnum',D('qa_user')->total());
			$this->assign('asknum',D('qa_user')->where(array('filt'=>0,'ask <>'=>''))->total());
			$this->assign('ennum',D('enter')->total());
			$this->assign('pdnum',D('product')->total());
			$this->assign('sinfo',D('information')->where(array('type'=>1))->total());
			$this->assign('finfo',D('information')->where(array('type'=>0))->total());
			$this->assign('msgnum',D('feedbook')->total());
			$this->assign('renum',D('feedbook')->where(array('replay'=>''))->total());
			$this->assign('model','管理首页');
			$this->display();
		}
		
		function login()
		{
			$lgMsg=array(0=>'请登陆!',1=>'用户名或密码错误!',2=>'用户名或密码均不能为空',3=>'您尚未登录或登录失效!',4=>'验证码输入有误,请重新输入!');
			
			if(empty($_GET['msg']))$_GET['msg']=0;
			
			$this->assign('message',$lgMsg[$_GET['msg']]);
			$this->display();
		}
		
		function dologin()
		{
			$adm	= D('qa_admin');
			if($adm->login())
			{
				$this->success('登录成功!',1,'index');
			}
		}
		
		function loginout()
		{
			session_destroy();
			$this->success('您已经成功退出!',1,'login');
		}
		
		function code()
		{
			echo new Vcode();
		}
		
		function cgpwd()
		{
			$this->assign('model','修改密码');
			$this->display();
		}
		
		function docgpwd()
		{
			$adm=D('qa_admin');
			if(empty($_POST['opwd']) || empty($_POST['npwd']) || empty($_POST['npwd2']))
				$this->error('请填写所有选项');
			
			$ernum=$adm->cgpwd();
			if( !empty($ernum) )
			{
				$this->error($ernum);
			}
			else
			{
				$this->success('修改密码成功!请重新登陆',3,'index/login');
			}
		}
		
		function upload()
		{
			$fu=new FileUpload();
			if($fu->set("allowtype", array('gif', 'png', 'jpg','bmp','swf'))->set("maxsize", 800000)->upload('imgFile'))
			{
				echo '{"error":0,"url":"'.$GLOBALS["public"]."uploads/".$fu->getFileName().'"}';
			}
			else
			{
				echo '{"error":1,"message":"'.$fu->getErrorMsg().'"}';
			}
		}
	}
