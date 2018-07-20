<?php
session_start();
//引入连接数据库文件 
	require("../conn.php"); 
    $yhtag = $_SESSION["yhtag"];	
		$sqldate=''; 
    $sql = "select * from 个人信息  where 会员标记码= '$yhtag' ";
		$result = $conn->query($sql);
		$count=mysqli_num_rows($result);	
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$sqldate= '{"mima":"'. $row["密码"].'"}'; 
			}
		} 
	$json =$sqldate;
echo $json;
	$conn -> close();
?>



