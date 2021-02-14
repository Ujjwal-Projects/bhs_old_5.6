<?php 

class gen_function extends main_function 
{
	function gen_function()
	{
		parent::main_function();
		parent::setMysqlKeyword("now()");
	}
	function short_description($descr,$noc="")
	{
	
		$sdescr=strip_tags($descr);
		if(empty($noc))$noc=200;
		if(trim($sdescr)<>'')
		{
			if(strlen($sdescr)>$noc)
				return substr($sdescr, 0, $noc).".....";
			else
				return $sdescr;
		}
		else
		return $sdescr;
	}
	///////////for redirect url////////
	function reDirect($url)
	{
		header("Location: ".$url);
		exit;
	}
	/*function goTo($url)
	{
		echo "<script>window.location.href='$url'</script>";
		exit;
	}*/
	///////////for redirect url////////
	
	function selectDate($sel_val,$year,$month)
	{
		switch($month)
		{
			case '1': case '3': case '5': case '7': case '8': case '10': case '12':
				$no_of_days=31;
				break;
			case '4': case '6': case '9': case '11':
				$no_of_days=30;
				break;
			case '2':
				$no_of_days=28;
				if((($month%4==0)&&($month%100!=0))||($month%400==0))
				{
					$no_of_days=29;
				}
				break;
			default:
			echo "Wrong data";
			break;
		}
		for($i=1;$i<=$no_of_days;$i++)
		{
			$options.="<option value='".$i."'";
			if($sel_val==$i){ $options.=" selected"; } $options.=">".$i."</option>"; 
		}
		return $options;
	}
	function selectMonth($sel_val)// used
	{
		//$options="<option value='0'>Select</option>";
		$options.="<option value='1'";
		if($sel_val=='1'){ $options.=" selected"; } $options.=">1</option>"; 
		$options.="<option value='2'";
		if($sel_val=='2'){ $options.=" selected"; } $options.=">2</option>";
		$options.="<option value='3'";
		if($sel_val=='3'){ $options.=" selected"; } $options.=">3</option>";
		$options.="<option value='4'";
		if($sel_val=='4'){ $options.=" selected"; } $options.=">4</option>";
		$options.="<option value='5'";
		if($sel_val=='5'){ $options.=" selected"; } $options.=">5</option>";
		$options.="<option value='6'";
		if($sel_val=='6'){ $options.=" selected"; } $options.=">6</option>";
		$options.="<option value='7'";
		if($sel_val=='7'){ $options.=" selected"; } $options.=">7</option>";
		$options.="<option value='8'";
		if($sel_val=='8'){ $options.=" selected"; } $options.=">8</option>";
		$options.="<option value='9'";
		if($sel_val=='9'){ $options.=" selected"; } $options.=">9</option>";
		$options.="<option value='10'";
		if($sel_val=='10'){ $options.=" selected"; } $options.=">10</option>";
		$options.="<option value='11'";
		if($sel_val=='11'){ $options.=" selected"; } $options.=">11</option>";
		$options.="<option value='12'";
		if($sel_val=='12'){ $options.=" selected"; } $options.=">12</option>";
		return $options;
	}
	function selectYear($sel_val) // used
	{
		$year=date('Y')+50;
		if(!$sel_val)
		{
			$sel_val==date('Y');
		}
		//$options="<option value='0'>Select</option>";
		for($i=0;$i<100;$i++)
		{
			$options.="<option value=".$year;
			if($year==$sel_val){  $options.=" selected"; } 
			$options.=">".$year."</option>";
			$year--;
			
		}
		return $options;
	}
	
