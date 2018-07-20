<?php
require("../conn.php");

	
        
        $bdhymc='本地会员';
        $djrq2=$_POST["djrq2"];
	    $hybh2=$_POST["hybh2"];
	    $qymc2=$_POST["qymc2"];
	    $qydz2=$_POST["qydz2"];
	    $yzbh2=$_POST["yzbh2"];
	    $qywz2=$_POST["qywz2"];
	    $dzyx2=$_POST["dzyx2"];
	    $gszch2=$_POST["gszch2"];
	    $zczj2=$_POST["zczj2"];
	    $zzzsbh2=$_POST["zzzsbh2"];
	    $zxzz2=$_POST["zxzz2"];
	    $fxzz2=$_POST["fxzz2"];
	    $qyfr2=$_POST["qyfr2"];
	    $qydh2=$_POST["qydh2"];
	    $czhm2=$_POST["czhm2"];
	    $dsz2=$_POST["dsz2"];
	    $dszlxdh2=$_POST["dszlxdh2"];
	    $dszsjhm2=$_POST["dszsjhm2"];
	    $zjl2=$_POST["zjl2"];
	    $zjllxdh2=$_POST["zjllxdh2"];
	    $zjlsjhm2=$_POST["zjlsjhm2"];
	    $lxr2=$_POST["lxr2"];
	    $zw2=$_POST["zw2"];
	    $lxrsjhm2=$_POST["lxrsjhm2"];
		$hyzt2=$_POST["hyzt2"];
//$fileInput=$_POST["fileInput"];
//$fileInput1=$_POST["fileInput1"];
$upload_filedDir=$_POST["picture"];
$upload_filedDir1=$_POST["picture1"];

if($djrq2=="" or $hybh2=="" or $qymc2=="" or $qydz2=="" or $yzbh2=="" or $qywz2=="" or $dzyx2=="" or $gszch2=="" or $zczj2=="" or $zzzsbh2=="" or $zxzz2=="" or $fxzz2=="" or $qyfr2=="" or $qydh2=="" or $czhm2=="" or $dszlxdh2=="" or $dszsjhm2=="" or $dsz2=="" or $zjl2=="" or $zjllxdh2=="" or $zw2=="" or $lxr2=="" or $lxrsjhm2 =="" or $hyzt2=="")
{ echo "<script>alert('请填写必填信息');</script>" ;
		    header("refresh:2;url=../hyzc.php");
		    }
else {
$old="";
$sqli="select 会员标记码,企业名称 from 本地会员  order by 会员标记码 DESC limit 1 ";
$result = $conn->query($sqli);
if($result->fetch_assoc()){
	for(;;){
	$result = $conn->query($sqli);
	while($row = $result->fetch_assoc()) {
		$old=$row["会员标记码"];
		
	}
	$old=explode("h",$old);
	$oldf=intval($old[1]+1);
	$oldf=sprintf("%07d",$oldf);
	$oldf=strval($oldf);
	$new="1h".$oldf;
	$result1 = $conn->query($sqli);
	while($row = $result1->fetch_assoc()) {
		$oldone=$row["会员标记码"];
	}
	if($new==$oldone)
	{continue;}
	else{break;}
 }
}
else{$new="1h0000000";}
       
//附件
//$arr=array();
$result1 = $conn->query($sqli);
	$sql2 = "SELECT 企业名称 FROM 本地会员 where 企业名称= '".$qymc2."'";
	$result2 = $conn->query($sql2);
	 	if($result2->num_rows>0){
			echo "<script>alert('企业已注册');</script>" ;
		    header("refresh:2;url=../hyzc.php");
			}
			else
	    {
	  $sql="INSERT INTO 本地会员(登记日期,会员编号,企业名称,企业地址,邮政编号,企业网址,电子邮箱,工商注册号,注册资金,资质证书编号,主项资质,副项资质,企业法人,企业电话,企业传真号码,董事长,董事长联系电话,董事长手机号码,总经理,总经理联系电话,总经理手机号码,联系人,联系人职务,联系人手机号码,会员状态,会员标记码,工商营业执照,资质证书,会员名称) values ('$djrq2','$hybh2','$qymc2','$qydz2','$yzbh2','$qywz2','$dzyx2','$gszch2','$zczj2','$zzzsbh2','$zxzz2','$fxzz2','$qyfr2','$qydh2','$czhm2','$dsz2','$dszlxdh2','$dszsjhm2','$zjl2','$zjllxdh2','$zjlsjhm2','$lxr2','$zw2','$lxrsjhm2','$hyzt2','$new','$upload_filedDir','$upload_filedDir1','$bdhymc')";
     if($conn->query($sql) === TRUE){
	echo "<script>alert('保存成功，等待管理员审核');</script>";
//	$jsonresult = "success";
echo "<script>alert('在桌面生成申报表');</script>";

    $V1=$djrq2;
 	$V2=$hybh2;	
 	$V3=$qymc2;	
 	$V4=$qydz2;	
 	$V5=$yzbh2;	
 	$V6=$qywz2;	
 	$V7=$dzyx2;	
 	$V8=$gszch2;	
 	$V9=$zczj2;	
 	$V10=$zzzsbh2;	
 	$V11=$zxzz2;	
 	$V12=$fxzz2;	
 	$V13=$qyfr2;	
 	$V14=$qydh2;	
 	$V15=$czhm2;	
 	$V16=$dsz2;
 	$V17=$dszlxdh2;	
 	$V18=$dszsjhm2;	
 	$V19=$zjl2;	
 	$V20=$zjllxdh2;	
 	$V21=$zjlsjhm2;	
 	$V22=$lxr2;	
 	$V23=$zw2;	
 	$V24=$lxrsjhm2;	
 	
require_once '../PHPWord.php';	
 	$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('../hyrhdata/bendi.docx');
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
$save=iconv("UTF-8", "GB2312//TRANSLIT","东莞建协本地会员申报表.docx");
   $document->save("C:/Users/Administrator/Desktop/".$save);
//$document->save("C:/Users/楠神/Desktop/".$save);
header("refresh:0;url=../login.php");	
}
	    	break;}
}
				
	$conn->close();			


?>



