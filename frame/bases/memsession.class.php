<?php
	class MemSession {
		private static $handler=null;
		private static $lifetime=null;
		private static $time = null;
		/**
		 * 初使化和开启session
		 * @param	Memcache	$memcache	memcache对象
		 */
		public static function start(Memcache $memcache){
 			//将 session.save_handler 设置为 user，而不是默认的 files
			ini_set('session.save_handler', 'user');

			self::$handler=$memcache;
			self::$lifetime=ini_get('session.gc_maxlifetime');
			self::$time=time();
			session_set_save_handler(
					array(__CLASS__, 'open'),
					array(__CLASS__, 'close'),
					array(__CLASS__, 'read'),
					array(__CLASS__, 'write'),
					array(__CLASS__, 'destroy'),
					array(__CLASS__, 'gc')
				);
			session_start();
			return true;
		}

	
		public static function open($path, $name){
			return true;
		}

		public static function close(){
			return true;
		}
		/**
		 * 从SESSION中读取数据
		 * @param	string	$PHPSESSID	session的ID
		 * @return 	mixed			返回session中对应的数据
		 */
		public static function read($PHPSESSID){
			$out=self::$handler->get(self::session_key($PHPSESSID));

			if($out===false || $out == null)
				return '';

			return $out;
		}
		/**
		 *向session中添加数据
		 */
		public static function write($PHPSESSID, $data){
			
			$method=$data ? 'set' : 'replace';
		
			return self::$handler->$method(self::session_key($PHPSESSID), $data, MEMCACHE_COMPRESSED, self::$lifetime);
		}

		public static function destroy($PHPSESSID){
			return self::$handler->delete(self::session_key($PHPSESSID));
		}

		public static function gc($lifetime){
			//无需额外回收,memcache有自己的过期回收机制
			return true;
		}

		private static function session_key($PHPSESSID){
			$session_key=TABPREFIX.$PHPSESSID;

			return $session_key;
		}	
	}

