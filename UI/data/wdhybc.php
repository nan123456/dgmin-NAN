<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
        $wdhymc='外地会员';
        $dwmc3=$_POST["dwmc3"];
		$wdhybh3=$_POST["wdhybh3"];
	    $xxdz3=$_POST["xxdz3"];
	    $yzbh3=$_POST["yzbh3"];
	    
	    $czdh3=$_POST["czdh3"];
	    $qyyx3=$_POST["qyyx3"];
	    $zzzsbh3=$_POST["zzzsbh3"];
	    $fzr3=$_POST["fzr3"];
	    $zxzz3=$_POST["zxzz3"];
	    $fxzz3=$_POST["fxzz3"];
	    $fddbr3=$_POST["fddbr3"];
	    $djrq3=$_POST["djrq3"];
		$qywz3=$_POST["qywz3"];
		$gszc3=$_POST["gszc3"];
		$zczj3=$_POST["zczj3"];
		$bgdh3=$_POST["bgdh3"];
		$zjl3=$_POST["zjl3"];
		$zjldh3=$_POST["zjldh3"];
		$zjlsj3=$_POST["zjlsj3"];
		$lxrzw3=$_POST["lxrzw3"];
	    $zgsjhm1=$_POST["zgsjhm1"];
	    $bgdh3=$_POST["bgdh3"];
	    $txy3=$_POST["txy3"];
	   
		$hyzt3=$_POST["hyzt3"];
		
		
		$txysjhm1=$_POST["txysjhm1"];
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//创建会员标记码↓
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
if($result1->fetch_assoc()){
	$result1 = $conn->query($sqli);
		while($row = $result1->fetch_assoc()){
				$a=$row["企业名称"];	
				if($dwmc3==$a){
			echo "<script>alert('企业已注册');</script>" ;
		    header("refresh:2;url=../hyzc.php");
			break;	
			}
			else
	    {
$sql="INSERT INTO 外地会员(登记日期,企业网址,工商注册号,注册资金,董事长,董事长联系电话,董事长手机号码,总经理,总经理联系电话,总经理手机号码,联系人职务,企业名称,企业地址,邮政编号,企业电话,企业传真号码,电子邮箱,资质证书编号,主项资质,副项资质,企业法人,联系人,会员状态,会员标记码,联系人手机号码,会员编号,会员名称) values ('$djrq3','$qywz3','$gszc3','$zczj3','$fzr3','$bgdh3','$zgsjhm1','$zjl3','$zjldh3','$zjlsj3','$lxrzw3','$dwmc3','$xxdz3','$yzbh3','$bgdh3','$czdh3','$qyyx3','$zzzsbh3','$zxzz3','$fxzz3','$fddbr3','$txy3','$hyzt3','$new','$txysjhm1','$wdhybh3','$wdhymc')";
if($conn->query($sql) === TRUE){
	echo "<script>alert('保存成功，等待管理员审核');</script>";
//	$jsonresult = "success";
	header("refresh:0;url=../login.php");
}
	    	break;}
				}$conn->close();
				}
?>
<script type="text/javascript">
  window.history.go(-1);
</script>