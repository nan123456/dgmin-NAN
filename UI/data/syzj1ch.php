<?php
	require("../conn.php");
	$id1=$_POST["id1"];
	
	$sql ="select * from 省优质奖 where id='$id1'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		$sqli = "update 省优质奖  set 工程状态=' ' where id='$id1' ";
		
		if($conn->query($sqli)){
			$jsonresult = "success";
		}else{
			$jsonresult = "error";
		}	
	}else{
		$jsonresult='1';				
	}
	if ($conn->query($sql) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	

?>