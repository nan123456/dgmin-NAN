<?php
require("../conn.php");  
		$gcid=$_POST["gcid"];
		$bcid=$_POST["bcid"];
		$sqldate='';
		
	$sql="select * from 活动报名  where 活动名称='$gcid' and 会员标记码='$bcid'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"会员单位":"'. $row["会员单位"].'","报名人数":"'.$row["报名人数"].'","报名人姓名":"'. $row["报名人姓名"].'","报名人手机号码":"'. $row["报名人手机号码"].'","报名人职务":"'. $row["报名人职务"].'"},'; 
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