<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
try {
	require("../conn.php");
	$tag=$_POST["tag"];
	if($tag=="1"){
		require("../data/bdsh.php");
	}
	else if($tag=="2"){
		require("../data/wdsh.php");
	}
	else{}
	
	for($i=0;$i<=1;$i++){
		if($i===0){
			$mobPhone=$Phone[0];
//			echo $mobPhone;
		}
		else{
			$mobPhone=$Phone[1];
//			echo $mobPhone;
		}
    //$client = new SoapClient(null,
   //     array('location' =>"http://sms3.mobset.com:8080/Api",'uri' => "http://localhost:82/")
    //);
    $sql="select * from 短信接口 where id='1'";
    $result = $conn->query($sql);
	while($row=$result->fetch_assoc()) {
		$wsdl =$row['服务器地址'];
		$lCorpID =$row['企业id'];
   		$strLoginName=$row['登录用户'];
		$strPasswd=$row['密码'];
	}
	
    
    
//	$wsdl =$_POST['serverIP'];
	//"http://sms3.mobset.com:8080/Api?wsdl";
    $client = new SoapClient($wsdl);
	$client->soap_defencoding = 'utf-8';
    $client->decode_utf8 = false;
    $errMsg="";
    $strSign="";
	$addnum="";
	$timer="";
//	$lCorpID =$_POST['CorpID'];
//  $strLoginName=$_POST['LoginName'];
//	$strPasswd=$_POST['pwd'];
//	$mobPhone=$_POST['mobPhone']; 在wdsh.php定义
	$smsContent=$_POST['smsContent'];
	$longSms=0;
	$strTimeStamp=GetTimeString();
	$strInput=$lCorpID.$strPasswd.$strTimeStamp;
	$strMd5=md5($strInput);
    $groupId=$client->ArrayOfSmsIDList[1];
	print_r($groupId);
	$group=$client-> ArrayOfMobileList[1];
	$group[0] =$client->MobileListGroup;
    $group[0]->Mobile = $mobPhone;
	
	$param = array('CorpID'=>$lCorpID,'LoginName'=>$strLoginName,'Password'=>$strMd5,'TimeStamp'=>$strTimeStamp,'AddNum'=>$addnum,'Timer'=>$timer,'LongSms'=>$longSms,'MobileList'=>$group,
	'Content'=>$smsContent);
	$result = $client->Sms_Send($param);
	//print_r($result);
	print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
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