<?php
function mail_head()
{
	$str='
	<div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/logo.png" alt=""></a>
    </div>
	';
	return $str;
}
function mail_footer()
{
$string='
	 <div style="width:500px;margin:0 auto;padding:20px;background:#fff;">
        <table style="width:100%;">
            <tr>
                <td style="padding:5px; text-align:right;">
                    <a href="#" target="_blank"><img src="https://zaraad.com/mailer/images/facebook.png"></a>
                </td>
                <td style="padding:5px; text-align: center; width: 15%;">
                    <a href="#" target="_blank"><img src="https://zaraad.com/mailer/images/twitter.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="#" target="_blank"><img src="https://zaraad.com/mailer/images/linkden.png"></a>
                </td>
            </tr>
        </table>
    </div>
     <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/mailer-foot.png" alt=""></a>
   	 </div>
';
return $string;
}

function GetTotalJobIncome($username){

	global $obj;
	$data=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) totalamount","to_userid='".$username."' and wallet_id=3",1);
	return $data['totalamount'];
}

function GetTotalSponsorIncome($username){

	global $obj;
	$data=$obj->selectData(TABLE_SPONSORSHIPINCOME_DETAILS,"SUM(income) totalincome","username='".$username."'",1);
	return $data['totalincome'];
}

function GetTotalBinaryIncome($username){

	global $obj;
	$data=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) totalamount","to_userid='".$username."' and pay_type='cr' and type_of_trans='P'",1);
	return $data['totalamount'];
}

function GetCountryNameById($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_COUNTRY,"name","id='".$id."'",1);
	if($data['name'])
		return $data['name'];
	else
		return "N/A";
}
function IsSponsoredExist($sponsor_id)
{
	global $obj;
	$flag=0;
	//echo $obj->selectData(TREE_USER,"count(*) counter"," username='".$sponsor_id."' and join_status='PAID'",2);
	$data=$obj->selectData(TREE_USER,"count(*) counter"," username='".$sponsor_id."' and join_status='PAID'",1);
	return $data['counter'];
}
function GetMemberEmail($sponsor_id)
{
	global $obj;
	$flag=0;
	//echo $obj->selectData(TREE_USER,"count(*) counter"," username='".$sponsor_id."' and join_status='PAID'",2);
	$data=$obj->selectData(TREE_USER,"email"," username='".$sponsor_id."'",1);
	return $data['email'];
}
function GetTotalPurchaseByUserId($userid)
{
global $obj;
$data=$obj->selectData(TABLE_PACKAGE,"SUM(amount) total"," username='".$userid."'",1);
	return $data['total'];
}

function GetAlreadyPurchases($userid)
{
global $obj;
$data=$obj->selectData(TABLE_PACKAGE,"count(*) counter"," username='".$userid."'",1);
	return $data['counter'];
}

function UserNameExists($username)
{
	global $obj;
	$user2=$obj->selectData(TREE_USER,"count(*) counter","username='".$username."'",1);
	if($user2['counter']>0)
		return true;
	else
		return false;
}
function CreateTicketNo()
{
	global $obj;
	$data=$obj->selectData(TABLE_PACKAGE,"id","status='Active' order by id desc limit 0,1",1);
	$id=$data['id']+1;
	$output="ZA-".time().$id;
	return $output;
}
function CreateCertificateNo()
{
	global $obj;
	$last4=substr( time(), -4 );
	$data=$obj->selectData(TABLE_PACKAGE,"id","status='Active' order by id desc limit 0,1",1);
	$id=$data['id']+1;
	$output="ZA-".$last4.$id;
	return $output;
}
function createInvoiceNumber()
{
	global $obj;
	$order_id=GenerateBillNo();
	$wordLen=3;
	$wordChars=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	$new_word="";
	for($i=0;$i<$wordLen;$i++)
	{
		$new_word.=$wordChars[array_rand($wordChars)];
	}
	//$output=$order_id.$new_word.rand(100000000,999999999);
	$financialyr=GetFinancialyear();
	$output="NFB/".$financialyr."/".$order_id;
	return $output;
}
function IsTransactionPasswordMatch($uname,$pwd)
{
	global $obj;
	$dataset=$obj->selectData(TREE_USER,"","status='Active' and (binary  username='".$uname."')",1);
	 $old_password=$obj->retrievePass($dataset['tran_password']);
	if(trim($old_password)==trim($pwd))
		return true;
	else
		return false;
}
function GetInvoiceData($purchaseid)
{
global $obj;
	$data=$obj->selectData(TABLE_PACKAGE,""," id='".$purchaseid."'",1);
	return $data;
}

