<?php
	//引入连接数据库文件
		require("../conn.php");
		$id2=$_POST["id2"];
$sql = "delete from 外地会员  where id = '$id2'";

if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>