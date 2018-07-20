<!DOCTYPE html>
<?php session_start(); ?>
<html class="no-js">

	<head>
		<meta charset="utf-8">
		<title>东莞市建筑业协会创优项目申报系统</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

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
		require ("conn.php");
		$yhtag = $_SESSION["yhtag"];
		$fenge = explode("h", "$yhtag");
		$bjm = $fenge[0];

		$tag = explode("h", $yhtag);
		switch($tag[0]) {
			case 0 :
				$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
				break;
			case 1 :
				$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='" . $yhtag . "'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='" . $yhtag . "' AND b.`会员标记码`=c.`收信会员标记码`";
				break;
			case 2 :
				$sql = "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='" . $yhtag . "'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='" . $yhtag . "' AND b.`会员标记码`=c.`收信会员标记码`";
				break;
			case 3 :
				$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
				break;
		}
		$result = $conn -> query($sql);
		$rec = $result -> num_rows;

		$sqli = "select * from 消息 where 发信会员标记码='$yhtag'";
		$result = $conn -> query($sqli);
		$sent = $result -> num_rows;
		?>
		<!--headbackground-->
		<div class="row-fluid" id="ImgBackground" >
			<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />

		</div>
		<!------->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3" id="sidebar">
					<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
						<li >

							<a href="xmgl.php">
								<i class="icon-chevron-right"></i> 项目管理
							</a>
							<ul class="">
								<li>
									<a href="sqyzj1.php">
										市优质奖
									</a>
								</li>
								<li>
									<a href="ssfgd1.php">
										市示范工地
									</a>
								</li>
								<li>
									<a href="syzj1.php">
										省优质奖
									</a>
								</li>
								<li>
									<a href="syzjgj1.php">
										省优质结构奖
									</a>
								</li>
								<li>
									<a href="syzqc1.php">
										省优秀QC
									</a>
								</li>
								<li>
									<a href="slssg1.php">
										省绿色施工
									</a>
								</li>
							</ul>

						</li>
						<li class="myclass9">
							<a href="gctz.php">
								<i class="icon-chevron-right"></i> 工程台账
							</a>

						</li>

						<li class="active">
							<a href="hyrh.php">
								<i class="icon-chevron-right"></i>会员入会
							</a>
						</li>
						<li>
							<a href="xx.php">
								<i class="icon-chevron-right"></i>消息
							</a>
							<ul>
								<li>
									发送消息
								</li>
								<li>
									消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span>
								</li>
								<li>
									已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span>
								</li>
							</ul>
						</li>
						<li>
							<a href="sz.php">
								设置
							</a>

						</li>
						<li class="myclass0">
							<a href="cx.php">
								管理员功能
							</a>

						</li>
						<li>
							<a href="czsc.php">
								操作手册
							</a>

						</li>
						<li>
							<a href="login.php">
								退出
							</a>
						</li>
					</ul>
				</div>

				<!--/span-->
				<div class="span9" id="content">
					<div class="block" id="Tcontent">
						<div class="row-fluid">
							<ul class="nav navbar-inner block-header  nav-tabs">
								<li>
									<i class="icon-chevron-left hide-sidebar" style="display: inline-block;">
									<a href="#" title="Hide Sidebar" rel="tooltip">
										&nbsp;
									</a></i>

									<i class="icon-chevron-right show-sidebar" style="display: none;">
									<a href="#" title="Show Sidebar" rel="tooltip">
										&nbsp;
									</a></i>
								</li>
								<li class="active">
									<a data-toggle="tab" href="#home">
										会员记录
									</a>
								</li>
							</ul>
							<div class="tab-content ">
								<div id="home" class="tab-pane fade in active">
									<div class="block ">
										<div class="navbar navbar-inner block-header " >
											<div class="btn-group">
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">
												新增
												</button>

												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
												会员类型<span class="caret"></span>
												</button>
												<ul class="dropdown-menu">
													<li class="sx0">
														<a href="#qbhyys" tabindex="-1" data-toggle="tab">
															全部
														</a>
													</li>

													<li class="sx2">
														<a href="#wdhyys" tabindex="-1" data-toggle="tab">
															外地会员
														</a>
													</li>
													<li class="sx1">
														<a href="#bdhyys" tabindex="-1" data-toggle="tab">
															本地会员
														</a>
													</li>
												</ul>
												<button type="button"  class="btn btn-default " data-toggle="modal" onclick="cx()"data-target="#myModal9">
												本地汇总
												</button>
												<button type="button"  class="btn btn-default " data-toggle="modal" onclick="cx1()"data-target="#myModal8">
												外地汇总
												</button>

											</div>
										</div>

										<div class="block-content collapse in " >
											<div class="span12">

												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered   " id="qbhyys" >

													<thead>
														<tr>
															<th>序号</th>
															<th>会员名称</th>

															<th>会员类型</th>
															<th>审核状态</th>
															<th>操作</th>
														</tr>
													</thead>

													<tbody id="" class="">

														<?php
														require("conn.php");
														//$yhtag=$_SESSION["yhtag"];
														$yhtag = $_SESSION["yhtag"];
														$flat = explode("h", "$yhtag");
														$qx = $flat[0];
														$i=1;
														if($qx == 0){

														$tag = explode("h", $yhtag);
														$sql = "select 企业名称,会员状态,会员名称,会员标记码,id from 本地会员 UNION select 企业名称,会员状态,会员名称,会员标记码,id from 外地会员" ;

														$result = $conn->query($sql);

														while($row = $result->fetch_assoc()) {

														if( $row["会员名称"]=='外地会员'){   ?>

														<tr class="even gradeC " id="">
															<td><?php echo $i++; ?></td>
															<!--<td><input type="checkbox"></td>-->
															<td><?php echo $row["企业名称"]?></td>

															<td class="center"><?php echo "外地会员"?></td>
															<td class="center" name="panduan1"><?php echo $row["会员状态"]?></td>
															<td class="center">
																<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">
																查看
																</button>
																<button type="button" class="btn btn-primary myclass4" id="<?php echo $row["会员标记码"]; ?>"data-toggle="modal" data-target="#myModal5" onclick="sh2(this.id)">
																审核
																</button>
																<button type="button" class="btn btn-primary myclass5" id="<?php echo $row["id"]; ?>" onclick="dianji1(this.id);">
																删除
																</button>
																<button type="button" class="btn btn-primary myclass7" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal19" onclick="tuih1(this.id);">
																退会
																</button>
																<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
																打印
																</button></td>
														</tr>

														<?php  }else { ?>
														<tr class="even gradeC " >
															<td><?php echo $i++; ?></td>
															<td><?php echo $row["企业名称"]?></td>

															<td class="center"><?php echo "本地会员"?></td>
															<td class="center" name="panduan"><?php echo $row["会员状态"]?></td>
															<td class="center">
																<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">
																查看
																</button>
																<button type="button"  id="<?php echo $row["会员标记码"]; ?>" class="btn btn-primary myclass1" data-toggle="modal" data-target="#myModal4" onclick="sh1(this.id)">
																审核
																</button>
																<button type="button" class="btn btn-primary myclass2"  id="<?php echo $row["id"]; ?>"onclick="dianji(this.id);">
																删除
																</button>
																<button type="button" class="btn btn-primary myclass8" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal18" onclick="tuih(this.id)">
																退会
																</button>
																<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
																打印
																</button></td>
														</tr>

														<?php }
	}
														?>

													</tbody>
												</table>

												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none " id="bdhyys" >

													<thead>
														<tr>
															<th>序号</th>
															<th>会员名称</th>

															<th>会员类型</th>
															<th>审核状态</th>
															<th>操作</th>
														</tr>
													</thead>

													<tbody id="" class="">
														<?php
														require("conn.php");
														//$yhtag=$_SESSION["yhtag"];
														$sql = "select * from 本地会员";
														$result = $conn->query($sql);
														$i=1;
														while($row = $result->fetch_assoc()) {
														
														?>
														<tr class="odd gradeX "  >
														<td><?php echo $i++; ?></td>
														<td><?php echo $row["企业名称"]?></td>
														
														<td class="center"><?php echo "本地会员"?></td>
														<td class="center" name="panduan"><?php echo $row["会员状态"]?></td>
														<td class="center">
														<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="mtk(this.id);">
														查看
														</button>
														<button type="button"  id="<?php echo $row["会员标记码"]; ?>" class="btn btn-primary myclass1" data-toggle="modal" data-target="#myModal4" onclick="sh1(this.id)">
														审核
														</button>
														<button type="button" class="btn btn-primary myclass2"  id="<?php echo $row["id"]; ?>"onclick="dianji(this.id);">
														删除
														</button>
														<button type="button" class="btn btn-primary myclass8" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal18" onclick="tuih(this.id)">
														退会
														</button>
														<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
														打印
														</button></td>
														</tr>

														<?php }
	$conn->close();
														?>
													</tbody>
												</table>

												<!--</div>-->
												<!--<div class="   my_none "  >-->

												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fade my_none " id="wdhyys" >

													<thead>
														<tr>
															<th>序号</th>
															<th>会员名称</th>

															<th>会员类型</th>
															<th>审核状态</th>
															<th>操作</th>
														</tr>
													</thead>

													<tbody id="" class=" ">
														<?php
															require("conn.php");
															//								           $yhtag=$_SESSION["yhtag"];
															$sql = "select * from 外地会员  ";
															$result = $conn->query($sql);
															while($row = $result->fetch_assoc()) {
															
															?>
															<tr class="even gradeC">
															<td><?php echo $i++; ?></td>
															<!--<td><input type="checkbox"></td>-->
															<td><?php echo $row["企业名称"]?></td>
															
															<td class="center"><?php echo "外地会员"?></td>
															<td class="center" name="panduan1"><?php echo $row["会员状态"]?></td>
															<td class="center">
															<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal3" onclick="wd(this.id);">
															查看
															</button>
															<button type="button" class="btn btn-primary myclass4" id="<?php echo $row["会员标记码"]; ?>"data-toggle="modal" data-target="#myModal5" onclick="sh2(this.id)">
															审核
															</button>
															<button type="button" class="btn btn-primary myclass5" id="<?php echo $row["id"]; ?>" onclick="dianji1(this.id);">
															删除
															</button>
															<button type="button" class="btn btn-primary myclass7" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal19" onclick="tuih1(this.id);">
															退会
															</button>
															<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
															打印
															</button></td>
															
															</tr>
															<?php }
																}else if($qx == 1){
																$sql = "select * from 本地会员 where 会员标记码 = '$yhtag'";
																$result = $conn->query($sql);
																while($row = $result->fetch_assoc()){
															?>
															<tr class="odd gradeX "  >
															<td><?php echo $i++; ?></td>
															<td><?php echo $row["企业名称"]?></td>
															
															<td class="center"><?php echo "本地会员"?></td>
															<td class="center" name="panduan"><?php echo $row["会员状态"]?></td>
															<td class="center">
															<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal6" onclick="mtk1(this.id);">
															查看
															</button>
															<button type="button"  id="<?php echo $row["会员标记码"]; ?>" class="btn btn-primary myclass1" data-toggle="modal" data-target="#myModal4" onclick="sh1(this.id)">
															审核
															</button>
															<button type="button" class="btn btn-primary myclass2"  id="<?php echo $row["id"]; ?>"onclick="dianji(this.id);">
															删除
															</button>
															<button type="button" class="btn btn-primary myclass8" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal18" onclick="tuih(this.id)">
															退会
															</button>
															<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
															打印
															</button></td>
															</tr>
															<?php
															}
															}else if($qx==2){
															$sql = "select * from 外地会员 where 会员标记码 = '$yhtag'";
															$result = $conn->query($sql);
															while($row = $result->fetch_assoc()){
															?>
															<tr class="even gradeC">
															<td><?php echo $i++; ?></td>
															<!--<td><input type="checkbox"></td>-->
															<td><?php echo $row["企业名称"]?></td>
															
															<td class="center"><?php echo "外地会员"?></td>
															<td class="center" name="panduan1"><?php echo $row["会员状态"]?></td>
															<td class="center">
															<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal7" onclick="mtk2(this.id);">
															查看
															</button>
															<button type="button" class="btn btn-primary myclass4" id="<?php echo $row["会员标记码"]; ?>"data-toggle="modal" data-target="#myModal5" onclick="sh2(this.id)">
															审核
															</button>
															<button type="button" class="btn btn-primary myclass5" id="<?php echo $row["id"]; ?>" onclick="dianji1(this.id);">
															删除
															</button>
															<button type="button" class="btn btn-primary myclass7" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal19" onclick="tuih1(this.id);">
															退会
															</button>
															<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
															打印
															</button></td>
															
															</tr>
															<?php
															}
															}else{
																$sql = "select * from 项目申报 where 会员标记码 = '$yhtag'";
															$result = $conn->query($sql);
															while($row = $result->fetch_assoc()){
															?>
															<tr class="even gradeC">
															<td><?php echo $i++; ?></td>
															<!--<td><input type="checkbox"></td>-->
															<td><?php echo $row["项目名称"]?></td>
															
															<td class="center"><?php echo "项目申报"?></td>
															<td class="center" name="panduan1"><?php echo $row["申报类型"]?></td>
															<td class="center">
															<button type="button" id="<?php echo $row["id"]; ?>"   class="btn btn-primary myclass3" data-toggle="modal" data-target="#myModal10" onclick="mtk3(this.id);">
															查看
															</button>
															<button type="button" class="btn btn-primary myclass4" id="<?php echo $row["会员标记码"]; ?>"data-toggle="modal" data-target="#myModal5" onclick="sh2(this.id)">
															审核
															</button>
															<button type="button" class="btn btn-primary myclass5" id="<?php echo $row["id"]; ?>" onclick="dianji1(this.id);">
															删除
															</button>
															<button type="button" class="btn btn-primary myclass7" id="<?php echo $row["会员标记码"]; ?>" data-toggle="modal" data-target="#myModal19" onclick="tuih1(this.id);">
															退会
															</button>
															<button id="<?php echo $row["会员标记码"]; ?>" name="print" type="button" class="btn btn-primary">
															打印
															</button></td>
															
															</tr>
															
															<?php
															}
														}
														?>
													</tbody>

												</table>

												<!--</div>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--新增会员-->
					<!--模态框1-->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">会员登记</h4>
								</div>
								<div class="btn-group " >
									<button type="button " class=" btn  btn-large" data-toggle="dropdown">
									选择
									<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li class="lii lii0 ">
											<a href="#bdhy" tabindex="-1" data-toggle="tab">
												本地会员
											</a>
										</li>
										<li class="lii lii1 ">
											<a href="#wdhy" tabindex="-1" data-toggle="tab">
												外地会员
											</a>
										</li>
									</ul>
								</div>
								&nbsp;
								<div class="btn-group tab-pane fade my_none "  id="bdhy">
									<form id="bdhyform" name="bdhyform" action="" method="post" class="" role="form" >
										<div class="modal-body">
											<div class="form-group">
												<label for="djrq2" class="span2 control-label">登记日期：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="djrq2" name="djrq2" placeholder="">
												</div>
												<label for="hybh2" class="span2 control-label">会员编号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="hybh2" name="hybh2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="qymc2" class="span2 control-label">企业名称：</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="qymc2" name="qymc2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="qydz2" class="span2 control-label">企业地址：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="qydz2" name="qydz2" placeholder="">
												</div>
												<label for="yzbh2" class="span2 control-label">邮政编号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="yzbh2" name="yzbh2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="qywz2" class="span2 control-label">企业网址：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="qywz2" name="qywz2" placeholder="">
												</div>
												<label for="dzyx2" class="span2 control-label">电子邮箱：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="dzyx2" name="dzyx2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="gszch2" class="span2 control-label">工商注册号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gszch2" name="gszch2" placeholder="">
												</div>
												<label for="zczj2" class="span2 control-label">注册资金：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="zczj2" name="zczj2" placeholder="">
												</div>
											</div>
											&nbsp;
											<div class="form-group">
												<label for="zzzsbh2" class="span2 control-label">资质证书编号：</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zzzsbh2" name="zzzsbh2" placeholder="">
												</div>
											</div>
											&nbsp;
											<div class="form-group">
												<label for="djfw2" class="span12 control-label">资质证书等级范围：</label>
											</div>
											<div class="form-group">
												<label for="zxzz2" class="span2 control-label">主项资质:</label>
												<div class="span4">
													<textarea rows="5" class="span12" id="zxzz2"  name="zxzz2"></textarea>
												</div>
												<label for="fxzz2" class="span2 control-label">副项资质:</label>
												<div class="span4">
													<textarea rows="5" class="span12" id="fxzz2" name="fxzz2"></textarea>
												</div>
											</div>

											&nbsp;
											<div class="form-group">
												<label for="qyfr2" class="span2 control-label">企业法人：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="qyfr2" name="qyfr2" placeholder="">
												</div>
												<label for="qydh2" class="span2 control-label">企业电话：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="qydh2" name="qydh2" placeholder="">
												</div>
												<label for="czhm2" class="span2 control-label">传真号码：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="czhm2" name="czhm2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="dsz2" class="span2 control-label">董事长：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="dsz2" name="dsz2" placeholder="">
												</div>
												<label for="dszlxdh2" class="span2 control-label">联系电话：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="dszlxdh2" name="dszlxdh2" placeholder="">
												</div>
												<label for="dszsjhm2" class="span2 control-label">手机号码：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="dszsjhm2" name="dszsjhm2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="zjl2" class="span2 control-label">总经理：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zjl2" name="zjl2" placeholder="">
												</div>
												<label for="zjllxdh2" class="span2 control-label">联系电话：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zjllxdh2" name="zjllxdh2" placeholder="">
												</div>
												<label for="zjlsjhm2" class="span2 control-label">手机号码：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zjlsjhm2" name="zjlsjhm2" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="lxr2" class="span2 control-label">联系人：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="lxr2" name="lxr2" placeholder="">
												</div>
												<label for="zw2" class="span2 control-label">职务：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zw2" name="zw2" placeholder="">
												</div>
												<label for="lxrsjhm2" class="span2 control-label">手机号码：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="lxrsjhm2" name="lxrsjhm2" placeholder="">
												</div>
												<label class="span12 control-label  ">声明:作为会员，本企业将遵守协会章程，履行会员义务，共同为推动行业的发展
												<br>
												&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而努力</label>

												<label class="span4 control-label">备注:1、填写《入会申请表》一式两份。
												<br>
												&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、附交（工商营业执照、资质证书复印件加盖公章）各一份。 </label>
												<div class="hidden">
													<label for="hyzt2" class="span2 control-label">会员状态：</label>
													<div class="span2">
														<input type="text" class="span12 form-control" id="hyzt2" name="hyzt2" placeholder="" value="待审核">
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
											取消
											</button>
											<button type="button" id="save1" class="btn btn-primary" onclick="window.location.reload()">
											保存
											</button>
										</div>
									</form>
								</div>
								<div class="btn-group tab-pane fade my_none "  id="wdhy">
									<form id="wdhyform" name="wdhyform" action="" method="post" class="" role="form" >
										<div class="modal-body">
											<div class="form-group">
												<label for="djrq3" class="span2 control-label">登记日期：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="djrq3" name="djrq3" placeholder="">
												</div>

												<label for="wdhybh3" class="span2 control-label">会员编号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="wdhybh3" name="wdhybh3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="dwmc3" class="span2 control-label">企业名称：</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="dwmc3" name="dwmc3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xxdz3" class="span2 control-label">企业地址：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xxdz3" name="xxdz3" placeholder="">
												</div>
												<label for="yzbh3" class="span2 control-label">邮政编号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="yzbh3" name="yzbh3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="qywz3" class="span2 control-label">企业网址：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="qywz3" name="qywz3" placeholder="">
												</div>
												<label for="qyyx3" class="span2 control-label">电子邮箱：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="qyyx3" name="qyyx3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="gszc3" class="span2 control-label">工商注册号：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="gszc3" name="gszc3" placeholder="">
												</div>
												<label for="zczj3" class="span2 control-label">注册资金：</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="zczj3" name="zczj3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="zzzsbh3" class="span2 control-label">资质证书编号：</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="zzzsbh3" name="zzzsbh3" placeholder="">
												</div>

											</div>
											&nbsp;

											<div class="form-group">
												<label for="djfw3" class="span12 control-label">资质证书等级范围：</label>
											</div>
											<div class="form-group">
												<label for="zxzz3" class="span2 control-label">主项资质:</label>
												<div class="span4">
													<textarea rows="5" class="span12" id="zxzz3" name="zxzz3"></textarea>
												</div>
												<label for="fxzz3" class="span2 control-label">副项资质:</label>
												<div class="span4">
													<textarea rows="5" class="span12" id="fxzz3" name="fxzz3"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for="fddbr3" class="span2 control-label">企业法人：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="fddbr3" name="fddbr3" placeholder="">
												</div>
												<label for="bgdh3" class="span2 control-label">企业电话：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="bgdh3" name="bgdh3" placeholder="">
												</div>
												<label for="czdh3" class="span2 control-label">传真号码：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="czdh3" name="czdh3" placeholder="">
												</div>
											</div>

											<div class="form-group">
												<label for="fzr3" class="span2 control-label">董事长:</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="fzr3" name="fzr3" placeholder="">
												</div>

												<label for="bgdh3" class="span2 control-label ">联系电话:</label>

												<div class="span2">
													<input type="text" class="span12 form-control" id="bgdh3" name="bgdh3" placeholder="">
												</div>
												<label for="zgsjhm1" class="span2 control-label">手机号码</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zgsjhm1" name="zgsjhm1" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="zjl3" class="span2 control-label">总经理:</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zjl3" name="zjl3" placeholder="">
												</div>

												<label for="zjldh3" class="span2 control-label ">联系电话:</label>

												<div class="span2">
													<input type="text" class="span12 form-control" id="zjldh3" name="zjldh3" placeholder="">
												</div>
												<label for="zjlsj3" class="span2 control-label">手机号码</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="zjlsj3" name="zjlsj3" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="txy3" class="span2 control-label">联系人：</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="txy3" name="txy3" placeholder="">
												</div>
												<label for="lxrzw3" class="span2 control-label">职务</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="lxrzw3" name="lxrzw3" placeholder="">
												</div>

												<label for="txysjhm1" class="span2 control-label">手机号码</label>
												<div class="span2">
													<input type="text" class="span12 form-control" id="txysjhm1" name="txysjhm1" placeholder="">
												</div>
											</div>

											<div class="form-group">
												<label class="span2 control-label">备注:1、填写《入会申请表》一式两份。
												<br>
												&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、同意协会章程，按规定交纳会费。
												<br>
												&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、提供在东莞注册《工商营业执照》及《资质证书》复印件各一份。 </label>

												<div class="hidden">
													<label for="hyzt3" class="span2 control-label">会员状态：</label>
													<div class="span2">
														<input type="text" class="span12 form-control" id="hyzt3" name="hyzt3" placeholder="" value="待审核">
													</div>
												</div>
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
											取消
											</button>
											<button type="button" id="save2"   class="btn btn-primary" onclick="window.location.reload()">
											保存
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--模态框1-->

					<!--本地会员-->
					<!--模态框2-->
					<div class="modal fade" id="myModal2" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">本地会员</h4>
								</div>

								<form id="bdxgform" name="bdxgform" action="data/bdxg.php" method="post" class="" enctype="multipart/form-data" role="form" >

									<div class="modal-body">

										<div class="form-group">

											<label for="djrq" class="span2 ">登记日期：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="djrq" name="djrq" value="" >

											</div>
											<label for="hybh" class="span2 control-label">会员编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control " id="hybh" name="hybh" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="qymc" class="span2 control-label">企业名称：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="qymc" name="qymc" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="qydz" class="span2 control-label">企业地址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qydz" name="qydz" placeholder="">
											</div>
											<label for="yzbh" class="span2 control-label">邮政编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="yzbh" name="yzbh" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="qywz" class="span2 control-label">企业网址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qywz" name="qywz" placeholder="">
											</div>
											<label for="dzyx" class="span2 control-label">电子邮箱：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="dzyx" name="dzyx" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="gszch" class="span2 control-label">工商注册号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="gszch" name="gszch" placeholder="">
											</div>
											<label for="zczj" class="span2 control-label">注册资金：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="zczj" name="zczj" placeholder="">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="zzzsbh" class="span2 control-label">资质证书编号：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="zzzsbh" name="zzzsbh" placeholder="">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
										</div>
										<div class="form-group">
											<label for="zxzz" class="span2 control-label">主项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="zxzz" name="zxzz"></textarea>
											</div>
											<label for="fxzz" class="span2 control-label">副项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="fxzz" name="fxzz"></textarea>
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="qyfr" class="span2 control-label">企业法人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="qyfr" name="qyfr" placeholder="">
											</div>
											<label for="qydh" class="span2 control-label">企业电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="qydh" name="qydh" placeholder="">
											</div>
											<label for="czhm" class="span2 control-label">传真号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="czhm" name="czhm" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="dsz" class="span2 control-label">董事长：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="dsz" name="dsz" placeholder="">
											</div>
											<label for="lxdh" class="span2 control-label">联系电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxdh" name="lxdh" placeholder="">
											</div>
											<label for="sjhm" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="sjhm" name="sjhm" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="zjl" class="span2 control-label">总经理：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjl" name="zjl" placeholder="">
											</div>
											<label for="lxdh1" class="span2 control-label">联系电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxdh1" name="lxdh1" placeholder="">
											</div>
											<label for="sjhm1" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="sjhm1" name="sjhm1" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="lxr" class="span2 control-label">联系人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxr" name="lxr" placeholder="">
											</div>
											<label for="zw" class="span2 control-label">职务：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zw" name="zw" placeholder="">
											</div>
											<label for="sjhm2" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control " id="sjhm2" name="sjhm2" placeholder="">
											</div>
										</div>
										<label class="span12 control-label  ">声明:作为会员，本企业将遵守协会章程，履行会员义务，共同为推动行业的发展
										<br>
										&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而努力</label>

										<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。
										<br>
										&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、附交（工商营业执照、资质证书复印件加盖公章）各一份。 </label>
										<input type="text" class="span2 form-control hidden" id="hyid" name="hyid" value="">

										<div class="form-group">
											<div id="container">
												<lable class="span2 control-label" for="myfile">
													工商营业执照:
												</lable><a id="myfile" href="javascript:void(0);" class='btn'>选择文件</a>
												<a id="postfiles" href="javascript:void(0);" class='btn'>重新上传工商营业执照</a>
												<div id="fileDown1" class="span12" >
													<div id="location1" > </div>
												</div>
											</div>
										</div>
										<div id="ossfile"></div>

										<div class="form-group">
											<div id="container">
												<lable class="span2 control-label" for="myfile1">
													资质证书:
												</lable>
												<a id="myfile1" href="javascript:void(0);" class='btn'>选择文件</a>
												<a id="postfiles1" href="javascript:void(0);" class='btn'>重新上传资质证书</a>
													<input id="furl" name="picture" type= "hidden" />
													<input id="furl1" name="picture1" type="hidden"/>
												<div id="fileDown2" class="span12" >
													<div id="location2" ></div>
												</div>
											</div>
										</div>
									</div>
									<div id="ossfile1"></div>
									<div class="modal-footer">
										
										
										</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">
										取消
										</button>
										<button type="submit" class="btn btn-primary">
										保存
										</button>
									</div>

								</form>

							</div>
						</div>
					</div>
					<!--模态框2-->
					<div class="modal fade" id="myModal6" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">本地会员</h4>
								</div>

								<form id="bdxgform" name="bdxgform" action="data/bdxg.php" method="post" class="" role="form" >

									<div class="modal-body">

										<div class="form-group">

											<label for="djrq" class="span2 ">登记日期：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="djrq1" name="djrq" value="" readonly="readonly">

											</div>
											<label for="hybh" class="span2 control-label">会员编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control " id="hybh1" name="hybh" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="qymc" class="span2 control-label">企业名称：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="qymc1" name="qymc" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="qydz" class="span2 control-label">企业地址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qydz1" name="qydz" placeholder="" readonly="readonly">
											</div>
											<label for="yzbh" class="span2 control-label">邮政编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="yzbh1" name="yzbh" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="qywz" class="span2 control-label">企业网址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qywz1" name="qywz" placeholder="" readonly="readonly">
											</div>
											<label for="dzyx" class="span2 control-label">电子邮箱：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="dzyx1" name="dzyx" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="gszch" class="span2 control-label">工商注册号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="gszch1" name="gszch" placeholder="" readonly="readonly">
											</div>
											<label for="zczj" class="span2 control-label">注册资金：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="zczj1" name="zczj" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="zzzsbh" class="span2 control-label">资质证书编号：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="zzzsbh1" name="zzzsbh" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
										</div>
										<div class="form-group">
											<label for="zxzz" class="span2 control-label">主项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="zxzz1" name="zxzz" readonly="readonly"></textarea>
											</div>
											<label for="fxzz" class="span2 control-label">副项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="fxzz1" name="fxzz" readonly="readonly"></textarea>
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="qyfr" class="span2 control-label">企业法人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="qyfr1" name="qyfr" placeholder="" readonly="readonly">
											</div>
											<label for="qydh" class="span2 control-label">企业电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="qydh1" name="qydh" placeholder="" readonly="readonly">
											</div>
											<label for="czhm" class="span2 control-label">传真号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="czhm1" name="czhm" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="dsz" class="span2 control-label">董事长：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="dsz1" name="dsz" placeholder="" readonly="readonly">
											</div>
											<label for="lxdh" class="span2 control-label">联系电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxdh1" name="lxdh" placeholder="" readonly="readonly">
											</div>
											<label for="sjhm" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="sjhm1" name="sjhm" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="zjl" class="span2 control-label">总经理：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjl1" name="zjl" placeholder="" readonly="readonly">
											</div>
											<label for="lxdh1" class="span2 control-label">联系电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxdh2" name="lxdh1" placeholder="" readonly="readonly">
											</div>
											<label for="sjhm1" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="sjhm2" name="sjhm1" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="lxr" class="span2 control-label">联系人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxr1" name="lxr" placeholder="" readonly="readonly">
											</div>
											<label for="zw" class="span2 control-label">职务：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zw1" name="zw" placeholder="" readonly="readonly">
											</div>
											<label for="sjhm2" class="span2 control-label">手机号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control " id="sjhm3" name="sjhm2" placeholder="" readonly="readonly">
											</div>
										</div>
										<label class="span12 control-label  ">声明:作为会员，本企业将遵守协会章程，履行会员义务，共同为推动行业的发展
										<br>
										&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;而努力</label>

										<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。
										<br>
										&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、附交（工商营业执照、资质证书复印件加盖公章）各一份。 </label>
										<input type="text" class="span2 form-control hidden" id="hyid" name="hyid" value="">

										<div class="form-group">

											<lable class="span2 control-label">
												工商营业执照:
											</lable>
											<div id="fileDown1" class="span12" >
												<div id="location1" ></div>
											</div>
										</div>

										<div class="form-group">
											<lable class="span2 control-label">
												资质证书:
											</lable>

											<div id="fileDown2" class="span12" >
												<div id="location2" ></div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">
										取消
										</button>
										<button type="submit" class="btn btn-primary">
										保存
										</button>
									</div>

								</form>

							</div>
						</div>
					</div>
					
					
					

					<!--外地会员-->
					<!--模态框3-->
					<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">外地会员</h4>
								</div>
								<form id="wdhyform" name="wdhyform" action="data/wdxg.php" method="post" enctype="multipart/form-data"  role="form">
				      <div class="modal-body">
										<div class="form-group">
											<label for="djrq1" class="span2 control-label">登记日期：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="djrq1" name="djrq1" placeholder="">
											</div>
											<label for="wdhybh" class="span2 control-label">会员编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="wdhybh" name="wdhybh" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="dwmc" class="span2 control-label">企业名称：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="dwmc" name="dwmc" placeholder="">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="xxdz" class="span2 control-label">企业地址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="xxdz" name="xxdz" placeholder="">
											</div>
											<label for="wdyzbh" class="span2 control-label">邮政编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="wdyzbh" name="wdyzbh" placeholder="">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="qywz1" class="span2 control-label">企业网址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qywz1" name="qywz1" placeholder="">
											</div>
											<label for="qyyx" class="span2 control-label">电子邮箱：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qyyx" name="qyyx" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="gszc1" class="span2 control-label">工商注册号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="gszc1" name="gszc1" placeholder="">
											</div>
											<label for="zczj1" class="span2 control-label">注册资金：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="zczj1" name="zczj1" placeholder="">
											</div>
										</div>
										<div class="span12"></div>
										<div class="form-group">
											<label for="zsbh" class="span2 control-label">资质证书编号：</label>
											<div class="span8">
												<input type="text" class="span12 form-control" id="zsbh" name="zsbh" placeholder="">
											</div>

										</div>

										<div class="form-group">
											<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
										</div>
										<div class="form-group">
											<label for="wdzxzz" class="span2 control-label">主项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="wdzxzz" name="wdzxzz"></textarea>
											</div>
											<label for="wdfxzz" class="span2 control-label">副项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span12" id="wdfxzz" name="wdfxzz"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="fddbr" class="span2 control-label">企业法人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fddbr" name="fddbr" placeholder="">
											</div>
											<label for="bgdh" class="span2 control-label">企业电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="bgdh" name="bgdh" placeholder="">
											</div>

											<label for="wdczdh" class="span2 control-label">传真号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="wdczdh" name="wdczdh" placeholder="">
											</div>

										</div>

										<div class="form-group">
											<label for="fzr" class="span2 control-label">董事长：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fzr" name="fzr" placeholder="">
											</div>
											<label for="fzrbgdh" class="span2 control-label">联系电话</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fzrbgdh" name="fzrbgdh" placeholder="">
											</div>
											<label for="zgsjhm" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zgsjhm" name="zgsjhm" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label for="zjl1" class="span2 control-label">总经理：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjl1" name="zjl1" placeholder="">
											</div>
											<label for="zjllxdh1" class="span2 control-label">联系电话</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjllxdh1" name="zjllxdh1" placeholder="">
											</div>
											<label for="zjlsjhm1" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjlsjhm1" name="zjlsjhm1" placeholder="">
											</div>
										</div>

										<div class="form-group">
											<label for="txy" class="span2 control-label">联系人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="txy" name="txy" placeholder="">
											</div>
											<label for="lxrzw1" class="span2 control-label">职务</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxrzw1" name="lxrzw1" placeholder="">
											</div>
											<label for="txysjhm" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="txysjhm" name="txysjhm" placeholder="">
											</div>
										</div>
										<div class="span12">

											<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。
											<br>
											&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、同意协会章程，按规定交纳会费。
											<br>
											&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、提供在东莞注册《工商营业执照》及《资质证书》复印件各一份。 </label>
										</div>
										<input type="text" class="span2 form-control hidden" id="wdid" name="wdid" value="wdid">
				   <div class="span12">
				                       <div class="form-group">		
										<label class="control-label" for="myfile3">工商营业执照:</label>
							<div id="container">
	                                <a id="myfile3" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles3" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile3"></div>		
										<label class="control-label" for="myfile5">资质证书:</label>
							<div id="container">
	                                <a id="myfile5" href="javascript:void(0);" class='btn'>选择文件</a>
	                               <a id="postfiles5" href="javascript:void(0);" class='btn'>开始上传</a>
                                               </div>
                                               <div id="ossfile5"></div>
                                               <input id="furl3" name="picture3" type= "hidden" />
								             
								              <input id="furl5" name="picture5" type="hidden"/>
											  </div> </div>
										<div class="span12"align="right">
											<button type="button" class="btn btn-default" data-dismiss="modal">
											取消
											</button>
											<button type="submit" class="btn btn-primary">
											保存
											</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--模态框3-->
				
				<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">外地会员</h4>
								</div>
								<form id="wdxgform" name="wdxgform" action="data/wdxg.php" method="post" class="" role="form" >
									<div class="modal-body">
										<div class="form-group">
											<label for="djrq1" class="span2 control-label">登记日期：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="djrq2" name="djrq1" placeholder="" readonly="readonly">
											</div>
											<label for="wdhybh" class="span2 control-label">会员编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="wdhybh2" name="wdhybh" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="dwmc" class="span2 control-label">企业名称：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="dwmc2" name="dwmc" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="xxdz" class="span2 control-label">企业地址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="xxdz2" name="xxdz" placeholder="" readonly="readonly">
											</div>
											<label for="wdyzbh" class="span2 control-label">邮政编号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="wdyzbh2" name="wdyzbh" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="qywz1" class="span2 control-label">企业网址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qywz3" name="qywz1" placeholder="" readonly="readonly">
											</div>
											<label for="qyyx" class="span2 control-label">电子邮箱：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="qyyx2" name="qyyx" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="gszc1" class="span2 control-label">工商注册号：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="gszc3" name="gszc1" placeholder="" readonly="readonly">
											</div>
											<label for="zczj1" class="span2 control-label">注册资金：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="zczj3" name="zczj1" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="span12"></div>
										<div class="form-group">
											<label for="zsbh" class="span2 control-label">资质证书编号：</label>
											<div class="span8">
												<input type="text" class="span12 form-control" id="zsbh2" name="zsbh" placeholder="" readonly="readonly">
											</div>

										</div>

										<div class="form-group">
											<label for="djfw" class="span12 control-label">资质证书等级范围：</label>
										</div>
										<div class="form-group">
											<label for="wdzxzz" class="span2 control-label">主项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span13" id="wdzxzz" name="wdzxzz" readonly="readonly"></textarea>
											</div>
											<label for="wdfxzz" class="span2 control-label">副项资质:</label>
											<div class="span4">
												<textarea rows="5" class="span13" id="wdfxzz" name="wdfxzz" readonly="readonly"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label for="fddbr" class="span2 control-label">企业法人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fddbr2" name="fddbr" placeholder="" readonly="readonly">
											</div>
											<label for="bgdh" class="span2 control-label">企业电话：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="bgdh2" name="bgdh" placeholder="" readonly="readonly">
											</div>

											<label for="wdczdh" class="span2 control-label">传真号码：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="wdczdh3" name="wdczdh" placeholder="" readonly="readonly">
											</div>

										</div>

										<div class="form-group">
											<label for="fzr" class="span2 control-label">董事长：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fzr2" name="fzr" placeholder="" readonly="readonly">
											</div>
											<label for="fzrbgdh" class="span2 control-label">联系电话</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="fzrbgdh2" name="fzrbgdh" placeholder="" readonly="readonly">
											</div>
											<label for="zgsjhm" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zgsjhm2" name="zgsjhm" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="zjl1" class="span2 control-label">总经理：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjl12" name="zjl1" placeholder="" readonly="readonly">
											</div>
											<label for="zjllxdh1" class="span2 control-label">联系电话</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjllxdh3" name="zjllxdh1" placeholder="" readonly="readonly">
											</div>
											<label for="zjlsjhm1" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="zjlsjhm3" name="zjlsjhm1" placeholder="" readonly="readonly">
											</div>
										</div>

										<div class="form-group">
											<label for="txy" class="span2 control-label">联系人：</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="txy2" name="txy" placeholder="" readonly="readonly">
											</div>
											<label for="lxrzw1" class="span2 control-label">职务</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="lxrzw3" name="lxrzw1" placeholder="" readonly="readonly">
											</div>
											<label for="txysjhm" class="span2 control-label">手机号码</label>
											<div class="span2">
												<input type="text" class="span12 form-control" id="txysjhm2" name="txysjhm" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="span12">

											<label class="span12 control-label">备注:1、填写《入会申请表》一式两份。
											<br>
											&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、同意协会章程，按规定交纳会费。
											<br>
											&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、提供在东莞注册《工商营业执照》及《资质证书》复印件各一份。 </label>
										</div>
										<input type="text" class="span2 form-control hidden" id="wdid" name="wdid" value="wdid">

										<div class="form-group">

											<lable class="span2 control-label">
												工商营业执照:
											</lable>
											<div id="fileDown3" class="span12" >
												<div id="location" ></div>
											</div>
										</div>

										<div class="form-group">
											<lable class="span2 control-label">
												资质证书:
											</lable>

											<div id="fileDown5" class="span12" >
												<div id="location5" ></div>
											</div>
										</div>
										<div class="span12"></div>
										<div class="span12"align="right">
											<button type="button" class="btn btn-default" data-dismiss="modal">
											取消
											</button>
											<button type="submit" class="btn btn-primary">
											保存
											</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" >
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
									&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">项目申报会员</h4>
								</div>
								<form id="wdxgform" name="wdxgform" action="data/wdxg.php" method="post" class="" role="form" >
									<div class="modal-body">
										<div class="form-group">
											<label for="dwmc" class="span2 control-label">项目名称：</label>
											<div class="span10">
												<input type="text" class="span12 form-control" id="xmmc" name="xmmc" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="xxdz" class="span2 control-label">项目地址：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="xmdz" name="xmdz" placeholder="" readonly="readonly">
											</div>
											<label for="wdyzbh" class="span2 control-label">联系人：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="lxr5" name="lxr5" placeholder="" readonly="readonly">
											</div>
										</div>
										&nbsp;
										<div class="form-group">
											<label for="qywz1" class="span2 control-label">手机：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="sj" name="sj" placeholder="" readonly="readonly">
											</div>
											<label for="qyyx" class="span2 control-label">邮箱：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="yx" name="yx" placeholder="" readonly="readonly">
											</div>
										</div>
										<div class="form-group">
											<label for="gszc1" class="span2 control-label">施工单位：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="sgdw" name="sgdw" placeholder="" readonly="readonly">
											</div>
											<label for="zczj1" class="span2 control-label">申报类型：</label>
											<div class="span4">
												<input type="text" class="span12 form-control" id="sblx" name="sblx" placeholder="" readonly="readonly">
											</div>
										</div>
										
										
										
										<input type="text" class="span2 form-control hidden" id="sbid" name="sbid" value="sbid">

										

										
										<div class="span12"></div>
										<div class="span12"align="right">
											<button type="button" class="btn btn-default" data-dismiss="modal">
											取消
											</button>
											<button type="submit" class="btn btn-primary">
											保存
											</button>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!--本地审核-->
				<!--模态框4-->
				<div class="modal fade" id="myModal4" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" >
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
								&times;
								</button>
								<h4 class="modal-title" id="myModalLabel">分配帐号密码</h4>
							</div>
							<form id="sh1form" name="sh1form" action="" method="post" class="" role="form" >
								<div class="modal-body">
									<div class="form-group">
										<div class=""></div>
										<label for="qymc1" class="span2 control-label"  >企业名称：</label>
										<div class="span10">
											<input type="text" class="span8 form-control" id="qymc1" name="qymc1" value="" readonly="true">
										</div>
										<div class=""></div>
										<label for="bdzh" class="span2 control-label">分配帐号：</label>
										<div class="span10">
											<input type="text" class="span8 form-control" id="bdzh" name="bdzh" value="" >
										</div>
										<div class=""></div>
										<label for="bdmm" class="span2 control-label">分配密码：</label>
										<div class="span10">
											<input type="password" class="span8 form-control " id="bdmm" name="bdmm" placeholder="">
										</div>
										<div class=""></div>
										<label for="bdqrmm" class="span4 control-label">请确认分配密码：</label>
										<div class="span10">
											<input type="password" class="span8 form-control " id="bdqrmm" name="bdqrmm" placeholder="">
										</div>
										<div class=""></div>
										<label for="bdhybh" class="span4 control-label">分配会员编号：</label>
										<div class="span10">
											<input type="password" class="span8 form-control " id="bdhybh" name="bdhybh" placeholder="">
										</div>
										<div class=""></div>
										<label for="duanxin1" class="span2 control-label">短信发送内容：</label>
										<div class="span4">
											<textarea rows="6" class="span8" id="duanxin1" name="smsContent"></textarea>
										</div>
										<input type="text" class="span4 form-control hidden" id="bdshid" name="bdshid" value="bdshid">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
									取消
									</button>
									<button type="button" id="save5"  class="btn btn-primary" >
									保存
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--模态框4-->
			<!--本地退会-->
			<div class="modal fade" id="myModal18" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
							&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">退会</h4>
						</div>
						<form id="tuihui" name="tuihui" action="data/bdth1.php" method="post" class="" role="form" >
							<div class="modal-body">
								<div class="form-group">
									<label for="thsj" class="span4 control-label">退会时间：</label>
									<div class="span8">
										<input type="date" class="span12 form-control" id="thsj" name="thsj" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="thsy" class="span4 control-label">退会事由：</label>
									<div class="span8">
										<input type="text" class="span12 form-control" id="thsy" name="thsy" value="">
									</div>
								</div>
								<input type="type" class="span12 form-control hidden" id="gcid" name="gcid"value="gcid">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
								</button>
								<button type="submit"   class="btn btn-primary" >
								保存
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--外地退会-->
			<div class="modal fade" id="myModal19" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
							&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">退会</h4>
						</div>
						<form id="tuihui1" name="tuihui1" action="data/wdth1.php" method="post" class="" role="form" >
							<div class="modal-body">
								<div class="form-group">
									<label for="thsj1" class="span4 control-label">退会时间：</label>
									<div class="span8">
										<input type="date" class="span12 form-control" id="thsj1" name="thsj1" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="thsy1" class="span4 control-label">退会事由：</label>
									<div class="span8">
										<input type="text" class="span12 form-control" id="thsy1" name="thsy1" value="">
									</div>
								</div>
								<input type="type" class="span12 form-control hidden" id="gcid1" name="gcid1"value="gcid1">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
								</button>
								<button type="submit"   class="btn btn-primary" >
								保存
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--外地审核-->
			<!--模态框5-->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
							&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">分配帐号密码</h4>
						</div>
						<form id="sh2form" name="sh2form" action="" method="post" class="" role="form" >
							<div class="modal-body">
								<div class="form-group">

									<label for="sqdw" class="span4 control-label">企业名称：</label>
									<div class="span8">
										<input type="text" class="span12 form-control" id="sqdw" name="sqdw" value="" readonly="true">
									</div>
								</div>
								<div class="form-group">
									<label for="wdzh" class="span4 ">分配帐号：</label>
									<div class="span8">
										<input type="text" class="span12 form-control" id="wdzh" name="wdzh" value="" >
									</div>
								</div>
								<div class="form-group">
									<label for="wdmm" class="span4 control-label">分配密码：</label>
									<div class="span8">
										<input type="password" class="span12 form-control " id="wdmm" name="wdmm" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="wdqrmm" class="span4 control-label">请确认分配密码：</label>
									<div class="span8">
										<input type="password" class="span12 form-control " id="wdqrmm" name="wdqrmm" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="whybh" class="span4 control-label">分配会员编号：</label>
									<div class="span8">
										<input type="password" class="span12 form-control " id="whybh" name="whybh" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="duanxin2" class="span2 control-label">短信发送内容：</label>
									<div class="span10">
										<textarea rows="5" class="span12" id="duanxin2" name="smsContent"></textarea>
									</div>
									<input type="text" class="span4 form-control hidden" id="wdshid" name="wdshid" value="wdshid">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
								取消
								</button>
								<button type="button" id="save6"  class="btn btn-primary" >
								保存
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--外地汇总-->
			<div class="modal fade" style="width: 1200px; margin-left:-600px; margin-top: -70px;" id="myModal8" tabindex="-1" role="dialog "  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog " style="width: 1200px;height:600px; overflow: scroll;" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
							&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">汇总</h4>
						</div>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="data/download.php?name=8.xls">
							<button type="button" class="btn btn-default  " >
							下载
							</button>
						</a>
						<div class="block-content collapse in">

							<div class="">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
									<thead>
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
											<th>传真</th>
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
										$sql = "select 企业名称,董事长,董事长联系电话,联系人,联系人手机号码,企业传真号码,邮政编号,企业地址 ,电子邮箱 from 外地会员 where 会员状态='通过'  " ;
										
										//
										$result = $conn->query($sql);
										$i=1;
										while($row = $result->fetch_assoc()) {
										
										?>
										<tr class="odd gradeX">
										
										<td><?php echo $i++ ?></td>
										<td class="center"><?php echo $row["企业名称"]?></td>
										<td class="center"></td>
										<td class="center"></td>
										<td class="center"></td>
										<td><?php echo $row["董事长"]?></td>
										<td><?php echo $row["董事长联系电话"]?></td>
										<td><?php echo $row["联系人"]?></td>
										<td><?php echo $row["联系人手机号码"]?></td>
										<td></td>
										<td><?php echo $row["企业传真号码"]?></td>
										<td><?php echo $row["邮政编号"]?></td>
										<td><?php echo $row["企业地址"]?></td>
										<td><?php echo $row["电子邮箱"]?></td>
										<td></td>
										</tr>
										<?php }
											$conn->close();
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--本地会员-->
			<div class="modal fade" style="width: 1200px; margin-left:-600px; margin-top: -70px;" id="myModal9" tabindex="-1" role="dialog "  aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog " style="width: 1200px;height:600px; overflow: scroll;" >
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
							&times;
							</button>
							<h4 class="modal-title" id="myModalLabel">汇总</h4>
						</div>
						&nbsp;&nbsp;&nbsp;&nbsp
						<a href="data/download.php?name=7.xls">
							<button type="button" class="btn btn-default  " >
							下载
							</button>
						</a>
						<div class="block-content collapse in">

							<div class="">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="">
									<thead>
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
										<td class="center"><?php echo $row["登记日期"]?></td>
										<td class="center"><?php echo $row["主项资质"]?></td>
										<td><?php echo $row["总经理"]?></td>
										<td><?php echo $row["总经理联系电话"]?></td>
										<td><?php echo $row["联系人"]?></td>
										<td><?php echo $row["联系人手机号码"]?></td>
										<td></td>
										<td></td>
										<td><?php echo $row["邮政编号"]?></td>
										<td><?php echo $row["企业地址"]?></td>
										<td><?php echo $row["电子邮箱"]?></td>
										<td></td>
										</tr>
										<?php }
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
		<!--模态框5-->
		

		</div>
		</div>
		</div>
		<footer>
			<p>
				&copy; Vincent Gabriel 2013
			</p>
		</footer>
		</div>
		<!--/.fluid-container-->
		<script src="vendors/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		<script src="assets/scripts.js"></script>
		<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/DT_bootstrap.js"></script>
		<!--连接上传所需的类-->
        <script type="text/javascript" src="vendors/plupload.full.min.js"></script>
		<script type="text/javascript" src="data/upload_file_bd.js"></script>
        <script type="text/javascript" src="data/upload_file_zzzs.js"></script>
        <script type="text/javascript" src="data/upload_file_wd.js"></script>
        
        <script type="text/javascript" src="data/upload_file_wdzs.js"></script>

		<script>$(function() {
	// Easy pie charts

	$('.chart').easyPieChart({
		animate: 1000
	});
});</script>
		<script type="text/javascript">$(function() {
	$(".lii").click(function() {
		//          第一种方法
		$(".lii").removeClass("active"); //删除指定的 class 属性
		$(this).addClass("active"); //向被选元素添加一个或多个类
		$(this).toggleClass("active"); //该函数会对被选元素进行添加/删除类的切换操作
		var text = $(this).text(); //获取当前选中的文本
		//或者使用第二种方法
		//          $(this).addClass("active").siblings().removeClass("active");
	});

	$(".lii0").click(function() {

		$("#bdhy").removeClass("my_none");
		$("#wdhy").addClass("my_none");

	})
	$(".lii1").click(function() {

		$("#wdhy").removeClass("my_none");
		$("#bdhy").addClass("my_none");

	});
	$(".sx2").click(function() {
		$("#wdhyys").removeClass("my_none");
		$("#bdhyys").addClass("my_none");
		$("#qbhyys").addClass("my_none");
	});

	$(".sx1").click(function() {

		$("#bdhyys").removeClass("my_none");
		$("#wdhyys").addClass("my_none");
		$("#qbhyys").addClass("my_none");
	});

	$(".sx0").click(function() {
		$("#qbhyys").removeClass("my_none");

		$("#bdhyys").addClass("my_none");
		$("#wdhyys").addClass("my_none");

	});
})</script>
		<script type="text/javascript">var sbm = document.getElementById("sbm");
