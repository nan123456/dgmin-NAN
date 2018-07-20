<?php
require("../conn.php");

   $gcid=$_POST["gcid"];
   $sqldate='';
	$sql="select * from 本地会员  where 会员标记码='$gcid'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"退会时间":"'. $row["退会时间"].'","退会事由":"'.$row["退会事由"].'"},'; 
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