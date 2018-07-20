<?php
require("../conn.php");  
		$gcid3=$_POST["gcid3"];
		
		$sqldate='';
		
	$sql="select * from 创优观摩  where Id='$gcid3'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"参会人数":"'. $row["参会人数"].'","签到人姓名":"'.$row["签到人姓名"].'","签到人职务":"'. $row["签到人职务"].'","签到人电话":"'. $row["签到人电话"].'"},'; 
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