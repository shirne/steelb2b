<?php
	class Mytpl extends Smarty {
		/**
		 * 构造方法，用于初使化Smarty对象中的成员属性
		 *
		 */
		function __construct(){
			$this->template_dir=APP_PATH."views/".TPLSTYLE;
			$this->compile_dir=PROJECT_PATH."runtime/comps/".TPLSTYLE."/".TMPPATH;
			$this->caching=CSTART;
			$this->cache_dir=PROJECT_PATH."runtime/cache/".TPLSTYLE;
			$this->cache_lifetime=CTIME;
			$this->left_delimiter="<{";
			$this->right_delimiter="}>";
			parent::__construct();
		}

		/*
		 * 重新父类Smarty类中的方法
		 * @param	string	$resource_name	模板的位置
		 * @param	mixed	$cache_id	缓存的ID
		 */
		function display($resource_name=null, $cache_id = null, $compile_id = null) {

			//将部分全局变量直接分配到模板中使用	
			$this->assign("root", rtrim($GLOBALS["root"], "/"));
			$this->assign("app", rtrim($GLOBALS["app"], "/"));
			$this->assign("url", rtrim($GLOBALS["url"], "/"));
			$this->assign("public", rtrim($GLOBALS["public"], "/"));
			$this->assign("res", rtrim($GLOBALS["res"], "/"));
		
			if(is_null($resource_name)){
				$resource_name="{$_GET["m"]}/{$_GET["a"]}.".TPLPREFIX;
			}else if(strstr($resource_name,"/")){
				$resource_name=$resource_name.".".TPLPREFIX;
			}else{
				$resource_name=$_GET["m"]."/".$resource_name.".".TPLPREFIX;
			}
			Debug::addmsg("使用模板 <b> $resource_name </b>");
			parent::display($resource_name, $cache_id, $compile_id);	
		}
		/* 
		 * 重载父类的Smarty类中的方法
		 * @param	string	$resource_name	模板的位置
		 * @param	mixed	$cache_id	缓存的ID
		 */
		function is_cached($tpl_file=null, $cache_id = null, $compile_id = null) {
			if(is_null($tpl_file)){
				$tpl_file="{$_GET["m"]}/{$_GET["a"]}.".TPLPREFIX;
			}else if(strstr($tpl_file,"/")){
				$tpl_file=$tpl_file.".".TPLPREFIX;
			}else{
				$tpl_file=$_GET["m"]."/".$tpl_file.".".TPLPREFIX;
			}
			parent::is_cached($tpl_file, $cache_id, $compile_id);
		}
	}