function GenerateBillNo()
 {
 global $obj;
	$district_array=array();
	$data=$obj->selectData(TABLE_BILLING_MASTER,"id,invoice_no"," status='Active' order by id desc limit 0,1",1);
	if($data['id']=="")
		$ret="1";
	else
	{
		$code_arr=explode("/",$data['invoice_no']);
		$ret=$code_arr[2]+1;
	}
	
	return $ret;
 }
 function GetFinancialyear()
{
	$day=date("Y-m-d");
	$current_year=date("y",strtotime($day));
	$current_month=date("m",strtotime($day));
	if($current_month>3)
	{
		$y=$current_year."-".($current_year+1);
	}
	else
	{
		$y=($current_year-1)."-".$current_year;
	}
	return $y;
}


function GetPreviousMonth()
{
	$month=date("n");
if($month==1)
	$month=12;
else
	$month=($month -1);

return $month;
}

function GetUserList()
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_CUSTOMER,"","status='Active' order by username");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['username'];
	}
	return $division_array;
}

function GetCategoryList()
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_CATEGORY,"id,title","status='Active' order by title");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['title'];
	}
	return $division_array;
}

function GetCountryist()
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_COUNTRY,"id,name","status='Active' order by name");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['name'];
	}
	return $division_array;
}

function GetStateListByCountry($cid)
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_STATES,"id,name","country_id='".$cid."' order by name");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['name'];
	}
	return $division_array;
}


function getStateList()
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_STATE,"id,title","status='Active' order by title");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['title'];
	}
	return $division_array;
}

function GetState($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_STATES,"id,name","id='".$id."'",1);
	return $data['name'];
}
function GetCountry($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_COUNTRY,"id,name","id='".$id."'",1);
	return $data['name'];
}

function GetTotalProductPriceInCart($prod_str)
{
global $obj;
$no_of=$cartitems = explode(",", $prod_str);
$tot=0;
	for($i=0;$i<count($no_of);$i++)
	{
		$price=GetProductPrice($no_of[$i]);
		$tot+=$price;
	}
return $tot;
}

function GetTotalProducts()
{
global $obj;
$data=$obj->selectData(TABLE_PRODUCT,"count(*) counter","status='Active'",1);
return $data['counter'];
}
function GetProductPrice($id)
{
global $obj;
$data=$obj->selectData(TABLE_PRODUCT,"","id='".$id."'",1);
if($data['sp_price']!=0)
return $data['sp_price'];
else
return $data['price'];
}
function GetProductById($id)
{
global $obj;
$data=$obj->selectData(TABLE_PRODUCT,"","id='".$id."'",1);

return $data['title'];
}
function GetProductSKUById($id)
{
global $obj;
$data=$obj->selectData(TABLE_PRODUCT,"","id='".$id."'",1);

return $data['sku'];
}

function GetProductQty($id)
{
global $obj;
$data=$obj->selectData(TABLE_PRODUCTQTY,"","pid='".$id."'",1);
return $data['qty'];
}

function getProductListByCatId($catid)
{
global $obj;
	$division_array=array();
	$res=$obj->selectData(TABLE_PRODUCT,"id,title","status='Active' and company='".getCurrentAdminId()."' and cat_id='".$catid."' order by title");
	while($data=mysql_fetch_assoc($res))
	{
		$division_array[$data['id']]=$data['title'];
	}
	return $division_array;
}


