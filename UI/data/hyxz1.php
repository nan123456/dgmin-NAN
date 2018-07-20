<?php
require("../conn.php");
$hfid1=$_POST["hfid1"];
$hyxz1=$_POST["hyxz1"];
$lhxw1=$_POST["lhxw1"];

if($hyxz1=='普通会员'){
	$a=60+$lhxw1;
$sql = "update 本地会员 set 会员性质='$hyxz1',良好行为='$lhxw1',行为得分='$a' where 会员标记码='$hfid1'";
if ($conn->query($sql) === TRUE) {
    echo "保存成功";
	header("refresh:1;url=../xwzl.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else if($hyxz1=='理事单位'){
	$a1=65+$lhxw1;
$sql1 = "update 本地会员 set 会员性质='$hyxz1',良好行为='$lhxw1',行为得分='$a1' where 会员标记码='$hfid1'";
if ($conn->query($sql1) === TRUE) {
    echo "保存成功";
	header("refresh:1;url=../xwzl.php");
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
}
else if($hyxz1=='常务理事单位'){
	$a2=68+$lhxw1;
$sql2 = "update 本地会员 set 会员性质='$hyxz1',良好行为='$lhxw1',行为得分='$a2' where 会员标记码='$hfid1'";
if ($conn->query($sql2) === TRUE) {
    echo "保存成功";
	header("refresh:1;url=../xwzl.php");
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
}
else if($hyxz1=='副会长单位'){
	$a3=72+$lhxw1;
$sql3 = "update 本地会员 set 会员性质='$hyxz1',良好行为='$lhxw1',行为得分='$a3' where 会员标记码='$hfid1'";
if ($conn->query($sql3) === TRUE) {
    echo "保存成功";
	header("refresh:1;url=../xwzl.php");
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}
}
else if($hyxz1=='会长单位'){
	$a4=80+$lhxw1;
$sql4 = "update 本地会员 set 会员性质='$hyxz1',良好行为='$lhxw1',行为得分='$a4' where 会员标记码='$hfid1'";
if ($conn->query($sql4) === TRUE) {
    echo "保存成功";
	header("refresh:1;url=../xwzl.php");
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}
}

$conn->close();	
?>