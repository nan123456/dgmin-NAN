<?php
//	header("Access-Control-Allow-Origin:*");
//	header("Access-Control-Allow-Methods:POST");
	require("../conn.php");  
		$hyid=$_POST["hyid"];
//		echo hyid;
	$sqldate='';
	$sql="select * from 本地会员  where id='$hyid'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$a=$row["主项资质"];
			$b=preg_replace("/\r\n/", '、', $a);
			$a1=$row["副项资质"];
			$b1=preg_replace("/\r\n/", '、', $a1);
			$sqldate= $sqldate.'{"登记日期":"'. $row["登记日期"].'","会员编号":"'. $row["会员编号"].'","企业名称":"'. $row["企业名称"].'","企业地址":"'.$row["企业地址"].'","邮政编号":"'.$row["邮政编号"].'","企业网址":"'.$row["企业网址"].'","电子邮箱":"'. $row["电子邮箱"].'","工商注册号":"'. $row["工商注册号"].'","注册资金":"'. $row["注册资金"].'","资质证书编号":"'.$row["资质证书编号"].'","主项资质":"'.$b.'","副项资质":"'.$b1.'","企业法人":"'. $row["企业法人"].'","企业电话":"'. $row["企业电话"].'","企业传真号码":"'. $row["企业传真号码"].'","董事长":"'.$row["董事长"].'","董事长联系电话":"'.$row["董事长联系电话"].'","董事长手机号码":"'.$row["董事长手机号码"].'","总经理":"'. $row["总经理"].'","总经理联系电话":"'. $row["总经理联系电话"].'","总经理手机号码":"'. $row["总经理手机号码"].'","联系人":"'.$row["联系人"].'","联系人职务":"'.$row["联系人职务"].'","联系人手机号码":"'.$row["联系人手机号码"].'","工商营业执照":"'.$row["工商营业执照"].'","资质证书":"'.$row["资质证书"].'"},';
		}
	} else {
		
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
			}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
//	echo $b;
	$conn->close();	
	
?>
	

