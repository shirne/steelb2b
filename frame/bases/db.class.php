<?php
abstract class DB {
		protected $msg=array();
		protected $tabName="";
		protected $fieldList=array();
		protected $sql=array("field"=>"","where"=>"", "order"=>"", "limit"=>"", "group"=>"", "having"=>"");

		/** 
		 * 用来获取表名
		 */
		public function __get($pro){
			if($pro=="tabName")
				return $this->tabName;
		}

		/**
		 * 用于重置成员属性
		 */
		protected function setNull(){
			$this->sql=array("field"=>"","where"=>"", "order"=>"", "limit"=>"", "group"=>"", "having"=>"");
		}

		/**
		 *连贯操作调用field() where() order() limit() group() having()方法，组合SQL语句
		 */
		function __call($methodName, $args){
			$methodName=strtolower($methodName);
			if(array_key_exists($methodName, $this->sql)){
				if(empty($args[0]) || (is_string($args[0]) && trim($args[0])=='')){
					$this->sql[$methodName]="";
				}else{
					$this->sql[$methodName]=$args;
				}
			}else{
				Debug::addmsg("<font color='red'>调用类".get_class($this)."中的方法{$methodName}()不存在!</font>");
			}
			return $this;
		}

		/**
		 * 按指定的条件获取结果集中的记录数
		 */
	
		function total(){
			$where="";
			$data=array();
		
			$args=func_get_args();
			if(count($args)>0){
				$where = $this->comWhere($args);
				$data=$where["data"];
				$where= $where["where"];
			}else if($this->sql["where"] != ""){
				$where=$this->comWhere($this->sql["where"]);
				$data=$where["data"];
				$where=$where["where"];
				
			}
	
			$sql="SELECT COUNT(*) as count FROM {$this->tabName}{$where}";
			return $this->query($sql, __METHOD__,$data);			
		}
		/**
		 * 获取查询多条结果，返回二维数组
		 */
		function select(){
			
			$fields = $this->sql["field"] != "" ?  $this->sql["field"][0] :  implode(",", $this->fieldList);
		
			$where="";
			$data=array();
		
			$args=func_get_args();
			if(count($args)>0){
				$where = $this->comWhere($args);
				$data=$where["data"];
				$where= $where["where"];
			}else if($this->sql["where"] != ""){
				$where=$this->comWhere($this->sql["where"]);
				$data=$where["data"];
				$where=$where["where"];
				
			}
		
		
			$order = $this->sql["order"] != "" ?  " ORDER BY {$this->sql["order"][0]}" : " ORDER BY {$this->fieldList["pri"]} ASC";
			$limit = $this->sql["limit"] != "" ? $this->comLimit($this->sql["limit"]) : "";
			$group = $this->sql["group"] != "" ? " GROUP BY {$this->sql["group"][0]}" : "";
			$having = $this->sql["having"] != "" ? " HAVING {$this->sql["having"][0]}" : "";

		
			$sql="SELECT {$fields} FROM {$this->tabName}{$where}{$group}{$having}{$order}{$limit}";
			return $this->query($sql, __METHOD__,$data);	

		}
		/**
		 * 获取一条记录，返回一维数组
		 */
		function find($pri=""){
			$fields = $this->sql["field"] != "" ?  $this->sql["field"][0] :  implode(",", $this->fieldList);
		
			if($pri==""){
				$where= $this->comWhere($this->sql["where"]) ;
				$data=$where["data"];
				$where = $this->sql["where"] != "" ? $where["where"] : "";		

			}else{
				$where=" where {$this->fieldList["pri"]}=?";  
				$data[]=$pri;
			}
			
			$sql="SELECT {$fields} FROM {$this->tabName}{$where} LIMIT 1";



  			return $this->query($sql,__METHOD__,$data);
		
		}
		//filter = 1 去除 " ' 和 HTML 实体， 0则不变
		private function check($array, $filter){
			$arr=array();
		
			foreach($array as $key=>$value){
				$key=strtolower($key);
				if(in_array($key, $this->fieldList)){
					if(is_array($filter) && !empty($filter)){
						if(in_array($key, $filter)){
							$arr[$key]=$value;	
						}else{
							$arr[$key]=stripslashes(htmlspecialchars($value));
						}
					}else if(!$filter) {
						$arr[$key]=$value;
					}else{
						$arr[$key]=stripslashes(htmlspecialchars($value));
					}
				}	
			}
			return $arr;
		}
		/**
		 * 向数据库中插入一条记录
		 */
		function insert($array=null, $filter=1){
			if(is_null($array))
				$array=$_POST;
			
			if(Validate::check($this->tabName, $array, "add", $this)){
				$array=$this->check($array, $filter);
	
            			$sql = "INSERT INTO {$this->tabName}(".implode(',', array_keys($array)).") VALUES (".implode(',', array_fill(0, count($array), '?')) . ")";

				return $this->query($sql,__METHOD__,array_values($array));
			}else{
				$this->msg=Validate::getMsg();
				return false;
			}
			
		}
		

 
		/**
		 * 更新数据表中指定条件的记录
		 */
		function update($array=null, $filter=1){
                        if(is_null($array))
				$array=$_POST; 

			if(Validate::check($this->tabName, $array, "mod", $this)){  
				$data=array();
		      		if(is_array($array)){
					if(array_key_exists($this->fieldList["pri"], $array)){
						$pri_value=$array[$this->fieldList["pri"]];
						unset($array[$this->fieldList["pri"]]);	
			       	 	}

					$array=$this->check($array, $filter); 
       				 	$s = '';
       				 	foreach ($array as $k=>$v) {

					 	$s .="{$k}=?,";
					 	$data[]=$v;  //value
				 	}
				 	$s=rtrim($s, ",");
        				$setfield=$s;
				}else{
					$setfield=$array;
					$pri_value='';
				
				}

		    
				$order = $this->sql["order"] != "" ?  " ORDER BY {$this->sql["order"][0]}" : "";
				$limit = $this->sql["limit"] != "" ? $this->comLimit($this->sql["limit"]) : "";

				if($this->sql["where"] != ""){
					$where=$this->comWhere($this->sql["where"]);
					$sql="UPDATE  {$this->tabName} SET {$setfield}".$where["where"];
					
					if(!empty($where["data"])) {
						foreach($where["data"] as $v){
							$data[]=$v;
						}
					}
					$sql.=$order.$limit;
				}else{
				
					$sql="UPDATE {$this->tabName} SET {$setfield}  WHERE {$this->fieldList["pri"]}=?";
					$data[]=$pri_value;
				}

				return $this->query($sql,__METHOD__,$data);	
			}else{
				$this->msg=Validate::getMsg();
				return false;
			}
		
		}
		/**
		 * 删除满足条件的记录		 
		 */
		function delete(){
			$where="";
			$data=array();
			
			$args=func_get_args();
			if(count($args)>0){
				$where = $this->comWhere($args);
				$data=$where["data"];
				$where= $where["where"];
			}else if($this->sql["where"] != ""){
				$where=$this->comWhere($this->sql["where"]);
				$data=$where["data"];
				$where=$where["where"];
				
			}

			$order = $this->sql["order"] != "" ?  " ORDER BY {$this->sql["order"][0]}" : "";
			$limit = $this->sql["limit"] != "" ? $this->comLimit($this->sql["limit"]) : "";
			
			if($where=="" && $limit==""){
				$where=" where {$this->fieldList["pri"]}=''";
			}
			

			$sql="DELETE FROM {$this->tabName}{$where}{$order}{$limit}";
		
			return $this->query($sql, __METHOD__,$data);
		}
	
