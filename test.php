<?php
	phpinfo();
	/*header('Content-Type:text/html;charset=utf-8');
	$cn=mysql_connect('localhost','root','123456');
	mysql_select_db('steel',$cn);
	$rst=mysql_query('call new_routine()',$cn);
	echo mysql_affected_rows();
	echo '<pre>';
	while($row=mysql_fetch_array($rst)){
		print_r($row);
	}
	echo '</pre>';*/
/*	$d=new DOMDocument();
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
				file_put_contents('a.txt','<tbody>'.$value.'</tbody>');
			}
		}
		else
		{
			echo '没有内容';
		}
	}
	else
	{
		echo count($imgs);
	}*/
	function create_check_image( $check_code )
{
 // 产生一个图片
 $im = imagecreate(65,22); 
 $black = ImageColorAllocate($im, 0,0,0);  // 背景颜色
 $white = ImageColorAllocate($im, 255,255,255);  // 前景颜色
 $gray = ImageColorAllocate($im, 200,200,200); 
 imagefill($im,68,30,$gray); 
 
 // 将四位整数验证码绘入图片 
 imagestring($im, 5, 8, 3, $check_code, $white);
 // 加入干扰象素 
 for($i=0;$i<200;$i++)
 { 
     $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
     imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
 }
 // 输出图像
 Header("Content-type: image/png");  
 imagepng($im); 
 ImageDestroy($im);  
}

create_check_image('548a');
//require('vcode.class.php');
//echo new Vcode();