<?php
	header('Content-Type:text/html;charset=utf-8');
	$d=new DOMDocument();
	$d->loadHTML(file_get_contents('http://www.steelyuan.com/market/index/list_new.jsp'));
	$imgs=$d->getElementsByTagName('table');
	if(count($imgs)>0)
	{
		if($img=$imgs->item(1))
		{
			$ts=$img->getElementsByTagName('table')->item(0)->getElementsByTagName('table');
			$value=$img->nodeValue;
			if(trim($value<>''))
			{
				$arr=explode(" ",trim($value));
				$value='';
				for($i=0;$i<count($arr);$i++)
				{
					$sub=explode("\r",trim($arr[$i]));
					$value.='<tr><td>'.implode('</td><td>',$sub).'</td></tr>';
				}
				if(strlen($value)>200)
					file_put_contents('a.txt','<tbody>'.$value.'</tbody>');
				echo '<script type="text/javascript">alert("获取成功")</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("没有内容")</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("没有内容")</script>';
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("没有内容")</script>';
	}