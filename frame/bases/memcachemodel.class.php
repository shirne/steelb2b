<?php
	class MemcacheModel {
		private $mc = null;
		/**
		 * 构造方法,用于添加服务器并创建memcahced对象
		 */
		function __construct(){
			$params = func_get_args();
			$mc = new Memcache;
			if( count($params) > 1){
				foreach ($params as $v){
					call_user_func_array(array($mc, 'addServer'), $v);
				}
			} else {
				call_user_func_array(array($mc, 'addServer'), $params[0]);
			
			}
			$this->mc=$mc;
		}
		/**
		 * 获取memcached对象
		 * @return	object		memcached对象
		 */
		function getMem(){
			return $this->mc;
		}
		/**
		 * 检查mem是否连接成功
		 * @return	bool	连接成功返回true,否则返回false
		 */
		function mem_connect_error(){
			$stats=$this->mc->getStats();
			if(empty($stats)){
				return false;
			}else{
				return true;
			}
		}

		private function addKey($tabName, $key){
			
			$keys=$this->mc->get($tabName);
			if(empty($keys)){
				$keys=array();
			}
			if(!in_array($key, $keys)) {
				$keys[]=$key; 
				$this->mc->set($tabName, $keys, MEMCACHE_COMPRESSED, 0);
				return true;
			}else{
				return false;
			}
		}
		/**
		 * 向memcache中添加数据
		 * @param	string	$tabName	需要缓存数据表的表名
		 * @param	string	$sql		使用sql作为memcache的key
		 * @param	mixed	$data		需要缓存的数据
		 */
		function addCache($tabName, $sql, $data){
		
			$key=md5($sql);
			if($this->addKey($tabName, $key)){
				$this->mc->set($key, $data, MEMCACHE_COMPRESSED, 0);
			}
		}
		/**
		 * 获取memcahce中保存的数据
		 * @param	string	$sql	使用SQL的key
		 * @return 	mixed		返回缓存中的数据
		 */
		function getCache($sql){
			$key=md5($sql);
			return $this->mc->get($key);
		}


		/**
		 * 删除和同一个表相关的所有缓存
		 * @param	string	$tabName	数据表的表名
		 */ 
		function delCache($tabName){
			$keys=$this->mc->get($tabName);
		
			//删除同一个表的所有缓存
			if(!empty($keys)){
				foreach($keys as $key){
					$this->mc->delete($key, 0);
				}
			}
			//删除表的所有sql的key
			$this->mc->delete($tabName, 0); 
		}
		/**
		 * 删除单独一个语句的缓存
		 * @param	string	$sql 执行的SQL语句
		 */
		function delone($sql){
			$key=md5($sql);
			$this->mc->delete($key, 0);
		}
	}
