<?php
function loadTemplate()
{
	$no_of_args=func_num_args();
	$template_path=TEMPLATE_PATH;
	if($no_of_args==2)
	{
		$template_path=func_get_arg(1);
	}
	$template_name=func_get_arg(0);
	$file_path=$template_path.$template_name;
	//$path_parts = pathinfo($file_path);
	//echo $path_parts["extension"];
	if(file_exists($file_path)&&!is_dir($file_path))
	{
		$content=file_get_contents($file_path);	
	}
	else
	{
		$content="File does not exist";
	}
	return $content;
}

function pre($data)
{
	print"<pre>";
	print_r($data);
	print"</pre>";
}
function date_difference($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;        
		
		// Days + Hours + Minutes
		$pday = ($edate - $sdate) / 86400;
		$preday = explode('.',$pday);
	   
		$timeshift = $preday[0];
        return $timeshift;
}
function showDropdown($arr,$selectedVal="",$type=0)// type=0 for no key, type=1 for use key
{ 
	if($type==1)
	{
		$optArr=$arr;
	}
	else
	{
		foreach($arr as $key_a=>$val_a)
		{
			$optArr[$val_a]=$val_a;
		}
	}
	$output='';
	if(is_array($optArr))
	{
		foreach($optArr as $key=>$val)
		{
			if(is_array($selectedVal))
			{
				if(in_array($key,$selectedVal))
					$selected=" selected=\"selected\"";
				else
					$selected="";
			}
			else
			{
				if($key==$selectedVal)
				{
					$selected=" selected=\"selected\"";
				}
				else
				{
					$selected="";
				}
			}
			$output.='<option value="'.$key.'"'.$selected.'>'.$val.'</option>';
		}
	}
	return $output;
}

function showRadiobutton($arr,$selectedVal="",$name)// type=0 for no key, type=1 for use key
{
	
		foreach($arr as $key_a=>$val_a)
		{
			$optArr[$key_a]=$val_a;
		}
	$output='';
	if(is_array($optArr))
	{
		foreach($optArr as $key=>$val)
		{ 
			if($key==$selectedVal)
			{
				$checked=" checked=\"checked\"";
			}
			else
			{
				$checked="";
			}
			//$output.='<option value="'.$key.'"'.$checked.'>'.$val.'</option>';
			$output.='<input type="radio" name="'.$name.'" value="'.$key.'" '.$checked.'>'.$val.'&nbsp;';
		}
	}
	return $output;
}

function showStatus($selVal='')
{
	$status=array("Active","Inactive");
	$opt=showDropdown($status,$selVal);
	return $opt;
}

function getContent($pageName="")
{
	global $obj;
	if($pageName=="")
	{
		$pageName=basename($_SERVER['PHP_SELF']);
	}
	$content=$obj->selectData(TABLE_CONTENT,"","content_page='".$pageName."' and content_status='Active'",1);
	return html_entity_decode($content['content_desc']);
}
function getContentById($id)
{
	global $obj;
	
	$content=$obj->selectData(TABLE_CONTENT,"","id='".$id."' and status='Active'",1);
	return $content;
}



