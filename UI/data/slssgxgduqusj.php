<?php
	require("../conn.php");  
	 $hybjm = $_POST["hybjm"];
	$sqldate='';
	$sql="select * from 项目申报  where 会员标记码='$hybjm'";  
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"phone":"'. $row["手机"].'"},';
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