<?php
	class qa_user 
	{
		
		/*用户登录*/
		public function login()
		{
			if(!empty($_POST['username']) && !empty($_POST['password']))
			{
				$uinfo=$this->field('id,qa_user,qa_pwd,filt')->where(array('qa_user'=>$_POST['username']))->find();
				if($uinfo['qa_pwd'] == md5(trim($_POST['password'])))
				{
					$_SESSION['username']	= $uinfo['qa_user'];
					$_SESSION['filt']		= $uinfo['filt'];
					if($_POST['auto']==1)
					{
						setcookie('username', $uinfo['qa_user'], time()+3600*24*365,'/');
						setcookie('password', $uinfo['qa_pwd'], time()+3600*24*365,'/');
					}
					return 0;
				}
				else
				{
					return 1;
				}
			}
			elseif(!empty($_COOKIE['username']) && !empty($_COOKIE['password']))
			{
				$uinfo=$this->field('id,qa_user,qa_pwd,filt')->where(array('qa_user'=>$_COOKIE['username']))->find();
				
				if($uinfo['qa_pwd'] == trim($_COOKIE['password']))
				{
					$_SESSION['username']	= $uinfo['qa_user'];
					$_SESSION['filt']		= $uinfo['filt'];
				}
				else
				{
					setcookie('username', '', time()-3600*24*365,'/');
					setcookie('password', '', time()-3600*24*365,'/');
				}
			}
			else
			{
				return 2;
			}
		}
		
		public function islogin()
		{
			if(empty($_SESSION['username']))
				return false;
			else
				return true;
		}
		

	}