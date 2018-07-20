<?php 
require("conn.php"); 
$tag=$_POST["tag"];
$qssj=$_POST["qssj"];
$jssj=$_POST["jssj"];
switch($tag){
	case 1:
		include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">市优质奖</h1>
												<tr>
													<th>序号</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th>联系人/手机</th>
													<th >建造师（项目经理）姓名</th>
													<th >参建单位(全称)</th>
													<th>联系人/手机</th>
													<th>监理单位(全称)</th>
													<th >总监姓名</th>
													<th >联系人/手机</th>
													<th>面积(m2)规模(万元)</th>
													<th>结构</th>
													<th>地上</th>
													<th>地下</th>
													<th >竣工验收/备案时间</th>
													<th>项目所在镇街位置</th>
													<th>申报时间</th>
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 市优质奖 where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$i=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													
                                                    <td align="center"><?php echo $i++;?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["承建联系人"]?>/<?php echo $row["承建联系人电话"]?></td>
													<td align="center"><?php echo $row["建造师姓名"]?></td>
													<td class="center"><?php echo $row["参建单位"]?></td>
												    <td align="center"><?php echo $row["参建联系人姓名"]?>/<?php echo $row["参建联系人电话"]?></td>
												    <td><?php echo $row["监理单位"]?></td>
												    <td align="center"><?php echo $row["项目总监姓名"]?></td>
												    <td align="center"><?php echo $row["监理联系人姓名"]?>/<?php echo $row["监理联系人电话"]?></td>
												    <td align="center"><?php echo $row["面积"]?>m²/<?php echo $row["规模"]?>万元</td>
												    <td><?php echo $row["结构"]?></td>
												    <td align="center"><?php echo $row["上层"]?></td>
												    <td align="center"><?php echo $row["下层"]?></td>
												    <td align="center"><?php echo $row["竣工验收"]?>/<?php echo $row["备案时间"]?></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <td align="center"><?php echo $row["申报日期"]?></td>
												    <td><?php echo $row["备注"]?></td>
												    
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php
$name= iconv("UTF-8", "GB2312//TRANSLIT","1.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break;
case 2:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">市示范工地</h1>
												<tr>
												    <th>序号</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th>项目经理姓名</th>
													<th>建造师证证号</th>
													<th>施工单位联系人/电话</th>
													<th>监理单位</th>
													<th>总监理姓名</th>
													<th>执业资格证号</th>
													<th>监理单位联系人/电话</th>
													<th>参建单位（专业分包单位）</th>
													<th>参建单位联系人/电话</th>
													<th>结构类别</th>
													<th>地上</th>
													<th>地下</th>
													<th>建筑面积㎡/规模</th>
													<th>计划竣工时间</th>
													<th>申报时的工程形象进度（主体）</th>
													<th>工程地点（镇街村）</th>
													<th>申报日期</th>
													<th>是否通过省安全标化系统审核）</th>
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 市示范工地 where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$a=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													
													<td align="center"><?php echo $a++;?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["建造师项目经理"]?></td>
													<td align="center"><?php echo $row["建造师证证号"]?></td>
	
													<td align="center"><?php echo $row["施工单位联系人"]?>/<?php echo $row["施工单位联系人手机"]?></td>
												    <td align="center"><?php echo $row["监理单位"]?></td>
												    <td align="center"><?php echo $row["总监"]?></td>
												    <td align="center"><?php echo $row["执业证资格证号"]?></td>
												    <td align="center"><?php echo $row["监理联系人"]?>/<?php echo $row["监理联系人电话"]?></td>
												    <td align="center"><?php echo $row["参建单位"]?></td>
												    <td align="center"><?php echo $row["参建单位联系人"]?>/<?php echo $row["参建单位联系人电话"]?></td>
												    <td align="center"><?php echo $row["结构"]?></td>
												    <td align="center"><?php echo $row["上层"]?></td>
												    <td align="center"><?php echo $row["下层"]?></td>
												    <td align="center"><?php echo $row["建筑面积"]?>m²/<?php echo $row["规模"]?>万元</td>
												    <td align="center"><?php echo $row["竣工时间"]?></td>
												    <td><?php echo $row["工程形象进度"]?></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <td align="center"><?php echo $row["申报日期"]?></td>
												    <td></td>
												    <td><?php echo $row["备注"]?></td>
												    
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","2.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break;
case 3:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">省优质奖</h1>
												<tr>
													<th>序号</th>
													<th>工程名称</th>
													<th>承建单位</th>
													<th>联系人/手机</th>
													<th>建造师（项目经理）姓名</th>
													<th>参建单位(全称)</th>
													<th>联系人/手机</th>
													<th>监理单位(全称)</th>
													<th>总监姓名</th>
													<th>联系人/手机</th>
													<th>面积(m2)/规模(万元)</th>
													<th>结构类型</th>
													<!--<th>地上</th>-->
													<!--<th>地下</th>-->
													<th>竣工验收/备案时间</th>
													<th>项目所在镇街位置</th>
													<th>申报时间</th>
													<!--<th>获省建设工程优质结构奖时间</th>
													<th>获省建筑业绿色施工示范工程时间</th>
													<th>获省安全文明示范工地时间</th>-->
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 省优质奖  where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$b=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													<td align="center"><?php echo $b++;?></td>
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["承建联系人"]?>/<?php echo $row["承建联系人电话"]?></td>
													<td align="center"><?php echo $row["建造师姓名"]?></td>
													<td class="center"><?php echo $row["参建单位"]?></td>
												    <td align="center"><?php echo $row["参建联系人姓名"]?>/<?php echo $row["参建联系人电话"]?></td>
												    <td><?php echo $row["监理单位"]?></td>
												    <td align="center"><?php echo $row["项目总监姓名"]?></td>
												    <td align="center"><?php echo $row["监理联系人姓名"]?>/<?php echo $row["监理联系人电话"]?></td>
												    <td align="center"><?php echo $row["面积"]?>m²/<?php echo $row["规模"]?>万元</td>
												    <td align="center"><?php echo $row["结构"]?></td>
												    <!--<td><?php echo $row["上层"]?></td>
											    	<td><?php echo $row["下层"]?></td>-->
												    <td align="center"><?php echo $row["竣工验收"]?>/<?php echo $row["备案时间"]?></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <td align="center">><?php echo $row["申报日期"]?></td>	
												    <!--<td><?php echo $row["获省建设工程优质结构奖时间"]?></td>	
												    <td><?php echo $row["获省建筑业绿色施工示范工程时间"]?></td>	
												    <td><?php echo $row["获省安全文明示范工地时间"]?></td>	-->
												    <td><?php echo $row["备注"]?></td>
												    
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","3.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break;
case 4:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">省优质结构奖</h1>
												<tr>
													<th>序号</th>
													<th>工程名称</th>
													<th>承建单位</th>
													<th>施工单位联系人</th>
													<th>施工单位联系人手机</th>
													<th>参建单位</th>
													<th >建造师（项目经理）姓名</th>
													<th>监理单位</th>
													<th>总监</th>
													<th>工程规模</th>
													<th>结构类型</th>
													<th>开工时间</th>
													<th>计划竣工时间</th>
													<th>检查情况1</th>
													<th>检查情况2</th>
													<th>检查情况3</th>
													<th>不通过原因</th>
													<th>项目地址</th>
													<th>申报时间</th>
													<th>申报时的主体结构进度</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 省优质结构奖   where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$c=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													
													<td align="center"><?php echo $c++;?></td>
													<td><?php echo $row["工程名称"]?></a></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["施工单位联系人"]?></td>
													<td align="center"><?php echo $row["施工单位联系人手机"]?></td>
													<td class="center"><?php echo $row["参建单位"]?></td>
												    <td align="center"><?php echo $row["建造师项目经理"]?></td>
												    <td><?php echo $row["监理单位"]?></td>
												    <td align="center"><?php echo $row["总监"]?></td>
												    <td align="center"><?php echo $row["工程规模"]?></td>
												    <td align="center"><?php echo $row["结构"]?></td>
												    <td align="center"><?php echo $row["开工时间"]?></td>
												    <td align="center"><?php echo $row["竣工时间"]?></td>
												    <td></td>
												    <td></td>
												    <td></td>
												    <td></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <td align="center"><?php echo $row["申报日期"]?></td>	
												    <td><?php echo $row["申报时的主体结构进度"]?></td>
												    
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","4.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break; 
case 5:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">省优秀QC</h1>
												<tr>
													<th>序号</th>
													<th>工程名称</th>
													<th>承建单位</th>
													<th>施工单位联系人</th>
													<th>施工单位联系人手机</th>
													<th>小组名称</th>
													<th>课题名称</th>
													<th>课题类型</th>
													<th>课题起止期</th>
													<th>发表人</th>
													<th>通讯地址</th>
													<th>E-mail</th>
													<th>项目地址(镇街村)</th>
													<th>申报日期</th>
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 省优秀qc  where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$d=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													
													<td align="center"><?php echo $d++;?></td>
													<td><?php echo $row["工程名称"]?></a></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["施工单位联系人"]?></td>
													<td align="center"><?php echo $row["施工单位联系人手机"]?></td>
													<td align="center"><?php echo $row["小组名称"]?></td>
												    <td align="center"><?php echo $row["课题名称"]?></td>
												    <td align="center"><?php echo $row["课题类型"]?></td>
												    <td align="center"><?php echo $row["课题开始日期"]?>/<?php echo $row["课题结束日期"]?></td>
												    <td align="center"><?php echo $row["发表人"]?></td>
												    <td align="center"><?php echo $row["通讯地址"]?></td>
												    <td align="center"><?php echo $row["email"]?></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <td align="center"><?php echo $row["申报日期"]?></td>	
												    <td><?php echo $row["备注"]?></td>
												    
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","5.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break; 
case 6:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">省绿色施工</h1>
												<tr>
													<th>序号</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th >施工单位联系人/手机</th>
													<th >建造师（项目经理）姓名</th>
													<th>监理单位</th>
													<th >总监</th>
													<th >工程规模</th>
													<th >结构类型</th>
													<th >地上/地下</th>
													<th>开工时间/计划竣工时间</th>
													<th>检查情况1</th>
													<th>检查情况2</th>
													<th>检查情况3</th>
													<th>不通过原因</th>
													<th>项目地址</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
								 	require("conn.php"); 
		$qssj=$_POST["qssj"];
		$jssj=$_POST["jssj"];

//		echo gcid;
	$sqldate='';
		 $sql = "select * from 省绿色施工  where 工程状态='已受理' and 审核通过时间  between '$qssj' and '$jssj' order by 审核通过时间";
	$o=1;
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													
													<td align="center"><?php echo $o++;?></td>
													<td><?php echo $row["工程名称"]?></a></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td align="center"><?php echo $row["施工单位联系人"]?>/<?php echo $row["施工单位联系人手机"]?></td>
													<td align="center"><?php echo $row["建造师项目经理"]?></td>
													<td class="center"><?php echo $row["监理单位"]?></td>
												    <td align="center"><?php echo $row["总监"]?></td>
												    <td align="center"><?php echo $row["工程规模"]?></td>
												    <td align="center"><?php echo $row["结构"]?></td>
												    <td align="center"><?php echo $row["上层"]?>/<?php echo $row["下层"]?></td>
												    <td align="center"><?php echo $row["开工时间"]?>/<?php echo $row["竣工时间"]?></td>
												    <td></td>
												    <td></td>
												    <td></td>
												    <td></td>
												    <td><?php echo $row["项目地址"]?></td>
												    <!--<td><?php echo $row["申报日期"]?></td>
												    <td><?php echo $row["备注"]?></td>												    -->
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","6.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break;  
case 7:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">东莞市建筑业协会本地会员单位名册</h1>
												<tr>
													
													<th>序号</th>
													<th >企业名称</th>
													<th >协会职务</th>
													<th >入会时间</th>
													<th>等级</th>
													<th >企业负责人</th>
													<th >电话</th>
													<th >通讯员</th>
													<th >电话</th>
													<th >QQ</th>
													<th>传值</th>
													<th>邮政编码</th>
													<th>通讯地址</th>
													<th>电子邮箱</th>
													<th>企业网站</th>
													
												</tr>
											</thead>
											<tbody>
							       <?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                   $sql = "select 企业名称,登记日期,主项资质,总经理,总经理联系电话,联系人,联系人手机号码,邮政编号,企业地址 ,电子邮箱,企业网址 from 本地会员 where 会员状态='通过'  " ;
									
//										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                  ?>
												<tr class="odd gradeX">
													
													<td><?php echo $i++ ?></td>
													<td class="center"> <?php echo $row["企业名称"]?></td>
													<td class="center"></td>
													<td align="center"><?php echo $row["登记日期"]?></td>
													<td class="center"><?php echo $row["主项资质"]?></td>
												    <td align="center"><?php echo $row["总经理"]?></td>
												    <td align="center"><?php echo $row["总经理联系电话"]?></td>
												    <td align="center"><?php echo $row["联系人"]?></td>
												    <td align="center"><?php echo $row["联系人手机号码"]?></td>
												    <td></td>
												    <td></td>
												    <td align="center"><?php echo $row["邮政编号"]?></td>
												    <td align="center"><?php echo $row["企业地址"]?></td>
												    <td align="center"><?php echo $row["电子邮箱"]?></td>
												    <td></td>
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","7.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break; 
case 8:
	include("word.php"); 
		$word=new excel; 		
		$word->start();
?> 
<table  border="1" cellspacing="1">
											<thead>
												<h1 style="text-align:center;">东莞市建筑业协会外地会员单位名册</h1>
												<tr>
													
													<th>序号</th>
													<th >企业名称</th>
													<th >协会职务</th>
													<th >入会时间</th>
													<th>等级</th>
													<th >企业负责人</th>
													<th >电话</th>
													<th >通讯员</th>
													<th >电话</th>
													<th >QQ</th>
													<th>传值</th>
													<th>邮政编码</th>
													<th>通讯地址</th>
													<th>电子邮箱</th>
													<th>企业网站</th>
													
												</tr>
											</thead>
											<tbody>
							       <?php
											require("conn.php");
//					                   $yhtag=$_SESSION["yhtag"];
					                  $sql = "select 企业名称,董事长,董事长联系电话,联系人,联系人手机号码,传真号码,邮政编号,企业地址 ,电子邮箱 from 外地会员 where 会员状态='通过'  " ;
									
//										
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {  
					                         					
					                  ?>
												<tr class="odd gradeX">
													
													<td><?php echo $i++ ?></td>
													<td class="center"> <?php echo $row["企业名称"]?></td>
													<td class="center"></td>
													<td class="center"></td>
													<td class="center"></td>
												    <td align="center"><?php echo $row["董事长"]?></td>
												    <td align="center"><?php echo $row["董事长联系电话"]?></td>
												    <td align="center"><?php echo $row["联系人"]?></td>
												    <td align="center"><?php echo $row["联系人手机号码"]?></td>
												    <td></td>
												    <td align="center"><?php echo $row["传真号码"]?></td>
												    <td align="center"><?php echo $row["邮政编号"]?></td>
												    <td><?php echo $row["企业地址"]?></td>
												    <td align="center"><?php echo $row["电子邮箱"]?></td>
												    <td></td>
												</tr>
										<?php
											}
											$conn->close();
																					
										?>		
											</tbody>
										</table>

<?php 
$name= iconv("UTF-8", "GB2312//TRANSLIT","8.xls");
//$word->save("upload/hzupload/$name");//保存word并且结束. 
$word->save("upload/hzupload/$name");
break;    
default:
echo "未知错误，请截图告知工作人员进行维护。";
}
?>