		private function comLimit($args){
			if(count($args)==2){
				return " LIMIT {$args[0]},{$args[1]}";
			}else if(count($args)==1){
				return " LIMIT {$args[0]}";
			}else{
				return '';
			}	
		}
		
		/**
		 * 用来组合SQL语句中的where条件 
		 */ 
		private function comWhere($args){
			$where=" WHERE ";
			$data=array();
			
			if(empty($args))
				return array("where"=>"", "data"=>$data);
	
			foreach($args as $option) {
				if(empty($option)){
					$where = ''; 
					continue;
				}else if(is_string($option)){
			       	 	if (is_numeric($option[0])) {
						$option = explode(',', $option);
						$where .= "{$this->fieldList["pri"]} IN(" . implode(',', array_fill(0, count($option), '?')) . ")";
						$data=$option;
						continue;
					} else {
						$where .= $option;
						continue;
					}	
				}else if(is_numeric($option)){
					$where .="{$this->fieldList["pri"]}=?";
					$data[0]=$option;
					continue;
				}else if(is_array($option)){
					if (isset($option[0])) {
						$where .= "{$this->fieldList["pri"]} IN(" . implode(',', array_fill(0, count($option), '?')) . ")";
						$data=$option;
						continue;
        				}
					
					
					foreach($option as $k => $v ){
          					if (is_array($v)) {
							$where .= "{$k} IN(" . implode(',', array_fill(0, count($v), '?')) . ")";					
							foreach($v as $val){
								$data[]=$val;
							}
           					 } else if (strpos($k, ' ')) {
							 $where .= "{$k}?";
							 $data[]=$v;
           					 } else if (isset($v[0]) && $v[0] == '%' && substr($v, -1) == '%') {
							 $where .= "{$k} LIKE ?";
							 $data[]=$v;
               					} else {
							$where .= "{$k}=?";
							$data[]=$v;
                				}
						$where.=" AND ";
					}
				
					$where =rtrim($where, "AND ");
					$where.=" OR ";
					continue;
				}
			}
			$where=rtrim($where, "OR ");
			return array("where"=>$where, "data"=>$data);
		}
  		
