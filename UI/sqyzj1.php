<!DOCTYPE html>
<?php
	session_start();
	     if($_SESSION['yhtag']){
     	$yhtag=$_SESSION['yhtag'];
     }
     else{
     	header("refresh:0;url=login.php");
     }
?>
	<html class="no-js">

	<head>
		<meta charset="utf-8">
		<title>东莞市建筑业协会创优项目申报系统</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="style.css"/>
	
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

	</head>

	<body>
		                          <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   $fenge=explode("h","$yhtag");
					                   $bjm=$fenge[0];
					                   if($bjm=='0'){
					                   	$cjdw='';
					                   }
					                   if($bjm=='1'){
					                     $sql = "select * from 本地会员 where 会员标记码='$yhtag'";
					                     $result = $conn->query($sql);
					                     while($row = $result->fetch_assoc()){
					                     $cjdw=$row["企业名称"];
//					                   	echo $cjdw;
                                       }
                                       	
					                   }elseif($bjm=='2'){
					                   	$sql = "select * from 外地会员 where 会员标记码='$yhtag'";
					                    $result = $conn->query($sql);
					                    while($row = $result->fetch_assoc()){
					                   	  $cjdw=$row["申请单位名称"];
					                    }
					                    
					                   }elseif($bjm=='3'){
					                   	$sql = "select * from 项目申报 where 会员标记码='$yhtag'";
					                    $result = $conn->query($sql);
					                    while($row = $result->fetch_assoc()){
					                   	  $cjdw=$row["施工单位"];
					                   } 
					                   }											
										
//										消息数目↓
										$tag=explode("h",$yhtag);
					                   switch($tag[0])
					                   {
					                   	case 0:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   	case 1:
					                   	$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`";	  
					                   	break;
					                   	case 2:
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`申请单位名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
					                   	break;
					                   	case 3:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   }
			$result = $conn->query($sql);
			$rec=$result->num_rows;


			$sqli="select * from 消息 where 发信会员标记码='$yhtag'";
			$result = $conn->query($sqli);
			$sent=$result->num_rows;
			
			//提取可添加字段内容
			$sql="select * from 修改字段内容表 where id='1'";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()){
					$jglx=$row["结构类型"];
			}	
									?>			
		<div class="row-fluid" id="ImgBackground">
			<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
			
