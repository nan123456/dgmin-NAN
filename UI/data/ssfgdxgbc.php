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
	    $xgcjdw1=$_POST["xgcjdw1"];    
	    $xgjzsxm=$_POST["xgjzsxm"];
	    $xgjldw=$_POST["xgjldw"] ;
	    $xgzjxm=$_POST["xgzjxm"];
	    $xggc=$_POST["xggc"];
		$xggm=$_POST["xggm"];
	    $xgjg=$_POST["xgjg"];
	    $xgkgsj=$_POST["xgkgsj"]; 
	    $xgjgsj=$_POST["xgjgsj"];
	    $xgbeizhu=$_POST["xgbeizhu"];
	    $xgjzszzh=$_POST["xgjzszzh"];
	    $xgzyzzgzh=$_POST["xgzyzzgzh"];
	    $xgjldwlxr=$_POST["xgjldwlxr"];
	    $xgjldwlxrdh=$_POST["xgjldwlxrdh"];
	    $xgsc=$_POST["xgsc"];
		$xgxc=$_POST["xgxc"];
	    $xgxxjd=$_POST["xgxxjd"];
	    $xgcj1lxr=$_POST["xgcj1lxr"];
	    $xgcj1lxrdh=$_POST["xgcj1lxrdh"];
	    $upload_filedDir=$_POST["picture3"];
$upload_filedDir1=$_POST["picture4"];
	    $sql="select * from 市示范工地  where id='$gcid'";
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			
	
		$sqli = "update 市示范工地  set 工程名称='$xggcmc',项目地址='$xggcdz',申报日期 ='$today',承建单位='$xgcjdw',施工单位联系人='$xgcjlxr',施工单位联系人手机='$xgcjlxrdh',参建单位='$xgcjdw1',建造师项目经理='$xgjzsxm',监理单位='$xgjldw',总监='$xgzjxm',建筑面积='$xggc',规模='$xggm',结构='$xgjg',竣工时间='$xgjgsj',备注='$xgbeizhu',建造师证证号='$xgjzszzh',执业证资格证号='$xgzyzzgzh',监理联系人='$xgjldwlxr',监理联系人电话='$xgjldwlxrdh',上层='$xgsc',下层='$xgxc',工程形象进度='$xgxxjd',参建单位联系人='$xgcj1lxr',参建单位联系人电话='$xgcj1lxrdh',绿色通道='$upload_filedDir',中标通知书='$upload_filedDir1' where id='$gcid' ";
		
	if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
    header("refresh:0;url=../ssfgd.php");
} else {
    echo "Error: " . $sqli . "<br>" . $conn->error;
    	header("refresh:0;url=../ssfgd.php");
}
		}}
?>