<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");
	    $hyid=$_POST["hyid"];
	    $djrq=$_POST["djrq"];
	    $hybh=$_POST["hybh"];
	    $qymc=$_POST["qymc"];
	    $qydz=$_POST["qydz"];
	    $yzbh=$_POST["yzbh"];
	    $qywz=$_POST["qywz"];
	    $dzyx=$_POST["dzyx"];
	    $gszch=$_POST["gszch"];
	    $zczj=$_POST["zczj"];
	    $zzzsbh=$_POST["zzzsbh"];
	    $zxzz=$_POST["zxzz"];
	    $fxzz=$_POST["fxzz"];
	    $qyfr=$_POST["qyfr"];
	    $qydh=$_POST["qydh"];
	    $czhm=$_POST["czhm"];
	    $dsz=$_POST["dsz"];
	    $lxdh=$_POST["lxdh"];
	    $sjhm=$_POST["sjhm"];
	    $zjl=$_POST["zjl"];
	    $lxdh1=$_POST["lxdh1"];
	    $sjhm1=$_POST["sjhm1"];
	    $lxr=$_POST["lxr"];
	    $zw=$_POST["zw"];
	    $sjhm2=$_POST["sjhm2"];
		
		
	$sql = "select * from 本地会员  where id='$hyid'";
	$result = $conn->query($sql);
	$sqli = "update 本地会员 set 登记日期='$djrq',会员编号='$hybh',企业名称='$qymc',企业地址='$qydz',邮政编号='$yzbh',企业网址='$qywz',电子邮箱='$dzyx',工商注册号='$gszch',注册资金='$zczj',资质证书编号='$zzzsbh',主项资质='$zxzz',副项资质='$fxzz',企业法人='$qyfr',企业电话='$qydh',企业传真号码='$czhm',董事长='$dsz',董事长联系电话='$lxdh',董事长手机号码='$sjhm',总经理='$zjl',总经理联系电话='$lxdh1',总经理手机号码='$sjhm1',联系人='$lxr',联系人职务='$zw',联系人手机号码='$sjhm2' where id ='$hyid'";
if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
	header("refresh:0;url=../hyrh.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("refresh:0;url=../hyrh.php");
}

$conn->close();		
?>