</div>
			<!------->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li class="active ">
	                            <a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
	                            <ul class="">
	                            	<li style="background: bisque;"><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
	                            </ul>
                            </li>
							<li class="myclass2"><a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a></li>
							<li class="myclass"><a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a></li>
							<!--<li >
                        	
	                            <a href="hyfw.php"><i class="icon-chevron-right"></i> 会员服务</a>
	                            <ul class="">
	                            	<li><a href="hfjn.php">会费缴纳</a></li>
	                            	<li><a href="xwzl.php">行为自律</a></li>
	                            	<li><a href="cygm.php">创优观摩</a></li>
	                            	<li><a href="cyjz.php">创优讲座</a></li>
	                            	<li><a href="xxjl.php">学习交流</a></li>
	                            	<li><a href="qt.php">其他</a></li>
	                            	<li><a href="zgbm.php">主管部门行政处罚</a></li>
	                            	<li><a href="bz.php">备注</a></li>
	                            	<li><a href="bbdy.php">报表打印</a></li>
	                            </ul>
	                            
                            </li>-->
							<li><a href="xx.php"><i class="icon-chevron-right"></i>消息</a>
								<ul>
								<li>发送消息</li>
                            	<li>消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span></li>
								<li>已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span></li>
								</ul>
							</li>
							<li><a href="sz.php"> 设置</a>
							
							</li>
							<li class="myclass9">
								<a href="cx.php">管理员功能</a>
							</li>
							<li><a href="czsc.php">操作手册</a>
							
							</li>
							<li><a href="login.php"> 退出</a></li>
						</ul>
					</div>
					<div class="span9" id="content">
						<div class="block" id="Tcontent">
							<div class="row-fluid">
								<ul class="nav navbar-inner block-header  nav-tabs" id="myUl">
									<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>

										<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
									</li>
									<li class="active"><a data-toggle="tab" href="#home">待受理</a></li>
									<li><a data-toggle="tab" href="#menu1">已受理</a></li>
									<li><a data-toggle="tab" href="#menu2">已退件记录</a></li>
									
								</ul>
								 <div class="tab-content ">
						    <div id="home" class="tab-pane fade in active">
						      <div class="block ">
	                            <div class="navbar navbar-inner block-header " >
	                                <div class="btn-group">
											
											<!--<button type="button"  class="btn btn-default dropdown-toggle" data-toggle="modal" data-target="#myModal3">汇总<!--<span class="caret"></span>--></button>-->
											<!--<ul class=" dropdown-menu"  role="menu" aria-labelledby="dropdownMenu1">
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class=""><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>-->
									</div>
	                            </div>
                            	<div class="block-content collapse in">
                                	<div class="span12">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass8">项目编号</th>-->
													<th class="hidden">会员标记码</th>
												
													<th>工程名称</th>
													<th>承建单位</th>
													<th>施工单位联系人姓名</th>
													<th>联系电话</th>
													<th>申报日期</th>
													<th >操作</th>
													<!--<th>下载</th>-->
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市优质奖 where 工程状态='待受理'order by Id1 asc ";
										 $result = $conn->query($sql);
									   
					                   while($row = $result->fetch_assoc()) {   
										 ?>   
										<tr class="odd gradeX">
													<td class=""><?php echo $row["Id1"];?></td>
													<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
													
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["承建联系人"]?></td>
													<td class="center"><?php echo $row["承建联系人电话"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<!--<td class="center">-->
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														<button type="submit" id="<?php echo $row["id"] ?>" class="btn btn-primary " data-toggle="modal" data-target="#myModal4" onclick="sh(this.id)">审核</button>
														
														
														<!--<a href="upload/squpload/<?php echo $row['验收报告'];?>"><button type="button" class="btn btn-primary" style="font-size: xx-small;">验收</button></a>
														<a href="upload/squpload/<?php echo $row['监督报告'];?>"><button type="button" class="btn btn-primary">监督</button></a>
														<a href="upload/squpload/<?php echo $row['备案证'];?>"><button type="button" class="btn btn-primary">备案证</button></a>-->
												    </td>
												</tr>
										<?php
											}
											}else{
																					
											   
										   
										   
										   
					                   if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='待受理' order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='待受理' order by Id1 asc ";
					                   }
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													<td class=""><?php echo $i++;?></td>
													<td class="hidden" name="hybjm"><?php echo $bjm ?></td>
													
													<td><?php echo $row["工程名称"]?></td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["承建联系人"]?></td>
													<td class="center"><?php echo $row["承建联系人电话"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<!--<td class="center">-->
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
														
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary " data-toggle="modal" data-target="#" onclick="ch(this.id)">撤回</button>
														</td>
														<!--<td class="center">
														<a href="upload/squpload/<?php echo $row['验收报告'];?>"><button type="button" class="btn btn-primary" style="font-size: xx-small;">验收</button></a>
														<a href="upload/squpload/<?php echo $row['监督报告'];?>"><button type="button" class="btn btn-primary">监督</button></a>
														<a href="upload/squpload/<?php echo $row['备案证'];?>"><button type="button" class="btn btn-primary">备案证</button></a>
												    </td>-->
												</tr>
										<?php
										}
											}
											$conn->close();
																					
										?>	
											</tbody>
										</table>
                                	</div>
                            	</div>
                        	 </div>
                        	</div>
						    <div id="menu1" class="tab-pane fade">
						      	<div class="block ">
	                            	<div class="navbar navbar-inner block-header " >
	                                	<div class="btn-group">
											
											<button type="button"  class="btn btn-default dropdown-toggle myclass5" data-toggle="modal" data-target="#myModal3">汇总</button>
											
											<!--<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>-->
										</div>
									</div>     
	                          	</div>
                            	<div class="block-content collapse in">
                                	<div class="span12" >
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass11">项目编号</th>-->
										
													<th>工程名称</th>
													<th>工程状态</th>
													<th>承建单位</th>
													<th>施工单位联系人姓名</th>
													<th>联系电话</th>
													<th>申报日期</th>
													<th>审核通过时间</th>
													<th>操作</th>
													
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市优质奖 where 工程状态='已受理'order by Id1 asc ";
					                   }elseif($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已受理' or 承建单位='$cjdw' and 工程状态='已受理' order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已受理'order by Id1 asc  ";
					                   }
					                   $result = $conn->query($sql);
									   $i=1;
									   
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													
													<td><?php echo $row["工程名称"]?></td>
													<td>已审核</td>
													<td class="center"> <?php echo $row["承建单位"]?></td>
													<td class="center"><?php echo $row["承建联系人"]?></td>
													<td class="center"><?php echo $row["承建联系人电话"]?></td>
													<td class="center"><?php echo $row["申报日期"]?></td>
													<td class=""><?php echo $row["审核通过时间"]?></td>
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>
													</td>
												</tr>
												
										<?php
											}
											$conn->close();
																					
										?>	
											</tbody>
										</table>
                                	</div>
                            	</div>
                        	 </div>
						    
						    <div id="menu2" class="tab-pane fade">
						      <div class="block ">
	                            <div class="navbar navbar-inner block-header " >
	                                <!--<div class="btn-group">
											
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">汇总<span class="caret"></span></button>
											<ul class=" dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">全年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">上半年</a></li>
											<li class="lii"><a href="#aqx7" tabindex="-1" data-toggle="tab">下半年</a></li>
											</ul>
									</div>-->
	                            </div>
                            	<div class="block-content collapse in">
                                	<div class="span12">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th class="">序号</th>
													<!--<th class="myclass13">项目编号</th>-->
												
													<th>工程名称</th>
													<th>工程状态</th>
													<th style="width: 500px;">退件理由</th>
												
													<th>操作</th>
												</tr>
											</thead>
											<tbody>
								 <?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市优质奖 where 工程状态='已退件' order by Id1 asc ";
					                  
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
													<td id="ytj3" name="ytj3" ><?php echo $row["工程状态"]?></td>
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
													<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>	
														
														
													</td>
												</tr>
									    <?php
											}
											}else{
											if($bjm=='1'||$bjm=='2'){
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已退件' or 承建单位='$cjdw' and 工程状态='已退件' order by Id1 asc  ";
					                   }else{
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已退件'order by Id1 asc  ";
					                   }
					                  
					                   $result = $conn->query($sql);
									   $i=1;
					                   while($row = $result->fetch_assoc()) {
					                         					
					             ?>
												<tr class="odd gradeX">
													<td class=""><?php if($yhtag!='0h0000001'){echo $i++;}else{echo $row["Id1"];}?></td>
													<td><?php echo $row["工程名称"]?></td>
													
													<td id="ytj3" name="ytj3" ><?php echo $row["工程状态"]?></td>
													<td><?php echo $row["退件理由"]?></td>
													<td class="center">
														
														<button id="<?php  echo $row["id"] ?> " type="button" class="btn btn-primary myclass20" data-toggle="modal" data-target="#myModal9" onclick="shenbao(this.id)">修改</button>
														<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary " onclick="tijiao(this.id);">提交</button>
														
													</td>
												</tr>
									    <?php
									   }
											}
											$conn->close();
																					
										?>			
											</tbody>
										</table>
                                	</div>
                            	</div>
                        	  </div>
						    </div>
						  </div>
					</div>
                  </div>

