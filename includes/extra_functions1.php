<?php 
function ForgetPasswordTemplate($username,$full_name,$password){
global $obj;
	
	//pre($model_arr);
	$body="";
	$body.=mail_head();
	$body.='    
	 <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$full_name.'</b> <br>
            your Zara Ad Password details are given below.Please, Donot Share Your Password with anyone.
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Unique User ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$username.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Password :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$obj->retrievePass($password).'</b></td>
            </tr>
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/mailer/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>';	
$body.=mail_footer();
return $body;	

}
function GenerateHotelEmail($name,$mob,$email,$roomtype,$no_room,$adult,$child,$check_in,$check_out)
{
	
	global $obj;
	
	$body="";
	//$body.=mail_head();
	$body.='
   
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            <b style="color:#000;">Basu Travels</b> <br>
        </h1>
		<h4> Hotel Enquiry email</h4>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Name :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$name.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Email :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$email.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Phone :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$mob.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;"> Room Type :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$roomtype.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;"> No. Of Room :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$no_room.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;"> No. Of Adult :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$adult.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;"> No. Of Children :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$child.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Check Out Date :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$check_out.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Check In Date :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$check_in.'</b></td>
            </tr>
        </table>
    </div>
    
		';	
//$body.=mail_footer();
return $body;	
}

function GenerateContactEmail($name,$phone,$email,$message)
{
	global $obj;
	$body="";
	//$body.=mail_head();
	$body.='
   
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            <b style="color:#000;">Basu Travels</b> <br>
        </h1>
		<h4> Contact email</h4>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Name :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$name.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Email :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$email.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Phone :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$phone.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Message :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$message.'</b></td>
            </tr>
        </table>
    </div>
    
		';	
//$body.=mail_footer();
return $body;	
}
//$body=GeneratePlanEmailTemplate($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['date_of_journey'],$_POST['adult'],$_POST['child5'],$_POST['child3'],$_POST['message'],$_POST['message1']);
function GeneratePlanEmailTemplate($name,$email,$phone,$address,$date_of_journey,$adult,$child5,$child3,$message,$message1)
{
	global $obj;
	$body="";
	//$body.=mail_head();
	$body.='
   
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            <b style="color:#000;">Basu Travels</b> <br>
        </h1>
		<h4> Plan Trip Email</h4>
    </div>
    <div style="width:600px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Full Name :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$name.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Email :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$email.'</b></td>
            </tr>
			
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Phone :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$phone.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Address :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$address.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Date of Journey :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$date_of_journey.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Adult :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$adult.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Child5-10 yr :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$child5.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Child3-5 yr:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$child3.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Enquiry Regarding:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$message.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Your Message:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$message1.'</b></td>
            </tr>
        </table>
    </div>
    
		';	
//$body.=mail_footer();
return $body;	
}
//$body=GeneratePlanEmailTemplate($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['cartype'],$_POST['pickup'],$_POST['pickup_date'],$_POST['drop_loc']);
function GenerateCarEmailTemplate($name,$email,$phone,$cartype,$pickup,$pickup_date,$drop_loc)
{
	global $obj;
	$body="";
	//$body.=mail_head();
	$body.='
   
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            <b style="color:#000;">Basu Travels</b> <br>
        </h1>
		<h4> Car Enquiry Email</h4>
    </div>
    <div style="width:600px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Full Name :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$name.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Email :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$email.'</b></td>
            </tr>
			
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Phone :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$phone.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;"> Car Type :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$cartype.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Pick Up Location :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$pickup.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Pickup Date/Time :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$pickup_date.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Dropoff Location:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$drop_loc.'</b></td>
            </tr>
			
        </table>
    </div>
    
		';	
//$body.=mail_footer();
return $body;	
}
function GenerateWelcomeEmailTemplate($uname)
{
	global $obj;
	$dataset=$obj->selectData(TREE_USER,""," username='".$uname."'",1);
	//pre($model_arr);
	$body="";
	$body.=mail_head();
	$body.='    
	 <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$dataset['full_name'].'</b> <br>
            your Zara Ad account has been Successfully Registered.Please Upgrade your Package.
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Sponser ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['sponsername'].'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Unique User ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['username'].'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Password :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$obj->retrievePass($dataset['password']).'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Transaction Password :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$obj->retrievePass($dataset['tran_password']).'</b></td>
            </tr>
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/mailer/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>';	
$body.=mail_footer();
return $body;	
}
function ForgetTransactionPasswordTemplate($uname,$memname,$pass)
{
	global $obj;
	//pre($model_arr);
	$body="";
	$body.=mail_head();
	$body.='   
    <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$memname.'</b> <br>
            You have requested transaction password recovery for your Zara Ad Account. Following are the Password Recovery Details
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Unique User ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$uname.'</b></td>
            </tr>
            
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Transaction Password :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff;"><b>'.$obj->retrievePass($pass).'</b></td>
            </tr>
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/mailer/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>';	
$body.=mail_footer();
return $body;	
}
function NewUplineEmailTemplate($username)
{
	global $obj;
	$dataset=$obj->selectData(TREE_DOWNLINE,""," downlinename='".$username."'",1);
	$uplinename=$dataset['uplinename'];
	$dataset1=$obj->selectData(TREE_USER,""," username='".$uplinename."'",1);
	$dataset2=$obj->selectData(TREE_USER,""," username='".$username."'",1);
	$body="";
	$body.=mail_head();
	$body.='   
    <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$dataset1['full_name'].'</b> <br>
            Congratulations! You have got a New Downline Member. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">User ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$username.'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Sponsor ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset2['sponsername'].'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;"> Email :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset2['email'].'</b></td>
            </tr>
           	<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Joining Side:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.ucwords($dataset1['side']).'</b></td>
            </tr>
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	';	
$body.=mail_footer();
return $body;	
}

