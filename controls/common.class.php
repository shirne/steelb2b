<?php
	class Common extends Action {
		function init(){
			$cfgtbl=D('config');
			$config=$cfgtbl->find();
			if(empty($_SESSION['count'])){
				$_SESSION['count']=1;
				$config['visitora']=$config['visitora']+1;
				$config['visitors']=$config['visitors']+1;
				$cfgtbl->where(1)->update(array('visitora'=>$config['visitora'],'visitors'=>$config['visitors']));
			}
			
			
			if(!$config['isrun'])
				$this->error('网站维护中...');
			if($config['ipstop'] && array_search(getIP(),explode('|',$config['stopip']))!==false )
				$this->error('对不起,<br />您的ip不允许访问本站.<br />如有疑问请联系管理员');
			
			/*用户登录*/
			$user=D('qa_user');
			if(!$user->islogin() && empty($_POST['username']))
			{
				$user->login();
			}
			
			/*网站配置*/
			$this->assign('cfg',$config);
			
			/*公告信息*/
			$ntc=D('notice');
			$this->assign('ntc',$ntc->field('id,title,link,date')->order('date desc,id desc')->limit(5)->select());
			
			/*友情链接*/
			$lnk=D('links');
			$this->assign('lnk',$lnk->field('id,name,sname,link,image')->order('id asc')->select());
			
			/*广告*/
			$ads=D('ad')->select();
			$this->assign('ad',$ads);
		}		
	}