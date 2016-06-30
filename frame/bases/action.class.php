<?php
	class Action extends MyTpl{
		/**
		 * 该方法用来运行框架中的操制器，在入口文件中调用
		 */
		function run(){
			if($this->left_delimiter!="<{")
				parent::__construct();	

			
			if(method_exists($this, "init")){
				$this->init();
			}

			$method=$_GET["a"];
			if(method_exists($this, $method)){
				$this->$method();
			}else{
				$this->error('页面不存在',1,'index/index');
				Debug::addmsg("<font color='red'>没有{$_GET["a"]}这个操作！</font>");
			}	
		}

		/* 
		 * 用于在控制器中进行位置重定向
		 * @param	string	$path	用于设置重定向的位置
		 * @param	string	$args 	用于重定向到新位置后传递参数
		 * 
		 */
		function redirect($path, $args=""){
			$path=trim($path, "/");
			if($args!="")
				$args="/".trim($args, "/");
			if(strstr($path, "/")){
				$url=$path.$args;
			}else{
				$url=$_GET["m"]."/".$path.$args;
			}

			$uri=$GLOBALS["app"].$url;
			//使用js跳转前面可以有输出
			echo '<script>';
			echo 'location="'.$uri.'"';
			echo '</script>';
		}

		/*
		 * 成功的消息提示框
		 * @param	string	$mess		用示输出提示消息
		 * @param	int	$timeout	设置跳转的时间，单位：秒
		 * @param	string	$location	设置跳转的新位置
		 */
		function success($mess="操作成功", $timeout=1, $location=""){
			$this->pub($mess, $timeout, $location);
			$this->assign("mark", true);
			$this->display("public/success");
			exit;
		}
		 /*
		  * 失败的消息提示框
		 * @param	string	$mess		用示输出提示消息
		 * @param	int	$timeout	设置跳转的时间，单位：秒
		 * @param	string	$location	设置跳转的新位置
		 */
		function error($mess="操作失败", $timeout=3, $location=""){
			$this->pub($mess, $timeout, $location);
			$this->assign("mark", false);
			$this->display("public/success");
			exit;
		}

		private function pub($mess, $timeout, $location){	
			$this->caching = 0;
//			if($location==""){
//				$location="window.history.back();";
//			}else{
//				$path=trim($location, "/");
//			
//				if(strstr($path, "/")){
//					$url=$path;
//				}else{
//					$url=$_GET["m"]."/".$path;
//				}
//				$location=$GLOBALS["app"].$url;
//				$location="window.location='{$location}'";
//			}
			if($location!=""){
				$path=trim($location, "/");
			
				if(strstr($path, "/")){
					$url=$path;
				}else{
					$url=$_GET["m"]."/".$path;
				}
				$location=$GLOBALS["app"].$url;
			}
			$this->assign("mess", $mess);
			$this->assign("timeout", $timeout);
			$this->assign("location", $location);
			$GLOBALS["debug"]=0;
		}

	}