function EmailExist($email)
{
	global $obj;
	$data=$obj->selectData(TABLE_CUSTOMER,"count(*) as counter","email='".$email."'",1);
	//print_r($data);
	//echo $data['counter'];exit();
	if($data['counter']>0)
		true;
	else
		false;
}
function userLogin($username,$password,$path)
{
	global $obj;
	$error=false;
	$default_path=$path;
	$user=$obj->selectData(TABLE_USER,"","binary username='".$username."' and status='ACTIVE'",1);
	$_SESSION['user_request_path']=$_SESSION['user_request_path']?$_SESSION['user_request_path']:$default_path;
	$_SESSION['user_request_path']=$default_path;
	if($user)
	{
		 $used_password=$obj->retrievePass($user['password']);
		if(trim($used_password)==trim($password))
		{
		$_SESSION['STUDENT']=$user;
		$_SESSION['user_msg']=LOGIN_SUCCESS;
		$obj->reDirect($_SESSION['user_request_path']);
		}
		else
		{
			$error=PASSWORD_MISMATCH;
		}
	}
	else
	{
		$error="Username Doesnot Exist";
	}
	return $error;
}
function AdminLogin($username,$password,$path="")
{ 

	global $obj;
	$error=false;
	//$default_path=$path?$path:FURL.'admin/dashboard.php';
	$default_path='dashboard.php';
	//echo $default_path;die;
	//echo $obj->selectData(TABLE_USER,"","status<>'Deleted' and binary username='".$username."'",2);
	$admin=$obj->selectData(TABLE_ADMIN,"","status<>'Deleted' and binary username='".$username."'",1);
	//print_r($admin);
	$_SESSION['admin_request_path']=$_SESSION['admin_request_path']?$_SESSION['admin_request_path']:$default_path;
	$_SESSION['admin_request_path']=$default_path;
	//echo $_SESSION['admin_request_path'];
	if($admin)
	{
		//echo $admin['password'];
		 $used_password=$obj->retrievePass($admin['password']);
		if(trim($used_password)==trim($password))
		{
		$_SESSION['admin']=$admin;
		
		$obj->reDirect($_SESSION['admin_request_path']);
		}
		else
		{
			$error=PASSWORD_MISMATCH;
		}
	}
	else
	{
		$error=INVALID_LOGIN;
	}
	return $error;
}
function GetAdminData()
{
	global $obj;
	
	$data=$obj->selectData(TABLE_ADMIN,"","id='".$_SESSION['admin']['id']."' and status='Active'",1);
	return $data;
}
function isAdminLogged()
{
	global $obj;
	if(isset($_SESSION['admin']))
	{
			return true;
		
	}
	else
	{
		return false;
	}
}

function memberSecure()
{
	$_SESSION['member_request_path']=$_SERVER['REQUEST_URI'];
	if(!isLogged())
	{
		header("location:".FURL.'index.php');
		exit;
	}
}
function isLogged()
{
	global $obj;
	if(isset($_SESSION['STUDENT']))
	{
			return true;
		
	}
	else
	{
		return false;
	}
}

function getCurrentUser()
{
	return $_SESSION['admin']['id'];
}
function userLogout()
{
	global $obj;
	$obj->updateData(TABLE_CHATSTATUS,array("status"=>"Online","logedin"=>"0"),"userid='".$_SESSION['user']['user_id']."'");
	unset($_SESSION['user']);
	unset($_SESSION['user_request_path']);
	//$_SESSION['user_msg']=LOGOUT_SUCCESS;
}

function animate()
{
	//$content='<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=1,Transition=12)">';
	return $content;
}

function str_replace_array($key,$rep,$str)
{
	preg_match_all("/".$key."/",$str,$matches);
	for($i=0;$i<count($matches[0]);$i++)
	{
		$old_str=substr($str,0,strpos($str,$key)+strlen($key));
		$new_str=str_replace($key,$rep[$i],$old_str);
		$str=str_replace($old_str,$new_str,$str);
	}
	return $str;
}
define('ADMIN_SESSION_NAME','admin');
define('USER_SESSION_NAME','user');
function adminSecure()
{
	global $obj;
	$_SESSION['admin_request_page']=$_SERVER['REQUEST_URI'];
	if(!isset($_SESSION[ADMIN_SESSION_NAME]))
	{
		$obj->reDirect("index.php");
	}
}

function userSecure()
{
	$_SESSION['user_request_path']=basename($_SERVER['REQUEST_URI']);
	if(!isLogged())
	{
		header("location:".FURL.'login.php');
		exit;
	}
}


function getCurrentAdminId()
{
	return $_SESSION['admin']['hotel_id'];
}
function runIt($code="")
{
	$code="?>".$code."<?";
	eval($code);
}

