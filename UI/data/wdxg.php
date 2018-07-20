<?php
	//引入连接数据库文件
//	$timestr=$time['year']."-".$time['mon']."-".$time['mday']."/".$time['hours'].":".$time['minutes'].":".$time['seconds'];
//	$sjc=$timestr;
//		$sjcc =strtotime(".$sjc.");
//		$file=$_POST["file"];
	require("../conn.php");
	    $wdid=$_POST["wdid"];
	    $djrq1=$_POST["djrq1"];
	    $wdhybh=$_POST["wdhybh"];
	    $dwmc=$_POST["dwmc"];
	    $xxdz=$_POST["xxdz"];
	    $wdyzbh=$_POST["wdyzbh"];
	    $qywz1=$_POST["qywz1"];
	    $qyyx=$_POST["qyyx"];
	    $gszc1=$_POST["gszc1"];
	    $zczj1=$_POST["zczj1"];
	    $zsbh=$_POST["zsbh"];
	    $wdzxzz=$_POST["wdzxzz"];
	    $wdfxzz=$_POST["wdfxzz"];
	    $fddbr=$_POST["fddbr"];
	    $bgdh=$_POST["bgdh"];
	    $wdczdh=$_POST["wdczdh"];
	    $fzr=$_POST["fzr"]; 
	    $fzrbgdh=$_POST["fzrbgdh"];
        $zgsjhm=$_POST["zgsjhm"];
		$zjl1=$_POST["zjl1"];
		$zjllxdh1=$_POST["zjllxdh1"];
		$zjlsjhm1=$_POST["zjlsjhm1"];
		$txy=$_POST["txy"];
		$lxrzw1=$_POST["lxrzw1"];
		$txysjhm=$_POST["txysjhm"];
	
	$sqli = "update 外地会员 set 登记日期='$djrq1',会员编号='$wdhybh',企业名称='$dwmc',企业地址='$xxdz',邮政编号='$wdyzbh',企业网址='$qywz1',电子邮箱='$qyyx',工商注册号='$gszc1',注册资金='$zczj1',资质证书编号='$zsbh',主项资质='$wdzxzz',副项资质='$wdfxzz',企业法人='$fddbr',企业电话='$bgdh',企业传真号码='$wdczdh',董事长='$fzr',董事长联系电话='$fzrbgdh',董事长手机号码='$zgsjhm',总经理='$zjl1',总经理联系电话='$zjllxdh1',总经理手机号码='$zjlsjhm1',联系人='$txy',联系人职务='$lxrzw1',联系人手机号码='$txysjhm' where id ='$wdid'";
if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
    header("refresh:1;url=../hyrh.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    	header("refresh:1;url=../hyrh.php");
}

$conn->close();		
?>