//		var myclass8 =document.getElementsByClassName("myclass8");
var myclass9 = document.getElementsByClassName("myclass9");
var myclass0 = document.getElementsByClassName("myclass0");

if(sbm.value == '0') {
	myclass9[0].setAttribute("class", "hidden");
} else {
	myclass0[0].setAttribute("class", "hidden");

}

$("#save1").click(function() {
	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/bdhybc.php',
		data: $('#bdhyform').serialize(), // 你的formid
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			alert("保存成功");
		}
	});
});</script>
		<script type="text/javascript">$("#save2").click(function() {
	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/wdhybc.php',
		data: $('#wdhyform').serialize(), // 你的formid
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			alert("保存成功");
		}
	});
});</script>
		<script type="text/javascript">function cx() {
	var tag = "7";
	//	alert(qssj.value);
	$.ajax({
		cache: true,
		type: "POST",
		url: "test.php",
		data: {

			tag: tag
		},
		async: false,
		dataType: 'json',
		timeout: 10000,
		success: function(data) {},
		error: function(e) {}
	});
}

function cx1() {
	var tag = "8";
	//	alert(qssj.value);
	$.ajax({
		cache: true,
		type: "POST",
		url: "test.php",
		data: {

			tag: tag
		},
		async: false,
		dataType: 'json',
		timeout: 10000,
		success: function(data) {},
		error: function(e) {}
	});
}
var djrq = document.getElementById("djrq");
var hybh = document.getElementById("hybh");
var qymc = document.getElementById("qymc");
var qydz = document.getElementById("qydz");
var yzbh = document.getElementById("yzbh");
var qywz = document.getElementById("qywz");
var dzyx = document.getElementById("dzyx");
var gszch = document.getElementById("gszch");
var zczj = document.getElementById("zczj");
var zzzsbh = document.getElementById("zzzsbh");
var zxzz = document.getElementById("zxzz");
var fxzz = document.getElementById("fxzz");
var qyfr = document.getElementById("qyfr");
var qydh = document.getElementById("qydh");
var czhm = document.getElementById("czhm");
var dsz = document.getElementById("dsz");
var lxdh = document.getElementById("lxdh");
var sjhm = document.getElementById("sjhm");
var zjl = document.getElementById("zjl");
var lxdh1 = document.getElementById("lxdh1");
var sjhm1 = document.getElementById("sjhm1");
var lxr = document.getElementById("lxr");
var zw = document.getElementById("zw");
var sjhm2 = document.getElementById("sjhm2");
var hyid = document.getElementById("hyid");

