<?php
require("conn.php");
$tag="";
$dyhytag=$_POST["dyhytag"];
$tag=explode("h",$dyhytag);
if($tag[0]=="1"){
	$sql = "select * from 本地会员  where 会员标记码='".$dyhytag."'";
	$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {	
 	$V1=$row["登记日期"];
 	$V2=$row["会员编号"];	
 	$V3=$row["企业名称"];	
 	$V4=$row["企业地址"];	
 	$V5=$row["邮政编号"];	
 	$V6=$row["企业网址"];	
 	$V7=$row["电子邮箱"];	
 	$V8=$row["工商注册号"];	
 	$V9=$row["注册资金"];	
 	$V10=$row["资质证书编号"];	
 	$V11=$row["主项资质"];	
 	$V12=$row["副项资质"];	
 	$V13=$row["企业法人"];	
 	$V14=$row["企业电话"];	
 	$V15=$row["企业传真号码"];	
 	$V16=$row["董事长"];
 	$V17=$row["董事长联系电话"];	
 	$V18=$row["董事长手机号码"];	
 	$V19=$row["总经理"];	
 	$V20=$row["总经理联系电话"];	
 	$V21=$row["总经理手机号码"];	
 	$V22=$row["联系人"];	
 	$V23=$row["联系人职务"];	
 	$V24=$row["联系人手机号码"];		
									}
    $conn->close();
    require_once 'PHPWord.php';
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('hyrhdata/bendi.docx');
//print_r($document);
$document->setValue('V1',$V1);
$document->setValue('V2',$V2);
$document->setValue('V3',$V3);
$document->setValue('V4',$V4);
$document->setValue('V5',$V5);
$document->setValue('V6',$V6);
$document->setValue('V7',$V7);
$document->setValue('V8',$V8);
$document->setValue('V9',$V9);
$document->setValue('V10',$V10);
$document->setValue('V11',$V11);
$document->setValue('V12',$V12);
$document->setValue('V13',$V13);
$document->setValue('V14',$V14);
$document->setValue('V15',$V15);
$document->setValue('V16',$V16);
$document->setValue('V17',$V17);
$document->setValue('V18',$V18);
$document->setValue('V19',$V19);
$document->setValue('V20',$V20);
$document->setValue('V21',$V21);
$document->setValue('V22',$V22);
$document->setValue('V23',$V23);
$document->setValue('V24',$V24);
$save=$dyhytag."_bendi.docx";
//echo $sql."\n".$V1.$V2.$V3;
$document->save("hyrhdata/".$save);
//$document->save("hyrhdata/1234_bendi.docx");


}

else{
	$sql = "select * from 外地会员  where 会员标记码='".$dyhytag."'";
	$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {	
 	$V1=$row["申请单位名称"];
 	$V2=$row["驻莞详细地址"];	
 	$V3=$row["邮政编号"];	
 	$V4=$row["办公电话"];	
 	$V5=$row["传真电话"];	
 	$V6=$row["企业邮箱"];	
 	$V7=$row["主项资质"];	
 	$V8=$row["副项资质"];	
 	$V9=$row["发证部门"];	
 	$V10=$row["资质证书编号"];	
 	$V11=$row["法定代表人"];	
 	$V12=$row["驻莞营业执照编号"];	
 	$V13=$row["企业驻莞负责人"];	
 	$V14=$row["负责人办公电话"];	
 	$V15=$row["企业通讯员"];	
 	$V16=$row["通讯员办公电话"];	
 	$V17=$row["意见"];
 	$V18=$row["驻莞手机号码"];	
 	$V19=$row["通讯员手机号码"];		
									}
    $conn->close();

 
require_once 'PHPWord.php';
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('hyrhdata/waidi.docx');
//print_r($document);
$document->setValue('V1',$V1);
$document->setValue('V2',$V2);
$document->setValue('V3',$V3);
$document->setValue('V4',$V4);
$document->setValue('V5',$V5);
$document->setValue('V6',$V6);
$document->setValue('V7',$V7);
$document->setValue('V8',$V8);
$document->setValue('V9',$V9);
$document->setValue('V10',$V10);
$document->setValue('V11',$V11);
$document->setValue('V12',$V12);
$document->setValue('V13',$V13);
$document->setValue('V14',$V14);
$document->setValue('V15',$V15);
$document->setValue('V16',$V16);
$document->setValue('V17',$V17);
$document->setValue('V18',$V18);
$document->setValue('V19',$V19);
$save=$dyhytag."_waidi.docx";
$document->save("hyrhdata/$save");
}

?>
