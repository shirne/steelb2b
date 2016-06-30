<?php
	class IndexAction extends Common {
		
		function index(){
			$news=D('news');
			$supp=D('information');
			$job=D('job');
			$ncat=D('n_class');
			$pcat=D('p_class');
			$ent=D('enter');
			$prc=D('offer');
			
			/*页面变量*/
			$this->assign('index',0);
			$this->assign('css','index');
			$this->assign('title','');
			
			/*图片新闻*/
			$pic=$news->field('id,images,title')->where(array('images <>'=>NULL,'images <>'=>'','slide'=>1))->order('date desc')->limit(5)->select();
			$pct=array('pic'=>'','url'=>'','txt'=>'');
			foreach($pic as $pcs)
			{
				$pct['pic'].=$GLOBALS['public'].'uploads/'.$pcs['images'].'|';
				$pct['url'].=$GLOBALS['app'].'news/show/id/'.$pcs['id'].'|';
				$pct['txt'].=$pcs['title'].'|';
			}
			
			$pct['pic']=rtrim($pct['pic'],'|');
			$pct['url']=rtrim($pct['url'],'|');
			$pct['txt']=rtrim($pct['txt'],'|');
			/*数据*/
			/*新闻*/
			$this->assign('pic',$pct);
			$this->assign('cate',$cate=$ncat->where(array('pid'=>3),array('pid'=>4))->limit(4)->order('sort asc,pid asc')->select());
			$this->assign('news1',$news->field('id,title,date')->where(array('class'=>$cate[0]['id'],'filt'=>1,'isshow'=>1))->order('date desc')->limit(9)->select());
			$this->assign('news2',$news->field('id,title,date')->where(array('class'=>$cate[1]['id'],'filt'=>1,'isshow'=>1))->order('date desc')->limit(9)->select());
			$this->assign('news3',$news->field('id,title,date')->where(array('class'=>$cate[2]['id'],'filt'=>1,'isshow'=>1))->order('date desc')->limit(9)->select());
			$this->assign('news4',$news->field('id,title,date')->where(array('class'=>$cate[3]['id'],'filt'=>1,'isshow'=>1))->order('date desc')->limit(9)->select());
			$this->assign('logist',$news->field('id,title,date')->where(array('class'=>9,'filt'=>1,'isshow'=>1))->order('date desc')->limit(8)->select());
			$this->assign('dig',file_get_contents('./a.txt'));
			/*企业*/
			$this->assign('enternew',$ent->where(array('filt'=>1))->order('regdate desc')->limit(20)->select());
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			/*信息*/
			$this->assign('infoa',$supp->where(array('type'=>1))->order('date desc')->limit(10)->select());
			$this->assign('infob',$supp->where(array('type'=>0))->order('date desc')->limit(10)->select());
			$this->assign('job',$job->field('job,company,date,id')->where(array('filt'=>1))->order('top desc,date desc')->limit(8)->select());
			$this->assign('price',$prc->order('date desc')->limit(30)->select());
			
			/*产品分类*/
			$fcate=$pcat->where(array('pid'=>0))->order('sort asc')->select();
			$this->assign('fcate',$fcate);
			/*其它*/
			
			$this->assign('pcat',$pcat->where(array('pid >'=>0))->order('sort asc')->limit(40)->select());
			
			$olinks=D('links2')->order('cate asc,sort asc')->select();
			$olink=array();
			foreach($olinks as $row)
			{
				$olink[$row['scate']][]=$row;
			}
			$this->assign('olink',$olink);
			
			$this->display();
		}
		
		/*供求信息*/
		function supply(){
			$pc=D('p_class');
			$ifo=D('information');
			$news=D('news');
			$job=D('job');
			$where=array();
			
			$page=new page($ifo->where($where)->total(),F_PAGE,$GLOBALS['app'].'/index/supply');
			
			/*页面变量*/
			$this->assign('index',4);
			$this->assign('css','sub1');
			$this->assign('title','供求信息');
			
			/*数据*/
			$this->assign('pc',$pc->where(array('pid'=>0))->order('sort asc')->r_select(array('p_class','id,name,pid','pid',array('sub'))));
			$this->assign('logist',$news->field('id,title,date')->where(array('class'=>9))->order('date desc')->limit(10)->select());
			$this->assign('job',$job->field('id,company,job,date')->where(array('filt'=>1))->order('date desc')->limit(10)->select());
			$this->assign('nlist',$ifo->order('date desc')->limit(10)->select());
			$this->assign('list',$ifo->where($where)->order('top desc,date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function user()
		{

			$ent=D('qa_user');
			$pd=D('information');
			if(empty($_GET['id']))
				$this->redirect('index');
			
			if(!$com=$ent->where($_GET['id'])->find())
				$this->error('没有找到该用户',1,'index');
			
			$page=new page($pd->where(array('userid'=>$com['id']))->total(),F_PAGE,'id/'.$_GET['id']);
			$cp=$pd->where(array('userid'=>$com['id']))->order('date desc')->limit($page->limit)->select();
			/*页面变量*/
			$this->assign('index',4);
			$this->assign('title','供求专版');
			$this->assign('css','sub1');
			
			/*数据*/
			$this->assign('com',$com);
			$this->assign('list',$cp);
			
			$this->display();
		}
		
		function enterprise(){
			$pc=D('p_class');
			$ent=D('enter');
			$where=array('filt'=>true);
			$url='';
			
			if(!empty($_GET['type']))
			{
				$where['inte']=true;
				$url.='/inte/1';
			}
			
			if(!empty($_GET['company']))
			{
				$where['company']='%'.$_GET['company'].'%';
				$url.='/company/'.$_GET['company'];
			}
			
			if(!empty($_GET['business']))
			{
				$where['business']='%'.$_GET['business'].'%';
				$url.='/business/'.$_GET['business'];
			}
			
			if(!empty($_GET['contact']))
			{
				$where['contact']='%'.$_GET['contact'].'%';
				$url.='/contact/'.$_GET['contact'];
			}
			
			$page=new page($ent->where($where)->total(),F_PAGE,ltrim($url,'/'));
			
			/*页面变量*/
			$this->assign('index',5);
			$this->assign('css','sub1');
			$this->assign('title','入驻企业');
			
			/*数据*/
			$this->assign('pc',$pc->where(array('pid'=>0))->order('sort asc')->r_select(array('p_class','id,name,pid','pid',array('sub'))));
			$this->assign('list',$ent->where($where)->limit($page->limit)->order('inte desc,regdate asc')->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function job(){
			$job=D('job');
			
			$page=new page($job->total(),F_PAGE,'');
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*页面变量*/
			$this->assign('index',4);
			$this->assign('title','招聘信息');
			$this->assign('css','sub1');
			
			/*数据*/
			$this->assign('list',$job->order('date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			$this->display();
		}
		
		function showjob(){
			if(empty($_GET['id']))
				$this->redirect('job');
			
			$job=D('job');
			
			if(!$jb=$job->where($_GET['id'])->find())
			{
				$this->error('信息未找到!',1,'job');
			}
			
			/*右栏目*/
			$ent=D('enter');
			$prc=D('offer');
			
			$this->assign('enterhot',$ent->where(array('filt'=>1,'inte'=>1))->order('regdate asc')->limit(20)->select());
			$this->assign('price',$prc->order('id desc')->limit(30)->select());
			
			/*页面变量*/
			$this->assign('index',4);
			$this->assign('title','招聘信息');
			$this->assign('css','sub1');
			
			$this->assign('job',$jb);
			$this->display();
		}
		
		function price()
		{
			$area=D('area');
			$cts=$area->where(array('hide <>'=>1))->select();
			$offer=D('offer');
			
			$this->assign('cts',$cts);
			$this->assign('data',$area->field(id,name)->r_select(array('offer','id,name,price,material,model,rang,area','areaid',array('dat','date desc',10))));
			
			/*页面变量*/
			$this->assign('index',4);
			$this->assign('title','行情地图');
			$this->assign('css','sub1');
			$this->display();
		}
		
		function prodpce()
		{
			$pc=D('offer');
			$where=array('area'=>'');
			$str='';
			if(!empty($_GET['name']))
			{
				$where['name']='%'.$_GET['name'].'%';
				$str.='?name='.$_GET['name'];
			}
			
			$page=new page($pc->where($where)->total(),F_PAGE,$str);
			/*页面变量*/
			$this->assign('list',$pc->where($where)->order('date desc')->limit($page->limit)->select());
			$this->assign('fpage',$page->fpage());
			
			$this->assign('index',4);
			$this->assign('title','今日报价');
			$this->assign('css','sub1');
			$this->display();
		}
		
		/*获取产品品种*/
		function getcate()
		{
			if(empty($_GET['pid']) && empty($_GET['name']))
			{
				$_GET['pid']=0;
			}
			if(!empty($_GET['name']))
			{
				$where=array('name'=>$_GET['name']);
			}
			else
			{
				$where=array('id'=>$_GET['pid']);
			}
			$pc=D('p_class');
			if($p=$pc->where($where)->find())
			{
				echo $pc->getarr($p['id']);
				exit;
			}
			else
			{
				echo $pc->getarr(0);
				exit;
			}
		}
	}