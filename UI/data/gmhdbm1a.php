<?php
require("../conn.php");

$bmdw1=$_POST["bmdw1"];
$bmrs1=$_POST["bmrs1"];
$bmxm1=$_POST["bmxm1"];
$bmdh1=$_POST["bmdh1"];
$bmzw1=$_POST["bmzw1"];
$gcid1=$_POST["gcid1"];

   $today=date("Y",time());	
$sql1="select 活动类别 from 活动 where 活动名称='$gcid1'";
$result1 = $conn->query($sql1);	
while($row = $result1->fetch_assoc()) {
	$a=$row["活动类别"];
}

$sql2="select 会员标记码 from 会员评价 where 会员单位='$bmdw1'";
$result2 = $conn->query($sql2);	
while($row = $result2->fetch_assoc()) {
	$b=$row["会员标记码"];
}

$sql3="update 活动报名 set 会员单位='$bmdw1',报名人数='$bmrs1',报名人姓名='$bmxm1',报名人手机号码='$bmdh1',报名人职务='$bmzw1' where 会员标记码='$b' and 活动名称='$gcid1' and 年份='$today'";
if($conn->query($sql3) === TRUE){
//	
           echo "保存成功";
        header("refresh:0;url=../cygm1.php");
      }
else{
	       echo "Error: " . $sql . "<br>" . $conn->error;

         	header("refresh:0;url=../cygm1.php");
     }
?>