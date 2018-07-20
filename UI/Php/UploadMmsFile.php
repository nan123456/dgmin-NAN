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
	$strTimeStamp=GetTimeString();
	$Title=$_POST['mmsTitle'];
	$smailType=0;
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
	$strFrame=$_POST['txtframe'];
	$strFrame=rtrim($strFrame, ';');
	$Frame = explode(';',$strFrame); 
	$arrFileGroup= $client->ArrayOfMmsFileGroup[count($Frame)];
	for($index=0;$index<count($Frame);$index++){ 
	 $arrFileGroup[$index]=$client->MmsFileGroup;
     $strFile=explode(',',$Frame[$index]);
	 if($strFile[0]!="")
	 { 
	    //$fileName=iconv('utf-8', 'gb2312//IGNORE',$strFile[0]);
		//$fileName=$strFile[0];
		$fileName=autoiconv($strFile[0], 'gb2312//IGNORE');
		$sInfo=GetTxtString($fileName);  
		$sInfo=iconv('gb2312', 'utf-8', $sInfo);
	    $arrFileGroup[$index]->PlayTime=30;
	    $arrFileGroup[$index]->Text_FileName= $fileName;
		$arrFileGroup[$index]->Text_Content=$sInfo;
	 }
	 if($strFile[1]!="")
	 {
	    $fileName=iconv('utf-8', 'gb2312//IGNORE', $strFile[1]);
	    //$fileName=autoiconv($strFile[1], 'gb2312//IGNORE');
	    $arrFileGroup[$index]->PlayTime=30;
	    $arrFileGroup[$index]->Image_FileName=$fileName;
		$arrFileGroup[$index]->Image_FileData=GetFileData($fileName);   
	 }
	  if($strFile[2]!="")
	  {
	    $fileName=iconv('utf-8', 'gb2312//IGNORE',$strFile[2]);
		//$fileName=autoiconv($strFile[2], 'gb2312//IGNORE');
		//$fileName=$strFile[2];
	    $arrFileGroup[$index]->PlayTime=30;
	    $arrFileGroup[$index]->Audio_FileName= $fileName;
		$arrFileGroup[$index]->Audio_FileData=GetFileData($fileName);   
	  }
	 $param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'Subject'=>$Title,'SmilType'=>$smailType
	 ,'MmsFileList'=>$arrFileGroup);
	  $result=$client->Mms_UpFile($param);
	  print_r($result->ErrMsg."--彩信ID:".$result->MmsFileID);
    } 
	
	 //$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'Subject'=>$Title,'SmilType'=>$smailType
	 //,'MmsFileList'=>$arrFileGroup);
	  //$result=$client->Mms_UpFile($param);
	 // print_r($result);
	 
	//$group=$client-> ArrayOfMobileList[1];
	//$group[0] =$client->MobileListGroup;
    //$group[0]->Mobile = $mobPhone;
	
	//$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp);
	//$result = $client->Sms_GetRecv($param);
	//print_r($result);
	
    //$smsRecv=$result->SmsRecvList->SmsRecvGroup->Content;
	//for($i=0;$i<20;$i++)
	//{
	//if($result->SmsRecvList->SmsRecvGroup[$i]->Mobile!="")
	//{
	// $info="回复手机：".$result->SmsRecvList->SmsRecvGroup[$i]->Mobile."-接收号码：".$result->SmsRecvList->SmsRecvGroup[$i]->RecvNum."-扩展号："
	 //.$result->SmsRecvList->SmsRecvGroup[$i]->AddNum."-接收时间：".$result->SmsRecvList->SmsRecvGroup[$i]->RecvTime."-内容：".$result->SmsRecvList->SmsRecvGroup[$i]->Content."<br />";
	 //print_r($result->SmsRecvList->SmsRecvGroup[$i]->Content);
	 //print_r($info);
	// }
	 //else
	 //{
	// break;
	 //}
	
	//}
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

function GetFileData($fileName)
{
   //$handle = fopen ($fileName, "rb");
   //$contents = fread ($handle, filesize ($file));
   //$fileData=base64_encode($contents);
  // return $contents;
  $fp = fopen($fileName, 'rb');
  $content = fread($fp, filesize($fileName)); //二进制数据
  fclose($fp);
  return  $content;
}
function GetTxtString($fileName)
{
  $fp=fopen($fileName,'r');
  $recordstr="";
  while(!feof($fp))
  {
     $buffer=fgets($fp);
	 $recordstr=$recordstr.$buffer;
  }
  fclose($fp);
  return $recordstr;
}
/*
@params $str 输入字符 $type 所需获取编码
@author 长行
*/
function autoiconv($str,$type){
$utf32_big_endian_bom = chr(0x00) . chr(0x00) . chr(0xfe) . chr(0xff);
$utf32_little_endian_bom = chr(0xff) . chr(0xfe) . chr(0x00) . chr(0x00);
$utf16_big_endian_bom = chr(0xfe) . chr(0xff);
$utf16_little_endian_bom = chr(0xff) . chr(0xfe);
$utf8_bom = chr(0xef) . chr(0xbb) . chr(0xbf);
$first2 = substr($str, 0, 2);
$first3 = substr($str, 0, 3);
$first4 = substr($str, 0, 3);
if ($first3 == $utf8_bom) $icon = 'utf-8';
elseif ($first4 == $utf32_big_endian_bom) $icon = 'utf-32be';
elseif ($first4 == $utf32_little_endian_bom) $icon = 'utf-32le';
elseif ($first2 == $utf16_big_endian_bom) $icon = 'utf-16be';
elseif ($first2 == $utf16_little_endian_bom) $icon = 'utf-16le';
else { $icon = 'ascii'; return $str;}
return iconv($icon,$type,$str);
}
?> 