function supportExtension($filename,$s_array=array())
{
	if(count($s_array)<=0||(!is_array($s_array)))
	{
		$s_array=array("jpg","jpeg","gif","bmp");
	}
	$file_ext=strtolower(end(explode(".",$filename)));
	if(in_array($file_ext,$s_array))
	{
		return true;
	}
	return false;
}

function uploadFile($fieldName,$path="",$name="")
{
	$out['error']=0;
	$out['error_name']="";
	if($name)
	{
		$newname=$name;
	}
	else
	{
		$newname=time().rand(1000,100000000);
	}
	if(!$_FILES[$fieldName]['name'])
	{
		$out['error']=1;
		$out['error_name']="file not uploaded";
	}
	else
	{
		$fileExt=strtolower(end(explode(".",$_FILES[$fieldName]['name'])));
		$newFileName=$newname.".".$fileExt;
		$target=$path.$newFileName;
		if(move_uploaded_file($_FILES[$fieldName]['tmp_name'],$target))
		{
			$out['file_name']=$newFileName;
		}
		else
		{
			$out['error']=1;
			$out['error_name']="error occured while uploading";
		}
	}
	return $out;
}
class fileUpload
{
	var $field_name;
	var $filename;
	var $path;
	var $name;
	var $file_type_supported;
	var $error;
	function upload()
	{
		if(!$_FILES[$this->field_name]['name'])
		{
			$this->error="file not uploaded";
			return false;
		}
		if(is_array($this->file_type_supported))
		{
			if(!supportExtension($_FILES[$this->field_name]['name'],$this->file_type_supported))
			{
				$this->error="file extension not supported";
				return false;
			}
		}
		if($this->name)
		{
			$newname=$this->name;
		}
		else
		{
			$newname=time().rand(1000,100000000);
		}
		$fileExt=strtolower(end(explode(".",$_FILES[$this->field_name]['name'])));
		$newFileName=$newname.".".$fileExt;
		$target=$this->path.$newFileName;
		if(move_uploaded_file($_FILES[$this->field_name]['tmp_name'],$target))
		{
			$this->filename=$newFileName;
			return true;
		}
		else
		{
			$this->error="error occured while uploading";
			return false;
		}
	}
}
function imageURL($image_path,$base_path="")
{
	$url=$image_path;
	if(!file_exists($image_path))
	{
		//$url=pathinfo($image_path,PATHINFO_DIRNAME)."/".NOT_FOUND_IMG;
		//$url=IMAGES.NOT_FOUND_IMG;		
		if(is_dir($image_path))
		{
			$url=$image_path.NOT_FOUND_IMG;
		}
		else
		{
			$url=$base_path.IMAGES.NOT_FOUND_IMG;
		}
	}
	else if(is_dir($image_path))
	{
		$url=$image_path.NOT_FOUND_IMG;
		//$url=IMAGES.NOT_FOUND_IMG;
	}
	return $url;
}
function showThumb($imagePath,$width=100,$height=100,$extra="",$thumbBase=FURL)
{
	$imageExt=strtolower(end(explode(".",$imagePath)));
	if($thumbBase=="../")
	{
		$pathBack="";
	}
	else
	{
		$pathBack="../";
	}
	
	$path=$thumbBase."includes/thumb/phpThumb.php?src=../".$pathBack.imageURL($imagePath,$thumbBase)."&w=".$width."&h=".$height;
	if($imageExt=="gif")
	{
		$path.="&f=gif";
	}
	$imgset="<img src=\"".$path."\" ".$extra.">";
	

	return $imgset;
}

function random_float ($min,$max) {
   return ($min+lcg_value()*(abs($max-$min)));
}

