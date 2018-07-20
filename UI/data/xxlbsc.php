<?php
	require("conn.php");
	$id1=$_POST["id1"];
	
	$sql="delete from 消息 where id='$id1'";
	
	if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
?>