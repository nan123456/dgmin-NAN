<?php
	require("../conn.php");
	    $shid=$_POST["shid"];
	 
	    $ytj="已受理";
	    
	$sql2 = "select * from 省优秀qc  where id='$shid'";
	$result = $conn->query($sql2);
	$sqli2 = "update 省优秀qc set 工程状态='$ytj' where id ='$shid'";
if ($conn->query($sqli2) === TRUE) {
    echo "修改成功";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
$conn->close();		

?>