<!--审核-->
<!--模态框2-->

		
		
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				        <h4 class="modal-title" id="myModalLabel">审核</h4>
				    </div>
				    <div class="btn-group " >
						<button type="button " class=" btn  btn-large" data-toggle="dropdown">
							选择
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li class="lii lii0 " onclick="shtg();"><a href="#shtg" tabindex="-1" data-toggle="tab">审核通过</a></li>
							<li class="lii lii1  " onclick="tjly2();"><a href="#tjly" tabindex="-1" data-toggle="tab">退件理由</a></li>	
						</ul>
			        </div>
			    
				<div class="btn-group tab-pane fade my_none "  id="shtg">
					<form id="tjlyform" name="tjlyform" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				     
						<div class="form-group ">
							<label for="shtg1" class="span12 control-label" ><h1 style="text-align: center;">审核通过</h1></label>
							<div class="span8 hidden">
						<textarea rows="5" class="span12" id="shtg1" name="shtg1" value=""></textarea>
						<input id="shid" value="" class=""/>
						    </div>
						    <label for="" class="span2 control-label hidden"></label>
							<div class="span4">
								<textarea rows="1" class="span2 hidden" id="" name=""></textarea>
								
						    </div>
						</div>
						<div class="span12">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" id="save1" class="btn btn-primary" onclick="window.location.reload()">保存</button>
				      </div>
				    </div>
				     
				    </form>
				</div>
				<div class="btn-group tab-pane fade my_none "  id="tjly">
					<form id="tjlyform1" name="tjlyform1" action="" method="post" class="" role="form" >
				      <div class="modal-body">
				     
						<div class="form-group">
							<label for="tjly1" class="span12 control-label">退件理由:</label>
							<div class="span8">
						<textarea rows="5" class="span12" id="tjly1" name="tjly1" value=""></textarea>
						<input id="tjid" class="hidden" value="">
						<input id="ytj" value=""class="hidden" >
						    </div>
						    <label for="" class="span2 control-label hidden"></label>
							<div class="span4">
								<textarea rows="1" class="span2 hidden" id="" name=""></textarea>
						    </div>
						    </div>
						</div>
						<div class="span12">
				        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				        <button type="button" id="save4" class="btn btn-primary" onclick="window.location.reload()">保存</button>
				      </div>
				    
									</form>
								</div>
							</div>
						</div>
						</div>

						<!--模态框2-->
					<!--查看-->    
<!--模态框1-->
	
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog" >
				<div class="modal-content">
				    <div class="modal-header">
								
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">查看</h4>
									</div>
									
                    <form id="bdhyform2" name="bdhyform2" action="" method="post" class="" role="form">
	
										<div class="modal-body">
											<div class="form-group">
												<label for="xggcmc1" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcmc1" name="xggcmc1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xggcdz1" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcdz1" name="xggcdz1" placeholder="">
												</div>
												<div class="span12">
								                </div>
								               
											</div>
											<div class="form-group">
												<label for="xgsbrq1" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgsbrq1" name="xgsbrq1" placeholder="" >
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw2" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw2" name="xgcjdw2" placeholder="" readonly="true" value="<?php echo $cjdw?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr2" class="span2 control-label" >联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr2" name="xgcjlxr2" placeholder="">
												</div>
												<label for="xgcjlxrdh2" class="span2 control-label " >联系人电话/手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh2" name="xgcjlxrdh2" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjzsxm1" class="span2 control-label">建造师(项目经理)姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjzsxm1" name="xgjzsxm1" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjdw3" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw3" name="xgcjdw3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr3" class="span2 control-label" >联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr3" name="xgcjlxr3" placeholder="">
												</div>
												<label for="xgcjlxrdh3" class="span2 control-label " >联系人电话/手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh3" name="xgcjlxrdh3" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjldw1" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjldw1" name="xgjldw1" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgzjxm1" class="span2 control-label">项目总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgzjxm1" name="xgzjxm1" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgjllxr1" class="span2 control-label">联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxr1" name="xgjllxr1" placeholder="">
												</div>
												<label for="xgjllxrdh1" class="span2 control-label" >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxrdh1" name="xgjllxrdh1" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgmj1" class="span2 control-label">面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgmj1" name="xgmj1" placeholder="">
												</div>
												<label for="xggm1" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xggm1" name="xggm1" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
												<div class="form-group">
													<label for="xgjg1" class="span2 control-label">结构</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjg1" name="xgjg1" placeholder="">
												</div>
													</div>
												<div class="form-group">
													<label for="xgsc1" class="span2 control-label">地上</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgsc1" name="xgsc1" placeholder="">
													</div>
													<label for="xgxc1" class="span2 control-label">地下</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgxc1" name="xgxc1" placeholder="">
													</div>
												</div>
											
											<div class="form-group">
												<label for="xgjgg1" class="span2 control-label">竣工验收</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgjgg1" name="xgjgg1" placeholder="">
												</div>
												<label for="xgys1" class="span2 control-label">备案时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgys1" name="xgys1" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgbeizhu1" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu1" name="xgbeizhu1" placeholder="">
												</div>
											</div>
												<input type="type" class="span12 form-control hidden" id="gcid" name="gcid"value="gcid">
									<div class="form-group">
			
				                   <lable class="span2 control-label">验收报告:</lable> 
					             <div id="fileDown3" class="span12" >
					            <div id="location"></div>
						          </div>
				                    </div>
				                   <div class="form-group">
					              <lable class="span2 control-label">监督报告:</lable> 
					 
				                  <div id="fileDown4" class="span12" >
					            <div id="location4" ></div>
						          </div>
				                    </div>
				     	            <div class="form-group">
				               <lable class="span2 control-label">备案证:</lable> 
					
					
				              <div id="fileDown5" class="span12" >
					            <div id="location5" ></div>
						          </div>
				                    </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default " data-dismiss="modal">取消</button>
											
										</div>
									</form>
								</div>
							</div>
						</div>	
						<!--申报-->    
