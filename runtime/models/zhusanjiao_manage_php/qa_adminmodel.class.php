<?php
	class Qa_adminModel extends Dpdo {
		/*管理员登录*/
		public function login()
		{
			/*$this->insert(array(
								'qa_admin'=>'admin',
								'qa_pwd'=>md5('admin'),
								'create_date'=>date('Y-m-d H:i:s'),
								'login_times'=>0,
								'purview'=>65536
								));*/
			if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['code']))
			{
				if($_SESSION['code'] != strtoupper($_POST['code']))
				{
					Action::redirect('index/login','msg/4');
				}
				else
				{
					$ainfo	= $this->field('id,qa_admin,qa_pwd,purview,login_times')->where(array('qa_admin'=>$_POST['username']))->find();
					if($ainfo['qa_pwd'] == md5($_POST['password']))
					{
						$_SESSION['admin_name']=$ainfo['qa_admin'];
						$_SESSION['admin_pwd']=$ainfo['qa_pwd'];
						$_SESSION['purview']=$ainfo['purview'];
						$this->where($ainfo['id'])->update(array('login_date'=>date('Y-m-d H:i:s'),'login_ip'=>getIP(),'login_times'=>$ainfo['login_times']+1));
						return true;
					}
					else
					{
						Action::redirect('index/login','msg/1');
					}
				}
			}
			else
			{
				Action::redirect('index/login','msg/2');
			}
		}
		
		/*判断是否登录,是否有效*/
		public function islogin()
		{
			
			if(!empty($_SESSION['admin_name']) && !empty($_SESSION['admin_pwd']))
			{
				$ainfo	= $this->where(array('qa_admin'=>$_SESSION['admin_name']))->find();
				if($ainfo['qa_pwd'] == $_SESSION['admin_pwd'] && $ainfo['purview'] == $_SESSION['purview'])
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		
		public function cgpwd()
		{
			if(md5($_POST['npwd']) != md5($_POST['npwd2']))
			{
				return '两次输入不一致,请确认输入';
			}
			
			$im=$this->where(array('qa_admin'=>$_SESSION['admin_name']))->find();
			if($im['qa_pwd'] != md5($_POST['opwd']))
			{
				return '旧密码有误!';
			}
			
			$this->where($im['id'])->update(array('qa_pwd'=>md5($_POST['npwd'])));
			return '';
		}
	}