function mtk(id) {

	//					alert (id);
	var hyid = document.getElementById("hyid");
	hyid.value = id;
	//
	//
	$.ajax({
		type: "POST",
		url: "data/bdcz.php",
		data: {
			hyid: hyid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//							 console.log(data);

			var length = data.length;
			//			console.log(data[0].主项资质);
			for(var i = 0; i < length - 1; i++) {
				djrq.value = data[i].登记日期;
				hybh.value = data[i].会员编号;
				qymc.value = data[i].企业名称;
				qydz.value = data[i].企业地址;
				yzbh.value = data[i].邮政编号;
				qywz.value = data[i].企业网址;
				dzyx.value = data[i].电子邮箱;
				gszch.value = data[i].工商注册号;
				zczj.value = data[i].注册资金;
				zzzsbh.value = data[i].资质证书编号;
				zxzz.value = data[i].主项资质;
				fxzz.value = data[i].副项资质;
				qyfr.value = data[i].企业法人;
				qydh.value = data[i].企业电话;
				czhm.value = data[i].企业传真号码;
				dsz.value = data[i].董事长;
				lxdh.value = data[i].董事长联系电话;
				sjhm.value = data[i].董事长手机号码;
				zjl.value = data[i].总经理;
				lxdh1.value = data[i].总经理联系电话;
				sjhm1.value = data[i].总经理手机号码;
				lxr.value = data[i].联系人;
				zw.value = data[i].联系人职务;
				sjhm2.value = data[i].联系人手机号码;
				//工商营业执照
				var fileDown1 = document.getElementById("fileDown1");

				var child1 = document.getElementById("location1");

				fileDown1.removeChild(child1); //删除指定的div以及子div
				var obj1 = document.createElement("div"); //创建div标签
				fileDown1.appendChild(obj1); //定位obj
				obj1.id = "location1";
				var str1 = data[0].工商营业执照; //这是一字符串
				//				console.log(str1);
				var strs1 = str1.split("||"); //字符分割

				for(i = 0; i < strs1.length - 1; i++) {

					var img1 = document.createElement("img");

					img1.setAttribute("src", strs1[i]);
					img1.setAttribute("style", "width: 150px;height: 100px;");
					obj1.appendChild(img1);
				}

				//资质证书
				var fileDown2 = document.getElementById("fileDown2");

				var child2 = document.getElementById("location2");

				fileDown2.removeChild(child2); //删除指定的div以及子div
				var obj2 = document.createElement("div"); //创建div标签
				fileDown2.appendChild(obj2); //定位obj
				obj2.id = "location2";
				var str2 = data[0].资质证书; //这是一字符串
				var strs2 = str2.split("||"); //字符分割

				for(i = 0; i < strs2.length - 1; i++) {

					var img2 = document.createElement("img");
					img2.setAttribute("src", strs2[i]);
					img2.setAttribute("style", "width: 150px;height: 100px;");
					obj2.appendChild(img2);
				}

				//								hyid.value  =data[i].id;
			}
			//							alert(djrq.value);
		},
		error: function(xhr, type, errorThrown) {
			alert('ajxa错误' + type + '---' + errorThrown);
		}
	});
};

