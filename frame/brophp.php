<?php	
	header("Content-Type:text/html;charset=utf-8"); 
	date_default_timezone_set("PRC");
	
	if(isset($_SERVER['ORIG_SCRIPT_NAME']))
	{
		$_SERVER['SCRIPT_NAME']=$_SERVER['ORIG_SCRIPT_NAME'];
	}
	
	if(!isset($_SERVER['PATH_INFO']) && $_SERVER['ORIG_PATH_INFO']!=$_SERVER['SCRIPT_NAME'])
	{
		$_SERVER['PATH_INFO']=$_SERVER['ORIG_PATH_INFO'];
	}
	
	//PHP程序所有需要的路径，都使用相对路径
	define("BROPHP_PATH", rtrim(BROPHP, '/').'/');
	define("APP_PATH", rtrim(APP,'/').'/');
	define("PROJECT_PATH", dirname(BROPHP_PATH).'/');
	define("TMPPATH", str_replace(array(".", "/"), "_", ltrim($_SERVER["SCRIPT_NAME"], '/'))."/");
	
	//包含系统配置文件
	$config=PROJECT_PATH."config.inc.php";
	if(file_exists($config)){
		include $config;
	}
	//设置Debug模式
	if(defined("DEBUG") && DEBUG==1){
		$GLOBALS["debug"]=1;
		error_reporting(E_ALL ^ E_NOTICE);
		include BROPHP_PATH."bases/debug.class.php"; 
		Debug::start();
		set_error_handler(array("Debug", 'Catcher'));
	}else{
		ini_set('display_errors', 'Off');
		ini_set('log_errors', 'On');
		ini_set('error_log', PROJECT_PATH.'runtime/error_log');

	}
	//包含框架中的函数库文件
	include BROPHP_PATH.'commons/functions.inc.php';
	

	//包含全局的函数库文件，用户可以自己定义函数在这个文件中
	$funfile=PROJECT_PATH."commons/functions.inc.php";
	if(file_exists($funfile))
		include $funfile;

	
	//设置包含目录（类所在的全部目录）,  PATH_SEPARATOR 分隔符号 Linux(:) Windows(;)
	$include_path=get_include_path();
	$include_path.=PATH_SEPARATOR.BROPHP_PATH."bases/";
	$include_path.=PATH_SEPARATOR.BROPHP_PATH."classes/" ; 
	$include_path.=PATH_SEPARATOR.BROPHP_PATH."libs/" ; 
	$include_path.=PATH_SEPARATOR.PROJECT_PATH."classes/";
	$controlerpath=PROJECT_PATH."runtime/controls/".TMPPATH;
	$include_path.=PATH_SEPARATOR.$controlerpath;

	//设置include包含文件所在的所有目录	
	set_include_path($include_path);

	//自动加载类 	
	function __autoload($className){
		if($className=="memcache"){
			return;
		}else if($className=="Smarty"){
			include "Smarty.class.php";
		}else{                            
			include strtolower($className).".class.php";	
		}
		Debug::addmsg("<b> $className </b>类", 1);
	}

	//判断是否开启了页面静态化缓存
	if(CSTART==0){
		Debug::addmsg("<font color='red'>没有开启页面缓存!</font>（但可以使用）"); 
	}else{
		Debug::addmsg("开启页面缓存，实现页面静态化!"); 
	}
	
	//启用memcache缓存
	if(!empty($memServers)){
		//判断memcache控制是否安装
		if(class_exists("memcache")){
			$mem=new MemcacheModel($memServers);
			//判断Memcache服务器是否有异常
			if(!$mem->mem_connect_error()){
				Debug::addmsg("<font color='red'>连接memcache服务器失败,请检查!</font>"); //debug
			}else{
				define("USEMEM",true);
				Debug::addmsg("启用了Memcache");
			}
		}else{
			Debug::addmsg("<font color='red'>PHP没有安装memcache扩展模块,请先安装!</font>"); //debug
		}	
	}else{
		Debug::addmsg("<font color='red'>没有使用Memcache</font>(为程序的运行速度，建议使用Memcache)");  //debug
	}

	//如果Memcach开启，设置将Session信息保存在Memcache服务器中
	if(defined("USEMEM")){
		MemSession::start($mem->getMem());
		Debug::addmsg("开启会话Session (使用Memcache保存会话信息)"); //debug
	}else{
		session_start();
		Debug::addmsg("<font color='red'>开启会话Session </font>(但没有使用Memcache，开启Memcache后自动使用)"); //debug
	}

	
	Structure::create();   //初使化时，创建项目的目录结构
	Prourl::parseUrl();    //解析处理URL 

	//模板文件中所有要的路径，html\css\javascript\image\link等中用到的路径，从WEB服务器的文档根开始
	$spath=dirname($_SERVER["SCRIPT_NAME"]);
	if($spath=="/" || $spath=="\\")
		$spath="";
	$GLOBALS["root"]=$spath.'/'; 
	$GLOBALS["app"]=$_SERVER["SCRIPT_NAME"].'/'; 
	$GLOBALS["url"]=$GLOBALS["app"].$_GET["m"].'/';  
	$GLOBALS["public"]=$GLOBALS["root"].'public/';  
	$GLOBALS["res"]=$GLOBALS["root"].ltrim(APP_PATH, './')."views/".TPLSTYLE."/resource/";

	//控制器类所在的路径
	$srccontrolerfile=APP_PATH."controls/".strtolower($_GET["m"]).".class.php";

	Debug::addmsg("当前访问的控制器类在项目应用目录下的: <b>$srccontrolerfile</b> 文件！");
	//控制器类的创建
	if(file_exists($srccontrolerfile)){
		Structure::commoncontroler(APP_PATH."controls/",$controlerpath);
		Structure::controler($srccontrolerfile, $controlerpath, $_GET["m"]); 

		$className=ucfirst($_GET["m"])."Action";
		
		$controler=new $className();
		$controler->run();

	}else{
		$error=new Action();
		$error->error('页面不存在',1,'index/index');
		Debug::addmsg("<font color='red'>对不起!你访问的模块不存在,应该在".APP_PATH."controls目录下创建文件名为".strtolower($_GET["m"]).".class.php的文件，声明一个类名为".ucfirst($_GET["m"])."的类！</font>");
	}
	//设置输出Debug模式的信息
	if(defined("DEBUG") && DEBUG==1 && $GLOBALS["debug"]==1){
		Debug::stop();
		Debug::message();
	}



