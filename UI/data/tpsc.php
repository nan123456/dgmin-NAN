<?php
require("../conn.php");
$gcid=$_POST["gcid"];
$a=$_POST["a"];

$sql="select 验收报告 from 市优质奖 where id='$gcid'";
$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$a1=strpos($row["验收报告"],$a);
			$sql1="update 市优质奖 set 验收报告='$a1' where id=$gcid'";
			if ($conn->query($sql1) === TRUE) {
   			 echo "保存成功";
//			header("refresh:0;url=../gctz.php");
	} else {
    		echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
	}
	}
?>