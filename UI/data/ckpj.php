<?php
require("../conn.php");  
		$gcid=$_POST["gcid"];
		$sql="select * from 会员评价 where id='$gcid'";
		$sqldate='';
		$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"会费缴纳得分":"'. $row["会费缴纳得分"].'","用工实名制管理":"'.$row["用工实名制管理"].'","主管部门的行政处罚":"'. $row["主管部门的行政处罚"].'","创优观摩得分":"'. $row["创优观摩得分"].'","创优讲座得分":"'. $row["创优讲座得分"].'","学习交流得分":"'. $row["学习交流得分"].'","其他活动得分":"'. $row["其他活动得分"].'","备注":"'. $row["备注"].'","综合评价结果":"'. $row["综合评价结果"].'"},'; 
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