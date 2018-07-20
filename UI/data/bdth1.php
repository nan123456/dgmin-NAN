<?php
require("../conn.php");

	
		$gcid=$_POST["gcid"]; 
		$thsj=$_POST["thsj"];
		$thsy=$_POST["thsy"];
		
		$sql="select 账号 from 个人信息  where 会员标记码='$gcid'";
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$a=$row["账号"]."锁";
		$sqli="update 本地会员  set 退会时间='$thsj',退会事由='$thsy',会员状态='已退会' where 会员标记码 ='$gcid'";
		if ($conn->query($sqli) === TRUE) {
			$sql1="update 个人信息 set 账号='$a' where 会员标记码 ='$gcid'";
				
	if ($conn->query($sql1) === TRUE) {
    echo "修改成功";
		header("refresh:0;url=../hyrh.php");
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	header("refresh:0;url=../hyrh.php");
}
		}
		}
	}
?>