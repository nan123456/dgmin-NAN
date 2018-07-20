<?php
require("../conn.php"); 
$sqldate='';
$sj=$_POST["sj"];

$a=substr($sj, 0,4);
 $sql = "select * from 会员评价  where 年份='$a' order by 综合评价结果 desc";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$sqldate= $sqldate.'{"会员单位":"'. $row["会员单位"].'",	"会员性质":"'. $row["会员性质"].'",	"会费缴纳得分":"'. $row["会费缴纳得分"].'",	"用工实名制管理":"'. $row["用工实名制管理"].'",	"主管部门的行政处罚":"'. $row["主管部门的行政处罚"].'","备注":"'. $row["备注"].'","综合评价结果":"'. $row["综合评价结果"].'"},'; 
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