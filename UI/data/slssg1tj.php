<?php
	require("../conn.php");
	    $tjid=$_POST["tjid"];
	    $tjly1=$_POST["tjly1"];
	    $ytj="已退件";
	    
	$sql2 = "select * from 省绿色施工  where id='$tjid'";
	$result = $conn->query($sql2);
	$sqli2 = "update 省绿色施工 set 工程状态='$ytj',退件理由='$tjly1' where id ='$tjid'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();		

?>
