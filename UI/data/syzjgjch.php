<?php
require("../conn.php");
    
	$id1=$_POST["id1"];
	$gczt="";
	

	$sql="update 省优质结构奖  set 工程状态 ='$gczt' where id ='$id1'";

	if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		

?>