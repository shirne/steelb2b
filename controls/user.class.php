<?php
	class user{
		
		/*会员中心首页*/
		function index(){
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			$this->assign('user',D('qa_user')->where(array('qa_user'=>$_SESSION['username']))->find());
			
			$this->assign('title','会员中心');
			$this->assign('css','sub1');
			$this->display();
		}
		
		/*更改资料*/
		function modify(){
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			if(empty($_POST['addr']) ||
				empty($_POST['mobile']) )
				$this->error('对不起!请将必填资料填写完整!',1);
			
			if(empty($_POST['url']) || strtolower(trim($_POST['url']))=='http://')
				$_POST['url']='';
			
			if($usr->where(array('qa_user'=>$_SESSION['username']))->update()!=false)
			{
				$this->success('资料修改成功',1,'userdata');
			}
			else
			{
				$this->error('对不起!请检查您输入的资料<br />或者您没有作任何更改',1);
			}
		}
		
		function cgpwd()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			$this->assign('title','修改密码');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function docgpwd()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			if(empty($_POST['opassword']) ||
				empty($_POST['password']) ||
				empty($_POST['repassword']))
				$this->error('请填写完整再提交',1);
			
			if($_POST['password'] != $_POST['repassword'])
				$this->error('两次输入的密码不一致'.$_POST['password'].'  '.$_POST['repassword']);
			if($u=$usr->where(array('qa_user'=>$_SESSION['username']))->find())
			{
				if(md5($_POST['opassword'])!=$u['qa_pwd'])
				{
					$this->error('您输入的旧密码不正确');
				}
				else
				{
					if($usr->where($u['id'])->update(array('qa_pwd'=>md5($_POST['password'])))!=false)
					{
						$this->success('修改密码成功!请重新登录',1,'loginout');
					}
					else
					{
						$this->error('修改失败',1);
					}
				}
			}
			else
			{
				$this->error('资料有误!',1);
			}
		}
		
		/*用户注册*/
		function add(){
			$user=D('qa_user');
			
			if(empty($_POST['username']) ||
				empty($_POST['password']) ||
				empty($_POST['addr']) ||
				empty($_POST['mobile']))
				$this->error('对不起!请将必填资料填写完整!',1);
			
			if($_POST['repassword']!=$_POST['password'])
				$this->error('对不起!两次输入的密码不一致,请确认',1);
			
			if(empty($_POST['url']) || strtolower(trim($_POST['url']))=='http://')
				$_POST['url']='';
			
			$_POST['qa_user']=$_POST['username'];
			$_POST['qa_pwd']=md5($_POST['password']);
			$_POST['regdate']=date('Y-m-d H:i:s');
			$_POST['filt']=false;
			
			
			if($user->insert())
			{
				$this->success('注册成功,请登录',1,'login');
			}
			else
			{
				$this->error('对不起!请检查您输入的资料',1);
			}
		}
		
		function userdata()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			$this->assign('city',D('city')->field('id,name')->order('sort asc,id asc')->select());
			$this->assign('user',$usr->where(array('qa_user'=>$_SESSION['username']))->find());
			
			$this->assign('title','会员资料修改');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function login(){
			if(!empty($_SESSION['username']))
			{
				session_destroy();
			}
			
			$lgMsg=array('','用户名或密码错误!','用户名或密码为空!','您还没有登录,请先登录');
			
			$this->assign('title','用户登录');
			$this->assign('message',$lgMsg[$_GET['msg']]);
			$this->assign('css','sub1');
			$this->display();
		}
		
		function dologin(){
			$usr=D('qa_user');
			$enum=$usr->login();
			if($enum==0)
			{
				$this->success('登录成功!','1','index');
			}
			else
			{
				$this->redirect('login','msg/'.$enum);
			}
		}
		
		function loginout(){
			session_destroy();
			if(!empty($_COOKIE['username']))
			{
				setcookie('username', '', time()-3600,'/');
				setcookie('password', '', time()-3600,'/');
			}
			$this->redirect('login');
		}
		
		function register(){
			$cty=D('city');
			
			$this->assign('city',$cty->field('id,name')->order('sort asc,id asc')->select());
			$this->assign('title','新用户注册');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function code()
		{
			echo new Vcode();
		}
		
		function infomgr()
		{
			$usr=D('qa_user');
			$ifo=D('information');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			$where=array('userid'=>$u['id']);
			$page=new page($ifo->where($where)->total(),F_PAGE,'');
			
			$this->assign('list',$ifo->where($where)->order('top desc,date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			
			$this->assign('title','信息管理');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function delinfo()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			if(empty($_GET['id']) && empty($_POST['id']))
			{
				$this->error('请选择要删除的信息',1);
			}
			
			if(empty($_POST['id']))
				$id=$_GET['id'];
			else
				$id=$_POST['id'];
			
			$ifo=D('information');
			
			if(!$nf=$ifo->where($id)->find())
			{
				$this->error('信息不存在或已删除',1);
			}
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			if($ifo->where(array('id'=>$id,'userid <>'=>$u['id']))->total()>0)
			{
				$this->error('您没有修改该信息的权限',1);
			}
			
			if($ifo->delete($id))
			{
				$this->success('删除信息成功',1,'user/infomgr');
			}
			else
			{
				$this->error('删除信息失败',1);
			}
		}
		
		function modinfo()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			if(empty($_GET['id']))
			{
				$this->error('请选择要修改的信息',1);
			}
			$ifo=D('information');
			if(!$nf=$ifo->where($_GET['id'])->find())
			{
				$this->error('信息不存在或已删除',1);
			}
			if(!$usr->where(array('id'=>$nf['userid'],'qa_user'=>$_SESSION['username']))->find())
			{
				$this->error('您没有修改该信息的权限',1);
			}
			
			
			$this->assign('info',$nf);
			$this->assign('title','修改信息');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function pubinfo()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			
			$this->assign('title','发布信息');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function saveinfo()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			$ifo=D('information');
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			$_POST['userid']=$u['id'];
			$_POST['company']=$u['company'];
			$_POST['top']=0;
			
			if(empty($_POST['type']))
				$_POST['type']=0;
			else
				$_POST['type']=1;
			
			if(empty($_POST['id']))
			{
				if(empty($_POST['code']) || strtoupper($_POST['code'])!=$_SESSION['code'])
					$this->error('请输入正确的验证码',1);
				
				$_POST['ip']=getIP();
				$_POST['date']=date('Y-m-d H:i:s');
				if($ifo->insert())
				{
					$this->success('发布信息成功',1,'user/infomgr');
				}
				else
				{
					$this->error('发布信息失败',1);
				}
			}
			else
			{
				if($ifo->update())
				{
					$this->success('修改信息成功',1,'user/infomgr');
				}
				else
				{
					$this->error('修改信息失败');
				}
			}
		}
		
		function feed()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			$feed=D('feedbook');
			$where=array('user'=>$u['id']);
			$page=new page($feed->where($where)->total(),F_PAGE,'');
			
			$this->assign('list',$feed->where($where)->order('date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->assign('title','会员反馈');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function dofeed()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			if(empty($_POST['name']) || empty($_POST['content']))
				$this->error('请填写完整再提交',1);
			$_POST['user']=$u['id'];
			$_POST['date']=date('Y-m-d H:i:s');
			if(D('feedbook')->insert())
			{
				$this->success('提交成功!',1);
			}
			else
			{
				$this->error('提交失败,请检查您输入的内容',2);
			}
		}
		
		function ask()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			$u=$usr->where(array('qa_user'=>$_SESSION['username']))->find();
			$this->assign('ask',$u['ask']);
			$this->assign('title','申请认证');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function doask()
		{
			$usr=D('qa_user');
			if(!$usr->islogin())
			{
				$this->redirect('login','msg/3');
			}
			if($usr->where(array('qa_user'=>$_SESSION['username']))->update())
			{
				$this->success('提交成功!'.(empty($_POST['ask'])?'您已经取消了申请':'请等待审核'),1);
			}
			else
			{
				$this->error('提交失败',1);
			}
		}
	}