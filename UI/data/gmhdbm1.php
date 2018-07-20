<?php
require("../conn.php");

$bmdw=$_POST["bmdw"];
$bmrs=$_POST["bmrs"];
$bmxm=$_POST["bmxm"];
$bmdh=$_POST["bmdh"];
$bmzw=$_POST["bmzw"];
$gcid1=$_POST["gcid1"];

   $today=date("Y",time());	
$sql1="select 活动类别 from 活动 where 活动名称='$gcid1'";
$result1 = $conn->query($sql1);	
while($row = $result1->fetch_assoc()) {
	$a=$row["活动类别"];
}

$sql2="select 会员标记码 from 会员评价 where 会员单位='$bmdw'";
$result2 = $conn->query($sql2);	
while($row = $result2->fetch_assoc()) {
	$b=$row["会员标记码"];
}
	  
	$sql3="INSERT INTO 活动报名(活动类别,会员标记码,活动名称,会员单位,报名人数,报名人姓名,报名人职务,报名人手机号码,年份)values('$a','$b','$gcid1','$bmdw','$bmrs','$bmxm','$bmzw','$bmdh','$today')";	
	if($conn->query($sql3) === TRUE){
//	
           echo "保存成功";
        header("refresh:0;url=../cygm1.php");
      }
else{
	       echo "Error: " . $sql . "<br>" . $conn->error;

         	header("refresh:0;url=../cygm1.php");
     }
////			
//	
	
$conn->close();	
?>