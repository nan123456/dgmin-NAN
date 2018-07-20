<?php
require ("../conn.php");
$zh = $_POST['zh'];
if ($zh) {
	$Query = "Select count(*) as AllNum from 个人信息  where  账号='" . $zh . "'";
	$a = mysqli_query($conn, $Query);
	$b = mysqli_fetch_assoc($a);
	if ($b['AllNum']) {
		$sql = "select * from 个人信息  where 账号='" . $zh . "'";
		$result = $conn -> query($sql);
		while ($row = $result -> fetch_assoc()) {
			$mima = $row["密码"];
		}
	} else {

	}
}
$jsonresult = 'success';
$otherdate = '{"result":"' . $jsonresult . '",		
				"count":"' . $mima . '"
			}'; 

$json = '[' . $otherdate . ']';
echo $json;
$conn -> close();
?>