class paging
{
	var $res;
	var $rcd_num;
	var $limit;
	var $pageno;
	function paging($table_name,$field,$condition,$limit)
	{
		global $obj;
		$pageno=$_REQUEST['pageno'];
		$rowsUser=$obj->selectData($table_name,'count(*) as c',$condition);
		$countUser=mysql_fetch_assoc($rowsUser);
		$rcd_num=$countUser['c'];
		if($rcd_num > 0)
		{
			 if(empty($pageno))
			 $pageno=1;		
			 
			 $offset=$limit*($pageno-1);
			  /* page no recalculate */
			 if($pageno>1)
			 {
			 	if(!$obj->selectData($table_name,$field,$condition,1,"","",$offset.",1"))
				{
					if($rcd_num%$limit)
					{
						$last_page=$rcd_num/$limit+1;
					}
					else
					{
						$last_page=$rcd_num/$limit;
					}
					$pageno=(int)$last_page;
					$offset=$limit*($pageno-1);	
				}	
			 }
			 /* eof page no recalculate */
			$rowsUser = $obj->selectData($table_name,$field,$condition,"","","",$offset.",".$limit);
		}
		$this->res=$rowsUser;
		$this->rcd_num=$rcd_num;
		$this->limit=$limit;
		$this->pageno=$pageno;
	}
	function page_list($lnkParam="",$lnkScr="",$yahoopaging=1,$nopageshow="")
	{
		global $obj;
		$obj->pagewise($this->rcd_num,$this->limit,$this->pageno,$lnkParam,$lnkScr,$yahoopaging,$nopageshow);
	}
}

function MemberExist($username)
{
	global $obj;
	$data=$obj->selectData(TREE_USER,"COUNT(*) counter","username='".$username."' and status='Active'",1);
	return $data['counter'];
}

function GetMemberData()
{
	global $obj;
	
	$data=$obj->selectData(TABLE_USER,"","id='".$_SESSION['STUDENT']['id']."' and status='Active'",1);
	return $data;
}
function GetMemberDataByusername($id)
{
	global $obj;
	
	$data=$obj->selectData(TREE_USER,"","username='".$id."' and status='Active'",1);
	return $data;
}
function gotoPage($url)
{
	?>
	<script>
	window.location='<?php echo $url;?>';
	</script>
	<?php
}

function keyToSearchArray($arr)
{
	foreach($arr as $key=>$val)
	{
		$opt[]="%%".strtoupper($key)."%%";
	}
	return $opt;
}
function isEmail($string)
{
	$email=trim($string);
	if(!preg_match ("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $email))
	{
   		return false;
	}
	return true;	
}



function GetEmailById($id)
{
	global $obj;
	$user1=$obj->selectData(TREE_USER,"","username='".$id."'",1);
	return $user1['email'];
}

function time_diff($start, $end="NOW")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);

        $time = $edate - $sdate;
        if($time>=0 && $time<=59) {
                // Seconds
                $timeshift = $time.' seconds ';

        } elseif($time>=60 && $time<=3599) {
                // Minutes + Seconds
                $pmin = ($edate - $sdate) / 60;
                $premin = explode('.', $pmin);
               
                $presec = $pmin-$premin[0];
                $sec = $presec*60;
               
                $timeshift = $premin[0].' min '.round($sec,0).' sec ';

        } elseif($time>=3600 && $time<=86399) {
                // Hours + Minutes
                $phour = ($edate - $sdate) / 3600;
                $prehour = explode('.',$phour);
               
                $premin = $phour-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;

                $timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        } elseif($time>=86400) {
                // Days + Hours + Minutes
                $pday = ($edate - $sdate) / 86400;
                $preday = explode('.',$pday);

                $phour = $pday-$preday[0];
                $prehour = explode('.',$phour*24);

                $premin = ($phour*24)-$prehour[0];
                $min = explode('.',$premin*60);
               
                $presec = '0.'.$min[1];
                $sec = $presec*60;
               
                $timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';

        }
        return $timeshift;
}


