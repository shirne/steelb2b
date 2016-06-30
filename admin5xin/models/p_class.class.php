<?php
	class n_class
	{
		/*循环输出无限分类*/
		function getOption($cid,$pid=0,$l=0)
		{
			$rstr='';
			if($rl=$this->field('id,name,pid')->where(array('pid'=>$pid))->order('sort asc')->select())
			{
				foreach($rl as $row)
				{
					$rstr.= '<option value="'.$row['id'].'" '
						.($cid==$row['id']?'selected="selected"':'').'>'
						. str_repeat('&nbsp;&nbsp;',$l-1>0?$l-1:0).($l>0?'├':'').$row['name'].'</option>';
					$rstr.= $this->getOption($cid,$row['id'],$l+1);
				}
			}
			
			return $rstr;
		}
		
		function getarr($pid)
		{
			$rstr='[';
			if($rl=$this->field('id,name,pid')->where(array('pid'=>$pid))->order('sort asc')->select())
			{
				for($i=0,$l=count($rl);$i<$l;$i++)
				{
					$rstr.= '"'.$rl[$i]['name'].'"';
					if($i<$l-1)
					{
						$rstr.= ',';
					}
				}
			}
			
			return $rstr.']';
		}
	}