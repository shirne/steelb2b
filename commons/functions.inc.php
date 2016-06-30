<?php
	//全局可以使用的通用函数声明在这个文件中.
	
	function getimage($str)
	{
		preg_match('/<img\s+[^>]*src=\"\/public\/uploads\/([\w\d_\.]*?)[\"]/im',$str,$match);
		if(!empty($match))
		{
			return $match[1];
		}
		else
		{
			/*正则匹配失败,尝试html解析*/
			$d=new DOMDocument();
			$d->loadHTML(htmlspecialchars_decode($str));
			$imgs=$d->getElementsByTagName('img');
			if(count($imgs)>0)
			{
				if($img=$imgs->item(0))
				{
					$src=$img->getAttribute('src');
					$src=explode('/',$src);
					return str_ireplace('"','',$src[count($src)-1]);
				}
				else
				{
					return NULL;
				}
			}
			else
			{
				return NULL;
			}
		}
	}
	
	function adposition($t)
	{
		$parr=array(
			0=>'首页-banner　996*120',
			1=>'首页-中间-上　516*95',
			2=>'首页-中间-中　516*95',
			3=>'首页-中间-下　516*95',
			4=>'首页-左　230*66',
			5=>'首页-右　230*66',
			6=>'子页面　170*80',
			7=>'对联广告　100*300',
			8=>'顶部大广告　996*300'
			);
		if(array_key_exists($t,$parr))
		{
			return $parr[$t];
		}
		else
		{
			return '未知';
		}
	}
	
	function countlen($str,$size=12)
	{
		$lencounter=0;
		
		for($i=0;$i<mb_strlen($str,'utf-8');$i++)
		{
			$ch=mb_substr($str,$i,1,'utf-8');
			if(ord($ch)>128)
			{
				$i++;
				$lencounter++;
			}
			else if($ch=='f'||$ch=='i'||$ch=='j'||$ch=='l'||$ch=='r'||$ch=='I'
				||$ch=='t'||$ch=='1'
				||$ch=='.'||$ch==':'||$ch==';'||$ch=='('||$ch==')'
				||$ch=='*'||$ch=='!'||$ch=='\'')
			{
				$lencounter+=0.4;
			}
			else if($ch>='0'&&$ch<='9')
			{
				$lencounter+=0.7;
			}
			else if($ch>='a'&&$ch<='z')
			{
				$lencounter+=0.7;
			}
			else if($ch>='A'&&$ch<='Z')
			{
				$lencounter+=0.8;
			}  
			else
			{
				$lencounter++;
			}
		}
		return ($lencounter+2)*$size;
	}
	
	
	function sqldumptable($table, $fp = 0)
	{
		$tabledump = "DROP TABLE IF EXISTS `" . $table . "`;\n\n\n";
		$result = mysql_fetch_array(mysql_query("SHOW CREATE TABLE " . $table));
		//echo "SHOW CREATE TABLE $table";
		$tabledump .= $result[1] . ";\n\n\n";
	
		if ($fp) {
			fwrite($fp, $tabledump);
		} else {
			echo $tabledump;
		}
		// get data
		$rows = mysql_query('SELECT * FROM `' . $table.'`');
		$numfields = mysql_num_fields($rows);
		while ($row = mysql_fetch_array($rows)) {
			$tabledump = "INSERT INTO `" . $table . "` VALUES(";
	
			$fieldcounter = -1;
			$firstfield = 1;
			// get each field's data
			while (++$fieldcounter < $numfields) {
				if (!$firstfield) {
					$tabledump .= ", ";
				} else {
					$firstfield = 0;
				}
	
				if (!isset($row[$fieldcounter])) {
					$tabledump .= "NULL";
				} else {
					$tabledump .= "'" . mysql_escape_string($row[$fieldcounter]) . "'";
				}
			}
	
			$tabledump .= ");\n\n\n";
	
			if ($fp) {
				fwrite($fp, $tabledump);
			} else {
				echo $tabledump;
			}
		}
		mysql_free_result($rows);
		
	}