		/////////////////////////
	function sendMail($to="", $subject="", $body="",$from="",$fromname="",$type="",$replyto="",$bcc="",$cc="")
	{
		if(empty($type))
		{
			$type="html";
		}
		if($type=="plain")
		{
			$body = strip_tags($body);
		}
		if($type=="html")
		{
			$body = "<font face='Verdana, Arial, Helvetica, sans-serif'>".$body."</font>";
		}
		/* To send HTML mail*/ 
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers.= "Content-type: text/".$type."; charset=iso-8859-1\r\n";
		/* additional headers */ 
		//$headers .= "To: <".$to.">\r\n"; 
		if(!empty($from))
		{
			$headers .= "From: ".$fromname." <".$from.">\r\n";
		}
		if(!empty($replyto))
		{
			$headers .= "Reply-To: <".$replyto.">\r\n"; 
		}
		if(!empty($cc))
		{
			$headers .= "Cc: ".$cc."\r\n";
		}
		if(!empty($bcc))
		{
			$headers .= "Bcc: ".$bcc."\r\n";
		}
		if(@mail($to, $subject, $body, $headers))
		{
			return 1;
		}
		else
		{
			return $headers;
		}
	}

//////////////////////FILE UPLOAD/////////////////////////////
function uploadFile($file_id, $folder="", $types="",$rename="") {

	$file_title = $_FILES[$file_id]['name'];
	$file_tmp = $_FILES[$file_id]['tmp_name'];
	
    if(!$file_title) return array('','No file specified');
    //Get file extension
    $ext_arr = split("\.",basename($file_title));
    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension
	
   if(!empty($types))
   { 
     $all_types = explode(",",strtolower($types));
		if($types) 
		{
			if(in_array($ext,$all_types));
			else {
				$result = "'".$file_title."' is not a valid file."; //Show error if any.
				return array('',$result);
			}
		}
	}

    //Not really uniqe - but for all practical reasons, it is
	if(!empty($rename))
	{
	 	$file_name=$rename.'.'.$ext; 
	}
	else
	{
		$uniqer = substr(md5(uniqid(rand(),1)),0,5);
		$file_name = $uniqer . '_' . date('YmdHis').'.'.$ext;//Get Unique Name
	}
    //Where the file must be uploaded to
    if($folder) $folder .= '/';//Add a '/' at the end of the folder
    $uploadfile = $folder . $file_name;

    $result = '';
    //Move the file from the stored location to the new location
    if (!move_uploaded_file($file_tmp, $uploadfile)) {
        $result = "Cannot upload the file '".$file_title."'"; //Show error if any.
        if(!file_exists($folder)) {
            $result .= " : Folder don't exist.";
        } elseif(!is_writable($folder)) {
            $result .= " : Folder not writable.";
        } 
        $file_name = '';
        
    } else {
        if(!$_FILES[$file_id]['size']) { //Check if the file is made
            @unlink($uploadfile);//Delete the Empty file
            $file_name = '';
            $result = "Empty file found - please use a valid file."; //Show the error message
        } else {
            chmod($uploadfile,0777);//Make it universally writable.
        }
    }

    return array($file_name,$result);
}
//////////////////////////////////////PAGING/////////////////////////////////////////////////////
function pagewise($numrows,$LIMIT,$pageno,$lnkParam="",$lnkScr="",$yahoopaging="",$nopageshow="")
	{
		define('CSS','leftmenu_link');
		if(empty($nopageshow))
		{
			$nopageshow=10;
		}
		if($nopageshow % 2) 
		{
			$tgp=$nopageshow-1;
			$gp=$tgp/2;
			$yp=$tgp;
		} 
		else 
		{
			$tgp=$nopageshow;
			$gp=$tgp/2;
			$yp=$nopageshow-1;
		}
		if(empty($lnkScr))
		$lnkScr=$_SERVER['PHP_SELF'];
		if(($numrows>$LIMIT)&&($numrows>0)){
		$pages=intval($numrows/$LIMIT);
		if ($numrows % $LIMIT)
			{ 
			$pages++;
			}
		print "<div align=center>";
		print "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">";
		$offset=$LIMIT*($pageno-1);
		$currenthit = $offset + 1;
		
		if (($numrows - $currenthit) >= $LIMIT )
			{
				$lasthit = $currenthit + ($LIMIT - 1); 
			}
		else
			{ 
				$lasthit=$numrows; 
			}

		if($LIMIT > 2) 
			{ 
				$quo = ($currenthit/$LIMIT) + 1;
				$selectedPg = sprintf("%.0f", $quo);
			}
		else 
			{ 
				$quo = $currenthit/$LIMIT;
				$selectedPg = ceil($quo);
			}
		print "<tr><td width=\"100%\" valign=\"top\" align=\"center\" class=\"".CSS."\">";
		if(($selectedPg-$gp)<1)
		$st_page=1;
		else
		$st_page=$selectedPg-$gp;
		if(($selectedPg+$gp)>$pages)
		$end_page=$pages;
		else
		$end_page=$selectedPg+$gp;
		if(!empty($yahoopaging))
		{
			if($end_page-$st_page<$yp)
			{
				if($st_page+$yp>$pages)
					$end_page=$pages;
				else
					$end_page=$st_page+$yp;
				if($end_page-$yp<1)
					$st_page=1;
				else
					$st_page=$end_page-$yp;
			}
		}
		if($selectedPg!=1)
		{
		$newpageno = ($selectedPg - 1);
		print "<a class='blu_header_link_undrlne' href=\"".$lnkScr."?pageno=$newpageno".$lnkParam."\"><b>Previous</b></a>&nbsp;  ";
		}
		for ($i=$st_page; $i<=$end_page; $i++)
			{
					if($selectedPg == $i)
                        {
                        	print "<b><FONT color=red class='box_bg_color_on'>$i</FONT></b> &nbsp; ";
                        }
					else
                        {
                        print "<a class='box_bg_color_link' href=\"".$lnkScr."?pageno=$i".$lnkParam."\">$i</a>&nbsp;&nbsp;";
                        }
			}
		if($selectedPg!=$pages)
		{
		$newpageno = ($selectedPg+1);
		print "&nbsp;<a class='blu_header_link_undrlne' href=\"".$lnkScr."?pageno=$newpageno".$lnkParam."\"><b>Next</b></a>";
		}
		print "</td></tr>";
		print "</table>";
		print "</div>";
		}
		if($numrows==0)
		{
		print "<span class='error_txt'><b>No Record Found!</b></span>";
		}
 	return $pages;
	}
	
function get_page_name($path='')
{
	$page_path = ($path != "") ? $path : $_SERVER['HTTP_REFERER']; 
	$url_parts = parse_url($page_path);
	$tmp_path = explode("/",$url_parts['path']); //pre($tmp_path);
	$page_name = array_pop($tmp_path);
	$page_name = !empty($page_name) ? $page_name : "index.php";
	$page_name .= ($url_parts['query'] != "") ? "?".$url_parts['query'] : "";
	$page_name .= ($url_parts['fragment'] != "") ? "#".$url_parts['fragment'] : "";
	return $page_name;
}

function fileWrite($content,$filename)
	{
		$text=stripcslashes($content);
		if(empty($text))
		{
			$text='  ';
		}
		if (file_exists($filename)) 
		{
			unlink($filename);
		}
		if (!$handle = fopen($filename, 'w+')) { 
				//print "Cannot open file ($filename)"; 
				return "Cannot open file:".$filename;
		   } 
		if (is_writable($filename)) { 
		   // In our example we're opening $filename in append mode. 
		   // The file pointer is at the bottom of the file hence 
		   // that's where $somecontent will go when we fwrite() it. 
		   // Write $somecontent to our opened file.
		   if (!fwrite($handle, $text)) { 
			   //print "Cannot write to file ($filename)"; 
			  return "Cannot open file:".$filename;
		   } 
		   else { 
			   return "Successfully updated."; 
		   } 
		   fclose($handle); 
							
		} else { 
			return "File:".$filename." Not Writeable."; 
		} 
	}	
	function randCode($limit)
	{
		$rand=rand();
		$rand1=md5($rand);
		$pass = substr($rand1, 0, $limit);
		return $pass;
	}
	function encryptPass($strPass){
		$strPass=trim($strPass);
		$basePass=base64_encode($strPass);
		$revPass=strrev($basePass);
		//echo $oriPass=base64_decode(strrev($revPass));
		$first4=$this->randCode(4);
		$last4=$this->randCode(4);
		$enc_revPass=$first4.$revPass.$last4;
		return $enc_revPass;
	}
	function retrievePass($enc_revPass){
		$pass=substr($enc_revPass,4);
		$last4=substr($pass,-4,4);
		$pass1=str_replace($last4,"",$pass);
		$revPass=strrev($pass1);
		$oriPass=base64_decode($revPass);
		return $oriPass;
	//	echo "<br>".$oriPass;
	}
	function build_Nlevel_tree_dropdown($tableAttr,$selval=0,$oldID=0,$depth=0,$ids=0,$opttag=0)
	{
		if(!is_array($tableAttr))
		{
			return false;
		}
		else
		{
			$table=$tableAttr[0];
			if(defined($table))
				$table=constant($table);
			else
				$table=$table;
			$parent_id=$tableAttr[1];
			$child_id=$tableAttr[2];
			$child_value=$tableAttr[3];
			$cond=$tableAttr[4];
		}
		$exclude=array();
		
		$child_query = parent::selectData($table,"",$parent_id."=".$oldID." ".$cond);
		while ( $child = mysql_fetch_array($child_query) )
		{
			if($child[$child_id]!=$child[$parent_id])
			{
				$space ="";
				if($depth>$this->dep_lavel)
				{
					$this->dep_lavel=$depth;
				}
				for ( $c=0;$c<$depth;$c++ )
				{ 
					$space.= "--"; 
				}
				
				$selected="";
				if($selval==$child[$child_id]) $selected='selected';
				if(!$ids){
					if($child[$parent_id]==0 && $opttag==1){
						$tempTree.= "<optgroup label='".$child[$child_value]."'>";
						}else{
						$tempTree.= "<option value='".$child[$child_id]."' ".$selected.">".$space.$child[$child_value] . "</option>";
						}
					}else{
					$tempTree.= ",".$child[$child_id];
					}
				$depth++; 
				$tempTree.= $this->build_Nlevel_tree_dropdown($tableAttr,$selval,$child[$child_id],$depth,$ids,$opttag); 
				if($child[$parent_id]==0 && $opttag==1){
				$tempTree.="</optgroup>";
				}
				$depth--; 
				array_push($exclude, $child[$child_id]);
			}
		}
		return $tempTree;
	}
	function build_child($selval=0,$oldID=0,$depth=0)
	{
		$exclude=array();
		
		$child_query = parent::selectData(TABLE_CONTENT,"","content_id>0 and content_status='Active'");

		while ( $child = mysql_fetch_array($child_query) )
		{
			if ( $child['content_id'] != $child['content_parent'] )
			{
				$space ="";
				for ( $c=0;$c<$depth;$c++ )
				{ 
					$space .= "--"; 
				}
				
				$selected="";
				if($selval==$child['content_id']) $selected='selected';
				$tempTree .= "<option value='".$child['content_id']."' ".$selected.">".$space.$child['content_title'] . "</option>";
				
				$depth++; 
				$tempTree .= $this->build_child($selval,$child['content_id'],$depth); 
				$depth--; 
				array_push($exclude, $child['content_id']);
			}
		}
		return $tempTree;
	}
	function putContent($id)
	{
		$res=parent::selectData(TABLE_CONTENT,"","content_id='".$id."'",1);
		$content=$res['content_descr'];
		return html_entity_decode($content);
	}
	function putMetaTags($id=-1)
	{
		$res=parent::selectData(TABLE_CONTENT,"","content_id='".$id."'",1);
		$meta_title=$res['meta_title'];
		$meta_description=$res['meta_description'];
		$meta_keywords=$res['meta_keywords'];
		$meta_summary=$res['meta_summary'];
		
		$meta_content='<title>'.$meta_title.'</title>';
		$meta_content.='<meta name="DESCRIPTION" content="'.$meta_description.'" />';
		$meta_content.='<meta name="summary" content="'.$meta_summary.'" />';
		$meta_content.='<meta name="KEYWORDS" content="'.$meta_keywords.'" />';
		$meta_content.='<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
		return $meta_content;
	}
	
