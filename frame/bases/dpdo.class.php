<?php
	class Dpdo extends DB{
		static $pdo=null;
		/**
		 *获取数据库连接对象PDO
		 */
		static function connect(){
			if(is_null(self::$pdo)) {
				try{
					if(defined("DSN"))
						$dsn=DSN;
					else
						$dsn="mysql:host=".HOST.";dbname=".DBNAME;

					$pdo=new PDO($dsn, USER, PASS, array(PDO::ATTR_PERSISTENT=>true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$pdo=$pdo;
					return $pdo;
				}catch(PDOException $e){
					echo "连接数库失败：".$e->getMessage();
				}
			}else{
				return self::$pdo;
			}
		}

		/**
		 * 执行SQL语句的方法
		 * @param	string	$sql		用户查询的SQL语句
		 * @param	string	$method		SQL语句的类型（select,find,total,insert,update,other）
		 * @param	array	$data		为prepare方法中的?参数绑定值
		 * @return	mixed			根据不同的SQL语句返回值
		 */
		function query($sql, $method,$data=array()){
			 $this->setNull(); //初使化sql
			
			 $value=$this->escape_string_array($data);
			 $marr=explode("::", $method);
			 $method=strtolower(array_pop($marr));
			 if(strtolower($method)==trim("total")){
			 	$sql=preg_replace('/select.*?from/i','SELECT count(0) as count FROM',$sql);
			 }
			 $addcache=false;
			 $memkey=$this->sql($sql, $value);
			 if(defined("USEMEM")){
				 global $mem;
				 if($method == "select" || $method == "find" || $method=="total"){
					$data=$mem->getCache($memkey);
					if($data){
						return $data;
					}else{
						$addcache=true;	
					}
				 }

			 }
	 	
		
			 try{
				
	 			$pdo=self::connect();
		 		$stmt=$pdo->prepare($sql);
		        	$result=$stmt->execute($value);
				Debug::addmsg($memkey,2);
				
				if(isset($mem) && !$addcache){
					if($stmt->rowCount()>0){
						$mem->delCache($this->tabName);
						Debug::addmsg("清除表<b>{$this->tabName}</b>在Memcache中所有缓存!");
					}
				}
			         
				 switch($method){
					 case "select":
						 $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

						 if($addcache){
						 	$mem->addCache($this->tabName, $memkey, $data);
						 }
						 return $data;
						break;
					case "find":
						$data=$stmt->fetch(PDO::FETCH_ASSOC);

						 if($addcache){
						 	$mem->addCache($this->tabName, $memkey, $data);
						 }
						 return $data;
						break;

					case "total":
						$row=$stmt->fetch(PDO::FETCH_NUM);

						 if($addcache){
						 	$mem->addCache($this->tabName, $memkey, $row[0]);
						 }
					
						return $row[0];
						break;
					case "insert":
						return $pdo->lastInsertId();
						break;
					case "delete":
					case "update":
						return $stmt->rowCount();
						break;
					default:
						return $result;
				 }
			
			}catch(PDOException $e){
				Debug::addmsg("<font color='red'>SQL error: ".$e->getMessage().'</font>');
				Debug::addmsg("请查看：<font color='#005500'>".$memkey.'</font>'); //debug
			}	
		}

		/**
		 * 自动获取表结构
		 */ 
		function setTable($tabName){
			$cachefile=PROJECT_PATH."runtime/data/".$tabName.".php";
			$this->tabName=TABPREFIX.$tabName;
		
			if(!file_exists($cachefile)){
				try{
					$pdo=self::connect();
					$stmt=$pdo->prepare("desc {$this->tabName}");
					$stmt->execute();
					$fields=array();
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						if($row["Key"]=="PRI"){
							$fields["pri"]=strtolower($row["Field"]);
						}else{
							$fields[]=strtolower($row["Field"]);
						}
					}
					//如果表中没有主键，则将第一列当作主键
					if(!array_key_exists("pri", $fields)){
						$fields["pri"]=array_shift($fields);		
					}
				
					file_put_contents($cachefile, "<?php ".json_encode($fields));
					$this->fieldList=$fields;
				}catch(PDOException $e){
					Debug::addmsg("<font color='red'>异常：".$e->getMessage().'</font>');
				}
			}else{
				$json=ltrim(file_get_contents($cachefile),"<?ph ");
				$this->fieldList=(array)json_decode($json, true);	
			}
			Debug::addmsg("表<b>{$this->tabName}</b>结构：".implode(",", $this->fieldList),2); //debug
		}
    	/**
		* 事务开始
    	*/
		public function beginTransaction() {
			$pdo=self::connect();
			$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); 
			$pdo->beginTransaction();
		}
		
		/**
     	* 事务提交
     	*/
		public function commit() {
			$pdo=self::connect();
			$pdo->commit();
			$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1); 
		}
		
		/**
     	* 事务回滚
     	*/
		public function rollBack() {
			$pdo=self::connect();
			$pdo->rollBack();
			$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1); 
    		}
		/*
		 * 获取数据库使用大小
		 * @return	string		返回转换后单位的尺寸
		 */
		public function dbSize() {
			$sql = "SHOW TABLE STATUS FROM " . DBNAME;
			if(defined("TABPREFIX")) {
				$sql .= " LIKE '".TABPREFIX."%'";
			}
			$pdo=self::connect();
			$stmt=$pdo->prepare($sql);
		        $stmt->execute();
			$size = 0;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				$size += $row["Data_length"] + $row["Index_length"];
			return tosize($size);
		}
		/*
		 * 数据库的版本
		 * @return	string		返回数据库系统的版本
		 */
		function dbVersion() {
			$pdo=self::connect();
			return $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
		}
	}
