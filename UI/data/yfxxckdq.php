<?php
	require("../conn.php");
	$yfid=$_POST["yfid"];
	$sqldate='';
	$yhtag=$_POST["hybjm2"];
	
		$sql="SELECT b.*,a.`企业名称` AS 名称
FROM 本地会员 a,消息 b
WHERE a.`会员标记码`=b.`收信会员标记码` AND b.id='".$yfid."'
UNION
SELECT b.*,a.`企业名称` AS 名称
FROM 外地会员 a,消息 b
WHERE a.`会员标记码`=b.`收信会员标记码` AND b.id='".$yfid."'
UNION
SELECT b.*,a.`项目名称` AS 名称
FROM 项目申报 a,消息 b
WHERE a.`会员标记码`=b.`收信会员标记码` AND b.id='".$yfid."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"消息主题":"'. $row["消息主题"].'","内容":"'. $row["内容"].'","附件路径":"'. $row["附件路径"].'","名称":"'. $row["名称"].'","附件存在":"'. $row["附件存在"].'"},';
			}
		} 
		else{
			$sql="select * from 消息 where id ='".$yfid."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"消息主题":"'. $row["消息主题"].'","内容":"'. $row["内容"].'","附件路径":"'. $row["附件路径"].'","名称":"管理员","附件存在":"'. $row["附件存在"].'"},';	
		}
		$count=1;
		}
	
	
	
	
	
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
			}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	

?>