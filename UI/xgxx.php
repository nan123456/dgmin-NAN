<?php
require("conn.php");
$sqli="select id,总公司营业执照,分公司营业执照,资质证书  from 外地会员  order by id";
$result = $conn->query($sqli);
if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		if($row['总公司营业执照'] !=""  or $row['分公司营业执照'] !=""  or $row['资质证书'] != "" ){
//			echo $row['id']."???".$row['工商营业执照']."~~~".$row['资质证书']."\n<br />";
	//		echo "<hr/>";
	//		227
	//		0||bdupload/1c0d0eaf5efae3c3c3e535c6226d635f.jpg
	//		0||bdupload/39e020f695259e5e139e8e0528945702.jpg||bdupload/f6b7b06d34afcabf2de82c83d672bfbd.jpg
			$lj_gx='';
//			echo stristr($row['工商营业执照'], "||");
			if(stristr($row['总公司营业执照'], "||") != false){
				$gx_arr = explode("||", $row['总公司营业执照']);
				for($i=0;$i<count($gx_arr);$i++){
					if($gx_arr[$i] != "0"){
						if($gx_arr[$i] != ""){
							$lj_gx[] = "http://mor-eyoo.img-cn-shenzhen.aliyuncs.com/dgjx/hyupload/".basename($gx_arr[$i]);
						}
					}
				}
				if($lj_gx != ''){
					$lj_gx[count($lj_gx)] = '';
					$lj_gx = implode("||", $lj_gx);
				}
			}
			
			$lj_zz='';
			if(stristr($row['分公司营业执照'], "||") != false){
				$zz_arr = explode("||", $row['分公司营业执照']);
				for($i=0;$i<count($zz_arr);$i++){
					if($zz_arr[$i] != "0"){
						if($zz_arr[$i] != ""){
							$lj_zz[] = "http://mor-eyoo.img-cn-shenzhen.aliyuncs.com/dgjx/hyupload/".basename($zz_arr[$i]);
						}
					}
				}
				if($lj_zz != ''){
					$lj_zz[count($lj_zz)] = '';
					$lj_zz = implode("||", $lj_zz);
				}
			}
			$lj_ss='';
			if(stristr($row['资质证书'], "||") != false){
				$ss_arr = explode("||", $row['资质证书']);
				for($i=0;$i<count($ss_arr);$i++){
					if($ss_arr[$i] != "0"){
						if($ss_arr[$i] != ""){
							$lj_ss[] = "http://mor-eyoo.img-cn-shenzhen.aliyuncs.com/dgjx/hyupload/".basename($ss_arr[$i]);
						}
					}
				}
				if($lj_ss != ''){
					$lj_ss[count($lj_ss)] = '';
					$lj_ss = implode("||", $lj_ss);
				}
			}
			$sql = "UPDATE 外地会员 SET 总公司营业执照='".$lj_gx."',分公司营业执照='".$lj_zz."',资质证书='".$lj_ss."'  WHERE id='".$row['id']."'";
			if($conn->query($sql)){
				echo $sql."\n\n<hr/>";
			}
		}	
	}
}

$conn->close();
?>