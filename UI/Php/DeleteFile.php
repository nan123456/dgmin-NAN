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
  
	$lCorpID =$_POST['CorpID'];
    $strLoginName=$_POST['LoginName'];
	$strPasswd=$_POST['pwd'];
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $FileID=$_POST['FileID'];
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'TaskFileID'=>$FileID);
	$result = $client->Task_DelFile($param);
	print_r($result);
}
 catch (SoapFault $fault){
    echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
}
function GetFileData($fileName)
{
  $fp = fopen($fileName, 'rb');
  $content = fread($fp, filesize($fileName));
  fclose($fp);
  return  $content;
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