		protected function escape_string_array($array){
			if(empty($array))
				return array();
		 	$value=array();
			 foreach($array as $val){
				 $value[]=str_replace(array('"', "'"), '', $val);
			 }
		 	 return $value;
		 }

		/**
		 * 输出完整的SQL 语句，用于调试
		 */
		 protected function sql($sql, $params_arr){
		 	     
			 if (false === strpos($sql, '?') || count($params_arr) == 0) return $sql;

        		if (false === strpos($sql, '%')) {
           			 $sql = str_replace('?', "'%s'", $sql);
				 array_unshift($params_arr, $sql);
            			return call_user_func_array('sprintf', $params_arr); 
        		}
		 }

		 /** 
		  * 关联查询，参数为数组，可以有多个，每个数组为一个关联的表
		  */
		 function r_select(){
			 $args=func_get_args();
			 if(count($args)==0 || !is_array($args[0]))
				 return false;

			 $one=$this->select();
			 $pri=$this->fieldList["pri"];
			 $pris=array();
			 
			 foreach($one as $row){
			
			 	$pris[]=$row[$pri];
			 }
			 
		

			 foreach($args as $tab) {
				 
				 list($tabName, $field, $fk)=$tab;

				 if(!empty($field)){
					if(!in_array($fk, explode(",", $field))){
						 $field=$field.",".$fk;	
					}else{
						$field=$field;
			 		 }
				 }else{
					$field='';
				 }	 
				 if(!empty($tab[3])) {
					 $sub=$tab[3];
				
					 $obj=D($tabName);
	 				 $new=array();
					 foreach($one as $row){
						 if(!empty($sub[1])){
							if(!empty($sub[2])){
								$row[$sub[0]]=$obj->field($field)->order($sub[1])->limit($sub[2])->where(array($fk=>$row[$pri]))->select();
							}else{
								$row[$sub[0]]=$obj->field($field)->order($sub[1])->where(array($fk=>$row[$pri]))->select();
							}
						 }else{
							 if(!empty($sub[2])){
							 
								 $row[$sub[0]]=$obj->field($field)->limit($sub[2])->where(array($fk=>$row[$pri]))->select();
							 }else{
								 $row[$sub[0]]=$obj->field($field)->where(array($fk=>$row[$pri]))->select();
							 }
						}
						 $new[]=$row;					 
					 }

					 $one=$new;
					
				 } else {
					$new=array();
					$where=array($fk=>$pris);
				 
				 	if(!empty($where[$fk])) {	 
						$data=D($tabName)->field($field)->where($where)->select();
						foreach($data as $row){
							foreach($one as $read){
								if($read[$pri]==$row[$fk]){
					 				$new[]=$read+$row;	
					 			}
				 			}
			 			}
					 }
			    	 }
			
			 }
			 return $new;
		 }
		/**
		 *  关联删除
		 */
		 function r_delete(){
			
			
			 $args=func_get_args();

			 if(count($args)==0 || !is_array($args[0]))
				 return false;

			 $one=$this->select();
			 $pri=$this->fieldList["pri"];
			 $pris=array();
			 
			 foreach($one as $row){
			
			 	$pris[]=$row[$pri];
			 }

			 $affected_rows=0;
			 foreach($args as $tab) {
				 $arr=array($tab[1]=>$pris);
			
				 if(!empty($arr[$tab[1]]))
					$affected_rows+=D($tab[0])->where($arr)->delete();
			 }

			
			 $affected_rows+=$this->where($pris)->delete();

			 return $affected_rows;
		 }
		 /**
		  * 设置提示信息
		  * @param	mixed	$mess	提示消息字符串或数组
		  */
		 function setMsg($mess){
			 if(is_array($mess)){
				 foreach($mess as $one){
					 $this->msg[]=$one;
				 }
			 }else{
			 	$this->msg[]=$mess;
			 }
		 
		 }
		 /**
		  * 获取提示信息
		  * @return	string	提示消息字符串
		  */
		 function getMsg(){
		 	$str='';

			foreach($this->msg as $msg){
				$str.=$msg.'<br>';
			}
			return $str;
		 }

		abstract function query($sql, $method,$data=array());
		abstract function setTable($tabName);
		abstract function beginTransaction();
		abstract function commit();
		abstract function rollBack();
		abstract function dbSize();
		abstract function dbVersion();
	}