function mtk1(id) {

	//					alert (id);
	var hyid = document.getElementById("hyid");
	hyid.value = id;
	//
	//
	$.ajax({
		type: "POST",
		url: "data/bdcz.php",
		data: {
			hyid: hyid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//							 console.log(data);

			var length = data.length;
			//			console.log(data[0].主项资质);
			for(var i = 0; i < length - 1; i++) {
				djrq1.value = data[i].登记日期;
				hybh1.value = data[i].会员编号;
				qymc1.value = data[i].企业名称;
				qydz1.value = data[i].企业地址;
				yzbh1.value = data[i].邮政编号;
				qywz1.value = data[i].企业网址;
				dzyx1.value = data[i].电子邮箱;
				gszch1.value = data[i].工商注册号;
				zczj1.value = data[i].注册资金;
				zzzsbh1.value = data[i].资质证书编号;
				zxzz1.value = data[i].主项资质;
				fxzz1.value = data[i].副项资质;
				qyfr1.value = data[i].企业法人;
				qydh1.value = data[i].企业电话;
				czhm1.value = data[i].企业传真号码;
				dsz1.value = data[i].董事长;
				lxdh1.value = data[i].董事长联系电话;
				sjhm1.value = data[i].董事长手机号码;
				zjl1.value = data[i].总经理;
				lxdh2.value = data[i].总经理联系电话;
				sjhm2.value = data[i].总经理手机号码;
				lxr1.value = data[i].联系人;
				zw1.value = data[i].联系人职务;
				sjhm3.value = data[i].联系人手机号码;
				//工商营业执照
				var fileDown1 = document.getElementById("fileDown1");

				var child1 = document.getElementById("location1");

				fileDown1.removeChild(child1); //删除指定的div以及子div
				var obj1 = document.createElement("div"); //创建div标签
				fileDown1.appendChild(obj1); //定位obj
				obj1.id = "location1";
				var str1 = data[0].工商营业执照; //这是一字符串
				//				console.log(str1);
				var strs1 = str1.split("||"); //字符分割

				for(i = 0; i < strs1.length - 1; i++) {

					var img1 = document.createElement("img");

					img1.setAttribute("src", strs1[i]);
					img1.setAttribute("style", "width: 150px;height: 100px;");
					obj1.appendChild(img1);
				}

				//资质证书
				var fileDown2 = document.getElementById("fileDown2");

				var child2 = document.getElementById("location2");

				fileDown2.removeChild(child2); //删除指定的div以及子div
				var obj2 = document.createElement("div"); //创建div标签
				fileDown2.appendChild(obj2); //定位obj
				obj2.id = "location2";
				var str2 = data[0].资质证书; //这是一字符串
				var strs2 = str2.split("||"); //字符分割

				for(i = 0; i < strs2.length - 1; i++) {

					var img2 = document.createElement("img");
					img2.setAttribute("src", strs2[i]);
					img2.setAttribute("style", "width: 150px;height: 100px;");
					obj2.appendChild(img2);
				}

				//								hyid.value  =data[i].id;
			}
			//							alert(djrq.value);
		},
		error: function(xhr, type, errorThrown) {
			alert('ajxa错误' + type + '---' + errorThrown);
		}
	});
};</script>
		<script type="text/javascript">var dwmc = document.getElementById("dwmc");
