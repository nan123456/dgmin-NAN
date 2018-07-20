<?php
require("../conn.php");  
		$gcid=$_POST["gcid"];
		$sqldate='';
		
	$sql="select * from 创优讲座  where id='$gcid'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"报名总人数":"'. $row["报名总人数"].'","活动名称":"'. $row["活动名称"].'","活动主题":"'.$row["活动主题"].'","活动地点":"'.$row["活动地点"].'","活动时间":"'. $row["活动时间"].'","报名开始时间":"'. $row["报名开始时间"].'","报名结束时间":"'. $row["报名结束时间"].'","活动路线":"'. $row["活动路线"].'","活动性质":"'. $row["活动性质"].'","备注":"'. $row["备注"].'"},'; 
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