function deldir($dir) // Delete the directory
{
  $current_dir = opendir($dir);
  while($entryname = readdir($current_dir)){
     if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")){
        deldir("${dir}/${entryname}");
     }elseif($entryname != "." and $entryname!=".."){
        unlink("${dir}/${entryname}");
     }
  }
  closedir($current_dir);
  rmdir(${dir});
}

function numberArray($from,$to)
{
	if($from>$to)
	{
		for($i=$from;$i>=$to;$i--)
		{
			$a[$i]=$i;
		}
	}
	else
	{
		for($i=$from;$i<=$to;$i++)
		{
			$a[$i]=$i;
		}
	}
	return $a;
}


function highlight_this($search,$subject,$openTag,$closeTag)
{
	$callback_function=" \$r='".$openTag."'.\$matches[0].'".$closeTag."'; return \$r;";
	return preg_replace_callback('/'.$search.'/i',create_function('$matches',$callback_function),$subject);
}

function CreateGlamId()
{
	global $obj;
	$data=$obj->selectData(TABLE_MODEL,"MAX(id) as maxi","",1);
	if($data['maxi']==NULL)
		$str="1";
	else
		$str=$data['maxi']+1;
	$passLen=5;
	$passChars=array(0,1,2,3,4,5,6,7,8,9);
	$new_pass="";
	for($i=0;$i<$passLen;$i++)
	{
		$new_pass.=$passChars[array_rand($passChars)];
	}
	return "GC-".$str.$new_pass;
}

function CreateTrackId()
{
	global $obj;
	$data=$obj->selectData(TABLE_APPLICATION,"MAX(id) as maxi","",1);
	if($data['maxi']==NULL)
		$str="1";
	else
		$str=$data['maxi']+1;
	$passLen=5;
	$passChars=array(0,1,2,3,4,5,6,7,8,9);
	$new_pass="";
	for($i=0;$i<$passLen;$i++)
	{
		$new_pass.=$passChars[array_rand($passChars)];
	}
	return "GC-".$str.$new_pass;
}

function genPassword()
{
	global $obj;
	$passLen=4;
	$passChars=array(0,1,2,3,4,5,6,7,8,9);
	$new_pass="";
	for($i=0;$i<$passLen;$i++)
	{
		$new_pass.=$passChars[array_rand($passChars)];
	}
	//$new_pass="1234";
	return $new_pass;
}

function formatDate($date,$format="",$from_format="",$separator="-")
{
	if($format=="")
	{
		$format="m-d-Y";
	}
	
	if($from_format)
	{
		$from_format=strtolower($from_format);
		$format_positions=explode($separator,$from_format);
		$date_portions=explode($separator,$date);		
		$date=$date_portions[array_search('y', $format_positions)]."-".$date_portions[array_search('m', $format_positions)]."-".$date_portions[array_search('d', $format_positions)];
		//echo $date."//".strtotime($date)."-".date("Y-m-d",strtotime("21-17-01"))."-//Na"."<br>";
	}
	return date($format,strtotime($date));
}

function formatDateTime($time,$format="")
{
	if($format=="")
	{
		$format="d/m/y h:i:s a";
	}
	return date($format,strtotime($time));
}
function showHowMuchAgo($dateTime)
{
	$data_timestamp=strtotime($dateTime);
	$current_timestamp=TIME;
	(int)$time_diff=$current_timestamp-$data_timestamp;
	(int)$minute=60;
	$hour=$minute*60;
	$day=$hour*24;
	$month=$day*30;
	$year=$month*12;
	$no_of_year=(int)($time_diff/$year);
	$no_of_month=(int)($time_diff/$month);
	$no_of_day=(int)($time_diff/$day);
	$no_of_hour=(int)($time_diff/$hour);
	$no_of_minute=(int)($time_diff/$minute);
	
	$out="";
	if($no_of_year)
	{
		$s=$no_of_year>1?"s":"";
		$out=$no_of_year." year".$s;
	}
	else if($no_of_month)
	{
		$s=$no_of_month>1?"s":"";
		$out=$no_of_month." month".$s;
	}
	else if($no_of_day)
	{
		$s=$no_of_day>1?"s":"";
		$out=$no_of_day." day".$s;
	}
	else if($no_of_hour)
	{
		$s=$no_of_hour>1?"s":"";
		$out=$no_of_hour." hour".$s;
	}
	else if($no_of_minute)
	{
		$s=$no_of_minute>1?"s":"";
		$out=$no_of_minute." minute".$s;
	}
	else
	{
		$out="0 minute";
	}
	return $out;
}



