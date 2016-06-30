<?php
	class manage
	{
		/*管理员列表*/
		function index()
		{
			$adm=D('qa_admin');
			
			$this->assign('model','管理员管理');
			$this->assign('admlist',$adm->order('purview desc')->select());
			$this->display();
		}
		
		function addmgr()
		{
			if($_SESSION['purview'] < 65536)
				$this->error('您没有权限添加管理员!',2);
			
			if(empty($_POST['username']) ||
				empty($_POST['pwd']) ||
				empty($_POST['pwd2']) )
				$this->error('请填写用户名及密码',2);
			
			if($_POST['pwd'] != $_POST['pwd2'])
				$this->error('两次密码不一致!',2);
			
			if(mb_strlen(trim($_POST['pwd']),'utf-8') < 5)
				$this->error('为了网站安全，请尽量用复杂的密码!',2);
			
			$adm=D('qa_admin');
			if($adm->where(array('qa_admin'=>$_POST['username']))->find())
				$this->error('管理员帐户与现有管理员重复',2);
			
			if(empty($_POST['purview']))$_POST['purview']=0;
			if($adm->insert(array('qa_admin'=>$_POST['username'],
									'qa_pwd'=>md5($_POST['pwd']),
									'create_date'=>date('Y-m-d H:i:s'),
									'login_times'=>0,
									'purview'=>$_POST['purview'])))
			{
				$this->success('添加管理员成功!',2);
			}
			else
			{
				$this->error('添加管理员失败!',2);
			}
		}
		
		function cgdata()
		{
			$adm=D('qa_admin');
			if(empty($_GET['id']))$this->error('没有更改目标!',2);
			$ainfo=$adm->where($_GET['id'])->find();
			if($_SESSION['purview'] < 65536 && $ainfo['qa_admin'] <> $_SESSION['admin_name'])
				$this->error('您没有权限更改其它管理员的资料!',2);
			
			$this->assign('adm',$ainfo);
			$this->assign('model','管理员信息修改');
			$this->display();
		}
		
		function docgdata()
		{
			$adm=D('qa_admin');
			if(empty($_POST['id']))$this->error('没有更改目标!',2);
			$ainfo=$adm->where($_POST['id'])->find();
			if($_SESSION['purview'] < 65536 && $ainfo['qa_admin'] <> $_SESSION['admin_name'])
				$this->error('您没有权限修改其它管理员资料!',2);
			
			if(empty($_POST['username']) )
				$this->error('请填写用户名及密码',2);
			
			if($_POST['pwd'] != $_POST['pwd2'])
				$this->error('两次密码不一致!',2);
			
			if(mb_strlen(trim($_POST['pwd']),'utf-8') < 5 && !empty($_POST['pwd']))
				$this->error('为了网站安全，请尽量用复杂的密码!',2);
			
			if(empty($_POST['pwd']))$_POST['pwd']=$ainfo['qa_pwd'];
			else $_POST['pwd']=md5($_POST['pwd']);
			
			if($adm->where(array('qa_admin'=>$_POST['username'],'id <>'=>$_POST['id']))->find())
				$this->error('管理员帐户与现有管理员重复',2);
			
			if(empty($_POST['purview']))$_POST['purview']=0;
			
			if($_POST['purview'] < 65536 &&
				$ainfo['purview'] >= 65536 &&
				$adm->where(array('purview'=>65536))->total() < 2)
				$this->error('您不能在仅有一名超级管理员的情况下<br />将自己降级为普通管理员<br />这将导致以后无法管理管理员',5);
			
			if($_SESSION['purview'] < 65536 && $_POST['purview'] != $ainfo['purview'])
				$this->error('您没有足够的权限修改自己的权限',2);
			
			if($adm->where($ainfo['id'])->update(array('qa_admin'=>$_POST['username'],
									'qa_pwd'=>$_POST['pwd'],
									'purview'=>$_POST['purview'])))
			{
				$this->success('更改管理员成功!',2,'index');
			}
			else
			{
				$this->error('更改管理员失败!',2);
			}
		}
		
		function delmgr()
		{
			if(empty($_GET['id']))
				$this->error('没有删除目标!',2);
			
			if($_SESSION['purview'] < 65536)
				$this->error('您没有权限删除管理员!',2);
			
			$adm=D('qa_admin');
			if($ainfo=$adm->where($_GET['id'])->find())
			{
				if($ainfo['qa_admin'] == $_SESSION['admin_name'])
				{
					$this->error('您不能删除自己!',2);
				}
				else
				{
					if($adm->where($ainfo['id'])->delete())
					{
						$this->success('删除管理员成功!',2);
					}
					else
					{
						$this->success('删除管理员失败!',2);
					}
				}
			}
			else
			{
				$this->error('提供的信息不正确!',2);
			}
		}
		
		
		function datamgr()
		{
			$fos=scandir(SQL_BAKUP_PATH);
			$fs=array();
			foreach($fos as $rf)
			{
				if(is_file(SQL_BAKUP_PATH.'/'.$rf))
					$fs[]=$rf;
			}
			
			$this->assign('bfile',$fs);
			$this->assign('model','数据库管理');
			$this->display();
		}
		
		function del()
		{
			if(empty($_GET['file']))
				$this->error('请选择要删除的备份!',1);
			if(!file_exists(SQL_BAKUP_PATH.'/'.$_GET['file']))
				$this->error('备份不存在!',1);
			if(unlink(SQL_BAKUP_PATH.'/'.$_GET['file']))
			{
				$this->success('删除成功!',1);
			}
			else
			{
				$this->error('删除失败,请检查文件权限!');
			}
		}
		
		function restore()
		{
			if(empty($_POST['file']))
				$this->error('请选择要还原的备份!',1);
			if(!file_exists(SQL_BAKUP_PATH.'/'.$_POST['file']))
				$this->error('备份不存在!',1);
			
			set_time_limit(0);
			$link = mysql_pconnect(HOST,USER,PASS) or die('连接出错');
			mysql_select_db(DBNAME, $link);
			mysql_query('set names \'utf8\'',$link);
			mysql_query('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0',$link);
			mysql_query('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0',$link);
			mysql_query('SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0',$link);
			
			if($get_sql_data = file_get_contents(SQL_BAKUP_PATH.'/'.$_POST['file']))
			{
				$explode = explode(";\n\n\n", $get_sql_data);
				$cnt = count($explode);
				$k=0;
				for ($i=0; $i<$cnt; $i++) 
				{
					$sql=$explode[$i];
					//echo $sql.'<br />';
					//$result=mysql_query($sql[$i],$link);
					if($result)
					{
						$k++;
					}
				}
				//exit;
				if ($k>0)
				{
					mysql_close();
					$this->success("成功:".$k."个语句",1);
				} else {
					mysql_close();
					$this->error('导入数据失败:'.mysql_error(),2);
				}
			}
			else
			{
				mysql_close();
				$this->error('导入数据失败!',1);
			}
		}
		
		function downbak()
		{
			if(empty($_GET['file']))
				$this->error('请选择要还原的备份!',1);
			if(!file_exists(SQL_BAKUP_PATH.'/'.$_GET['file']))
				$this->error('备份不存在!',1);
			
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: public"); 
			header("Content-Description: File Transfer");
			
			header("Content-Type: application/force-download");
			header("Content-Disposition: attachment; filename=".$_GET['file'].";");
			@readfile(SQL_BAKUP_PATH.'/'.$_GET['file']);
			exit;
		}
		
		function sqldump()
		{
			set_time_limit(0);
			
			$link = mysql_connect(HOST,USER,PASS);
			mysql_select_db(DBNAME,$link);
			$tables = mysql_query('show tables');
			$cachetables = array(); $tableselected = array();
			
			while ($table = mysql_fetch_row($tables))
			{
			   $cachetables[$table[0]] = $table[0];
			   $tableselected[$table[0]] = 1;
			}
			
			$table = $cachetables;
			$filename =  DBNAME . "_" . date("Y_m_d_H_i_s") . ".sql";
			$path = SQL_BAKUP_PATH .'/'. $filename;
			
			$filehandle = fopen($path, "w");
			
			$result = mysql_query("SHOW tables");
			while ($currow = mysql_fetch_array($result))
			{
			   if (isset($table[$currow[0]]))
			   {
				 sqldumptable($currow[0], $filehandle);
				 fwrite($filehandle, "\n\n\n");
			   }
			}
			
			fclose($filehandle);
			$this->assign('model','数据库备份');
			$this->assign('bak',1);
			$this->assign('fname',$filename);
			$this->display('manage/datamgr');
		}
	}