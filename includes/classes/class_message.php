<?
//////////////////////////////
//Message class 			//
//Developed by Kaustav Ghosh//
//www.sleekinfosolutions.com//
//////////////////////////////
/* 
Description:This Message class we have write for showing our mesages.The messages may be success or error messages.
*/
class Message
{
	var $sessionName="SESSION__MESSAGE";
    var $arrMsg=array();
	var $arrMsgType=array();
	var $msgPlace='';
	var $type="";
	function Message($clearSession=1)
	{
		if(isset($_SESSION[$this->sessionName]) && !empty($_SESSION[$this->sessionName]))
		{
			$tmpMsgObj=unserialize($_SESSION[$this->sessionName]);
			$this->arrMsg=$tmpMsgObj->arrMsg;
			$this->arrMsgType=$tmpMsgObj->arrMsgType;
			$this->msgPlace=$tmpMsgObj->msgPlace;
			if($clearSession)
			{
				$this->clearSessionMsg();
			}
		}
		else 
		{
			$this->arrMsg=array();
			$this->arrMsgType=array();
			$this->msgPlace='';
		} 
	}
	/* 
	Description:This function used to add messages.
	Ex: addMsg("Data successfully inserted.");
	Ex: addMsg("Operation cannot be performed.",'error');
	*/
	function addMsg($msg,$type='success')	
    {
		if(!empty($msg))
		{
			if(!in_array($msg,$this->arrMsg))
			{
				array_push($this->arrMsg,$msg);
				array_push($this->arrMsgType,$type);
			}
		}
	}
	/* 
	Description:This function used to clear the messages from the message array.
	*/
	function clearMsg()
    {
		$this->arrMsg=array();
		$this->arrMsgType=array();
	}
	/* 
	Description:This function used to place the messages in a perticular place.
	*/
	function placeMsg($place)
	{
		$this->msgPlace=$place;
	}
	/* 
	Description:This function used to clear SESSION of message.
	*/
	function clearSessionMsg()
    {
		session_unregister($this->sessionName);
	}
	/* 
	Description:This function used to count the messages from the message array.
	*/	
	function countMsg()
	{
		return count($this->arrMsg);
	}
	/* 
	Description:This function used to display the messages.
	*/
	function showMsg($getReturn=0)
    {
		if($getReturn)
		{
			$msgarr['msg'][]=$this->arrMsg;
			$msgarr['type'][]=$this->arrMsgType;
			return $msgarr;
		}
		$str="";
		$msgCount=$this->countMsg();
		if ($msgCount > 0)
		{
			$str.='<div class="message-box">';
			for($i=0;$i<$msgCount;$i++)
			{
				$str.='<div class="' .$this->arrMsgType[$i] .'-box">' .$this->arrMsg[$i]. '</div>';
			}
			$str.='</div>';
		}
		return $str;
	}
	/* 
	Description:This function used to save the messages.
	*/
	function saveMsg()
	{
		$_SESSION[$this->sessionName]=serialize($this);		
	}
}
?>