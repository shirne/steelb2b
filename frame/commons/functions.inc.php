<?php
	/*
	 * 输出各种类型的数据，调试程序时打印数据使用。
	 * 参数：可以是一个或多个任意变量或值
	 */
	function p(){
		$args=func_get_args();  //获取多个参数
		if(count($args)<1){
			Debug::addmsg("<font color='red'>必须为p()函数提供参数!");
			return;
		}	

		echo '<div style="width:100%;text-align:left"><pre>';
		//多个参数循环输出
		foreach($args as $arg){
			if(is_array($arg)){  
				print_r($arg);
				echo '<br>';
			}else if(is_string($arg)){
				echo $arg.'<br>';
			}else{
				var_dump($arg);
				echo '<br>';
			}
		}
		echo '</pre></div>';	
	}
	/*
	 * 创建Models中的数据库操作对象
	 * $className 类名
	 * $app 应用名 访问其他应用的Model
	 */
	function D($className=null,$app=""){
		//如果没有传表名或类名，则直接创建DB对象，但不能对表进行操作
		if(is_null($className)){
			$class="D".DRIVER;

			return new $class;
		}else{
			$className=strtolower($className);
			$model=Structure::model($className, $app);	
			$model=new $model();

			//如果表结构不存在，则获取表结构
			$model->setTable($className);		
		

			return $model;
		}

	}
	/*
	 * 文件尺寸转换，将大小将字节转为各种单位大小
	 * 参数$bytes：字节大小
	 */
	function tosize($bytes) {       	 	     
		if ($bytes >= pow(2,40)) {      		   
			$return = round($bytes / pow(1024,4), 2);   
			$suffix = "TB";                        	    
		} elseif ($bytes >= pow(2,30)) {  		   
			$return = round($bytes / pow(1024,3), 2);   
			$suffix = "GB";                              
		} elseif ($bytes >= pow(2,20)) {  		     
			$return = round($bytes / pow(1024,2), 2);   
			$suffix = "MB";                              
		} elseif ($bytes >= pow(2,10)) {  		     
			$return = round($bytes / pow(1024,1), 2);    
			$suffix = "KB";                             
		} else {                     			    
			$return = $bytes;                           
			$suffix = "Byte";                            
		}
		return $return ." " . $suffix;                       
	}
	
	/*
	 * 去除html标签,并截取固定长度
	 * 参数$str：要去除的字串
	 * 参数$l:截取长度
	 */
	function nohtml($str,$l){
		$str=str_replace('&nbsp;',' ',strip_tags($str));
		$str=utf8Substr($str,0,$l);
		return $str;
	}
	
	//截取utf8字符串
	function utf8Substr($str, $from, $len)
	{
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
		'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
		'$1',$str);
	}
	
	/**
	 * 获取用户真实 IP
	 *
	 * @Author: shirne
	 * @Return: string
	 */
	function getIP()
	{
		static $realip;
		if (isset($_SERVER)){
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			} else {
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")){
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			} else if (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}
	
		return $realip;
	}