function NewSponsoredEmailTemplate($username)
{
	global $obj;
	$dataset=$obj->selectData(TREE_USER,""," username='".$username."'",1);
	$dataset1=$obj->selectData(TREE_DOWNLINE,""," downlinename='".$username."'",1);
	$body="";
	$body.=mail_head();
	$body.='   
    <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$dataset['sponsername'].'</b> <br>
            Congratulations! Your Sponsored Member is now Active.
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">User ID :</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$username.'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Email:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['email'].'</b></td>
            </tr>
           	
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/mailer/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	';	
$body.=mail_footer();
return $body;	
}


function WalletDebitTransactionEmailTemplate($username)
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_FUND_TRANSFER,""," from_userid='".$username."' and pay_type='dr' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            your Zara Wallet has been Debited.
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Paid To:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['to_userid'].'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Transaction Id:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['transaction_id'].'</b></td>
            </tr>
			
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['amount'].'</b></td>
            </tr>
           
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.comimages/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.comimages/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function WalletCreditTransactionEmailTemplate($username)
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_FUND_TRANSFER,""," to_userid='".$username."' and pay_type='cr' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            your Zara Wallet has been Credited.
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Paid By:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['from_userid'].'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Transaction Id:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['transaction_id'].'</b></td>
            </tr>
			
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['amount'].'</b></td>
            </tr>
           
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function WithdrawlApprovedTemplate($username,$amount,$payment)
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_FUND_TRANSFER,""," to_userid='".$username."' and pay_type='cr' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            Your Requested Withdrawal has been Processed. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">UserID:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$username.'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$amount.'</b></td>
            </tr>
			
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Payment Method:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$payment.'</b></td>
            </tr>
           
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function WithdrawlCancelledTemplate($username,$amount,$payment)
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_FUND_TRANSFER,""," to_userid='".$username."' and pay_type='cr' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            Your Requested Withdrawal has been Cancelled and Successfully Refunded to your wallet. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">UserID:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$username.'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$amount.'</b></td>
            </tr>
			
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Payment Method:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$payment.'</b></td>
            </tr>
           
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function PackagePurchaseEmailTemplate($username)
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_PACKAGE,""," username='".$username."' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            you have purchased a package. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Upgradation Date:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['upgraded_on'].'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Invoice No:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['invoice_no'].'</b></td>
            </tr>
           
		   <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Certificate No:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['certificate_no'].'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Package Qty:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['package_qty'].'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['amount'].'</b></td>
            </tr>
			
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function NewPackagePurchaseEmailTemplate($username)///////////////to be modified
{
	global $obj;
	
	$dataset=$obj->selectData(TABLE_PACKAGE,""," username='".$username."' ORDER BY id DESC LIMIT 1",1);
	
	
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            you have purchased a package. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Upgradation Date:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['upgraded_on'].'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Invoice No:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['invoice_no'].'</b></td>
            </tr>
           
		   <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Certificate No:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['certificate_no'].'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Package Qty:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['package_qty'].'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$dataset['amount'].'</b></td>
            </tr>
			
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function SelfWalletTxnEmailTemplate($username,$fromwallet,$towallet,$amount)
{
	global $obj;
	$cash_wallet=GetWalletBalance(1);
	$reward_wallet=GetWalletBalance(3);
	$zarawallet=GetWalletBalance(2);
	$txndetails=$obj->selectData(TABLE_FUND_TRANSFER,"","from_userid='".$username."' ORDER BY id DESC LIMIT 1",1);
	
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            You have Tranfered balance amounting '.$amount.' from your '.$fromwallet.' to '.$towallet.'. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Transaction Id:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$txndetails['transaction_id'].'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">From:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$fromwallet.'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">To:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$towallet.'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount Transfered:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$amount.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Zara Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$zarawallet.'</b></td>
            </tr>
           
		   <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Reward Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$reward_wallet.'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Cash Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$cash_wallet.'</b></td>
            </tr>
			
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}

function WithdrawalRequestEmailTemplate($username,$amount)
{
	global $obj;
	$cash_wallet=GetWalletBalance(1);
	$reward_wallet=GetWalletBalance(3);
	$zarawallet=GetWalletBalance(2);
	$txndetails=$obj->selectData(TABLE_WITHDRAWN_REQUEST,"","userid='".$username."' ORDER BY id DESC LIMIT 1",1);
	if($txndetails == 1){
	$wallet= "CASH WALLET";
	}elseif($txndetails == 2){
	$wallet= "ZARA WALLET";
	}elseif($txndetails == 3){
	$wallet= "REWARD WALLET";
	}else{
	$wallet= "";
	}
	$body="";
	$body.=mail_head();
	$body.='   
   <div style="width:500px;margin:0 auto;padding:20px 20px 0;background:#fff;text-align:center;">
        <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/bg.png" alt=""></a>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            Hi <b style="color:#000;">'.$username.'</b> <br>
            You have Requested balance amounting '.$amount.' for Withdrawal. 
        </h1>
    </div>
    <div style="width:460px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
             
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Request Date:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$txndetails['request_on'].'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Payment Method:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$txndetails['payment_method'].'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">From Wallet:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$wallet.'</b></td>
            </tr>
			
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Amount Transfered:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$amount.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Zara Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$zarawallet.'</b></td>
            </tr>
           
		   <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Reward Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$reward_wallet.'</b></td>
            </tr>
			 <tr>
                <td style="width:50%;padding:5px;font-size:20px; color:#fff; text-align:right;">Cash Wallet Balance:</td>
                <td style="padding:5px;font-size:24px; color:#3de1ff; text-transform:uppercase;"><b>'.$cash_wallet.'</b></td>
            </tr>
			
        </table>
    </div>
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <img src="https://zaraad.com/images/mailer-text.png" alt="">
    </div>
    <div style="width:500px;margin:0 auto;padding:0 20px 20px;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px; text-align:right;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/andriod.png"></a>
                </td>
                <td style="padding:5px;">
                    <a href="https://zaraad.com" target="_blank"><img src="https://zaraad.com/images/ios.png">
                    </a>
                </td>
            </tr>
        </table>
    </div>
	
	';	
$body.=mail_footer();
return $body;	
}


function siteMail($to,$subject,$message,$cc="",$bcc="",$success="",$fail="")
{ 
	$mail=new PHPMailer();
	$toemail=$to;
	//$success="registration.php";
	$from = SITE_MAIL_ADDRESS;
		$subject1=$subject;
		$subject = $subject;
		$mail->IsSMTP();
	try 
	{
		$mail->Host				=	MAILR;				//	SMTP server
		$mail->SMTPDebug		=	0;								//	Enables SMTP debug information (for testing)
		$mail->SMTPAuth			=	true;							//	Enable SMTP authentication
		$mail->Host				=	MAILR;				//	Sets the SMTP server
		$mail->Port				=	25;							//	Set the SMTP port for the GMAIL server
		$mail->Username			=	SITE_MAIL_ADDRESS;			//	SMTP account user-name
		$mail->Password			=	MAILRPASS;					//	SMTP account password
        $mail->AddAddress($toemail);
		if($cc!="")
		$mail->AddCC($cc);
		if($bcc!="")
		$mail->AddBCC($bcc);
		$mail->SetFrom($from, $subject1);
		$mail->AddReplyTo($from, $subject1);
		$mail->Subject = $subject;
		$mail->AltBody = 'Please Use HTML Compatible Email Viewer!';	
		$mail->MsgHTML($message);
		$mail->Send();
		if($success!="")
		{
			$_SESSION['msg']="Thank you for Registration.";	
			header("location:".$success."");
		}
	} 
	catch (phpmailerException $e) 
	{
		 $e->errorMessage(); 
        $err=$e->errorMessage();
		if($fail!="")
		{
			$_SESSION['msg']="Please try again later";
			header("location:".$success."");
		}
        
	}
}

function TotalLeftDownlineVolume($username){
global $obj;
$lefttotal=$obj->selectData(TREE_BINARY_TRANSACTION,"SUM(day_left_business)  counter ","username='".$username."'",1);

return $lefttotal['counter'];
}

function TotalRightDownlineVolume($username){
global $obj;
$righttotal=$obj->selectData(TREE_BINARY_TRANSACTION,"SUM(day_right_business)  counter","username='".$username."'",1);

return $righttotal['counter'];

}
function TodaysLeftDownlineVolume($username){
global $obj;
$date=date("Y-m-d");
$lefttotal=$obj->selectData(TREE_BINARY_TRANSACTION,"SUM(day_left_business)  counter ","username='".$username."' and date='".$date."'",1);

return $lefttotal['counter'];
}

function TodaysRightDownlineVolume($username){
global $obj;
$date=date("Y-m-d");
$righttotal=$obj->selectData(TREE_BINARY_TRANSACTION,"SUM(day_right_business)  counter","username='".$username."' and date='".$date."'",1);

return $righttotal['counter'];

}
function TotalLicence($username){
global $obj;
$date=date("Y-m-d");
$total=$obj->selectData(TABLE_PACKAGE,"SUM(package_qty)  counter","username='".$username."'",1);

return $total['counter'];

}

function resizeImage($image,$width,$height,$scale) {
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$image,90);
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	/*$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$thumb_image_name,90);
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;*/
	$newImageWidth = $width;
	$newImageHeight = $height;
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$thumb_image_name,90);
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
/*function resizeOrgThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$thumb_image_name,90);
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}*/

