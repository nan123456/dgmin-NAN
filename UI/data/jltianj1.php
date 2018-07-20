<?php
require("../conn.php");
$gcid3=$_POST["gcid3"];
$chrs=$_POST["chrs"];
$qdxm=$_POST["qdxm"];
$qdrzw=$_POST["qdrzw"];
$qdrdh=$_POST["qdrdh"];
if($chrs<3){$a='1';}else if($chrs>=3 and $chrs<5){$a='2';}else if($chrs>=5){$a='3';}

$sql3="update 学习交流  set 学习交流得分='$a',参会人数='$chrs',签到人姓名='$qdxm',签到人职务='$qdrzw',签到人电话='$qdrdh' where id='$gcid3'";	
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