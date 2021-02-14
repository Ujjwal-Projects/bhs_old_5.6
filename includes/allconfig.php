<?php
define('SITE_NAME','behalahighschool.com');
define('SITE_TITLE','BHS');
define('SITE_NAME_FULL','www.'.SITE_NAME);
define('TPRE','bhs_');
//Table Defination

//admin
define('TABLE_ADMIN',TPRE.'admin');
define('TABLE_NOTICE',TPRE.'notice');
define('TABLE_GALARY',TPRE.'galary');
define('TABLE_MESSAGE',TPRE.'message');
define('TABLE_MATERIAL',TPRE.'study_materials');
define('TABLE_USER',TPRE.'user');





//PATH
define('ADMIN','master/');
define('INCLUDES','includes/');
define('CLASSES','classes/');
//define('JS','includes/js/');
define('CSS','css/');
//define('CSSA','css/');
//user deffine
define('NOTICE','notice_img');
define('MATERIAL','material');
define('GALARY','galary');
//define('FATHER','image/father');
//define('MOTHER','image/mother');

define('HOME','home/');
//File Name
define('NOT_FOUND_IMG','no_image.gif');
//Messages
define('TODATE',date("Y-m-d"));
//Site page titles

define('ADMIN_TITLE','Admin panel '.SITE_NAME);
define('FRONT_TITLE','Welcome to Our Site');

// Mail addresses


//  miscellinous  ///


define("TIME",time());
define("DAY",date('d',TIME));
define("MONTH",date('F',TIME));
define("YEAR",date('Y',TIME));
define('DATE_FORMAT','Y-m-d');

//define('CURRENT_DATE_TIME',date("Y-m-d h:i:s"));
//define('LICENSE','2018-3-15 00:00:00');

define('ADMIN_LOGO','<h1><img src="../images/logo.png" alt="" /></h1>');//define('ADMIN_LOGO','<img src="images/logo.png" border="0">');
define('CURRENCY','$');
define('FIELD_MAX_LENGTH',20);

// eof miscellinous //
define("PRELOAD_IMAGES","'images/home_hover.jpg','images/about_us_hover.jpg','images/top_rated_hover.jpg','images/most_viewed_hover.jpg','images/faqs_hover.jpg','images/teds_studies_hover.jpg','images/contact_us_hover.jpg'");
define('PASSWORD_MISMATCH','Given Password Mismatched, Please! try again');
define('REGISTER_SUCCESS',"Thank you for registering");
define('LOGIN_SUCCESS',"You have logged in successfully");
define('LOGOUT_SUCCESS',"You have logged out successfully");
// text defines //
/*
define('FOOTER_TEXT','Copyright © '.YEAR.' '.SITE_NAME_FULL.' All Rights Reserved.');
define('INVALID_LOGIN','Username not exist');

define('PASSWORD_CMISMATCH','Confirm Password mismatched');
define('PASSWORD_VMISMATCH','new passwords do not match');
define('EMAIL_MISMATCH','Email you entered does not match');
define('UPDATE_SUCCESSFULL','Updated successfully');
define('DELETE_SUCCESSFULL','Deleted successfully');
define('ADD_SUCCESSFULL','Successfully added');
define('ADD_SAVED','Successfully Saved');
define('ADD_PASSSAVED','Password Changed Successfully');
define('UPLOAD_SUCCESSFULL','File uploaded successfully');
define('HIDE_SUCCESSFULL','Now Your profile is Hidden from others users');
define('UNHIDE_SUCCESSFULL','Now Your profile is Visible for all users');
define('USER_ADDED','New user added');
define('EMAIL_USED','Email address already used');
define('EMAIL_USED_REGISTER','This email id is currently register with us. Please use a different email id. If you are a existing customer, please login to continue');
define('USER_EXIST','Username already taken');
define('EMAIL_EXIST','Email already Exist');

define('PASSWORD_CHANGED',"Your password has been changed successfully");
define('PASSWORD_SENT',"Your password sent successfully to your email address");
define('IMAGE_SIZE',"Image size must be 614X428");
define('COMMENT_POSTED',"Thank you for your comment, it will be reviewed by admin and will be posted soon.");
define('MESSAGE_SUCCESS',"Message has been sent successfully.");
define('PAGE_TITLE',"bhabimatch.com");
define('ABOUT_APPROVE',"your updates have been sent to be approved");
define('FAIL',"Try again later");
// eof text defines //

// limit defines //
define('NO_OF_IMAGE_ALLOWED',15);
define('NO_OF_MUSIC_ALLOWED',5);
define('NO_OF_VIDEO_ALLOWED',5);
// eof limit defines //
*/
// defined arrays	//
$image_extensions= array("jpg","jpeg","gif","bmp","tif","png");
global $image_extensions;

$flash_extensions= array("swf");
global $flash_extensions;

$pdf_extensions= array("pdf");
global $pdf_extensions;

$audio_extensions= array("mp3");
global $audio_extensions;

$video_sites=array("youtube"=>"YouTube","vimeo"=>"Vimeo");
global $video_sites;

$attachfile_extensions= array("jpg","jpeg","gif","bmp","tif","png","pdf","doc","docx","xls","zip","rar");
global $attachfile_extensions;

$language=array("en","fr","nl","de");
global $language;

$buy_pref_opt=array("1"=>"Most Favorite","2"=>"Like them","3"=>"Don't like them","4"=>"Least Favorite");
global $buy_pref_opt;

$session=session_id();
// eof defined arrays	//

date_default_timezone_set("Asia/Calcutta");
?>