function getddmmyy($date)
{
$date=explode("-",$date);
	$y=substr($date[0],2,2);
	$m=$date[1];
	$d=$date[2];
	return $d."/".$m."/".$y;
}

function GetProductDetailsById($id)
{
global $obj;
	$data=$obj->selectData(TABLE_PRODUCT,"","id='".$id."'",1);
	return $data;
}
function GetWalletBalance($id)
{
	global $obj;
	//echo $obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","to_userid='".$_SESSION['STUDENT']['username']."' and pay_type='cr' and wallet_id='".$id."'",2);
	$data=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","to_userid='".$_SESSION['STUDENT']['username']."' and pay_type='cr' and wallet_id='".$id."'",1);
	$in=$data['amount'];
	$data1=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","from_userid='".$_SESSION['STUDENT']['username']."' and pay_type='dr' and wallet_id='".$id."'",1);
	$out=$data1['amount'];
	return ($in-$out);
}
function GetWalletBalanceByUser($id,$userid)
{
	global $obj;
	$data=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","to_userid='".$userid."' and pay_type='cr' and wallet_id='".$id."'",1);
	$in=$data['amount'];
	$data1=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","from_userid='".$userid."' and pay_type='dr' and wallet_id='".$id."'",1);
	$out=$data1['amount'];
	return ($in-$out);
}
function GetAvailableBalance($userid,$transid,$wid)
{
	global $obj;
	//echo $obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","pay_type='cr' and to_userid='".$userid."' and transaction_id<=".$transid." and status='SUCCESS' and wallet_id='".$wid."'",2);
	$data=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount","pay_type='cr' and to_userid='".$userid."' and transaction_id<=".$transid." and status='SUCCESS' and wallet_id='".$wid."'",1);
	//echo $obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount1","pay_type='dr' and from_userid='".$userid."' and transaction_id<=".$transid." and status='SUCCESS' and wallet_id='".$wid."'",2);
	$data1=$obj->selectData(TABLE_FUND_TRANSFER,"SUM(amount) amount1","pay_type='dr' and from_userid='".$userid."' and transaction_id<=".$transid." and status='SUCCESS' and wallet_id='".$wid."'",1);
	$ret_amount=$data['amount']-$data1['amount1'];
	return ($ret_amount);
}

function GetCategoryName($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_CATEGORY,"title","id='".$id."'",1);
	if($data['title'])
		return $data['title'];
	else
		return "N/A";
}
function GetProductStatusById($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_PRODUCT,"status","id='".$id."'",1);
		return $data['status'];
}
function GetProductIdByName($name)
{
	global $obj;
	$data=$obj->selectData(TABLE_PRODUCT,"id","title='".$name."'",1);
	if($data['id'])
		return $data['id'];
	else
		return "N/A";
}
function GetProductName($id)
{
	global $obj;
	$data=$obj->selectData(TABLE_PRODUCT,"title","id='".$id."'",1);
	if($data['title'])
		return $data['title'];
	else
		return "N/A";
}
function GetProductStock($pid)
{
	global $obj;
	//echo $obj->selectData(TABLE_CATEGORY,"title","id='".$id."'",2);
	$data=$obj->selectData(TABLE_PRODUCTQTY,"qty","pid='".$pid."'",1);
	if($data['qty'])
		return $data['qty'];
}
function GetTotalReveneu()
{
global $obj;
	$data=$obj->selectData(TABLE_BILLING_MASTER,"SUM(total_price) tot","status='Active'",1);
	return $data['tot'];
}
function NumberOfItemInInvoice($invoice)
{
global $obj;
	$data=$obj->selectData(TABLE_BILLING_DETAILS,"count(*) counter","invoice_no='".$invoice."'",1);
	return $data['counter'];
}

