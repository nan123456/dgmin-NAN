<?php
	require("../conn.php");  
		$gcid1=$_POST["gcid1"]; 
//		echo gcid;
	$sqldate=''; 
	$sql="select * from 省优秀qc  where id='$gcid1'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","项目地址":"'.$row["项目地址"].'","申报日期":"'.$row["申报日期"].'","承建单位":"'. $row["承建单位"].'","施工单位联系人":"'. $row["施工单位联系人"].'","施工单位联系人手机":"'. $row["施工单位联系人手机"].'","小组名称":"'. $row["小组名称"].'","课题名称":"'. $row["课题名称"].'","课题类型":"'. $row["课题类型"].'","课题开始日期":"'. $row["课题开始日期"].'","课题结束日期":"'. $row["课题结束日期"].'","发表人":"'. $row["发表人"].'","通讯地址":"'. $row["通讯地址"].'","email":"'. $row["email"].'","备注":"'. $row["备注"].'","通知书或合同":"'. $row["通知书或合同"].'"},'; 
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