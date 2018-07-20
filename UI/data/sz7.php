
<?php
      session_start();

	//引入连接数据库文件
	 
	require("../conn.php");
    $yzh=$_POST["yzh"];
    $qrzh=$_POST["qrzh"];
    $xzh=$_POST["xzh"];
    $yhtag = $_SESSION["yhtag"];
	
    $sql = "select * from 个人信息  where 会员标记码='$yhtag' ";
		$result = $conn->query($sql);
	    while($row = $result->fetch_assoc()) {	
		          $zh=$row["账号"]	;	  }   
$a=substr($zh, 0,2);
if($a=="dg"){
	echo "                                         无法修改" ;
	
}
else {
	$sqli = "update 个人信息 set 账号='$xzh' where 会员标记码='$yhtag'";

if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();	
	exit;


?>

  </body>
</html>