function resizeOrgThumbnailImage($source,$destination,$thumb_width)
{
	$size=getimagesize($source);
	$width=$size[0];
	$height=$size[1];
	$x=0;
	$y=0;
	if($width>$height)
	{
		$x=ceil(($width-$height)/2);
		$width=$height;
	}
	elseif($height>$width)
	{
		$y=ceil(($height-$width)/2);
		$height=$width;
	}
	$new_image=imagecreatetruecolor($thumb_width,$thumb_width) or die("cannot initialize GD");
		$image=imagecreatefromjpeg($source);
	
	imagecopyresampled($new_image,$image,0,0,0,0,$thumb_width,$thumb_width,$width,$width);
		imagejpeg($new_image,$destination);
	
	chmod($destination, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}
function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) { 
		   list($width, $height) = getimagesize($SourceFile);
		   $image_p = imagecreatetruecolor($width, $height);
		   $image = imagecreatefromjpeg($SourceFile);
		   imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
		   $black = imagecolorallocate($image_p, 241, 240, 240);
		   $font = 'arial.ttf';
		   $font_size = 30; 
		   imagettftext($image_p, $font_size, 360, 10, ($height-10), $black, $font, $WaterMarkText);
		   if ($DestinationFile<>'') {
			  imagejpeg ($image_p, $DestinationFile, 100); 
		   } else {
			  header('Content-Type: image/jpeg');
			  imagejpeg($image_p, null, 100);
		   };
		   imagedestroy($image); 
		   imagedestroy($image_p); 
	}
	
	
 

	function watermarkImageThumb ($SourceFile, $WaterMarkText, $DestinationFile) { 
		   list($width, $height) = getimagesize($SourceFile);
		   $image_p = imagecreatetruecolor($width, $height);
		   $image = imagecreatefromjpeg($SourceFile);
		   imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
		   $black = imagecolorallocate($image_p, 241, 240, 240);
		   $font = 'arial.ttf';
		   $font_size = 8; 
		   imagettftext($image_p, $font_size, 90, ($width-10), ($height-10), $black, $font, $WaterMarkText);
		   if ($DestinationFile<>'') {
			  imagejpeg ($image_p, $DestinationFile, 100); 
		   } else {
			  header('Content-Type: image/jpeg');
			  imagejpeg($image_p, null, 100);
		   };
		   imagedestroy($image); 
		   imagedestroy($image_p); 
	}