var wdhybh = document.getElementById("wdhybh");
var xxdz = document.getElementById("xxdz");
var wdyzbh = document.getElementById("wdyzbh");
var bgdh = document.getElementById("bgdh");
var wdczdh = document.getElementById("wdczdh");
var qyyx = document.getElementById("qyyx");
var zsbh = document.getElementById("zsbh");
var djrq1 = document.getElementById("djrq1");
var wdzxzz = document.getElementById("wdzxzz");
var wdfxzz = document.getElementById("wdfxzz");
var fddbr = document.getElementById("fddbr");
var qywz1 = document.getElementById("qywz1");
var fzr = document.getElementById("fzr");
var fzrbgdh = document.getElementById("fzrbgdh");
var txy = document.getElementById("txy");
var gszc1 = document.getElementById("gszc1");
var zczj1 = document.getElementById("zczj1");
var txysjhm = document.getElementById("txysjhm");
var zgsjhm = document.getElementById("zgsjhm");
var zjl1 = document.getElementById("zjl1");
var zjllxdh1 = document.getElementById("zjllxdh1");
var zjlsjhm1 = document.getElementById("zjlsjhm1");
var lxrzw1 = document.getElementById("lxrzw1");
//				var hyid =document.getElementById("hyid");
function wd(id) {
	//				alert (id);
	var wdid = document.getElementById("wdid");
	wdid.value = id;
	//				alert(wdid.value);

	$.ajax({
		type: "POST",
		url: "data/wdcz.php",
		data: {
			wdid: wdid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data);
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				dwmc.value = data[i].企业名称;
				wdhybh.value = data[i].会员编号;
				xxdz.value = data[i].企业地址;
				wdyzbh.value = data[i].邮政编号;
				bgdh.value = data[i].企业电话;
				wdczdh.value = data[i].企业传真号码;
				qyyx.value = data[i].电子邮箱;
				zsbh.value = data[i].资质证书编号;
				djrq1.value = data[i].登记日期;
				wdzxzz.value = data[i].主项资质;
				wdfxzz.value = data[i].副项资质;
				fddbr.value = data[i].企业法人;
				qywz1.value = data[i].企业网址;
				fzr.value = data[i].董事长;
				fzrbgdh.value = data[i].董事长联系电话;
				txy.value = data[i].联系人;
				gszc1.value = data[i].工商注册号;
				txysjhm.value = data[i].联系人手机号码;
				zgsjhm.value = data[i].董事长手机号码;
				zczj1.value = data[i].注册资金;
				zjl1.value = data[i].总经理;
				zjllxdh1.value = data[i].总经理联系电话;
				zjlsjhm1.value = data[i].总经理手机号码;
				lxrzw1.value = data[i].联系人职务;

				//						   //总公司营业执照
				var fileDown3 = document.getElementById("fileDown3");

				var child = document.getElementById("location");

				fileDown3.removeChild(child); //删除指定的div以及子div
				var obj = document.createElement("div"); //创建div标签
				fileDown3.appendChild(obj); //定位obj
				obj.id = "location";
				var str = data[0].工商营业执照; //这是一字符串
				var strs = str.split("||"); //字符分割

				for(i = 0; i < strs.length - 1; i++) {

					var img = document.createElement("img");

					img.setAttribute("src", strs[i]);
					img.setAttribute("style", "width: 150px;height: 100px;");
					obj.appendChild(img);
				}

				//资质证书
				var fileDown5 = document.getElementById("fileDown5");
				var child5 = document.getElementById("location5");
				fileDown5.removeChild(child5); //删除指定的div以及子div
				var obj5 = document.createElement("div"); //创建div标签
				fileDown5.appendChild(obj5); //定位obj
				obj5.id = "location5";
				var str5 = data[0].资质证书; //这是一字符串
				var strs5 = str5.split("||"); //字符分割

				for(i = 0; i < strs5.length - 1; i++) {

					var img5 = document.createElement("img");
					img5.setAttribute("src", strs5[i]);
					img5.setAttribute("style", "width: 150px;height: 100px;");
					obj5.appendChild(img5);
				}

			}
			//							alert(djrq.value);
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
};

function mtk2(id) {
	//				alert (id);
	var wdid = document.getElementById("wdid");
	wdid.value = id;
	//				alert(wdid.value);

	$.ajax({
		type: "POST",
		url: "data/wdcz.php",
		data: {
			wdid: wdid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data);
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				dwmc2.value = data[i].企业名称;
				wdhybh2.value = data[i].会员编号;
				xxdz2.value = data[i].企业地址;
				wdyzbh2.value = data[i].邮政编号;
				bgdh2.value = data[i].企业电话;
				wdczdh2.value = data[i].企业传真号码;
				qyyx2.value = data[i].电子邮箱;
				zsbh2.value = data[i].资质证书编号;
				djrq3.value = data[i].登记日期;
				wdzxzz2.value = data[i].主项资质;
				wdfxzz2.value = data[i].副项资质;
				fddbr2.value = data[i].企业法人;
				qywz3.value = data[i].企业网址;
				fzr2.value = data[i].董事长;
				fzrbgdh2.value = data[i].董事长联系电话;
				txy2.value = data[i].联系人;
				gszc3.value = data[i].工商注册号;
				txysjhm2.value = data[i].联系人手机号码;
				zgsjhm2.value = data[i].董事长手机号码;
				zczj3.value = data[i].注册资金;
				zjl13.value = data[i].总经理;
				zjllxdh3.value = data[i].总经理联系电话;
				zjlsjhm3.value = data[i].总经理手机号码;
				lxrzw3.value = data[i].联系人职务;

				//						   //总公司营业执照
				var fileDown3 = document.getElementById("fileDown3");

				var child = document.getElementById("location");

				fileDown3.removeChild(child); //删除指定的div以及子div
				var obj = document.createElement("div"); //创建div标签
				fileDown3.appendChild(obj); //定位obj
				obj.id = "location";
				var str = data[0].工商营业执照; //这是一字符串
				var strs = str.split("||"); //字符分割

				for(i = 0; i < strs.length - 1; i++) {

					var img = document.createElement("img");

					img.setAttribute("src", strs[i]);
					img.setAttribute("style", "width: 150px;height: 100px;");
					obj.appendChild(img);
				}

				//资质证书
				var fileDown5 = document.getElementById("fileDown5");
				var child5 = document.getElementById("location5");
				fileDown5.removeChild(child5); //删除指定的div以及子div
				var obj5 = document.createElement("div"); //创建div标签
				fileDown5.appendChild(obj5); //定位obj
				obj5.id = "location5";
				var str5 = data[0].资质证书; //这是一字符串
				var strs5 = str5.split("||"); //字符分割

				for(i = 0; i < strs5.length - 1; i++) {

					var img5 = document.createElement("img");
					img5.setAttribute("src", strs5[i]);
					img5.setAttribute("style", "width: 150px;height: 100px;");
					obj5.appendChild(img5);
				}

			}
			//							alert(djrq.value);
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
};


function mtk3(id) {
	var xmmc = document.getElementById("xmmc");
	var xmdz = document.getElementById("xmdz");
	var lxr5 = document.getElementById("lxr5");
	var sj   = document.getElementById("sj");
	var yx   = document.getElementById("yx");
	var sgdw = document.getElementById("sgdw");
	var sblx = document.getElementById("sblx");
//					alert (id);
	var sbid = document.getElementById("sbid");
	sbid.value = id;
//					alert(sbid.value);

	$.ajax({
		type: "POST",
		url: "data/xmsb.php",
		data: {
			sbid: sbid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
// 			alert(data.length);
   			console.log(data);
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				xmmc.value = data[i].项目名称;
				xmdz.value = data[i].项目地址;
				lxr5.value = data[i].联系人;
				sj.value = data[i].手机;
				yx.value = data[i].邮箱;
				sgdw.value = data[i].施工单位;
				sblx.value = data[i].申报类型;


			}
//			alert(xmmc.value);
		},
		error: function(X,S,T) {
			console.log(S+"  "+T);
			alert("ajax数据请求失败，请重新加载！");
		}
	});
};
</script>
	</body>
	<script type="text/javascript">function dianji(id) {
	//							alert(id);
	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/bdsc.php',
		data: {
			id1: id
		}, // 你的formid
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			alert("删除成功");
			//				                    window.location.reload();
		}
	});
};