<!--模态框1-->
						<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
										<h4 class="modal-title" id="myModalLabel">修改</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="data/sqyzjbc11.php" method="post" class="" role="form" enctype="multipart/form-data">
										
										<div class="modal-body">
											<div class="form-group">
												<label for="xggcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcmc" name="xggcmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xggcdz" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xggcdz" name="xggcdz" placeholder="">
												</div>
												<div class="span10">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgsbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgsbrq" name="xgsbrq" placeholder="" readonly="true">
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw" name="xgcjdw" placeholder=""  value="<?php echo $cjdw?>">
												</div>
												<div class="span10">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr" class="span2 control-label" style="">联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="xgcjlxr" name="xgcjlxr" placeholder="">
												</div>
												<label for="xgcjlxrdh" class="span2 control-label " style="font-size: ">联系人电话/手机</label>
												<div class="span5">
													<input type="text" class="span12 form-control" id="xgcjlxrdh" name="xgcjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgjzsxm" class="span2 control-label">建造师(项目经理)姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjzsxm" name="xgjzsxm" placeholder="">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgcjdw1" class="span2 control-label">参建单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw1" name="xgcjdw1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr1" class="span2 control-label" style="font-size: ">联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="xgcjlxr1" name="xgcjlxr1" placeholder="">
												</div>
												<label for="xgcjlxrdh1" class="span2 control-label " style="font-size: ">联系人电话/手机</label>
												<div class="span5">
													<input type="text" class="span12 form-control" id="xgcjlxrdh1" name="xgcjlxrdh1" placeholder="">
												</div>
												<div class="span12">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgjldw" class="span2 control-label">监理单位</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgjldw" name="xgjldw" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgzjxm" class="span2 control-label">项目总监姓名</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgzjxm" name="xgzjxm" placeholder="">
												</div>
												<div class="span10">
								                 </div>
											</div>
											<div class="form-group">
												<label for="xgjllxr" class="span2 control-label">联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxr" name="xgjllxr" placeholder="">
												</div>
												<label for="xgjllxrdh" class="span2 control-label" >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgjllxrdh" name="xgjllxrdh" placeholder="">
												</div>
												<div class="span12">
													</div>
											</div>
											<div class="form-group">
												<label for="xgmj" class="span2 control-label">面积(平方)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgmj" name="xgmj" placeholder="">
												</div>
												<label for="xggm" class="span2 control-label">规模(万元)</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xggm" name="xggm" placeholder="">
												</div>
												<div class="span12">
								                 </div>
											</div>
												<div class="form-group">
													<label for="xgjg" class="span2 control-label">结构</label>
													<div class="span10 controls">
														<select id="xgjg" name="xgjg" class="form-control span12">
															<?php $select=explode("||",$jglx);
											for($i=0;$i<count($select);$i++){?>
											<option><?php echo $select[$i] ?></option>
											<?php } ?>
														</select>
													</div>
													</div>
													<div class="form-group">
													<label for="xgsc" class="span2 control-label">地上</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgsc" name="xgsc" placeholder="">
													</div>
													<label for="xgxc" class="span2 control-label">地下</label>
													<div class="span4">
														<input type="text" class="span12 form-control" id="xgxc" name="xgxc" placeholder="">
													</div>
												</div>
											
											<div class="form-group">
												<label for="xgjgg" class="span2 control-label">竣工验收</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgjgg" name="xgjgg" placeholder="">
												</div>
												<label for="xgys" class="span2 control-label">备案时间</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgys" name="xgys" placeholder="">
												</div>
												
												
											    </div>
											<div class="form-group">
												<label for="xgbeizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu" name="xgbeizhu" placeholder=""  />
												</div>
											</div>
												<input type="type" class="span12 form-control hidden" id="gcid1" name="gcid1"value="gcid1">
														<div class="form-group">
			
				                   <lable class="span12 control-label">验收报告图片预览:</lable> 
					             <div id="fileDown1" class="span12" >
					            <div id="location1" ></div>
						          </div>
				                    </div>
				                   <div class="form-group">
					              <lable class="span12 control-label">监督报告图片预览:</lable> 
					 
				                  <div id="fileDown2" class="span12" >
					            <div id="location2" ></div>
						          </div>
				                    </div>
				     	            <div class="form-group">
				               <lable class="span12 control-label">备案证图片预览:</lable> 
					
					
				              <div id="fileDown6" class="span12" >
					            <div id="location6" ></div>
						          </div>
				                    </div>
				                      	
				                    <div class="span12">
				                       <div class="form-group">
										<label class="control-label" for="myfile3">验收报告:</label>
							            <div id="container">
	                                <a id="myfile3" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles3" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile3"></div>
										<label class="control-label" for="myfile4">监督报告:</label>
							            <div id="container">
	                                <a id="myfile4" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles4" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile4"></div>
										<label class="control-label" for="myfile5">备案证:</label>
							           <div id="container">
	                                <a id="myfile5" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles5" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile5"></div>
											  </div>
											  <input id="furl3" name="picture3" type= "hidden" />
								              <input id="furl4" name="picture4" type="hidden"/>
								              <input id="furl5" name="picture5" type="hidden" />  
											  </div>
											  </div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save2">保存</button>
										</div>
									</form>
								</div>
							</div>
						</div>
<!--汇总-->
<!--模态框3-->
<div class="modal fade" style="width: 1200px; margin-left:-600px; margin-top: -70px;" id="myModal3" tabindex="-1" role="dialog "  aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog " style="width: 1200px;height:600px; overflow: scroll;" >
				<div class="modal-content">
				    <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  	 &times;
	                  </button>
				      <h4 class="modal-title" id="myModalLabel">汇总</h4>
				    </div>
				     
					<div class="block-content collapse in">
						<label for="sjcx" class="span1 control-label">时间查询</label>
								<div class="span4">
									<input type="date" class="span6 form-control" id="qssj" name="qssj" placeholder="">
									<input type="date" class="span6 form-control" id="jssj" name="jssj" placeholder="">
										
									<input type="text" class="span2 form-control hidden" id="bjm1" name="bjm1" value="<?php echo $bjm ?>">
									<input type="text" class="span2 form-control hidden" id="yhtag1" name="yhtag1" value="<?php echo $yhtag ?>">
									<input type="text" class="span2 form-control hidden" id="cjdw1" name="cjdw1" value="<?php echo $cjdw ?>">
										<button onclick="cx();cx1()">查询</button>
										<a href="data/download.php?name=1.xls"><button type="button" class="" >下载</button></a>
								</div>
                                	<div class="">
  										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
											<thead>
												<tr>
													
													<th class="hidden">会员标记码</th>
													<th>工程名称</th>
													<th >承建单位</th>
													<th colspan="2" >联系人/手机</th>
													<th >建造师（项目经理）姓名</th>
													<th >参建单位(全称)</th>
													<th colspan="2">联系人/手机</th>
													<th>监理单位(全称)</th>
													<th >总监姓名</th>
													<th colspan="2">联系人/手机</th>
													<th colspan="2">面积(m2)规模(万元)</th>
													<th>结构</th>
													<th colspan="2">地上/地下</th>
													<th colspan="2">竣工验收/备案时间</th>
													<th>项目所在镇街位置</th>
													<th>申报时间</th>
													<th>备注</th>
													
												</tr>
											</thead>
											<tbody>
								 <!--<?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
