<?php
//	header("Access-Control-Allow-Origin:*");
//	header("Access-Control-Allow-Methods:POST");
	require("../conn.php");  
		$gcid=$_POST["gcid"];
//		echo gcid;
	$sqldate='';
	$sql="select * from 省优质奖  where id='$gcid'"; 
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","项目地址":"'.$row["项目地址"].'","申报日期":"'.$row["申报日期"].'","承建单位":"'. $row["承建单位"].'","承建联系人":"'. $row["承建联系人"].'","承建联系人电话":"'. $row["承建联系人电话"].'","建造师姓名":"'. $row["建造师姓名"].'","参建单位":"'. $row["参建单位"].'","参建联系人姓名":"'. $row["参建联系人姓名"].'","参建联系人电话":"'. $row["参建联系人电话"].'","监理单位":"'. $row["监理单位"].'","项目总监姓名":"'.$row["项目总监姓名"].'","监理联系人姓名":"'. $row["监理联系人姓名"].'","监理联系人电话":"'. $row["监理联系人电话"].'","规模":"'. $row["规模"].'","面积":"'. $row["面积"].'","结构":"'. $row["结构"].'","上层":"'. $row["上层"].'","下层":"'. $row["下层"].'","竣工验收":"'. $row["竣工验收"].'","备案时间":"'. $row["备案时间"].'","备注":"'. $row["备注"].'","获省建设工程优质结构奖时间":"'. $row["获省建设工程优质结构奖时间"].'","获省建筑业绿色施工示范工程时间":"'. $row["获省建筑业绿色施工示范工程时间"].'","获省安全文明示范工地时间":"'. $row["获省安全文明示范工地时间"].'"},'; 
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
	
