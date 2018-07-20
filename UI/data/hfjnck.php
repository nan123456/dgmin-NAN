<?php
require("../conn.php");  
		$hfid=$_POST["hfid"];
		$sqldate='';
	$sql="select * from 会员评价  where 会员标记码='$hfid'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"缴费时间":"'. $row["缴费时间"].'","缴费金额":"'.$row["缴费金额"].'","会员性质":"'.$row["会员性质"].'"}'; 
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