function GenerateNewsletterTemplate($models)
{
	global $obj;
	$model_arr=explode(",",$models);
	//pre($model_arr);
	$body="";
	$body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Glam Creation Newsletter</title>
<style>
.tbl_body{ border:1px solid #000000;
border:2 px solid #000000;
width:600px;
}
.bag{background-color:#000000}
.pad{ padding-bottom:50px}
.font{ font-size:14px; font-weight:bold; color:#000000}
.head {font-weight:bold; font-size:18px; color:#FF0000}
.paa{padding-left:40%}
.input_type{ width:95%; line-height:100%}
.desc_title{color:#CC0000; font-weight:bold;}
.desc_cont{color:#0000FF; font-weight:bold; padding-right:10px;}
.desc_cont_white{color:#FFFFFF; font-weight:bold; padding-right:10px;}
.imgbor{padding:10 25 10 25;
border:2 px solid #000000;
border-radius:5px;}
</style>
</head>

<body>


<table width="100%" border="0" align="center" class="tbl_body">
	<tr>
		<td height="50%" bgcolor="#000000">
			<table>
				<tr>
					<td  bgcolor="#000000"> <img src="'.FURL.'/images/logo.png" width="200" height="150" /></td>
					<td><span class="desc_cont_white">Check Our top 5 Exclusive Models. To Hire Models, Please call Us at.</span>
					<br /><span class="desc_title">Telephone:</span><span class="desc_cont_white">+91 9088632603 / 9804200136</span>
					<br /><span class="desc_title">Email:</span><span class="desc_cont_white">surajit.basumallick@gmail.com</span>
					</td>
				</tr>
				</table>
		</td>
	</tr>
	<tr>
	<td>	
		<table width="100%" border="0">';
		
	for($i=0;$i<count($model_arr);$i++)	
	{
		$interested_in=GetInterested_String($model_arr[$i]);
		$dataset=$obj->selectData(TABLE_MODEL,"","id='".$model_arr[$i]."' and status<>'Deleted'",1);
		$profile_pic=FURL.PROFILETHUMB.$dataset['profile_pic'];
		$url=FURL."models_detail.php?id=".base64_encode($dataset['id']);
	$body.='<tr>
				<td style="width:300px;"><a href="'.$url.'"><img src="'.$profile_pic.'" class="imgbor" /></a> <br /><a href="'.$url.'"><span class="desc_title" style="text-align:center; padding-left:10px;">'.$dataset['code'].'</span></a></td>
				<td valign="top">
				<span class="desc_title">Height:</span> <span class="desc_cont">'.$dataset['height'].'</span>
				<span class="desc_title">Weight:</span> <span class="desc_cont">'.$dataset['weight'].'</span>
				<span class="desc_title">Bust:</span> <span class="desc_cont">'.$dataset['bust'].'</span>
				<span class="desc_title">Hip:</span> <span class="desc_cont">'.$dataset['hip'].'</span>
				<span class="desc_title">Waist:</span> <span class="desc_cont">'.$dataset['waist'].'</span>
				<br />
				<span class="desc_title">Interested In:</span> <span class="desc_cont">'.$interested_in.'</span>
				</td>
			</tr>';
	}
  
   
   
   
   
   $body.='</table>
	</td>
	</tr>
	<tr>
		<td style="background-color:#000000; color:#FFFFFF; text-align:center">Powered By: <a href="http://sptlobalservices.com" target="_blank" style="color:#FFFFFF">SPT Global Services.</a></td>
	</tr>
</table></body>
</html>
';	
return $body;	
}

function GetBTCIdByUser($user)
{
	global $obj;
	$data=$obj->selectData(TABLE_WALLET_ACCOUNT,"btc"," userid='".$user."' and status='Active'",1);
	return $data['btc'];
}
function GeWalletAccountData()
{
	global $obj;
	$data=$obj->selectData(TABLE_WALLET_ACCOUNT,"","userid='".$_SESSION['STUDENT']['username']."' and status='Active'",1);
	return $data;
}

 function GetMonthname($month)
{
	switch($month)
	{
		case '1':
			return "January";
		break;
		case '2':
			return "February";
		break;
		case '3':
			return "March";
		break;
		case '4':
			return "April";
		break;
		case '5':
			return "May";
		break;
		case '6':
			return "June";
		break;
		case '7':
			return "July";
		break;
		case '8':
			return "August";
		break;
		case '9':
			return "September";
		break;
		case '10':
			return "October";
		break;
		case '11':
			return "November";
		break;
		case '12':
			return "December";
		break;
		
	}
}
function currencytoword($number)
{
	$no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
		  if($points)
  echo $result . "Dollar  " . $points . " Paise";
  else
  echo $result . "Dollar Only";
	}
	
function GenerateTreeGraphics($uplineid)
{
global $obj;

echo $obj->selectData(TREE_USER,"sponsername,full_name,username,uplinename"," uplinename='".$uplineid."' and join_status='Paid' and status='Active'",2);
$result = $obj->selectData(TREE_USER,"sponsername,full_name,username,uplinename"," uplinename='".$uplineid."' and join_status='Paid' and status='Active'",2);
while($row = mysql_fetch_array($result))
{ echo $row['full_name'];
$i = 0;
if ($i == 0)?>
<ul>

<li><a class="tooltip1" href="#"><img src="images/blank.png" style="width:100%" alt=""><div class="tooltiptext"><h5><i class="fa fa-user"></i> Business Info</h5><div class="text-pt"><table class="table table-bordered"><tbody><tr><td>User Id</td><td><?php echo $row['username'];?></td></tr><tr><td>Sponsor Id</td><td><?php echo $row['sponsername'];?></td></tr><tr><td>Upline Id</td><td><?php echo $row['uplinename'];?></td></tr></tbody></table></div></div></a>
<?php  GenerateTreeGraphics($row['username']);
 ?>
</li>
<?php 
$i++;
 if ($i > 0)?> </ul>
<?php 
}
}	
	
function binaryListView($catid){
$sql = "select * from ".TREE_USER." where uplinename ='".$catid."' and join_status='Paid' and status='Active'";
$result = mysql_query($sql);
 $num_rows=mysql_num_rows($result);
 
while($row = mysql_fetch_object($result)):
$i = 0;
if(haschildupline($row->uplinename)) echo '<ul>';
 echo '
<li>' . $row->username.$$info="( Join Date: ".date("Y-m-d",strtotime($admin_data['join_date']))." Name: ".$row->full_name." Total Purchase: ". GetTotalPurchaseByUserId($row->username). ")";;
 binaryListView($row->username);
 echo '</li>';
$i++;
 if (haschildupline($catid)) echo '</ul>';
endwhile;
}
function haschildupline($userid)
{
$sql = "select count(*) counter from ".TREE_USER." where uplinename ='".$userid."'";
$rs=mysql_query($sql);
$dt=mysql_fetch_array($rs);
if($dt['counter']>0)
return true;
else
return false;
}

function sponsoredListView($catid){
$sql = "select * from ".TREE_USER." where sponsername ='".$catid."' and join_status='Paid' and status='Active'";
$result = mysql_query($sql);
 $num_rows=mysql_num_rows($result);
 
while($row = mysql_fetch_object($result)):
$i = 0;
if(haschild($row->uplinename)) echo '<ul>';
 echo '
<li>' . $row->full_name;
 sponsoredListView($row->username);
 echo '</li>';
$i++;
 if (haschild($catid)) echo '</ul>';
endwhile;
}
function haschild($userid)
{
$sql = "select count(*) counter from ".TREE_USER." where sponsername ='".$userid."'";
$rs=mysql_query($sql);
$dt=mysql_fetch_array($rs);
if($dt['counter']>0)
return true;
else
return false;
}
function GetAgentWalletBalance()
{
	global $obj;
	$data=$obj->selectData(TABLE_AGENCY_WALLET,"SUM(amount) amount","from_id='".$_SESSION['STUDENT']['username']."' and type='cr' and status='Active'",1);
	$in=$data['amount'];
	$data1=$obj->selectData(TABLE_AGENCY_WALLET,"SUM(amount) amount","from_id='".$_SESSION['STUDENT']['username']."' and type='dr' and status='Active'",1);
	$out=$data1['amount'];
	$ret=($in-$out);
	return $ret;
}
//close the connection
?>