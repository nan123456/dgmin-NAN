<?php
require("../conn.php");  
		$gcid1=$_POST["gcid1"];
		
		$sqldate='';
		
	$sql="select * from 学习交流  where Id='$gcid1'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"报名单位":"'. $row["报名单位"].'","报名人数":"'.$row["报名人数"].'","报名人姓名":"'. $row["报名人姓名"].'","报名人电话":"'. $row["报名人电话"].'","报名人职务":"'. $row["报名人职务"].'"},'; 
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