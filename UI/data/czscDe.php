<?php
	//引入连接数据库文件
		require("../conn.php");
		$gcid1=$_POST["gcid1"];
$sql = "delete from 操作手册附件  where 文件id = '$gcid1';";

if ($conn->query($sql) === TRUE) {
    echo "删除成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();		
?>