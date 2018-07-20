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
		<link rel="stylesheet" href="vendors/jstree/dist/themes/default/style.min.css" />
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
			$fenge=explode("h",$yhtag);
			$bjm=$fenge[0];
			
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
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
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
    		?>
		<!--headbackground-->
		<div class="row-fluid" id="ImgBackground">
        	<!--<input type="text" id="sbm" name="sbm" value="<?php echo $bjm ?>" class="" >-->
			
		</div>
		<!------->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3" id="sidebar">
					<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
						<li>
							<a href="xmgl.php"><i class="icon-chevron-right"></i> 项目管理</a>
							<ul class="">
                            	<li><a href="sqyzj1.php">市优质奖</a></li>
                            	<li><a href="ssfgd1.php">市示范工地</a></li>
                            	<li><a href="syzj1.php">省优质奖</a></li>
                            	<li><a href="syzjgj1.php">省优质结构奖</a></li>
                            	<li><a href="syzqc1.php">省优秀QC</a></li>
                            	<li><a href="slssg1.php">省绿色施工</a></li>
                            </ul>
						</li>
						<li class="myclass9">
							<a href="gctz.php"><i class="icon-chevron-right"></i> 工程台账</a>
							
						</li>
						<li class="myclass0">
							<a href="hyrh.php"><i class="icon-chevron-right"></i>会员入会</a>
						</li>
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
						<li class="active">
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
						<li class="myclass7">
                            <a href="cx.php">管理员功能</a>
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
							<ul class="nav navbar-inner block-header  nav-tabs">
								<li><i class="icon-chevron-left hide-sidebar" style="display: inline-block;"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                                    <i class="icon-chevron-right show-sidebar" style="display: none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
									
								</li>
								<li class="active">
									<a data-toggle="tab" href="#home">发送消息</a>
								</li>
								<li>
									<a data-toggle="tab" href="#menu1">消息列表</a>
								</li>
								<li>
									<a data-toggle="tab" href="#menu2">已发消息</a>
								</li>
							</ul>
							<div class="tab-content ">
								<div id="home" class="tab-pane fade in active">
									<div class="row-fluid">
										<div id="mesleft" class="span12">
											<div class="block-content collapse in">
												<div>
													<div class="row-fluid">
														<!-- block -->
														<div class="block ">
															<form id="xxform" name="xxform" action="data/xxMS.php" method="post" enctype="multipart/form-data" class="form-horizontal cmxform" role="form">
																<fieldset>
																	<div class="control-group">
                                          <label class="control-label" for="acMess">收信人</label>
                                          <div class="controls">
                                            <select id="acMess" name="acMess" class="chzn-select" >
                                            <optgroup label="<-----管———理———员----->">
                                            	<option  value="0h0000001">管理员</option>
                                            <optgroup label="<---本——地——会——员--->">
                                    <?php
					                   require("conn.php");
					                   $sql = "SELECT a.`会员标记码` ,b.`企业名称` AS 名称 FROM `个人信息` a,`本地会员` b WHERE a.`会员标记码` =b.`会员标记码`  ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					                ?>
												<option  value="<?php echo $row["会员标记码"];?>"><?php echo $row["名称"];?></option>

												 <?php
													}
												 ?>
											 <optgroup label="<---外——地——会——员--->">
												  <?php
					                   $sql = "SELECT a.`会员标记码` ,b.`企业名称` AS 名称 FROM `个人信息` a,`外地会员` b WHERE a.`会员标记码` =b.`会员标记码`  ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					               ?>
												<option  value="<?php echo $row["会员标记码"];?>"><?php echo $row["名称"];?></option>
												 <?php
													}
												 ?>
												<optgroup label="<---项——目——单——位--->">
												  <?php
					                   $sql = "SELECT a.`会员标记码` ,b.`项目名称` AS 名称 FROM `个人信息` a,`项目申报` b WHERE a.`会员标记码` =b.`会员标记码`  ";
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {    					
					               ?>
												<option  value="<?php echo $row["会员标记码"];?>"><?php echo $row["名称"];?></option>
												 <?php
													}
													$conn->close();	
												 ?>
                                            </select>
                                          </div>
                                          
                                        </div>
																	<div class="control-group">
																		<label class="control-label" for="theme">主题</label>
																		<div class="controls">
																			<input type="text" class="span6" id="theme" name="theme" >
																				<input type="text" class=" hidden" id="seMess" name="seMess" value="<?php echo $yhtag;?>">
																		</div>
																	</div>
																	<div class="control-group">
																		<label class="control-label" for="fileInput">附件</label>
																		<div class="controls">
																			<input class="input-file uniform_on" id="fileInput" name="fileInput" type="file">
																				<input type="text" class=" hidden" id="meState" name="meState" value="未读">
																		</div>
																	</div>
																	<div class="control-group">
																		<label class="control-label" for="textM">正文</label>
																		<div class="controls">
																			<textarea class="input-xlarge textarea" placeholder="Enter text ..." id="textM" name="textM" style="width: 500px; height: 200px"></textarea>
																		</div>
																	</div>
																	<div class="form-actions">
																		<button id="sent" type="submit" class="btn btn-primary">发送</button>
																		<button type="button" class="btn">刷新</button>
																	</div>
																</fieldset>
															</form>

														</div>

														<!-- /block -->
													</div>
												</div>

											</div>
										</div>
										
									</div>
								</div>

								<div id="menu1" class="tab-pane fade">
									<div class="block ">
										<div class="navbar navbar-inner block-header ">
										</div>
									</div>
									<div class="block-content collapse in">
										<div class="span12">
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example1">
												<thead>
													<tr>
														<th>序号</th>														
														<th>主题</th>
														<th>是否有附件</th>
														<th>发送时间</th>
														<th>操作</th>
													</tr>
												</thead>
												<tbody>
									<?php
					                   require("conn.php");
					                   $yhtag=$_SESSION["yhtag"];
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
					                   	$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`收信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`收信会员标记码`"; 
					                   	break;
					                   	case 3:
					                   	$sql = "select * from 消息  where 收信会员标记码='$yhtag' ";
					                   	break;
					                   }
					                   $result = $conn->query($sql);
					                   while($row = $result->fetch_assoc()) {
					                         					
					                   ?>
												<tr class="odd gradeX">
													<td><?php echo $row["id"]?></td>
													<td><?php echo $row["消息主题"]?></td>		
													<td> <?php echo $row["附件存在"]?></td>
													<td><?php echo $row["发送时间"]?></td>
													<td class="center">
														<button id="<?php echo $row["id"] ?> " type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" onclick="dianji(this.id)">查看</button>	
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary myclass1" data-toggle="modal" data-target="" onclick="shanchu(this.id)">删除</button>
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
									<input type="text"class="hidden" id="sbm" name="sbm" value="<?php echo $tag[0]?>" />
									<div class="block ">
										<div class="navbar navbar-inner block-header ">
											<div class="btn-group">
												
											</div>
										</div>
										<div class="block-content collapse in">
											<div class="span12">
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
													<thead>
														<tr>
															<th>序号</th>
															<!--<th>发件人</th>-->
															<th>主题</th>
															<th>时间</th>
															<th>操作</th>
														</tr>
													</thead>
													<tbody>
														
													<?php
														require("conn.php");
														$yhtag=$_SESSION["yhtag"];
//														switch($tag[0])
//					                  					 {
//					                   						case 0:
//					                   						$sql = "select * from 消息  where 发信会员标记码='$yhtag' ";
//					                   						break;
//					                   						case 1:
//					                   						$sql = "SELECT c.*FROM `项目申报` a,`本地会员` b,`消息` c WHERE a.`施工单位`=b.`企业名称` AND a.`会员标记码`=c.`发信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `本地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`发信会员标记码`";	  
//					                   						break;
//					                   						case 2:
//					                   						$sql =  "SELECT c.*FROM `项目申报` a,`外地会员` b,`消息` c WHERE a.`施工单位`=b.`申请单位名称` AND a.`会员标记码`=c.`发信会员标记码` AND b.`会员标记码`='".$yhtag."'UNION SELECT c.*FROM `外地会员` b,`消息` c WHERE b.`会员标记码`='".$yhtag."' AND b.`会员标记码`=c.`发信会员标记码`"; 
//					                   						break;
//					                   						case 3:
//					                   						$sql = "select * from 消息  where 发信会员标记码='$yhtag' ";
//					                   						break;
//					                   					}
															$sql="select * from 消息 where 发信会员标记码='$yhtag'";
														$result = $conn->query($sql);
						                  				while($row = $result->fetch_assoc()) {
													?>
														<tr class="odd gradeX">
															<td><?php echo $row["id"];?></td>
															<!--<td><?php echo $row[""];?></td>-->
															<td><?php echo $row["消息主题"];?></td>
															<td class=""><?php echo $row["发送时间"];?></td>
															<td class="center">
														<button id="<?php echo $row["id"] ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="chakan(this.id);">查看</button>	
														<button type="submit" id="<?php echo $row["id"]?>" class="btn btn-primary myclass1" data-toggle="modal" data-target="" onclick="shanchu1(this.id)">删除</button>
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
					
					<!--模态框1-->
					
						<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">查看</h4>
									</div>
									<form id="bdhyform" name="bdhyform" action="" method="post" class="" role="form">
										<input class="hidden" id="hybjm"  name="hybjm" value="<?php echo $yhtag;?>" >
										<input class="hidden" id="xxid"  name="xxid" >
										<div class="modal-body">
											<div class="form-group">
												<label for="sxr" class="span4 control-label">发信人</label>
												<div class="span8">
													<input type="text" class="span12 form-control" id="sxr" name="sxr" placeholder="" readonly="true" value="">
												</div>
											</div>
					
											<div class="form-group">
												<label for="zhuti" class="span4 control-label">主题</label>
												<div class="span8">
													<input type="text" class="span12 form-control" id="zhuti" name="zhuti" placeholder="" readonly="true">
												</div>
												
											</div>
											<div class="form-group" >
												<label for="" class="span4 control-label">附件</label>
												<!--<button id="fujian"></button>-->
												<div class="span8" id="fj">
													<a href="#" id="fileDown" class="btn btn-large btn-primary disabled">下载附件</a>
													
												</div>
											</div>
											
											<div class="form-group">
												<label for="zhengwen" class="span4 control-label">正文</label>
												<div class="span8">
													<textarea rows="6" class="span12" id="zhengwen" name="zhengwen" readonly="true" value=""></textarea>
												</div>
											</div>
											

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="button" class="btn btn-primary" id="save1">保存</button>
										</div>
									</form>
								</div>
							</div>
						
						</div>
					
					
						<!--模态框1-->

						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="ture">
	                  						 &times;
	                  					</button>
										<h4 class="modal-title" id="myModalLabel">查看</h4>
									</div>
									<form id="bdhyform1" name="bdhyform1" action="" method="post" class="" role="form">
										<input class="hidden" id="hybjm2" name="hybjm2" value="<?php echo $yhtag;?>">
										<input class="hidden" id="yfid"  name="yfid" value="" >
										<div class="modal-body">
											<div class="form-group">
												<label for="sxr1" class="span4 control-label">收信人</label>
												<div class="span8">
													<input type="text" class="span12 form-control" id="sxr1" name="sxr1" placeholder="" readonly="true" value="">
												</div>
											</div>
											<div class="form-group">
												<label for="zhuti1" class="span4 control-label">主题</label>
												<div class="span8">
													<input type="text" class="span12 form-control" id="zhuti1" name="zhuti1" placeholder="" readonly="true">
												</div>
											</div>
											<div class="form-group" >
												<label for="jujian1" class="span4 control-label">附件</label>
												<div class="span8" id="fj1">
													<a href="#" id="fileDown1" class="btn btn-large btn-primary disabled">下载附件</a>


												</div>
											</div>
											<div class="form-group">
												<label for="zhengwen1" class="span4 control-label">正文</label>
												<div class="span8">
													<textarea rows="6" class="span12" id="zhengwen1" name="zhengwen1" readonly="true" value=""></textarea>
												</div>
											</div>
											

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
											<button type="button" class="btn btn-primary" id="save2">保存</button>
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
			</div>
			<footer>
				<p>&copy; Vincent Gabriel 2013</p>
			</footer>
		</div>
		<!--/.fluid-container-->
		<script src="vendors/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		<script src="assets/scripts.js"></script>
		<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/DT_bootstrap.js"></script>
		<script src="vendors/jstree/dist/jstree.min.js" type="text/javascript" charset="utf-8"></script>

		<!--/.fluid-container-->
		<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
		<link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

		<link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

		<script src="vendors/jquery.uniform.min.js"></script>
		<script src="vendors/chosen.jquery.min.js"></script>
		<script src="vendors/bootstrap-datepicker.js"></script>

		<script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
		<script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

		<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

		<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/form-validation.js"></script>

		<script src="assets/scripts.js"></script>
		<script>
			jQuery(document).ready(function() {
				FormValidation.init();
			});

			$(function() {
				$(".datepicker").datepicker();
				$(".uniform_on").uniform();
				$(".chzn-select").chosen();
				$('.textarea').wysihtml5();

				$('#rootwizard').bootstrapWizard({
					onTabShow: function(tab, navigation, index) {
						var $total = navigation.find('li').length;
						var $current = index + 1;
						var $percent = ($current / $total) * 100;
						$('#rootwizard').find('.bar').css({
							width: $percent + '%'
						});
						// If it's the last tab then hide the last button and show the finish instead
						if($current >= $total) {
							$('#rootwizard').find('.pager .next').hide();
							$('#rootwizard').find('.pager .finish').show();
							$('#rootwizard').find('.pager .finish').removeClass('disabled');
						} else {
							$('#rootwizard').find('.pager .next').show();
							$('#rootwizard').find('.pager .finish').hide();
						}
					}
				});
				$('#rootwizard .finish').click(function() {
					alert('Finished!, Starting over!');
					$('#rootwizard').find("a[href*='tab1']").trigger('click');
				});
			});
		</script>

		<script>
			$(function() {
				// Easy pie charts
				$('.chart').easyPieChart({
					animate: 1000
				});
			});
		</script>

		<script type="text/javascript">
			var sbm=document.getElementById("sbm");
        	var myclass9=document.getElementsByClassName("myclass9");
        	var myclass0=document.getElementsByClassName("myclass0");
        	var myclass7=document.getElementsByClassName("myclass7");
        	
        	
			if(sbm.value =='0'){
				
        		myclass9[0].setAttribute("class","hidden");
        		
			
        	}else{
        		myclass0[0].setAttribute("class","hidden");
        		myclass7[0].setAttribute("class","hidden");

        		
        	}
			
		</script>
		<script type="text/javascript">
			
			var zhuti =document.getElementById("zhuti");
			var fujian= document.getElementById("fujian");
			var zhengwen =document.getElementById("zhengwen");
			var zhuti1=document.getElementById("zhuti1");
			var zhengwen1=document.getElementById("zhengwen1");
			var hybjm =document.getElementById("hybjm");
			var sbm =document.getElementById("sbm");
			var hybjm2 =document.getElementById("hybjm2");
			var sxr1 =document.getElementById("sxr1");
			function dianji(id){
				var xxid =document.getElementById("xxid");
				
				xxid.value =id;
				
				$.ajax({
					type:"POST",
					url:"xxlbduqu.php",
					data:{
						xxid:xxid.value,
						sbm:sbm.value,
						hybjm1:hybjm.value
						
					},
					dataType:'json',
					timeout: 10000,
					async:true,
					success:function(data){
						var length =data.length;	
							sxr.value =data[0].名称;
							zhuti.value =data[0].消息主题;
							zhengwen.value=data[0].内容;
							var fjlj="upload/xxupload/"+data[0].附件路径;
							var fjcz=data[0].附件存在;							
							if(fjcz==="无"){
							}
							else{
							var fileDown=document.getElementById("fileDown");
							fileDown.setAttribute("href",fjlj);
							fileDown.setAttribute("target","_blank");
							fileDown.setAttribute("class","btn btn-large btn-primary");
							}
						
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
					
				});
			};
		
			function shanchu(id){
				
				
				$.ajax({
					cache: true,
					type:"POST",
					url:"data/xxlbsc.php",
					data:{
						id1:id
					},
					async:false,
					success: function(data) {
						alert("删除成功");
						window.location.reload();
					},
					error:function(request) {
						alert("Connection error");
					}
				});
				
			};
		
	
			function chakan(id){
				var yfid = document.getElementById("yfid");
  						yfid.value =id;
				$.ajax({
					type:"POST",
					url:"data/yfxxckdq.php",
					data:{
						yfid:yfid.value,
						hybjm2:hybjm2.value
					},
					dataType:'json',
					timeout: 10000,
					async:true,
					success:function(data){
							sxr1.value =data[0].名称;
							zhuti1.value =data[0].消息主题;
							zhengwen1.value=data[0].内容;
							var fujian1="upload/xxupload/"+data[0].附件路径;
							var fjcz1=data[0].附件存在;		
							if(fjcz1=="无"){
							}
							else{
							var fileDown1=document.getElementById("fileDown1");
							fileDown1.setAttribute("href",fujian1);
							fileDown1.setAttribute("target","_blank");
							fileDown1.setAttribute("class","btn btn-large btn-primary");
							}
						
					
							
							
					},
					error: function(e) {
						alert("ajax数据请求失败，请重新加载！");
					}
					
				});
			};
		</script>
		<script type="text/javascript">
			function shanchu1(id){
				
				
				$.ajax({
					cache: true,
					type:"POST",
					url:"data/ydxxsc.php",
					data:{
						id2:id
					},
					async:false,
					success: function(data) {
						alert("删除成功");
						window.location.reload();
					},
					error:function(request) {
						alert("Connection error");
					}
				});
				
			};
		</script>

	</body>

</html>