function dianji1(id) {
	//							alert(id);
	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/wdsc.php',
		data: {
			id2: id
		}, // 你的formid
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			alert("删除成功");
			window.location.reload();
		}
	});
};</script>
	<!--<script type="text/javascript">
	$("#save3").click(function(){
	//				alert(hyid.value);
	$.ajax({
	cache: true,
	type: "POST",
	url:'data/bdxg.php',
	data:$('#bdxgform').serialize(),// 你的formid
	async: false,
	error: function(request) {
	alert("Connection error");
	},
	success: function(data) {
	alert("修改成功");
	}
	});
	});
	$("#save4").click(function(){

	$.ajax({
	cache: true,
	type: "POST",
	url:'data/wdxg.php',
	data:$('#wdxgform').serialize(),// 你的formid
	async: false,
	error: function(request) {
	alert("Connection error");
	},
	success: function(data) {
	alert("修改成功");
	}
	});
	});
	</script>-->
	<script type="text/javascript">function tuih(id) {
	var gcid = document.getElementById("gcid");
	gcid.value = id;
	var thsj = document.getElementById("thsj");
	var thsy = document.getElementById("thsy");

	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/bdth.php',
		data: {
			gcid: gcid.value,

		}, // 你的formid
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				thsj.value = data[i].退会时间;
				thsy.value = data[i].退会事由;
			}
			//						 						alert(gcmc.value);
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
}</script>
	<script type="text/javascript">function tuih1(id) {
	var gcid1 = document.getElementById("gcid1");
	gcid1.value = id;
	var thsj1 = document.getElementById("thsj1");
	var thsy1 = document.getElementById("thsy1");

	$.ajax({
		cache: true,
		type: "POST",
		url: 'data/wdth.php',
		data: {
			gcid1: gcid1.value,

		}, // 你的formid
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				thsj1.value = data[i].退会时间;
				thsy1.value = data[i].退会事由;
			}
			//						 						alert(gcmc.value);
		},
		error: function(e) {
			alert("ajax数据请求失败，请重新加载！");
		}
	});
}</script>
	<script type="text/javascript">var bdzh = document.getElementById("bdzh");
