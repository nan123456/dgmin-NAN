<?php
require("../conn.php");

	

        $wdhymc='外地会员';
        $dwmc3=$_POST["dwmc3"];//企业名称
	    $xxdz3=$_POST["xxdz3"];//企业地址
	    $yzbh3=$_POST["yzbh3"];//邮政编号
	    $czdh3=$_POST["czdh3"];//传真号码
	    $qyyx3=$_POST["qyyx3"];//电子邮箱
	    $zzzsbh3=$_POST["zzzsbh3"]; //资质证书编号
	    $zxzz3=$_POST["zxzz3"];//主项资质
	    $fxzz3=$_POST["fxzz3"];//副项资质
	    $fddbr3=$_POST["fddbr3"];//企业法人
	    $djrq3=$_POST["djrq3"];//登记日期
		$qywz3=$_POST["qywz3"];//企业网址
		$gszc3=$_POST["gszc3"];//工商注册号
		$zczj3=$_POST["zczj3"];//注册资金
		$dsz3=$_POST["dsz3"];//董事长
		$dszdh3=$_POST["dszdh3"];//联系电话
		$dszsj3=$_POST["dszsj3"];//手机号码
		$zjl3=$_POST["zjl3"];//总经理
		$zjldh3=$_POST["zjldh3"];//联系电话
		$zjlsj3=$_POST["zjlsj3"];//手机号码
		$lxrzw3=$_POST["lxrzw3"];//职务
	    $bgdh3=$_POST["bgdh3"];//企业电话
	    $txy3=$_POST["txy3"];//联系人
		$hyzt3=$_POST["hyzt3"];//会员状态
		$wdhybh3=$_POST["wdhybh3"];//外地会员编号
		$txysjhm1=$_POST["txysjhm1"];//手机号码
$upload_filedDir=$_POST["picture3"];
$upload_filedDir2=$_POST["picture5"];

if($dwmc3=="" or $xxdz3=="" or $yzbh3=="" or $czdh3=="" or $zzzsbh3=="" or $qyyx3=="" or $gszc3=="" or $zxzz3=="" or $fxzz3=="" or $djrq3=="" or $zczj3=="" or $qywz3=="" or $zzzsbh3=="" or $fddbr3=="" or $bgdh3=="" or $dsz3=="" or $zjl3=="" or $txy3=="" or $dszdh3=="" or $dszsj3=="" or $zjldh3=="" or $zjlsj3=="" or $lxrzw3=="" or $wdhybh3=="" or $txysjhm1=="")
{echo "<script>alert('请填写必填信息');</script>" ;
		    header("refresh:2;url=../hyzc.php");}
else {
$old="";
$sqli="select 会员标记码,企业名称 from 外地会员  order by 会员标记码 DESC limit 1 ";
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
	$new="2h".$oldf;
	$result1 = $conn->query($sqli);
	while($row = $result1->fetch_assoc()) {  
		$oldone=$row["会员标记码"];
	}
	if($new==$oldone)
	{continue;}
	else{break;}  
 }
}
else{$new="2h0000000";}
        
//附件
//$arr=array();
$result1 = $conn->query($sqli);	
$sql2 = "SELECT 企业名称 FROM 外地会员 where 企业名称= '".$dwmc3."'";
$result2 = $conn->query($sql2);
	if($result2->num_rows>0){
			echo "企业已注册" ;
		    header("refresh:2;url=../hyzc.php");
			}
			else
	    {
$sql="INSERT INTO 外地会员(登记日期,企业网址,工商注册号,注册资金,董事长,董事长联系电话,董事长手机号码,总经理,总经理联系电话,总经理手机号码,联系人职务,企业名称,企业地址,邮政编号,企业电话,企业传真号码,电子邮箱,资质证书编号,主项资质,副项资质,企业法人,联系人,会员状态,会员标记码,联系人手机号码,会员编号,工商营业执照,资质证书,会员名称) values ('$djrq3','$qywz3','$gszc3','$zczj3','$dsz3','$dszdh3','$dszsj3','$zjl3','$zjldh3','$zjlsj3','$lxrzw3','$dwmc3','$xxdz3','$yzbh3','$bgdh3','$czdh3','$qyyx3','$zzzsbh3','$zxzz3','$fxzz3','$fddbr3','$txy3','$hyzt3','$new','$txysjhm1','$wdhybh3','$upload_filedDir','$upload_filedDir2','$wdhymc')";
if($conn->query($sql) === TRUE){
	echo "<script>alert('保存成功，等待管理员审核');</script>";
//	$jsonresult = "success";
	echo "<script>alert('在桌面生成申报表');</script>";

    $V1=$djrq3;
 	$V2=$wdhybh3;	
 	$V3=$dwmc3;	
 	$V4=$xxdz3;	
 	$V5=$yzbh3;	
 	$V6=$qywz3;	
 	$V7=$qyyx3;	
 	$V8=$gszc3;	
 	$V9=$zczj3;	
 	$V10=$zzzsbh3;	
 	$V11=$zxzz3;	
 	$V12=$fxzz3;	
 	$V13=$fddbr3;	
 	$V14=$bgdh3;	
 	$V15=$czdh3;	
 	$V16=$dsz3;
 	$V17=$dszdh3;	
 	$V18=$dszsj3;	
 	$V19=$zjl3;	
 	$V20=$zjldh3;	
 	$V21=$zjlsj3;	
 	$V22=$txy3;	 
 	$V23=$lxrzw3;	
 	$V24=$txysjhm1;	
 	
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
$save=iconv("UTF-8", "GB2312//TRANSLIT","东莞建协外地会员申报表.docx");
   $document->save("C:/Users/Administrator/Desktop/".$save);
//$document->save("C:/Users/楠神/Desktop/".$save);
header("refresh:0;url=../login.php");
}
			break;
		}
	}
$conn->close();
?>