function create_watermark($source_file_path, $output_file_path)
{
    list($source_width, $source_height, $source_type) = getimagesize($source_file_path);
    if ($source_type === NULL) {
        return false;
    }
    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_file_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_file_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_file_path);
            break;
        default:
            return false;
    }
    $overlay_gd_image = imagecreatefrompng(WATERMARK_OVERLAY_IMAGE);
    $overlay_width = imagesx($overlay_gd_image);
    $overlay_height = imagesy($overlay_gd_image);
    imagecopymerge(
        $source_gd_image,
        $overlay_gd_image,
        $source_width - $overlay_width,
        $source_height- $overlay_height,
        0,
        0,
        $overlay_width,
        $overlay_height,
        WATERMARK_OVERLAY_OPACITY
    );
    imagejpeg($source_gd_image, $output_file_path, WATERMARK_OUTPUT_QUALITY);
    imagedestroy($source_gd_image);
    imagedestroy($overlay_gd_image);
}

function CreateProductCode()
{
	global $obj;
	$data=$obj->selectData(TABLE_PRODUCT,"id,product_code"," status<>'Deleted' order by id desc limit 0,1",1);
	if($data['id']=="")
		$ret="5001";
	else
	{
		$ret=$data['id']+5000+1;
	}
	$output="PR".$ret;
return $output;
}

