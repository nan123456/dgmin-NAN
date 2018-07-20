<?php
	require("conn.php");
	$xxid=$_POST["xxid"];
	$hybjm1=$_POST["hybjm1"];
	$sbm = $_POST["sbm"];
//	$xxzt="已读";
	$sqldate='';
	
		

$sql="SELECT d.*,a.`企业名称` as 名称 
FROM `本地会员` a,`消息` d  
WHERE d.`发信会员标记码`= a.`会员标记码` AND  d.id='".$xxid."'
UNION SELECT d.*,b.`企业名称` as 名称 
FROM `外地会员` b,`消息` d 
WHERE d.`发信会员标记码`= b.`会员标记码` AND  d.id='".$xxid."'
UNION SELECT d.*,c.`项目名称` as 名称 
FROM `项目申报` c,`消息` d  
WHERE d.`发信会员标记码`= c.`会员标记码` AND  d.id='".$xxid."'
UNION 
SELECT d.*,a.`权限等级` as 名称   FROM `个人信息` a,`消息` d  WHERE d.id='".$xxid."' AND d.`发信会员标记码`='0h0000001' AND a.`会员标记码`='0h0000001'";
	
	
//	$sql1="update 消息 set 信件状态='$xxzt' where id='$xxid'";
	
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row["名称"]){
			$sqldate= $sqldate.'{"消息主题":"'. $row["消息主题"].'","内容":"'. $row["内容"].'","附件路径":"'. $row["附件路径"].'","名称":"'. $row["名称"].'","附件存在":"'. $row["附件存在"].'"},';
		}
		else{
			$sqldate= $sqldate.'{"消息主题":"'. $row["消息主题"].'","内容":"'. $row["内容"].'","附件路径":"'. $row["附件路径"].'","名称":"管理员","附件存在":"'. $row["附件存在"].'"},';
		}
			
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