	function mailBody($bodypart){
		$data='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rank Your Company</title>
</head>

<body>
<table width="100%" border="0" cellpadding="10" cellspacing="0" background="images/bg.gif">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><img src="'.FURL.'images/logo.png" alt="" /></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#fff">
          <tr>
            <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif" color="#000000" size="2">'.$bodypart.'<br>Thank you from Bhabimatch</font></td>
              </tr>

            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><font size="2" color="#000000" face="Arial, Helvetica, sans-serif">'.'Copyright © '.YEAR.' <a href="'.FURL.'">'.SITE_NAME_FULL.'</a> All Rights Reserved.'/*FOOTER_TEXT*/.'</font></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>';
		return $data;
	}
	
function getUserIdFromUserName($username){
	$data = parent::selectData(TABLE_USER,"","BINARY `user_name`='$username' and user_status='Active'",1);
	return($data['user_id']);
}

function getUserNameFromUserId($user_id){
	$data = parent::selectData(TABLE_USER,"","BINARY `user_id`='$user_id' and user_status='Active'",1);
	return($data['user_name']);
}

function ParentCatsSelect($category){
	$list = '';
	
	$category = explode(",",$category);
	
	$data = parent::selectData(TABLE_USER_CATEGORY,"","`user_category_parent_id`='0' and user_category_status='Active'","");
	while($res = mysql_fetch_array($data)){
		if(is_array($category) and in_array($res['user_category_id'],$category)){
			$list .= '<input id="'.$res['user_category_id'].'" type="checkbox" value="'.$res['user_category_id'].'"  onclick="openChildCats('.$res['user_category_id'].');" checked="checked"/>'.$res['user_category_name']."&nbsp;";
			
		} else {
			$list .= '<input id="'.$res['user_category_id'].'" type="checkbox" value="'.$res['user_category_id'].'"  onclick="openChildCats('.$res['user_category_id'].');"/>'.$res['user_category_name']."&nbsp;";
		}
	}
	return($list);
}

function getContentMail($selval="",$rSet=0)
	{
		$res=$this->selectData(TABLE_EMAIL);
		foreach($res as $row)
		{
			$str.="<option value='".$row['id']."'";
			if($row['id']==$selval)
			{
				$str.='selected';
			}
			$str.=">".$row['code']."</option>";
		}
		return $str;
	}

}
?>