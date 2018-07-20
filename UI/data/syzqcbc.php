<?php
	require("../conn.php");
	$today = date ( "Ymd", time () );
		$gcid=$_POST["gcid"];  
        $xggcmc=$_POST["xggcmc"];
	    $xggcdz=$_POST["xggcdz"];
	    $xgsbrq=$_POST["xgsbrq"];
	    $xgcjdw=$_POST["xgcjdw"];
	    $xgcjlxr=$_POST["xgcjlxr"];
	    $xgcjlxrdh=$_POST["xgcjlxrdh"];
	    $xgxzmc=$_POST["xgxzmc"];
	    $xgktmc=$_POST["xgktmc"] ;
	    $xgktlx=$_POST["xgktlx"];
	    $xgktksrq=$_POST["xgktksrq"];
	    $xgktjsrq=$_POST["xgktjsrq"];
	    $xgfbr=$_POST["xgfbr"]; 
	    $xgtxdz=$_POST["xgtxdz"];
	    $xgemail=$_POST["xgemail"];
	    $xgbeizhu=$_POST["xgbeizhu"];
	    $upload_filedDir=$_POST["picture1"];
	     
	$sql="select * from 省优秀qc  where id='".$gcid."'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			
		$sqli = "update 省优秀qc  set 工程名称='".$xggcmc."',项目地址='".$xggcdz."',申报日期='".$today."',承建单位='".$xgcjdw."', 施工单位联系人='".$xgcjlxr."',施工单位联系人手机='".$xgcjlxrdh."',小组名称='".$xgxzmc."',课题名称='".$xgktmc."',课题类型='".$xgktlx."',课题开始日期='".$xgktksrq."',课题结束日期='".$xgktjsrq."',发表人='".$xgfbr."',通讯地址='".$xgtxdz."',email='".$xgemail."',备注='".$xgbeizhu."' ,通知书或合同='".$upload_filedDir."'where id='$gcid' ";
		
		
	if ($conn->query($sqli) === TRUE) {
  echo "修改成功";
header("refresh:0;url=../syzqc.php");
  
} else {
    echo "Error: " . $sqli . "<br>" . $conn->error;
     header("refresh:0;url=../syzqc.php");
}}}
	
?>