//					                   $cjdw=$_GET["cjdw"];
					                   if($yhtag=='0h0000001'){
					                     $sql = "select * from 市优质奖 where 工程状态='已受理'";
					                   }else{
					                   	 $sql = "select * from 市优质奖  where 会员标记码='$yhtag'and 工程状态='已受理' or 工程名称='$cjdw' and 工程状态='已受理'  ";
					                   }
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>-->
												<tr class="odd gradeX">
													
													<td class="hidden" name="hybjm"></td>
													<td name="gcmchz"></td>
													<td name="cjdwhz"> </td>
													<td name="cjlxrhz"></td>
													<td name="cjlxrdhhz"></td>
													<td name="jzsxmhz"></td>
													<td name="cjdw1hz"></td>
												    <td name="cjlxr1hz"></td>
												    <td name="cjlxrdh1hz"></td>
												    <td name="jldwhz"></td>
												    <td name="zjxmhz"></td>
												    <td name="jllxrhz"></td>
												    <td name="jllxrdhhz"></td>
												    <td name="mjhz"></td>
												    <td name="gmhz"></td>
												    <td name="jghz"></td>
												    <td name="schz"></td>
												    <td name="xchz"></td>
												    <td name="jgghz"></td>
												    <td name="yshz"></td>
												    <td name="xmdzhz"></td>
												    <td name="sbrqhz"></td>
												    <td name="beizhuhz"></td>
												    
												</tr>
										<!--<?php
											}
											$conn->close();
																					
										?>		-->
											</tbody>
										</table>
                                	</div>
                            	</div>
                        	 </div>
                        	</div>
				    </div>
			</div>
          </div>
          </div>
<!--模态框3--> 
					</div>
				</div>
			</div>
			<footer>
				<p>&copy; Vincent Gabriel 2013</p>
			</footer>
		
		<!--/.fluid-container-->
		<script src="vendors/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		<script src="assets/scripts.js"></script>
		<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/DT_bootstrap.js"></script>
		<script src="vendors/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="vendors/jquery-migrate-1.2.1.min.js"></script>
        <script src="vendors/modernizr.min.js"></script>
        <script src="vendors/jquery.nicescroll.js"></script>
      
        <script src="jqueryboxImg/js/boxImg.js" type="text/javascript" ></script>
        <!--连接上传所需的类-->
        <script type="text/javascript" src="vendors/plupload.full.min.js"></script>
        <!--连接执行操作的js代码-->
        <script type="text/javascript" src="data/upload_file_xgysbg.js"></script>
        <script type="text/javascript" src="data/upload_file_xgjdbg.js"></script>
        <script type="text/javascript" src="data/upload_file_xgbaz.js"></script>

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
$(function() {
        $(".lii").click(function() {
            //          第一种方法
             $(".lii").removeClass("active");//删除指定的 class 属性
             $(this).addClass("active");//向被选元素添加一个或多个类
             $(this).toggleClass("active");//该函数会对被选元素进行添加/删除类的切换操作
            var text = $(this).text();//获取当前选中的文本
            //或者使用第二种方法
//          $(this).addClass("active").siblings().removeClass("active");
        });
        
        
        $(".lii0").click(function() {
             
             $("#shtg").removeClass("my_none");
             $("#tjly").addClass("my_none");
             
        })
        $(".lii1").click(function() {
        	
              $("#tjly").removeClass("my_none");
              $("#shtg").addClass("my_none");
              
        });
        $(".sx2").click(function(){
        	$("#tjlyys").removeClass("my_none");
        	$("#shtgys").addClass("my_none");
        });

		$(".sx1").click(function(){

			$("#shtgys").removeClass("my_none");
            $("#tjlyys").addClass("my_none");
		});
		
	   $(".sx0").click(function(){
	   	$("#shtgys").removeClass("my_none");
            $("#tjlyys").removeClass("my_none");
	   });
    })
		


//审核		
		var shid=document.getElementById("shid");
        var tjid=document.getElementById("tjid");
        function sh(id){
//      	alert(id);
	        shid.value=id;
	        tjid.value =id;
//	      alert(tjid.value);
        };			
			
//			
		var sbm=document.getElementById("sbm");
		var myclass2=document.getElementsByClassName("myclass2");
		var myclass=document.getElementsByClassName("myclass");
		var myclass5=document.getElementsByClassName("myclass5");
		var myclass9=document.getElementsByClassName("myclass9");
		