var bdmm = document.getElementById("bdmm");
var wdzh = document.getElementById("wdzh");
var wdmm = document.getElementById("wdmm");
var bdshid = document.getElementById("bdshid");
var wdshid = document.getElementById("wdshid");
var qymc1 = document.getElementById("qymc1")

function sh1(id) {
	//							alert(id);
	bdshid.value = id;
	//						alert(bdshid.value)

	$.ajax({
		type: "POST",
		url: "data/bdcz1.php",
		data: {
			bdid: bdshid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data)
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				qymc1.value = data[i].企业名称;

			}
			//							alert(djrq.value);
		},
		error: function(xhr, type, errorThrown) {
			alert('ajxa错误' + type + '---' + errorThrown);
		}
	});
};

$("#save5").click(function() {
	var bdmm = document.getElementById("bdmm");
	var bdqrmm = document.getElementById("bdqrmm");
	var smsContent = document.getElementById("duanxin1");
	var qymc1 = document.getElementById("qymc1");
	var tag = "1";
	if(bdmm.value === bdqrmm.value) {
		$.ajax({
			cache: true,
			type: "POST",
			url: 'Php/SendSms.php',
			data: {
				id1: bdshid.value,
				bdzh: bdzh.value,
				bdmm: bdmm.value,
				bdhybh: bdhybh.value,
				smsContent: duanxin1.value,
				tag: tag,
				qymc1: qymc1.value

			}, // 你的formid
			async: false,
			error: function(request) {
				alert("Connection error");
			},
			success: function(data) {
				alert("审核成功，短信正在发至总经理手机及联系人手机");
				window.location.reload();
			}
		});
	} else {
		alert("两次密码输入不同，请重新输入！")
	}

});