function getRoomTypeName($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_ROOM_TYPE,"name","id='".$id."'",1);
	if($data)
	{
		return $data['name'];
	}
}

function GetamenetiesName($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_AMENETIES,"name","id='".$id."'",1);
	if($data)
	{
		return $data['name'];
	}
}


function getRoomTypeList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_ROOM_TYPE,"id,name","");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['id']]=$data['name'];
	}
	return $district_array;
}

function getPackageList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_PACKAGE,"pack_id,pack_name","status<>'Deleted'");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['pack_id']]=$data['pack_name'];
	}
	return $district_array;
}
function getNetPackageList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_PACKAGE_INTERNET,"pack_id,pack_name","status<>'Deleted' and parent_id<>0");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['pack_id']]=$data['pack_name'];
	}
	return $district_array;
}
function GetPackageDetails($id)
{
	global $obj;
	$pack_data=$obj->selectData(TABLE_PACKAGE,"","pack_id='".$id."' and status<>'Deleted'",1);
	return $pack_data;
}
function GetNetPackageDetails($id)
{
	global $obj;
	$pack_data=$obj->selectData(TABLE_PACKAGE_INTERNET,"","pack_id='".$id."' and status<>'Deleted'",1);
	return $pack_data;
}
function getZoneList($dealer_id)
{
	global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_ZONE,"zone_id,zone_name","dealer_id='".$dealer_id."'");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['zone_id']]=$data['zone_name'];
	}
	return $district_array;
}






function getEmailContentList()
{
	global $obj;
	$cat_array=array();
	$res=$obj->selectData(TABLE_EMAIL,"id,code","");
	while($data=mysql_fetch_assoc($res))
	{
		$state_array[$data['id']]=$data['code'];
	}
	return $state_array;
}
function getMailerContentList()
{
	global $obj;
	$cat_array=array();
	$res=$obj->selectData(TABLE_MAILER,"id,title","");
	while($data=mysql_fetch_assoc($res))
	{
		$state_array[$data['id']]=$data['title'];
	}
	return $state_array;
}
function setNotification($msg)
{
	$_SESSION['site_notification']=$msg;
}

function getNotification()
{
	if(isset($_SESSION['site_notification']))
	{
		$msg=$_SESSION['site_notification'];
		unset($_SESSION['site_notification']);
		return $msg;
	}
}

function datePrepareToInsert($date)
{
	if($date)
	{
		$date_format=DATE_FORMAT;
		$separator="-";
		if(func_num_args()>1)
		{
			$options=func_get_arg(1);
			if($options['date_format'])
			{
				$date_format=$options['date_format'];
			}
		}
		$date_format=strtolower($date_format);
		$date_key_arr=explode($separator,$date_format);
		$date_data_arr=explode($separator,$date);
		$insertable_date=$date_data_arr[array_search("y",$date_key_arr)]."-".$date_data_arr[array_search("m",$date_key_arr)]."-".$date_data_arr[array_search("d",$date_key_arr)];
	}
	else
	{
		$insertable_date="0000-00-00";
	}
	return $insertable_date;
}


function GetBranchNameById($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_BRANCH,"name","id='".$id."'",1);
	if($data['name'])
		return $data['name'];
	else
		return "N/A";
}

function GetAlbumNameById($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_PHOTO_ALBUM,"title","id='".$id."'",1);
	if($data['title'])
		return $data['title'];
	else
		return "N/A";
}

