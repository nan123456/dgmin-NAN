<?php
require ("../conn.php");
$dwmc = $_POST['dwmc'];

$Query = "Select count(* ) as AllNum from 个人信息   where 企业名称='" . $dwmc  . "'";
$a = mysqli_query($conn, $Query);
$b = mysqli_fetch_assoc($a);
//echo $b['AllNum'];
if ($b['AllNum']) {

$sqldate='';
$sql = "select * from 个人信息  where 企业名称='" . $dwmc  . "'";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
if ($result -> num_rows > 0) {
	while ($row = $result -> fetch_assoc()) {
		$sqldate = $sqldate . '{"账号":"'. $row["账号"].'","密码":"'.$row["密码"].'"},';
		//			echo $row["账号"];
		//			echo $row["密码"];
	}
} else {

}

$jsonresult='success';
	$otherdate ='{"result":"'.$jsonresult.'",		
				"count":"'.$count.'"
			}';
				
	$json ='['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
}
?>
