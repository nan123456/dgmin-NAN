<?php
header("Content-Type: text/html;charset=utf-8");

try {
    //$client = new SoapClient(null,
   //     array('location' =>"http://sms3.mobset.com:8080/Api",'uri' => "http://localhost:82/")
    //);
	$wsdl =$_POST['serverIP'];
	//"http://sms3.mobset.com:8080/Api?wsdl";
    $client = new SoapClient($wsdl);
	$client->soap_defencoding = 'utf-8';
    $client->decode_utf8 = false;
    $errMsg="";
    $strSign="";
	$addnum="";
	$timer="";
	$lCorpID =$_POST['CorpID'];
    $strLoginName=$_POST['LoginName'];
	$strPasswd=$_POST['pwd'];
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $groupId=$client->ArrayOfSmsIDList[1];
	print_r($groupId);
	$group=$client-> ArrayOfMobileList[1];
	$group[0] =$client->MobileListGroup;
    $group[0]->Mobile = $mobPhone;
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp);
	$result = $client->Sms_GetRecv($param);
	//print_r($result);
	
    //$smsRecv=$result->SmsRecvList->SmsRecvGroup->Content;
	for($i=0;$i<20;$i++)
	{
	if($result->SmsRecvList->SmsRecvGroup[$i]->Mobile!="")
	{
	 $info="回复手机：".$result->SmsRecvList->SmsRecvGroup[$i]->Mobile."-接收号码：".$result->SmsRecvList->SmsRecvGroup[$i]->RecvNum."-扩展号："
	 .$result->SmsRecvList->SmsRecvGroup[$i]->AddNum."-接收时间：".$result->SmsRecvList->SmsRecvGroup[$i]->RecvTime."-内容：".$result->SmsRecvList->SmsRecvGroup[$i]->Content."<br />";
	 //print_r($result->SmsRecvList->SmsRecvGroup[$i]->Content);
	 print_r($info);
	 }
	 else
	 {
	 break;
	 }
	
	}
	//print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
	//print_r($result->SmsIDList);
	//print_r($result);
	//if($result->ErrCode==0)
	//{
	      //print_r($result->Sign+":"+$result->);
	//}
	//else
	//{
	   //print_r($result->ErrMsg);
	//}

}
 catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
function GetTimeString()
{
  date_default_timezone_set('Asia/Shanghai');
  $timestamp=time();
  $hours = date('H',$timestamp); 
  $minutes = date('i',$timestamp); 
  $seconds =date('s',$timestamp);
  $month = date('m',$timestamp);
  $day =  date('d',$timestamp);
  $stamp= $month.$day.$hours.$minutes.$seconds;
  return $stamp;
}
?> 