function generatethumb($im_file,$th_max_width, $th_max_height,$thumb_dir,$thumb_img_name)
{
		 @chmod($im_file,0777);
		 $image_attribs = getimagesize($im_file); 
		//print_r($image_attribs);exit();	 		 
		 if($image_attribs[0]>$th_max_width)
		 {
			 $ratio = $th_max_width/$image_attribs[0];
			 $th_width = $image_attribs[0] * $ratio; 
			 $th_height = $image_attribs[1] * $ratio; 
			 if($th_height>351)
			 {
			 	$ratio = $th_max_height/$image_attribs[1]; 
			 $th_width = $image_attribs[0] * $ratio; 
			 $th_height = $image_attribs[1] * $ratio; 
			 }
		 }
		 elseif($image_attribs[1]>$th_max_height)
		 {
			 $ratio = $th_max_height/$image_attribs[1]; 
			 $th_width = $image_attribs[0] * $ratio; 
			 $th_height = $image_attribs[1] * $ratio; 
		 }
		 else
		 {
		 	$th_width = $image_attribs[0]; 
          	$th_height = $image_attribs[1]; 
		 }
		 
		 $im_new = imagecreatetruecolor($th_width,$th_height); //returns an image identifier representing a black image of size x_size by y_size. 
		 $th_file_name = $thumb_dir.$thumb_img_name;
		 @chmod($th_file_name,0777);
		
		 if($image_attribs[2]==2)
		 {
		 	$im_old = imageCreateFromJpeg($im_file);
			imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagejpeg($im_new,$th_file_name,100);
		 }
		 elseif($image_attribs[2]==1)
		 {
		 	$im_old = imagecreatefromgif($im_file);
		 	imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagegif($im_new,$th_file_name,100);
		}  
		 Return $th_file_name;
 }
//==============added for get name by id=================================


//======================================================================
function recreateUrl($uri){
$createdUri = array();
	if(is_array($uri)){
		foreach($uri as $key => $value){
			$createdUri[$key] = $value;
		}
	}
return($createdUri);
}

function getAlbumList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_PHOTO_ALBUM,"id,title","");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['id']]=$data['title'];
	}
	return $district_array;
}

function getDepartmentList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_DEPARTMENT,"id,title","");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['id']]=$data['title'];
	}
	return $district_array;
}

function getPositionList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_ADS_PACKAGE,"id,position","");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['id']]=$data['position'];
	}
	return $district_array;
}

function getAgencyList()
{
global $obj;
	$district_array=array();
	$res=$obj->selectData(TABLE_NEWSLETTER_SUBSCRIBER,"email,name","");
	while($data=mysql_fetch_assoc($res))
	{
		$district_array[$data['email']]=$data['name'];
	}
	return $district_array;
}

