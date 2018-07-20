<?php
	//引入连接数据库文件
	require("../conn.php");
//		$sjc=$_POST["sjc"];
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
//		echo "$hyzt";
//  $time=getdate();
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//创建会员标记码↓
$old="";
$sqli="select 会员标记码 from 本地会员  order by 会员标记码 DESC limit 1 ";
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
        

//创建会员标记码↑

$sql = "INSERT INTO 本地会员(登记日期,会员编号,企业名称,企业地址,邮政编号,企业网址,电子邮箱,工商注册号,注册资金,资质证书编号,主项资质,副项资质,企业法人,企业电话,企业传真号码,董事长,董事长联系电话,董事长手机号码,总经理,总经理联系电话,总经理手机号码,联系人,联系人职务,联系人手机号码,会员状态,会员标记码,会员名称) values ('$djrq2','$hybh2','$qymc2','$qydz2','$yzbh2','$qywz2','$dzyx2','$gszch2','$zczj2','$zzzsbh2','$zxzz2','$fxzz2','$qyfr2','$qydh2','$czhm2','$dsz2','$dszlxdh2','$dszsjhm2','$zjl2','$zjllxdh2','$zjlsjhm2','$lxr2','$zw2','$lxrsjhm2','$hyzt2','$new','$bdhymc')";
//$sql = "select * from 工程组维护  where id='$cddid'";
//	$result = $conn->query($sql);
//	$sqli = "update 工程组维护 set 工程组='$gcz',组长姓名='$xm',手机='$sj' where id ='$gcid1'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>
<script type="text/javascript">
  window.history.go(-1);
</script>