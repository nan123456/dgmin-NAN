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
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
		<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<link href="assets/styles.css" rel="stylesheet" media="screen">
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
			$fenge=explode("h","$yhtag");
			$bjm=$fenge[0];
			if($bjm=='1'){
				$sql = "select * from 本地会员 where 会员标记码='$yhtag'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$cjdw=$row["企业名称"];
                }
                		
			}else if($bjm=='2'){
				$sql="select * from 外地会员 where 会员标记码='$yhtag'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$cjdw=$row["申请单位名称"];
				}
				
			}else if($bjm=='3'){
				$sql="select * from 项目申报 where 会员标记码='$yhtag'";
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
		
		<!--headbackground-->
		<div class="row-fluid" id="ImgBackground">
			<input type="text" class="span12 form-control hidden" id="sbm" name="sbm" value="<?php echo $bjm?>" />
			
			
</div>
			<!------->
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span3" id="sidebar">
						<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
							<li>
								<a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
								<ul>
									<li><a href="sqyzj1.php">市优质奖</a></li>
	                            	<li><a href="ssfgd1.php">市示范工地</a></li>
	                            	<li><a href="syzj1.php">省优质奖</a></li>
	                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
	                            	<li><a href="syzqc1.php">省优秀QC</a></li>
	                            	<li><a href="slssg1.php">省绿色施工</a></li>
								</ul>
							</li>
							<li class="active ">
								<a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
								<!--<ul>
									<li>市优质奖</li>
									<li>市示范工地</li>
									<li>省优质奖</li>
									<li>省优质结构奖</li>
									<li>省优秀QC</li>
									<li>省绿色施工</li>
								</ul>-->
							</li>
							<!--<li>
								<a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
							</li>-->
							<li>
								<a href="xx.php"><i class="icon-chevron-right"></i>消息</a>
								<ul>
									<li>发送消息</li>
                            	<li>消息列表<span class="badge badge-info pull-right"><?php echo $rec; ?></span></li>
								<li>已发消息<span class="badge badge-success pull-right"><?php echo $sent; ?></span></li>
								</ul>
							</li>
							<li>
								<a href="sz.php"> 设置</a>
								
							</li>
							<li>
								<a href="czsc.php">操作手册</a>
								
							</li>
							<li>
								<a href="login.php"> 退出</a>
							</li>
						</ul>
					</div>

					<!--/span-->
					<div class="span9" id="content">
						<div class="block" id="Tcontent">
							<div class="row-fluid">
								<ul class="nav navbar-inner block-header  nav-tabs" id="myUl">
									<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>

										<i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
									</li>
									<li >
										<a data-toggle="" href="gctz.php">市优质奖</a>
									</li>
									<li>
										<a data-toggle="" href="ssfgd.php">市示范工地</a>
									</li>
									<li>
										<a data-toggle="" href="syzj.php">省优质奖</a>
									</li>
									<li>
										<a data-toggle="" href="syzjgj.php">省优质结构奖</a>
									</li> 
									<li class="active">
										<a data-toggle="tab" href="#home">省优质QC</a>
									</li>
									<li>
										<a data-toggle="" href="slssg.php">省绿色施工</a>
									</li>
								</ul>
								<div class="tab-content ">
									<div id="home" class="tab-pane fade in active">
										<div class="block ">
											<div class="navbar navbar-inner block-header ">
												<div class="btn-group">
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1"> 新增</button>
													<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 删除</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 提交</button>
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#"> 打印汇总</button>-->

												</div>
											</div>
											<div class="block-content collapse in">
												<div class="span12">
													<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
														<thead>
															<tr>
																<th>序号</th>
																<th class="hidden">会员标记码</th>
																<th class="hidden">工程状态</th>
																<th>工程名称</th>
																<th>承建单位</th>
																<th>施工单位联系人姓名</th>
																<th>联系电话</th>
																<th>操作</th>
															</tr>
														</thead>
														<tbody>
										<?php
						                   require("conn.php");
						                   $yhtag=$_SESSION["yhtag"];
//						                   $id=$_GET["id"];
						                   if($bjm=='1'){
						                   	$sql="select * from 省优秀qc where 会员标记码='$yhtag' or 承建单位='$cjdw' ";
						                   }else if ($bjm=='2'){
						                   	$sql="select * from 省优秀qc where 会员标记码='$yhtag' or 承建单位='$cjdw'";
						                   }else if($bjm=='3') {
						                   	$sql="select * from 省优秀qc where 会员标记码='$yhtag' ";
						                   }
						                   $result = $conn->query($sql);
										   $i=1;
						                   while($row = $result->fetch_assoc()) {
						                         					
						                ?>
																<tr class="odd gradeX" >
																	<td>
																		<?php echo $i++;?>
																	</td>
																	<td class="hidden"><?php echo $bjm ?></td>
																	<td class="hidden" name="gcztdsl"><?php echo $row["工程状态"]?></td>
																	<td>
								
																			<?php echo $row["工程名称"]?>
																		
																	</td>
																	<td class="center">
																		<?php echo $row["承建单位"]?>
																	</td>
																	<td class="center">
																		<?php echo $row["施工单位联系人"]?>
																	</td>
																	<td class="center">
																		<?php echo $row["施工单位联系人手机"]?>
																	</td>
																	<td class="center" id="btn">
																		<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass" data-toggle="modal" data-target="#myModal2" onclick="dianji(this.id);" name="xiugai">
																			申报
																		</button>
																		<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass1" onclick="shanchu(this.id);" >删除</button>
																		<button id="<?php echo $row["id"];?>" type="button" class="btn btn-primary myclass4" onclick="tijiao(this.id);">提交</button>
																		
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
									</div>

									

									
									
									

								</div>
							</div>
						</div>
						<!--模态框1-->
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">新增</h4>
									</div>
									<form id="bdhyform" name="bdhyform" action="data/syzqcxz.php" method="post" enctype="multipart/form-data"  role="form">
										<input id="gcfl" value="省优质QC" name="gcfl" class="hidden" />
										<input id="gczt" value="" name="" class="hidden" />
										<input class="hidden" id="hybjm" name="hybjm" value="<?php echo $yhtag;?>">
										<div class="modal-body">
											<div class="form-group">
												<label for="gcmc" class="span2 control-label">工程名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcmc" name="gcmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="gcdz" class="span2 control-label">项目地址(镇街村)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="gcdz" name="gcdz" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="sbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="date" class="span12 form-control" id="sbrq" name="sbrq" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label for="cjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="cjdw" name="cjdw" placeholder="" readonly="true" value="<?php echo $cjdw ?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="cjlxr" class="span2 control-label" style="font-size: 13px;">施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxr" name="cjlxr" placeholder="">
												</div>
												<label for="cjlxrdh" class="span2 control-label " style="font-size: ;">联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh" name="cjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<!--&nbsp;
											<div class="form-group">
												<label for="cjdw1" class="span4 control-label">参建单位</label>
												<div class="span8">
													<input type="text" class="span12 form-control" id="cjdw1" name="cjdw1" placeholder="">
												</div>
											</div>-->
											<div class="form-group">
												<label for="xzmc" class="span2 control-label">小组名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xzmc" name="xzmc" placeholder="">
												</div>
											</div>
											
											<!--<div class="form-group">
												<label for="cjlxr1" class="span2 control-label" style="font-size: 13px;">联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="cjlxr1" name="cjlxr1" placeholder="">
												</div>
												<label for="cjlxrdh1" class="span3 control-label " style="font-size: 12px;">联系人电话/手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="cjlxrdh1" name="cjlxrdh1" placeholder="">
												</div>
											</div>-->
											<div class="form-group">
												<label for="ktmc" class="span2 control-label">课题名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="ktmc" name="ktmc" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="ktlx" class="span2 control-label">课题类型</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="ktlx" name="ktlx" placeholder="">
												</div>
											</div>
											<!--<div class="form-group">
												<label for="jllxr" class="span2 control-label">联系人</label>
												<div class="span3">
													<input type="text" class="span12 form-control" id="jllxr" name="jllxr" placeholder="">
												</div>
												<label for="jllxrdh" class="span2 control-label" >联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="jllxrdh" name="jllxrdh" placeholder="">
												</div>
											</div>-->
											<div class="form-group">
												<label for="ktksrq" class="span2 control-label">课题开始日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="ktksrq" name="ktksrq" placeholder="">
												</div>
											</div>
												<div class="form-group">
												<label for="ktjsrq" class="span2 control-label">课题结束日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="ktjsrq" name="ktjsrq" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											
											<div class="form-group">
												<label for="fbr" class="span2 control-label">发表人</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="fbr" name="fbr" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="txdz" class="span2 control-label">通讯地址</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="txdz" name="txdz" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="span2 control-label">E-mail</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="email" name="email" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="beizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="beizhu" name="beizhu" placeholder=""  />
												</div>
											</div>
											<div class="span12">
											<div class="form-group">
						<label class="control-label" for="myfile">中标通知书或合同有效部分:</label>
							<input class="input-file uniform_on" id="myfile[]" name="myfile[]" type="file" multiple="multiple">
							</div>
                              </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save1">保存</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!--模态框1-->
						<!--模态框2-->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">申报</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="data/syzqcbc.php" method="post" class="" role="form" enctype="multipart/form-data" >
									
										<input id="gcfl" value="省优秀QC" name="syxqc" class="hidden" />
										<input id="gczt" value="" name="" class="hidden" />
<!--//										<input class="hidden " id="hybjm" name="hybjm" value="<?php echo $yhtag;?>"-->
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
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgsbrq" class="span2 control-label">申报日期</label>
												<div class="span10">
													<input type="date" class="span12 form-control" id="xgsbrq" name="xgsbrq" placeholder="" />
												</div>
											</div>
											<div class="form-group">
												<label for="xgcjdw" class="span2 control-label">承建单位(申报)</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgcjdw" name="xgcjdw" placeholder=""readonly="true" value="<?php echo $cjdw?>">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgcjlxr" class="span2 control-label" style="font-size: 13px;">施工单位联系人</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxr" name="xgcjlxr" placeholder="">
												</div>
												<label for="xgcjlxrdh" class="span2 control-label " style="font-size: ;">联系人手机</label>
												<div class="span4">
													<input type="text" class="span12 form-control" id="xgcjlxrdh" name="xgcjlxrdh" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											<div class="form-group">
												<label for="xgxzmc" class="span2 control-label">小组名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgxzmc" name="xgxzmc" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktmc" class="span2 control-label">课题名称</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktmc" name="xgktmc" placeholder="">
												</div>
												
											</div>
											<div class="form-group">
												<label for="xgktlx" class="span2 control-label">课题类型</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgktlx" name="xgktlx" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgktksrq" class="span2 control-label">课题开始日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktksrq" name="xgktksrq" placeholder="">
												</div>
											</div>
												<div class="form-group">
												<label for="xgktjsrq" class="span2 control-label">课题结束日期</label>
												<div class="span4">
													<input type="date" class="span12 form-control" id="xgktjsrq" name="xgktjsrq" placeholder="">
												</div>
												<div class="span12">
								                </div>
											</div>
											
											<div class="form-group">
												<label for="xgfbr" class="span2 control-label">发表人</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgfbr" name="xgfbr" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgtxdz" class="span2 control-label">通讯地址</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgtxdz" name="xgtxdz" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgemail" class="span2 control-label">E-mail</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgemail" name="xgemail" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label for="xgbeizhu" class="span2 control-label">备注</label>
												<div class="span10">
													<input type="text" class="span12 form-control" id="xgbeizhu" name="xgbeizhu" placeholder=""  />
												</div>
											</div>
										  <div class="span12">
				                           <lable class="span2 control-label">通知书或合同:</lable> 
				                            <div  id="fileDown1">
				                            	<div id="local"></div>
				              	            </div>
				              	          </div>
				              	          
				              	          <div class="span12">
										   <div class="form-group">
						                     <label class="control-label" for="myfile1">中标通知书或合同有效部分:</label>
							                  <input class="input-file uniform_on" id="myfile1[]" name="myfile1[]" type="file" multiple="multiple">
							               </div>
                                          </div>
											<input class="hidden" id="gcid" name="gcid"/> 

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="submit" class="btn btn-primary" id="save2">保存</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--模态框2-->
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

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
		</script>
		<!--修改-->
		<script type="text/javascript">
			function dianji(id){
//				alert(id);
				var gcid=document.getElementById("gcid");
				gcid.value=id;
//				alert(gcid.value);

				//		
				//
								
				var xggcmc = document.getElementById("xggcmc");
				var xggcdz = document.getElementById("xggcdz");
				var xgsbrq = document.getElementById("xgsbrq");
				var xgcjdw = document.getElementById("xgcjdw");
				var xgcjlxr = document.getElementById("xgcjlxr");
				var xgcjlxrdh = document.getElementById("xgcjlxrdh");
				var xgxzmc = document.getElementById("xgxzmc");
				var xgktmc = document.getElementById("xgktmc");
				var xgktlx = document.getElementById("xgktlx");
				var xgktksrq = document.getElementById("xgktksrq");
				var xgktjsrq = document.getElementById("xgktjsrq");
				var xgfbr = document.getElementById("xgfbr");
				var xgtxdz = document.getElementById("xgtxdz");
				var xgemail = document.getElementById("xgemail");
				var xgbeizhu =document.getElementById("xgbeizhu");
				
				
							
				$.ajax({
					type:"POST",
					url:"data/syzqcxgduqu.php",
					data:{
						gcid:gcid.value
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
							xgcjlxr.value = data[i].施工单位联系人;
							xgcjlxrdh.value = data[i].施工单位联系人手机;
							xgxzmc.value = data[i].小组名称;
							xgktmc.value = data[i].课题名称;
							xgktlx.value = data[i].课题类型;
							xgktksrq.value = data[i].课题开始日期;
							xgktjsrq.value = data[i].课题结束日期;
							xgfbr.value = data[i].发表人;
							xgtxdz.value = data[i].通讯地址;
							xgemail.value = data[i].email;
							xgbeizhu.value =data[i].备注;
							
							var str=data[0].通知书或合同;//一串字符串
							var strs=str.split("||");//分割
						var fileDown1 =document.getElementById("fileDown1");
						var local =document.getElementById("local");
						fileDown1.removeChild(local);//移除id=local的div
						var obj=document.createElement("div");//新建div
						fileDown1.appendChild(obj);//定位新建div的位置
						obj.id="local";//设置obj的id
						for(i=1;i<strs.length;i++){
							var fujian="data/"+strs[i];
							var img=document.createElement("img");//创建img标签
							obj.appendChild(img);//定位img标签
							//设置img属性
							img.setAttribute("src",fujian);
							img.setAttribute("style","width:150px;height:100px");
						}
						}
//						 						alert(gcmc.value); 
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
				});
			};
		</script>
		<!--<script type="text/javascript">
			var navTabs = document.getElementsByClassName("nav-tabs");
			var gcfl = document.getElementById("gcfl");
			//      	alert(navTabs[0].innerHTML)
			var myLi = navTabs[0].getElementsByTagName("li");
			for(var i = 1; i < myLi.length; i++) {
				myLi[i].onclick = function() {
					var myValue = this.getElementsByTagName("a")[0].innerHTML;
					gcfl.value = myValue;
					//					
				}
			}
		</script>-->
			
		<!--<script type="text/javascript">
			//保存
			$("#save1").click(function() {
//								alert($('#bdhyform').serialize())
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/syzqcxz.php',
					data:$('#bdhyform').serialize(),
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						window.location.reload();
					}
				});
			});
		</script>-->
		<!--修改后保存-->
		<!--<script type="text/javascript">
			$("#save2").click(function() {
//							alert(xggcmc.value)
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/syzqcbc.php',
					data:$('#bdhyform1').serialize(), // 你的formid
					async: false,
					error: function(request) {
						alert("Connection error");
					},
					success: function(data) {
						alert("保存成功");
						window.location.reload(); 
					}
				});
			});
		</script>-->
		<!--删除按钮-->
		<script type="text/javascript">
			function shanchu(id) { 
//				alert(id);
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/syzqcsc.php',
					data: {
						id1: id
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

			};
		</script>
		
		<!--提交按钮-->
		
		<script type="text/javascript">
			
			function tijiao(id){
				
//				alert(id);
//				var btn =document.getElementById("btn");
//				var xiugai = document.getElementsByName("xiugai");
//				alert(111+"  "+b);
//				xiugai.disabled=true;
				
				$.ajax({
					cache: true,
					type: "POST",
					url: 'data/syzqctj.php',
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
			
			var gcztdsl=document.getElementsByName("gcztdsl");
			var myclass =document.getElementsByClassName("myclass");
			var myclass1 =document.getElementsByClassName("myclass1");
			var myclass4 =document.getElementsByClassName("myclass4");
//			
			for(var i=0;i<gcztdsl.length;i++){
//				alert(gcztdsl[i].innerHTML);
	  			if(gcztdsl[i].innerHTML=="待受理"||gcztdsl[i].innerHTML=="已受理"||gcztdsl[i].innerHTML=="已退件"){
	  			myclass[i].setAttribute("disabled","disabled");
	  		    myclass[i].setAttribute("style","background: #CFCFCF;");
	  			myclass1[i].setAttribute("disabled","disabled");
	  			myclass1[i].setAttribute("style","background: #CFCFCF;");
	  			
	  	       	myclass4[i].setAttribute("disabled","disabled");
	  			myclass4[i].setAttribute("style","background: #CFCFCF;");
	  			}
	  		}
		</script>

	</body>

	</html>