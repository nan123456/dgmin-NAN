<?php
require("../conn.php");
$bmdw=$_POST["bmdw"];
$bmrs=$_POST["bmrs"];
$bmxm=$_POST["bmxm"];
$bmdh=$_POST["bmdh"];
$bmzw=$_POST["bmzw"];
$gcid1=$_POST["gcid1"];

	
		  
	$sql3="update 学习交流  set 报名单位='$bmdw',报名人数='$bmrs',报名人姓名='$bmxm',报名人电话='$bmdh',报名人职务='$bmzw' where id='$gcid1'";	
	if($conn->query($sql3) === TRUE){
//	
           echo "保存成功";
        header("refresh:0;url=../xxjl.php");
      }
else{
	       echo "Error: " . $sql . "<br>" . $conn->error;

         	header("refresh:0;url=../xxjl.php");
     }
//			
	
	
$conn->close();	
?>