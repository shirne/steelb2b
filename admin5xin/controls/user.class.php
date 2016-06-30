<?php
	class user
	{
		function index()
		{
			$us=D('qa_user');
			$search=array('filt <>'=>1);
			$searcha=array();
			$searchstr='';
			if(!empty($_GET['username']))
			{
				$search['qa_user']='%'.$_GET['username'].'%';
				$searcha['username']=$_GET['username'];
			}
			
			if(!empty($_GET['company']))
			{
				$search['company']='%'.$_GET['company'].'%';
				$searcha['company']=$_GET['company'];
			}
			
			if(!empty($_GET['email']))
			{
				$search['email']='%'.$_GET['email'].'%';
				$searcha['email']=$_GET['email'];
			}
			
			if(!empty($_GET['rdate']) && $date=date_parse($_GET['rdate']))
			{
				if(!empty($date['year']) && !empty($date['month']) && !empty($date['day']) )
				{
					$search['regdate >=']=$date['year'].'-'.$date['month'].'-'.$date['day'];
					$searcha['rdate']=$search['regdate >='];
				}
			}
			
			if(!empty($_GET['edate']) && $date=date_parse($_GET['edate']))
			{
				if(!empty($date['year']) && !empty($date['month']) && !empty($date['day']) )
				{
					$search['regdate <=']=$date['year'].'-'.$date['month'].'-'.$date['day'];
					$searcha['edate']=$search['regdate <='];
				}
			}
			
			if(!empty($_GET['area']))
			{
				$search['concat(prod,city,area,addr) like']='%'.$_GET['area'].'%';
				$searcha['area']=$_GET['area'];
			}
			foreach($searcha as $key=>$value)
			{
				$searchstr.='/'.$key.'/'.$value;
			}
			
			$page=new page($us->where($search)->total(),B_PAGE,ltrim($searchstr,'/'));
			
			$this->assign('search',$searcha);
			$this->assign('model','普通用户管理');
			$this->assign('searchstr',$searchstr);
			$this->assign('users',$us->where($search)->limit($page->limit)->order('id asc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function auth()
		{
			$us=D('qa_user');
			$search=array('filt'=>1);
			$searcha=array();
			$searchstr='';
			if(!empty($_GET['username']))
			{
				$search['qa_user']='%'.$_GET['username'].'%';
				$searcha['username']=$_GET['username'];
			}
			
			if(!empty($_GET['company']))
			{
				$search['company']='%'.$_GET['company'].'%';
				$searcha['company']=$_GET['company'];
			}
			
			if(!empty($_GET['email']))
			{
				$search['email']='%'.$_GET['email'].'%';
				$searcha['email']=$_GET['email'];
			}
			
			if(!empty($_GET['rdate']) && $date=date_parse($_GET['rdate']))
			{
				if(!empty($date['year']) && !empty($date['month']) && !empty($date['day']) )
				{
					$search['regdate >=']=$date['year'].'-'.$date['month'].'-'.$date['day'];
					$searcha['rdate']=$search['regdate >='];
				}
			}
			
			if(!empty($_GET['edate']) && $date=date_parse($_GET['edate']))
			{
				if(!empty($date['year']) && !empty($date['month']) && !empty($date['day']) )
				{
					$search['regdate <=']=$date['year'].'-'.$date['month'].'-'.$date['day'];
					$searcha['edate']=$search['regdate <='];
				}
			}
			
			if(!empty($_GET['area']))
			{
				$search['concat(prod,city,area,addr) like']='%'.$_GET['area'].'%';
				$searcha['area']=$_GET['area'];
			}
			foreach($searcha as $key=>$value)
			{
				$searchstr.='/'.$key.'/'.$value;
			}
			
			$page=new page($us->where($search)->total(),B_PAGE,ltrim($searchstr,'/'));
			
			$this->assign('search',$searcha);
			$this->assign('model','认证用户管理');
			$this->assign('searchstr',$searchstr);
			$this->assign('users',$us->where($search)->limit($page->limit)->order('id asc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display('user/index');
		}
		
		function ask()
		{
			$us=D('qa_user');
			$search=array('filt'=>0,'ask <>'=>'');
			
			$page=new page($us->where($search)->total(),B_PAGE,ltrim($searchstr,'/'));
			
			$this->assign('model','等待认证的用户');
			$this->assign('users',$us->where($search)->limit($page->limit)->order('id asc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function check()
		{
			if(empty($_POST['id']) && empty($_GET['id']))
				$this->error('没有指定要认证的用户!',2);
			if(empty($_POST['id']))
				$id=$_GET['id'];
			else
				$id=$_POST['id'];
				
			if(empty($_POST['act']))
				$act=$_GET['act'];
			else
				$act=$_POST['act'];
			
			$us=D('qa_user');
			switch($act)
			{
				case 1:
				case '认证':
					if($us->where($id)->update(array('filt'=>true)))
					{
						$this->success('认证成功!',2);
					}
					else
					{
						$this->error('认证失败!'.$us->getMsg(),2);
					}
					break;
				case 2:
				case '拒绝':
					if($us->where($id)->update(array('filt'=>false)))
					{
						$this->success('拒绝认证成功!',2);
					}
					else
					{
						$this->error('拒绝认证失败!'.$us->getMsg(),2);
					}
					break;
				default:
					$this->error('操作尚未定义!',2);
			}
		}
		
		function add()
		{
			$this->assign('model','添加用户');
			$this->assign('city',D('city')->order('id asc')->select());
			$this->display();
		}
		
		function modify()
		{
			$us=D('qa_user');
			if(empty($_GET['id']))
				$this->error('没有指定要更改的用户!',2);
			
			if($user=$us->where($_GET['id'])->find())
			{
				$this->assign('user',$user);
				$this->assign('model','更改用户');
				$this->assign('city',D('city')->order('id asc')->select());
				$this->display();
			}
			else
			{
				$this->error('用户不存在!',2);
			}
		}
		
		function save()
		{
			$us=D('qa_user');
			
			if(empty($_POST['filt']))
			{
				$_POST['filt']=0;
				$act='index';
			}
			else
			{
				$_POST['filt']=1;
				$act='auth';
			}
			
			if(empty($_POST['id']))
			{
				if(empty($_POST['qa_user']) || empty($_POST['qa_pwd']) || empty($_POST['company']))
					$this->error('必须填写用户名,密码与公司名',2);
				
				if($us->where(array('qa_user'=>$_POST['qa_user']))->find())
					$this->error('用户名与现有用户重复,请修改',2);
				
				$_POST['regdate']=date('Y-m-d H:i:s');
				$_POST['qa_pwd']=md5(trim($_POST['qa_pwd']));
				if($us->insert($_POST))
				{
					$this->success('添加用户成功!',2,'user/'.$act);
				}
				else
				{
					$this->error('添加失败!'.$us->getMsg(),2);
				}
			}
			else
			{
				if(empty($_POST['company']))
					$this->error('公司名不能为空',2);
				
				if($user=$us->where($_POST['id'])->find())
				{
					if(empty($_POST['qa_pwd']))
						$_POST['qa_pwd']=$user['qa_pwd'];
					else
						$_POST['qa_pwd']=md5(trim($_POST['qa_pwd']));
					
					if($us->update($_POST))
					{
						$this->success('更改资料成功!',2,'user/'.$act);
					}
					else
					{
						$this->error('修改失败!'.$us->getMsg(),2);
					}
				}
				else
				{
					$this->error('要更改的用户不存在!');
				}
			}
		}
		
		function del()
		{
			if(empty($_GET['id']) && empty($_POST['id']))
				$this->error('没有删除目标!',2);
			$us=D('qa_user');
			$id=$_GET['id'];
			if(empty($id))
				$id=$_POST['id'];
			if($us->delete($id))
			{
				$this->success('删除成功!',2);
			}
			else
			{
				$this->error('删除失败!'.$us->getMsg());
			}
		}
		
		function spec()
		{
			$us=D('enter');
			
			$page=new page($us->where($search)->total(),B_PAGE,'');
			
			$this->assign('model','入驻企业');
			$this->assign('users',$us->limit($page->limit)->order('id asc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function specadd()
		{
			$this->assign('model','添加企业');
			$this->assign('city',D('city')->order('id asc')->select());
			$this->display();
		}
		
		function specmodi()
		{
			$us=D('enter');
			if(empty($_GET['id']))
				$this->error('没有指定要更改的企业!',2);
			
			if($user=$us->where($_GET['id'])->find())
			{
				$this->assign('user',$user);
				$this->assign('model','更改企业资料');
				$this->assign('city',D('city')->order('id asc')->select());
				$this->display();
			}
			else
			{
				$this->error('企业不存在!',2);
			}
		}
		
		function specsave()
		{
			$us=D('enter');
			
			if(empty($_POST['filt']))
				$_POST['filt']=false;
			else
				$_POST['filt']=true;
			
			if(empty($_POST['inte']))
				$_POST['inte']=false;
			else
				$_POST['inte']=true;
			
			if(empty($_POST['id']))
			{
				if(empty($_POST['company']))
					$this->error('必须填写公司名',2);
				
				if($us->where(array('company'=>$_POST['company']))->find())
					$this->error('该公司已经添加过了!',2);
				
				$_POST['regdate']=date('Y-m-d H:i:s');
				if($us->insert($_POST))
				{
					$this->success('添加企业成功!',2,'user/spec');
				}
				else
				{
					$this->error('添加失败!'.$us->getMsg(),2);
				}
			}
			else
			{
				if(empty($_POST['company']))
					$this->error('公司名不能为空',2);
				
				if($user=$us->where($_POST['id'])->find())
				{
					if($us->update($_POST))
					{
						$this->success('更改资料成功!',2,'user/spec');
					}
					else
					{
						$this->error('修改失败!'.$us->getMsg(),2);
					}
				}
				else
				{
					$this->error('要更改的企业不存在!');
				}
			}
		}
		
		function specdel()
		{
			if(empty($_GET['id']) && empty($_POST['id']))
				$this->error('没有删除目标!',2);
			if(!empty($_POST['id']))
				$id=$_POST['id'];
			else
				$id=$_GET['id'];
			
			$us=D('enter');
			if($us->delete($id))
			{
				$this->success('删除成功!',2);
			}
			else
			{
				$this->error('删除失败!'.$us->getMsg());
			}
		}
	}
	