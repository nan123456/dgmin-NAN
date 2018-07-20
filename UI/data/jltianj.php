<?php
require("../conn.php");
$gcid2=$_POST["gcid2"];

$sql="select 活动名称,活动主题,活动地点,活动时间,报名开始时间,报名结束时间,活动路线,活动性质,备注,报名总人数 from 学习交流 where id='$gcid2'";
$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$sql3="INSERT INTO 学习交流 (活动名称,活动主题,活动地点,活动时间,报名开始时间,报名结束时间,活动路线,活动性质,备注,报名总人数)values('".$row["活动名称"]."','".$row["活动主题"]."','".$row["活动地点"]."','".$row["活动时间"]."','".$row["报名开始时间"]."','".$row["报名结束时间"]."','".$row["活动路线"]."','".$row["活动性质"]."','".$row["备注"]."','".$row["报名总人数"]."')";	
	if($conn->query($sql3) === TRUE){
//	
           echo "保存成功";
        header("refresh:0;url=../xxjl.php");
      }
else{
	       echo "Error: " . $sql . "<br>" . $conn->error;

         	header("refresh:0;url=../xxjl.php");
     }
}
	}
$conn->close();
?>