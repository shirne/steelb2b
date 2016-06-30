<?php
	class n_class
	{
		/*循环输出无限分类*/
		function getList($pid=0,$l=0)
		{
			$ns=D('news');
			$tag=false;
			$rstr='';
			if($rl=$this->field('id,name,pid')->where(array('pid'=>$pid))->order('sort asc')->select())
			{
				$tag=true;
				foreach($rl as $row)
				{
					$rstr.= '<li class="dir"><span>'.$row['name'].'</span>';
					$rstr.= $this->getList($row['id'],$l+1).'</li>';
				}
			}
			if($nl=$ns->field('id,title')->where(array('class'=>$pid))->select())
			{
				$tag=true;
				foreach($nl as $ls)
				{
					$rstr.='<li class="art"><a href="'.$GLOBALS['app'].'news/shown/id/'.$ls['id'].'" target="maincontent">'.$ls['title'].'</a></li>';
				}
			}
			
			return $tag?'<ul>'.$rstr.'</ul>':'';
		}
		
	}