<?php
//	header("Access-Control-Allow-Origin:*");
//	header("Access-Control-Allow-Methods:POST");
	require("../conn.php");  
		$sbid=$_POST["sbid"];
//		echo hyid;
	$sqldate='';
	$sql="select * from 项目申报   where id='$sbid'";
	$result = $conn->query($sql);  
	$count= mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"项目名称":"'. $row["项目名称"].'","项目地址":"'. $row["项目地址"].'","联系人":"'. $row["联系人"].'","手机":"'. $row["手机"].'","邮箱":"'. $row["邮箱"].'","施工单位":"'. $row["施工单位"].'","申报类型":"'.$row["申报类型"].'"},';
		}
	} else {
		
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
			}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
	
?>
	

