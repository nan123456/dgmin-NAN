<!DOCTYPE html>
<?php
      session_start();
?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
  </head>
<body>
<?php
	//引入连接数据库文件
	 
	require("../conn.php");
    $ymm=$_POST["ymm"];
    $qrmm=$_POST["qrmm"];
    $passw=$_POST["passw"];
    $yhtag = $_SESSION["yhtag"];
	
    $sql = "select * from 个人信息  where 会员标记码='$yhtag' ";
		$result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {	
		          $mima=$row["密码"]	;	  }   
	
	$sqli = "update 个人信息 set 密码='$passw' where 会员标记码='$yhtag'";

if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
try {
	require("../conn.php");
	$yhtag = $_SESSION["yhtag"];
	 $mobPhone='';
$a=substr($yhtag, 0,1); 
	 if($a=="1"){
	 $sql1 = "select * from 本地会员  where 会员标记码='$yhtag' ";
		$result1 = $conn->query($sql1);
	    while($row = $result1->fetch_assoc()) {
	    $mobPhone=$row["联系人手机号码"]	;
//		return $mobPhone;	
	    }		
	 }
	else if($a=="2"){
	 $sql1 = "select * from 外地会员  where 会员标记码='$yhtag' ";
		$result1 = $conn->query($sql1);
	    while($row = $result1->fetch_assoc()) {
	    $mobPhone=$row["联系人手机号码"]	;
//			return $mobPhone;	
	    }		
	 }
	else if($a=="3"){
		$sql1 = "select * from 项目申报  where 会员标记码='$yhtag' ";
		$result1 = $conn->query($sql1);
	    while($row = $result1->fetch_assoc()) {
	    $mobPhone=$row["手机"]	;	
//		return $mobPhone;
	    }	
	}	
	
	$fsyzmm="新密码为：   $qrmm";
			echo $mobPhone;
	
    //$client = new SoapClient(null,
   //     array('location' =>"http://sms3.mobset.com:8080/Api",'uri' => "http://localhost:82/")
    //);
    $sql2="select * from 短信接口 where id='1'";
    $result2 = $conn->query($sql2);
	while($row=$result2->fetch_assoc()) {
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
	$smsContent=$fsyzmm;
//	echo $smsContent;
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
	$result2 = $client->Sms_Send($param);
	//print_r($result);
	print_r($result2->ErrMsg."--短信ID:".$result2->SmsIDList->SmsIDGroup->SmsID);
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

$conn->close();	
	exit;


?>

  </body>
</html>

