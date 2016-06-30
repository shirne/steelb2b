<?php
	class Common extends Action {
		function init(){
			if(stripos($_SERVER['HTTP_USER_AGENT'],'spider')){
				header('location:index.php');
				exit;
			}
			if($_GET['m']!='index' || ($_GET['a']!='login' && $_GET['a']!='code' && $_GET['a']!='dologin'))
			{
				if($_GET['a']!='getenter'){
					if( !isset($_SERVER['HTTP_REFERER']) )
					{
						$this->redirect('index/login','msg/3');
					}else{
						$ref=$_SERVER['HTTP_REFERER'];
						$host=$_SERVER['SERVER_NAME'];
						$ref=strtolower(substr(ltrim($ref,'http://'),0,strlen($host)));
						if($ref!=strtolower($host))
						{
							$this->redirect('index/login','msg/3');
						}
					}
				}
				$adm=D('qa_admin');
				if(!$adm->islogin())
				{
					$this->redirect('index/login','msg/3');
				}
			}
			//$GLOBALS['cstart']=0;
		}
	}