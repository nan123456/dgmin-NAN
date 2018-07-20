<?php
header("Content-Type: text/html;charset=utf-8");
try {
	$wsdl =$_POST['serverIP'];
    $client = new SoapClient($wsdl);
	$client->soap_defencoding = 'utf-8';
    $client->decode_utf8 = false;
	$lCorpID =$_POST['CorpID'];
    $strLoginName=$_POST['LoginName'];
	$strPasswd=$_POST['pwd'];
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp);
	$result = $client->Sms_GetReport($param);
	//print_r("获取状态报告成功！");
	//print_r($result->ArrayOfSmsReportList);
	//$result->ArrayOfSmsReportList
	foreach ($result->ArrayOfSmsReportList as $value) {
	    $info="短信ID：".$value->SmsID."-状态Code：".$value->Status."-状态时间："
	    .$value->ReportTime."<br />";
	    print_r($info);
	}
   
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
