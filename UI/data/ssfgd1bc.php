<?php
	require("../conn.php");
	
	$today = date ( "Ymd", time () );
		$gcid1=$_POST["gcid1"];  
        $gcmc=$_POST["gcmc"];
	    $gcdz=$_POST["gcdz"];
	    $sbrq=$_POST["sbrq"];
	    $cjdw2=$_POST["cjdw2"];
	    $cjlxr=$_POST["cjlxr"];
	    $cjlxrdh=$_POST["cjlxrdh"];
	    $cjdw3=$_POST["cjdw3"];    
	    $jzsxm=$_POST["jzsxm"];
	    $jldw=$_POST["jldw"] ;
	    $zjxm=$_POST["zjxm"];
	    $gc=$_POST["gc"];
		$gm=$_POST["gm"];
	    $jg=$_POST["jg"];
	    $kgsj=$_POST["kgsj"]; 
	    $jgsj=$_POST["jgsj"];
	    $beizhu=$_POST["beizhu"];
	    $jzszzh=$_POST["jzszzh"];
	    $zyzzgzh=$_POST["zyzzgzh"];
	    $jldwlxr=$_POST["jldwlxr"];
	    $jldwlxrdh=$_POST["jldwlxrdh"];
	    $sc=$_POST["sc"];
		$xc=$_POST["xc"];
	    $xxjd=$_POST["xxjd"];
	    $cj1lxr=$_POST["cj1lxr"];
	    $cj1lxrdh=$_POST["cj1lxrdh"];
	    $upload_filedDir=$_POST["picture3"];
$upload_filedDir1=$_POST["picture4"];
	     
	$sql="select * from 市示范工地  where id='$gcid1'";
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	$result=$conn->query($sql);	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$a=$row["绿色通道"].$upload_filedDir;
			$b=$row["中标通知书"].$upload_filedDir1; 
		$sqli = "update 市示范工地  set 工程名称='$gcmc',项目地址='$gcdz',申报日期 ='$today',承建单位='$cjdw2',施工单位联系人='$cjlxr',施工单位联系人手机='$cjlxrdh',参建单位='$cjdw3',建造师项目经理='$jzsxm',监理单位='$jldw',总监='$zjxm',建筑面积='$gc',规模='$gm',结构='$jg',竣工时间='$jgsj',备注='$beizhu',建造师证证号='$jzszzh',执业证资格证号='$zyzzgzh',监理联系人='$jldwlxr',监理联系人电话='$jldwlxrdh',上层='$sc',下层='$xc',工程形象进度='$xxjd',参建单位联系人='$cj1lxr',参建单位联系人电话='$cj1lxrdh',绿色通道='$a',中标通知书='$b' where id='$gcid1' ";
		
		
	if ($conn->query($sqli) === TRUE) {
    echo "修改成功";
    header("refresh:0;url=../ssfgd1.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("refresh:0;url=../ssfgd1.php");
    	
}
		}}
?>