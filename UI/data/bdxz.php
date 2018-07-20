<?php
	require("../conn.php");  
		$hyid=$_POST["hyid"];
		
//		echo gcid;
	$sqldate='';

    $sql = "select * from 本地会员  where id='yhid' ";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"工商营业执照":"'. $row["工商营业执照"].'","资格证书":"'.$row["资格证书"].'"},'; 
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