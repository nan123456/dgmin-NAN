<?php
//	header("Access-Control-Allow-Origin:*");
//	header("Access-Control-Allow-Methods:POST");
	require("../conn.php");  
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];
		$bjm1=$_POST["bjm1"];
		$cjdw1=$_POST["cjdw1"];
		$yhtag1=$_POST["yhtag1"];
//		echo gcid;
	$sqldate='';
	if($bjm1=='0'){
		 $sql = "select * from 市示范工地 where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' ";
	}elseif($bjm=='1'||$bjm=='2'){
		$sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' or 承建单位='$cjdw' and 工程状态='已受理'  ";
   }else{
   	    $sql = "select * from 市示范工地  where 会员标记码='$yhtag'and 工程状态='已受理' ";
   }
	$result = $conn->query($sql);
	$count=mysqli_num_rows($result);	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$sqldate= $sqldate.'{"工程名称":"'. $row["工程名称"].'","项目地址":"'.$row["项目地址"].'","申报日期":"'.$row["申报日期"].'","承建单位":"'. $row["承建单位"].'","施工单位联系人":"'. $row["施工单位联系人"].'","施工单位联系人手机":"'. $row["施工单位联系人手机"].'","参建单位":"'. $row["参建单位"].'","参建单位联系人":"'. $row["参建单位联系人"].'","参建单位联系人电话":"'. $row["参建单位联系人电话"].'","建造师项目经理":"'. $row["建造师项目经理"].'","监理单位":"'. $row["监理单位"].'","总监":"'. $row["总监"].'","建筑面积":"'. $row["建筑面积"].'","规模":"'. $row["规模"].'","结构":"'. $row["结构"].'","竣工时间":"'. $row["竣工时间"].'","备注":"'. $row["备注"].'","建造师证证号":"'. $row["建造师证证号"].'","执业证资格证号":"'. $row["执业证资格证号"].'","监理联系人":"'. $row["监理联系人"].'","监理联系人电话":"'. $row["监理联系人电话"].'","工程形象进度":"'. $row["工程形象进度"].'","上层":"'. $row["上层"].'","下层":"'. $row["下层"].'"},'; 
		}
	} else {
		   
	}
	$jsonresult = 'success';
	$otherdate = '{"result":"'.$jsonresult.'",		
					"count":"'.$count.'"
			}';
				
	$json = '['.$sqldate.$otherdate.']';
	echo $json;
	$conn->close();	
	
?>