<?php
	require("../conn.php");
	$id2=$_POST["id2"];
	$gczt="待受理";
	
	$sql="update 省优质结构奖 set 工程状态='$gczt' where id ='$id2'";


	if ($conn->query($sql) === TRUE) {
    echo "保存成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
?>