var sqdw = document.getElementById("sqdw");

function sh2(id) {
	//							alert(id);
	wdshid.value = id;
	//						alert(wdshid.value)

	$.ajax({
		type: "POST",
		url: "data/wdcz1.php",
		data: {
			wdid: wdshid.value
		},
		dataType: "json",
		timeout: 10000,
		success: function(data) {
			//				   			alert(data)
			var length = data.length;
			for(var i = 0; i < length - 1; i++) {
				sqdw.value = data[i].企业名称;

			}
			//							alert(djrq.value);
		},
		error: function(xhr, type, errorThrown) {
			alert('ajxa错误' + type + '---' + errorThrown);
		}
	});
};
$("#save6").click(function() {
	var wdmm = document.getElementById("wdmm");
	var wdqrmm = document.getElementById("wdqrmm");
	var smsContent = document.getElementById("duanxin2");
	var tag = "2";
	if(wdmm.value === wdqrmm.value) {
		$.ajax({
			cache: true,
			type: "POST",
			url: 'Php/SendSms.php',
			data: {
				id2: wdshid.value,
				wdzh: wdzh.value,
				wdmm: wdmm.value,
				whybh: whybh.value,
				smsContent: duanxin2.value,
				tag: tag,
				sqdw: sqdw.value

			}, // 你的formid
			async: false,
			error: function(request) {
				alert("Connection error");
			},
			success: function(data) {
				alert(data);
				window.location.reload();
			}
		});
	} else {
		alert("两次密码输入不同,请重新输入！")
	}
});
//  var myclass=document.getElementsByClassName("myclass");
var myclass1 = document.getElementsByClassName("myclass1");
var myclass2 = document.getElementsByClassName("myclass2");

var myclass4 = document.getElementsByClassName("myclass4");
var myclass5 = document.getElementsByClassName("myclass5");
var panduan = document.getElementsByName("panduan");
var panduan1 = document.getElementsByName("panduan1");
for(var i = 0; i < panduan.length; i++) {
	if(panduan[i].innerHTML === '通过') {
		//	  		myclass[i].setAttribute("disabled","disabled");
		myclass1[i].setAttribute("disabled", "disabled");
		myclass1[i].setAttribute("style", "background: #CFCFCF;");

	}
}
for(var i = 0; i < panduan1.length; i++) {
	if(panduan1[i].innerHTML === '通过') {

		myclass4[i].setAttribute("disabled", "disabled");
		myclass4[i].setAttribute("style", "background: #CFCFCF;");

	}
}</script>

	<script type="text/javascript">$("[name='print']").click(function() {
	var dyhytag = this.id;

	$.ajax({
		cache: true,
		type: "POST",
		url: 'hyword.php',
		data: {
			dyhytag: dyhytag
		},
		async: false,
		error: function(request) {
			alert("Connection error");
		},
		success: function(data) {
			if(dyhytag[0] == "1")
				window.open("hyrhdata/" + dyhytag + "_bendi.docx");
			else
				window.open("hyrhdata/" + dyhytag + "_waidi.docx");
		}
	});
});</script>
</html>