function IsMemberPremium($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_MODEL,"is_premium","id='".$id."'",1);
	if($data['is_premium']==0)
		return false;
	else
		return true;
}
function generatethumbbyHeight($im_file,$th_max_width, $th_max_height,$thumb_dir,$thumb_img_name)
{
		 @chmod($im_file,0777);
		 $image_attribs = getimagesize($im_file); 
		//print_r($image_attribs);exit();	 		 
		 if($image_attribs[1]>$th_max_height)
		 {
			 $ratio = $th_max_height/$image_attribs[1]; 
			 $th_width = $image_attribs[0] * $ratio; 
			 $th_height = $image_attribs[1] * $ratio; 
		 }
		 else
		 {
		 	$th_width = $image_attribs[0]; 
          	$th_height = $image_attribs[1]; 
		 }
		 
		 $im_new = imagecreatetruecolor($th_width,$th_height); //returns an image identifier representing a black image of size x_size by y_size. 
		 $th_file_name = $thumb_dir.$thumb_img_name;
		 @chmod($th_file_name,0777);
		
		 if($image_attribs[2]==2)
		 {
		 	$im_old = imageCreateFromJpeg($im_file);
			imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagejpeg($im_new,$th_file_name,100);
		 }
		 elseif($image_attribs[2]==1)
		 {
		 	$im_old = imagecreatefromgif($im_file);
		 	imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagegif($im_new,$th_file_name,100);
		}  
		 Return $th_file_name;
 }
 
 function generatethumbbyWidth($im_file,$th_max_width, $th_max_height,$thumb_dir,$thumb_img_name)
{
		 @chmod($im_file,0777);
		 $image_attribs = getimagesize($im_file); 
		//print_r($image_attribs);exit();	 		 
		 if($image_attribs[0]>$th_max_width)
		 {
			 $ratio = $th_max_width/$image_attribs[0];
			 $th_width = $image_attribs[0] * $ratio; 
			 $th_height = $image_attribs[1] * $ratio; 
			 
		 }
		 else
		 {
		 	$th_width = $image_attribs[0]; 
          	$th_height = $image_attribs[1]; 
		 }
		 
		 $im_new = imagecreatetruecolor($th_width,$th_height); //returns an image identifier representing a black image of size x_size by y_size. 
		 $th_file_name = $thumb_dir.$thumb_img_name;
		 @chmod($th_file_name,0777);
		
		 if($image_attribs[2]==2)
		 {
		 	$im_old = imageCreateFromJpeg($im_file);
			imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagejpeg($im_new,$th_file_name,100);
		 }
		 elseif($image_attribs[2]==1)
		 {
		 	$im_old = imagecreatefromgif($im_file);
		 	imageCopyResampled($im_new,$im_old,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]); 
			imagegif($im_new,$th_file_name,100);
		}  
		 Return $th_file_name;
 }
 
 function thumbnail_box($img, $box_w, $box_h,$dest) {
    //create the image, of the required size
    $new = imagecreatetruecolor($box_w, $box_h);
    if($new === false) {
        //creation failed -- probably not enough memory
        return null;
    }
    //Fill the image with a light grey color
    //(this will be visible in the padding around the image,
    //if the aspect ratios of the image and the thumbnail do not match)
    //Replace this with any color you want, or comment it out for black.
    //I used grey for testing =)
    $fill = imagecolorallocate($new, 250, 248, 233);
    imagefill($new, 0, 0, $fill);

    //compute resize ratio
    $hratio = $box_h / imagesy($img);
    $wratio = $box_w / imagesx($img);
    $ratio = min($hratio, $wratio);

    //if the source is smaller than the thumbnail size, 
    //don't resize -- add a margin instead
    //(that is, dont magnify images)
    if($ratio > 1.0)
        $ratio = 1.0;

    //compute sizes
    $sy = floor(imagesy($img) * $ratio);
    $sx = floor(imagesx($img) * $ratio);

    //compute margins
    //Using these margins centers the image in the thumbnail.
    //If you always want the image to the top left, 
    //set both of these to 0
    $m_y = floor(($box_h - $sy) / 2);
    $m_x = floor(($box_w - $sx) / 2);

    //Copy the image data, and resample
    //
    //If you want a fast and ugly thumbnail,
    //replace imagecopyresampled with imagecopyresized
    if(!imagecopyresampled($new, $img,
        $m_x, $m_y, //dest x, y (margins)
        0, 0, //src x, y (0,0 means top left)
        $sx, $sy,//dest w, h (resample to this size (computed above)
        imagesx($img), imagesy($img)) //src w, h (the full size of the original)
    ) {
        //copy failed
        imagedestroy($new);
        return null;
    }
    //copy successful
    imagejpeg($new,$dest);
}
function Id_name($id,$tab)
{
	global $obj;
    
    $data=$obj->selectData($tab,"","id='".$id."' AND status='active'",1);
    //pre($data);die;
	if($data['id']==0)
		return false;
	else
		return $data;
}
?>