function GetcategorynameById($cat_id)
{
	global $obj;
	$data=$obj->selectData(TABLE_CATEGORY,"title","id='".$cat_id."' AND status='Active'",1);
	
	return $data['title'];

}


function GenerateContactEmailTemplate($name,$email_id,$phone,$message)
{
	global $obj;
	$body="";
	//$body.=mail_head();
	$body.='
   
    <div style="width:500px;margin:0 auto;padding:20px;background:#fff;text-align:center;">
        <h1 style="font-size:30px; font-family:Arial; color:#555; font-weight:normal;">
            <b style="color:#000;">Basu Travels</b> <br>
        </h1>
		<h4> Plan Trip Email</h4>
    </div>
    <div style="width:600px; margin:0 auto;font-family:Arial; padding:40px 20px; background:#3e385e;">
        <table style="width:100%;">
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Full Name :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$name.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Email :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$email.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Address :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$address.'</b></td>
            </tr>
            <tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Phone :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$phone.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Address :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$address.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Date of Journey :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$date_of_journey.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Adult :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$adult.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Child5-10 yr :</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$child5.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">No of Child3-5 yr:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$child3.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Enquiry Regarding:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$message.'</b></td>
            </tr>
			<tr>
                <td style="width:50%;padding:5px;font-size:18px; color:#fff; text-align:right;">Your Message:</td>
                <td style="padding:5px;font-size:18px; color:#3de1ff;"><b>'.$message1.'</b></td>
            </tr>
        </table>
    </div>
    
		';	
//$body.=mail_footer();
return $body;	
}


?>