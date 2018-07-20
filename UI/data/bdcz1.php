<?php
//	header("Access-Control-Allow-Origin:*");
//	header("Access-Control-Allow-Methods:POST");
	require("../conn.php");  
		$bdid=$_POST["bdid"];
//		echo hyid;
	$sqldate='';
	$sql="select * from 本地会员  where 会员标记码='$bdid'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"企业名称":"'. $row["企业名称"].'"},';
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
	

