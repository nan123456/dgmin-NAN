<?php
header("Content-Type: text/html;charset=utf-8");

try {
    
	$wsdl =$_POST['serverIP'];
	//"http://sms3.mobset.com:8080/Api?wsdl";
    $client = new SoapClient($wsdl);
	$client->soap_defencoding = 'utf-8';
    $client->decode_utf8 = false;
   
	$lCorpID =$_POST['CorpID'];
    $strLoginName=$_POST['LoginName'];
	$strPasswd=$_POST['pwd'];
	$mobPhone=$_POST['mobPhone'];
	$MmsFileID=$_POST['MmsFileID'];
	$longSms=0;
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $Priority=0;//0-100
	$AtTime="";
    $fileID=$_POST['FileID'];
	$group=$client-> ArrayOfMobileFileGroup[1];
	$group[0] =$client->MobileFileGroup;
	$group[0]->TaskFileType=1;//0单独号码，1号码文件
    $group[0]->TaskFileID =$fileID;
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'MmsFileID'=>$MmsFileID,'LongSms'=>$longSms,'Priority'=>$Priority,'AtTime'=>$AtTime,'MobileList'=>$group);
	$result = $client->Task_MmsSend($param);
	//print_r($result);
	print_r($result->ErrMsg."--彩信任务ID:".$result->TaskMmsID);

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