//	    var myclass0=document.getElementsByClassName("myclass0");
//		var myclass8=document.getElementsByClassName("myclass8");
//		var myclass10=document.getElementsByClassName("myclass10");
//		var myclass11=document.getElementsByClassName("myclass11");
//		var myclass12=document.getElementsByClassName("myclass12");
//		var myclass13=document.getElementsByClassName("myclass13");
		
	
		if(sbm.value=='0'){
				myclass2[0].setAttribute("class","hidden");
//			   myclass0[0].setAttribute("class","hidden");
//				myclass10[0].setAttribute("class","hidden");
//				myclass12[0].setAttribute("class","hidden");
				
		}else if(sbm.value!='0'){
			myclass[0].setAttribute("class","hidden");
			myclass5[0].setAttribute("class","hidden");
			myclass9[0].setAttribute("class","hidden");
//			myclass8[0].setAttribute("class","hidden");
//			myclass11[0].setAttribute("class","hidden");
//			myclass13[0].setAttribute("class","hidden");
		}
		</script>
		<!--查看-->
		<!--<style>
			.max{width:100%;height:auto;}
			.min{width:150px;height:100px;}
			
		</style>-->
		<script type="text/javascript">
			function dianji(id){
//				alert(id);
				var gcid=document.getElementById("gcid");
				gcid.value=id;
				
				var xggcmc1 = document.getElementById("xggcmc1");
				var xggcdz1 = document.getElementById("xggcdz1");
				var xgsbrq1 = document.getElementById("xgsbrq1");
				var xgcjdw2 = document.getElementById("xgcjdw2");
				var xgcjlxr2 = document.getElementById("xgcjlxr2");
				var xgcjlxrdh2 = document.getElementById("xgcjlxrdh2");
				var xgjzsxm1 = document.getElementById("xgjzsxm1");
				var xgcjdw3 = document.getElementById("xgcjdw3");
				var xgcjlxr3 = document.getElementById("xgcjlxr3");
				var xgcjlxrdh3 = document.getElementById("xgcjlxrdh3");
				var xgjldw1 = document.getElementById("xgjldw1");
				var xgjllxr1 = document.getElementById("xgjllxr1");
				var xgjllxrdh1 = document.getElementById("xgjllxrdh1");
				var xgzjxm1 = document.getElementById("xgzjxm1");
				var xgmj1 = document.getElementById("xgmj1");
				var xggm1 = document.getElementById("xggm1");
				var xgjg1 = document.getElementById("xgjg1");
				var xgsc1 = document.getElementById("xgsc1");
				var xgxc1 = document.getElementById("xgxc1");
				var xgjgg1 = document.getElementById("xgjgg1");
				var xgys1 = document.getElementById("xgys1");
				var xgbeizhu1 =document.getElementById("xgbeizhu1");
						
				$.ajax({
					type:"POST",
					url:"data/gctzxgdq.php",
					data:{
						gcid:gcid.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
// 						alert(data);
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
//						
							xggcmc1.value = data[i].工程名称;
							xggcdz1.value = data[i].项目地址;
							xgsbrq1.value = data[i].申报日期;
							xgcjdw2.value = data[i].承建单位;
							xgcjlxr2.value = data[i].承建联系人;
							xgcjlxrdh2.value = data[i].承建联系人电话;
							xgjzsxm1.value = data[i].建造师姓名;
							xgcjdw3.value = data[i].参建单位;
							xgcjlxr3.value = data[i].参建联系人姓名;
							xgcjlxrdh3.value = data[i].参建联系人电话;
							xgjldw1.value = data[i].监理单位;
							xgzjxm1.value = data[i].项目总监姓名;
							xgjllxr1.value = data[i].监理联系人姓名;
							xgjllxrdh1.value = data[i].监理联系人电话;
							xgmj1.value = data[i].面积;
							xggm1.value = data[i].规模;
							xgjg1.value = data[i].结构;
							xgsc1.value = data[i].上层;
							xgxc1.value = data[i].下层;
							xgjgg1.value = data[i].竣工验收;
							xgys1.value = data[i].备案时间;
							xgbeizhu1.value =data[i].备注;

                       
                        //验收报告
						   var fileDown3=document.getElementById("fileDown3");
						  
						   var child=document.getElementById("location"); 
						   
                           fileDown3.removeChild(child);//删除指定的div以及子div
                           var obj = document.createElement("div");//创建div标签
							fileDown3.appendChild(obj);//定位obj 
                           obj.id="location"; 
                           var str=data[0].验收报告; //这是一字符串 
						   var strs=str.split("||"); //字符分割 
						  
						   	for (i=0;i<strs.length-1 ;i++ ) 
                            {
                           
                           var img=document.createElement("img");
                            
                             img.setAttribute("src",strs[i]);
			            	 img.setAttribute("style","width: 150px;height: 100px;");
			            	 img.setAttribute("class","min");
			             obj.appendChild(img); 
//			             img.onclick=fd;
//			           
//			           function fd(){ 
////			           	alert(1);
//			            	var bh=$(window).height();//获取屏幕高度
//  						var bw=$(window).width();//获取屏幕宽度
//  						$("#layer").css({
//     						 height:bh,
//      					 width:bw,
//      					display:"block"
// 											 });
//  						$("#pop").show($(img).toggleClass('max'););
//			            	
//			            	
//			            	}
			            	
							}  
							//监督报告
						   var fileDown4=document.getElementById("fileDown4");
						   
						   var child4=document.getElementById("location4"); 
						   
                           fileDown4.removeChild(child4);//删除指定的div以及子div
                           var obj4 = document.createElement("div");//创建div标签
						   fileDown4.appendChild(obj4);//定位obj 
                           obj4.id="location4"; 
                           var str4=data[0].监督报告; //这是一字符串 
						   var strs4=str4.split("||"); //字符分割 
						   
							for (i=0;i<strs4.length-1 ;i++ ) 
                            {
                             
                             var img4=document.createElement("img");
                             img4.setAttribute("src",strs4[i]);
			            	 img4.setAttribute("style","width: 150px;height: 100px;");
			                 obj4.appendChild(img4); 
							}      
                           //备案证
                           var fileDown5=document.getElementById("fileDown5");
						   var child5=document.getElementById("location5"); 
                           fileDown5.removeChild(child5);//删除指定的div以及子div
                           var obj5 = document.createElement("div");//创建div标签
						   fileDown5.appendChild(obj5);//定位obj 
                           obj5.id="location5"; 
                           var str5=data[0].备案证; //这是一字符串 
						   var strs5=str5.split("||"); //字符分割 
						   
							for (i=0;i<strs5.length-1 ;i++ ) 
                            { 
                             
                             var img5=document.createElement("img");
                             img5.setAttribute("src",strs5[i]);
			            	 img5.setAttribute("style","width: 150px;height: 100px;");
			                obj5.appendChild(img5); 
							} 
							
				}
//						alert(xgbeizhu1.value); 						
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
 
 
			function shenbao(id){
//				alert(id);
				var gcid1=document.getElementById("gcid1");
				gcid1.value=id;
//				alert(gcid1.value);				
				var xggcmc = document.getElementById("xggcmc");
				var xggcdz = document.getElementById("xggcdz");
				var xgsbrq = document.getElementById("xgsbrq");
				var xgcjdw = document.getElementById("xgcjdw");
				var xgcjlxr = document.getElementById("xgcjlxr");
				var xgcjlxrdh = document.getElementById("xgcjlxrdh");
				var xgjzsxm = document.getElementById("xgjzsxm");
				var xgcjdw1 = document.getElementById("xgcjdw1");
				var xgcjlxr1 = document.getElementById("xgcjlxr1");
				var xgcjlxrdh1 = document.getElementById("xgcjlxrdh1");
				var xgjldw = document.getElementById("xgjldw");
				var xgjllxr = document.getElementById("xgjllxr");
				var xgjllxrdh = document.getElementById("xgjllxrdh");
				var xgzjxm = document.getElementById("xgzjxm");
				var xgmj = document.getElementById("xgmj");
				var xggm = document.getElementById("xggm");
				var xgjg = document.getElementById("xgjg");
				var xgsc = document.getElementById("xgsc");
				var xgxc = document.getElementById("xgxc");
				var xgjgg = document.getElementById("xgjgg");
				var xgys = document.getElementById("xgys");
				var xgbeizhu =document.getElementById("xgbeizhu");
				
				
				
				
							
				$.ajax({
					type:"POST",
					url:"data/sqyzjsb.php",
					data:{
						gcid1:gcid1.value
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
							xggcmc.value = data[i].工程名称;
							xggcdz.value = data[i].项目地址;
							xgsbrq.value = data[i].申报日期;
							xgcjdw.value = data[i].承建单位;
							xgcjlxr.value = data[i].承建联系人;
							xgcjlxrdh.value = data[i].承建联系人电话;
							xgjzsxm.value = data[i].建造师姓名;
							xgcjdw1.value = data[i].参建单位;
							xgcjlxr1.value = data[i].参建联系人姓名;
							xgcjlxrdh1.value = data[i].参建联系人电话;
							xgjldw.value = data[i].监理单位;
							xgzjxm.value = data[i].项目总监姓名;
							xgjllxr.value = data[i].监理联系人姓名;
							xgjllxrdh.value = data[i].监理联系人电话;
							xgmj.value = data[i].面积;
							xggm.value = data[i].规模;
							xgjg.value = data[i].结构;
							xgsc.value = data[i].上层;
							xgxc.value = data[i].下层;
							xgjgg.value = data[i].竣工验收;
							xgys.value = data[i].备案时间;
							xgbeizhu.value =data[i].备注;
						 //验收报告
						   var fileDown1=document.getElementById("fileDown1");
						  
						   var child1=document.getElementById("location1"); 
						   
                           fileDown1.removeChild(child1);//删除指定的div以及子div
                           var obj1 = document.createElement("div");//创建div标签
							fileDown1.appendChild(obj1);//定位obj 
                           obj1.id="location1"; 
                           var str1=data[0].验收报告; //这是一字符串 
						   var strs1=str1.split("||"); //字符分割 
						  
						   	for (i=0;i<strs1.length-1 ;i++ ) 
                            {
                           
                           var img1=document.createElement("img");
                            
                             img1.setAttribute("src",strs1[i]);
			            	 img1.setAttribute("style","width: 150px;height: 100px;");
			             obj1.appendChild(img1); 
							}  
							//监督报告
						   var fileDown2=document.getElementById("fileDown2");
						   
						   var child2=document.getElementById("location2"); 
						   
                           fileDown2.removeChild(child2);//删除指定的div以及子div
                           var obj2 = document.createElement("div");//创建div标签
						   fileDown2.appendChild(obj2);//定位obj 
                           obj2.id="location2"; 
                           var str2=data[0].监督报告; //这是一字符串 
						   var strs2=str2.split("||"); //字符分割 
						   
							for (i=0;i<strs2.length-1 ;i++ ) 
                            {
                             
                             var img2=document.createElement("img");
                             img2.setAttribute("src",strs2[i]);
			            	 img2.setAttribute("style","width: 150px;height: 100px;");
			                 obj2.appendChild(img2); 
							}      
                           //备案证
                           var fileDown6=document.getElementById("fileDown6");
						   var child6=document.getElementById("location6"); 
                           fileDown6.removeChild(child6);//删除指定的div以及子div
                           var obj6 = document.createElement("div");//创建div标签
						   fileDown6.appendChild(obj6);//定位obj 
                           obj6.id="location6"; 
                           var str6=data[0].备案证; //这是一字符串 
						   var strs6=str6.split("||"); //字符分割 
						   
							for (i=0;i<strs6.length-1 ;i++ ) 
                            { 
                             
                             var img6=document.createElement("img");
                             img6.setAttribute("src",strs6[i]);
			            	 img6.setAttribute("style","width: 150px;height: 100px;");
			                obj6.appendChild(img6); 
							} 	
							
							
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};   
			

	function ch(id){ 
//   alert(id);
		
       $.ajax({         
		            cache:true,
					type:"POST",
					url:"data/sqyzj1ch.php",
					data:{
						 id1:id
					},
					async:false,
//					dataType :'json',
					timeout:10000,
   					success :function(data){
   						alert("撤回成功！");
   						window.location.reload();
					},
					error:function (e) {
						alert("Connection error");
					}
				});
				
				
	}		
	</script>
<script type="text/javascript">
		function shtg(){
		var flag =1;
//		alert(shid.value);
		var shtg1 =document.getElementById("shtg1");
		shtg1.value ="已受理";
//		shid =document.getElementById("shid");
	
	}
	$("#save1").click(function(){
//				      alert(shid.value);
						$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/sqyzj1sh.php',
				                data:{
				                	shid:shid.value,
				                	shtg1:shtg1.value,
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("审核成功");
				                    window.location.reload();
				                }
				            }); 
				          });
</script>
<script type="text/javascript">
	function tjly2(){
		var tjly1 =document.getElementById("tjly1");
		var flag =1;
//		alert(shid.value);
		var ytj =document.getElementById("ytj");
		ytj.value ="已退件";
//		shid =document.getElementById("shid");
	
	}
//	 function tjly2(){
//	 	var ytj =document.getElementById("ytj");
//		ytj.value ="已退件";
////	 	var flag = 2;
//	 	alert( tjid.value);
//	 }
	 $("#save4").click(function(){
	 	if(tjly1.value ==''){
	 		alert("退件理由不能为空！");
	 		return false;
	 	}else{
//				      alert(tjid.value);
						$.ajax({
				                cache: true,
				                type: "POST",
				                url:'data/sqyzj1tj.php',
				                data:{
//				                	shid:shid.value,
				                	tjid:tjid.value,
				                	tjly1:tjly1.value
//				                	ytj：ytj.value,
				                },// 你的formid
				                async: false,
				                error: function(request) {
				                    alert("Connection error");
				                },
				                success: function(data) {
				                    alert("退件成功");
				                    window.location.reload();
				                }
				            }); 
			}
				          });     
//审核	<!--修改后保存-->
	
//			$("#save2").click(function() {
////							alert($('#bdhyform1').serialize())
//				$.ajax({
//					cache: true,
//					type: "POST",
//					url: 'data/sqyzjbc11.php',
//					data: $('#bdhyform1').serialize(), // 你的formid
//					async: false,
//						error: function(jqXHR, textStatus, errorMsg){
//							   alert( "error:" + errorMsg );
//					},
//					success: function(data) {
//						alert("保存成功");
//						window.location.reload();
//					}
//				});
//			});
//提交
function tijiao(id){
				
//			alert
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/gctztj1.php',
					data: {
						id2:id
					}, // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("提交成功");
						
						window.location.reload();
					}
				});
				
				
			};	
			
		</script>
		<script type="text/javascript">	


	var hybjm=document.getElementsByName("hybjm");
//	var myclass1=document.getElementsByClassName("myclass1");
//	var myclass4=document.getElementsByClassName("myclass4");
//	var myclass7=document.getElementsByClassName("myclass7");
	
	for(i=0;i<hybjm.length;i++){
//		alert(hybjm[i].innerHTML!=0);
		if(hybjm[i].innerHTML!=0){
//	  	myclass1[0].setAttribute("class","hidden");
//	  myclass4[0].setAttribute("class","hidden");
	 }else {
//	 	myclass4[0].setAttribute("class","hidden");
//	  	myclass20[0].setAttribute("class","hidden");
	 } 
	}
	function cx(){
	var qssj=document.getElementById("qssj");
	var jssj=document.getElementById("jssj");
	var bjm1=document.getElementById("bjm1");
	var yhtag1=document.getElementById("yhtag1");
	var cjdw1=document.getElementById("cjdw1");
	
	var gcmchz=document.getElementsByName("gcmchz");
	var xmdzhz=document.getElementsByName("xmdzhz");
	var sbrqhz=document.getElementsByName("sbrqhz");
	var cjdwhz=document.getElementsByName("cjdwhz");
	var cjlxrhz=document.getElementsByName("cjlxrhz");
	var cjlxrdhhz=document.getElementsByName("cjlxrdhhz");
	var jzsxmhz=document.getElementsByName("jzsxmhz");
	var sbrqhz=document.getElementsByName("sbrqhz");
	var cjdw1hz=document.getElementsByName("cjdw1hz");
	var cjlxr1hz=document.getElementsByName("cjlxr1hz");
	var cjlxrdh1hz=document.getElementsByName("cjlxrdh1hz");
	var jldwhz=document.getElementsByName("jldwhz");
	var zjxmhz=document.getElementsByName("zjxmhz");
	var jllxrhz=document.getElementsByName("jllxrhz");
	var jllxrdhhz=document.getElementsByName("jllxrdhhz");
	var mjhz=document.getElementsByName("mjhz");
	var gmhz=document.getElementsByName("gmhz");
	var jghz=document.getElementsByName("jghz");
	var schz=document.getElementsByName("schz");
	var xchz=document.getElementsByName("xchz");
	var jgghz=document.getElementsByName("jgghz");
	var yshz=document.getElementsByName("yshz");
	var beizhuhz=document.getElementsByName("beizhuhz");
	
//	alert(qssj.value);
//	for(i=0;i<14;i++)
//	alert(gcmchz.innerHTML);
	
	$.ajax({
					type:"POST",
					url:"data/sqyzjhz.php",
					data:{
						qssj:qssj.value,
						jssj:jssj.value,
						bjm1:bjm1.value,
						yhtag1:yhtag1.value,
						cjdw1:cjdw1.value
						
					},
					dataType : "json",
					timeout: 10000,
   					success : function(data){
						var length = data.length;			
   						for (var i=0;i<length-1;i++) {
   							
							gcmchz[i].innerHTML = data[i].工程名称;
							xmdzhz[i].innerHTML = data[i].项目地址;
							sbrqhz[i].innerHTML = data[i].申报日期;
							cjdwhz[i].innerHTML = data[i].承建单位;
							cjlxrhz[i].innerHTML = data[i].承建联系人;
							cjlxrdhhz[i].innerHTML = data[i].承建联系人电话;
							jzsxmhz[i].innerHTML = data[i].建造师姓名;
							cjdw1hz[i].innerHTML = data[i].参建单位;
							cjlxr1hz[i].innerHTML = data[i].参建联系人姓名;
							cjlxrdh1hz[i].innerHTML = data[i].参建联系人电话;
							jldwhz[i].innerHTML = data[i].监理单位;
							zjxmhz[i].innerHTML = data[i].项目总监姓名;
							jllxrhz[i].innerHTML = data[i].监理联系人姓名;
							jllxrdhhz[i].innerHTML = data[i].监理联系人电话;
							mjhz[i].innerHTML = data[i].面积;
							gmhz[i].innerHTML = data[i].规模;
							jghz[i].innerHTML = data[i].结构;
							schz[i].innerHTML = data[i].上层;
							xchz[i].innerHTML = data[i].下层;
							jgghz[i].innerHTML = data[i].竣工验收;
							yshz[i].innerHTML = data[i].备案时间;
							beizhuhz[i].innerHTML =data[i].备注;
							
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
	
		</script>
<script type="text/javascript">
	function cx1(){
	var qssj=document.getElementById("qssj");
	var jssj=document.getElementById("jssj");
	var tag="1";
	
	$.ajax({        
		            cache:true,
					type:"POST",
					url:"test.php",
					data:{
						qssj:qssj.value,
						jssj:jssj.value,
						tag:tag,
					},
					async:false,
					dataType :'json',
					timeout:10000,
   					success :function(data){
   						
					},
					error:function (e) {
					}
				});
			}
</script>
<script type="text/javascript">
	
</script>
	</body>

	</html>